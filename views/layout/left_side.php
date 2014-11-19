 <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                        	<?php
                             $user_data = get_user_data();
							if($user_data[2]==""){
								$img = "../img/user/default.jpg";
							}else{
								$img = "../img/user/".$user_data[2];
							}
							?>
                            <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p style="color:#BECFE0;">
                                        <?php
                                       
                                        echo $user_data[0];
                                        ?>
                                </p>

                            <a style="color:#BECFE0"><?= $user_data[1]?></a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   <?php //if(isset($_SESSION['menu_active'])) { echo $_SESSION['menu_active']; }?>
                    <ul class="sidebar-menu">
                     <?
                    if($_SESSION['user_type_id'] != '2'){
					?>
                          <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Master</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="master_training.php?page=list"><i class="fa fa-chevron-circle-right"></i> Training</a></li>
                                 <li><a href="master_kategori_training.php?page=list"><i class="fa fa-chevron-circle-right"></i> Kategori Training</a></li>
                                <li><a href="master_barang.php?page=list"><i class="fa fa-chevron-circle-right"></i> Barang</a></li>
                                <li><a href="master_agent.php?page=list"><i class="fa fa-chevron-circle-right"></i> Agent</a></li>
                             
                                <li><a href="master_class_kota.php?page=list"><i class="fa fa-chevron-circle-right"></i> Class Kota</a></li>
                                <li><a href="position.php?page=list"><i class="fa fa-chevron-circle-right"></i> Position</a></li>
                              
                                 
                             
                            </ul>
                        </li>
                        <li>
                            <a href="admin.php?page=list">
                                <i class="fa fa-user"></i> <span>User</span> 
                            </a>
                        </li>
                        
                        <? } ?>
                       
                       
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>