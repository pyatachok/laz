<?php

class Application_Model_SeansTypePrice extends My_Model
{

	function __construct($id = NULL, $data = array()) {
		parent::__construct(new Application_Model_DbTable_SeansTypePrice(array('db' => 'my_db')), $id, $data );
	}
	
	function getBySeansIdAndType($seans_id, $type)
	{
		$row = $this->_dbTable
				->select()
				->where("seans_id = {$seans_id}  AND type_id = {$type}")
				->query()
				->fetchObject();
		if (FALSE === $row) { return false; }
		$this->_row = $this->_dbTable->find($row->id)->current();
		return $this->_row ;
	}
}

