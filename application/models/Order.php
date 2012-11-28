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
	
	function __construct($id = NULL) {
		parent::__construct(new Application_Model_DbTable_Order(array('db' => 'my_db')), $id);
	}
	
	
	function getByTypes($types) {
		$orders = $this->_dbTable
				->fetchAll('type IN  (' . implode(',', $types) . ')', 'id DESC');

		return $orders;
	}
	
}

