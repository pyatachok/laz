<?php

/**
 * Description of Login
 *
 * @author pyatachok
 */
class Application_Form_Login  extends Zend_Form
{
	function __construct() 
	{
		$this->setName('login_form');
		
		$userName = new Zend_Form_Element_Text('username');
		$userName->setLabel('Имя Пользователя:');
		
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Пароль:');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Войти');
		
		$this->addElements(array($userName, $password, $submit));
		
		parent::__construct();
	}
	
	
}

