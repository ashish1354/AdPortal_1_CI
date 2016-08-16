
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ad Portal  </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>css/custom.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>js/admin_login.js"></script>

    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jRule.js"></script>
    <script src="<?php echo base_url();?>js/admin/login.js"></script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">


            <?php echo form_open("admin/Home",array('id' => 'form','novalidate'=>'novalidate' ));?>
              <h1>Login Form</h1>

              <p id="err" style="color:red;"><?php echo $msg;?></p>
              <div>
              	<?php echo form_input($uname)?>
              </div>
              <div>
                <?php echo form_password($pwd)?>
              </div>
              <div>
                <?php echo form_button($submit,$submit['value']);?>
                
              </div>

              <div class="clearfix"></div>

              
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>