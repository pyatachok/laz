<?php
session_start();
include_once '../inc/conf.php';

if($_GET['status'] == 'ok'){
    echo 'Платеж проведен успешно,назовите свое имя оператору на кассе и получите билет';
    exit;
}




$zakaz = $_SESSION['zakaz'];
$allcost = 0;

    if($_POST['PRESENT']>0)
    {
    	$Present = $_POST['PRESENT'];
    	$PresentPrice = 280*$Present;
    }

    foreach($zakaz as $zak){

     mysql_query("INSERT INTO `bron` (`seans`,`mesto`,`ryad`,`zal`,`name`,`tel`,`mail`,`addr`, `SECTOR`, `PRESENT`, `DATE`, `CUPON`) VALUES ('".$_GET['seans']."',".$zak['mesto'].",".$zak['ryad'].",'".$_GET['zal']."','".$_POST['name']."','".$_POST['tel']."','".$_POST['mail']."','".$_POST['addr']."','".$zak['nsector']."','".(($Present>0)?"Y":"N")."','".date("H:i d.m.Y")."', '".$_POST['cupon']."')");
    $allcost += $zak['cost'];
   	$Present--;

    }
unset($_SESSION['zakaz']);

if($_POST['Bron'] == 'Y')
{
    echo '<br /><br /><div align="center"><b>Ваши билеты забронированы</b><br />
    <a href="http://liveanimation.ru/">Вернуться на сайт</a></div>';



$to  = $_POST['mail'];

$subject = 'Театр Живой Анимации';
$message = '
<html>
<head>
  <title>Здравствуйте!</title>
</head>
<body>
<p><b>Здравствуйте!</b></p>
<br /><br />
<p>Вы забронировали билеты. В течение 2 дней с вами свяжутся менеджеры по бронированию для оформления заказа, а также доставки курьером. Если вам не терпится получить ваши билеты, вы можете забрать их самовывозом по адресу: ст.м.Арбатская, ул.Большая Молчановка, 30/7 (Студия рисования песком). В этом случае важно предварительно позвонить и сообщить о своем визите по телефону: 8-926-993-98-00.</p>
<br /><br />
<p><i>С наступающим Новым годом и Рождеством!</i></p>
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
$headers .= 'To: <'.$_POST['mail'].'>' . "\r\n";
$headers .= 'From: Театр Живой Анимации <mazina@antipod-group.ru>' . "\r\n";

mail($to, $subject, $message, $headers);



    exit;
}

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "liveanimation";
$mrh_pass1 = "asRew2ERy";

// номер заказа
// number of order
$inv_id = 0;

// описание заказа
// order description
$inv_desc = "Заказ билета";

// сумма заказа
// sum of order
$out_summ = $allcost+$PresentPrice;

// тип товара
// code of goods
//$shp_item = "3";

// предлагаемая валюта платежа
// default payment e-currency
$in_curr = "WMR";

// язык
// language
$culture = "ru";

// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");

// форма оплаты товара
// payment form
print "<html>".
      "<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>".
      "<input type=hidden name=MrchLogin value=$mrh_login>".
      "<input type=hidden name=OutSum value=$out_summ>".
      "<input type=hidden name=InvId value=$inv_id>".
      "<input type=hidden name=Desc value='$inv_desc'>".
      "<input type=hidden name=SignatureValue value=$crc>".
      "<input type=hidden name=IncCurrLabel value=$in_curr>".
      "<input type=hidden name=Culture value=$culture>".
      "<input type=submit value='Перейти к оплате' style='margin: 200px 200px; height:50px;width:250px;'>".
      "</form></html>";


?>