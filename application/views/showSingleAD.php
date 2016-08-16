<div id="main">
   <div class="my_box3">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt;
      <a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="showADs" class="main-home">All Ads</a></span> &gt;
      <a href="searchADBy?cid=<?php echo $add_view['cid'];?>" rel="tag"><?php echo $add_view['cname'];?></a>&gt;
      <a href="searchADBy?sid=<?php echo $add_view['sid'];?>" rel="tag"> <?php echo $add_view['sname'];?></a> &gt;
      <span typeof="v:Breadcrumb"><span property="v:title"><?php echo $add_view['head']?></span></span>
   </div>
   </div>
   <div class="clear10"></div>
   <div id="content">
     <!-- ######### -->

      <div class="my_box3">
         <div class="padd10">
            <div class="box_title ad_page_title"><?php echo $add_view['head']?></div>
            <div class="box_content">
               <div class="ad-page-image-holder">
                  <img class="img_class" width="317" height="219" id="main_ad_images" src="<?php echo base_url(),"images/ad/",$add_view['aid'],".jpg"?>" alt="Mobile for sale" />
                  
               </div>
               <div class="ad-page-details-holder">
                  <ul class="ad_details">
                     <li>
                        <img src="http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/price.png" width="20" height="20" /> 
                        <h3>Product ID:</h3>
                        <p><?php echo $add_view['aid']?></p>
                     </li>
                     <li>
                        <img src="http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/price.png" width="20" height="20" /> 
                        <h3>Price:</h3>
                        <p><?php echo number_format($add_view['cost'],2)," $";?></p>
                     </li>
                     <li>
                        <img src="http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/location.png" width="20" height="20" /> 
                        <h3>Contact:</h3>
                        <p><?php echo $add_view['contact']?></p>
                     </li>
                     <li>
                        <img src="http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/posted.png" width="20" height="20" /> 
                        <h3>Posted on:</h3>
                        <p><?php echo $add_view['addate']?></p>
                     </li>
                  </ul>
                  <div class="add-this">
                     <!-- AddThis Button BEGIN -->
                     <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                        <a class="addthis_button_preferred_1"></a>
                        <a class="addthis_button_preferred_2"></a>
                        <a class="addthis_button_preferred_3"></a>
                        <a class="addthis_button_preferred_4"></a>
                        <a class="addthis_button_compact"></a>
                        <a class="addthis_counter addthis_bubble_style"></a>
                     </div>
                     <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4df68b4a2795dcd9"></script>
                     <!-- AddThis Button END -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clear10"></div>
      <!-- ####################### -->
      <div class="my_box3">
         <div class="padd10">
            <div class="box_title">Description</div>
            <div class="box_content item_content">
               <p>  <?php echo $add_view['content']?></p>
            </div>
         </div>
      </div>
      <!-- #comments    <a href="http://sitemile.us/classified/?a_action=user_profile&uid=16"> -->
   </div>
   <div id="right-sidebar" class="page-sidebar">
      <ul class="xoxo">
         <li class="widget-container widget_text" id="ad-other-details">
            <h3 class="widget-title">Other Details</h3>
            <p>
            <ul class="other-dets">
               <li>
                  <img src="http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/posted.png" width="15" height="15" /> 	
                  <h3>Posted by:</h3>
                  <p><a href="#"><?php
                                  if (empty($add_view['uid'])) {
                                     echo "Admin";
                                  }else{
                                    echo $alluser[$add_view['uid']];
                                  }?></a></p>
               </li>
               <li>
                  <img src="http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/category.png" width="15" height="15" /> 
                  <h3>Category:</h3>
                  <p>
                                    <a href="searchADBy?cid=<?php echo $add_view['cid'];?>" rel="tag"><?php echo $add_view['cname'];?></a>,
                                    <a href="searchADBy?sid=<?php echo $add_view['sid'];?>" rel="tag"> <?php echo $add_view['sname'];?></a>
                  </p>
               </li>
               <li>
                  <img src="http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/location.png" width="15" height="15" /> 
                  <h3>Address:</h3>
                  <p>North America (Constant)</p>
               </li>
               <li>
                  <img src="http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/viewed.png" width="15" height="15" /> 
                  <h3>Viewed:</h3>
                  <p>220 times (Constant)</p>
               </li>
            </ul>

            </p>
         </li>

      </ul>
   </div>
</div>
