         <div id="classified-home-page-main-inner_wrap">
            <div id="classified-home-page-main-inner">
               <div class="featured-posts">Latest Popular ADs</div>
               <div id="slider2">
               <?php foreach ($image_for_slider as $key => $value) {
               ?>
                  <div class="nk_slider_child">
                     <div class="slider-post">
                        <a href="showSingleAD?aid=<?php echo $value['adID']?>"><img width="150" height="110" class="image_class" 
                           src="<?php echo base_url(),"images/ad/",$value['adID']?>.jpg" alt="Mobile for sale" /></a>
                        <br/>
                        <p><b><a href="showSingleAD?aid=<?php echo $value['adID']?>" rel="bookmark" title="Permanent Link to Mobile for sale">
                           <?php echo $value['adHead']?></a></b><br/>
                           <a href="searchADBy?cid=<?php echo $value['C_id'];?>" rel="tag"><?php echo $value['C_Name']?></a>
                           <a href="searchADBy?sid=<?php echo $value['S_ID'];?>" rel="tag"><?php echo $value['S_Name']?></a>
                           <br/>
                           Price :<?php echo $value['cost']?> $                
                        </p>
                     </div>
                  </div>
                  <?php }?>
               </div>
               <div class="clear20"></div>
            </div>
         </div>

               <script type="text/javascript">
         var maxNrImages_PT = 100;
         
         
         
                     jQuery(document).ready(function() {
         
            jQuery('.parent_taxe').click(function () {
            
            var rels = jQuery(this).attr('rel');
            jQuery("#" + rels).toggle();
            jQuery("#img_" + rels).attr("src","http://sitemile.us/classified/wp-content/themes/ClassifiedTheme/images/posted1.png");
            
            return false;
         });
         
         
         });
         
      </script>
      <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
      <style type="text/css" media="screen"> .simple-social-icons ul li a, .simple-social-icons ul li a:hover { background-color: #999999 !important; border-radius: 3px; color: #ffffff !important; border: 0px #ffffff solid !important; font-size: 16px; padding: 8px; }  .simple-social-icons ul li a:hover { background-color: #666666 !important; border-color: #ffffff !important; color: #ffffff !important; }</style>
      <script type="text/javascript">
         function suggest(inputString){
         
            if(inputString.length == 0) {
               jQuery('#suggestions').fadeOut();
            } else {  
            jQuery('#big-search').addClass('load');
               jQuery.post("http://sitemile.us/classified/wp-admin/admin-ajax.php?action=autosuggest_it", {queryString: ""+inputString+""}, function(data){
                  
                  var stringa = data.charAt(data.length-1);
                              if(stringa == '0') data = data.slice(0, -1);
                              else data = data.slice(0, -2);
                  
                  
                  if(data.length >0) {
                     jQuery('#suggestions').fadeIn();
                     jQuery('#suggestionsList').html(data);
                     jQuery('#big-search').removeClass('load');
                  }
               });
            }
         }
         
         
         function fill(thisValue) {
            jQuery('#big-search').val(thisValue);
            setTimeout("jQuery('#suggestions').fadeOut();", 600);
         }
         
         
         
         jQuery(function(){
           jQuery('#slider2').bxSlider({
            auto: true,
            speed: 1000,
            pause: 6000,
            autoControls: false,
             displaySlideQty: 5,
               moveSlideQty: 1
           });
           
           
           jQuery("#classified-home-page-main-inner").show();  
           
         });   
         
         
         
         
      </script>