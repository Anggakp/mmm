<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data COA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a class="text-info"  href="<?php echo base_url()?>listcoa">COA</a></li>
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
             

               <div class="card-body">
                            <div class="table-responsive">
                                <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;"  id="dataTable" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('account'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('accountname'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Header Detail</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('level'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('pengaturan'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($read as $data){
                                        ?>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->akun?></td>
                                          <td style="vertical-align:  top;display:none;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->kode?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%"><?php echo $data->namaakun?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->headerdetail?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->level?></td>
                                          <?php if ($data->headerdetail == NULL OR $data->headerdetail == "D"): ?>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                                <?php if ($aksesupdatebtn->num_rows()>0): ?>
                                              <a href="<?= base_url('editdatacoa/' . $data->id_coa); ?>" class="btn btn-sm btn-success" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                            <?php endif ?>
                                            <?php if ($aksesdeletebtn->num_rows()>0): ?>
                                              <a href="#" data-toggle="modal" data-target="#ModalHapus" id="<?=$data->akun?>|<?=$data->kode?>|<?=$data->headerdetail?>"   title="Hapus" class="hapus btn btn-sm btn-danger" role="button" title="Hapus">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                            <?php endif ?>

                                                
                                               
                                            </td>
                                          <?php endif ?>
                                           <?php if ($data->headerdetail != NULL and $data->headerdetail == "H"): ?>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                              <?php if ($aksesaddbtn->num_rows()>0): ?>
                                               <a href="<?= base_url('tambahdatacoa/' . $data->id_coa); ?>" class="btn btn-sm btn-info" role="button" title="Tambah"><i class="fas fa-fw fa-plus"></i> <?php echo $this->lang->line('add'); ?> </a>
                                            <?php endif ?>
                                            <?php if ($aksesupdatebtn->num_rows()>0): ?>
                                               <a href="<?= base_url('editdatacoa/' . $data->id_coa); ?>" class="btn btn-sm btn-success" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                            <?php endif ?>
                                            <?php if ($aksesdeletebtn->num_rows()>0): ?>
                                             
                                                <a href="#" data-toggle="modal" data-target="#ModalHapus" id="<?=$data->akun?>|<?=$data->kode?>|<?=$data->headerdetail?>"   title="Hapus" class="hapus btn btn-sm btn-danger" role="button" title="Hapus">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                            <?php endif ?>

                                               
                                               
                                            </td>
                                          <?php endif ?>
                                         
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