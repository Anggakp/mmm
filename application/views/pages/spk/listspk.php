<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid" >
        <div class="row"  style="margin-bottom: 20px;">
          <div class="col-sm-6">
            <h1>Data Order/SPK</h1>
            <?php if ($aksesaddbtn->num_rows()>0): ?>
                      <h6 class="m-0 font-weight-bold text-primary"> <a class="text-info" style="text-decoration: none" class="collapse-item" href="<?php echo base_url()?>tambahdataspk"> <i class="fas fa-fw fa-plus text-info"></i> <?php echo $this->lang->line('add'); ?> Data Order/SPK</a></h6>
                  <?php endif ?>
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a class="text-info"  href="<?php echo base_url()?>list2ddesain">Order/SPK</a></li>
            </ol>
          </div>
        </div> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div id="tampil"></div>
      <div class="container-fluid" id="2ddesign">

     
        <div class="row">
          <div class="col-12" id="data">
            <!-- /.card -->
            <?= $this->session->flashdata('message');?>
            <?php foreach ($read as $data) { ?>
            <div class="shadow card">
              <div class="card-header" style="background-color: white">
                <div class="row">
                  <div class="col-md-3">
                    <h6>Nomor : <?php echo $data->nomorspk?></h6>   <h6>Designer : <?php echo $data->namakaryawan?></h6> <h6>Client : <?php echo $data->nama?></h6>
                  </div>
                  <div class="col-md-5"></div>
                  <div class="col-md-4">
                    <h6 style="text-align: right;">Tanggal : <?php echo $data->tanggal?></h6>
                  </div>
                </div>
              </div>
              <div class="card-body"  id="id<?php echo $data->id_header?>">
                  <div class="row">
                    <div class="col-md-3">
                      <p style="margin: 0">Memo : <?=$data->memospk?></p>
                       
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-3" style="text-align: right;">
                           <?php if ($aksesupdatebtn->num_rows()>0): ?>
                                                 <a href="<?= base_url('editdata2ddesain/' . $data->id_header); ?>" class="btn btn-sm btn-success" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                            <?php endif ?>
                                            <?php if ($aksesdeletebtn->num_rows()>0): ?>
                                              <a href="#" data-toggle="modal" data-target="#ModalHapusDesain2D" id="<?=$data->id_header?>"   title="Hapus" class="hapusdetail2ddesain btn btn-sm btn-danger" role="button" title="Hapus">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                            <?php endif ?>
                       
                    </div>
                  </div>
                
                  <input style="padding-bottom: 10px;" type="hidden" id="id_header" name="idheader" class="form-control" value="<?php echo $data->id_header?>" readonly>
                  <div class="card">
                     
                    <div class="card-body">
                        <h5>Model Design</h5>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover" width="100%"  cellspacing="0" id="a<?php echo $data->id_header?>">
                              <thead>
                                <tr height="20px">
                                   <th>Model</th>
                                   <th >Keterangan</th>
                                   <th><?php echo $this->lang->line('pengaturan'); ?></th>
                                </tr>
                              </thead>
                          
                               <tbody>
                                        <?php
                                        foreach($detailspk as $datas){
                                        ?>
                                        <?php if ($data->id_header == $datas->id_header): ?>
                                           <tr>
                                          <td style="width: 20%;"><img src="<?= base_url('assets/file/2ddesain/'). $datas->gambar1?>" style="width: 200px;height: 100px;"> <br> Model : <?php echo $datas->model?><br> Sub Model : <?php echo $datas->submodel?> </td>
                                          <td style="width: 40%;">Tipe Design : <?php echo $datas->tipedesign?> | Warna Produk : <?php echo $datas->warnaproduk?> <br> Material : <?php echo $datas->material?> | Berat Material : <?php echo $datas->beratmaterial?> <?php echo $datas->satuan?> <br> Konsep Kepala : <?=$datas->konsepkepala?> | Finishing : <?=$datas->finishing?> | Ongkos : <?=$datas->ongkos?> <br> Gender : <?=$datas->gender?> <br> Ukuran : <?=$datas->ukuran?></td>
                                          <td style="width: 40%;">
                                             <?php if ($aksesdetailbtn->num_rows()>0): ?>
                                               <a href="<?= base_url('detaildesain_header/' . $datas->id_detail); ?>"  class="btn btn-sm btn-secondary" role="button" title="<?php echo $this->lang->line('change'); ?>"><i class="fas fa-fw fa-search"></i> Detail Data</a>
                                            <?php endif ?>
                                          
                                          </td>
                                        </tr>
                                        <?php endif ?>
                                        <?php 
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
            <br><?php } ?>
          </div>
        </div>
      </div>
    </section>
</div>
</div>
 