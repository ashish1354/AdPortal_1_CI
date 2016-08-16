<div id="main">
   <div class="my_box3 breadcrumb-wrap">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="#" class="main-home"><?php echo $username;?></a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="dashboard" class="main-home"> My Account </a></span> &gt;      
      <span typeof="v:Breadcrumb"><a href="editAd" id="editAd"><span property="v:title">EDIT AD</span></a></span>
      <script src="<?php echo base_url();?>js/user_postad.js"></script>
   </div>
   </div>
   <div class="clear10"></div>
   <div id="content" class="account_content">
      <!-- ############################################# -->
      <div class="my_box3">
         <div class="padd10">
            <div class="box_title">Edit AD </div>
            <div class="box_content">

               <?php echo form_open_multipart("Home/editAD1",array('id' => 'form', 'novalidate'=>'novalidate' ));?>
               <p id="err" class="newad_error"><?php echo $msg;?></p>
                  <ul class="post-new ">
                    <?php echo form_hidden($hide);?>
                     <li>
                        <h2><?php echo $lcatn;?></h2>
                        <p><?php echo form_dropdown($catn, $select,$selected);?></p>
                     </li>
                     <li>
                        <h2><?php echo $lcatn1;?></h2>
                        <p><?php echo form_dropdown($catn1, $select1,$selected1);?></p>
                     </li>
                     <li>
                        <h2><?php echo $lhead;?></h2>
                        <p><?php echo form_input($head);?></p>
                     </li>
                     <li>
                        <h2><?php echo $lcontent;?></h2>
                        <p><?php echo  form_textarea($content);?></p>
                     </li>
                     <li>
                        <h2><?php echo $lcontact;?></h2>
                        <p><?php echo form_input($contact);?></p>
                     </li>
                     <li>
                        <h2><?php echo $lcost;?></h2>
                        <p><?php echo form_input($cost);?></p>
                     </li>  
                     <li>
                        <h2><?php echo $lico;?></h2>
                        <p><?php echo form_upload($ico);?></p>
                     </li>                                         
                     <li>
                        <h2>&nbsp;</h2>
                        <p><?php echo form_submit($submit,$submit['value']);?></p>
                     </li>
                  </ul>
               <?php echo form_close();?>
            </div>
         </div>
      </div>
   </div>

  <?php
         $this->load->view('user/usersidebar');
      ?>  

      <!-- #####################Side BAr#################### -->
</div>
<!-- close main div -->
