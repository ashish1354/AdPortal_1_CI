
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
       
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Subscription <small>View, Edit and enable/disable all subscription.</small></h2>

                    <?php echo form_open($form_at,array('method' => 'get','id'=> 'form','class'=>'txt_and_digit_space_only'));?>
	                    <div class="title_right">
			                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
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
                          <th> Days Limit</th>
                          <th>No Of Ads</th>
                          <th>Prize In</th>
                          <th>Status</th>
                          <th>Operation</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $sno=1;

                      foreach ($result as $key => $value) {
							echo "<tr>";
	                      	echo "<th scope=\"row\" >$sno</th>";

	                      	echo "<td>".$value['day']."</td>";
	                      	echo "<td>".$value['ads']."</td>";
	                      	echo "<td>".$value['prise']."</td>";
                          echo "<td>  <img src=\"".base_url()."images/".$value['status'].".png\"> </td>";

	                      	echo "<td>"	
	                      	."<a href=\"editSubscription?sub_id=".$value['id']."\"><span class=\"label label-primary\">Edit</span> </a>"
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
							   	<a <?php echo "href=?PpNo=$PpNo&search=$name";?> ><text><i class="fa fa-arrow-left"></i> Previous Page <?php echo $PpNo?></text></a>
							   	 <?php endif ?>
							   	</td>
						   	<td>
						   		<?php if ($NpNo==TRUE):?>
							   	<a <?php echo "href=?NpNo=$NpNo&search=$name";?> > <text>	Next  Page <i class="fa fa-arrow-right"></i>  <?php echo $NpNo?></text></a>
							    <?php endif ?>
						   	</td>
                        </tr>
                        	



                      </tbody>
                    </table>

                  </div>


</div></div></div></div> </div>     
