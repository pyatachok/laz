<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<title>Подглядываем за творческим процессом</title>
<link href="foto-video.css" rel="stylesheet" type="text/css" />


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
<li><a href="http://liveanimation.ru/images/100.jpg"><img alt="" src="http://liveanimation.ru/images/100mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/1.jpg"><img alt="" src="http://liveanimation.ru/images/1mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/2.jpg"><img alt="" src="http://liveanimation.ru/images/2mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/102.jpg"><img alt="" src="http://liveanimation.ru/images/102mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/12.jpg"><img alt="" src="http://liveanimation.ru/images/12mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/103.jpg"><img alt="" src="http://liveanimation.ru/images/103mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/31.jpg"><img alt="" src="http://liveanimation.ru/images/31mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/104.jpg"><img alt="" src="http://liveanimation.ru/images/104mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/8.jpg"><img alt="" src="http://liveanimation.ru/images/8mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/105.jpg"><img alt="" src="http://liveanimation.ru/images/105mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/26.jpg"><img alt="" src="http://liveanimation.ru/images/26mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/106.jpg"><img alt="" src="http://liveanimation.ru/images/106mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/6.jpg"><img alt="" src="http://liveanimation.ru/images/6mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/107.jpg"><img alt="" src="http://liveanimation.ru/images/107mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/4.jpg"><img alt="" src="http://liveanimation.ru/images/4mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/108.jpg"><img alt="" src="http://liveanimation.ru/images/108mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/14.jpg"><img alt="" src="http://liveanimation.ru/images/14mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/109.jpg"><img alt="" src="http://liveanimation.ru/images/109mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/30.jpg"><img alt="" src="http://liveanimation.ru/images/30mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/110.jpg"><img alt="" src="http://liveanimation.ru/images/110mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/15.jpg"><img alt="" src="http://liveanimation.ru/images/15mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/111.jpg"><img alt="" src="http://liveanimation.ru/images/111mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/3.jpg"><img alt="" src="http://liveanimation.ru/images/3mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/112.jpg"><img alt="" src="http://liveanimation.ru/images/112mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/101.jpg"><img alt="" src="http://liveanimation.ru/images/101mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/16.jpg"><img alt="" src="http://liveanimation.ru/images/16mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/11.jpg"><img alt="" src="http://liveanimation.ru/images/11mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/19.jpg"><img alt="" src="http://liveanimation.ru/images/19mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/21.jpg"><img alt="" src="http://liveanimation.ru/images/21mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/9.jpg"><img alt="" src="http://liveanimation.ru/images/9mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/22.jpg"><img alt="" src="http://liveanimation.ru/images/22mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/20.jpg"><img alt="" src="http://liveanimation.ru/images/20mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/23.jpg"><img alt="" src="http://liveanimation.ru/images/23mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/18.jpg"><img alt="" src="http://liveanimation.ru/images/18mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/24.jpg"><img alt="" src="http://liveanimation.ru/images/24mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/7.jpg"><img alt="" src="http://liveanimation.ru/images/7mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/25.jpg"><img alt="" src="http://liveanimation.ru/images/25mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/13.jpg"><img alt="" src="http://liveanimation.ru/images/13mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/27.jpg"><img alt="" src="http://liveanimation.ru/images/27mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/28.jpg"><img alt="" src="http://liveanimation.ru/images/28mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/17.jpg"><img alt="" src="http://liveanimation.ru/images/17mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/29.jpg"><img alt="" src="http://liveanimation.ru/images/29mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/10.jpg"><img alt="" src="http://liveanimation.ru/images/10mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/32.jpg"><img alt="" src="http://liveanimation.ru/images/32mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/5.jpg"><img alt="" src="http://liveanimation.ru/images/5mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/33.jpg"><img alt="" src="http://liveanimation.ru/images/33mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/47.jpg"><img alt="" src="http://liveanimation.ru/images/47mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/42.jpg"><img alt="" src="http://liveanimation.ru/images/42mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/52.jpg"><img alt="" src="http://liveanimation.ru/images/52mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/34.jpg"><img alt="" src="http://liveanimation.ru/images/34mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/52.jpg"><img alt="" src="http://liveanimation.ru/images/52mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/35.jpg"><img alt="" src="http://liveanimation.ru/images/35mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/36.jpg"><img alt="" src="http://liveanimation.ru/images/36mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/37.jpg"><img alt="" src="http://liveanimation.ru/images/37mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/39.jpg"><img alt="" src="http://liveanimation.ru/images/39mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/50.jpg"><img alt="" src="http://liveanimation.ru/images/50mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/40.jpg"><img alt="" src="http://liveanimation.ru/images/40mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/36.jpg"><img alt="" src="http://liveanimation.ru/images/36mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/41.jpg"><img alt="" src="http://liveanimation.ru/images/41mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/44.jpg"><img alt="" src="http://liveanimation.ru/images/44mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/45.jpg"><img alt="" src="http://liveanimation.ru/images/45mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/46.jpg"><img alt="" src="http://liveanimation.ru/images/46mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/48.jpg"><img alt="" src="http://liveanimation.ru/images/48mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/49.jpg"><img alt="" src="http://liveanimation.ru/images/49mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/50.jpg"><img alt="" src="http://liveanimation.ru/images/50mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/36.jpg"><img alt="" src="http://liveanimation.ru/images/36mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/51.jpg"><img alt="" src="http://liveanimation.ru/images/51mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/43.jpg"><img alt="" src="http://liveanimation.ru/images/43mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/52.jpg"><img alt="" src="http://liveanimation.ru/images/52mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/37.jpg"><img alt="" src="http://liveanimation.ru/images/37mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/53.jpg"><img alt="" src="http://liveanimation.ru/images/53mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/38.jpg"><img alt="" src="http://liveanimation.ru/images/38mini.jpg "" /></a></li>
     </ul>


<p style="color:#3c0a06; font-size:20px; padding-top:15px; text-align:left; margin-left:35px;">Рабочие видеоматериалы:</p>

    <ul class="jcarousel-skin-photo" id="mycarousel" style="padding-left:100px; padding-top:10px;"> 
	<li style="list-style-type:none;"><a href="http://www.liveanimation.ru/kanikuly-bonifacija-video2.php"><img alt="" src="http://liveanimation.ru/images/video2.jpg "" /></a></li>
	<li style="list-style-type:none;"><a href="http://www.liveanimation.ru/kanikuly-bonifacija-video.php"><img alt="" src="http://liveanimation.ru/images/video1.jpg "" /></a></li>
	<li style="list-style-type:none;"><a href="http://www.liveanimation.ru/kanikuly-bonifacija-video3.php"><img alt="" src="http://liveanimation.ru/images/video3.jpg "" /></a></li>
</ul>



        </div>



</div>

<div style="clear:both;">
<?php include_once ("blocks/footer.php"); ?>
</div>





</div>
</body>
</html>