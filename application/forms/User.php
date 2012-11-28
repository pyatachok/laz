<?php

class Application_Form_User extends Zend_Form
{
	const USER_ROLE = 1;
	const ADMIN_ROLE = 2;
	const MANAGER_ROLE = 3;
	const RESELLER_ROLE = 4;

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$this->setName('form_user');
		$this->setMethod('post');
		$userName = new Zend_Form_Element_Text('username');
		$userName->setLabel('Имя Пользователя(username - латиницей):')
				->setRequired(true)
				->addValidator('NotEmpty')
				->setAttrib('class', 'admin-form-element')
				->addPrefixPath('My_Validator', 'My/Validator', 'validate')
				->addValidator('AlNumExtended')
				->addFilter('StringTrim')
				->addFilter('StripTags');
		
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Пароль:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty');
		
		$role = new Zend_Form_Element_Select('role');
		$role->setLabel('Роль')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->setOptions(array('multioptions' => $this->_getRoleOptions()));
		
		$fio = new Zend_Form_Element_Text('fio');
		$fio->setLabel('Ф.И.О. Пользователя:')
				->addFilter('StringTrim')
				->setAttrib('class', 'admin-form-element')
				->addFilter('StripTags');
		
		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('E-mail:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('EmailAddress');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Submit');
		
		$this->addElements( array( $userName, $password, $role, $fio, $email, $submit  ) );
		
		
	}

	private function _getRoleOptions()
	{
		return array (
			'user' => 'user',
			'admin' => 'admin',
			'manager' => 'manager',
			'reseler' => 'reseler',
			'supervisor' => 'supervisor',
				
				);
	}

	
	
	
	
}

