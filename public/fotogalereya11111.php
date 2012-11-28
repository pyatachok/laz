<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<title>Фотогалерея</title>
<link href="fotogalereya.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" type="text/css" href="/css/style_pr.css"/>
<link rel="stylesheet" type="text/css" href="/css/skin_vertical.css"/>
<link rel="stylesheet" type="text/css" href="/css/skin.css"/>

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


<?php include_once ("blocks/menu2.php"); ?>

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
    <p style="color:#3c0a06; font-size:20px; padding-top:15px; text-align:left; margin-left:35px;">Фотогалерея</h1>
    <ul class="jcarousel-skin-photo" id="mycarousel"> 
	<li><a href="http://liveanimation.ru/images/adv.jpg"><img alt="" src="http://liveanimation.ru/images/adv_mini.jpg "" /></a></li>
	
     </ul>



        </div>

</div>

<div style="clear:both;">
<?php include_once ("blocks/footer.php"); ?>
</div>

</div>
</body>
</html>