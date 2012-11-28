<?php
include_once "../../inc/conf.php";

header('Location: new-orders.php');


exit();
$name = htmlspecialchars($_POST["name"]);
$pass = htmlspecialchars($_POST["pass"]);
$auth = htmlspecialchars($_GET["auth"]);

if (($name == ADMINLOGIN) && ($pass == PASSWORD))
{ // Форма отправлена
	$_SESSION["authcp"] = true;
	$_SESSION["admin"] = true;
	header('Location: admin.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<title>Админка</title>
		<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
		<!--  jquery core -->
		<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

		<!-- Custom jquery scripts -->
		<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

		<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
		<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(document).pngFix( );
			});
		</script>
	</head>

<?php
if ($_SESSION["authcp"] == false)
{					//Проверка авторизации
	if ($auth == null)
	{ ?>
			<body id="login-bg"> 

				<!-- Start: login-holder -->
				<div id="login-holder">

					<!-- start logo -->
					<div id="logo-login">
						<a href="index.html"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
					</div>
					<!-- end logo -->

					<div class="clear"></div>
					<div id="loginbox">

						<!--  start login-inner -->
						<div id="login-inner">
							<form action="index.php?auth=ok" method="post" name="login" style=" border:#cccccc 1px;">
								<table border="0" cellpadding="0" cellspacing="0">
									<tr>
										<th>Логин</th>
										<td><input type="text" name="name" class="login-inp" /></td>
									</tr>
									<tr>
										<th>Пароль</th>
										<td><input type="password" name="pass" value="************"  onfocus="this.value=''" class="login-inp" /></td>
									</tr>
									<tr>
										<th></th>
										<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Запомнить меня</label></td>
									</tr>
									<tr>
										<th></th>
										<td><input type="submit" class="submit-login"  /></td>
									</tr>
								</table>
						</div>
						<!--  end login-inner -->
						<div class="clear"></div>
						<a href="" class="forgot-pwd">Забыл пароль?</a>
					</div>
					<!--  end loginbox -->

					<!--  start forgotbox ................................................................................... -->
					<div id="forgotbox">
						<div id="forgotbox-text">Введи E-mail адрес и мы вышлем пароль</div>
						<!--  start forgot-inner -->
						<div id="forgot-inner">
							<table border="0" cellpadding="0" cellspacing="0">
								<tr>
									<th>E-mail:</th>
									<td><input type="text" value=""   class="login-inp" /></td>
								</tr>
								<tr>
									<th> </th>
									<td><input type="button" class="submit-login"  /></td>
								</tr>
							</table>
						</div>
						<!--  end forgot-inner -->
						<div class="clear"></div>
						<a href="" class="back-login">Назад</a>
					</div>
					<!--  end forgotbox -->

				</div></body>
		</html>
		<?php
	}
	else
	{?>
	<body id="login-bg"> 

		<!-- Start: login-holder -->
		<div id="login-holder">

			<!-- start logo -->
			<div id="logo-login">
				<a href="index.html"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
			</div>
			<!-- end logo -->

			<div class="clear"></div>

			<div id="loginbox">

				<!--  start login-inner -->
				<div id="login-inner">
					<div style="margin: 50px 50px;">
						
						Неверный логин или пароль.В доступе отказано
					</div>
				</div>
				<!--  end login-inner -->
				<div class="clear"></div>
				<a href="" class="forgot-pwd">Забыл пароль?</a>
			</div>
			<!--  end loginbox -->

			<!--  start forgotbox ................................................................................... -->
			<div id="forgotbox">
				<div id="forgotbox-text">Введи E-mail адрес и мы вышлем пароль</div>
				<!--  start forgot-inner -->
				<div id="forgot-inner">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<th>E-mail:</th>
							<td><input type="text" value=""   class="login-inp" /></td>
						</tr>
						<tr>
							<th> </th>
							<td><input type="button" class="submit-login"  /></td>
						</tr>
					</table>
				</div>
				<!--  end forgot-inner -->
				<div class="clear"></div>
				<a href="" class="back-login">Назад</a>
			</div>
			<!--  end forgotbox -->

		</div>
	</body>
	</html>
	<?php
		
	}
}
	else
	{
		header('Location: admin.php');
	}

	