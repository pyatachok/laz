<?php

class Application_Model_StaticVariables extends My_Model
{

	function __construct($id = NULL, $data = array()) {
		parent::__construct(new Application_Model_DbTable_StaticVariables(array('db' => 'my_db')), $id, $data );
	}
	

	function getAll() {
		$vars = parent::getAll();
		$return_vars = array();
		foreach ($vars as $value) {
			$return_vars[$value->name] = $value;
		}
		return $return_vars;
	}
	
	function getByName($name)
	{
		return  $this->_dbTable
				->fetchRow("name = '{$name}'");
	}
}

