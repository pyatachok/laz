<?php

class Application_Model_Order extends My_Model
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
	
	public $types = array(
		1 => 'Забронирован',
		2 => 'Оплачен',
		3 => 'Доставлен',
		4 => 'В архиве',
		5 => 'Отменен',
		6 => 'Отправлен в службу доставки',
	);


	function __construct($id = NULL) {
		parent::__construct(new Application_Model_DbTable_Order(array('db' => 'my_db')), $id);
	}
	
	
	function getByTypes($types) {
		$orders = $this->_dbTable
				->fetchAll('type IN  (' . implode(',', $types) . ')', 'id DESC');

		return $orders;
	}
	
	
//	$searchConditions = array(
//				'order_id' => $this->_getParam('order_id', false),
//				'fio' => $this->_getParam('fio', false),
//				'tel' => $this->_getParam('tel', false),
//				'email' => $this->_getParam('email', false),
//				'dostavka' => $this->_getParam('dostavka', false),
//				'date_from' => $this->_getParam('date_from', false),
//				'date_to' => $this->_getParam('date_to', false),
//				'seans_id' => $this->_getParam('seans_id', false),
//				'zal_alias' => $this->_getParam('zal_alias', false),
//				
//			);
	
	function getBySearchConditions($searchConditions) {
		
		$str = ' AND create_date BETWEEN ("'.$searchConditions['date_from'].'") AND ("'.$searchConditions['date_to'].'") ';
		foreach ($searchConditions as $key => $value) {
			if ( false !== $value )
			{
				if (in_array($key, array('id', 'fio', 'tel', 'email', 'dostavka' )))
				{
					$str .= " AND {$key} LIKE '%$value%' ";
				}
				elseif( in_array($key, array('seans_id', 'zal_alias') ) )
				{
					$str .= " AND {$key} = '$value' ";

				}
			}
		}
		
		$orders = $this->_dbTable
				->fetchAll('1 '. $str, 'id DESC');

		return $orders;
	}
	
	
	
}

