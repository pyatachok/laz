<?php

class Application_Model_Scheme extends My_Model
{

	const DEFAULT_SEANS = '99999';

	public $placeTypes = array(
		'1' => 'empty',
		'2' => 'free',
		'3' => 'kassa', 
		'4' => 'booked',
		'5' => 'soled',
		'6' => 'not_active',
	);
	
	const EMPTY_PLACE_TYPE = 1;
	const FREE_PLACE_TYPE = 2;
	const KASSA_PLACE_TYPE = 3;
	const BOOKED_PLACE_TYPE = 4;
	const SOLED_PLACE_TYPE = 5;
	const NOT_ACTIVE_PLACE_TYPE = 6;
	
	public $ticketStates = array(
		'1' => 'VIP',
		'2' => 'deluxe',
		'3' => 'standart', 
		'4' => 'economy',
	);

	const PARTER_PART = 1;
	const AMPHITHEATER_PART = 2;
	const BALCONY_PART = 3 ;
	
	public $hall_parts = array(
		'parter'  => self::PARTER_PART,
		'amphitheatre'  => self::AMPHITHEATER_PART,
		'balcony'  => self::BALCONY_PART,
	);
	
	private $_seans_id = '';
	private $_zal_alias = '';
	

	function __construct($zal_alias, $seans_id = self::DEFAULT_SEANS) 
	{
		$this->_seans_id = $seans_id;
		$this->_zal_alias = $zal_alias;
		$hall_scheme = new Application_Model_DbTable_Hall(array('db' => 'my_db'));
		$hall_scheme->setName($zal_alias."_hall");
		$hall_scheme->setSeansId($seans_id);
		parent::__construct($hall_scheme);
	}
	
	
	function getAll()
	{
//		return $this->_dbTable->fetchAll(null, 'id DESC');
		
		$all_seats = $this->_dbTable->select()
				->from($this->_dbTable->getName())
				->where('seans_id = ? ', array($this->_seans_id))
				->order(array('hall_part', 'row DESC', 'id'))
				->query()
				->fetchAll();

		return $this->_sortByHallPart($all_seats);
		
	}
	
	
	private function _sortByHallPart($all_seats)
	{
		foreach ($all_seats as $seat)
		{
			$scheame[$this->hall_parts[$seat['hall_part']]][$seat['row']][$seat['column']] = (object) array(
				'id' => $seat['id'],
				'place_type' => $this->placeTypes[$seat['place_type_id']],
				'ticket_state' => $this->ticketStates[$seat['ticket_state_id']],
				'seat_number' => $seat['seat_number'],
				'row' => $seat['row'],
				'ticket_row' => $seat['ticket_row'],
				'hall_part' => ucwords($seat['hall_part']),
				);
		}
		krsort($scheame);

		return $scheame;
	}


	public function update($data, $where)
	{
		return $this->_dbTable->update($data, $where);
	}
	
	public function createSchemeLikeDefault($seans_id)
	{
		
		$sql = "INSERT INTO `{$this->_zal_alias}_hall` (`place_type_id`, 
`ticket_state_id`, `seat_number`, `row`, `ticket_row`, `column`, `seans_id`, `hall_part`) 
SELECT place_type_id, ticket_state_id, seat_number,`row`, `ticket_row`,`column`, {$seans_id} AS seans_id,hall_part 
from `{$this->_zal_alias}_hall` AS h
WHERE seans_id=".self::DEFAULT_SEANS;
		
		$db = $this->_dbTable->getAdapter();
		$db->query($sql);
		
	}
	
	
	public function recalculatePlacesInRow($row, $hall_part)
	{
		//выбрать все места по ряду
		$row_seats = $this->_dbTable->select()
				->from($this->_dbTable->getName())
				->where("row = '{$row}' AND hall_part = '{$hall_part}'")
				->order(array('id'))
				->query()
				->fetchAll();

		$index = 1;
		//пройти в цикле по всем местам и проверить seat_number, если нужно, то переназначить
		foreach ($row_seats as $position) 
		{
			$where = ' `id`=' .$position['id'];
			if (self::EMPTY_PLACE_TYPE === (int) $position['place_type_id'])
			{
				$this->update(array('seat_number' => 0), $where);
			}
			else 
			{
				$this->update(array('seat_number' => $index), $where);
				$index++;
			}
		}
		
		//реализация сквозной нумерации рядов
		$rowNotEmpty = $this->_dbTable->select()
				->from($this->_dbTable->getName(), 'sum(seat_number) as c')
				->where("row = '{$row}' AND hall_part = '{$hall_part}'")
				->order(array('id'))
				->query()
				->fetchColumn() ;
		if ( empty($rowNotEmpty) )
		{
			$where = ' `hall_part`="' .$hall_part.'" '
						.' AND `row` = "' .$row. '"';
			$this->update(array('ticket_row' => 0), $where);
			
			$all_rows = $this->_dbTable->select()
				->from($this->_dbTable->getName(), 'distinct(row), ticket_row')
				->where('hall_part = ? ', array($hall_part))
				->order(array('row', 'id'))
				->query()
				->fetchAll();
			
			$index = 0;
			foreach ($all_rows as $rows) 
			{
			
				if ( !empty($rows['ticket_row']) )
				{
					$index++;
					$rowId = $index;
				}  
				else 
				{
					$rowId = 0;
				}
				
				$where = ' `hall_part`="' .$hall_part.'" '
						.' AND `row` = "' .$rows['row']. '"';
				$this->update(array('ticket_row' =>$rowId), $where);
			}

		}
		
		
	}
	
	/**
	 * 
	 * @param type $hall_part
	 * @param type $rows
	 * @param type $column
	 * @return type array of arrays
	 */
	function getSeats($hall_part, $rows, $column)
	{
		$seats = $this->_dbTable->select()
			->where("seans_id = '{$this->_seans_id}' 
				AND hall_part = '{$hall_part}' 
				AND `row` IN ('" . implode("', '", $rows) . "') 
				AND `column` IN ('" . implode("', '", $column) . "') ")
			->order(array('row DESC', 'id'))
			->query()
			->fetchAll();
		return $seats;
	}
}

