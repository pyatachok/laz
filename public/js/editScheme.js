/*
 * Редактирование схемы зала
 */
$(document).ready(function(){
	
//	$('#rows_1, #rows_2').multiselect({
//		checkAllText: 'Выбрать всё',
//		uncheckAllText: 'Отменить всё',
//		noneSelectedText: 'Выберите ряд',
//		selectedList: 1,
//		multiple: false,		
//		classes: 'form-item',
//		height: 200
//	});
	$('#rows_1, #rows_2,#rows_3').multiselect({
		checkAllText: 'Выбрать всё',
		uncheckAllText: 'Отменить всё',
		noneSelectedText: 'Выберите ряд',
		selectedList: 5,
		classes: 'form-item',
		height: 200
	});
	$('#places_1, #places_2, #places_3').multiselect({
		selectedList: 1,
		noneSelectedText: 'Выберите места'
	});
	
	$('#ticket-states_2, #ticket-states_3').multiselect({
		selectedList: 1,
		classes: 'form-item',
		multiple: false,
		height: 'auto'
	});

	$('#place-types_2').multiselect({
		selectedList: 1,
		classes: 'form-item',
		multiple: false,
		height: 'auto'
	});
	
	$('#price, .price').priceFormat({
		prefix: '',
		thousandsSeparator: '',
		centsSeparator: '.'
	});
		
	$("#update-ticket-states").button().click(function(){
		var places = [] ;
			$("#places_1").multiselect('getChecked').each(function(){
				places.push($(this).val());
			});
		var row = [];
		$("#rows_1").multiselect('getChecked').each(function(){
			row.push($(this).val());
		});
		var ticket_state= $("#ticket-states_2").multiselect('getChecked').val();
		
		var data = {
			zal_alias : $(this).attr('data-zal-alias'), 
			seans_id : $(this).attr('data-seans-id'),
			places : places.join(),
			row : row.join(),
			ticket_state : ticket_state
		};
		
		if ( '' == data.places 
			|| '' == data.row 
			|| 'undefined' == typeof(data.row) 
			|| ( '-1' == data.ticket_state )
		) {
			return false;
		}
		var act = 'updateTicketStates';
	
		$.ajax({
			url: '/admin/zal/update/time/'+new Date().getTime(), 
			dataType : "json",
			cache : false,
			method : 'post',
			data : {'data' : data, 'act' : act},
			scriptCharset : 'utf8',
			success : function(data){
				if ('reload' == data.action){
					document.location.reload();
				}
//			$(".loader").hide();
//			draw_hall(data);
			}
		}); 
	});
	
	$("#update-place-types").button().click(function(){
		var places = [] ;
			$("#places_2").multiselect('getChecked').each(function(){
				places.push($(this).val());
			});
		var row = [];
		$("#rows_2").multiselect('getChecked').each(function(){
			row.push($(this).val());
		});
		var place_type = $("#place-types_2").multiselect('getChecked').val();
		
		var data = {
			zal_alias : $(this).attr('data-zal-alias'), 
			seans_id : $(this).attr('data-seans-id'),
			places : places.join(),
			row : row.join(),
			place_type : place_type
		};
		if ( '' == data.places 
			|| '' == data.row 
			|| 'undefined' == typeof(data.row) 
			|| ( '-1' == data.place_type )
		) {
			return false;
		}
		
		var act = 'updatePlacesTypes';
		
		$.ajax({
			url: '/admin/zal/update/time/'+new Date().getTime(), 
			dataType : "json",
			cache : false,
			method : 'post',
			data : {'data' : data, 'act' : act},
			scriptCharset : 'utf8',
			success : function(data){
				if ('reload' == data.action){
					document.location.reload();
				}
//			$(".loader").hide();
//			draw_hall(data);
			}
		}); 
	});
	
	$("#update-prices-types").button().click(function(){
		var ticket_state= $("#ticket-states_3").multiselect('getChecked').val();
		var price = $('#price').val();
		
		
		var data = {
			zal_alias : $(this).attr('data-zal-alias'), 
			seans_id : $(this).attr('data-seans-id'),
			price : price,
			ticket_state : ticket_state
		};
		console.info(data);
		if ( '' == data.price 
			|| ( '-1' == data.ticket_state )
		) {
			return false;
		}
		
		var act = 'updatePricesTypes';
		
		$.ajax({
			url: '/admin/zal/update/time/'+new Date().getTime(), 
			dataType : "json",
			cache : false,
			method : 'post',
			data : {'data' : data, 'act' : act},
			scriptCharset : 'utf8',
			success : function(data){
				if ('reload' == data.action){
					document.location.reload();
				}
//			$(".loader").hide();
//			draw_hall(data);
			}
		}); 
	});
	$("#update-kassa-url").button().click(function(){
		var places = [] ;
		$("#places_3").multiselect('getChecked').each(function(){
			places.push($(this).val());
		});
		var row = [];
		$("#rows_3").multiselect('getChecked').each(function(){
			row.push($(this).val());
		});
		var kassa_url = $("#kassa-url").val();
		
		var data = {
			zal_alias : $(this).attr('data-zal-alias'), 
			seans_id : $(this).attr('data-seans-id'),
			places : places.join(),
			row : row.join(),
			kassa_url : kassa_url
		};
		if ( '' == data.places 
			|| '' == data.row 
			|| 'undefined' == typeof(data.row) 
			|| ( '' == data.kassa_url )
		) {
			return false;
		}
		var act = 'updateKassaUrl';
		
		$.ajax({
			url: '/admin/zal/update/time/'+new Date().getTime(), 
			dataType : "json",
			cache : false,
			method : 'post',
			data : {'data' : data, 'act' : act},
			scriptCharset : 'utf8',
			success : function(data){
				if ('reload' == data.action){
					document.location.reload();
				}
//			$(".loader").hide();
//			draw_hall(data);
			}
		}); 
	});
})
