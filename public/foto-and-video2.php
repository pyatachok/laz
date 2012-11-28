<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<title>Подглядываем за творческим процессом</title>
<link href="foto-video2.css" rel="stylesheet" type="text/css" />


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

	<li><a href="http://liveanimation.ru/images/IMG_4413.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4413mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4428.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4428mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4476.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4476mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4481_1.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4481mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4489.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4489mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4495.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4495mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4500.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4500mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4515.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4515mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4516.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4516mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4517.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4517mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4519.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4519mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4520.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4520mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4521.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4521mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4526.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4526mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4527.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4527mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4528.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4528mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4529.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4529mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4534.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4534mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4536.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4536mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4539.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4539mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4540.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4540mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4542.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4542mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4549.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4549mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4550.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4550mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4553.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4553mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4564.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4564mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4566.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4566mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4574.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4574mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4576.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4576mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4579_1.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4579_mini1.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4580.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4580mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4584.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4584mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4585.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4585mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4589.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4589mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4592.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4592mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4593.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4593mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4594.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4594mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4595.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4595mini.jpg "" /></a></li>


	<li><a href="http://liveanimation.ru/images/IMG_4600.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4600mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4602.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4602mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4604.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4604mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4605.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4605mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4608.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4608mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4616.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4616mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4617.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_46017mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4621.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4621mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4624.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4624mini.jpg "" /></a></li>


	<li><a href="http://liveanimation.ru/images/IMG_4625.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4625mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4626.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4626mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4627.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4627mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4628.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4628mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4638.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4638mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4640.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4640mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4641.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4641mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4643.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4643mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4650.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4650mini.jpg "" /></a></li>


	<li><a href="http://liveanimation.ru/images/IMG_4655.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4655mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4656.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4656mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4657.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4657mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4661.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4661mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4662.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4662mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4663.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4663mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4664.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4664mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4666.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4666mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4667.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4667mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4668.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4668mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4669.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4669mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4670.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4670mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4671.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4671mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4674.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4674mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4677.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4677mini.jpg "" /></a></li>
	<li><a href="http://liveanimation.ru/images/IMG_4679.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4679mini.jpg "" /></a></li>

	<li><a href="http://liveanimation.ru/images/IMG_4691_1.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4691_1mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4692.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4692mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4693.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4693mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4694.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4694mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4695_1.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4695_1mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4697.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4697mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4698.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4698mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4699.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4699mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4700.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4700mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4701.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4701mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4705.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4705mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4709.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4709mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4710.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4710mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4711.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4711mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4715.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4715mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4716.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4716mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4720.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4720mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4724.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4724mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4730.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4730mini.jpg "" /></a></li>


<li><a href="http://liveanimation.ru/images/IMG_4488.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4488mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4594.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4594mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4607.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4607mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4618.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4618mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4629.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4629mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4630.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4630mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4631.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4631mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4632.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4632mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4633.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4633mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4634.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4634mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4642.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4642mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4644.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4644mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4645.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4645mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4652.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4652mini.jpg "" /></a></li>


<li><a href="http://liveanimation.ru/images/IMG_4686.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4686mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4687.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4687mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4690.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4690mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4691.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4691mini.jpg "" /></a></li>

<li><a href="http://liveanimation.ru/images/IMG_4702.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4702mini.jpg "" /></a></li>
<li><a href="http://liveanimation.ru/images/IMG_4718.jpg"><img alt="" src="http://liveanimation.ru/images/IMG_4718mini.jpg "" /></a></li>	
     </ul>


<p style="color:#3c0a06; font-size:20px; padding-top:15px; text-align:left; margin-left:35px;">Рабочие видеоматериалы:</p>

    <ul class="jcarousel-skin-photo" id="mycarousel" style="padding-left:312px; padding-top:10px;"> 
	<li style="list-style-type:none;"><a href="http://www.liveanimation.ru/mulen-video.php"><img alt="" src="http://liveanimation.ru/images/video4.jpg "" /></a></li>
</ul>

        </div>

</div>

<div style="clear:both;">
<?php include_once ("blocks/footer.php"); ?>
</div>

</div>
</body>
</html>