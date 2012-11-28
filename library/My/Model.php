<?php
/**
 * Description of My_Model
 *
 * @author pyatachok
 */
class My_Model 
{

	protected $_dbTable;
	protected $_row;
	protected $_order = array();


	function __construct(Zend_Db_Table_Abstract $dbTable, $id = NULL, $data = array()) 
	{
		$db = $dbTable->getAdapter()->query('SET NAMES utf8');
		
		$this->_dbTable = $dbTable;
		if ($id)
		{
			$this->_row = $this->_dbTable->find($id)->current();
		} 
		else 
		{
			$this->_row = $this->_dbTable->createRow($data);
			
		}
	}
	
	function __get($name) 
	{
		if ( isset($this->_row->$name) )
		{
			return $this->_row->$name;
		}
	}
	
	function __set($name, $value) 
	{
		if ( isset($this->_row->$name) )
		{
			$this->_row->$name = $value;
		}
	}
	
	function save()
	{
		$this->_row->save();
	}
	
	function delete()
	{
		$this->_row->delete();
	}

	/**
	 * Заполняет объект строки таблицы
	 * @param type $data
	 */
	function fill($data)
	{
		foreach ($data as $key => $value) 
		{
			if ( isset($this->_row->$key) )
			{
				$this->_row->$key = $value;
			}
		}
	}
	
	function populateForm()
	{
		return $this->_row->toArray();
	}
	
	function getAll()
	{
		return $this->_dbTable->fetchAll(null, 'id DESC');
	}
	
	
	public function setOrder($order)
	{
		$this->_order = $order;
	}
	
	public function getRow()
	{
		return $this->_row;
	}
	
	
}

