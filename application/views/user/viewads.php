<div id="main">
   <div class="my_box3 breadcrumb-wrap">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="#" class="main-home"><?php echo $username;?></a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="dashboard" class="main-home"> My Account </a></span> &gt;      
      <span typeof="v:Breadcrumb"><span property="v:title">Post AD</span></span>
   </div>
   </div>
   <div class="clear10"></div>
   <div id="content" class="account_content">
      <!-- ############################################# -->
      <div class="my_box3">
         <div class="padd10">
            <div class="box_title">Create AD</div>
            <div class="box_content">
            <?php 
            if (empty($add_view)) {
               echo "<h4><p>Ad Not Found. Click <a href='postAD'>here</a> to post Ad</p></h4>";
            }
            ?>

               <?php foreach ($add_view as $key => $value) {?>
                  <div class="post   me_featured_sk  " id="post-4018"   >
                     <div class="price_tag_main">
                        <div class="price_tag_1"></div>
                        <div class="price_tag_2">
                           <div class="paddspec"><?php echo number_format($value['cost'],2)," $";?></div>
                           <?php
                           if ($value['status']!=0) {
                              echo "<a style='text-decoration: none;' href=\"status_oper?disable=".$value['aid']."\"><img src=\"".base_url()."images/TRUE.png\"><button class=\"submit_buttons\" style=' cursor: pointer;'>Enabled</button></a>";
                           
                              }
                              else{
                                echo "<a style='text-decoration: none;' href=\"status_oper?enable=".$value['aid']."\"><img src=\"".base_url()."images/FALSE.png\"> <button class=\"submit_buttons\" style=' cursor: pointer;'>Disabled</button></a>";
                           
                              }
                           ?>
                        </div>
                     </div>
                     <div class="featured-one"></div>
                     <div class="padd10">
                        <div class="image_holder">
                           <a href="showSingleAD?aid=<?php echo $value['aid']?>"><img width="75" height="65" class="image_class" 
                              src="<?php echo base_url(),"images/ad/",$value['aid']?>.jpg" /></a>
                        </div>
                        <div  class="title_holder" >
                           <h2><a href="showSingleAD?aid=<?php echo $value['aid']?>" rel="bookmark" title="Mobile for sale">
                              <?php echo $value['head'];?></a>
                           </h2>
                           <p class="mypostedon">
                           <ul class="can_be_main_details">
                              <li>
                                 <img src="<?php echo base_url();?>images/clock.png" width="16" height="16" alt="clock" /> 
                                 <p><?php echo $value['addate'];?></p>
                              </li>
                              <li>
                                 <img src="<?php echo base_url();?>images/user.png" width="16" height="16" alt="user" /> 
                                 <p><a href="#"><?php
                                  if (empty($value['uid'])) {
                                     echo "Admin";
                                  }else{
                                    echo $alluser[$value['uid']];
                                  }

                                 ?></a></p>
                              </li>
                                 <?php if($value['edit']=="TRUE"):?>
                              <li>
                                 <img src="<?php echo base_url();?>images/Pencil-25.png" width="16" height="16" alt="clock" /> 
                                 <p>
                                 <a href="editAd?aid=<?php echo $value['aid']?>">Edit</a></p>
                              </li>
                                 <?php endif?>
                           </ul>
                           <ul class="can_be_main_details">
                              <li>
                                 <img src="<?php echo base_url();?>images/folder.png" width="16" height="16" alt="folder" />
                                 <p>
                                    <a href="searchADBy?cid=<?php echo $value['cid'];?>" rel="tag"><?php echo $value['cname'];?></a>,
                                    <a href="searchADBy?sid=<?php echo $value['sid'];?>" rel="tag"> <?php echo $value['sname'];?></a>
                                 </p>
                              </li>
                              <li>
                                 <img src="<?php echo base_url();?>images/contact.png" width="16" height="16" alt="location" />
                                 <p><?php echo $value['contact'];?></p>
                              </li>
                           </ul>
                           </p>
                           <p class="rdmore"> 
                           <ul class="post-ul-more">
                              <li><a href="showSingleAD?aid=<?php echo $value['aid']?>" >Read More</a></li>
                           </ul>
                           </p>
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

      <!-- #####################Side BAr#################### -->
</div>
<!-- close main div -->
