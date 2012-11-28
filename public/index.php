<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Live Animation Theatre</title>

<link href="style.css?fff=<?=rand(11111,99999);?>" rel="stylesheet" type="text/css" />
<link href="js/bx_styles.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="js/jquery.bxSlider.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
  $('#slider1').bxSlider({
    displaySlideQty: 3,
    moveSlideQty: 1,
	prevText: 'Ещё спектакли',
	nextText: 'Ещё спектакли'
  });
});
</script>

<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.anons');
</script>
<![endif]-->

</head>

<body>
<div id="container">

<?php include_once ("blocks/header.php"); ?>

<div id="main">
<?php include_once ("blocks/menu.php"); ?>
<div id="main-slider">
<ul style="width:  300px; "id="slider1">
	<li><a href="na_beregu_vologda.php"><img src="img/index/na_beregu_vologda.png" width="268" height="400" alt="На берегу моей сказки..." class="anons" /></a></li>
	<li><a href="elki.php"><img src="img/index/ny_2012 copy2.png" width="268" height="400" alt="Песочные Ёлки" class="anons" /></a></li>
	<li><a href="mulen-ruzh.php"><img src="img/mulen_ruj_2012.png" width="268" height="400" alt="Мулен Руж" class="anons" /></a></li>
	<li><a href="na_beregu_moey_skazki.php"><img src="img/na_beregu_moey_skazki.png" width="268" height="400" alt="На берегу моей сказки" class="anons" /></a></li>
	<li><a href="kanikuly-bonifacija.php"><img src="img/index/kanikuly-bonifacija_march_2013.png" width="268" height="400" alt="Каникулы Бонифация" class="anons" /></a></li>
</ul>
</div>


</div>

<div align="left" style="text-align:justify; width:860px; padding-left:70px; padding-right:1px; margin-top:30px;" class="bg-text-main"><br />
<p style="padding-left:10px; padding-right:10px; padding-top:10px; padding-bottom:10px;">Театр Живой Анимации – уникальный проект, не имеющий аналогов ни в России, ни за рубежом! Именно он дал жизнь понятию «живой» анимации и создал удивительное шоу, полностью основанное на динамическом рисовании.</p>
<p style="padding-left:10px; padding-right:10px; padding-bottom:10px;">С одной стороны, это проект, объединивший в себе различные виды «живой» анимации – рисование песком, рисование водой, рисование флуоресцентной крошкой, «живое» рисование мокрой краской, театр теней и другие не менее эффектные способы визуализации. С другой стороны, это настоящий театр, в котором удачно сочетаются все упомянутые виды «живой» динамической анимации и воплощаются в потрясающих театральных постановках.</p>
<p style="padding-left:10px; padding-right:10px; padding-bottom:10px;">Театр Живой Анимации – это неожиданное и удачное сочетание шоу и театра. Рекомендовано всем возрастным категориям без исключения: главный критерий, определяющий нашу аудиторию, – современный взгляд на искусство в широком смысле слова. А также открытость для восприятия новых способов творческого выражения и беспристрастность.</p>
<p style="padding-left:10px; padding-right:10px; padding-bottom:10px;">Театр живой анимации создан объединением художников Студии рисования песком СэндПРО и проекта Водная анимация. Основа театра – рисование различными материалами в режиме реального времени и одновременная трансляция процесса рисования на экран. </p>
<p style="padding-left:10px; padding-right:10px; padding-bottom:10px;">Все наши постановки индивидуальны. Это могут быть лаконичные постановки, в которых использован только один вид динамической анимации, например популярное сегодня рисование песком – для его несомненных и уже многочисленных почитателей. Какие-то, наоборот, включили в себя буквально все известные нам виды анимации и рассчитаны на высокую зрелищность. Приходите, смотрите – выбирайте своё! Театр Живой Анимации для всех и для каждого.</p>
</div>

<?php include_once ("blocks/footer-main.php"); ?>


</div>
</body>
</html>