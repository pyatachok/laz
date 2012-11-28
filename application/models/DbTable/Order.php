<?php

class Application_Model_DbTable_Order extends Zend_Db_Table_Abstract
{

    protected $_name = 'orders';
	protected $_rowClass = 'Application_Model_DbTable_Row_Order';

	protected $_dependentTables = array('Application_Model_DbTable_OrderContents');
	
	 protected $_referenceMap    = array(
        'Zal' => array(
            'columns'           => 'zal_alias',
            'refTableClass'     => 'Application_Model_DbTable_Zal',
            'refColumns'        => 'alias'
        ),
		 'Seans' => array(
            'columns'           => 'seans_id',
            'refTableClass'     => 'Application_Model_DbTable_Seans',
            'refColumns'        => 'id'
        ),
		 
	);
	 
	 
}

