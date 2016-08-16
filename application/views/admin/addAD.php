        <script src="<?php echo base_url();?>js/user_postad.js"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
       
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add AD <small>add AD for viwers</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


                    <?php echo form_open_multipart("admin/ADmanagement/addAD",array('id' => 'form','class'=>'form-horizontal form-label-left','novalidate'=>'novalidate' ));?>
                    <div class="form-group">
                        <div class="control-label col-md-6 col-sm-3 col-xs-12">
                          <label id="err"><?php echo $msg?></label>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $lcatn;?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php echo form_dropdown($catn, $select,$selected);?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $lcatn1;?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_dropdown($catn1, $select1,$selected1);?>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $lhead?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input($head);?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $lcontent?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_textarea($content);?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $lcontact?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input($contact);?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $lcost?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input($cost);?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $lico?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_upload($ico);?>
                        </div>
                      </div>

                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php echo form_button($submit,$submit['value']);?>
                          
                        </div>
                      </div>

                    <?php echo form_close();?>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- /page content -->
