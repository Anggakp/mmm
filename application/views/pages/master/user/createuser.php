<div class="content">
  <div class="container-fluid">
    <h6 class="m-0 font-weight-bold text-primary" align="right"> <a style="text-decoration: none" class="collapse-item text-info" href="<?php echo base_url() ?>listuser"> <?php echo $this->lang->line('back'); ?></h6></a><br>
    
      <?= $this->session->flashdata('message');?>
    <div class="row">
      <div class="col-md-12">
            <h4 style="margin-bottom: 5px;padding-bottom: 5px" class="card-category"><?php echo $this->lang->line('add'); ?> Data User</h4>
        <div class="shadow card"> 
          <div class="card-body"> 
            <form action="<?php echo base_url() . 'tambahdatauser'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo $this->lang->line('name'); ?><small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
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
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Username<small class="text-danger">*</small></label>
                    <input style="padding-bottom: 10px;" type="text" name="username" class="form-control" value="<?= set_value('username') ?>">
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Password<small class="text-danger">*</small></label>
                     <div class="input-group">
                            <input type="password" class="form-control" id="new_password1" value="12345" readonly name="password">

                            <div class="input-group-append">
                                <div class="input-group-text bg-white border-left-0">
                                    <a role="button" onclick="previewPassword(this, 'new_password1')"><span class="fa fa-fw fa-sm fa-eye-slash text-black-50"></span></a>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Role<small class="text-danger">*</small></label>
                    <select class="form-control" name="role">
                      <option value="">-Pilih Role-</option>
                      <?php foreach ($role as $data) { ?>

                      <option value="<?=$data->id?>"><?=$data->role?></option>
                      <?php } ?>
                    </select>
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
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
