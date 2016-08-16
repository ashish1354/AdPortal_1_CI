
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
       
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Category <small>View, Edit all category and Add Subcategory </small></h2>

                    <?php echo form_open($form_at,array('method' => 'get','id'=> 'autoSubmit','class'=>'txt_and_digit_space_only'));?>
                       <?php echo form_dropdown($catn, $select,$selected);?>
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
                          <th>Sluge</th>
                          <th>Keyword</th>
                          <th>Operation</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $sno=1;

                      foreach ($result as $key => $value) {
							echo "<tr>";
	                      	echo "<th scope=\"row\" >$sno</th>";
                          echo "<td>".$value['cname']."</td>";
	                      	echo "<td>".$value['name']."</td>";
	                      	echo "<td>".$value['slug']."</td>";
	                      	echo "<td>".$value['keyy']."</td>";
	                      	echo "<td>"	
	                      	."<a href=\"editSubcategory?sid=".$value['id']."\"><span class=\"label label-primary\">Edit</span> </a>"
	                      	."<a href=\"deleteSubcategory?sid=".$value['id']."\"><span class=\"label label-danger\">Delete</span> </a>"
	                      	."</td>";

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

                        	echo "<tr>";
                        }
                       ?>
                        <tr>
                          
                          <td colspan="4"></td>
                          

                          	<td>
							   	<?php if ($PpNo==TRUE && $PpNo!=0):?>
							   	<a <?php echo "href=?PpNo=$PpNo&search=$name&selc=$selected";?> ><text><i class="fa fa-arrow-left"></i> Previous Page <?php echo $PpNo?></text></a>
							   	 <?php endif ?>
							   	</td>
						   	<td>
						   		<?php if ($NpNo==TRUE):?>
							   	<a <?php echo "href=?NpNo=$NpNo&search=$name&selc=$selected";?> > <text>	Next  Page <i class="fa fa-arrow-right"></i>  <?php echo $NpNo?></text></a>
							    <?php endif ?>
						   	</td>
                        </tr>
                        	



                      </tbody>
                    </table>

                  </div>


</div></div></div></div> </div>     
