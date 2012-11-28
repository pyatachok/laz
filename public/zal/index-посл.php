<?php
session_start();
unset($_SESSION['zakaz']);
include_once '../inc/conf.php';

if($_GET['act'] == 'seans'){
    $query = mysql_query("SELECT * FROM `seans` WHERE name = '".$_GET['name']."' AND status = 'activ'");
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
if($_GET['name'] == 'Мулен руж'){
    echo 'zal2.gif';
}else{
    echo'zal.gif';
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

<div style="width: 603px;height:423px;background-image:url(';
if($_GET['name'] == 'Мулен руж'){
    echo 'zal2.gif';
}else{
    echo'zal.gif';
}

echo');padding:100px 30px;"><div id="zakaz" style="display: block; position: fixed;width:300px; height:100px; border: 1px solid; z-index:1000; top:100px; left:100px; background-color:#FFFFFF;  padding:15px 10px; visibility:hidden">
<form action="pay.php" method="post">
Ф.И.О
<input name="name" type="text" size="30" />
  <input id="mesto" name="mesto" type="hidden" value="" />
  <input id="ryad" name="ryad" type="hidden" value="" />
  <input id="cost" name="cost" type="hidden" value="" />
  <input name="seans" type="hidden" value="'.$_POST['seans'].'" />
  <input name="zal" type="hidden" value="Большой зал" />
<input name="" style="margin:20px 70px; width:150px" type="submit" value="&#1054;&#1087;&#1083;&#1072;&#1090;&#1080;&#1090;&#1100;" />
<input name="" style="margin:0px 70px; width:150px" type="reset" value="Отмена" onclick = "lite(0,2)"/></form>
</div>

<table border="1">';
$Query = mysql_query("SELECT * FROM `zal` WHERE type = 'standart' AND name = 'Большой зал'");
$zal = mysql_fetch_assoc($Query);









for($i = $zal['ryadend']; $i>0 ;$i--)
    {
        echo'<tr>';
        for($j = $zal['mestend']; $j>0 ;$j--)
    {
	
	if($i==17)
	{
		if (($_GET['name']=='Каникулы бонифация')&&($j>=8)&&($j<=12)&&($_POST['seans']==3))
		{
		echo' <td bgcolor=#dbdbdb>';
		}
		else
		{
		echo' <td id="td'.$i.'_'.$j.'" width="16" align="center" bgcolor="#ffff00">';
		}
	}
	else
	{

       echo' <td id="td'.$i.'_'.$j.'" width="16" align="center" '.bgm($_POST['seans'],$i,$j).'>';
	}	
	if($i==17)
	{
		if (($_GET['name']=='Каникулы бонифация')&&($j>=8)&&($j<=12)&&($_POST['seans']==3))
		{
			echo $j;
		}
		else
		{
		 if(!is_bron($_POST['seans'],$i,$j))
		{
		echo '<a title="Забронировать, Категория места:  Стандарт, 500 руб руб." href = "javascript:void(0)" onclick = "lite(1,'.$j.','.$i.',500)" style="text-decoration:none; color:#000000">'.$j.'</a>';
		}
		else
		{
		 echo $j;
		}
		}
	}
	else
	{
       if(!is_bron($_POST['seans'],$i,$j))
	{
	echo '<a title="Забронировать, Категория места: '.m($i,$j).', '.cost($_GET['vip'],$_GET['dlux'],$_GET['standart'],$i,$j).' руб." href = "javascript:void(0)" onclick = "lite(1,'.$j.','.$i.','.cost($_GET['vip'],$_GET['dlux'],$_GET['standart'],$i,$j).')" style="text-decoration:none; color:#000000">'.$j.'</a>';
       }else{
	if ($_GET['name']!='%CA%E0%ED%E8%EA%F3%EB%FB%20%E1%EE%ED%E8%F4%E0%F6%E8%FF')
	{
        echo $j;
	}
       }
	}
       echo'</td>';
        
    }







    
    echo '<td width="50" align="center" style="border:none">'.$i.' ряд</td></tr>';
    }
  
 
echo'</table>

<div id="end" style="width:170px;height:30px; float:left;"><button  style="margin: 10px 12px;width:170px;height:30px; float:left;" onclick="location.href=\'index.php?name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'&act=seans\';">Назад</button></div><div id="buy" style="visibility:hidden;width:170px;height:30px; float:right;z-index:1001"><button  style="margin: 10px 12px;width:170px;height:30px; float:right;" onclick="location.href=\'basket.php?act=buy&seans='.$_POST['seans'].'&name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'\';">Купить выбранные</button></div>
<div id="text" style="background-color:#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Для выбора места, наведите курсор на схему.</div>
</div>



</body>
</html>';
?>
