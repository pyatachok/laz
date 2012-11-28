<?php
/**
 * Description of order_contents
 *
 * @author pyatachok
 */

class Order_Contents extends Operating_Object
{
	protected $db = null;
	protected $table_name = 'order_contents';
	
	public function __construct()
	{
		parent::__construct();
	}

	function getSeatsByOrderId($orderId, $zalAlias)
	{
		$seatStr = '';
		$this->db->select(
			'seat_id',
			$this->table_name,
			'order_id=?',
			array($orderId)
			);
		$seats = $this->db->fetch_obj_all('seat_id');
		
		$this->db->select(
			'*',
			$zalAlias.'_hall',
			'id '
			);
		
		$this->db->query('
			SELECT
				*
			FROM
				'.$zalAlias.'_hall
			WHERE
				id IN '."('".implode("','", array_keys($seats))."')");
		foreach ($this->db->fetch_obj_all() as $value)
		{
			$seatStr .='Р('.$value->row.')М('.$value->seat_number.')  ';
		}
		return $seatStr;
	}
	
	function delOrderContents($orderId)
	{
		$this->db->delete(
			$this->table_name,
			'order_id=?',
			array($orderId)
			);
	}
}
