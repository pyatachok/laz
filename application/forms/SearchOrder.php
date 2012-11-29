<?php

class Application_Form_SearchOrder extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$this->setName('form_search_order');
		$this->setMethod('get');
		
		$id = new Zend_Form_Element_Text('id');
		$id->setLabel('Номер заказа:');
		
		$fio = new Zend_Form_Element_Text('fio');
		$fio->setLabel('Ф.И.О:');
		
		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('E-mail:');
		
		$tel = new Zend_Form_Element_Text('tel');
		$tel->setLabel('Телефон:');
		
		$dostavka = new Zend_Form_Element_Text('dostavka');
		$dostavka->setLabel('Адресс доставки:');
		
		$zal_alias = new Zend_Form_Element_Select('zal_alias');
		$zal_alias->setLabel('Зал')
				->setOptions(array('multioptions' => $this->_getZalOptions()));
		
		$date_from = new Zend_Form_Element_Text('date_from');
		$date_from->setLabel('Дата Создания от:')->setValue(date('Y-m-d'));
		
		$date_to = new Zend_Form_Element_Text('date_to');
		$date_to->setLabel('Дата Создания до:')->setValue(date('Y-m-d'));
		
		$seans_id = new Zend_Form_Element_Select('seans_id');
		$seans_id->setLabel('Сеанс')
				->setOptions(array('multioptions' =>  $this->_getSeansOptions()));
		
		$is_present = new Zend_Form_Element_Checkbox('is_present');
		$is_present->setLabel('С Подарком:');
		
		$order = new Application_Model_Order();
		$types = $order->types;

		$type_id = new Zend_Form_Element_Multiselect('type_id');
		$type_id->setLabel('Тип заказа:')
				->setOptions(array('multioptions' => $types));
		
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Искать');
		
		$this->addElements( array( 
			$id, 
			$fio, 
			$email, 
			$tel,
//			$type_id,
			$dostavka, 
			$zal_alias, 
			$seans_id, 
			$is_present, 
			$date_from,
			$date_to,
			$submit  
			) );
		
		
	}


	private function _getZalOptions()
	{
		$result = array('' => 'Не выбран');
		$zal = new Application_Model_Zal();
		$zals = $zal->getAll();
		
		foreach ($zals as $key => $zalObj) 
		{
			if ( !empty( $zalObj->alias ) )
				$result[$zalObj->alias] = $zalObj->name . "(" .$zalObj->alias . ")";
		}
		
		return $result;
	}
	
	private function _getSeansOptions()
	{
		$result = array('' => 'Не выбран');
		$seans = new Application_Model_Seans();
		$seanses = $seans->getAll();
		
		foreach ($seanses as $key => $seansObj) 
		{
			if ( !empty( $seansObj->id ) )
				$result[$seansObj->id] = $seansObj->name . "(" .$seansObj->date . ")";
		}
		
		return $result;
	}
	

}

