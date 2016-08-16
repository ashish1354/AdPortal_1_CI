
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
       
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View AD <small>View, Edit all AD </small></h2>

                   <?php echo form_open($form_at,array('method' => 'get','id'=> 'autoSubmit','class'=>'txt_and_digit_space_only'));?>
                       <?php echo form_dropdown($catn, $select,$selected);?>
                       <?php echo form_dropdown($catn1, $select1,$selected1);?>

                      <div class="title_right">
                      <div class="col-md-5 col-sm-5  form-group  top_search">
                        <div class="input-group">
                        <?php echo form_input($search);?>
                          <span class="input-group-btn">
                            <?php echo form_button($submit,$submit['value']);?>
                          </span>                                              
                        </div>
                      </div>
                  </div>
                <?php echo form_close();?>

                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">
                  <p id="err" ><?php echo $msg;?></p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th>Subcategory</th>
                          <th>Head</th>
                          <th>Content</th>
                          <th>Cost</th>
                        <!--  <th>Edit</th> -->

                          <th>Publish/Unpublish</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $sno=1;

                      foreach ($result as $key => $value) {
                        $view="../../Home/showSingleAD?aid=".$value['adID'];
                      echo "<tr>";
                          echo "<th scope=\"row\" >$sno</th>";
                          echo "<td>".$value['C_Name']."</td>";
                          echo "<td>".$value['S_Name']."</td>";
                          echo "<td>".substr($value['adHead'], 0, 25)."...</td>";
                          echo "<td>".substr($value['content'], 0, 15)."...</td>";
                          echo "<td>".$value['cost']."</td>";
                        //  echo "<td><a href=\"editAD?sid=".$value['adID']."\"><span class=\"label label-primary\">Edit</span> </a></td>";
                          echo "<td>"; 
                              if ($value['status']!=0) {
                              echo "<a style='text-decoration: none;' href=\"status_oper?disable=".$value['adID']."\"><img src=\"".base_url()."images/TRUE.png\"> <button class=\"btn btn-round btn-xs btn-success\">Enabled</button></a>";
                            echo "<a style='text-decoration: none;' href=\"".$view."\"> View AD</a>";
                              }
                              else{
                                echo "<a style='text-decoration: none;' href=\"status_oper?enable=".$value['adID']."\"><img src=\"".base_url()."images/FALSE.png\"> <button class=\"btn btn-round btn-xs btn-danger\">Disabled</button></a>";
                            echo "<a style='text-decoration: none;'> Not View</a>";
                              }
                          echo "</td>";

                          echo "</tr>";
                          $sno++;
                        }
                        for ($i=$sno; $i<=10  ; $i++) { 
                          echo "<tr>";
                          echo "<td scope=\"row\">$i</td>"; 
                          echo "<td></td>"; 
                          echo "<td></td>"; 
                          echo "<td></td>"; 
                          echo "<td></td>"; 
                          echo "<td></td>"; 
                          echo "<td></td>"; 
                          echo "<td></td>"; 
                          
                          echo "<tr>";
                        }
                       ?>
                        <tr>
                          
                          <td colspan="5"></td>
                          

                            <td>
                  <?php if ($PpNo==TRUE && $PpNo!=0):?>
                  <a <?php echo "href=?PpNo=$PpNo&search=$name&selc=$selected";?> ><text><i class="fa fa-arrow-left"></i> Previous Page <?php echo $PpNo?></text></a>
                   <?php endif ?>
                  </td>
                <td>
                  <?php if ($NpNo==TRUE):?>
                  <a <?php echo "href=?NpNo=$NpNo&search=$name&selc=$selected";?> > <text>  Next  Page <i class="fa fa-arrow-right"></i>  <?php echo $NpNo?></text></a>
                  <?php endif ?>
                </td>
                        </tr>
                          



                      </tbody>
                    </table>

                  </div>


</div></div></div></div> </div>     
