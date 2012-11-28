<?php

class Application_Model_DbTable_Logs extends Zend_Db_Table_Abstract
{

    protected $_name = 'logs';

//	protected $_dependentTables = array('Application_Model_DbTable_Logs');
	protected $_referenceMap    = array(
        'LogVariants' => array(
            'columns'           => 'log_variant_id',
            'refTableClass'     => 'Application_Model_DbTable_LogVariants',
            'refColumns'        => 'id'
        ),
		'Users' => array(
            'columns'           => 'user_id',
            'refTableClass'     => 'Application_Model_DbTable_Users',
            'refColumns'        => 'id'
        )
		 
		 
	);
}

