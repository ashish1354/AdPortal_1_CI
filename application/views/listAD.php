<div id="main">

<div class="my_box3">
   <div class="padd10">
      <!-- Breadcrumb NavXT 5.2.2 -->
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to SiteMile Demo Sites." href="index" class="main-home">Ad Portal</a></span> &gt;
       <span typeof="v:Breadcrumb"><span property="v:title">All ADs</span></span>
   </div>
</div>

   

   <?php
    $myData="";
       if (empty($add_view)) {
          $PpNo="FALSE";
          $myData="Data Not Found.";
       }
    $data = array('add_view' => $add_view, 'myData'=>$myData ,);
    $this->load->view('include/show_listBox.php',$data);

    ?>

</div>
<div class="nav">
    
      <?php if ($PpNo==TRUE && $PpNo!=0):?>
        <a class="link_click_Pcss" pno="<?php echo $PpNo;?>" <?php echo "href=?PpNo=$PpNo&search=$name";?>>&lt;&lt; <?php echo $PpNo?> Previous </a>
      <?php endif ?>

      <?php if ($NpNo==TRUE):?>
        <a class="link_click_Pcss" nno="<?php echo $NpNo;?>" <?php echo "href=?NpNo=$NpNo&search=$name";?>>Next Page &nbsp <?php echo $NpNo?> &gt;&gt;</a> 
      <?php endif ?>                   
</div>
<script type="text/javascript">
   document.getElementById("head_form").action = "showADs";
</script>

<div id="right-sidebar">
   <ul class="xoxo">
   </ul>
</div>  