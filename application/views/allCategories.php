<div id="main">
<div class="my_box3 breadcrumb-wrap">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt; <span typeof="v:Breadcrumb"><span property="v:title">All Categories</span></span>
   </div>
</div>
<div class="clear10"></div>
<div id="content" style="width: 960px;">
   <div class="my_box3">
      <div class="padd20">
         <div class="box_title">All Categories</div>
         <div class="box_content">
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
                     if ($f1==11) {
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
                  <h3>
                     <a href='../Home/searchADBy?cid=<?php echo $value['cid'];?>'>
                        <?php echo $cname;?>(<text id="<?php echo $value['cid']?>"></text>)
                     </a>
                  </h3>
               </li>
               <ul class="" id="taxe_project_cat_<?php echo $value['cid']?>">
               <?php
                  }  $sum+=$value['adcunt'];
                      echo "<li><a href=\"../Home/searchADBy?sid=".$value['sid']."\">".$value['sname']." (".$value['adcunt'].")</a></li>";
                  }
                  ?>
            </div>
         </div>
      </div>
   </div>
   <div id="right-sidebar">
      <ul class="xoxo">
      </ul>
   </div>
</div>
