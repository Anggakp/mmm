<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data <?php echo $this->lang->line('framefee'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a class="text-info"  href="<?php echo base_url()?>listongkosrangka"><?php echo $this->lang->line('framefee'); ?></a></li>
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
                    <?php if ($aksesaddbtn->num_rows()>0): ?>
                     <h6 class="m-0 font-weight-bold text-primary"> <a class="text-info" style="text-decoration: none" class="collapse-item" href="<?php echo base_url()?>tambahdataongkosrangka"> <i class="fas fa-fw fa-plus text-info"></i> <?php echo $this->lang->line('add'); ?> Data <?php echo $this->lang->line('framefee'); ?></h6></a>
                    <?php endif ?><br>
                            <div class="table-responsive">
                                <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;"  id="dataTable" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('typedesign'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">NO/RO</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('difficulty'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('size'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('price'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('pengaturan'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($read as $data){
                                        ?>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="15%"><?php echo $data->tipedesign ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $data->noro ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="10%"><?php echo $data->kesulitan ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="15%"><?php echo $data->ukuran ?></td>

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo number_format($data->ongkosrangka,0,',','.') ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">
                                            <?php if ($aksesupdatebtn->num_rows()>0): ?>
                                               <a href="<?= base_url('editdataongkosrangka/' . $data->id_ongkosrangka); ?>" class="btn btn-sm btn-success" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                            <?php endif ?>
                                            <?php if ($aksesdeletebtn->num_rows()>0): ?>
                                               <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_ongkosrangka; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'ongkosrangka/deleteongkosrangka')" class="btn btn-sm btn-danger" role="button" title="Hapus">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                            <?php endif ?>
                                         
                                       </td>
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