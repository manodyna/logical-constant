jQuery(document).ready(function($) {
	$('.dw-glossary-index li a.dw-glossary-menu').on('click', function(event) {
		var item = $(this).data('name');
		if ( item == 'all' ) {
			$('.dw-glossary-items').show();
		} else {
			$('.dw-glossary-items').hide();
			$('#dw-glossary-'+item ).show();
		}
		
	});

	$( "#dw-glossary-search" ).keyup(function() {
  		var filter = $(this).val().toLowerCase();
  		$('.dw-glossary-list .dw-glossary-items').hide();
  		$('.dw-glossary-list .post-item').hide();
  		var flag = false;
  		$('.dw-glossary-list').find('li.post-item a').each(function(index, el) {
  			if( $(this).text().toLowerCase().indexOf( filter ) != -1 ){
  				flag = true;
    			$(this).parent('.post-item').show();
    			$(this).parents('.dw-glossary-items').show();
			}
  			
  		});

  		if ( flag == false ) {
  			$('.dw-glossary-alert').show();
  		} else {
  			$('.dw-glossary-alert').hide();
  		}
  		
	});
});
