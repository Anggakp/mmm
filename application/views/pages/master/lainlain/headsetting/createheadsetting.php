<div class="content">
  <div class="container-fluid">
    <h6 class="m-0 font-weight-bold text-primary" align="right"> <a style="text-decoration: none" class="collapse-item text-info" href="<?php echo base_url() ?>listheadsetting"> <?php echo $this->lang->line('back'); ?></h6></a><br>
    
      <?= $this->session->flashdata('message');?>
    <div class="row">
      <div class="col-md-12">
            <h4 style="margin-bottom: 5px;padding-bottom: 5px;" class="card-category"><?php echo $this->lang->line('add'); ?> Data <?php echo $this->lang->line('headsetting'); ?></h4>
        <div class="shadow card"> 
          <div class="card-body"> 
            <form action="<?php echo base_url() . 'tambahdataheadsetting'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('headsetting'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="namaheadsetting" autofocus class="form-control" value="<?= set_value('namaheadsetting') ?>">
                    <?= form_error('namaheadsetting', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('price'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;text-align: right" type="text" name="price" class="js-nilai form-control" value="<?= set_value('price') ?>">
                    <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
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
