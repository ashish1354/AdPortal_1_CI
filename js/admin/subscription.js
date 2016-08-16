$(document).ready(function() {
	
	$("#form_sub").validate({

		rules:{
			day: {
				required: true,
				digitOnly: true,
				maxlength: 4,
			},
			na: {
				required: true,
				digitOnly: true,
				maxlength: 4,
			},
			pi: {
				required: true,
				digitOnly: true,
				maxlength: 10,
			},

		},
		messages:{
			day:{
				required: " Please, Enter Days Limit.",
				digitOnly: "Please, use only digits.",
				maxlength: "Please, use maximum {0} characters.",
			}, 
			na:{
				required: " Please, Enter Number Of Ads.",
				digitOnly: "Please, use only digits.",
				maxlength: "Please, use maximum {0} characters.",
			}, 
			pi:{
				required: " Please, Enter Prize In $.",
				digitOnly: "Please, use only digits.",
				maxlength: "Please, use maximum {0} characters.",
			}, 

		},
        submitHandler: function(form) {
            if (checkPage("day,na,pi")) {
                form.submit();
            }
        }
    }); 
});