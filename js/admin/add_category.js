$(document).ready(function() {
	
	$("#form").validate({

		rules:{
			name: {
				required: true,
				minlength: 4,
				vhead: true,
				maxlength: 40,
			},
			slug: {
				required: true,
				minlength: 4,
				vhead: true,
				maxlength: 40,
			},
			key: {
				required: true,
				minlength: 4,
				vhead: true,
				maxlength: 40,
			},
			ico:{
				required: true,
				accept: "jpg|jpeg|png|ico|bmp"
			}
		},
		messages:{
			name:{
				required: "* Please, Enter category name.",
				minlength: "Please, use at least {0} characters.",
				vhead: "Please, use only alphanumeric characters.",
				maxlength: "Please, use maximum {0} characters.",
			}, 
			slug:{
				required: "* Please, Enter slug details.",
				minlength: "Please, use at least {0} characters.",
				vhead: "Please, use only alphanumeric characters.",
				maxlength: "Please, use maximum {0} characters.",
			}, 
			key:{
				required: "* Please, Enter relevant keys.",
				minlength: "Please, use at least {0} characters.",
				vhead: "Please, use only alphanumeric characters.",
				maxlength: "Please, use maximum {0} characters.",
			}, 
			ico:{
				required: "* Please, select image file for icon.",
				accept: "Please, select only image file."
			}

		},
        submitHandler: function(form) {
            if (checkPage("name,slug,key,ico")) {
                form.submit();
            }
        }
    }); 
});