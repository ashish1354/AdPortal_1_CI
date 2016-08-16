<div id="main">
<div class="my_box3 breadcrumb-wrap">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="userRegister" class="main-home">User Registration</a></span> &gt;
      <span typeof="v:Breadcrumb"><span property="v:title">Register as new user before ad posting.</span></span>
      <script type="text/javascript" src="<?php echo base_url();?>js/nn_user.js"></script>
   </div>
</div>
<div class="clear10"></div>
<div class="my_box3" style="margin-top:5px;">
   <div class="padd10">
      <div class="box_title">User Registration</div>
      <div class="box_content">

         <?php  if (!($this->session->userdata('u_id'))): ?>
          <?php echo form_open("Home/completeRegister",array('id' => 'userRegister_form','novalidate'=>'novalidate' ));?>
            <ul class="post-new"><p id="err" class="newad_error"><?php echo $msg;?></p>
               <li>
                  <h2><?php echo $lname;?></h2>
                  <p class="mm_c"><?php echo form_input($namee);?><span class="error"><br></span> </p><span class="error"></span>
               </li>
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
                  <h2><?php echo $lrpwd;?></h2>
                  <p><?php echo form_password($rpwd);?></p>
               </li>
               <li>
                  <h2>Sum of  <text id="captchaOperation"></text> *</h2>
                  <p><?php echo form_input($seq);?></p>
               </li>
               <li>
                  <h2>&nbsp;</h2>
                  <p>
                     <?php echo form_submit($submit,$submit['value']);?>
                     Already registered <a href="loginUser">Login here..</a>
                  </p>
               </li>
            </ul>
         <?php echo form_close();         
         else:
         ?>
            <p>
               Please, <a href="logut">Logout</a> for new registration.
            </p>
          <?php endif;?>  
         <!-- ####################################### Step 2 ######################################### -->
         <!-- ####################################### Step 3 ######################################### -->
         <!-- end --> 
      </div>
   </div>
</div>