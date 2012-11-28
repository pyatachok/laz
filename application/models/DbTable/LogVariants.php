<?php

class Application_Model_DbTable_LogVariants extends Zend_Db_Table_Abstract
{

    protected $_name = 'log_variants';

	protected $_dependentTables = array('Application_Model_DbTable_Logs');
	protected $_referenceMap    = array(
        'LogTypes' => array(
            'columns'           => 'type_id',
            'refTableClass'     => 'Application_Model_DbTable_LogTypes',
            'refColumns'        => 'id'
        )
		 
	);

}

