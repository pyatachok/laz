<?php

class Application_Form_Registration extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$this->setName('form_registration');
		$this->setMethod('post');
		$userName = new Zend_Form_Element_Text('username');
		$userName->setLabel('Имя Пользователя(username - латиницей):')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addPrefixPath('My_Validator', 'My/Validator', 'validate')
				->addValidator('AlNumExtended')
				->addValidator('Db_NoRecordExists', false, array('users', 'username'))
				->addFilter('StringTrim')
				->addFilter('StripTags');
		
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Пароль:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty');
		
		$password_confirm = new Zend_Form_Element_Password('password_confirm');
		$password_confirm->setLabel('Подтверждение Пароля:')
				->setRequired(true)
				->setAttrib('class', 'admin-form-element')
				->addValidator('NotEmpty')
				->addPrefixPath('My_Validator', 'My/Validator', 'validate')
				->addValidator('PasswordConfirm');
		
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
		
		$this->addElements( array( $userName, $password, $password_confirm, $email, $fio, $submit  ) );
		
		
	}


}

