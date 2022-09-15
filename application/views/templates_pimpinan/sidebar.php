<body id="page-top">


    <div id="wrapper" >

         
            <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar" >

      
            <a style="padding: 5px 1rem;" class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>dashboard">
              
                <div class="sidebar-brand-text mx-3">PT MMM</div>
            </a>


            <hr class="sidebar-divider my-0">
             <div class="sidebar-heading">
                Dashboard
            </div>

             <li class="nav-item <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
                <a style="padding: 5px 1rem;" class="nav-link"  href="<?php echo base_url()?>dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider my-0"><br>
            <?php 
                $role_id   = $this->session->userdata('role_id');
                $queryMenu = "SELECT *, `tbl_user_menu`.`id`, `menu`
                              FROM `tbl_user_menu`
                              JOIN `tbl_user_access_menu` ON `tbl_user_menu`.`id` = `tbl_user_access_menu`. `menu_id`
                             WHERE `tbl_user_access_menu`.`role_id` = $role_id  and level = 1 and is_active = 0
                             ORDER BY `tbl_user_access_menu`.`menu_id` ASC
                             ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <?php foreach ($menu as $m) { ?>

            <div class="sidebar-heading">
                <?=$m['menu']?>    
            </div>


            <?php 
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                                  FROM `tbl_user_menu`
                                 JOIN `tbl_user_access_menu` ON `tbl_user_menu`.`id` = `tbl_user_access_menu`. `menu_id`
                                 WHERE `tbl_user_access_menu`.`role_id` = $role_id  and `tbl_user_menu`.`kode_sub` =  $menuId And level = 2 ORDER BY `tbl_user_access_menu`.`menu_id` ASC;
                                 ";
            $subMenu = $this->db->query($querySubMenu)->result_array();

            ?>

                <?php foreach ($subMenu as $sm) { ?>
                    <?php if ($sm['jenis'] == "1"): ?>
                        <li class="nav-item <?php if($this->uri->segment(1)==$sm['url']){echo "active";}?><?php if($this->uri->segment(1)==$sm['url_1']){echo "active";}?><?php if($this->uri->segment(1)==$sm['url_2']){echo "active";}?><?php if($this->uri->segment(1)==$sm['url_3']){echo "active";}?><?php if($this->uri->segment(1)==$sm['url_4']){echo "active";}?>">
                        <a style="padding: 5px 1rem;" class="nav-link" data-id="<?= $sm['id']?>" href="<?= base_url($sm['url'])?>">
                            <i class="<?=$sm['icon']?>"></i>
                            <span><?=$sm['menu']?> </span></a>
                        </li>
                    <?php endif ?>
                     <?php if ($sm['jenis'] == "2"): ?>
                        <li class="nav-item">
                            <a class="nav-link collapsed" style="padding: 5px 1rem;" href="#" data-toggle="collapse" data-target="<?=$sm['target']?>"
                                aria-expanded="true" aria-controls="collapseTwo">
                                 <i class="<?=$sm['icon']?>"></i>
                                <span><?=$sm['menu']?></span>
                            </a>
                    <?php 
                         $SubMenuId = $sm['kode_sub_menu'];
                            $querySubSubMenu = "SELECT *, `tbl_user_menu`.`target` as `targetcollapse`, `tbl_user_menu`.`url` as `urllink`,`tbl_user_menu`.`url_1` as `urllink1`,`tbl_user_menu`.`url_2` as `urllink2`,`tbl_user_menu`.`menu` as `judul`
                                              FROM `tbl_user_menu`
                                              JOIN `tbl_user_access_menu` ON `tbl_user_menu`.`id` = `tbl_user_access_menu`. `menu_id`
                                              WHERE `tbl_user_access_menu`.`role_id` = $role_id and `tbl_user_menu`.`kode_sub_sub` =  $SubMenuId And level = 3
                                              ORDER BY `tbl_user_access_menu`.`menu_id` ASC;
                                             ";
                        $SubSubMenu = $this->db->query($querySubSubMenu)->result_array();

                    ?>  

                            <?php foreach ($SubSubMenu as $data)

                             ?>
                            <div id="<?=$data['targetcollapse']?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">

                                    <?php foreach ($SubSubMenu as $ssm) { ?> 
                                     <a data-id="<?= $ssm['id']?>" style="padding: 5px 1rem;" class="collapse-item <?php if($this->uri->segment(1)==$ssm['urllink']){echo "active";}?><?php if($this->uri->segment(1)==$ssm['urllink1']){echo "active";}?><?php if($this->uri->segment(1)==$ssm['urllink2']){echo "active";}?>" href="<?= base_url($ssm['urllink'])?>" ><?= $ssm['judul']?></a> 
                                      <?php } ?>
                                    
                                </div>
                            </div>
                       
                        </li>       
                     <?php endif ?>   
                <?php } ?>
                 <hr class="sidebar-divider" style="padding-bottom: 5px;">
            <?php } ?>

            

            <div class="sidebar-heading">
                <?php echo $this->lang->line('profil'); ?>
            </div>
            <li class="nav-item <?php if($this->uri->segment(1)=="profile"){echo "active";}?>">
                <a style="padding:5px 1rem;" class="nav-link" href="<?php echo base_url()?>profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span><?php echo $this->lang->line('profil'); ?></span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="editprofile"){echo "active";}?>">
                <a style="padding:5px 1rem;" class="nav-link " href="<?php echo base_url()?>editprofile">
                    <i class="fas fa-fw fa-user-edit"></i>
                    <span><?php echo $this->lang->line('editprofil'); ?></span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="ubahpassword"){echo "active";}?>">
                <a style="padding:5px 1rem;" class="nav-link" href="<?php echo base_url()?>ubahpassword">
                    <i class="fas fa-fw fa-key"></i>
                    <span><?php echo $this->lang->line('ubahpassword'); ?></span></a>
            </li>

          
         
            <hr class="sidebar-divider" style="padding-bottom: 5px;">
            <div class="sidebar-heading">
                <?php echo $this->lang->line('logout'); ?>
            </div>
            <li class="nav-item">
                <a style="padding:5px 1rem;" class="nav-link" href="<?=base_url('auth/logout')?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span><?php echo $this->lang->line('logout'); ?></span></a>
            </li>
         
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul> 
      