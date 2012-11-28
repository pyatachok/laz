<?php

class Application_Form_Seans extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$this->setName('form_seans');
		$this->setMethod('post');
		
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('Название:')
				->setRequired(true)
				->addValidator('NotEmpty')
				->addFilter('StringTrim')
				->setAttrib('class', 'admin-form-element')
				->addFilter('StripTags');
		
		$seans_date = new Zend_Form_Element_Text('seans_date');
		$seans_date->setLabel('Дата:')
				->setRequired(true)
				->addValidator('NotEmpty')
				->addFilter('StringTrim')
				->setAttrib('class', 'admin-form-element')
				->addFilter('StripTags');
		
		$zal_alias = new Zend_Form_Element_Select('zal_alias');
		$zal_alias->setLabel('Зал')
				->setRequired(true)
				->addValidator('NotEmpty')
				->setAttrib('class', 'admin-form-element')
				->setOptions(array('multioptions' => $this->_getZalOptions()));
		
		$is_strickt_seat = new Zend_Form_Element_Checkbox('is_strickt_seat');
		$is_strickt_seat->setLabel('Строгий порядок мест:');
		
		$present_price = new Zend_Form_Element_Text('present_price');
		$present_price->setLabel('Стоимость подарка:')
				->setAttrib('class', 'price')
				->addFilter('StripTags')
				->addFilter('StringTrim');		
		$alias = new Zend_Form_Element_Text('alias');
		$alias->setLabel('Псевдоним(латиницей):')
				->setRequired(true)
				->addValidator('NotEmpty')
				->addPrefixPath('My_Validator', 'My/Validator', 'validate')
				->addValidator('AlNumExtended')
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->setAttrib('class', 'admin-form-element');
		
		$is_present = new Zend_Form_Element_Checkbox('is_present');
		$is_present->setLabel('Подарки:');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Submit');
		
		$this->addElements( array( $name, $seans_date, $zal_alias, $is_strickt_seat, $is_present, $present_price, $alias, $submit  ) );
		
		
	}


	private function _getZalOptions()
	{
		$result = array();
		$zal = new Application_Model_Zal();
		$zals = $zal->getAll();
		
		foreach ($zals as $key => $zalObj) 
		{
			if ( !empty( $zalObj->alias ) )
				$result[$zalObj->alias] = $zalObj->name . "(" .$zalObj->alias . ")";
		}
		
		return $result;
	}
}

