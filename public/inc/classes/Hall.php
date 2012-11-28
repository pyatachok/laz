<?php
/**
 * Description of Hall
 *
 * @author pyatachok
 */

class Hall extends Operating_Object
{
	protected $db = null;
	protected $table_name = 'hall';
	
//	public $columns = array('id' => 'Id', 'name' => 'Name', 'description' => 'Description');
//	public $columns_to_display = array(
//		'id' => 'Id', 
//		'name' => 'Name', 
//		'description' => 'Description', 
//		'categories' => 'Categories'
//		);

	public function __construct($tableName = '')
	{
		if (!empty($tableName))
			$this->table_name = $tableName;
		parent::__construct();
	}

	function getHallScheameBySeansId($seansId)
	{
		$seansClass = new Seans();
		$seans = $seansClass->getById($seansId);
		$hallScheameClass = new HallScheame( $seans->zal_alias, $seansId);
		
		return $hallScheameClass->getHallScheame();
		
	}

	function updateSeatsState($seats, $newState)
	{
		foreach ($seats as $id => $seat)
		{
			$this->db->update(
				$this->table_name,
				array(
					'place_type_id' => $newState
				),
				'id = ?',
				array($seat->seat_id)
				);
		}
	}
	
	function getPriceById($seat_id)
	{
		$this->db->select(
				'',
				$this->table_name,
				array(
					'place_type_id' => $newState
				),
				'id = ?',
				array($seat->seat_id)
				);
		
		
		$this->db->select(
			'*',
			"{$zalAlias}_hall",
			"seans_id = ?",
			array($seansId),
				'hall_part, row DESC, id'
			);
	}
}
