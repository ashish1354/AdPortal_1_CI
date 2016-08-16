<div id="main">
<div class="my_box3 breadcrumb-wrap">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="loginUser" class="main-home">User Login</a></span> &gt;
      <span typeof="v:Breadcrumb"><span property="v:title">Login to continue.</span></span>
      <script type="text/javascript" src="<?php echo base_url();?>js/login.js"></script>
   </div>
</div>
<div class="clear10"></div>
<div class="my_box3" style="margin-top:5px;">
   <div class="padd10">
      <div class="box_title">User Login</div>
      <div class="box_content">

          <?php echo form_open("Home/loginUser",array('id' => 'user_login_form','novalidate'=>'novalidate' ));?>
            <ul class="post-new"><p id="err" class="newad_error"><?php echo $msg;?></p>
               <li>
                  <h2><?php echo $lemail;?></h2>
                  <p><?php echo form_input($email);?>
                  </p>
               </li>
               <li>
                  <h2><?php echo $lpwd;?></h2>
                  <p><?php echo form_password($pwd);?></p>
               </li>
               <li>
                  <h2>&nbsp;</h2>
                  <p>
                     <?php echo form_submit($submit,$submit['value']);?>
                     Not registered <a href="userRegister">Register here..</a>
                  </p>
               </li>
            </ul>
         <?php echo form_close();?>


      </div>
   </div>
</div>