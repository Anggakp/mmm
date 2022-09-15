<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid" >
        <div class="row"  style="margin-bottom: 20px;">
          <div class="col-sm-6">
            <h1>Data <?php echo $this->lang->line('2ddesign'); ?></h1>
            <?php if ($aksesaddbtn->num_rows()>0): ?>
                      <h6 class="m-0 font-weight-bold text-primary"> <a class="text-info" style="text-decoration: none" class="collapse-item" href="<?php echo base_url()?>tambahdata2ddesain"> <i class="fas fa-fw fa-plus text-info"></i> <?php echo $this->lang->line('add'); ?> Data <?php echo $this->lang->line('2ddesign'); ?></a></h6>
                  <?php endif ?>
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><a class="text-info"  href="<?php echo base_url()?>list2ddesain"><?php echo $this->lang->line('2ddesign'); ?></a></li>
            </ol>
          </div>
        </div>
        <h4>Filter</h4>
        <div class="row" style="margin-bottom: 20px;">
          <div class="col-md-2">
              <label class="bmd-label-floating">Designer</label>
            <select id="designer" class="form-control" onchange="filterdata()" name="designer" style="max-width: 250px;">
          
              <option value="0">Pilih Designer</option>
              <?php foreach ($karyawan as $designer) { ?>
              <option value="<?=$designer->id_karyawan?>"> <?=$designer->nama?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-2">
            <label class="bmd-label-floating">Approval</label>

            <select onchange="filterdata()" id="approval" class="form-control" name="approval" style="max-width: 250px;">
              <option value="">Pilih Approval</option>
              <option value="Design Manager"> Design Manager</option>
              <option value="Sales"> Sales</option>
              <option value="Sales Manager"> Sales Manager</option>
              <option value="Customer"> Customer</option>
              <option value="BOD"> BOD</option>
          
            </select>
          </div>
           <div class="col-md-2">
              <label class="bmd-label-floating">Dari Tanggal</label>
              
                  <input style="padding-bottom: 10px;max-width: 250px;" placeholder="<?php echo date('d-m-y'); ?>" type="date"    name="from" id="from"  class="form-control"   >
                 
          </div>
          <div class="col-md-2">
             <label class="bmd-label-floating">Sampai Tanggal</label>
                  <input style="padding-bottom: 10px;max-width: 250px;" placeholder="<?php echo date('Y-m-d'); ?>" type="date"    name="to" id="to"  class="form-control" onblur="filterdata()"> 
          </div>
          
          <!-- <div class="col-md-2">
              <label class="bmd-label-floating">Reset Filter</label>
           
          </div> -->
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
                    <h6>Nomor : <?php echo $data->nomor?></h6>   <h6>Designer : <?php echo $data->namakaryawan?></h6> <h6>Client : <?php echo $data->nama?></h6>
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
                      <p style="margin: 0">Memo : <?=$data->memo?></p>
                       
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-3" style="text-align: right;">
                           <?php if ($aksesupdatebtn->num_rows()>0): ?>
                                                 <a href="<?= base_url('editdata2ddesain/' . $data->id_header); ?>" class="btn btn-sm btn-success" role="button" title="Ubah"><i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> 2D Design </a>
                                            <?php endif ?>
                                            <?php if ($aksesdeletebtn->num_rows()>0): ?>
                                              <a href="#" data-toggle="modal" data-target="#ModalHapusDesain2D" id="<?=$data->id_header?>"   title="Hapus" class="hapusdetail2ddesain btn btn-sm btn-danger" role="button" title="Hapus">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> 2D Design</a>
                                            <?php endif ?>
                       
                    </div>
                  </div>
                <br>
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
                                        foreach($detaildesain as $datas){
                                        ?>
                                        <?php if ($data->id_header == $datas->id_header): ?>
                                           <tr>

                                          <td   style="width: 20%;"> 
                                               <a href="<?= base_url('assets/file/2ddesain/'). $datas->gambar1?>" data-toggle="lightbox" data-title="Desain <?php echo $datas->id_detail ?> " data-gallery="gallery">
                                                 
                                                  <img src="<?= base_url('assets/file/2ddesain/'). $datas->gambar1?>" class="img-fluid mb-2" alt="Tidak Ada File" style="width: 200px;height: 100px;">
                                                 
                                                </a>
                                             <br> Model : <?php echo $datas->model?><br> Sub Model : <?php echo $datas->submodel?> </td>
                                          <td style="width: 40%;">Tipe Design : <?php echo $datas->tipedesign?> | Warna Produk : <?php echo $datas->warnaproduk?> <br> Material : <?php echo $datas->material?> | Berat Material : <?php echo $datas->beratmaterial?> <?php echo $datas->satuan?> <br> Konsep Kepala : <?=$datas->konsepkepala?> | Finishing : <?=$datas->finishing?> | Ongkos : <?php echo number_format($datas->hargaongkos,0,',','.') ?>   <br> Gender : <?=$datas->gender?> <br> Ukuran : <?=$datas->size?></td>
                                          <td style="width: 40%;">
                                             <?php if ($aksesdetailbtn->num_rows()>0): ?>
                                               <a href="<?= base_url('detaildesain_header/' . $datas->id_detail); ?>"  class="btn btn-sm btn-secondary" role="button" title="<?php echo $this->lang->line('change'); ?>"><i class="fas fa-fw fa-search"></i> Detail Data</a>
                                            <?php endif ?>
                                            <?php if ($aksesupdatebtn->num_rows()>0): ?>
                                                <a href="#" data-toggle="modal" data-target="#ModalEditdetaildesain" id="<?=$datas->id_detail?>|"    class="editdetaildesain btn btn-sm btn-success" role="button" title="<?php echo $this->lang->line('change'); ?>">  <i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                            <?php endif ?>
                                            <?php if ($aksesdeletebtn->num_rows()>0): ?>
                                              <a href="#" data-toggle="modal" data-target="#ModalHapusdetaildesain" id="<?=$datas->id_detail?>|<?=$datas->id_header?>|<?=$datas->gambar1?>|<?=$datas->gambar2?>|<?=$datas->gambar3?>|<?=$datas->gambar4?>|<?=$datas->gambar5?>|<?=$datas->video1?>|<?=$datas->video2?>|<?=$datas->video3?>"    class="hapusdetaildesain btn btn-sm btn-danger" role="button" title="<?php echo $this->lang->line('delete'); ?>">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
 