$( document ).ready(function() {
  

     $("#user_login_form").validate({
        submitHandler: function(form) {
            if (checkPage("email,pwd")) {
                form.submit();
            }
        }
    }); 

        $( "#email" ).rules( "add", {
            required: true,
            email: true,
            messages:{
                required : "Please provide email address",
                email: "Please Enter valid email address."        
            }
        });


        $( "#pwd" ).rules( "add", {
            required: true,
            minlength: 5,
            messages: {
                    required: "Please provide a password",
                    minlength: "Use at least 5 characters."       
            }
        });



});

