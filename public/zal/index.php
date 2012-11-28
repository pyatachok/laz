<?php
session_start();
unset($_SESSION['zakaz']);
include_once '../inc/conf.php';
include_once 'shema.php';
include_once 'shema2.php';

if($_GET['act'] == 'seans'){
    $query = mysql_query("SELECT * FROM `seans` WHERE name = '".$_GET['name']."' AND status = 'activ' ORDER BY date ASC");
    for($i = 0; $i<mysql_num_rows($query); $i++)
    {
    $seans[] = mysql_fetch_assoc($query);
    }
    echo'

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Схема зала</title>
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>

    <script>
function lite(rez,mest,rd,cst)
{

if(rez == 1){
$("#td" + rd + "_" + mest).css("background-color","#8fa3b0");
$("#text").css("visibility","hidden");
$("#buy").css("visibility","visible");
$.post("basket.php?act=zak&seans='.$_POST['seans'].'",{mesto: mest ,ryad : rd ,cost : cst});

}else{
document.getElementById("zakaz").style.visibility="hidden";
}

}
</script>
</head>

<body>

<div style="width: 603px;height:413px;background-image:url(';
if($_GET['name'] == 'Мулен руж')
{
   // echo 'zal2.gif';
}
elseif($_GET['name'] == 'Три истории')
{
    //echo'zal_new.gif';
}
else
{
    echo'zal_new.gif';
}

echo');padding:110px 30px;text-align:center">
<form action="index.php?name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'" method="post">
Выберите сеанс постановки "'.$_GET['name'].'":
<select name="seans" id="m" class="styledselect-month">

					';

foreach($seans as $sen){
    echo'<option value="'.$sen['id'].'">'.$sen['date'].'</option>';
}

echo'</select><input name="" style="margin:20px 70px; width:150px" type="submit" value="Показать схему" /></form>
</div>



</body>
</html>';

exit;
}



    $query = mysql_query("SELECT * FROM `seans` WHERE id = '".$_POST['seans']."' AND status = 'activ'");
    for($i = 0; $i<mysql_num_rows($query); $i++)
    {
    $seans_zal = mysql_fetch_assoc($query);
    }



echo'

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Схема зала</title>
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>

    <script>
function lite(rez,mest,rd,cst,IdSector)
{

if(rez == 1){
$("#" + IdSector +"td" + rd + "_" + mest).css("background-color","#8fa3b0");
$("#text").css("display","none");
$("#buy").css("display","block");
$.post("basket.php?act=zak&seans='.$_POST['seans'].'",{mesto: mest ,ryad : rd ,cost : cst, nsector : IdSector});

}else{
document.getElementById("zakaz").style.visibility="hidden";
}

}
</script>
</head>

<body style="padding:0px 0px;margin:0px 0px; ">

<div style="width:';
if($_GET['name'] == 'Песочная Ёлка в Политехническом музее')
{
	echo '1000';
}
elseif($_GET['name'] == 'Мулен Руж')
{
	echo '1000';
}
elseif($_GET['name'] == 'Три истории')
{
	echo '1000';
}
else
{
	echo '663';
}

echo 'px;height:570px;background-position:top left;background-repeat:no-repeat;background-image:url(';
if($_GET['name'] == 'Мулен Руж' or $_GET['name'] == 'Каникулы бонифация')
{
    //echo 'zal2.gif';
}
elseif($_GET['name'] == 'Три истории')
{
    //echo 'zal2.gif';
}
elseif($_GET['name'] == 'Песочная Ёлка в Политехническом музее')
{

}
else
{
    echo'zal_new.gif';
}


echo');padding:30px 0;">
<div id="zakaz" style="display: block; position: fixed;width:300px; height:100px; border: 1px solid; z-index:1000; top:100px; left:100px; background-color:#FFFFFF;  padding:15px 10px; visibility:hidden">
<form action="pay.php" method="post">
Ф.И.О
<input name="name" type="text" size="30" />
  <input id="mesto" name="mesto" type="hidden" value="" />
  <input id="ryad" name="ryad" type="hidden" value="" />
  <input id="cost" name="cost" type="hidden" value="" />
  <input name="seans" type="hidden" value="'.$_POST['seans'].'" />
  <input name="zal" type="hidden" value="'.$seans_zal['name_zal'].'" />
<input name="" style="margin:20px 70px; width:150px" type="submit" value="&#1054;&#1087;&#1083;&#1072;&#1090;&#1080;&#1090;&#1100;" />
<input name="" style="margin:0px 70px; width:150px" type="reset" value="Отмена" onclick = "lite(0,2)"/></form>
</div>';


if($_GET['name'] == 'Песочная Ёлка в Политехническом музее')
{
echo '<div align="left">
<table>';
echo '<tr>';
echo '<td style="background-color:#FF0000;border:1px solid #000;width:50px;height:50px;">&nbsp;</td>';
echo '<td>VIP&nbsp;850&nbsp;руб.</td>';
echo '<td style="background-color:#00DFFF;border:1px solid #000;width:50px;height:50px;"></td>';
echo '<td>Делюкс&nbsp;750&nbsp;руб.</td>';
echo '<td style="background-color:#FFFF00;border:1px solid #000;width:50px;height:50px;"></td>';
echo '<td>Стандарт&nbsp;650&nbsp;руб.</td>';
echo '<td style="background-color:#3AF23A;border:1px solid #000;width:50px;height:50px;"></td>';
echo '<td style="width:150px;">Купить билеты в театральных кассах</td>';
echo '</tr>';
echo '</table>';

echo'<table width="90%" style="margin-top:20px;"><tr>';
echo'
<td><div id="end" style="width:170px;height:30px;"><button style="width:170px;height:30px;" onclick="location.href=\'index.php?name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'&act=seans\';">Назад</button></div>
</td>';

echo'<td><div id="buy" style="display:none;width:170px;height:30px;z-index:1001"><button  style="width:170px;height:30px;" onclick="location.href=\'basket.php?act=buy&zal='.$seans_zal['name_zal'].'&seans='.$_POST['seans'].'&name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'\';">Купить выбранные</button></div>

<div id="text"  align="center" style="height:25px;width:100%;padding-top:5px;"><b>Для выбора места, наведите курсор на схему.</b></div>
</td></tr></table>
</div>';


	global $SHEMA;

	foreach($SHEMA as $idSector=>$SECTOR)
	{
		echo '<table>';
		echo'<tr>';
		echo '<td colspan="'.count($SECTOR['PLACE'][1]).'" align="left" style="border:0;"><h3>'.$SECTOR['NAME'].'</h3></td>';
		echo '<td colspan="2" style="border:0;">&nbsp;</td>';
		echo'</tr>';
		if($idSector=='BALKON')
		{
			echo '<td colspan="11" align="center" style="border:0;color:#bb0d0d;"><b>concert.ru</b></td>';
			echo '<td colspan="2" align="center">&nbsp;</td>';
			echo '<td colspan="10" align="center" style="border:0;color:#bb0d0d;"><b>parter.ru</b></td>';
			echo '<td colspan="2" align="center">&nbsp;</td>';
			echo '<td colspan="11" align="center" style="border:0;color:#bb0d0d;"><b>ticketland.ru</b></td>';
			echo '<td colspan="4" style="border:0;">&nbsp;</td>';
		}
        foreach($SECTOR['PLACE'] as $NumRyad=>$Ryad)
		{
			echo'<tr>';
			foreach($Ryad as $Mesto)
			{

				if($Mesto['NUM']=='EMPTY')
				{
					echo '<td style="border:0px;width:16px;">&nbsp;</td>';
				}
				else
				{					echo '<td id="'.$idSector.'td'.$NumRyad.'_'.$Mesto['NUM'].'"
					 align="center" '.((strlen($Mesto['QUOTA'])>0)?' style="border:solid 1px #000;width:16px;background-color:#3AF23A;"':bgm_new($_POST['seans'],$NumRyad,$Mesto['NUM'],$seans_zal['name_zal'],$idSector,$Mesto['TYPE']).' style="border:solid 1px #000;width:16px;"').'>';

						if(!is_bron_new($_POST['seans'],$NumRyad,$Mesto['NUM'],$seans_zal['name_zal'],$idSector))
						{
							if(strlen($Mesto['QUOTA'])>0)
							{
								echo '<a title="Забронировать, Категория места: '.m_new($NumRyad,$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE']).', '.$Mesto['COST'].' руб." href = "http://'.$Mesto['QUOTA'].'" style="text-decoration:none; color:#000000" target="_blank">'.$Mesto['NUM'].'</a>';
							}
							else
							{
								echo '<a title="Забронировать, Категория места: '.m_new($NumRyad,$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE']).', '.$Mesto['COST'].' руб." href = "javascript:void(0)" onclick = "lite(1,'.$Mesto['NUM'].','.$NumRyad.','.$Mesto['COST'].',\''.$idSector.'\')" style="text-decoration:none; color:#000000">'.$Mesto['NUM'].'</a>';
							}
						}
						else
						{
							echo $Mesto['NUM'];
						}

					 echo '</td>';
					 $QUOTA = $Mesto['QUOTA'];
				}


			}

			echo '<td align="center" style="width:70px;border:none">'.$NumRyad.'&nbsp;ряд</td>
					<td align="center" style="border:none;color:#bb0d0d;"><b>'.(($idSector!=='BALKON')?$QUOTA:'').'</b></td></tr>';

		}
		echo'</table>';
	}

}
elseif($_GET['name'] == 'Мулен Руж' or $_GET['name'] == 'Каникулы бонифация')
{
echo '<div align="left">
<table>';
echo '<tr>';
echo '<td style="background-color:#FF0000;border:1px solid #000;width:50px;height:50px;">&nbsp;</td>';
echo '<td>VIP&nbsp;1500&nbsp;руб.</td>';
echo '<td style="background-color:#286FFF;border:1px solid #000;width:50px;height:50px;"></td>';
echo '<td>Делюкс&nbsp;1150&nbsp;руб.</td>';
echo '<td style="background-color:#00DFFF;border:1px solid #000;width:50px;height:50px;"></td>';
echo '<td>Стандарт(2)&nbsp;950&nbsp;руб.</td>';
echo '<td style="background-color:#FFFF00;border:1px solid #000;width:50px;height:50px;"></td>';
echo '<td>Стандарт&nbsp;750&nbsp;руб.</td>';
echo '<td style="background-color:#3AF23A;border:1px solid #000;width:50px;height:50px;"></td>';
echo '<td style="width:150px;">Купить билеты в театральных кассах</td>';
echo '</tr>';
echo '</table>';

echo'<table width="90%" style="margin-top:20px;"><tr>';
echo'
<td><div id="end" style="width:170px;height:30px;"><button style="width:170px;height:30px;" onclick="location.href=\'index.php?name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'&act=seans\';">Назад</button></div>
</td>';

echo'<td><div id="buy" style="display:none;width:170px;height:30px;z-index:1001"><button  style="width:170px;height:30px;" onclick="location.href=\'basket.php?act=buy&zal='.$seans_zal['name_zal'].'&seans='.$_POST['seans'].'&name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'\';">Купить выбранные</button></div>

<div id="text"  align="center" style="height:25px;width:100%;padding-top:5px;"><b>Для выбора места, наведите курсор на схему.</b></div>
</td></tr></table>
</div>';


	global $SHEMA2;

	//foreach($SHEMA2 as $SECTOR)
	//{
		echo '<table>';
		echo'<tr>';
		echo '<td colspan="'.count($SECTOR['PLACE'][1]).'" align="left" style="border:0;"><h3>'.$SECTOR['NAME'].'</h3></td>';
		echo '<td colspan="2" style="border:0;">&nbsp;</td>';
		echo'</tr>';
/*		if($idSector=='BALKON')
		{
			echo '<td colspan="11" align="center" style="border:0;color:#bb0d0d;"><b>concert.ru</b></td>';
			echo '<td colspan="2" align="center">&nbsp;</td>';
			echo '<td colspan="10" align="center" style="border:0;color:#bb0d0d;"><b>parter.ru</b></td>';
			echo '<td colspan="2" align="center">&nbsp;</td>';
			echo '<td colspan="11" align="center" style="border:0;color:#bb0d0d;"><b>ticketland.ru</b></td>';
			echo '<td colspan="4" style="border:0;">&nbsp;</td>';
		}*/

        foreach($SHEMA2 as $Ryad)
		{
			echo'<tr>';
			foreach($Ryad as $Mesto)
			{
				if($Mesto['NUM']=='EMPTY')
				{
					echo '<td style="border:0px;width:16px;"'.(($Mesto['COLSPAN']>0)?' align="center" colspan="'.$Mesto['COLSPAN'].'"':'').'>&nbsp;</td>';
				}
				elseif($Mesto['NUM']=='PRINT_DATA')
				{
					echo '<td style="border:0px;width:16px;"'.(($Mesto['COLSPAN']>0)?' align="center" colspan="'.$Mesto['COLSPAN'].'"':'').'><b>'.$Mesto['RYAD'].'</b></td>';
				}
				else
				{					echo '<td id="'.$Mesto['TYPE_PLACE'].'td'.$Mesto['RYAD'].'_'.$Mesto['NUM'].'"
					 align="center" '.((strlen($Mesto['QUOTA'])>0)?' style="border:solid 1px #000;width:16px;background-color:#3AF23A;"':bgm_new($_POST['seans'],$Mesto['RYAD'],$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE_PLACE'],$Mesto['TYPE']).' style="border:solid 1px #000;width:16px;"').'>';

						if(!is_bron_new($_POST['seans'],$Mesto['RYAD'],$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE_PLACE']))
						{
							if(strlen($Mesto['QUOTA'])>0)
							{
								echo '<a title="Забронировать, Категория места: '.m_new($NumRyad,$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE']).', '.$Mesto['COST'].' руб." href = "http://'.$Mesto['QUOTA'].'" style="text-decoration:none; color:#000000" target="_blank">'.$Mesto['NUM'].'</a>';
							}
							else
							{
								echo '<a title="Забронировать, Категория места: '.m_new($Mesto['RYAD'],$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE']).', '.$Mesto['COST'].' руб." href = "javascript:void(0)" onclick = "lite(1,'.$Mesto['NUM'].','.$Mesto['RYAD'].','.$Mesto['COST'].',\''.$Mesto['TYPE_PLACE'].'\')" style="text-decoration:none; color:#000000">'.$Mesto['NUM'].'</a>';
							}
						}
						else
						{
							echo $Mesto['NUM'];
						}

					 echo '</td>';
					 $QUOTA = $Mesto['QUOTA'];
				}
				$Type = $Mesto['TYPE_PLACE'];

if($Mesto['RYAD']!=='')
	$RYAD = $Mesto['RYAD']."&nbsp;ряд";
else
	$RYAD = '';
			}

			echo '<td align="center" style="width:70px;border:none">'.$RYAD.'</td>
					<td align="center" style="border:none;color:#bb0d0d;"><b>'.(($Mesto['TYPE_PLACE']!=='BALKON')?$QUOTA:'').'</b></td></tr>';

		}
		echo'</table>';
	//}
}
elseif($_GET['name'] == 'Три истории')
{
include_once 'shema3.php';

echo '<div align="left">
<table>';
echo '<tr>';
echo '<td style="background-color:#FF0000;border:1px solid #000;width:50px;height:50px;">&nbsp;</td>';
echo '<td>VIP&nbsp;1500&nbsp;руб.</td>';
echo '</tr>';
echo '</table>';

echo'<table width="90%" style="margin-top:20px;"><tr>';
echo'
<td><div id="end" style="width:170px;height:30px;"><button style="width:170px;height:30px;" onclick="location.href=\'index.php?name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'&act=seans\';">Назад</button></div>
</td>';

echo'<td><div id="buy" style="display:none;width:170px;height:30px;z-index:1001"><button  style="width:170px;height:30px;" onclick="location.href=\'basket.php?act=buy&zal='.$seans_zal['name_zal'].'&seans='.$_POST['seans'].'&name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'\';">Купить выбранные</button></div>

<div id="text"  align="center" style="height:25px;width:100%;padding-top:5px;"><b>Для выбора места, наведите курсор на схему.</b></div>
</td></tr></table>
</div>';


	global $SHEMA3;

	//foreach($SHEMA2 as $SECTOR)
	//{
		echo '<table>';
		echo'<tr>';
		echo '<td colspan="'.count($SECTOR['PLACE'][1]).'" align="left" style="border:0;"><h3>'.$SECTOR['NAME'].'</h3></td>';
		echo '<td colspan="2" style="border:0;">&nbsp;</td>';
		echo'</tr>';
/*		if($idSector=='BALKON')
		{
			echo '<td colspan="11" align="center" style="border:0;color:#bb0d0d;"><b>concert.ru</b></td>';
			echo '<td colspan="2" align="center">&nbsp;</td>';
			echo '<td colspan="10" align="center" style="border:0;color:#bb0d0d;"><b>parter.ru</b></td>';
			echo '<td colspan="2" align="center">&nbsp;</td>';
			echo '<td colspan="11" align="center" style="border:0;color:#bb0d0d;"><b>ticketland.ru</b></td>';
			echo '<td colspan="4" style="border:0;">&nbsp;</td>';
		}*/

        foreach($SHEMA3 as $Ryad)
		{
			echo'<tr>';
			foreach($Ryad as $Mesto)
			{
				if($Mesto['NUM']=='EMPTY')
				{
					echo '<td style="border:0px;width:16px;"'.(($Mesto['COLSPAN']>0)?' align="center" colspan="'.$Mesto['COLSPAN'].'"':'').'>&nbsp;</td>';
				}
				elseif($Mesto['NUM']=='PRINT_DATA')
				{
					echo '<td style="border:0px;width:16px;"'.(($Mesto['COLSPAN']>0)?' align="center" colspan="'.$Mesto['COLSPAN'].'"':'').'><b>'.$Mesto['RYAD'].'</b></td>';
				}
				else
				{					echo '<td id="'.$Mesto['TYPE_PLACE'].'td'.$Mesto['RYAD'].'_'.$Mesto['NUM'].'"
					 align="center" '.((strlen($Mesto['QUOTA'])>0)?' style="border:solid 1px #000;width:16px;background-color:#3AF23A;"':bgm_new($_POST['seans'],$Mesto['RYAD'],$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE_PLACE'],$Mesto['TYPE']).' style="border:solid 1px #000;width:16px;"').'>';

						if(!is_bron_new($_POST['seans'],$Mesto['RYAD'],$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE_PLACE']))
						{
							if(strlen($Mesto['QUOTA'])>0)
							{
								echo '<a title="Забронировать, Категория места: '.m_new($NumRyad,$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE']).', '.$Mesto['COST'].' руб." href = "http://'.$Mesto['QUOTA'].'" style="text-decoration:none; color:#000000" target="_blank">'.$Mesto['NUM'].'</a>';
							}
							else
							{
								echo '<a title="Забронировать, Категория места: '.m_new($Mesto['RYAD'],$Mesto['NUM'],$seans_zal['name_zal'],$Mesto['TYPE']).', '.$Mesto['COST'].' руб." href = "javascript:void(0)" onclick = "lite(1,'.$Mesto['NUM'].','.$Mesto['RYAD'].','.$Mesto['COST'].',\''.$Mesto['TYPE_PLACE'].'\')" style="text-decoration:none; color:#000000">'.$Mesto['NUM'].'</a>';
							}
						}
						else
						{
							echo $Mesto['NUM'];
						}

					 echo '</td>';
					 $QUOTA = $Mesto['QUOTA'];
				}
				$Type = $Mesto['TYPE_PLACE'];

if($Mesto['RYAD']!=='')
	$RYAD = $Mesto['RYAD']."&nbsp;ряд";
else
	$RYAD = '';
			}

			echo '<td align="center" style="width:70px;border:none">'.$RYAD.'</td>
					<td align="center" style="border:none;color:#bb0d0d;"><b>'.(($Mesto['TYPE_PLACE']!=='BALKON')?$QUOTA:'').'</b></td></tr>';

		}
		echo'</table>';
	//}
}
else
{
echo '<div align="center">
<table width="80%">';
echo '<tr>';
echo '<td style="background-color:#FF0000;border:1px solid #000;width:20px;height:40px;">&nbsp;</td>';
echo '<td style="width:120px;">VIP&nbsp;950&nbsp;руб.</td>';
echo '<td style="background-color:#00DFFF;border:1px solid #000;width:20px;height:40px;"></td>';
echo '<td style="width:120px;">Делюкс&nbsp;750&nbsp;руб.</td>';
echo '<td style="background-color:#FFFF00;border:1px solid #000;width:20px;height:40px;"></td>';
echo '<td style="width:120px;">Стандарт&nbsp;500&nbsp;руб.</td>';
echo '</tr>';
echo '</table>';

echo'<table width="90%" border="1" style="margin-top:20px;"><tr><td>';

echo '<div id="end" style="width:170px;height:30px;"><button  style="width:170px;height:30px;" onclick="location.href=\'index.php?name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'&act=seans\';">Назад</button></div>

</td><td>';

echo'<div id="buy" style="display:none;width:170px;height:30px;z-index:1001"><button  style="width:170px;height:30px;" onclick="location.href=\'basket.php?act=buy&zal='.$seans_zal['name_zal'].'&seans='.$_POST['seans'].'&name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'\';">Купить выбранные</button></div>
<div id="text" align="center" style="height:25px;width:100%;padding-top:5px;"><b>Для выбора места, наведите курсор на схему.</b><br /><br /></div>
</td></tr></table>
</div>';


echo '<table border="1" style="margin-left:35px;">';
$Query = mysql_query("SELECT * FROM `zal` WHERE type = 'standart' AND name = '".$seans_zal['name_zal']."'");
$zal = mysql_fetch_assoc($Query);

for($i = $zal['ryadend']; $i>0 ;$i--)
    {
    echo'<tr>';
    for($j = $zal['mestend']; $j>0 ;$j--)
    {
       echo' <td id="td'.$i.'_'.$j.'" width="16" align="center" '.bgm($_POST['seans'],$i,$j,$seans_zal['name_zal']).'>';
       if(!is_bron($_POST['seans'],$i,$j,$seans_zal['name_zal']))
       {
       	echo '<a title="Забронировать, Категория места: '.m($i,$j,$seans_zal['name_zal']).', '.cost($_GET['vip'],$_GET['dlux'],$_GET['standart'],$i,$j,$seans_zal['name_zal']).' руб." href = "javascript:void(0)" onclick = "lite(1,'.$j.','.$i.','.cost($_GET['vip'],$_GET['dlux'],$_GET['standart'],$i,$j,$seans_zal['name_zal']).',\'\')" style="text-decoration:none; color:#000000">'.$j.'</a>';
       }else{
        echo $j;
       }
       echo'</td>';

    }

    echo '<td width="50" align="center" style="border:none">'.$i.' ряд</td></tr>';
    }
echo'</table>';
}


echo '<br /><br /><br /><br /><br />';
echo'</div>
</body>
</html>';
?>
