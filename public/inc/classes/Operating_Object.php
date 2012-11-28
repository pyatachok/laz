<?php

/**
 * Класс родитель для работы с сущностями
 *
 * @author pyatachok
 */
class Operating_Object
{
	protected $db = null;
	
	public $count = 0;
	protected $itemsOnPage = 10;
	protected $currentPage = 1;
	
	protected $item = null;


	public function __construct()
	{
		$this->db = new My_Database();
		$this->db->connect(DBHOST, DBUSER, DBUSERPASS, DBNAME);
		$this->db->disable_warnings = false;
		$this->db->set_charset('utf8');
		$this->db->debug = false;

		$this->db->select('count(id) as c', $this->table_name);
		$this->count = $this->db->fetch_field('c', 0);
	}
	
	public function getAll($fields = '*', $all = false, $order_by = 'name', $where = '', $replacement = array() )
	{
		if ( false === $all )
		{
			$this->db->select(
				$fields, 
				$this->table_name, 
				$where, 
				$replacement, 
				$order_by, 
				((string)($this->currentPage-1)*$this->itemsOnPage).",".$this->itemsOnPage, 
				true
				);
		}
		else
		{
			$this->db->select(
				'*', 
				$this->table_name, 
				$where, 
				$replacement, 
				$order_by				
				);
		}
		return $this->db->fetch_obj_all('id');
	}
	
	public function setParams($params = array())
	{
		foreach ($params as $key => $value)
		{
			$this->$key = $value;
		}
	}
	
	public function getCurrentPage()
	{
		return $this->currentPage;
	}
	
	public function getItemsOnPage()
	{
		return $this->itemsOnPage;
	}
	
	public function del($id)
	{
		return $this->db->delete($this->table_name, 'id = ?', array($id));
	}
	
	public function getById($id) {
		if ($id < 0) return false;
		$this->db->select(
				'*', 
				'`'.$this->table_name.'`', 
				'id=?', 
				array($id)
				);
		$this->item = $this->db->fetch_obj();
		return $this->item;
	}
	
	
	/**
	 * Возможно нужно удалить
	 * @param type $propertyArray1
	 * @param type $propertyArray2
	 * @return type 
	 */
	protected function sortProperties($propertyArray1,$propertyArray2 )
	{
		$resultArray = $propertyArray2;
		foreach ($propertyArray1 as $key1 => $property1)
		{
			$toAdd = true;
			foreach ($propertyArray2 as $key2 => $property2)
			{
				if ($property1->property_predefine_id == $property2->property_predefine_id ) {
					
					$toAdd = false;
					break;
				}
			}
			if ($toAdd) $resultArray[$key1] = $property1;
		}
		return $resultArray;
	}
}
