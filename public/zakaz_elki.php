<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

		<title>Заказ билетов</title>
		<link href="zakaz4.css" rel="stylesheet" type="text/css" />
		<link href="style6.css" rel="stylesheet" type="text/css" />	
		<script language="JavaScript" src="js/scripts.js"></script>
		<link href="css/hallscheame_12.css" rel="stylesheet" type="text/css" />
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
		$seanses = $seansClass->getAll('*', true, 'seans_date', 'alias = ? AND seans_date > ?', array('elka_domarc', date('Y-m-d H:i:s')));
		?>
		<script type="text/javascript">
			window.performance_title = "Выберите удобные для вас места на схеме зала и нажмите кнопку Ок.";
		</script>
		<script type="text/javascript" src="js/drawScheme.js"></script>
		<style type="text/css">
.nb-collumn-1{
	width: 505px;
	float: left;
	margin: 35px 0 0 25px;
/*	background-color: #aae60d;*/
/*	height: 50px;*/
}
#forma{
	float: left;	
}
#forma p{
	float: left;
	width: 100%;
	margin-bottom: 7px;
}
#forma p input{
	float: right;
}
		</style>
	</head>

	<body>
		<div id="container">
			<?php include_once ("blocks/header_zakaz_elki.php"); ?>
			<div id="main">
				<?php include_once ("blocks/menu-elki.php"); ?>
				<div style="width: 600px; height: 600px; clear: left; position: relative; top: 25px; background-image: url(img/elki_background.png);">
				<!--<div align="left" style="margin: 0 90px 0 70px; padding-bottom: 25px;  background-image: url(img/clear_background.png);">-->
					<div class="nb-collumn-1">
						<h2 style="color: #780603; float: left; margin-left:60px; margin-right: 18px; position: relative; bottom: 14px;">Стоимость: </h2>
						<font style="position: relative; bottom: 8px; font-size: 16px; font-weight: lighter; float: left; margin: 5 20px 20px 0;"><span class="text2"> 650 руб.</span> – Билет
						<span class="text2"> 150 руб.</span> – Подарок<br></font>
						<form action="send4.php" method="post" name="forma" id="forma" target="_blank" >
							<input type="hidden" name="action" value="booking" />
							<input type="hidden" name="seats_ids" id="seats_ids" value="" />
							<input type="hidden" name="seats_rows_ids" id="seats_rows_ids" value="" />
							<p>Дата / Сеанс *  
							<input type="hidden"  name="seans_id" id="seans_id"/>
							<input type="text" readonly name="seans_val" id="seans_val" class="form-item" 
								   size="55" maxlength="25" style="width: 300px;" 
								   onClick="$('#chose-seans').dialog('open');"
								   value="Выберите Сеанс..."
								   onfocus="if(this.value==this.defaultValue){this.value='';}"
								   onblur="if(this.value==''){this.value=this.defaultValue;}"/>
							</p>
							<p>Количество билетов * <span class="loader"><img src="img/loaders/191868926-spin_32.gif" style=" width: 20px;height: 20px; "></img></span>
							<input type="text" readonly name="kolvo" id="kolvo" class="form-item" 
								   size="55" maxlength="25" style="width: 300px;" 
								   onClick="$('#hall-scheame').dialog('open');"
								   value="Выберите места..."
								   onfocus="if(this.value==this.defaultValue){this.value='';}"
								   onblur="if(this.value==''){this.value=this.defaultValue;}"/>
							</p>
							<p><b style="color: #02698F;">Количество подарков *</b>
								<input type="text" name="presents_count" style="width: 300px;" maxlength="100" class="form-item" value="1"/>  
							</p>
							<p>Ф.И.О. *  
							<input type="text" name="fio"maxlength="100" style="width: 300px;" class="form-item"/>  
							</p>
							<p>Телефон * 
							<input type="text" name="tel" style="width: 300px;" maxlength="100" class="form-item"/>  
							</p>
							<p>Электронная почта *
							<input type="text" name="email" style="width: 300px;" maxlength="100" class="form-item" />  
							</p>
							<!---->
							<p style="width: 350px; margin-left: 20px; text-align: left; vertical-align: middle;">
								<input checked="checked" name="is_delivery" type="radio" value="delivery" style="float:left; margin: 0 10px; "/>Доставка<b>(Стоимость доставки <?php echo Order::ORDER_DELIVERY_COST ; ?>p.)</b><br/>
								<input name="is_delivery" type="radio" value="theirselvs"  style="float:left; margin: 0 10px;"/>Самовывоз
							</p>
							<p><span  name="dostavka">Адрес доставки * </span>
							<input type="text" name="dostavka" style="width: 300px;" maxlength="100" class="form-item" />  
							</p>
							  
							<div style="float:left;" class="form-item">
								<input type="button" class="buttons"  name="knopka" id="knopka" value="Бронь"/>
								<input type="button"  class="buttons" name="knopka" id="buy" value="Покупка"/>
								<!--<a  style="font-weight:normal; float: right; font-size:22px; margin: 0 15px; text-decoration:underline;" href="javascript:;" onClick="javascript:showPic('img/lektoriy copy.jpg','Схема зала','827','683')"><b class="sub-title">Схема зала</b></a> -->
							</div>
							<!--<div align="right" style="width:363px; padding-top:5px;">
								<a  style="font-weight:normal; font-size:22px; text-decoration:underline;" href="javascript:;" onClick="javascript:showPic('img/lektoriy copy.jpg','Схема зала','827','683')"><b class="sub-title">Схема зала</b></a>
							</div>-->
						</form>

					<div class="clear"> </div>
					<div id="cs_container_css">
					<script charset="UTF-8" src="http://povidget.cultserv.ru/libs/jquery/jquery-1.7.1.min.povidget.js" type="text/javascript"></script>
					<script charset="UTF-8">
					cs_insert(
					{
					utm_source : 'pesok',
					event_id : '17330',
					date : '2012-11-01',
					time : '',
					button_code : '<input type="button" value="Купить билеты" />',
					width : '140',
					height : '50',
					venue_id : '',
					title : '',
					location : '' // 2 - msk, 3 - spb
					}
					);
					</script>
					</div>
					<!--<p style="float: right; margin: 10px 100px 0px 0px; text-align: left;">По вопросам приобретения билетов оптом от 20 шт. обращайтесь по <b>телефону 8-962-949-30-30.</b></p>-->
					<br />
					<!--<span class="sub-title">Купить билет в театральных кассах:</span>-->
<!--					<div >
						<p ><a href="http://www.concert.ru/Actions.aspx?bookmark=byDate&Artist=7eAg4eXw5ePzIOzu5ekg8erg5%2bro&CityID=0"><img src="img/concert.png" /></a></p>
						<p ><a href="http://www.ticketland.ru/show/18790807/2/"><img src="img/ticketland.jpg" /></a></p>
						<p > <a href="http://www.kassir.ru/msk/db/text/770968480.html "><img src="img/kassir.jpg" width="173px" height="81px;" style="padding-right:3px;"/></a><a href="http://www.parter.ru/ru/tickets/na-beregu-moe-skazki-moskva-kc-zn-dk-amo-zil-276539/event.html"><img src="img/parter.jpg" height="81px;" width="173px" /></a></p>
					</div>-->
				</div>


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
				<div style="margin-top: 520px; clear:both">
					<?php include_once ("blocks/footer-elki.php"); ?>
				</div>
			</div>
	</body>
</html>


