$( document ).ready(function() {

     $("#form").validate({

     	rules:{
     		head:{
     			  required: true,
                  vhead: true,
                  minlength: 5,
                  maxlength: 40,
     		},
     		content:{
     			  required: true,
                  vhead: true,
                  minlength: 45,
                  maxlength: 900,
     		},
     		contact:{
     			  required: true,
                  digitOnly: true,
                  length: 10
     		},
     		cost:{
     			  required: true,
                  digitOnly: true,
     		},
     		ico:{
     			  required: true,
     			  accept: "jpg|jpeg|png|ico|bmp"
     		}
     	},
     	messages:{								   
            head:{	
                required: 						   "Head is required.",
                minlength: jQuery.validator.format("Use Minimum {0} characters"),
                vhead: 							   "Use only alphanumeric keys",
                maxlength: jQuery.validator.format("Use Minimum {0} characters"),
            },
            content:{
                required: "Content is required.",
                vhead: "Use only alphanumeric keywords",
                minlength: jQuery.validator.format("Use at least {0} characters."),
                maxlength: jQuery.validator.format("Use at least {0} characters."),
            },
            contact:{
                required: "Contact is required.",
                digitOnly: "Use only numbers",
                length: "Must be 10 Digits."
            },
            cost:{
                required: "Cost is required.",
                digitOnly: "Use only numbers",
            },
            ico:{
            	required: "Image is required.",
            	accept: "Select only Image file."
            }
     	},

        submitHandler: function(form) {
            var fields="head,content,contact,cost,ico,selc,selc1";
            if (checkPage(fields)) {
                form.submit();
            }
        }
    }); 
});