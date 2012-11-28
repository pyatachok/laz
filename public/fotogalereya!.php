<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<title>Фотогалерея</title>
<link href="style_project.css" rel="stylesheet" type="text/css" />

<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.anons');
</script>
<![endif]-->






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

<div id="main">
<?php include_once ("blocks/menu.php"); ?>









<img src="img/o_proekte.png" width="223" height="710" alt="О проекте"  style="padding-right:15px; padding-left:70px; padding-top:30px; margin-bottom:38px; float:left;" class="anons" />
</div>

<!--<div align="left" style="text-align:justify; width:860px; padding-left:70px;"><br />-->
<!--<div class="bg-text">-->
<p style="padding-top:10px;">&nbsp;</p><br />







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
    <p style="color:#3c0a06; font-size:20px; padding-top:15px; text-align:left; margin-left:35px;">Мулен Руж. Одна сумасшедшая ночь</p>
    <ul class="jcarousel-skin-photo" id="mycarousel"> 
	

<li><a href="http://liveanimation.ru/foto/1big.jpg"><img alt="" src="http://liveanimation.ru/foto/1.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/2big.jpg"><img alt="" src="http://liveanimation.ru/foto/2.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/4big.jpg"><img alt="" src="http://liveanimation.ru/foto/4.jpg "" /></a></li>
<li style="clear:both;"><a href="http://liveanimation.ru/foto/5big.jpg"><img alt="" src="http://liveanimation.ru/foto/5.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/foto/6big.jpg"><img alt="" src="http://liveanimation.ru/foto/6.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/7big.jpg"><img alt="" src="http://liveanimation.ru/foto/7.jpg "" /></a></li>


<!--<li><a href="http://liveanimation.ru/foto/8big.jpg"><img alt="" src="http://liveanimation.ru/foto/8.jpg "" /></a></li>-->
<!--<li><a href="http://liveanimation.ru/foto/9big.jpg"><img alt="" src="http://liveanimation.ru/foto/9.jpg "" /></a></li>-->
<!--<li><a href="http://liveanimation.ru/foto/12big.jpg"><img alt="" src="http://liveanimation.ru/foto/12.jpg "" /></a></li>-->
<!--<li><a href="http://liveanimation.ru/foto/13big.jpg"><img alt="" src="http://liveanimation.ru/foto/13.jpg "" /></a></li>-->
<!--<li><a href="http://liveanimation.ru/foto/14big.jpg"><img alt="" src="http://liveanimation.ru/foto/14.jpg "" /></a></li>-->



<li style="clear:both; margin-top:30px;"><a href="http://liveanimation.ru/foto/bony/1big.jpg"><img alt="" src="http://liveanimation.ru/foto/bony/1.jpg "" /></a></li>
<li style="margin-top:30px;"><a href="http://liveanimation.ru/foto/bony/10big.jpg"><img alt="" src="http://liveanimation.ru/foto/bony/10.jpg "" /></a></li>
<li style="margin-top:30px;"><a href="http://liveanimation.ru/foto/bony/4big.jpg"><img alt="" src="http://liveanimation.ru/foto/bony/4.jpg "" /></a></li>
<li style="clear:both;"><a href="http://liveanimation.ru/foto/bony/5big.jpg"><img alt="" src="http://liveanimation.ru/foto/bony/5.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/7big.jpg"><img alt="" src="http://liveanimation.ru/foto/bony/7.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/foto/bony/10big.jpg"><img alt="" src="http://liveanimation.ru/foto/bony/10.jpg "" /></a></li>


	
     </ul>



        </div>








</div>













</div>



<div style="clear:both;">














<!--старая галерея -->

<!--<img src="/foto/1.jpg" />&nbsp;<img src="/foto/2.jpg" />&nbsp;<img src="/foto/4.jpg" />-->
<!--<img src="/foto/5.jpg" />&nbsp;<img src="/foto/6.jpg" />&nbsp;<img src="/foto/7.jpg" />-->
<!--<img src="/foto/8.jpg" />&nbsp;<img src="/foto/9.jpg" />&nbsp;<img src="/foto/12.jpg" />-->
<!--<img src="/foto/13.jpg" />&nbsp;<img src="/foto/14.jpg" />&nbsp;<img src="/foto/1.jpg" />-->

<!--<p style="padding-top:10px;"><b>Каникулы Бонифация</b></p><br />-->

<!--<img src="/foto/bony/1.jpg" />&nbsp;<img src="/foto/bony/10.jpg" />&nbsp;<img src="/foto/bony/4.jpg" />-->
<!--<img src="/foto/bony/5.jpg" />&nbsp;<img src="/foto/bony/7.jpg" />&nbsp;<img src="/foto/bony/10.jpg" />-->



</div>

</div>



<?php include_once ("blocks/footer.php"); ?>


</div>
</body>
</html>