  <section class="content-header">
                    <h1>
                        <?= $title ?>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title ?></a></li>
                      
                        <li class="active">Data</li>
                    </ol>
                </section>

                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Kode Agent </th>
                                                <th>Nama Agent</th>
                                                <th>Agent Home City</th>
                                                 <th>Clean/Not Clean</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                     $no =1;
                                            while($row = mysql_fetch_array($query)){
												
												if($row{'agent_active_status'}==1){
													$status='CLEAN';
												}else{
													$status='NOT CLEAN';
												}
                                            ?>
                                          
                                            <tr>
                                            <td><?= $no ?></td>
                                                <td><?= $row['agent_code']?></td>
                                                <td><?= $row['agent_name']?></td>
                                                <td><?= $row['agent_home_city_name']?></td>
                                                <td><?= $status?></td>
                                                <td style="text-align:center;">
                                           <a href="master_agent.php?page=form&id=<?= $row['agent_id']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['agent_id']; ?>,'master_agent.php?page=delete&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="4"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a>
                                                 <a href="<?= $upload_button ?>" class="btn btn-danger " >Upload</a></th>
                                    
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->