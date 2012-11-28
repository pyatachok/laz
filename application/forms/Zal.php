<?php

class Application_Form_Zal extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$this->setName('form_zal');
		$this->setMethod('post');
		
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('Название:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addFilter('StringTrim')
				->addFilter('StripTags');
		
		$mest = new Zend_Form_Element_Text('mest');
		$mest->setLabel('Количество мест:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addValidator('Int')
				->addFilter('StripTags')
				->addFilter('StringTrim');
				
		$alias = new Zend_Form_Element_Text('alias');
		$alias->setLabel('Псевдоним(латиницей):')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addValidator('Db_NoRecordExists', false, array('zal', 'alias'))
				->addPrefixPath('My_Validator', 'My/Validator', 'validate')
				->addValidator('AlNumExtended')
				->addFilter('StripTags')
				->addFilter('StringTrim');

		$rows = new Zend_Form_Element_Text('rows');
		$rows->setLabel('Количество рядов :')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addValidator('Int')
				->addFilter('StringTrim');
		
		$rows_parter = new Zend_Form_Element_Text('rows_parter');
		$rows_parter->setLabel('Количество рядов Партер:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('Int')
				->addFilter('StringTrim');
		
		$rows_amph = new Zend_Form_Element_Text('rows_amph');
		$rows_amph->setLabel('Количество рядов Амфитеатр:')
				->addValidator('NotEmpty')
				->setAttrib('class', 'admin-form-element')
				->addValidator('Int')
				->addFilter('StringTrim');
		
		$rows_balc = new Zend_Form_Element_Text('rows_balc');
		$rows_balc->setLabel('Количество рядов Балкон:')
				->addValidator('Int')
				->setAttrib('class', 'admin-form-element')
				->addFilter('StringTrim');
		
		
		
		$colls = new Zend_Form_Element_Text('colls');
		$colls->setLabel('Количество позиций в ряду:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addValidator('Int')
				->addFilter('StringTrim');
		
		$display_width = new Zend_Form_Element_Text('display_width');
		$display_width->setLabel('Ширина схемы в пикселях примерная:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addValidator('Int')
				->addFilter('StringTrim');
		
		$display_height = new Zend_Form_Element_Text('display_height');
		$display_height->setLabel('Высота схемы в пикселях примерная:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addValidator('Int')
				->addFilter('StringTrim');
		
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Submit');
		
		$this->addElements( array( $name, $mest, $alias, $rows, $rows_parter, $rows_amph, $rows_balc, $colls, $display_width, $display_height, $submit  ) );
		
		
	}


}

