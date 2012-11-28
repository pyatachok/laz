<?php

class SchemeController extends Zend_Controller_Action
{

    public function indexAction()
    {
        // action body
    }
    
	public function viewAction()
    {
        $this->view->title = 'Просмотр Схемы зала.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$zal_alias = $this->_getParam('zal_alias');
		$seans_id = $this->_getParam('seans_id');
		$scheme = new Application_Model_Scheme($zal_alias, $seans_id);
		$this->view->scheme = $scheme;
    }
	
	function editAction()
	{
		$this->view->title = 'Редактирование схемы.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		$zal_alias = $this->_getParam('zal_alias');
		$seans_id = $this->_getParam('seans_id');
		if (!empty($seans_id))
		{
			$seans = new Application_Model_Seans($seans_id);
			$seans->getPricesBySeans();
		}
		else
		{
			$seans = new stdClass();
			$seans->is_strickt_seat = 0;
			$seans->is_default = true;
			$seans->id = Application_Model_Scheme::DEFAULT_SEANS;
			$seans->prices = array();
		}
		
		$zal = new Application_Model_Zal();
		$zal = $zal->getByAlias($zal_alias);

		$scheme = new Application_Model_Scheme($zal_alias, $seans->id);
		
		$this->view->scheme = $scheme->getAll();
		$this->view->zal = $zal;
		$this->view->seans = $seans;
		
		$this->view->rows = $this->_getRows($this->view->scheme);
		$this->view->ticket_rows = $this->_getRows($this->view->scheme, true);
		$this->view->hall_parts = array_flip($scheme->hall_parts);
		$this->view->ticket_states = $scheme->ticketStates;
		$this->view->place_types = $scheme->placeTypes;
		
		$this->view->prices = $seans->prices;
		
	}
	function viewschemeAction()
	{
		$this->view->title = 'Просмотр схемы.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		$zal_alias = $this->_getParam('zal_alias');
		$seans_id = $this->_getParam('seans_id');
		if (!empty($seans_id))
		{
			$seans = new Application_Model_Seans($seans_id);
			$seans->getPricesBySeans();
		}
		else
		{
			$seans = new stdClass();
			$seans->is_strickt_seat = 0;
			$seans->is_default = true;
			$seans->id = Application_Model_Scheme::DEFAULT_SEANS;
			$seans->prices = array();
		}
		
		$zal = new Application_Model_Zal();
		$zal = $zal->getByAlias($zal_alias);

		$scheme = new Application_Model_Scheme($zal_alias, $seans->id);
		
		$this->view->scheme = $scheme->getAll();
		$this->view->zal = $zal;
		$this->view->seans = $seans;
		
		$this->view->rows = $this->_getRows($this->view->scheme);
		$this->view->ticket_rows = $this->_getRows($this->view->scheme, true);
		$this->view->hall_parts = array_flip($scheme->hall_parts);
		$this->view->ticket_states = $scheme->ticketStates;
		$this->view->place_types = $scheme->placeTypes;
		
		$this->view->prices = $seans->prices;
		
	}

	
	private function _getRows($scheme, $forTicket = false)
	{
		$resultArray = array();
		foreach ($scheme as $part => $partScheme) 
		{
			foreach ($partScheme as $row_id => $row) 
			{
				if ( !$forTicket)
				{
					$resultArray[$part][] = $row_id;
				}
				else 
				{
					$resultArray[$part][$row_id] = $row[1]->ticket_row;
				}
			}
		}
		
		return $resultArray;
	}
}

