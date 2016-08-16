$( document ).ready(function() {
  
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 100), '='].join(' '));
    var items = $('#captchaOperation').html().split(' ');
    var v1=items[0];
    var v2=items[2];
    var pax=v1+" "+v2;

    $("#userRegister_form").validate({

        rules: {
            email:{
                required: true,
                email: true,    
                valuesCheckDB: true,         
            },
            name:{
                  required: true,
                  minlength: 2,
                  vname: true,
                  maxlength: 40,
            },
            rpwd: {
                required: true,
                minlength: 5,
                equalTo: '#pwd'
            },
            seq: {
                required: true,
                seq: pax,
            }
        },       
        // Specify the validation error messages
        messages: {
            email:{
                required : "Please provide email address.",
                email: "Please Enter valid email address."  ,
                valuesCheckDB: "Already registered, Choose another"
            },
            name:{
                required: "Please, provide your name.",
                minlength: jQuery.validator.format("Please, Use at least {0} characters."),
                vname: "Please, use only Alphabets.",
                maxlength: jQuery.validator.format("Please, Use maximum {0} characters."),
            },
            rpwd: {
                required: "Please Retype password.",
                minlength: "Use at least 5 characters.",
                equalTo: "password are not same"
            },
            seq: {
                required: "Please enter answer.",
                seq: "Worng answer"
            }
        },
        submitHandler: function(form) {
            var fields="email,name,rpwd,pwd,seq";
            if (checkPage(fields)) {
                form.submit();
            }
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

