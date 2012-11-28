<?php
//session_start();
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

require_once 'Zend/Controller/Front.php';
$frontController = Zend_Controller_Front::getInstance();
$frontController->throwExceptions(true);

if ( preg_match('#/public/admin/#', $_SERVER['REQUEST_URI']) > 0)
{
	$frontController->setBaseUrl('/public/admin');
	
} 
else if ( preg_match('#/admin/#', $_SERVER['REQUEST_URI']) > 0)
{
	$frontController->setBaseUrl('/admin');
}
$frontController->setControllerDirectory('/application/controllers');

// Create application, bootstrap, and run
//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();