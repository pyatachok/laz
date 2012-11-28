<?php
include_once 'inc/conf.php';
include_once 'inc/rfc822.php';
header('Content-Type: text/html; charset=utf-8');

$data = safe_get($_POST, 'data', '');
$fio = safe_get($_POST, 'fio', '');
$kolvo = safe_get($_POST, 'kolvo', '');
$tel = safe_get($_POST, 'tel', '');
$email = safe_get($_POST, 'email', '');
$dostavka = safe_get($_POST, 'dostavka', '');

if ('' == $email)
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
if (1 != is_valid_email_address($email)) 
{
    exit('E-mail не прошел проверку!');
}


$newOrder = new stdClass();
$newOrder->type = Order::TYPE_BOOKED;
$newOrder->fio = $fio;
$newOrder->email = $email;
$newOrder->adress = $tel;
$newOrder->create_date = date('Y-m-d H:i:s', time());
$newOrder->modify_date = date('Y-m-d H:i:s', time());
$newOrder->seans_id = safe_get($_POST, 'seans_id', '');
$newOrder->presents_count = safe_get($_POST, 'presents_count', 0);
$newOrder->seats_ids = explode(',', safe_get($_POST, 'seats_ids', ''));
$newOrder->seats_rows_ids = explode(',', safe_get($_POST, 'seats_rows_ids', ''));
$newOrder->tel = $tel;
$newOrder->dostavka = $dostavka;


$orderClass = new Order();
$seansClass = new Seans();

$seans = $seansClass->getById($newOrder->seans_id);

{
	//Противостоим дублированию заказов
	//Если хоть один из билетов не свободен, то редирект на страницу покупки билетов
	if ( !$seansClass->checkSeatsEmpty( safe_get($_POST, 'seats_ids', '') ) )
	{
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;
	}
	
}

$newOrder->id = $orderClass->saveOrder($newOrder);

$address = array('svbabin@antipod-group.ru', 'arbat@sandproject.ru', 'mazina@antipod-group.ru',ADMIN_EMAIL, 'piglet.freelancer@vega.com.ua');
$data = $seans->date;




smtpmail(array('piglet.freelancer@gmail.com', 'mazina@antipod-group.ru'), 'DEBUG: send4.php', var_export(array($_REQUEST, $_SERVER, $newOrder), true));

if ('buy' == safe_get($_REQUEST, 'action'))
{
	if (false !== $newOrder->id)
	{
		$sub = "Покупка билетов с сайта Live Animation '{$seans->name}'";
		$mes = "Человек по имени: $fio \n
Совершает попытку приобретения билетов на  '{$seans->name}'\n
Дата/сеанс: $data \n
Количество билетов: $kolvo \n 
Телефон: $tel \n 
Электронная почта: $email \n 
Адрес доставки: $dostavka";

		smtpmail($address, $sub, $mes);
		$presents = ( !empty($newOrder->presents_count) ? " + " . $newOrder->presents_count : '' );
		$merchSys = new Robokassa();
		$merchSys->setOrder(
				$newOrder->id, 
				'Оплата билетов в Театр живой анимации. Постановка: '.$seans->name, 
				$newOrder->amount, 
				safe_get($_POST, 'seats_rows_ids', '')
				);
		echo $merchSys->generatePaymentForm();
	}
}
else
{
	

	$sub = "Заказ билетов с сайта Live Animation '{$seans->name}'";
	$mes = "Человек по имени: $fio \n
Желает заказать билет(ы) на  '{$seans->name}'\n
Дата/сеанс: $data \n
Количество билетов: $kolvo \n 
Телефон: $tel \n 
Электронная почта: $email \n 
Адрес доставки: $dostavka";
        
$verify = smtpmail($address, $sub, $mes);
if ($verify )
{
echo "<h2>Ваши билеты забронированы. Ожидайте звонка оператора.</h2>";
}
else
{
echo "<h2>Сообшение не отправлено</h2>";
}


$address2 = "$email";
$sub2 = "Live Animation: заказ билетов ";
$mes2 = "Добрый день! \n
Вы заказали билеты на '{$seans->name}'. В ближайшее время наши специалисты свяжутся с вами. \n
Спасибо за интерес к нашему проекту!
________________________________________ \n
Театр Живой Анимации | Отдел продаж
+7 (495) 785-61-95 | +7 (926) 993-98-00.

www.liveanimation.ru";
if ('' == $address2)
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
$verify2 = smtpmail ($address2, $sub2, $mes2);
//$smtp['charset'] = 'utf8';
}

?>
<html>
	<head>
		<script type="text/javascript" src="zal/admin/js/jquery-ui-1.8.24.custom/js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#payment-form').submit();

			})
		</script>
		<style>
			
body {
	color: #350e00;
	/*padding:2% 0 0;*/ 
	position: relative; 
	/*bottom: 25px;*/ 
	background:#FFF; 
	font-family:"Times New Roman", Times, serif; 
	background:url(img/bg.jpg); 
	/*background-position: center;*/ 
/*	background-position: 100% 70%; */
	
	background-repeat:repeat;
	
}
		</style>
	</head>
	<body>
		
	</body>
</html>





