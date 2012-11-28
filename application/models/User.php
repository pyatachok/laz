<?php

class Application_Model_User extends My_Model
{

	const USER_AUTO_ID = 14;
	const USER_AUTO_USERNAME = 'auto';
	
	const ROLE_USER = 'user';
	const ROLE_MANAGER = 'manager';
	const ROLE_SUPERVISOR = 'supervisor';
	const ROLE_ADMIN = 'admin';


	function __construct($id = NULL) {
		parent::__construct(new Application_Model_DbTable_Users(array('db' => 'my_db')), $id);
	}
	

	function sendActivationEmail()
	{
		$mail = new My_Mail();
		$mail->addTo($this->_row->email);
		$mail->setSubject('Активация аккаунта');
		$mail->setBodyView('activation', array(
			'user' => $this
		));
		$mail->send();
	}
	
	function sendNewPass($password)
	{
		$mail = new My_Mail();
		$mail->addTo($this->_row->email);
		$mail->setSubject('Восстановление пароля');
		$mail->setBodyView('getnewpass', array(
			'user' => $this,
			'password' => $password
		));
		$mail->send();
	}
	
	/**
	 * Проверяет авторизацию пользователя
	 * @param type $userName
	 * @param type $password
	 * @return boolean
	 */
	function authorize($userName, $password)
	{
		$auth = Zend_Auth::getInstance();

		$authAdapter = new Zend_Auth_Adapter_DbTable(
				Zend_Db_Table::getDefaultAdapter(), 
				'users', 
				'username', 
				'password',
				'sha(?) and activated=1 and role in ("manager", "admin")');
		
		$authAdapter->setIdentity($userName)
				->setCredential($password);
		
		$result = $auth->authenticate($authAdapter);
		if ($result->isValid())
		{
			$storage = $auth->getStorage();
			$storage->write($authAdapter->getResultRowObject(null, array('password')));
			return true;
		}
		return false;
	}
	
	function getByNameEmail($name, $email)
	{
		$this->_row =  $this->_dbTable
				->fetchRow('username = "' . $name . '" AND email="' . $email . '"');
	}
	
	function getRemoteIP() {

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} 
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} 
		else 
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

}

