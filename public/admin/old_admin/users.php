<?php

include_once('../../inc/conf.php');
if($_SESSION["authcp"] == false){  exit('Доступ запрещен');}
$id = safe_get($_POST, 'id');
$set = safe_get($_POST, 'set');
$op = new Operating_Object();
if($set == 'del'){
    mysql_query('UPDATE `bron` SET `status` = \'ok\' WHERE id = '.$id);
    echo '<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Заказ получен.Посетитель забрал билет</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green -->';

    exit();
}
if($set == 'deli'){
    mysql_query('DELETE FROM `bron`  WHERE id = '.$id);
    echo '<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Билет возвращен</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green -->';

    exit();
}
if($set == 'active'){

    echo'	<div id="page-heading">
		<h1>Активные заказы</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">

			<!--  start table-content  -->
			<div id="table-content">




				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Дата</a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Ф.И.О</a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Зал</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Сеанс</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Ряд/Место</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Телефон</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">E-mail</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Адрес</a></th>
					<th class="table-header-options line-left"><a href="">Опции</a></th>
				</tr>';

                $res = mysql_query('SELECT * FROM `bron` WHERE status = \'activ\' ORDER by id DESC') or die(mysql_error($res));

                $x = 1;
                for($i = 0; $i<mysql_num_rows($res) ;$i++)
                {
	               $Result[$i] = mysql_fetch_array($res);
                   echo'<tr';
                    $num=$x%2;
                    if ($num == 0) echo' class="alternate-row"';
                    echo'>
					<td>'.$Result[$i]['DATE'].'</td>
					<td>'.$Result[$i]['name'].'</td>
					<td>'.$Result[$i]['zal'].'</td>
					<td>';
                    $query = mysql_query("SELECT * FROM `seans` WHERE id = ".$Result[$i]['seans']);
                    $seans = mysql_fetch_assoc($query);
                    echo $seans['name'].'/'.$seans['date'].'</td>
                    <td>'.$Result[$i]['ryad'].'/'.$Result[$i]['mesto'].'<br />
                    '.$Result[$i]['SECTOR'].'
                    '.(($Result[$i]['PRESENT']=='Y')?"<br /><span style='color:green;'><b>+&nbsp;ПОДАРОК</b></span>":"").'
                    '.((strlen($Result[$i]['CUPON'])>0)?"<br />Купон:<br /> ".$Result[$i]['CUPON']:"").'
                    </td>
                    <td>'.$Result[$i]['tel'].'</td>
                    <td>'.$Result[$i]['mail'].'</td>
                    <td>'.$Result[$i]['addr'].'</td>
					<td class="options-width">

					<a href="javascript:loads(\'users.php?set=del&id='.$Result[$i]['id'].'\',\'\')" title="Получен" class="icon-2 info-tooltip"></a>
                    </td>
				</tr>';
                $x++;
                }


				echo'</table>
				<!--  end product-table................................... -->
				</form>
			</div>
			<!--  end content-table  -->



			<div class="clear"></div>

		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>';
exit;
    }


    echo'	<div id="page-heading">
		<h1>Оплаченные</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">

			<!--  start table-content  -->
			<div id="table-content">




				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Дата</a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Ф.И.О</a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Зал</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Сеанс</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Ряд/Место</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Телефон</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">E-mail</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Адрес</a></th>
					<th class="table-header-options line-left"><a href="">Опции</a></th>
				</tr>';

$resSeans = mysql_query('SELECT * FROM `seans` WHERE status = \'activ\' ORDER by id DESC') or die(mysql_error($res));
{
	for($iSeans = 0; $iSeans<mysql_num_rows($resSeans) ;$iSeans++)
	{
		$tempSeans = mysql_fetch_array($resSeans);
		$Seans[$tempSeans['id']]['name'] = $tempSeans['name'];
		$Seans[$tempSeans['id']]['date'] = $tempSeans['date'];
		$Seans[$tempSeans['id']]['name_zal'] = $tempSeans['name_zal'];
	}
}

                $res = mysql_query('SELECT * FROM `bron` WHERE status = \'ok\' ORDER by id DESC') or die(mysql_error($res));
                $x = 1;
                for($i = 0; $i<mysql_num_rows($res) ;$i++)
                {
	               $Result[$i] = mysql_fetch_array($res);
                   echo'<tr';
                    $num=$x%2;
                    if ($num == 0) echo' class="alternate-row"';
                    echo'>
					<td>'.$Result[$i]['DATE'].'</td>
					<td>'.$Result[$i]['name'].'</td>
					<td>'.$Result[$i]['zal'].'</td>
					<td>'.$Seans[$Result[$i]['seans']]['name'].'<br />
					'.$Seans[$Result[$i]['seans']]['date'].'</td>
					<td>'.$Result[$i]['ryad'].'/'.$Result[$i]['mesto'].'<br />
                    '.$Result[$i]['SECTOR'].'<br />
                    '.(($Result[$i]['PRESENT']=='Y')?"<span style='color:green;'><b>+&nbsp;ПОДАРОК</b></span>":"").'
                    '.((strlen($Result[$i]['CUPON'])>0)?"<br />Купон:<br /> ".$Result[$i]['CUPON']:"").'
                    </td>
                    <td>'.$Result[$i]['tel'].'</td>
                    <td>'.$Result[$i]['mail'].'</td>
                    <td>'.$Result[$i]['addr'].'</td>
					<td class="options-width">

					<a href="javascript:loads(\'users.php?set=deli&id='.$Result[$i]['id'].'\',\'\')" title="Получен" class="icon-2 info-tooltip"></a>
                    </td>
				</tr>';
                $x++;
                }


				echo'</table>
				<!--  end product-table................................... -->
				</form>
			</div>
			<!--  end content-table  -->



			<div class="clear"></div>

		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>';



?>