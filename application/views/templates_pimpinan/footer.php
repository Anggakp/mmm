<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT.MMM 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('confirmlogout'); ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"><?php echo $this->lang->line('messagelogout'); ?></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                    <a class="btn btn-info" href="<?= base_url('auth/logout')?>"><?php echo $this->lang->line('logout'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalrole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Role</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                     <form action="<?php echo base_url(). 'role/adddatarole';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                      <div class="modal-body">
                        <label class="bmd-label-floating">Role<small class="text-danger">*</small></label>
                        <input style="padding-bottom: 10px;" type="text" name="role" class="form-control"  required>
                      </div>
                      <div class="modal-footer">
                           <button type="submit" class="btn btn-info">Simpan</button>
                        <a class="btn btn-danger" type="button" data-dismiss="modal">Cancel</a>
                      </div>
                      </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modalroleedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Role</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                     <form action="<?php echo base_url(). 'role/updaterole';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                      <div class="modal-body" id="isimodalrole">
                      </div>
                      <div class="modal-footer">
                           <button type="submit" class="btn btn-info">Ubah</button>
                        <a class="btn btn-danger" type="button" data-dismiss="modal">Cancel</a>
                      </div>
                      </form>

            </div>
        </div>
    </div>
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutLabel"><?php echo $this->lang->line('headconfirmdelete'); ?></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                
               
            </div>
            <div class="modal-body"><?php echo $this->lang->line('confirmdelete'); ?></div>
            <div class="modal-footer">
                <?= form_open('', 'class="d-inline" id="formLinkDelete"') ?>
                <input type="hidden" name="id" id="valueId">
                <button type="submit" class="btn btn-danger"> <?php echo $this->lang->line('yes'); ?> </button> <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $this->lang->line('no'); ?></button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalHapusDesain2D" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('delete'); ?> Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              <form action="<?php echo base_url(). 'dua_d_design/deletedata2ddesain';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="modal-body" id="isimodalhapusdetail2d">   
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('yes'); ?></button>
                <a class="btn btn-info" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></a>
              </div>
              </form>
            </div>
          </div>
        </div>
     <div class="modal fade" id="ubahModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Cash Bank Lawan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                     <form action="<?php echo base_url(). 'role/updatedetailcashbanklawan';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                      <div class="modal-body" id="IsiModalChange">
                        ...
                      </div>
                      <div class="modal-footer">
                           <button type="submit" class="btn btn-info">Simpan</button>
                        <a class="btn btn-danger" type="button" data-dismiss="modal">Cancel</a>
                      </div>
                      </form>

            </div>
        </div>
    </div>
     <div class="modal fade" id="ubahModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Cash Bank Detail</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                     <form action="<?php echo base_url(). 'role/updatedetailcashbank';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                      <div class="modal-body" id="IsiModalChange2">
                        ...
                      </div>
                      <div class="modal-footer">
                           <button type="submit" class="btn btn-info">Simpan</button>
                        <a class="btn btn-danger" type="button" data-dismiss="modal">Cancel</a>
                      </div>
                      </form>

            </div>
        </div>
    </div>

<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('delete'); ?> Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              <form action="<?php echo base_url(). 'coa/deletecoa';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="modal-body" id="isimodal">   
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('yes'); ?></button>
                <a class="btn btn-info" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></a>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="ModalHapuscashbank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('delete'); ?> Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              <form action="<?php echo base_url(). 'cashbank/deletecashbankdetail';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="modal-body" id="isimodalhapus">   
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('yes'); ?></button>
                <a class="btn btn-info" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></a>
              </div>
              </form>
            </div>
          </div>
        </div>

         <div class="modal fade" id="ModalHapusdetaildesain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('delete'); ?> Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              <form action="<?php echo base_url(). 'dua_d_design/deletedetaildesain';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="modal-body" id="isimodalhapusdesaindetail">   
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('yes'); ?></button>
                <a class="btn btn-info" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></a>
              </div>
              </form>
            </div>
          </div>
        </div>

          <div class="modal fade" id="ModalEditdetaildesain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('change'); ?> Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              <form action="<?php echo base_url(). 'editdetaildesain';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="modal-body" id="isimodaleditdesaindetail">   
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('yes'); ?></button>
                <a class="btn btn-info" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></a>
              </div>
              </form>
            </div>
          </div>
        </div>
         <div class="modal fade" id="Modalgambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            
              <div class="modal-body" id="isimodalgambar">   
              </div>
              </form>
            </div>
          </div>
        </div>



        <div class="modal fade" id="ModalHapuscashbanklawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('delete'); ?> Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              <form action="<?php echo base_url(). 'cashbank/deletecashbanklawan';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="modal-body" id="isimodalhapus1">   
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('yes'); ?></button>
                <a class="btn btn-info" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></a>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="ModalHapus1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Item Keranjang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              <form action="<?php echo base_url(). 'pembelian/deletelistbarang';?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="modal-body" id="IsiModalDelete">   
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-danger">Ya</button>
                <a class="btn btn-info" type="button" data-dismiss="modal">Cancel</a>
              </div>
              </form>
            </div>
          </div>
        </div>
    <div id="modalmatauang" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sc'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('number'); ?></th>
                                            <th><?php echo $this->lang->line('cn'); ?></th>
                                            <th>Rate</th>
                                            <th><?php echo $this->lang->line('date'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($kurs as $data){
                                        ?>
                                        <tr id="kurs" data-id="<?= $data->id_matauang; ?>" data-kodematauang="<?= $data->kodematauang; ?>" data-namamatauang="<?= $data->namamatauang; ?>"data-rate="<?= $data->rate?>" onclick="kursmodal()">
                                           <td align="center"><?php echo $no ?></td>
                                          <td><?php echo $data->namamatauang?>(<?php echo $data->kodematauang?>)</td>
                                          <td><?php echo $data->rate?></td>
                                          <td><?php echo $data->tanggal?></td>
                                          
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalmaterial" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sm'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable4" width="100%" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('material'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('unit'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($material as $data){
                                        ?>
                                        <tr id="material" data-id="<?= $data->id_material; ?>" data-material="<?= $data->material; ?>"  data-satuan="<?= $data->satuan; ?>"  onclick="materialmodal()">
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->material?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->satuan?></td></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>

  <div id="modaltipedesign" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sm'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable5" width="100%" cellspacing="0">
                                  <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('producttype'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($tipedesign as $data){
                                        ?>
                                        <tr id="tipedesign" data-id="<?= $data->id_tipe; ?>" data-tipedesign="<?= $data->tipedesign; ?>" onclick="tipedesignmodal()">
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->tipedesign?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
   <div id="modalfinishing" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sm'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable6" width="100%" height="1px" cellspacing="0">
                  <thead>
                      <tr height="20px">
                          <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                          <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Finishing</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no=1;
                      foreach($finishing as $data){
                      ?>
                        <tr id="finishing" data-id="<?= $data->id_finishing; ?>" data-finishing="<?= $data->finishing; ?>" onclick="finishingmodal()">
                        <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                        <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->finishing?></td>
                      </tr>
                      <?php 
                      $no++;
                      } 
                      ?>
                  </tbody>
              </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
   <div id="modalkonsepkepala" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('shc'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable7" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('headconcept'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($konsepkepala as $data){
                                        ?>
                                       <tr id="konsepkepala" data-id="<?= $data->id_konsepkepala; ?>" data-konsepkepala="<?= $data->konsepkepala; ?>" onclick="konsepkepalamodal()">
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->konsepkepala?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalparcel" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Parcel</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable8" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Parcel</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('price'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('clarity'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('shape'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('color'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($parcel as $data){
                                        ?>
                                        <tr id="parcel" data-id="<?= $data->id_parcel; ?>" data-parcel="<?= $data->parcel; ?>" data-clarity="<?php echo $data->clarity?>" data-shape="<?php echo $data->shape?>" data-color="<?php echo $data->color?>" data-harga="<?php echo number_format($data->hargabeli,0,',','.') ?>" onclick="parcelmodal()">
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->parcel?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo number_format($data->hargabeli,0,',','.') ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->clarity?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->shape?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->color?></td>
                                          
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
   <div id="modalproduk" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Produk</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="tableproduk" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                       <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('productname'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('producttype'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Brand</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Kondisi</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Harga Beli</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($produk as $data){
                                        ?>
                                        <tr id="produk" data-id="<?= $data->id_produk; ?>" data-produk="<?= $data->namaproduk; ?>" data-tipeproduk="<?php echo $data->tipeproduk?>" data-brand="<?php echo $data->brand?>" data-etalase="<?php echo $data->etalase?>" data-kondisi="<?php echo $data->kondisi?>"  data-harga="<?php echo number_format($data->hargabeli,2,',','.') ?>" data-harga_="<?php echo number_format($data->hargabeli,0,',','.') ?>" onclick="produkmodal()">
                                         <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->namaproduk?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->tipeproduk?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->brand?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->kondisi?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo number_format($data->hargabeli,0,',','.') ?></td>
                                       
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
   <div id="modalongkos" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Ongkos</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="tableongkos"  width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('fee'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('price'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($ongkos as $data){
                                        ?>
                                        <tr id="ongkos" data-id="<?= $data->id_ongkos; ?>" data-ongkos="<?= $data->ongkos; ?>" data-hargaongkos_="<?php echo number_format($data->harga,0,',','.') ?>" data-hargaongkos="<?= $data->harga; ?>" onclick="ongkosmodal()">
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->ongkos?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo number_format($data->harga,0,',','.') ?></td>
                                          
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalwarnaproduk" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Warna Produk</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable9" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('productcolor'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($warnaproduk as $data){
                                        ?>
                                         <tr id="warnaproduk" data-id="<?= $data->id_warnaproduk; ?>" data-warnaproduk="<?= $data->warnaproduk; ?>" onclick="warnaprodukmodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->warnaproduk?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div class="modal hide" id="addBookDialog">
 <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Modal header</h3>
  </div>
    <div class="modal-body">
        <p>some content</p>
        <input type="text" name="bookId" id="bookId" value=""/>
    </div>
</div>
  <div id="modalkaryawan" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('se'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                         <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('name'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('address'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('city'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('contact'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('part'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($karyawan as $data){
                                        ?>
                                         <tr id="karyawan" data-id="<?= $data->id_karyawan; ?>" data-nama="<?= $data->nama; ?>" onclick="karyawanmodal()">
                                         <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->nama?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->alamat?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->kota?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->kontak?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->bagian?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalsubaccount" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sc'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('number'); ?></th>
                                            <th><?php echo $this->lang->line('subaccount'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('address'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($subaccount as $data){
                                        ?>
                                        <tr id="subaccount" data-subaccount="<?= $data->subaccount; ?>" data-nama="<?= $data->nama; ?>"  onclick="subaccountmodal()">
                                           <td align="center"><?php echo $no ?></td>
                                          <td><?php echo $data->subaccount?></td>
                                          <td><?php echo $data->nama?></td>
                                          <td><?php echo $data->alamat?></td>
                                          
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>

  <div id="modalclient" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sc'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="tableclient" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('number'); ?></th>
                                            <th><?php echo $this->lang->line('subaccount'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('address'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($client as $data){
                                        ?>
                                        <tr id="client" data-id="<?= $data->id_client; ?>" data-namaclient="<?= $data->nama; ?>"  onclick="clientmodal()">
                                           <td align="center"><?php echo $no ?></td>
                                          <td><?php echo $data->subaccount?></td>
                                          <td><?php echo $data->nama?></td>
                                          <td><?php echo $data->alamat?></td>
                                          
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
<div id="modal2ddesign" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Model</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive"> 
                                <table class="table table-hover" id="tablemodel" width="100%"  cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                           
                                            <th>No</th>
                                            <th>Nomo Design</th>
                                            <th>Model</th>
                                            <th >Keterangan</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $no=1;
                                        foreach($detaildesain as $data){
                                       
                                        ?>
                                        <tr id="model" data-nomor="<?= $data->nomor; ?>" data-iddetail="<?= $data->id_detail; ?>"   onclick="modelmodal()">
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td> <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $data->nomor ?></td>
                                          <td><img src="<?= base_url('assets/file/2ddesain/'). $data->gambar1?>" style="width: 200px;height: 100px;"> <br> Model : <?php echo $data->model?><br> Sub Model : <?php echo $data->submodel?> </td>
                                           <td style="width: 40%;">Tipe Design : <?php echo $data->tipedesign?> | Warna Produk : <?php echo $data->warnaproduk?> <br> Material : <?php echo $data->material?> | Berat Material : <?php echo $data->beratmaterial?> <?php echo $data->satuan?> <br> Konsep Kepala : <?=$data->konsepkepala?> | Finishing : <?=$data->finishing?> |  Ongkos : <?php echo number_format($data->hargaongkos,0,',','.') ?> <br> Gender : <?=$data->gender?> <br> Ukuran : <?=$data->size?></td> 
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>                  
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
    <div id="modaldiameter" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('choice'); ?> Diameter</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('number'); ?></th>
                                            <th><?php echo $this->lang->line('diagroup'); ?></th>
                                            <th><?php echo $this->lang->line('diameterfrom'); ?></th>
                                            <th><?php echo $this->lang->line('diameterto'); ?></th>
                                            <th><?php echo $this->lang->line('carat'); ?></th>
                                            <th><?php echo $this->lang->line('createby'); ?></th>
                                            <th><?php echo $this->lang->line('createdate'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($diameter as $data){
                                        ?>
                                        <tr id="diameter" data-id="<?= $data->id_diameter; ?>" data-diagroup="<?= $data->diagroup; ?>" data-diameterfrom="<?= $data->diameter_from; ?>"data-diameterto="<?= $data->diameter_to?>" data-carat="<?= $data->carat?>"onclick="diametermodal()">
                                           <td align="center"><?php echo $no ?></td>
                                          <td><?php echo $data->diagroup?></td>
                                          <td><?php echo $data->diameter_from?></td>
                                          <td><?php echo $data->diameter_to?></td>
                                          <td><?php echo $data->carat?></td>
                                          <td><?php echo $data->create_by ?></td>
                                          <td><?php echo format_indo(date('Y-m-d', strtotime($data->create_date)));?></td>
                                         
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
      </div>
    </div>
  </div>

  <div id="modalcoasat" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('select'); ?> Data</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('account'); ?></th>
                                            <th><?php echo $this->lang->line('accountname'); ?></th>
                                            <th>Header Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($coasat as $data){
                                        ?>
                                        <tr id="coasat"  data-akun="<?= $data->akun; ?>" data-namaakun="<?= $data->namaakun; ?>" onclick="coasatmdoal()">
                                         <!--  <td style="display: none;"><?php echo $data->kode?></td> -->
                                          <td><?php echo $data->akun?></td>
                                          <td><?php echo $data->namaakun?></td>
                                          <td><?php echo $data->headerdetail?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>

  <div id="modalcoadua" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('select'); ?> Data</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable4" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('account'); ?></th>
                                            <th><?php echo $this->lang->line('accountname'); ?></th>
                                            <th>Header Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($coadua as $data){
                                        ?>
                                        <tr id="coadua"  data-akun="<?= $data->akun; ?>" data-namaakun="<?= $data->namaakun; ?>" onclick="coaduamdoal()">
                                          <!-- <td style="display: none;"><?php echo $data->kode?></td> -->
                                          <td><?php echo $data->akun?></td>
                                          <td><?php echo $data->namaakun?></td>
                                          <td><?php echo $data->headerdetail?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>

  <div id="modalcategory" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sm'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable10" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($category as $data){
                                        ?>
                                         <tr id="category" data-id="<?= $data->id_masterid; ?>" data-category="<?= $data->keterangan; ?>" onclick="categorymodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>

  <div id="modaljenisgaransi" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sm'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable11" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($jenisgaransi as $data){
                                        ?>
                                         <tr id="jenisgaransi" data-id="<?= $data->id_masterid; ?>" data-jenisgaransi="<?= $data->keterangan; ?>" onclick="jenisgaransimodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalbrand" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sm'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable12" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($brand as $data){
                                        ?>
                                         <tr id="brand" data-id="<?= $data->id_masterid; ?>" data-brand="<?= $data->keterangan; ?>" onclick="brandmodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalperiodegaransi" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title"><?php echo $this->lang->line('sm'); ?></h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable13" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($periodegaransi as $data){
                                        ?>
                                         <tr id="periodegaransi" data-id="<?= $data->id_masterid; ?>" data-periodegaransi="<?= $data->keterangan; ?>" onclick="periodegaransimodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modaletalase" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Etalase</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable14" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($etalase as $data){
                                        ?>
                                         <tr id="etalase" data-id="<?= $data->id_masterid; ?>" data-etalase="<?= $data->keterangan; ?>" onclick="etalasemodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalclaimgaransi" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Claim Garansi</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable15" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($claimgaransi as $data){
                                        ?>
                                         <tr id="claimgaransi" data-id="<?= $data->id_masterid; ?>" data-claimgaransi="<?= $data->keterangan; ?>" onclick="claimgaransimodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalsatuanbesar" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Satuan Besar</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable16" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($satuanbesar as $data){
                                        ?>
                                         <tr id="satuanbesar" data-id="<?= $data->id_masterid; ?>" data-satuanbesar="<?= $data->keterangan; ?>" onclick="satuanbesarmodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalsatuankecil" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Satuan Besar</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable17" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($satuankecil as $data){
                                        ?>
                                         <tr id="satuankecil" data-id="<?= $data->id_masterid; ?>" data-satuankecil="<?= $data->keterangan; ?>" onclick="satuankecilmodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modalkondisi" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Satuan Besar</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable18" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($kondisi as $data){
                                        ?>
                                         <tr id="kondisi" data-id="<?= $data->id_masterid; ?>" data-kondisi="<?= $data->keterangan; ?>" onclick="kondisimodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
  <div id="modaltipeproduk" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Tipe Produk</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="tabletipeproduk" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">MasterID</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('description'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($tipeproduk as $data){
                                        ?>
                                         <tr id="tipeproduk" data-id="<?= $data->id_masterid; ?>" data-tipeproduk="<?= $data->keterangan; ?>" onclick="tipeprodukmodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->masterid?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->keterangan?></td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
   <div id="modalmatauang_" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Mata Uang</h3>
          </center>
        </div>
          <div class="modal-body">
            <div class="table-responsive">
               <table class="table table-hover" id="tablematauang" width="100%" height="1px" cellspacing="0">
                                   <thead>
                                        <tr height="20px">
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('codecurrency'); ?></th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('namecurrency'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($matauang as $data){
                                        ?>
                                         <tr id="matauang" data-id="<?= $data->id_matauang; ?>" data-matauang="<?= $data->kodematauang; ?>" onclick="matauangmodal()">

                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->kodematauang?></td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->namamatauang?></td>
                                         
                                        </tr>
                                        <?php 
                                        $no++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
            </div>
           
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
          </div>
      </div>
    </div>
  </div>
   

