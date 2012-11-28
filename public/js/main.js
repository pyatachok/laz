$(document).ready(function(){
	$( ".menu" ).menu();
	
	$('.price').priceFormat({
		prefix: '',
		thousandsSeparator: '',
		centsSeparator: '.'
	});
	
	/*
	 * Датапикер в форме сеансов
	 */
	$("#seans_date").AnyTime_picker(
      { format: "%Y-%m-%d %H:%i:%s",
        hideInput: false
	} );
	
	
	
	
})

