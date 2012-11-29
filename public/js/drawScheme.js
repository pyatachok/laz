var ajax_server = 'ajaxserver.php';
	
function draw_hall(data){
	$("#hall-scheame").html('');
	$("#hall-scheame").append(data.html).dialog({
		position: "top",
		title: window.performance_title,
		modal: true,
		minWidth: parseInt(data.width)+100 + 320,
		minHeight: parseInt(data.height)+40,
//		autoOpen: false,
		buttons: [
		{
			text: "Отчистить выбор",
			click: function() { 
				$("#seats").val('');
				$("#seats-rows").val('');
				/* Очистка мест на схеме */
				$('a.seat span.booked').each(function(){
					$(this).removeClass('booked').addClass('free');
				})
				window.seats = [];
			}
		},
		{
			text: "Бронировать",
			click: function() { 
				$("#seats_ids").val($("#seats").val());
				$("#seats_rows_ids").val($("#seats-rows").val());
				$("#kolvo").val(window.seats.length);
				$(this).dialog("close"); 
			}
		},
		{
			text: "Отменить",
			click: function() {
				$(this).dialog("close");
			}
		},
				
		]
	});
}
	
function change_date(ajax_server, seans){
	$(".loader").show();
	$.ajax({
		url: ajax_server+'?time='+new Date().getTime(),             // указываем URL и
		dataType : "json", 
		cache : false, 
		data : {
			'seans' : seans, 
			'action' : 'getHall'
		},
		scriptCharset : 'utf8',
		success : function(data){
			$(".loader").hide();
			draw_hall(data);
			
		}
	});
//		console.log(date);
}
	
	
$(document).ready(function(){
	var regexp = /[1-9]+/;
				
	$('.buttons').button();

	window.seats = [];
					
	$(".loader").hide();
	
	$("#chose-seans").dialog({
//		position: "top",
		title: 'Выберите сеанс',
		modal: true,
		minWidth: 400,
		minHeight: 300,
//		autoOpen: false,
		buttons: [
		{
			text: "Выбрать",
			click: function() { 
				$("#seans_id").val($("#seans").val());
				$("#seans_val").val($(this).find('option:selected').text());
				$(this).dialog("close"); 
			}
		},
		{
			text: "Отменить",
			click: function() {
				$(this).dialog("close");
			}
		},
				
		]
	});
					
	$("#seans").change(function(){
//		console.log($(this).find('option:selected').text());
		
		$("#hall-scheame").empty().dialog('destroy');
		//						$("#hall-scheame").html('');
		$("#kolvo").val('Выберите места...');
		window.seats=[];
		if (0 < $("#seans").val()){
			change_date(ajax_server, $("#seans").val());
		}
	});
					
	$('.seat').live("click", function(){
						
		var $seats = $('#seats');
		var $seats_rows = $('#seats-rows');
		var str = $(this).attr('id');
		var re = /\d+/gi;
		var free = /free/i;
		var notfree = /booked/i;
		var seatObj = str.match(re);
						
		/* кликабельность мест */
						
		if (free.test($(this).find('span').attr('class'))) {
			$(this).find('span').removeClass('free').addClass('booked');
		} else {
			if (notfree.test($(this).find('span').attr('class'))) {
				$(this).find('span').removeClass('booked').addClass('free');
			}
		}
		/* кликабельность мест */
						
		if ( 'undefined' ==  typeof window.seats){
			window.seats=[];
		}
		if (-1 == $.inArray(seatObj[0], window.seats)){ 
			window.seats.push(seatObj[0]);
			$seats.val($seats.val()+seatObj[0]+',')
			$seats_rows.val($seats_rows.val()+'Р('+seatObj[1]+')М('+seatObj[2]+'),')
		} else {
			var index_to_del = $.inArray(seatObj[0], window.seats);//get index to del
			window.seats.splice(index_to_del, 1);//del from array
			$seats.val(window.seats.join());//del from hide string
							
			var newString = $seats_rows.val().replace('Р('+seatObj[1]+')М('+seatObj[2]+'),', '');
			$seats_rows.val(newString);
		}
				
	});
	$('#knopka').click(function(){
		if (  '' == $("#seans_id").val() || '' == $("#kolvo").val() || !regexp.test($("#kolvo").val()) ){
			return false;
		}
		$('#forma').find('input[name=action]').val('booking');
		$('#forma').submit();
	});
	$('#buy').click(function(){
		if (  '' == $("#seans_id").val() || '' == $("#kolvo").val() || !regexp.test($("#kolvo").val()) ){
			return false;
		}
		$('#forma').find('input[name=action]').val('buy');
		$('#forma').submit();
	});
	
	/* Управление доставкой */
	$('input[name="is_delivery"]:radio').change(function(){
		if ( 'delivery' == $(this).val() ) {
			$('input[name="dostavka"]').show();
			$('span[name="dostavka"]').show();
		} else {
			$('input[name="dostavka"]').val('').hide();
			$('span[name="dostavka"]').hide();
		}
	});
	/* Управление доставкой */
})
				