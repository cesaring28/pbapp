$(document).ready(function(){

		$('#form-pb').validate({
                rules: {
                    phone: {
                        required: true,
                        required: true
                    },

                    name: {
                        required: true,
                        minlength: 3
                    },

                    date_add: {
                        required: true,
                        required: true
                    },  
                },
		highlight: function(element) {
			$(element).closest('.control-group').removeClass('success').addClass('error');
                },
		success: function(element) {
                    element
			.text('OK!').addClass('valid')
			.closest('.control-group').removeClass('error').addClass('success');
		}
	  });

}); // end document.ready
