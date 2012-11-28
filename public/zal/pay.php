<?php
include_once '../inc/conf.php';
header('Content-Type: text/html; charset=utf8');

//echo "<pre>REQUEST ";
//var_dump($_REQUEST);
//echo "</pre>";

$orderId = safe_get($_POST, 'inv_id');

if (false === $orderId)
{
	exit;
}

$orderClass = new Order();
$order = $orderClass->getById($orderId);
//
//echo "<pre>";
//var_dump($order);
//echo "</pre>";

if ($_GET['status'] == 'ok')
{
	//изменить состояние заказа на buy
	$orderClass->updateOrder($orderId, 'type', Order::TYPE_PAYED);
	$orderClass->markSeatsAsState($order->seats, Order::SEATE_soled, $order->zal_alias);
	echo 'Платеж проведен успешно, назовите свое имя оператору на кассе и получите билет';
	
	?>
<!-- Offer Conversion: Театр Живой Анимации - Каникулы Бонифация -->
<iframe src="http://track.clickrocket.net/SL2" scrolling="no" frameborder="0" width="1" height="1"></iframe>
<!-- // End Offer Conversion -->
	<?php
	
	exit;
}
if ($_GET['status'] == 'fail')
{
	$orderClass->updateOrder($orderId, 'type', Order::TYPE_CANCEL);

	$orderClass->markSeatsAsState($order->seats, Order::SEATE_free, $order->zal_alias);
	//изменить состояние заказа на cansel
	echo 'К сожалению не удалось провести платеж, ваш заказ отменен.';
	exit;
}
?>
<html>
	<head>
		<style>
			
body {
	color: #350e00;
	/*padding:2% 0 0;*/ 
	position: relative; 
	bottom: 25px; 
	background:#FFF; 
	font-family:"Times New Roman", Times, serif; 
	background:url(img/bg.jpg); 
	background-position: center; 
/*	background-position: 100% 70%; */
	
	background-repeat:repeat-x, repeat-y;
	
}
		</style>
	</head>
	<body>
		
	</body>
</html>



