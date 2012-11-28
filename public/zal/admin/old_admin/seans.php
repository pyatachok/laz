<?php

include_once ('../../inc/conf.php');
if($_SESSION["authcp"] == false){  exit('Доступ запрещен');}
$id = safe_get($_POST, 'id');
$set = safe_get($_POST, 'set');

if($set == 'del'){
    mysql_query('DELETE FROM `seans` WHERE id = '.$id);
    ?>
	<!--  start message-green -->
		<div id="message-green">
		<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td class="green-left">Сеанс удален</td>
			<td class="green-right">
				<a class="close-green">
					<img src="images/table/icon_close_green.gif"   alt="" />
				</a>
			</td>
		</tr>
		</table>
		</div>
	<!--  end message-green -->
	<?php 
    
    exit();
}
if($set == 'deact'){
    mysql_query('UPDATE `seans` SET `status` = \'n/a\' WHERE id = '.$id);
    ?> 
	<!--  start message-green -->
		<div id="message-green">
		<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td class="green-left">Сеанс деактивирован</td>
			<td class="green-right">
				<a class="close-green">
					<img src="images/table/icon_close_green.gif"   alt="" />
				</a>
			</td>
		</tr>
		</table>
		</div>
	<!--  end message-green -->
	<?php 
    
    exit();
}
if($set == 'acti'){
    mysql_query('UPDATE `seans` SET `status` = \'activ\' WHERE id = '.$id);
    ?>
	<!--  start message-green -->
		<div id="message-green">
		<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td class="green-left">Сеанс деактивирован</td>
			<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
		</tr>
		</table>
		</div>
	<!--  end message-green -->
	<?php 
    
    exit();
}
if($set == 'create'){
    ?>
	<div id="page-heading"><h1>Новый сеанс</h1></div>
		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
		<tr>
			<th rowspan="3" class="sized">
				<img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" />
			</th>
			<th class="topleft"></th>
			<td id="tbl-border-top">&nbsp;</td>
			<th class="topright"></th>
			<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
		</tr>
		<tr>
			<td id="tbl-border-left"></td>
			<td>
			<!--  start content-table-inner -->
			<div id="content-table-inner">

			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr valign="top">
			<td>
				<!-- start id-form -->
				<form action="seans.php?set=createok" method="post" enctype="multipart/form-data">
				<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
				<tr>
					<th valign="top">Название постановки:</th>
					<td><input type="text" class="inp-form" name="title"/></td>
					<td></td>
				</tr>
				<tr>
		<th valign="top">Выбрать дату:</th>
		<td class="noheight">
		
			<table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				
				<select name="day" id="d" class="styledselect-day">
					<?php for ($index = 1; $index < 31; $index++) :?>
					<option value="<?php echo $index; ?>"><?php echo $index; ?></option>
					<?php endfor; ?>
				</select>
				</td>
				<td>
					<select name="mounth" id="m" class="styledselect-month">
						<option value="Января">Января</option>
						<option value="Февраля">Февраля</option>
						<option value="Марта">Марта</option>
						<option value="Апреля">Апреля</option>
						<option value="Мая">Мая</option>
						<option value="Июня">Июня</option>
						<option value="Июля">Июля</option>
						<option value="Августа">Августа</option>
						<option value="Сентября">Сентября</option>
						<option value="Октября">Октября</option>
						<option value="Ноября">Ноября</option>
						<option value="Декабря">Декабря</option>
					</select>
				</td>
				
				</td>
				
			</tr>
			</table>
		
		</td>
		<td></td>
	</tr>
	<tr>
			<th valign="top">Введите время:</th>
			<td><input type="text" class="inp-form" name="time"/></td>
			<td></td>
		</tr>
	
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
			<input type="reset" value="" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	</table>
    </form>
	<!-- end id-form  -->

	</td>
	<td>
	
</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>
<div class="clear">&nbsp;</div>
<?php 
    exit;
}

if($set == 'createok'){
    
    mysql_query("INSERT INTO `seans` (`name`,`date`) VALUES ('".$_POST['title']."','".$_POST['day']." ".$_POST['mounth']."/".$_POST['time']."')");
    ?>

<body> 

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
		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul id="p" class="select"><li><a href="#nogo"><b>Заказы</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div id="ps" class="select_sub">
			<ul class="sub">
				<li id="pl"><a href="javascript:void(0)" onclick="hov('p','ps','pl');loads('users.php?set=active','')">Бронь</a></li>
				<li id="pc"><a href="javascript:void(0)" onclick="hov('p','ps','pc');loads('users.php','')">Оплаченные</a></li>
			
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
				<li id="za" ><a href="javascript:void(0)" onclick="hov('z','zd','za');loads('seans.php','')">Активные</a></li>
                <li id="ca" ><a href="javascript:void(0)" onclick="hov('z','zd','ca');loads('seans.php?set=create','')">Создать</a></li>
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
				<li id="ya" ><a href="javascript:void(0)" onclick="hov('y','yd','ya');loads('zals.php','')">Все</a></li>
                <li id="zd" ><a href="javascript:void(0)" onclick="hov('y','yd','zd');loads('zals.php?set=create','')">Создать</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
	
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
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
<div id="content">

<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Сеанс создан успешно.</td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green -->

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<?php

exit;
}

?>
    
    <div id="page-heading">
		<h1>Все сеансы</h1>
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
					<th class="table-header-repeat line-left minwidth-1" width="40"><a href="">ID</a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Название</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Дата/Время</a></th>
					<th class="table-header-options line-left"><a href="">Опции</a></th>
				</tr>
					<?php 
                $res = mysql_query('SELECT * FROM `seans` ORDER by id DESC') or die(mysql_error($res));

                $x = 1;
                for($i = 0; $i<mysql_num_rows($res) ;$i++)
                {
	               $Result[$i] = mysql_fetch_array($res);
                    $num=$x%2;
				   ?>
					<tr <?php echo ($num == 0 ? 'class="alternate-row"' : '') ?>>
						<td><?php echo $Result[$i]['id'] ?></td>
						<td><?php echo $Result[$i]['name'] ?></td>
						<td><?php echo $Result[$i]['date'] ?></td>
						<td class="options-width">
							<?php echo (
								$Result[$i]['status'] == 'activ'
								? '<a href="javascript:loads(\'seans\',{set:\'deact\',id:\''.$Result[$i]['id'].'\'})" title="Деактивировать" class="icon-1 info-tooltip"></a>'
								: '<a href="javascript:loads(\'seans\',{set:\'act\',id:\''.$Result[$i]['id'].'\'})" title="Активировать" class="icon-1 info-tooltip"></a>'
								);
							echo '<a href="javascript:loads(\'seans\',{set:\'del\', id:\''.$Result[$i]['id'].'\'})" title="Удалить" class="icon-2 info-tooltip"></a>';
							?>
                    </td>
				</tr>
				<?php $x++;   
                }
                ?>
				</table>
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
	<div class="clear">&nbsp;</div>
