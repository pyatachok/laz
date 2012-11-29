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
$seanses = $seansClass->getAll('*', true, 'seans_date', 'alias = ? AND seans_date > ? AND id <> 44 AND id <> 45', array('boni', date('Y-m-d H:i:s')));

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
<!--						<h1 class ="sub-title">Заказать билет с оплатой наличными:</h1>-->
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
							<div style="width: 353px;">
								<p><input checked="checked" name="is_delivery" type="radio" value="delivery">Доставка<b>(Стоимость доставки <?php echo Order::ORDER_DELIVERY_COST ; ?>p.)</b></p>
								<p><input name="is_delivery" type="radio" value="theirselvs">Самовывоз</p>
							</div>
							<span name="dostavka">Адрес доставки *  
							<br />
							</span>
							<input type="text" name="dostavka" style="width: 353px;" maxlength="100" class="form-item" />  
							<br />
							<div style="float:left;" class="form-item">
								<input type="button" class="buttons"  name="knopka" id="knopka" value="Бронь"/>
								<input type="button"  class="buttons" name="knopka" id="buy" value="Покупка"/>
<!--							<a  style="font-weight:normal; float: right; font-size:22px; margin: 0 15px; text-decoration:underline;" href="javascript:;" onClick="javascript:showPic('img/lektoriy copy.jpg','Схема зала','827','683')"><b class="sub-title">Схема зала</b></a> -->
							</div>
							<div align="right" style="width:363px; padding-top:5px;">
								<a  style="font-weight:normal; font-size:22px; text-decoration:underline;" href="javascript:;" onClick="javascript:showPic('img/zil_south_big.jpg','Схема зала','900','678')"><b class="sub-title">Схема зала</b></a>
							</div>
						</form>
					</div>
					<div class="nb-collumn-2">
						<div><p><font class="sub-title" >Стоимость билетов:</font></p>
						<div class="ticket-prices-block">
							<table>
								<tr><td>VIP</td><td> - 950.00р</td></tr>
								<tr><td>Deluxe</td><td> - 850.00р</td></tr>
								<tr><td>Standart</td><td> - 750.00р</td></tr>
								<tr><td>Economy</td><td> - 650.00р</td></tr>
							</table>
						</div>
					</div>
						<div class="clear"></div>
						<br /> 
						
						<p class="sub-title" >Для групп предоставляются скидки!</p>
						<br />
						<p >По вопросам приобретения Билетов обращайтесь <br />по телефонам 8 (495) <span class="tel">785-61-95</span> <br/><span style="margin-left: 58px">или +7 (962) 949-30-30.</span></p>
						<br />
						<span class="sub-title">Купить билет в театральных кассах:</span>
						<div >
							<p > <!--<a href="http://www.concert.ru/Actions.aspx?bookmark=byDate&Artist=7eAg4eXw5ePzIOzu5ekg8erg5%2bro&CityID=0"><img src="img/concert.png" /></a></p>-->
							<p ><a href="http://www.ticketland.ru/show/18791361/2/"><img src="img/ticketland.jpg" /></a></p>
							<p > <!--<a href="http://www.kassir.ru/msk/db/text/770968480.html "><img src="img/kassir.jpg" width="173px" height="81px;" style="padding-right:3px;"/></a>--><a href="http://www.parter.ru/ru/tickets/na-beregu-moe-skazki-moskva-kc-zn-dk-amo-zil-276539/event.html"><img src="img/parter.jpg" height="81px;" width="173px" /></a></p>
						</div>
					</div>
					<div class="clear"> </div>


				</div>
				<div id="hall-scheame" class="hide"> </div>
				<div id="chose-seans" class="hide">
					<select name="seans" id ="seans" style="width: 353px;" class="form-item"  >
						<option value="">Выберите Сеанс</option>	
						<?php foreach ($seanses as $id => $seans) : ?>
							<option value="<?php echo $id ?>"><?php echo $seans->date ?></option>			
						<?php endforeach; ?>
					</select>
				</div>
				<div style="clear:both">
					<?php include_once ("blocks/footer.php"); ?>
				</div>
			</div>
	</body>
</html>