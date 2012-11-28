<?php

class Application_Model_DbTable_LogTypes extends Zend_Db_Table_Abstract
{

    protected $_name = 'log_types';

	protected $_dependentTables = array('Application_Model_DbTable_LogVariants');
}

