<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initViewHelpers()
	{
		date_default_timezone_set('Europe/Moscow');
        Zend_Layout::startMvc();
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		
		$options = $this->getOption('resources');
        $options = $options['view'];
		
		$view = new Zend_View($options);
		
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
		$view->headTitle('Liveanimation');
		$view->headTitle()->setSeparator(' :: ');

		if ( !Zend_Auth::getInstance()->hasIdentity() )
		{
			$view->identity = false;
		} else {
			$view->identity = Zend_Auth::getInstance()->getIdentity();
		}
		
		
        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer->setView($view);
		Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
		
		$viewJs = (isset($options['js'])) ? $options['js'] : array();
        foreach ($viewJs as $name => $file) {
            $view->headScript()->appendFile($file);
        }

        $viewCss = (isset($options['css'])) ? $options['css'] : array();
        foreach ($viewCss as $name => $file) {
            $view->headLink()->appendStylesheet($file);
        }
		
		$view->login_form = new Application_Form_Login();
		
		$layout->setView($view);
		
//		return $layout;
	}
	
	protected function _initAutoload()
	{
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace(array('My_'));
		$autoloader->suppressNotFoundWarnings(true);
		$options = $this->getOption('resources');
        $options = $options['db']['params'];
		
		$db = Zend_Db::factory('PDO_MYSQL', $options);
		Zend_Registry::set('my_db', $db);
		
		$db->query('SET NAMES utf8');
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
	}
	
	protected function _initEmail()
	{
		$email_config = array(
			'auth' => 'plain',
//			'ssl' => 'tls',
			"host"	 => "smtp.liveanimation.ru", //smtp сервер
			"port"	 => 25, //порт (по-умолчанию - 25)
			"username" => "admin@liveanimation.ru", //имя пользователя на сервере
			"password" => "animation", //пароль
			"from" => 'admin@liveanimation.ru',
			"from_name" => 'Live Animation Theatre',
			"charset" => "utf8",

		);
		
		$transport = new Zend_Mail_Transport_Smtp($email_config['host'], $email_config);
		
		Zend_Mail::setDefaultTransport($transport);
	}
	
//	protected function _initIdentity()
//	{
//		$options = $this->getOption('resources');
//        $options = $options['view'];
//		
//		$view = new Zend_View($options);
//		
//		if (! Zend_Auth::getInstance()->hasIdentity()) 
//		{
//			$view->identity = false;
//		}
//		else 
//		{
//			$view->identity = Zend_Auth::getInstance()->getIdentity();
//		}
//	}
	
	
	protected function _initAcl()
	{
		// Создаём объект Zend_Acl
		$acl = new Zend_Acl();		
		
		// Добавляем ресурсы нашего сайта, другими словами указываем контроллеры и действия
		
        $acl->addResource('index');
		// указываем, что у нас есть ресурс order
        $acl->addResource('order');
        
		// указываем, что у нас есть ресурс users
        $acl->addResource('users');
        
		// ресурс bron 
        $acl->addResource('bron');
		
		// указываем, что у нас есть ресурс error
        $acl->addResource('error');
		
		// ресурс scheme 
        $acl->addResource('scheme');
		
		// ресурс seans 
        $acl->addResource('seans');
		
		// ресурс zal 
        $acl->addResource('zal');
		
		// ресурс faq 
        $acl->addResource('faq');
		
        $acl->addResource('staticvariables');
        
		$acl->addResource('logs');
		
		// ресурс helloworld 
        $acl->addResource('helloworld');
		
		// далее переходим к созданию ролей, которых у нас 5:
        // user (неавторизированный пользователь)
		$acl->addRole('guest');
        $acl->addRole('user', 'guest');
        
        // reseler, который наследует доступ от user
        $acl->addRole('reseler', 'user');
        
        // manager, который наследует доступ от reseler
        $acl->addRole('manager', 'reseler');
        
        // supervisor, который наследует доступ от manager
        $acl->addRole('supervisor', 'manager');
        
        // admin, который наследует доступ от supervisor
        $acl->addRole('admin', 'supervisor');
        
		// разрешаем user просматривать ресурс users
        $acl->allow('guest', 'users', array('registration', 'login', 'logout', 'confirm', 'getnewpass'));
        $acl->allow('user', 'users', array('registration', 'login', 'logout', 'confirm'));
        
        // разрешаем reseler просматривать ресурс zal и его подресурсы
        $acl->allow('reseler', 'zal', array('index', 'viewscheme'));
        
		// разрешаем reseler просматривать ресурс seans и его подресурсы
        $acl->allow('reseler', 'seans', array('index'));
        
		// разрешаем reseler просматривать ресурс scheme и его подресурсы
        $acl->allow('reseler', 'scheme', array('view'));
        
		// разрешаем manager просматривать ресурс order и его подресурсы
        $acl->allow('manager', 'order', array('index', 'buy', 'cancel', 'delete', 'rebook', 'sendtodelivery'));
        $acl->allow('manager', 'faq', array('index'));
        $acl->allow('manager', 'scheme', array('viewscheme'));
        
		// разрешаем supervisor просматривать ресурс seans и его подресурсы
//        $acl->allow('supervisor', 'seans', array('edit'));
        
		// разрешаем supervisor просматривать ресурс scheme и его подресурсы
//        $acl->allow('supervisor', 'scheme', array('edit'));
        $acl->allow('supervisor', array('seans', 'scheme', 'zal', 'index' ));
        
        // даём администратору доступ к ресурсам 'add', 'edit' и 'delete'
        $acl->allow('admin', array('order', 'seans', 'scheme', 'users', 'zal', 'index', 'bron' ));
        
        // разрешаем администратору просматривать страницу ошибок
        $acl->allow('admin', 'error');
        $acl->allow('admin', 'staticvariables');
        $acl->allow('admin', 'logs');
        $acl->allow('admin', 'helloworld');
        
		
		// получаем экземпляр главного контроллера
        $fc = Zend_Controller_Front::getInstance();
        
        // регистрируем плагин с названием AccessCheck, в который передаём
        // на ACL и экземпляр Zend_Auth
        $fc->registerPlugin(new Application_Plugin_AccessCheck($acl, Zend_Auth::getInstance()));
	}
}

