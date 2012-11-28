<?php

/**
 * @author pyatachok
 */
class Application_Model_DbTable_Row_Order extends Zend_Db_Table_Row_Abstract 
{
	
	function getPlaces()
	{
		$seats = $this->getSeats();
			
		$seatStr = '';
		foreach ($seats as $value)
		{
			$seatStr .='<a class ="href-button" target="_blank" href="/admin/order/print/id/'.$this->id.'/seat_id/'.$value->id.'">Р('.$value->row.')М('.$value->seat_number.') </a><br/> ';
//			$seatStr .='Р('.$value->row.')М('.$value->seat_number.') ';
		}
		
		return $seatStr;
	}
	
	function getSeats()
	{
		$ordeContentsRowset = $this->findDependentRowset('Application_Model_DbTable_OrderContents', 'Order');
		
		$seatStr = '';
		
		foreach ($ordeContentsRowset as $key => $value) 
		{
			$seatStr .= $value->seat_id . "', '";
		}
		$zal_alias = ( empty($this->zal_alias) ? 'hall' : $this->zal_alias.'_hall' );
		$db = Zend_Db_Table_Abstract::getDefaultAdapter();
		return $db->select()
					->from($zal_alias)
					->where('id IN '."('" . rtrim($seatStr, ',') . "')")
					->query(Zend_Db::FETCH_OBJ)
					->fetchAll();
			
		
	}
	
}
