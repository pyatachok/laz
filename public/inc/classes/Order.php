<?php
/**
 * Description of Order
 *
 * @author pyatachok
 */
class Order extends Operating_Object
{

	const TYPE_BOOKED = 1;
	const TYPE_PAYED = 2;
	const TYPE_DELIVERED = 3;
	const TYPE_ARCHIVE = 4;
	const TYPE_CANCEL = 5;
	const TYPE_SEND_TO_DELIVERY = 6;
	
	const SEATE_free = 2;
	const SEATE_kassa = 3;
	const SEATE_booked = 4;
	const SEATE_soled = 5;
	
	
	const ORDER_DELIVERY_COST = 350;
	
	protected $db = null;
	protected $table_name = 'orders';
	
	public $columns = array('id', 'type', 'fio', 'email', 
		'adress', 'create_date', 'modify_date', 'seans_id', 
		'zal_alias', 'tel','dostavka', 'amount','presents_count','presents_amount','is_delivery');
	public $columns_to_display = array(
		'id' => '№ Заказа', 
		'type'=> 'Тип',
		'operations' => 'Действия',
		'fio' =>'Ф.И.О.', 
		'tickets' =>'Места', 
		'performance' =>'Постановка', 
		'zal' =>'Зал', 
		'seans' =>'Сеанс', 
		'email' =>'Email', 
		'adress' =>'Адресс', 
		'create_date' =>'Создание', 
		'modify_date' =>'Модификация', 
		'tel' =>'Телефон',
		'dostavka' =>'Доставка', 
		'amount' =>'Сумма',
		'presents_count' =>'Количество подарков',
		'presents_amount' =>'Стоимость подарков',
		);

		function getAll($fields = '*', $all = false, $order_by = 'name', $where = '', $replacement = array())
		{
			$orders = parent::getAll($fields, $all, $order_by, $where, $replacement);
			$seansClass = new Seans();
			$zalClass = new Zal();
			$orderContents = new Order_Contents();
			foreach ($orders as $id => $order)
			{
				$order->zal = $zalClass->getByAlias($order->zal_alias)->name;
				$order->seans = $seansClass->getById($order->seans_id)->date;
				$order->performance = $seansClass->getById($order->seans_id)->name;
				$order->tickets = $orderContents->getSeatsByOrderId($order->id, $order->zal_alias);
			}
			
			
			
			return $orders;
		}

	public function __construct()
	{
		parent::__construct();
	}


	function getById($orderId)
	{
		$order = parent::getById($orderId);

		if ($order)
		{
			$orderContentsClass = new Order_Contents();
			$order->seats = $orderContentsClass->getAll('*', true, 'seat_id', 'order_id = ?', array($orderId));
		}
		
		return $order;
	}
	
	function getOrderAmmont(&$order)
	{
		
		$this->db->select(
			'*',
			'seans_type_price',
			'seans_id = ?',
			array($order->seans_id)
			);
		$seans_type_price = $this->db->fetch_obj_all('type_id');
		
		$this->db->query('
			SELECT
				*
			FROM
				'.$order->zal_alias.'_hall
			WHERE
				id IN '."('".implode("','", $order->seats_ids)."')");
		
		$hall_seats = $this->db->fetch_obj_all('id');

		foreach ($hall_seats as $id => $value)
		{
			$order->amount += $seans_type_price[$value->ticket_state_id]->price;
		}
		
		/* Учет подарков */
		if (!empty($order->presents_count))
		{
			$seansClass = new Seans();
			$seans = $seansClass->getById($order->seans_id);
			$order->presents_amount = $seans->present_price*$order->presents_count;
			$order->amount += $order->presents_amount;
		}
		else 
		{
			$order->presents_amount = 0;
		}
		
		/* Учет доставки */
		if ( 'delivery' == $order->is_delivery )
		{
			$order->amount += self::ORDER_DELIVERY_COST;
		}else{
			$order->dostavka = 'Самовывоз';
		}
		
	}
	
	function saveOrder($order)
	{
		$seans = new Seans();
		$seans = $seans->getById($order->seans_id);
		
		$order->id = time();
		$order->zal_alias = $seans->zal_alias;
		$this->getOrderAmmont($order);
		smtpmail(ADMIN_EMAIL, 
				'saving order '.time(), 
				var_export(
						array(
							'order' => $order,
							'seans' => $seans,
							'$_SERVER' => $_SERVER,						
							)
						, true
						)
				);
		
		$insertArray = array();
		
		foreach ($this->columns as $field)
		{
			$insertArray[$field] = $order->$field;
		}
		
		$res = $this->db->insert(
			$this->table_name,
			$insertArray
			);
		
		//saveorder
		if (!$res)
		{
//			echo '<p>MYSQL ERROR saveOrder '.mysql_error().'</p>';
			smtpmail(ADMIN_EMAIL, 'ERROR saving order! 1', var_export(array($insertArray, $order), true));
		}
		else
		{
			$hallClass = new HallScheame($order->zal_alias, $order->seans_id);
			$sql = "INSERT INTO `order_contents`(order_id, seat_id, price) VALUES";
			foreach ($order->seats_ids as $seat_id)
			{
				
				if (!empty($seat_id))
				{
					$sql .= "('{$order->id}', '{$seat_id}', '{$hallClass->getById($seat_id)->price}'),";
				}
			}
			//save seates + prices in order
			$sql = trim($sql, ',');
			$res = $this->db->query($sql);
			if (!$res)
			{
				smtpmail(ADMIN_EMAIL, 'ERROR saving order! 2', var_export($order, true));
//				echo '<p>MYSQL ERROR saveOrder '.mysql_error($this->_mysql).'</p>';
			}
			//mark seats as booked
			$orderSaved = $this->getById($order->id);
			$seats = $orderSaved->seats;

			$this->markSeatsAsState($orderSaved->seats, self::SEATE_booked, $orderSaved->zal_alias);
			return $order->id;
		}
		smtpmail(ADMIN_EMAIL, 'ERROR saving order! 3', var_export($order, true));
		return false;
			
	}
	
	function updateOrder($orderId, $field, $value)
	{
		$this->db->update(
			$this->table_name,
			array(
				$field  =>  $value,
			),
			'id = ?',
			array($orderId)
		);

	}
	
	
	function markSeatsAsState($seats,$state, $zal_alias)
	{
		$hallClass = new Hall($zal_alias.'_hall');
		$hallClass->updateSeatsState($seats, $state);
	}
	
	function delOrder($orderId)
	{
		$orderContentsClass = new Order_Contents();
		$orderContentsClass->delOrderContents($orderId);
		$this->db->delete(
			$this->table_name,
			'id=?',
			array($orderId)
			);
	}
}
