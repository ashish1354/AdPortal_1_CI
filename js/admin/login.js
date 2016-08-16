$(document).ready(function() {
	
	$("#form").validate({

		rules:{
			lgid: {
				required: true,
			},
			lgpass:{
				required: true,
				minlength: 4,
			},
		},
		messages:{
			lgid:{
				required: "* Please, Enter your Username.",
			}, 
			lgpass:{
				required: "* Please, Enter your Password.",
				minlength: "* Please, use at at least {0} characters.",
			},
		},
        submitHandler: function(form) {
            if (checkPage("lgid,lgpass")) {
                form.submit();
            }
        }
    }); 
});