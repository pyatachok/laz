<?php

class Application_Model_Bron extends My_Model
{

	function __construct($id = NULL) {
		parent::__construct(new Application_Model_DbTable_Bron(array('db' => 'my_db')), $id);
	}
	
}

