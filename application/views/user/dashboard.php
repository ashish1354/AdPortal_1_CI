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
            <div class="box_title">User Dashboard</div>
            <div class="box_content">
               <p class="newad_error"><?php echo $msg?></p>
               <h3> Your Last date of subscription is = <?php echo date('d-m-Y h:i:s a',$l_date);?></h3>
               <h4> Total Number of AD = <?php echo $tt_add;?></h4>
               <h4> Total Published AD = <?php echo $pub_add;?></h4>
               <h4> Remaining AD= <?php echo $tt_add-$pub_add;?></h4>
               <?php if (($tt_add-$pub_add)==0) :?>
                  You can not Create or Publish new AD change your subscription pack.<a href="selectSubscription">Click here..</a><br>
               <?php endif?>
               <?php if (!empty($tt)) :?>
                  Your subscription pack are finished. Choose your subscription pack.<a href="selectSubscription">Click here..</a>
               <?php endif?>
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
