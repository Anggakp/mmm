<div class="content">
  <div class="container-fluid">
    <h6 class="m-0 font-weight-bold text-primary" align="right"> <a style="text-decoration: none" class="collapse-item text-info" href="<?php echo base_url() ?>listheadsetting"> <?php echo $this->lang->line('back'); ?></h6></a><br>
    
      <?= $this->session->flashdata('message');?>
    <div class="row">
      <div class="col-md-12">
            <h4 style="margin-bottom: 5px;padding-bottom: 5px" class="card-category"><?php echo $this->lang->line('change'); ?> Data <?php echo $this->lang->line('headsetting'); ?></h4>
        <div class="shadow card"> 
          <div class="card-body">
             <?php
             foreach($headsetting as $data){
             
            ?>
            <form action="<?php echo base_url() . 'headsetting/updateheadsetting'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('headsetting'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="hidden" name="idheadsetting" class="form-control" value="<?= $data->id_headsetting ?>" required>
                    <input style="padding-bottom: 10px;" type="text" name="namaheadsetting" class="form-control" value="<?= $data->headsetting ?>" required>
                   
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('price'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;text-align: right;" type="text" name="price" class="js-nilai form-control" value="<?= $data->price ?>" required>
                   
                  </div>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('createby'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="createby" readonly class="form-control" value="<?= $data->create_by ?>">
                   
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('createdate'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="createdate" readonly class="form-control" value="<?php echo format_indo(date('Y-m-d', strtotime($data->create_date)));?>">
                   
                  </div>
                </div>
               
              </div>
              <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('updateby'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="updateby" readonly class="form-control" value="<?= $user->nama; ?>">
                    <?= form_error('updateby', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('updatedate'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="updatedate" class="form-control" readonly value="<?php echo format_indo(date('Y-m-d'));?>">
                    <?= form_error('updatedate', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
              </div>
              
               <?php } ?>
              <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div><br>