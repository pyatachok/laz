<?php
/**
 * Description of Seans
 *
 * @author pyatachok
 */
class Seans extends Operating_Object
{
	protected $db = null;
	protected $table_name = 'seans';
	
//	public $columns = array('id' => 'Id', 'name' => 'Name', 'description' => 'Description');
//	public $columns_to_display = array(
//		'id' => 'Id', 
//		'name' => 'Name', 
//		'description' => 'Description', 
//		'categories' => 'Categories'
//		);

	public function __construct()
	{
		parent::__construct();
	}

	function getSeansesByAlias($alias)
	{
		$this->db->select(
			'*',
			$this->table_name,
			'alias=?',
			array($alias),
			'seans_date DESC'
			
			);
		return $this->db->fetch_obj_all('id');
		
	}
	
	function getPricesBySeans($seansId)
	{
		//select distinct( type_id),price, seans_id from seans_type_price where seans_id=43
		$this->db->select(
			'distinct( type_id),price, seans_id',
			'seans_type_price',
			'seans_id=?',
			array($seansId)			
			);
		return $this->db->fetch_obj_all('type_id');
	}
	
	/**
	 * Проверяем что все места из списка свободны
	 * @param string $seatIds
	 * @return boolean
	 */
	function checkSeatsEmpty( $seatIds )
	{
		$seatIds = rtrim($seatIds, ',');
		$seans = $this->item;
		$this->db->select(
				'*',
				$seans->zal_alias . '_hall',
				"seans_id = {$seans->id} AND id IN ({$seatIds})"
				);
		$seats = $this->db->fetch_obj_all('id');
		if ( !$seats || empty($seats))
		{
			return FALSE;
		}
		foreach ( $seats as $key => $seat) 
		{
			if ( $seat->place_type_id <> Order::SEATE_free )
			{
				return false;
			}
		}

		return true;
	}
	
}
