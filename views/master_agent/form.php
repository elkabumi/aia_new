<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $title?> 
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title?> </a></li>
                        
                        <li class="active">Form</li>
                    </ol>
                </section>
				   <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
              Data agent telah terinput
                </div>
           
                </section>
                <?php
                }
				?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-danger">
                                
                               
                                <div class="box-body">
                              
                                    <div class="col-md-6">
                                   
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Code </label>
                                            <input required type="text" name="i_code" class="form-control" placeholder="Enter ..." value="<?= $row->agent_code ?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Nama </label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter ..." value="<?= $row->agent_name ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomer Ktp </label>
                                            <input required type="text" name="i_ktp" class="form-control" placeholder="Enter ..." value="<?= $row->agent_ktp_number ?>"/>
                                        </div>
                                          <div class="form-group">
                                            <label>PIC ARS </label>
                                            <input required type="text" name="i_pic_ars" class="form-control" placeholder="Enter ..." value="<?= $row->agent_pic_ars ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Month </label>
                                              <select class="selectpicker show-tick form-control" data-live-search="true" name="i_office_city">
                                            <?php
                                            
                                            for($i_month=1; $i_month<=12; $i_month++){
                                            ?>
                                            <option value="<?= month_name($i_month)?>" <?php if(month_name($i_month) == $row->agent_month){ ?>selected <?php } ?>><?= ucfirst(month_name($i_month))?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                           <select class="selectpicker show-tick form-control" data-live-search="true" name="i_city">
                                            <?php
                                            $query_city = mysql_query("select * from  cities order by city_name");
                                            while($row_city = mysql_fetch_array($query_city)){
                                            ?>
                                            <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $row->city_id){ ?>selected <?php } ?>><?= $row_city['city_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Home City</label>
                                           <select class="selectpicker show-tick form-control" data-live-search="true" name="i_home_city">
                                            <?php
                                            $query_city = mysql_query("select * from  cities order by city_name");
                                            while($row_city = mysql_fetch_array($query_city)){
                                            ?>
                                            <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $row-> 	agent_home_city_id){ ?>selected <?php } ?>><?= $row_city['city_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>NO HP/TELP</label>
                                            <input required type="text" name="i_phone" class="form-control" placeholder="Enter ..." value="<?= $row->agent_phone ?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Tempat Lahir</label>
                                           <textarea class="form-control" name="i_birth_place" rows="3" placeholder="Enter ..."><?= $row->agent_birth_place ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_birth_date" value="<?= $row->agent_birth_date ?>"/>
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                   
                                         <div class="form-group">
                                            <label>Office city</label>
                                            <select class="selectpicker show-tick form-control" data-live-search="true" name="i_office_city">
                                            <?php
                                            $query_city = mysql_query("select * from  cities order by city_name");
                                            while($row_city = mysql_fetch_array($query_city)){
                                            ?>
                                            <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $row-> 	agent_ofice_city_id){ ?>selected <?php } ?>><?= $row_city['city_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Nama Atasan Langsung</label>
                                            <input required type="text" name="i_leader" class="form-control" placeholder="Enter ..." value="<?= $row->agent_leader ?>"/>
                                        </div>
                                        
                                    
                                        </div>
                                   	 <div class="col-md-6">
                                    
                                         
                                        
                                        <div class="form-group">
                                        <label>Joint Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker2" name="i_joint_date" value="<?= $row->agent_join_date ?>"/>
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                       
                                        <div class="form-group">
                                        <label>Industry Entry Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            
                                            <input type="text" required class="form-control pull-right" id="date_picker3" name="i_entry_date" value="<?= $row->agent_entry_date ?>"/>
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                        
                                        <div class="form-group">
                                            <label>Jenis Lisensi</label>
                                            <input required type="text" name="i_type" class="form-control" placeholder="Enter ..." value="<?= $row->agent_license_type ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                        <label>Tanggal Ujian</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker4" name="i_exam_date" value="<?= $row->agent_exam_date ?>"/>
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                        
                                        
                                        <div class="form-group">
                                            <label>Kota Ujian</label>
                                        <select class="selectpicker show-tick form-control" data-live-search="true" name="i_exam_city">
                                            <?php
                                            $query_city = mysql_query("select * from  cities order by city_name");
                                            while($row_city = mysql_fetch_array($query_city)){
                                            ?>
                                            <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $row-> 	 	agent_exam_city_id){ ?>selected <?php } ?>><?= $row_city['city_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Registrasi</label>
                                            <input required type="text" name="i_registrasi" class="form-control" placeholder="Enter ..." value="<?= $row->agent_registration ?>"/>
                                        </div>
                                            <div class="form-group">
                                            <label>Exam Status</label>
                                            <input required type="text" name="i_exam" class="form-control" placeholder="Enter ..." value="<?= $row->agent_exam_status ?>"/>
                                    
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Nama Cabang</label>
                                            <input required type="text" name="i_branch" class="form-control" placeholder="Enter ..." value="<?= $row->agent_branch_name ?>"/>
                                        </div>
                                          <div class="form-group">
                                            <label>Dc regional</label>
                                            <input required type="text" name="i_dc" class="form-control" placeholder="Enter ..." value="<?= $row->agent_dc_regional ?>"/>
                                        </div>
                                        
                                            <div class="form-group">
                                            <label>Clean/Not Clean</label>
                                     		 <select class="selectpicker show-tick form-control" data-live-search="true" name="i_status">
                                             <?php if($row->agent_active_status == '0' ){
											 	$select='selected="selected"';
												$select2='';
											 }else{
												 $select='';
											 	$select2='selected="selected"';
												
											 }
											 ?>
                                      		<option value="0"<?php echo $select; ?> >Not Clean</option>	
                                      		 <option value="1" <?php echo $select2; ?>>Clean</option>	
                                            </select>
                                        </div>
                                        
                                         <div class="form-group">
                                        <label>BERKAS DATANG</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker5" name="i_file_come_date" value="<?= $row->agent_file_come ?>"/>
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                        
                                        <div class="form-group">
                                        <label>BERKAS DIPROSES</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker6" name="i_file_process_date" value="<?= $row->agent_file_process ?>"/>
                                        </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                        
                                        </div>
                                         <div style="clear:both;"></div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                <input class="btn btn-danger" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-danger" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->