<?php
include_once 'inc/conf.php';

echo'

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Untitled Document</title>
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>

    <script>  
function lite(rez,mest,rd,cst)
{

if(rez == 1){
document.getElementById("zakaz").style.visibility="visible"; 
$("#mesto").val(mest);
$("#ryad").val(rd);
$("#cost").val(cst);
}else{
document.getElementById("zakaz").style.visibility="hidden"; 
}

}
</script>
</head>

<body>

<div style="width: 558px;height:464px;background-image:url(zal.gif);padding:110px 160px;"><div id="zakaz" style="display: block; position: fixed;width:300px; height:100px; border: 1px solid; z-index:1000; top:100px; left:100px; background-color:#FFFFFF;  padding:15px 10px; visibility:hidden">
<form action="pay.php" method="post">
Ф.И.О
<input name="name" type="text" size="30" />
  <input id="mesto" name="mesto" type="hidden" value="" />
  <input id="ryad" name="ryad" type="hidden" value="" />
  <input id="cost" name="cost" type="hidden" value="" />
  <input name="seans" type="hidden" value="'.$_GET['name'].'" />
  <input name="zal" type="hidden" value="Большой зал" />
<input name="" style="margin:20px 70px; width:150px" type="submit" value="&#1054;&#1087;&#1083;&#1072;&#1090;&#1080;&#1090;&#1100;" />
<input name="" style="margin:0px 70px; width:150px" type="reset" value="Отмена" onclick = "lite(0,2)"/></form>
</div><table border="1">';
$Query = mysql_query("SELECT * FROM `zal` WHERE type = 'standart' AND name = 'Большой зал'");
$zal = mysql_fetch_assoc($Query);

for($i = $zal['ryadend']; $i>0 ;$i--)
    {
        echo'<tr>';
        for($j = $zal['mestend']; $j>0 ;$j--)
    {
       echo' <td width="16" align="center" '.bgm($_GET['name'],$i,$j).'>';
       if(!is_bron($_GET['name'],$i,$j)){echo '<a title="Забронировать" href = "javascript:void(0)" onclick = "lite(1,'.$j.','.$i.','.cost($i,$j).')" style="text-decoration:none; color:#000000">'.$j.'</a>';
       }else{
        echo $j;
       }
       echo'</td>';
        
    }
    
    echo '<td width="16" align="center" style="border:none">'.$i.'</td></tr>';
    }
  
  
echo'</table>
</div>



</body>
</html>';
?>
