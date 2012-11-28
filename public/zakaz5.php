<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
			<title>Заказ билетов</title>
			<link href="zakaz2.css" rel="stylesheet" type="text/css" />
			<script language="JavaScript" src="js/scripts.js"></script>
			<link href="css/hallscheame.css" rel="stylesheet" type="text/css" />
			<link href="zal/admin/js/jquery-ui-1.8.24.custom/css/sunny/jquery-ui-1.8.24.custom.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="zal/admin/js/jquery-ui-1.8.24.custom/js/jquery-1.8.0.min.js"></script>
			<script type="text/javascript" src="zal/admin/js/jquery-ui-1.8.24.custom/js/jquery-ui-1.8.24.custom.min.js"></script>
			<script type="text/javascript" src="js/jquery/widgets/jquery.multiselect.min.js"></script>
			<!--[if IE 6]>
			<script src="js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
			<script type="text/javascript">
			DD_belatedPNG.fix('.anons');
			</script>
			<![endif]-->
<?php 
include_once 'inc/conf.php';
include 'inc/services.php';
setCID();

$seansClass = new Seans();
$seanses = $seansClass->getAll('*', true, 'seans_date', 'alias = ?', array('boni'));
//mail('piglet.freelancer@gmail.com', 'test mail', 'test', "From:  admin@liveanimation.ru");
//mail('mychkova@mail.ru', 'test mail', 'test', "From:  admin@liveanimation.ru");

//smtpmail('piglet.freelancer@gmail.com', 'Заголовок письма', 'Тело письма', $smtp)
	
//mail('piglet.freelancer@gmail.com', 'DEBUG: EX ', var_export(array($seanses), true));
//echo "<pre>";
//var_dump($seanses);
//echo "</pre>";
?>
<script type="text/javascript">
	window.performance_title = "Выберите удобные для вас места на схеме зала и нажмите кнопку Ок.";
</script>
<script type="text/javascript" src="js/drawScheme.js"></script>
			
			
	</head>

<body>
		<div id="container">

			<?php include_once ("blocks/header.php"); ?>

			<div id="main">
				<?php include_once ("blocks/menu_no_pl.php"); ?>
				<div align="left" style="margin: 0 90px 0 70px; background-image: url(img/pl_back_yel.png)">




<div class="nb-collumn-1">
        <p class="sub-title" >Каникулы Бонифация</p> <br/>
        <div class="clear"></div>


<span style="color:#ef092a; font-weight:bold">Когда:</span> 10 ноября в 12:00 / 11 ноября в 15:00<br />
<span style="color:#ef092a; font-weight:bold">Где:</span> Культурный центр ЗИЛ<br />
<span style="color:#ef092a; font-weight:bold">Адрес:</span> ул.Восточная, д.4, корп.2 (ст.м. Автозаводская)<br /><br />

<p>Театр Живой Анимации приглашает детей и их родителей на великолепное 
выступление мастеров Песочной и Водной Анимации. Вместе со Львом 
Бонифацием вы узнаете откуда у Слонёнка длинный хобот, почему 
Фламинго розового цвета, как Бегемот обходится без талии и кто чистит 
зубы Крокодилу! <br /><br />

Стоимость билетов: <span style="color:#ef092a; font-weight:bold">650 - 950 руб.</span>
</p>
<br />


<iframe width="400" height="225" src="http://www.youtube.com/embed/tIK3an7-gD0" frameborder="0" allowfullscreen></iframe>

</div>


					<div class="nb-collumn-2">
<p class="sub-title" >Купить билет online:</p> <br/>

						<form action="send4.php" method="post" name="forma" id="forma" target="_blank" >
							<input type="hidden" name="price" value="850" />
							<input type="hidden" name="action" value="booking" />
							<input type="hidden" name="seats_ids" id="seats_ids" value="" />
							<input type="hidden" name="seats_rows_ids" id="seats_rows_ids" value="" />
							
							Дата / Сеанс *  
							<br />
							<input type="hidden"  name="seans_id" id="seans_id"/>
							<input type="text" readonly name="seans_val" id="seans_val" class="form-item" 
								   size="55" maxlength="25" style="width: 353px;" 
								   onClick="$('#chose-seans').dialog('open');"
								   value="Выберите Сеанс..."
									onfocus="if(this.value==this.defaultValue){this.value='';}"
									onblur="if(this.value==''){this.value=this.defaultValue;}"/>
						
							<br />
							Количество билетов * <span class="loader"><img src="img/loaders/191868926-spin_32.gif" style=" width: 20px;height: 20px; "></img></span>
							<br />
							<input type="text" readonly name="kolvo" id="kolvo" class="form-item" 
									size="55" maxlength="25" style="width: 353px;" 
									onClick="$('#hall-scheame').dialog('open');"
									value="Выберите места..."
									onfocus="if(this.value==this.defaultValue){this.value='';}"
									onblur="if(this.value==''){this.value=this.defaultValue;}"/>
							<br />
							Ф.И.О. *  
							<br />
							<input type="text" name="fio"maxlength="100" style="width: 353px;" class="form-item"/>  
							<br />
							Телефон *  
							<br />
							<input type="text" name="tel" style="width: 353px;" maxlength="100" class="form-item"/>  
							<br />
							Электронная почта *
							<br />
							<input type="text" name="email" style="width: 353px;" maxlength="100" class="form-item" />  
							<br />
							Адрес доставки *  
							<br />
							<input type="text" name="dostavka" style="width: 353px;" maxlength="100" class="form-item" />  
							<br />
							<div style="float:left;" class="form-item">
								<input type="button"  class="buttons" name="knopka" id="buy" value="Покупка"/>
							</div>

						</form>

					</div>









<div class="clear"></div>
						<br />

					</div>
					<div class="clear"> </div>


				</div>
				<div id="hall-scheame" class="hide"> </div>
				<div id="chose-seans" class="hide">
					<select name="seans" id ="seans" style="width: 353px;" class="form-item"  >
						<option value="">Выберите Сеанс</option>	
						<?php foreach ($seanses as $id => $seans) : ?>
							<?php if ($id != 44 && $id != 45) : ?>
							<option value="<?php echo $id ?>"><?php echo $seans->date ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
				</div>
				<div style="clear:both">
					<?php include_once ("blocks/footer.php"); ?>
				</div>
			</div>
	</body>
</html>