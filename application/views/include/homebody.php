         <div id="main">
            <div class="stretch-area">
               <div class="padd10">
                  <ul class="xoxo">
                     <li id="text-8" class="widget-container widget_text">
                        <div class="textwidget"><img src="http://viewkittens.com/wp-content/uploads/2012/03/landscapeAdPlaceholder.png" width="940" /></div>
                     </li>
                     <li id="browse-by-category-1" class="widget-container browse-by-category">
                        <h3 class="widget-title">Browse by Category</h3>
                        <style>#browse-by-category-1 .stuffa { width: 20%}</style>

                        <?php 
                        $h1=""; $f1=0; $sum=0;$lid="";
                       	foreach ($tree_view as $key => $value) {
                       		$cname=$value['cname'];
                       		if ($h1!=$cname) {
                       			if($f1!=0){
                       				echo "</ul></ul></ul></div>
                       				<script>
            									document.getElementById(\"$lid\").innerHTML = \"$sum\";
            									</script>
                       				";
                       				$sum=0;
                       			}
                       			$lid=$value['cid'];
                       			if ($f1==5) {
                       				break;
                       			}
                       			$f1+=1;$h1=$cname;                       			
                        	?>
                        <div class='stuffa'>
                           <ul id='location-stuff'>
                              <li>
                                 <ul>
                                    <li class='top-mark'>
                                       <a href='#' class='parent_taxe active_plus' rel='taxe_project_cat_<?php echo $value['cid']?>' ><img rel='img_taxe_project_cat_<?php echo $value['cid']?>'
                                          src="<?php echo base_url();?>images/bullet-cat.png" border='0' width="9" height="12" /></a> 
                                       <h3><a href='searchADBy?cid=<?php echo $value['cid'];?>'><?php echo $cname;?>(<text id="<?php echo $value['cid']?>"></text>)</a></h3>
                                    </li>
                                    <ul class="" id="taxe_project_cat_<?php echo $value['cid']?>">
                        	<?php
                        }	$sum+=$value['adcunt'];
                        	 echo "<li><a href=\"searchADBy?sid=".$value['sid']."\">".$value['sname']." (".$value['adcunt'].")</a></li>";
                       	}
                        ?>
                        <div class="see-more-tax"><b><a href="allCategories">See More Categories</a></b></div>
                     </li>
                  </ul>
               </div>
            </div>
 		 </div>