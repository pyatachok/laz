<?php
/**
 * SMTP settings 
 */
ini_set('date.timezone', "Europe/Moscow");
//date.timezone = “Europe/Moscow”
$smtpSettings = array(
	"host"	 => "smtp.liveanimation.ru", //smtp сервер
	"port"	 => 25, //порт (по-умолчанию - 25)
	"username" => "admin@liveanimation.ru", //имя пользователя на сервере
	"password" => "animation", //пароль
	"from" => 'admin@liveanimation.ru',
	"from_name" => 'Live Animation Theatre',
	"charset" => "utf8",
	
);

if ($_SERVER['REMOTE_ADDR'] === '127.0.0.1')
{
	define('ADMINLOGIN', "admin");
	define('PASSWORD', "123");
	define('DBHOST', "localhost");
	define('DBUSER', "root");
	define('DBUSERPASS', "");
	define('DBNAME', "test");
	define('ADMIN_EMAIL', 'piglet.freelancer@gmail.com');
	define('MANAGER_EMAIL', 'piglet.freelancer@gmail.com');
	$smtpSettings["from_name"] = 'Loc';
}
//else
//{
//
//	define('ADMINLOGIN', "admin");
//	define('PASSWORD', "123");
//	define('DBHOST', "localhost");
//	define('DBUSER', "piglet");
//	define('DBUSERPASS', "8R2svQHH");
//	define('DBNAME', "AH001188");
//	define('ADMIN_EMAIL', 'piglet.freelancer@gmail.com');
//	define('MANAGER_EMAIL', 'piglet.freelancer@gmail.com');
//}
else
{
	define('ADMINLOGIN', "Admin");
	define('PASSWORD', "qwerty");
	define('DBHOST', "a54101.mysql.mchost.ru");
//	define('DBUSER', "a54101_1");
//	define('DBUSERPASS', "VF7rV7fBZNj6");
//	define('DBNAME', "a54101_1");
	define('DBUSER', "a54101_2");
	define('DBUSERPASS', "animation");
	define('DBNAME', "a54101_2");
	define('ADMIN_EMAIL', 'piglet.freelancer@gmail.com');
	define('MANAGER_EMAIL', 'piglet.freelancer@gmail.com');
}

$dsn = 'mysql:dbname='.DBNAME.';host='.DBHOST;
$user = DBUSER;
$password = DBUSERPASS;

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

function smtpmail($to, $subject, $body)
{
    global $smtpSettings;
// Create the Transport
	$transport = Swift_SmtpTransport::newInstance($smtpSettings['host'], $smtpSettings['port'])
		->setUsername($smtpSettings['username'])
		->setPassword($smtpSettings['password'])
	;
	$mailer = Swift_Mailer::newInstance($transport);

// Create a message
	$message = Swift_Message::newInstance($subject)
		->setCharset($smtpSettings['charset'])
		->setFrom(array($smtpSettings['from'] => $smtpSettings['from_name']))
		->setTo($to)
		->setBody($body)
	;

// Send the message
	return $result = $mailer->send($message);
}

/**
 * Настройки для робокассы
 */
//логин liveanimation пароль mazzina1
############      Системные функции       #########################

function autoload($className)
{
	$filename = $className . ".php";
	include_once "classes/" . $filename;
}

include_once 'free_libs/zebra_database_2_7_3/Zebra_Database.php';
//include_once ('free_libs/phpmailer/phpmailer.inc.php'); //путь до класса phpmailer
include_once ('free_libs/Swift-4.2.1/lib/swift_required.php');
spl_autoload_register('autoload');


/**
 * Возвращает элемент массива или дефолтное значение
 * @param type $array
 * @param type $index
 * @param type $default
 * @return type 
 */
function safe_get($array, $index, $default = false)
{
	if (is_object($array))
		$array = (array) $array;
	if (isset($array[$index]) && !empty($array[$index]))
	{
		return trim($array[$index]);
	}
	else
	{
		return $default;
	}
}

	
function get_static_variable($name, $default)
{
	global $dbh;
	
	$sth = $dbh->prepare("
SELECT *
FROM static_variables
WHERE name = ? ");
$sth->execute(array($name));
return  ( false === $sth ? $default : $sth->fetchObject()->value );
}


