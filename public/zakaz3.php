<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<title>Заказ билетов</title>
<link href="zakaz3.css" rel="stylesheet" type="text/css" />

<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.anons');
</script>
<![endif]-->
<script language="JavaScript" src="js/scripts.js"></script>
</head>

<body>
<div id="container">

<?php include_once ("blocks/header.php"); ?>

<div id="main">
<?php include_once ("blocks/menu_no_pl.php"); ?>

<div align="left">

<div style="margin-top:10px;"> 
  <div align="left"> 
<h1 style="color:#fff; font-weight:bold; font-size:18px; margin-bottom:10px; margin-left:70px; padding-top:30px;">Заказать билет с оплатой наличными:</h1>
   <fieldset style="border:none; width:300px; float:left;">
<form action="send3.php" method="post" name="forma" target="_blank" style="margin-left:70px;">

       Дата/сеанс *  
 <br />
       <input type="text" name="data" size="55" maxlength="25" />  
        <br />
       Количество билетов *  
        <br />
       <input type="text" name="kolvo" size="55" maxlength="25" />  
        <br />
       Ф.И.О. *  
        <br />
       <input type="text" name="fio" size="55" maxlength="25" />  
        <br />
       Телефон *  
        <br />
       <input type="text" name="tel" size="55" maxlength="25" />  
        <br />
       Электронная почта *  
        <br />
       <input type="text" name="email" size="55" maxlength="25" />  
        <br />
       Адрес доставки *  
        <br />
       <input type="text" name="dostavka" size="55" maxlength="100" />  
        <br />
       
       <div style="float:left;"><input type="image" width="101" height="26" border="0" src="img/send.png" name="knopka" style="margin-top:5px;" /></div>
<div align="right" style="width:363px; padding-top:5px;"><a style="color:#ef092a; font-weight:normal; font-size:22px; text-decoration:underline;" href="javascript:;" onClick="javascript:showPic('img/ostankino_korolevskiy.jpg','Схема зала','735','580')">Схема зала</a></div>
        <br />
       </form></fieldset></div>
 
  <p> 
    <br />
   </p>
 

<p style="margin-left:610px; font-size:14px; position:relative; top:-45px; color:#fff;"><font class="Apple-style-span" size="4">Стоимость билетов:</font> <span style="color:#000;">1500 рублей.</span></p><br /> 
<p style="margin-left:610px; font-size:14px; position:relative; top:-35px; color:#fff;"><font class="Apple-style-span" size="4">Для групп предоставляются скидки!</font></p><br />
 
<p style="margin-left:610px; font-size:14px; position:relative; top:-10px;">По вопросам приобретения Билетов обращайтесь <br />по телефонам 8 (495) <span class="tel">785-61-95</span> или +7 (926) 616-19-18.</p><br />

<span style="margin-left:310px; color:#fff;  font-weight:normal; font-size:18px; position:relative; top:-20px;">Купить билет в театральных кассах:</span>


<div>
  <p style="margin-left:610px; margin-top:-20px;"><a href="http://concert.ru/Details.aspx?ActionID=24735"><img src="img/bilet_euroset.png" /></a></p>
 <p style="margin-left:610px;"><a href="http://www.ticketland.ru/show/?id=17085240"><img src="img/ticketland.jpg" /></a></p>
  <p style="margin-left:610px;"><a href="http://www.kassir.ru/msk/db/text/770968480.html "><img src="img/kassir.jpg" width="173px" height="81px;" style="padding-right:3px;"/></a><a href="http://www.parter.ru/ru/tickets/tri-istorii-moskva-centraln-dom-literatorov-105637/event.html"><img src="img/parter.jpg" height="81px;" width="173px" /></a></p>
 </div>




</div>

</div>

<div style="clear:both">
<?php include_once ("blocks/footer.php"); ?>
</div>





</div>
</body>
</html>