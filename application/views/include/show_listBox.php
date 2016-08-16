<div id="content">
   <div class="my_box3">
      <div class="padd10">
         <div class="box_title">All Posted Ads               
         </div>
      </div>
   </div>
   <div class="roq_content">
               <p><?php echo $myData;
               if (!empty($add_view)) :?></p>
                  <?php foreach ($add_view as $key => $value) {?>
                  <div class="post   me_featured_sk  " id="post-4018"   >
                     <div class="price_tag_main">
                        <div class="price_tag_1"></div>
                        <div class="price_tag_2">
                           <div class="paddspec"><?php echo number_format($value['cost'],2)," $";?></div>
                        </div>
                     </div>
                     <div class="featured-one"></div>
                     <div class="padd10">
                        <div class="image_holder">
                           <a href="showSingleAD?aid=<?php echo $value['aid']?>"><img width="75" height="65" class="image_class" 
                              src="<?php echo base_url(),"images/ad/",$value['aid']?>.jpg" /></a>
                        </div>
                        <div  class="title_holder" >
                           <h2><a href="showSingleAD?aid=<?php echo $value['aid']?>" rel="bookmark" title="<?php echo $value['head'];?>">
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
                  <?php }
                  endif;
                   ?>

      </div>
</div>