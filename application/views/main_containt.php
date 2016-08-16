         <div class="my_home_page_thing">
            <div class="my_home_page_thing_inner">
               <div class="under-search-home-sidebar">
                  <ul class="xoxo">
                     <li id="browse-by-category-thumbs-1" class="widget-container browse-by-category-thumbs">
                     <?php foreach ($top_content as $key => $value){?>
                        <div class="my_category_image_holder">
                           <div class="my_image_div"><a href="searchADBy?cid=<?php echo $value['id']?>"><img src="<?php echo base_url(),"images/category/",$value['id'];?>.jpg" width="190" height="95" /></a></div>
                           <div class="my_image_div_cat_name">
                              <div class="padd10"><a href="searchADBy?cid=<?php echo $value['id']?>"><?php echo $value['name']?></a></div>
                           </div>
                        </div>
                     <?php }?>
                        <div class="see-more-tax"><b><a href="allCategories">See More Categories</a></b></div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>