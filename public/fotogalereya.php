<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<title>Фотогалерея</title>
<link href="fotogal.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" type="text/css" href="/css/style_pr.css"/>
<link rel="stylesheet" type="text/css" href="/css/skin_vertical.css"/>
<link rel="stylesheet" type="text/css" href="/css/skin2.css"/>

<script type="text/javascript" src="/js/jquery.js?5"></script>

	
	<script type="text/javascript" src="/js/jquery.jcarousel.js"></script>
	<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
	<script type="text/javascript">
	    function mycarousel_initCallback(carousel)
{
 // Disable autoscrolling if the user clicks the prev or next button.
 carousel.buttonNext.bind('click', function() {
 carousel.startAuto(0);
 });

 carousel.buttonPrev.bind('click', function() {
 carousel.startAuto(0);
 });

 // Pause autoscrolling if the user moves with the cursor over the clip.
 carousel.clip.hover(function() {
 carousel.stopAuto();
 }, function() {
 carousel.startAuto();
 });
};

	</script>

	
    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
</head>

<body>
<div id="container">

<?php include_once ("blocks/header.php"); ?>
<?php include_once ("blocks/menu-foto.php"); ?>




<div id="foto">
<script type="text/javascript">

/****** foto galery *****/
	jQuery(document).ready(function() {
			jQuery('#mycarousel').jcarousel();
		});

	$(function() {
           $('#mycarousel a').lightBox();
        });


/****** video galery *****/

		jQuery(document).ready(function() {
			jQuery('#mycarousel-video').jcarousel({
                           vertical: true,
                           scroll: 2
                         });
		});


/****** comments galery *****/
 		jQuery(document).ready(function() {
                    jQuery('#mycarousel-comment').jcarousel({
                        auto: 12,
                        wrap: 'last',
                        initCallback: mycarousel_initCallback
                    });
                });

</script>



<div class="b-photo">
    <p style="color:#3c0a06; font-size:20px; padding-top:15px; text-align:left; margin-left:35px;">Галерея</p>
    <ul class="jcarousel-skin-photo" id="mycarousel"> 
	

<li><a href="http://liveanimation.ru/foto/1big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/1.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/2big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/2.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/4big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/4.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/5big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/5.jpg "" /></a></li>
<li style="clear:both;"><a href="http://liveanimation.ru/foto/6big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/6.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/7big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/7.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/18big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/18.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/19big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/19.jpg "" /></a></li>
<li style="clear:both;"><a href="http://liveanimation.ru/foto/20big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/20.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/21big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/21.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/22big.jpg" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва"><img alt="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" title="Мулен Руж. Одна сумасшедшая ночь. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/22.jpg "" /></a></li>


<li style="clear:both;"><a href="http://liveanimation.ru/foto/bony/1big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/1.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/10big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/10.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/4big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/4.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/5big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/5.jpg "" /></a></li>
<li style="clear:both;"><a href="http://liveanimation.ru/foto/bony/7big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/7.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/foto/bony/11big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/11.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/12big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/12.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/13big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/13.jpg "" /></a></li>
<li style="clear:both;"><a href="http://liveanimation.ru/foto/bony/14big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/14.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/15big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/15.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/foto/bony/16big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/16.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/17big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/17.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/18big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/18.jpg "" /></a></li>
<li style="clear:both;"><a href="http://liveanimation.ru/foto/bony/19big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/19.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/20big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/20.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/21big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/21.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/22big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/22.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/23big.jpg" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва"><img alt="Каникулы Бонифация. 28 мая, Golden Palace, Москва" title="Каникулы Бонифация. 28 мая, Golden Palace, Москва" src="http://liveanimation.ru/foto/bony/23.jpg "" /></a></li>



</ul>



        </div>





</div>

<div style="clear:both;">
<?php include_once ("blocks/footer.php"); ?>
</div>





</div>
</body>
</html>