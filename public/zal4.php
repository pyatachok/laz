<?php
header("Location: /");
include_once '../inc/conf.php';

$mysql = mysql_connect(DBHOST, DBUSER, DBUSERPASS);
mysql_select_db(DBNAME, $mysql);
//mysql_set_charset('utf8');

$hallClass = new Hall($mysql);
$seans = '42';

$hallScheame = $hallClass->getHallScheameBySeansId($seans);
//echo "<pre>";
//var_dump($hallScheame );
//echo "</pre>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8">

			<title>Зал</title>
			<link href="../css/hallscheame.css" rel="stylesheet" type="text/css" />
			<link href="admin/js/jquery-ui-1.8.24.custom/css/sunny/jquery-ui-1.8.24.custom.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="admin/js/jquery-ui-1.8.24.custom/js/jquery-1.8.0.min.js"></script>
			<script type="text/javascript" src="admin/js/jquery-ui-1.8.24.custom/js/jquery-ui-1.8.24.custom.min.js"></script>
    </head>
    <body>

		<table class="hall-scheame-wrapper">
			<tr>
				<td></td>
				<td>Схема зала</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>

					<table class="hall-scheame">
						<?php foreach ($hallScheame as $rowId => $row) : ?>
							<tr class="hall-scheame-row">
								<?php foreach ($row as $seatNumber => $seat) : ?>
									<td class="hall-scheame-seat <?php echo $seat->ticket_state ?>">
										<a id="<?php echo 'seat_'.$seat->id.'_r_'.$rowId.'_n_'.$seatNumber ?>" class="seat"><span class="<?php echo $seat->place_type ?>"></span></a>
									</td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</table>
					<td></td>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>Сцена</td>
				<td></td>
			</tr>
		</table>




    </body>
</html>
