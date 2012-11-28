<?php
/**
 * Description of HallScheame
 *
 * @author pyatachok
 */
class HallScheame extends Operating_Object
{
	protected $db = null;
	protected $table_name = 'hall';
	protected $_zal_alias = '';
	protected $_seans_id = '';
	
	var $_scheame = array();
	
	var $_placeTypes = array(
		'1' => 'empty',
		'2' => 'free',
		'3' => 'kassa', 
		'4' => 'booked',
		'5' => 'soled',
		'6' => 'not_active',
	);
	var $_ticketStates = array(
		'1' => 'VIP',
		'2' => 'deluxe',
		'3' => 'standart', 
		'4' => 'economy',
	);

	const PARTER_PART= 1;
	const AMPHITHEATER_PART= 2;
	const BALCONY_PART = 3 ;
	
	public $hall_parts = array(
		
		
	);

	function __construct($zalAlias, $seansId)
	{
		parent::__construct();
		$this->hall_parts = array(
			'parter'  => self::PARTER_PART,
			'amphitheatre'  => self::AMPHITHEATER_PART,
			'balcony'  => self::BALCONY_PART,
		);
		$this->_zal_alias = $zalAlias;
		$this->_seans_id = $seansId;
		
	}

	/**
	 * Возвращает схему зала по сеансу и алиасу зала
	 * @param type $zalAlias
	 * @param type $seansId 
	 */
	function getByZalZlias($zalAlias, $seansId)
	{
		$this->db->select(
			'*',
			"{$zalAlias}_hall",
			"seans_id = ?",
			array($seansId),
				'hall_part, row DESC, id'
			);
			
		$all_seats = $this->db->fetch_obj_all('id');
		foreach ($all_seats as $id => $seat)
		{
			$this->_scheame[$this->hall_parts[$seat->hall_part]][$seat->row][$seat->column] = (object) array(
				'id' => $id,
				'place_type' => $this->_placeTypes[$seat->place_type_id],
				'ticket_state' => $this->_ticketStates[$seat->ticket_state_id],
				'seat_number' => $seat->seat_number,
				'row' => $seat->row,
				'ticket_row' => $seat->ticket_row,
				'hall_part' => ucwords($seat->hall_part),
				'kassa_url' => ('kassa' === $this->_placeTypes[$seat->place_type_id] ? $this->getKassaUrl($id, $zalAlias) : '')
				);
		}
			krsort($this->_scheame);
//			mail('piglet.freelancer@gmail.com', 'DEBUG: EX $this->_scheame', var_export(array(array_keys($this->_scheame)) , true));
	}
	function getHallScheame()
	{
		$this->getByZalZlias($this->_zal_alias, $this->_seans_id);
		return $this->_scheame;
	}

	function getKassaUrl($id, $zalAlias)
	{
		$this->db->select(
			'url',
			"seat_kassa_url",
			"zal_alias = ? and seat_id = ?",
			array($zalAlias, $id)
			);
		$obj = $this->db->fetch_obj();
//		mail('piglet.freelancer@gmail.com', 'DEBUG: EX $obj', var_export(array($obj), true));
			return $obj->url;
	}
	
	function getById($id)
	{
		$this->db->select(
			'*',
			$this->_zal_alias.'_hall',
			"id = ? ",
			array($id)
			);
		$obj = $this->db->fetch_obj();
		
		$this->db->select(
			'*',
			'seans_type_price',
			"seans_id = ? AND type_id = ? ",
			array($this->_seans_id, $obj->ticket_state_id)
			);
		$price = $this->db->fetch_obj();
		$obj->price = $price->price;
		return $obj;
//		mail('piglet.freelancer@gmail.com', 'DEBUG: EX $obj', var_export(array($obj), true));
	}
}
