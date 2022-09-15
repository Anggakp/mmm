<div class="content">
  <div class="container-fluid">
    <h6 class="m-0 font-weight-bold text-primary" align="right"> <a style="text-decoration: none" class="collapse-item text-info" href="<?php echo base_url() ?>listkurs"> <?php echo $this->lang->line('back'); ?></h6></a><br>
    
      <?= $this->session->flashdata('message');?>
    <div class="row">
      <div class="col-md-12">
            <h4 style="margin-bottom: 5px;padding-bottom: 5px" class="card-category"><?php echo $this->lang->line('add'); ?> Data <?php echo $this->lang->line('kurs'); ?></h4>
        <div class="shadow card"> 
          <div class="card-body"> 
            <form action="<?php echo base_url() . 'tambahdatakurs'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('codecurrency'); ?><small class="text-danger">*</small></label>
                    <select  name="idmatauang" class="form-control" required >
                        <option value="">======= <?php echo $this->lang->line('pleasechoice'); ?> <?php echo $this->lang->line('codecurrency'); ?> =======</option>
                        <?php
                        foreach($matauang as $data){
                        ?>
                        <option value="<?=$data->id_matauang?>"><?=$data->namamatauang?>(<?=$data->kodematauang?>)  </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('kurs'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;text-align: right;" type="text" name="rate" class="js-nilai form-control" value="<?= set_value('namakurs') ?>">
                    <?= form_error('rate', '<small class="text-danger">', '</small>'); ?>
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
