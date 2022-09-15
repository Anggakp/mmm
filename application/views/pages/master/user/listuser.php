<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
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
            <div class="shadow card">
             
              <!-- /.card-header -->
               <div class="card-body">
                            <h6 class="m-0 font-weight-bold text-primary"> <a class="text-info" style="text-decoration: none" class="collapse-item" href="<?php echo base_url()?>tambahdatauser"> <i class="fas fa-fw fa-plus text-info"></i> <?php echo $this->lang->line('add'); ?> Data User</h6></a><br>
                 
                            <div class="table-responsive">
                                <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;"  id="dataTable" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('name'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Username</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Role</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Status</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('pengaturan'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($read as $data){
                                        ?>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->nama?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->username?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->role?></td>
                                          <?php if ($data->is_active == 1): ?>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;color: green" width="15%">Aktif</td>
                                          <?php endif ?>
                                          <?php if ($data->is_active == 0): ?>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;color: red" width="15%">Tidak Aktif</td>
                                          <?php endif ?>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                          <a href="<?= base_url('editdatauser/' . $data->id_user); ?>" class="btn btn-sm btn-success" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                          <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_user; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'user/deleteuser')" class="btn btn-sm btn-danger" role="button" title="Hapus">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a></td>
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
                      <br>
              <div class="shadow card">
              <!-- /.card-header -->
               <div class="card-body">
                  <h6 class="m-0 font-weight-bold text-primary"> <a class="text-info" style="text-decoration: none" class="collapse-item" href="#" href="#" data-toggle="modal" data-target="#modalrole"> <i class="fas fa-fw fa-plus text-info"></i> <?php echo $this->lang->line('add'); ?> Data Role</h6></a><br>
               
                            <div class="table-responsive">
                                <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;"  id="dataTable1" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Role</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('pengaturan'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($role as $data){
                                        ?>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->role?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                          <a href="<?= base_url('aksesrole/' . $data->id); ?>" class="btn btn-sm btn-warning" role="button" title="Akses"><i class="fas fa-fw fa-info-circle"></i> <?php echo $this->lang->line('access'); ?> </a>
                                          <a href="#" data-toggle="modal" data-target="#modalroleedit" id="<?=$data->id?>|<?=$data->role?>" class="editrole btn btn-sm btn-success" role="button" title="Ubah"><i class=" fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                          <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'role/deleterole')" class="btn btn-sm btn-danger" role="button" title="Hapus">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a></td>
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
</div>