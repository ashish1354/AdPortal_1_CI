<html>
 
   <head> 
      <title>My Form</title> 
   </head>
	
   <body>

         <?php
         $string = 'Here is a string containing "quoted" text.';
         echo form_open_multipart("new/wel/saveFile");
         $data = array(
        'type'  => 'checkbox',
        'name'  => 'email',
        'id'    => 'hiddenemail',
        'value' => 'john@example.com',
        'onclick' => 'sec()'
         );

         echo form_input($data,"",('checked' ));
         echo "<br>New input_1";
         $js = 'onClick="some_function()"';
         echo form_input('username', 'johndoe', $js); 

         echo "<br>New input_2";        
         echo form_password('pass',array('id'=>'pwd','value'=>'123'));

         echo "<br>New input_3";  
         echo form_upload('userfile');

         echo "<br>New input_4";  
         echo form_textarea();

         echo "<br>New input_5";
         

         $options = array('solution' => 'good', )+array(
                 'small'         => 'Small Shirt',
                 'med'           => 'Medium Shirt',
                 'large'         => 'Large Shirt',
                 'xlarge'        => 'Extra Large Shirt',
         );
                  $options['solution'] = 'good';
         echo form_dropdown('shirts', $options, 'large');
         echo "<br>Multi selected: ";

         $data = array('class' => 'selc','id'=>'selc','name'=>'selc' );
         $shirts_on_sale = array('small', 'large');
         echo form_dropdown($data, $options, $shirts_on_sale);

         echo form_fieldset('Address Information');
         echo "<p>fieldset content here</p>\n";
         echo form_fieldset_close();

         echo form_submit("Submit","Submit");  
         ?> 
          <input type="text" name="myfield" value="<?php echo html_escape($string); ?>" />
          
         <?php echo form_close();?>
   </body>
	
</html>