$(function() {
	$('.test').on('submit', function(e){
		e.preventDefault();
	    $.ajax({
	        type: "POST",
	        url: window.location.href,
	        data: $(this).serialize(),
	        beforeSend: function() {
	           
	        },
	        success: function(msg){
	           
	        }
	    });
	});

});