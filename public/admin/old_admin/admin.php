<?php
include_once "../../inc/conf.php";

if (isset($_SESSION["authcp"]) && $_SESSION["authcp"] == false)
{
	exit('Доступ запрещен');
}

$action = safe_get($_POST, 'action');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<title>Админка</title>
		<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

		<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

		<!--link to the CSS files for this menu type -->
		<link rel="stylesheet" media="screen" href="js/superfish-1.4.8/css/superfish.css" /> 
		<!--link to the JavaScript files (hoverIntent is optional) -->
		<script src="js/superfish-1.4.8/js/hoverIntent.js"></script> 
		<script src="js/superfish-1.4.8/js/superfish.js"></script> 


		<!--[if IE]>
		<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
		<![endif]-->

		<!--  jquery core -->
		<script src="js/func.js" type="text/javascript"></script>
		<script>
			function loads(action ,data) {
				var $form = $('#navigation-form');
				var $action = $form.find("input[name='action']");
				var $set = $form.find("input[name='set']");
				$action.val(action);
				$set.val(data.set);
				$form.submit();
			}
			function hov(ul,div,li){
				$('.current').removeClass('current').addClass('select');
				$('.select_sub show').addClass('select_sub');
				$('.sub_show').removeClass('sub_show');
				$('#' + ul).addClass('current');
				$('#' + div).addClass('select_sub show');
				$('#' + li).addClass('sub_show');
    
			}
		</script>
		<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
		<script src='js/jquery/jquery.pngFix.pack.js' type='text/javascript'></script>
		<script type='text/javascript'>
			$(document).ready(function(){

				$(document).pngFix( );
//				$('.select').hover(
//					function () {
//						$('.select_sub').hide();
//						$(this).find('.select_sub').show();
//					}, 
//					function () {
//					}
//					);

			});
		</script>

	</head>
	<body> 
		<div style="height: 50px"><a href="new-orders.php">Новые заказы</a></div>
		<!-- Start: page-top-outer -->
		<div id="page-top-outer">    

			<!-- Start: page-top -->
			<div id="page-top">

				<!-- start logo -->
				<div id="logo">
					<a href=""><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
				</div>
				<!-- end logo -->
				<div class="clear"></div>

			</div>
			<!-- End: page-top -->

		</div>
		<!-- End: page-top-outer -->

		<div class="clear">&nbsp;</div>

		<!--  start nav-outer-repeat................................................................................................. START -->
		<div class="nav-outer-repeat"> 
			<!--  start nav-outer -->
			<div class="nav-outer"> 
				<form name="navigation-form" id="navigation-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
					<input type="hidden" name="action" value="" />
					<input type="hidden" name="set" value="" />
					<!--  start nav -->
					<div class="nav">
						<div class="table">

							<ul id="p" class="select"><li><a href="#nogo"><b>Заказы</b><!--[if IE 7]><!--></a><!--<![endif]-->
							<!--[if lte IE 6]><table><tr><td><![endif]-->
									<div id="ps" class="select_sub">
										<ul class="sub">
											<li id="pl"><a href="javascript:void(0)" onclick="hov('p','ps','pl');loads('orders',{set : 'create'})">Бронь</a></li>
											<li id="pc"><a href="javascript:void(0)" onclick="hov('p','ps','pc');loads('orders','')">Оплаченные</a></li>

										</ul>
									</div>
									<!--[if lte IE 6]></td></tr></table></a><![endif]-->
								</li>
							</ul>

							<div class="nav-divider">&nbsp;</div>

							<ul  id="z" class="select"><li><a href="#nogo"><b>Сеансы</b><!--[if IE 7]><!--></a><!--<![endif]-->
							<!--[if lte IE 6]><table><tr><td><![endif]-->
									<div  id="zd"  class="select_sub">
										<ul class="sub">
											<li id="za" ><a href="javascript:void(0)" onclick="hov('z','zd','za');loads('seans',{set : ''})">Активные</a></li>
											<li id="ca" ><a href="javascript:void(0)" onclick="hov('z','zd','ca');loads('seans',{set : 'create'})">Создать</a></li>
										</ul>
									</div>
									<!--[if lte IE 6]></td></tr></table></a><![endif]-->
								</li>
							</ul>
							<div class="nav-divider">&nbsp;</div>


							<ul  id="y" class="select"><li><a href="#nogo"><b>Залы</b><!--[if IE 7]><!--></a><!--<![endif]-->
							<!--[if lte IE 6]><table><tr><td><![endif]-->
									<div  id="yd"  class="select_sub">
										<ul class="sub">
											<li id="ya" ><a href="javascript:void(0)" onclick="hov('y','yd','ya');loads('places',{set : ''})">Все</a></li>
											<li id="zd" ><a href="javascript:void(0)" onclick="hov('y','yd','zd');loads('places',{set : 'create'})">Создать</a></li>
										</ul>
									</div>
									<!--[if lte IE 6]></td></tr></table></a><![endif]-->
								</li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</form>
				<!--  start nav -->

			</div>
			<div class="clear"></div>
			<!--  start nav-outer -->
		</div>
		<!--  start nav-outer-repeat................................................... END -->

		<div class="clear"></div>

		<!-- start content-outer ........................................................................................................................START -->
		<div id="content-outer">
			<!-- start content -->
			<div id="ne" style="display: none;position: fixed;top: 0%;left: 0%;width: 100%;height: 120%;background-color: black;z-index:1001;-moz-opacity: 0.8;opacity:.80;filter: alpha(opacity=80);">
				<div style="color: black;background-color: white;z-index:1001;position: fixed;top: 30%;left: 40%;width:30%;height: 20%;font-size:14px;padding: 20px 20px 20px 20px;">Идет отправка писем,пожалуйста дождитесь завершения<p id="per" style="margin-top: 50px;">0%</p></div></div>
			<div id="content">
				<?php
				switch ($action)
				{
					case 'places':
						include('zals.php');
						break;
					case 'orders':
						break;
					case 'seans':
						include('seans.php');
						break;
					default :
						include('users.php');
//						 include('zals.php');
						break;
				}
				?>
				<!--  start page-heading -->


			</div>

			<!--  end content -->
			<div class="clear">&nbsp;</div>
		</div>
		<!--  end content-outer........................................................END -->

		<div class="clear">&nbsp;</div>

		<!-- start footer -->         
		<div id="footer">
			<!--  start footer-left -->
			<div id="footer-left">
				Developed by Lex Development <span id="spanYear"></span> <a target="_blank" href="http://lexdev.ru">www.lexdev.ru</a>.</div>
			<!--  end footer-left -->
			<div class="clear">&nbsp;</div>
		</div>
		<!-- end footer -->

	</body>
</html> 