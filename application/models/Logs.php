<?php

class Application_Model_Logs extends My_Model
{

	function __construct($id = NULL, $data = array()) {
		parent::__construct(new Application_Model_DbTable_Logs(array('db' => 'my_db')), $id, $data );
	}
	
}

