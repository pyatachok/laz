<?php

class Application_Model_Seans extends My_Model
{

	public $prices = array();
	
	function __construct($id = NULL) {
		parent::__construct(new Application_Model_DbTable_Seans(array('db' => 'my_db')), $id);
	}
	

	function getPricesBySeans()
	{
		$db = $this->_dbTable->getAdapter();
		$prices = $db->select()
			->from('seans_type_price', array('type_id','price', 'seans_id'))
			->where('seans_id = ? ', array($this->id))
			->order(array('type_id'))
			->query()
			->fetchAll();
		
		$result_array = array();
		foreach ($prices as $value) {
			$result_array[$value['type_id']] = $value['price'];
		}
		$this->prices = $result_array;
		return $this;

	}

}

