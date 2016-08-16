<div id="main">
   <div class="my_box3 breadcrumb-wrap">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="#" class="main-home"><?php echo $username;?></a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="dashboard" class="main-home"> My Account </a></span> &gt;      
      <span typeof="v:Breadcrumb"><span property="v:title">User Dashboard</span></span>
   </div>
   </div>
   <div class="clear10"></div>
      <div id="content" class="account_content">
      <!-- ############################################# -->
      <div class="my_box3">
         <div class="padd10">
            <div class="box_title">Message For user</div>
            <div class="box_content">
            <?php echo $msg;
            print_r($this->input->post);
            ?>
            </div>
         </div>

      </div>
   </div>
      <?php
         $this->load->view('user/usersidebar');
      ?>  
</div>
