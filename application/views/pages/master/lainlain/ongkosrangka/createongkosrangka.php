<div class="content">
  <div class="container-fluid">
    <h6 class="m-0 font-weight-bold text-primary" align="right"> <a style="text-decoration: none" class="collapse-item text-info" href="<?php echo base_url() ?>listongkosrangka"> <?php echo $this->lang->line('back'); ?></h6></a><br>
    
      <?= $this->session->flashdata('message');?>
    <div class="row">
      <div class="col-md-12">
            <h4 style="margin-bottom: 5px;padding-bottom: 5px;" class="card-category"><?php echo $this->lang->line('add'); ?> Data <?php echo $this->lang->line('framefee'); ?></h4>
        <div class="shadow card"> 
          <div class="card-body"> 
            <form action="<?php echo base_url() . 'tambahdataongkosrangka'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="row">
                <div class="col-md-6">
                    <label><?php echo $this->lang->line('typedesign'); ?><small class="text-danger">*</small></label>
                    <div class="input-group">
                                      
                      <input style="padding-bottom: 10px;width: 160px;" id="tipedesign"   type="text" name="tipedesign" class="tipedesign form-control" required value="<?= set_value('tipedesign') ?>">
                                      
                      <input style="padding-bottom: 10px;width: 160px;" id="idtipedesign"   type="hidden" name="idtipedesign" class="idtipedesign form-control"  value="<?= set_value('idtipedesign') ?>" readonly>

                      <span class="input-group-btn">
                        <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modaltipedesign"><?php echo $this->lang->line('search'); ?></button>
                      </span> 
                      </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('difficulty'); ?><small class="text-danger">*</small></label>
                     <select name="kesulitan" required class="form-control">
                       <option value="">======= Pilih Kesulitan =======</option>
                       <option value="Mudah">Mudah</option>
                       <option value="Sedang">Sedang</option>
                       <option value="Sulit">Sulit</option>
                     </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('size'); ?><small class="text-danger">*</small></label>
                     <select name="ukuran" required class="form-control">
                       <option value="">======= Pilih Ukuran =======</option>
                       <option value="Kecil 1-2">Kecil 1-2</option>
                       <option value="Sedang/3-4">Sedang/3-4</option>
                       <option value="Besar >4">Besar >4</option>
                     </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">NO/RO<small class="text-danger">*</small></label>
                    <select name="noro" required class="form-control">
                       <option value="">======= Pilih NO/RO =======</option>
                       <option value="NO">NO</option>
                       <option value="RO">RO</option>
                     </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('framefee'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;text-align: right" type="text" name="ongkosrangka" class="js-nilai form-control" value="<?= set_value('ongkosrangka') ?>">
                    <?= form_error('ongkosrangka', '<small class="text-danger">', '</small>'); ?>
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
              
               
              <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div><br>
