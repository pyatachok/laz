<?php

class Application_Model_LogTypes extends My_Model
{

	const TYPE_ORDER = 1;
	const TYPE_SEANS = 1;
	const TYPE_HALL = 1;
	const TYPE_USER = 1;
	
	
	function __construct($id = NULL, $data = array()) {
		parent::__construct(new Application_Model_DbTable_LogTypes(array('db' => 'my_db')), $id, $data );
	}
	
}

