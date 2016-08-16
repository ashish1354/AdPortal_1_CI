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
            <p id="resultdiv"></p>
            <div class="box_content">
                  <?php foreach ($subscr as $key => $value) {?>
                  <div class="post   me_featured_sk  ">
                     <div class="price_tag_main">
                        <div class="price_tag_1"></div>
                        <div class="price_tag_2">
                           <div class="paddspec"><?php echo number_format($value['prise'],2)," $";?></div><br>
              
                            <form action="myRequest" class="payform" method="post" id="<?php echo $value['id'];?>" name="frmPayPal1" >
                             <input type="hidden" name="item_name" value="<?php echo $value['id'];?>">
                          <input type="submit" style=' cursor: pointer;' class="submit_buttons" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Purchase >>">                            
                            </form> 

                        </div>
                     </div>
                     <div class="padd10">
                        <div class="title_holder">
                           <h2><a href="" rel="bookmark" title="Mobile for sale">
                              Subscription ID :- <?php echo $value['id']?> </a>
                           </h2>
                           <p class="mypostedon">
                           </p>
                           <ul class="can_be_main_details">
                              <li>
                                 <img src="<?php echo base_url();?>images/clock.png" width="16" height="16" alt="clock"> 
                                 <p> Validity :- <?php echo $value['day']?>  Days</p>
                              </li>

                           </ul>
                           <ul class="can_be_main_details">
                              <li>
                                 <img src="<?php echo base_url();?>images/folder.png" width="16" height="16" alt="folder">
                                 <p> Numbers of AD provided :- <?php echo $value['ads']?></p>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <?php } ?>



            </div>
         </div>
         <div class="nav">
         <?php if ($PpNo==TRUE && $PpNo!=0):?>
           <a <?php echo "href=?PpNo=$PpNo";?>>&lt;&lt; <?php echo $PpNo?> Previous </a>
         <?php endif ?>
         <?php if ($NpNo==TRUE):?>
           <a <?php echo "href=?NpNo=$NpNo";?>>Next Page &nbsp <?php echo $NpNo?> &gt;&gt;</a> 
         <?php endif ?>  
         </div>
      </div>
   </div>
      <?php
         $this->load->view('user/usersidebar');
      ?>  
</div>
