<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">

<title>Заказ билетов</title>
<link href="zakaz.css" rel="stylesheet" type="text/css" />

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

<p style="font-size:14px; margin-bottom:10px; margin-left:70px; padding-top:30px;"><font class="Apple-style-span" color="#FF0000" size="5">Предзаказ:</font> <br /><font class="Apple-style-span" color="#FF0000" size="2">Мы сообщим Вам как только билеты появятся в продаже.</font></p><br />

   <fieldset style="border:none; width:300px; float:left;">
<form action="send.php" method="post" name="forma" target="_blank" style="margin-left:70px;">

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

       <input type="image" width="101" height="26" border="0" src="img/send.png" name="knopka" style="margin-top:5px;" />
        <br />
       </form></fieldset></div>

  <p>
    <br />
   </p>


<p style="margin-left:610px; font-size:14px; position:relative; top:-70px;"><font class="Apple-style-span" color="#FF0000" size="4">Стоимость билетов:</font> 750 - 1500 рублей.</p><br />
    <p style="margin-left:610px; font-size:14px; position:relative; top:-70px;"><font class="Apple-style-span" color="#FF0000" size="4">Для групп предоставляются скидки!</font></p><br />

  <p style="margin-left:610px; font-size:14px; position:relative; top:-70px;">По вопросам приобретения Билетов обращайтесь <br />по телефонам 8 (495) <span class="tel">785-61-95</span> или +7 (925) 899-92-44.</p>

  <p></p>
 </div>




</div>

</div>

<div style="clear:both">
<?php include_once ("blocks/footer.php"); ?>
</div>





</div>
</body>
</html>