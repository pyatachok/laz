<?php

/**
 * Description of Login
 *
 * @author pyatachok
 */
class Application_Form_Hello  extends Zend_Form
{
	function __construct() 
	{
		$this->setName('hello_form');
		
		$dir = new Zend_Form_Element_Text('dir');
		$dir->setLabel('Имя Пользователя:');
		
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Пароль:');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Войти');
		
		$this->addElements(array($dir, $password, $submit));
		
		parent::__construct();
	}
	
	
}

