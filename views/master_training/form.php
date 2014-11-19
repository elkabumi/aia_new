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
                                    
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Kode Training</label>
                                            <input required type="text" name="i_code" class="form-control" placeholder="Enter ..." value="<?= $row->training_kode ?>" readonly="readonly"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Training</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter ..." value="<?= $row->training_name ?>"/>
                                        </div>
                                      	<div class="form-group">
                                        <label>Kategori Training</label>
                                        <select class="selectpicker show-tick form-control" data-live-search="true" name="i_category_id">
                                        <?php
                                        $query_city = mysql_query("select * from  training_category");
                                        while($row_city = mysql_fetch_array($query_city)){
                                        ?>
                                        <option value="<?= $row_city['training_category_id']?>" <?php if($row_city['training_category_id'] == $row->training_category_id){ ?>selected <?php } ?>><?= $row_city['training_category_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>                                 
           								<div class="form-group">
                                            <label>Durasi Training</label>
                                            <input required type="text" name="i_durasi" class="form-control" placeholder="Enter ..." value="<?= $row->training_duration ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Sesi Training</label>
                                            <input required type="text" name="i_sesi" class="form-control" placeholder="Enter ..." value="<?= $row->training_session ?>"/>
                                        </div>
                                    	<div class="form-group">
                                            <label>Poin Persesi</label>
                                            <input required type="text" name="i_poin_sesi" class="form-control" placeholder="Enter ..." value="<?= $row->training_poin_session ?>"/>
                                        </div>
                              
                                      
                                   
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