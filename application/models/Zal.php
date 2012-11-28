<?php

class Application_Model_Zal extends My_Model
{

	function __construct($id = NULL) {
		parent::__construct(new Application_Model_DbTable_Zal(array('db' => 'my_db')), $id);
	}
	
	function getByAlias($alias)
	{
		$zal = $this->_dbTable->getByAlias($alias);
		return new Application_Model_Zal($zal->id);
	}
	
}

