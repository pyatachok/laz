<?php

class Application_Model_DbTable_OrderContents extends Zend_Db_Table_Abstract
{

    protected $_name = 'order_contents';

	protected $_referenceMap    = array(
        'Order' => array(
            'columns'           => 'order_id',
            'refTableClass'     => 'Application_Model_DbTable_Order',
            'refColumns'        => 'id'
        ),
		
	);
}

