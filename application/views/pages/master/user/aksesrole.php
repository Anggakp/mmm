<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Akses Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a class="text-info"  href="<?php echo base_url()?>listuser">User</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

     
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
             <?= $this->session->flashdata('message');?>
            <div class="shadow card" >

               <div class="card-body">
                 <h4 style="margin-bottom: 15px;padding-bottom: 15px;">Role : <?=$role['role']?></h4>
                               <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;"  id="dataTable" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Menu</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Keterangan</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('access'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('add'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('change'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('delete'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($menu as $data){
                                        ?>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="2%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->menu?></td>
                                          <?php if ($data->level == 1): ?>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Menu Header</td>
                                          <?php endif ?>
                                          <?php if ($data->level == 2): ?>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Sub Menu</td>
                                          <?php endif ?>
                                          <?php if ($data->level == 3): ?>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Sub Sub Menu</td>
                                          <?php endif ?>
                                          <?php if ($data->level == 1 or $data->jenis == 2): ?>
                                               <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $data->id)?> data-role="<?=$role['id']?>" data-menu="<?=$data->id?>">
                                            </div>
                                          </td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%"></td>  
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%"> </td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%"></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%"></td>
                                          <?php endif ?>
                                          <!-- <?php if ($data->level != 1): ?>
                                               
                                          
                                          <?php endif ?> -->

                                        <?php if ($data->level != 1 and $data->jenis == 1) {?>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $data->id)?> data-role="<?=$role['id']?>" data-menu="<?=$data->id?>">
                                            </div>
                                          </td>
                                           <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-button-add" <?= check_buttontambah($role['id'], $data->id)?> data-role="<?=$role['id']?>" data-menu="<?=$data->id?>">
                                            </div>
                                          </td>
                                           <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-button-update" <?= check_buttonedit($role['id'], $data->id)?> data-role="<?=$role['id']?>" data-menu="<?=$data->id?>">
                                            </div>
                                          </td>
                                           <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-button-delete" <?= check_buttonhapus($role['id'], $data->id)?> data-role="<?=$role['id']?>" data-menu="<?=$data->id?>">
                                            </div>
                                          </td>
                                          <?php if ($data->menu == "Client" or $data->menu == "Karyawan"   or $data->menu == "2D Design" or $data->menu == "Cash Bank" or $data->menu == "Order/SPK") { ?>
                                            <td style="border-top: 1px solid #e3e6f0;" width="5%">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-button-detail" <?= check_buttondetail($role['id'], $data->id)?> data-role="<?=$role['id']?>" data-menu="<?=$data->id?>">
                                            </div>
                                          </td>
                                        <?php }else{ ?>
                                              <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="5%"></td>
                                        <?php } ?>
                                        <?php } ?>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>
                      </div>
                      </div>
                      </div>
</div>