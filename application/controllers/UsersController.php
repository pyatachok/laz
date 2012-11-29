<?php

class UsersController extends Zend_Controller_Action {

	function indexAction() 
	{
		$this->view->title = 'Список пользователей.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$user = new Application_Model_User();
		$this->view->users = $user->getAll();
		
		$paginator = Zend_Paginator::factory($this->view->users);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$paginator->setItemCountPerPage(10);
		$this->view->paginator = $paginator;
		
	}
	
	function addAction() 
	{
		$this->view->title = 'Добавить нового пользователя.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		$form = new Application_Form_User();
		$this->view->form = $form;
		
		if ( $this->getRequest()->isPost() )
		{
			if ( $form->isValid($this->getRequest()->getPost()) )
			{
				$user = new Application_Model_User();
				$user->fill($form->getValues());
				$user->created = date('Y-m-d H-i-s', time());
				$user->modified = date('Y-m-d H-i-s', time());
				$user->password = sha1($user->password);
				$user->code = uniqid();
				
				$user->save();
				
				$this->_logUser(Application_Model_LogVariants::ADD_USER, $user);
				$this->_helper->redirector('index');
			}
		}
	}
	
	function deleteAction() 
	{
		$this->view->title = '';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$user = new Application_Model_User($id);
		
		$this->_logUser(Application_Model_LogVariants::DELETE_USER, $user);
		$user->delete();
		$this->_helper->redirector('index');
		
	}
	
	function viewAction() 
	{
		$this->view->title = 'Просмотр данных пользователя.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$user = new Application_Model_User($id);
		$this->view->user = $user;
		
	}
	
	function editAction() 
	{
		$this->view->title = 'Редактирование данных пользователя.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$user = new Application_Model_User($id);
		
		$oldUser = new stdClass();
		$oldUser->username = $user->username;
		$oldUser->fio = $user->fio;
		$oldUser->email = $user->email;
		$oldUser->role = $user->role;
		
		$form = new Application_Form_User();
		$form->removeElement('password');
		if ( $this->getRequest()->isPost() )
		{
			if ( $form->isValid($this->getRequest()->getPost()) )
			{
				$user->fill($form->getValues());
				$user->modified = date('Y-m-d H-i-s', time());
				$user->save();
				
				$this->_logUser(Application_Model_LogVariants::EDIT_USER, $user, $oldUser);
				$this->_helper->redirector('index');
			}
		}
		else
		{
			$form->populate($user->populateForm());
		}
		$this->view->form = $form;
	}
	
	
	function registrationAction() 
	{
		$this->view->title = 'Регистрация нового пользователя.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		$form = new Application_Form_Registration();
		$this->view->form = $form;
		$this->view->send = false;
		
		if ( $this->getRequest()->isPost() )
		{
			if ( $form->isValid($this->getRequest()->getPost()) )
			{
				$user = new Application_Model_User();
				$user->fill($form->getValues());
				$user->created = date('Y-m-d H-i-s', time());
				$user->password = sha1($user->password);
				$user->role = Application_Model_User::ROLE_USER;
				$user->code = uniqid();
				
				$this->_logUser(Application_Model_LogVariants::REGISTER_USER, $user);
				$user->save();
				
				$user->sendActivationEmail();
				
				$this->view->send = true;
				$this->_helper->redirector('index');
			}
		}
	}
	
	function getnewpassAction() 
	{
		$this->view->title = 'Восстановление пароля пользователя.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		$form = new Application_Form_Registration();
		$form->removeElement('password');
		$form->removeElement('password_confirm');
		$form->removeElement('fio');
		$username = $form->getElement('username');
		$form->addElement($username->removeValidator('Db_NoRecordExists'));
		$this->view->form = $form;
		
		if ( $this->getRequest()->isPost() )
		{
			if ( $form->isValid($this->getRequest()->getPost()) )
			{
				$password = uniqid();
				
				$user = new Application_Model_User();
				$user->getByNameEmail($form->getValue('username'), $form->getValue('email'));

				if (!isset($user->getRow()->id))
				{
					$this->_helper->redirector('index');
				}
				$user->modified = date('Y-m-d H-i-s', time());
				$user->password = sha1($password);
//				$user->code = uniqid();
				
				$user->save();
				
				$user->sendNewPass($password);
				
				$this->_logUser(Application_Model_LogVariants::GET_NEW_PASSWORD, $user);
				
				$this->_helper->redirector('index');
			}
		}
	}
	
	function confirmAction()
	{
		$this->view->title = 'Подтверждение Активации Аккаунта.';
		$this->view->headTitle($this->view->title, 'PREPEND');
		$user_id = $this->_getParam('id');
		$user_code = $this->_getParam('code');
		
		$user = new Application_Model_User($user_id);
		
		if ($user->activated)
		{
			$this->view->message = 'Ваш аккаунт уже активирован!';
		}
		else
		{
			if ( $user_code == $user->code)
			{
				$user->activated = true;
				$user->modified = date('Y-m-d H-i-s', time());
				$user->save();
				
				$this->_logUser(Application_Model_LogVariants::CONFIRM_USER, $user);
				$this->view->message = 'Ваш аккаунт успешно активирован';
			}
			else
			{
//				var_export(array($user_code, $user->code));
				$this->view->message = 'Неверные данные активации';
			}
		}
	}
	
	
	function activateAction() 
	{
		$this->view->title = '';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$user = new Application_Model_User($id);
		$user->activated = true;
		$user->modified = date('Y-m-d H-i-s', time());
		$user->save();
		
		$this->_logUser(Application_Model_LogVariants::ACTIVATE_USER, $user);
		$this->_helper->redirector('index');
		
	}

	function resendAction() 
	{
		$this->view->title = '';
		$this->view->headTitle( $this->view->title, 'PREPEND' );

		$id = $this->_getParam('id');
		$user = new Application_Model_User($id);

		$user->modified = date('Y-m-d H-i-s', time());
		$user->code = uniqid();
		$user->save();
		
		$this->_logUser(Application_Model_LogVariants::RESEND_ACTIVATION, $user);
		$user->sendActivationEmail();

		$this->_helper->redirector('index');

	}
	
	function loginAction()
	{

		$this->view->title = 'Форма входа.';
		$this->view->headTitle($this->view->title, 'PREPEND');
		$form = new Application_Form_Login();
		$this->view->form = $form;
		$this->view->identity = Zend_Auth::getInstance()->getIdentity();

		
		if ( $this->getRequest()->isPost() )
		{
			if ( $form->isValid($this->getRequest()->getPost()) )
			{
			
				$user = new Application_Model_User();
				if ( $user->authorize($form->getValue('username'), $form->getValue('password')) )
				{
					$this->_helper->redirector('index');
				}
				else
				{
					$this->view->error = "Неверные данные авторизации";
				}
			}
		}
		
	}
	function logoutAction()
	{
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();
		$this->_helper->redirector('index');
		
	}
	
	
	protected function _logUser($type, $userObj, $oldUser = false)
	{
		
		$userId = ( is_null(Zend_Auth::getInstance()->getIdentity() ) 
				? Application_Model_User::USER_AUTO_ID 
				: Zend_Auth::getInstance()->getIdentity()->id);
		$user = new Application_Model_User($userId);
		
		$logInfo = array(
			'action_date' => date('Y-m-d H:i:s', time()),
			'log_variant_id' => $type,
			'remote_ip' => $user->getRemoteIP(),
			'user_id' => $user->id,
			);
		
		switch ($type) {
			case Application_Model_LogVariants::ACTIVATE_USER :
				$logInfo['log_message'] = '<p class="logs">Активация аккаунта <b>'.$userObj->username.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::ADD_USER :
				$logInfo['log_message'] = '<p class="logs">Добавлен новый пользователь <b>'.$userObj->username.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::CONFIRM_USER :
				$logInfo['log_message'] = '<p class="logs">Подтверждение активации <b>'.$userObj->username.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::DELETE_USER :
				$logInfo['log_message'] = '<p class="logs">Удален юзер <b>'.$userObj->username.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::GET_NEW_PASSWORD :
				$logInfo['log_message'] = '<p class="logs">Восстановление пароля <b>'.$userObj->username.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::EDIT_USER :
				$logInfo['log_message'] = '<p class="logs">Редактирование юзера <b>'.$userObj->username.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::REGISTER_USER :
				$logInfo['log_message'] = '<p class="logs">Зарегистрирован юзер <b>'.$userObj->username.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::RESEND_ACTIVATION :
				$logInfo['log_message'] = '<p class="logs">Повторная отправка активационного письма <b>'.$userObj->username.'</b>.<br/>';
				break;
		}
		
		$logInfo['log_message'] .= '
Ник: '.(isset($oldUser->username) ? '<i>'.$oldUser->username.'</i> --> ' : '').'<b>' . $userObj->username . '</b><br/>
Ф.И.О.: '.(isset($oldUser->fio) ? '<i>'.$oldUser->fio.'</i> --> ' : '').'<b>' . $userObj->fio . '</b><br/>
E-mail: '.(isset($oldUser->email) ? '<i>'.$oldUser->email.'</i> --> ' : '').'<b>' . $userObj->email . '</b><br/>
Роль: '.(isset($oldUser->role) ? '<i>'.$oldUser->role.'</i> --> ' : '').'<b>' . $userObj->role . '</b><br/>
Дата создания: <b>' . $userObj->created . '</b><br/>
Дата модификации: <b>' . $userObj->modified . '</b><br/>
Активирован: <b>' .( $userObj->activated ? 'Да' : 'Нет' ). '</b><br/>
</p>';
			$log = new Application_Model_Logs();
			$log->fill($logInfo);

			$log->save();
	}
	
}