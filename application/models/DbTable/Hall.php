<?php
/**
 * Description of Hall
 *
 * @author pyatachok
 */
class Application_Model_DbTable_Hall extends Zend_Db_Table_Abstract 
{
	protected $_name = 'hall';
	protected $_seans_id;
	
	public function setName($name)
	{
		$this->_name = $name;
	}
	
	public function getName()
	{
		return $this->_name;
	}
	
	public function setSeansId($seansId)
	{
		$this->_seans_id = $seansId;
	}
	
	public function createSchemeLikeDefault()
	{
		
	}
	
}

