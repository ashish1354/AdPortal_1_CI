<div id="main">
      <?php if (!empty($add_view)):

      ?>
<div class="my_box3">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      e
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="showADs" class="main-home">All ADs</a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="searchADBy?cid=<?php echo $add_view[0]['cid'];?>" class="main-home"><?php echo $add_view[0]['cname'];?></a></span>&gt;
      <span typeof="v:Breadcrumb"><span property="v:title">Search By Subcategory :- <?php echo $add_view[0]['sname'];?> </span>
 
   </div>
</div>

   <?php
       $myData="";
       if (empty($add_view)) {
          $PpNo="FALSE";
          $myData="Data Not Found.";
       }
    $data = array('add_view' => $add_view,'myData'=>$myData, );
    $this->load->view('include/show_listBox.php',$data)?>

</div>
<div class="nav">
      <?php if ($PpNo==TRUE && $PpNo!=0):?>
        <a class="link_click_Pcss" pno="<?php echo $PpNo;?>" <?php echo "href=?PpNo=$PpNo&search=$name&sid=$sels"; ?>>&lt;&lt; <?php echo $PpNo?> Previous </a>
      <?php endif ?>
       <!--  <a class="activee" href="#"><?php echo "1";  ?></a> -->
      <?php if ($NpNo==TRUE):?>
        <a class="link_click_Pcss" <?php echo "href=?NpNo=$NpNo&search=$name&sid=$sels";?>>Next Page &nbsp <?php echo $NpNo?> &gt;&gt;</a> 
      <?php endif ?>                   
</div>
        <?php endif ?>
<script type="text/javascript">
   document.getElementById("head_form").action = "searchADBy";  
   document.getElementById("myid").name="sid";
   document.getElementById("myid").value="<?php echo $sels;?>";

</script>

<div id="right-sidebar">
   <ul class="xoxo">
   </ul>
</div>  