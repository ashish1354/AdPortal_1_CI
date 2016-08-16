  $(function() {
    $('.txt_and_digit_space_only').keydown(function(e) {
      if (e.shiftKey || e.ctrlKey || e.altKey) {
        e.preventDefault();
      } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 32) || (key == 13)|| (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90) || (key >= 48 && key <= 57)) ) {
          e.preventDefault();
        }
      }
    });


    
    $('.txt_and_digit_space_only').bind('copy paste', function (e) {
        this.value=this.value.replace(/[^a-zA-Z0-9]/g,'');
        //e.preventDefault();
    });
  });   

    function checkPage(value){
      var items=value.split(",");
      for(var i=0; i<items.length; i++){
        console.log($("#"+items[i]).length+" Values"+items[i]);
          if( $("#"+items[i]).length!=1)  
          {    
               alert("Page is damage. Reloading.....!!!!");
               location.reload();
               return false;
          }
      }
        return true;
    }

   function checkCaptcha(value,cstring) {
    // Determine the numbers which are generated in captchaOperation
    var items = cstring.split(' '),
            sum   = parseInt(items[0]) + parseInt(items[1]);
    return value == sum;
   };

   function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
  }
//----------------------Rules----------------------------------
$.validator.methods.vname = function( value, element ) {
  return this.optional( element ) || /^[a-zA-Z ]+$/.test( value );
}
$.validator.methods.seq = function( value, element,param ) {
  return this.optional( element ) || checkCaptcha(value,param);
}
$.validator.methods.vhead = function( value, element ) {
  return this.optional( element ) || /^[a-zA-Z 0-9]+$/.test( value );
}
$.validator.methods.digitOnly = function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/.test( value );
}
$.validator.methods.length = function( value, element,param ) {
  return this.optional( element ) || value.length == param;
}
$.validator.methods.valuesCheckDB = function( value, element,param ) {
      var som ='test';
      $.ajax({
            url: 'getAvailable',
            global: false,
            type: 'POST',
            data:  {email: value},
            async: false, //blocks window close
            success: function(data) {
                som=data;
            }
        });
      return this.optional(element) || som!="false";
}