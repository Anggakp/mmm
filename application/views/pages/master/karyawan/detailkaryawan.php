<div class="content">
  <div class="container-fluid">
    <h6 class="m-0 font-weight-bold text-primary" align="right"> <a style="text-decoration: none" class="collapse-item text-info" href="<?php echo base_url() ?>listkaryawan"> <?php echo $this->lang->line('back'); ?></h6></a><br>
    
      <?= $this->session->flashdata('message');?>
    <div class="row">
      <div class="col-md-12">
            <h4 style="margin-bottom: 5px;padding-bottom: 5px;" class="card-category">Detail Data <?php echo $this->lang->line('employee'); ?></h4>
        <div class="shadow card"> 
          <div class="card-body"> 
            <?php foreach ($karyawan as $data) {
            ?>
            <form action="<?php echo base_url() . 'pimpinan/updatekaryawan'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">NIP<small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="nip" class="form-control" readonly required value="<?= $data->nik ?>">
                    
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">NIK<small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="hidden" name="idkaryawan" class="form-control" value="<?= $data->id_karyawan ?>">
                    <input style="padding-bottom: 10px;" type="text" name="nik" class="form-control" readonly required value="<?= $data->nik ?>">
                    
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('name'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly type="text" name="nama" class="form-control" required value="<?= $data->nama ?>">
                  
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('address'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly type="text" name="alamat" class="form-control" required value="<?= $data->alamat ?>">
                    
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('city'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly type="text" name="kota" required class="form-control" required value="<?= $data->kota ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('province'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly type="text" required name="provinsi" class="form-control" value="<?= $data->provinsi ?>">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('postalcode'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly type="text" required name="kodepos" class="form-control" value="<?= $data->kodepos ?>">
                   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('phone'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly required type="text" name="phone" class="form-control" value="<?= $data->phone ?>">
                   
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('contact'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly required type="text" name="kontak" class="form-control" value="<?= $data->kontak ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email<small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly type="text" name="email" class="form-control" value="<?= $data->email ?>">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">NPWP<small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly type="text" name="npwp" class="form-control" value="<?= $data->npwp ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('entrydate'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;"  readonly type="date" name="tanggalmasuk" class="form-control" value="<?= $data->tanggalmasuk ?>">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('part'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" readonly type="text" name="bagian" class="form-control" value="<?= $data->bagian ?>">
                    <?= form_error('bagian', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('createby'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="createby" readonly class="form-control" value="<?= $user->nama; ?>">
                    <?= form_error('createby', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
             
              
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('createdate'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="createdate" class="form-control" readonly value="<?php echo format_indo(date('Y-m-d'));?>">
                    <?= form_error('createdate', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <?php } ?>
               
             

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div><br>
