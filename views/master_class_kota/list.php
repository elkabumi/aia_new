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
                                <div class="box-header">
                                    <div class="box-tools">
                                     <form role="form" action="agent.php?page=list" method="get">
                                        <div class="input-group">
                  							<input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                          
                                        </div>
                                      </form>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Kode Kota</th>
                                                <th>Nama Kota</th>
                                                <th>Kuota</th>
                                               
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                         	$no = ($pageno2 - 1) * 10 + 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no ?></td>
                                                <td><?= $row['city_kode']?></td>
                                                <td><?= $row['city_name']?></td>
                                                <td><?= $row['city_kuota']?></td>
                                               
                                                <td style="text-align:center;">
                                           <a href="master_class_kota.php?page=form&id=<?= $row['city_id']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['city_id']; ?>,'master_class_kota.php?page=delete&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                         </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="7"><a href="<?= $add_button ?>" class="btn btn-danger " >Add</a>&nbsp;
                                                <!--<a href="<?= $upload ?>" class="btn btn-danger " >Upload Xls</a></th>-->
                                                
                                            </tr>
                                        </tfoot>
                                        <tfoot>
                                        <tr>

</th>
</tr>
</tfoot>
                       </table>
					<div class="col-xs-12">
                    
						<div id="example2_info" class="dataTables_info">Page <b><?=$pageno2?></b> dari <b><?=$lastpage?></b>  total <b><?=$count_data?></b> data  
							<div class="dataTables_paginate paging_bootstrap">
                           
							<ul class="pagination">
                                <?php
                                 	$prevpage = $pageno2-1;
									if($pageno2 == '1'){
								?>
										<li class="prev disabled">
                                			<a href="#">← Previous</a>
										</li>
                                <?php
									}else{
								?>
                                        <li class="prev ">
                                        	<a href="<?php echo "{$_SERVER['PHP_SELF']}?page=list&search=$_GET[search]&pageno2=$prevpage"?>">← Previous</a>
                                        </li>
                                <?php
									}
								?>
							
                                 <?php
                                 	$nextpage = $pageno2+1;
									if($pageno2 == $lastpage){
                                 ?>
										<li class="next disabled">
                                			<a href="#">Next → </a>
										</li>
                                <?php
									}else{
								?>
                                        <li class="next">
                                        	<a href="<?php echo "{$_SERVER['PHP_SELF']}?page=list&search=$_GET[search]&pageno2=$nextpage"?>">Next → </a>                          				</li>
                                <?php
									}
								?>
							</ul>
							</div>
						</div>
						</div>
                        </div>



                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->