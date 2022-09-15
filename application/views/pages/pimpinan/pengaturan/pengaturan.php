<!-- Begin Page Content -->
<div class="container-fluid">
<?= $this->session->flashdata('message');?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $this->lang->line('pengaturan'); ?> Website</h1>

      <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Bahasa</label>
                    <select style="width: 150px;" class="form-control" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
                         <option value="indo" <?php if($this->session->userdata('site_lang') == 'indo') echo 'selected="selected"'; ?>>Indonesia</option>
                       <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
                      
                       
                    </select>
                  </div>
                </div>
      </div>

      

      <div class="row">
        <div class="col-md-12">
          <div class="card" >
             
              <!-- /.card-header -->
               <div class="card-body">
                <h4 class="m-0 font-weight-bold text-gray-800">  Daftar Reference</h4><br>

                 <div class="card-header">
                    
                            <h6 class="m-0 font-weight-bold text-primary"> <a class="text-info" style="text-decoration: none" class="collapse-item" href="<?php echo base_url()?>tambahreference"> <i class="fas fa-fw fa-plus text-info"></i> <?php echo $this->lang->line('add'); ?> Data Reference</h6></a>
                  </div>
                            <div class="table-responsive">
                                <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;"  id="dataTable" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Menu</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Reference</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('pengaturan'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($read as $data){
                                        ?>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->menu?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?=$data->hasil_reference?> </td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                          <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_menu; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'pimpinan/deletereference')" class="btn btn-sm btn-danger" role="button" title="Hapus">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a></td>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->