<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Animate validation feedback using jQuery</title>
    <style type="text/css">
        body
        {
            font-family:Arial, Sans-Serif;
            font-size:0.85em;
        }
        img
        {
            border:none;
        }
        ul, ul li
        {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        ul li.first
        {
            border-top: 1px solid #DFDFDF;
        }
        ul li.last
        {
            border: none;
        }
        ul p
        {
            float: left;
            margin: 0;
            width: 310px;
        }
        ul h3
        {
            float: left;
            font-size: 14px;
            font-weight: bold;
            margin: 5px 0 0 0;
            width: 200px;
            margin-left:20px;
        }
        ul li
        {
            border-bottom: 1px solid #DFDFDF;
            padding: 15px 0;
            width:600px;
            overflow:hidden;
        }
        ul input[type="text"], ul input[type="password"]
        {
            width:300px;
            padding:5px;
            position:relative;
            border:solid 1px #666;
            -moz-border-radius:5px;
            -webkit-border-radius:5px;
        }
        ul input.required
        {
            border: solid 1px #f00;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#Bron").click(function() {
            	$("#BronFlag").val("Y");
            });
            $("#PayB").click(function() {
            	$("#BronFlag").val("");
            	//$("#signup").submit();
            });
            $("#signup").submit(function() {

                resetFields();
                var emptyfields = $("input[type=text][name!=cupon][value=]");
                if (emptyfields.size() > 0) {
                    emptyfields.each(function() {
                        $(this).stop()
                            .animate({ left: "-10px" }, 100).animate({ left: "10px" }, 100)
                            .animate({ left: "-10px" }, 100).animate({ left: "10px" }, 100)
                            .animate({ left: "0px" }, 100)
                            .addClass("required");

                    });
                    return false;
                }
            });
        });
        function resetFields() {
            $("input[type=text], input[type=password]").removeClass("required");
        }
    </script>
</head>
<body>
<?php
session_start();
include_once '../inc/conf.php';
if($_GET['act'] == 'zak'){
$zakaz = $_SESSION['zakaz'];
$zak['mesto'] = $_POST['mesto'];
$zak['ryad'] = $_POST['ryad'];
$zak['cost'] = $_POST['cost'];

$zak['nsector'] = $_POST['nsector'];

$zakaz[] = $zak;
$_SESSION['zakaz'] = $zakaz;
}


if($_GET['act'] == 'buy'){

$CountTiket = count($_SESSION['zakaz']);

    echo'<div style="width:663px; height:633px; padding:20px 20px;">
Выбрано: '.count($_SESSION['zakaz']).' билетов, на сумму ';

$zakaz = $_SESSION['zakaz'];
    $allcost = 0;
    foreach($zakaz as $zak){
        $allcost += $zak['cost'];
    }
    echo $allcost.' рублей<br/><br/>
<p><span style="color:red;"><b>Внимание!</b> Для точной идентификации плательщика необходимо заполнить все поля!</span></p><br />
<form id="signup" action="pay.php?act=pay&seans='.$_GET['seans'].'&zal='.$_GET['zal'].'" method="post">

<input name="Bron" id="BronFlag" type="hidden" value="" />
<ul>
        <li class="first">

<h3>Ф.И.О. <span style="color:red;">*</span></h3>
<p><input name="name" type="text" style=" width:200px;"/></p>
</li>
<li>
<h3>Телефон <span style="color:red;">*</span></h3>
<p><input name="tel" type="text" style=" width:200px;" /></p>
</li>
<li>

<h3>E-mail <span style="color:red;">*</span></h3>
<p><input name="mail" type="text"  style=" width:200px;"/></p>
</li>
<li>

<h3>Адрес доставки <span style="color:red;">*</span></h3>
<p><input name="addr" type="text" style=" width:200px;" /></p>
<div align="center"><p><br /><i>Стоимость доставки</i> - 350 руб., оплачивается наличными курьеру.<br />
<br /><i>Самовывоз</i>: ул.Большая Молчановка, 30/7.</p></div>
</li>
';

if($_GET['name']=='Песочная Ёлка в Политехническом музее')
{
echo '
<li>
<h3>Добавить подарок </h3>
<p>
<select size="1" name="PRESENT">
  <option value="0">Без подарка</option>';

for($i=1; $i<=$CountTiket; $i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
echo '
</select>
</p>
<div align="center"><p><br /><i>Стоимость одного подарка</i> - 280 руб.</p></div>
</li>';
}

if($_GET['name']=='Три истории')
{
echo '
	<li>
	<h3>№ купона на скидку</h3>
	<p><input name="cupon" type="text" style=" width:200px;" /></p>
	</li>';
}


echo '
<li class="last">
<input name=""  id="PayB" type="submit" value="Забронировать и &#1054;&#1087;&#1083;&#1072;&#1090;&#1080;&#1090;&#1100;"  style=" width:200px;"/>

<button style="width:200px;" id="Bron">Забронировать</button>
</li>

</form>
<button  style=" width:200px;" onclick="location.href=\'index.php?name='.$_GET['name'].'&vip='.$_GET['vip'].'&dlux='.$_GET['dlux'].'&standart='.$_GET['standart'].'&act=seans\';">Назад</button>


</div>';
}

?>
</body>
</html>
