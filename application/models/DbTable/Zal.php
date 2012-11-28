<?php

class Application_Model_DbTable_Zal extends Zend_Db_Table_Abstract
{

    protected $_name = 'zal';

	function getByAlias($alias)
	{
		return $this->select()
				->from($this->_name)
				->where('alias = ? ', array($alias))
				->query()
				->fetchObject();
	}
}

