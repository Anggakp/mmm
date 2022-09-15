<div class="content">
  <div class="container-fluid">
     
    <div class="row">
        <div class="col-md-12">
           <h3 class="card-title" style=""><?php echo $this->lang->line('transaction2ddesign'); ?></h3>
           
      <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-md-3">
                           <h4 style="margin-top: 10px;margin-bottom: 0px;padding-bottom: 0px;margin-left: 7px;">Detail Designer</h4>
                </div>
              </div>
               
                <div>
                  <div class="card-body">
                     <?php foreach ($detaildesain as $data) {
                      
                      ?>
                      <form action="<?php echo base_url() . 'dua_d_design/updatedetaildesain'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                   <div class="row">
                                     <div class="col-md-4">
                                        <label>Model<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                        <input style="padding-bottom: 10px;" type="hidden" name="idheader" id="id_header" class="form-control" value="<?=$data->id_header?>" readonly> 
                                        <input style="padding-bottom: 10px;" type="hidden" name="iddetail" id="id_detail" class="form-control" value="<?=$data->id_detail?>" readonly> 
                                        <input style="padding-bottom: 10px;max-width: 200px;" type="text" name="model" class="form-control" required value="<?=$data->model?>">
                                       <!--  <input style="padding-bottom: 10px;max-width: 250px;margin-left: 5px;" placeholder="Kosongkan jika model sama" type="text" name="model_" class="form-control"> -->
                                        <input style="padding-bottom: 10px;max-width: 100px; margin-left: 5px;" type="text" name="submodel" class="form-control" value="<?=$data->submodel?>" >
                                        
                                       </div>

                                         <?= form_error('model_', '<small class="text-danger" style="margin-left:205px;">', '</small>'); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"><?php echo $this->lang->line('transactiondate'); ?></label>
                                          <input style="padding-bottom: 10px;" value="<?php echo date('Y-m-d'); ?>" type="date" value="<?= set_value('tanggaltransaksi') ?>"  name="tanggaltransaksi" id="tanggaltransaksi"  class="form-control"   >
                                          <?= form_error('tanggaltransaksi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                      
                                  <div class="col-md-4">
                                        <label><?php echo $this->lang->line('typedesign'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;width: 160px;" id="tipedesign" value="<?=$data->tipedesign?>"   type="text" name="tipedesign" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idtipedesign"   type="hidden" name="idtipedesign" class="form-control"  value="<?=$data->id_tipe?>"readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modaltipedesign"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div>
                                    

                                    
                                </div>
                                 <div class="row">
                                     <div class="col-md-4">
                                      <label>Material<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;width: 10px;" id="material" type="text" name="material" class="form-control" value="<?=$data->material?>" onblur="gethargamaterial()">                                      
                                        <input style="padding-bottom: 10px;width: 160px;" value="<?=$data->id_material?>" id="idmaterial"   type="hidden" name="idmaterial" class="form-control" readonly>
                                       

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalmaterial"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                        
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Berat<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                         <input style="padding-bottom: 10px;max-width: 400px;text-align: right;"  value="<?=$data->beratmaterial?>" onkeyup="hitungmaterial()" type="number" step="any" name="beratmaterial" id="beratmaterial" class="form-control" required>
                                         <input style="padding-bottom: 10px;max-width: 100px;" placeholder="Satuan Berat" id="satuan" readonly  type="text" name="satuan" value="<?=$data->satuan?>" class="form-control" required>
                                      </div>
                                      
                                    </div>
                                   

                                     <div class="col-md-4">
                                        <label><?php echo $this->lang->line('headconcept'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                        
                                        <input style="padding-bottom: 10px;width: 200px;" value="<?=$data->konsepkepala?>" id="konsepkepala"   type="text" name="konsepkepala" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idkonsepkepala" value="<?=$data->id_konsepkepala?>"  type="hidden" name="idkonsepkepala" class="form-control" readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalkonsepkepala"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div>

                                    
                                </div>

                                <div class="row">
                                     
                                    <div class="col-md-4">
                                        <label><?php echo $this->lang->line('finishing'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;width: 160px;" id="finishing" value="<?=$data->finishing?>"  type="text" name="finishing" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idfinishing" value="<?=$data->id_finishing?>"  type="hidden" name="idfinishing" class="form-control" readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalfinishing"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div>
                                     <div class="col-md-4">
                                        <label><?php echo $this->lang->line('productcolor'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;max-width: 400px;" value="<?=$data->warnaproduk?>" id="warnaproduk"   type="text" name="warnaproduk" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idwarnaproduk" value="<?=$data->id_warnaproduk?>"  type="hidden" name="idwarnaproduk" class="form-control" readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalwarnaproduk"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label><?php echo $this->lang->line('fee'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;width: 160px;" onblur="gethargaongkos()" id="ongkos" value="<?=$data->ongkos?>" type="text" name="ongkos" class="form-control"  required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idongkos" value="<?=$data->id_ongkos?>"  type="hidden" name="idongkos" class="form-control" readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalongkos"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div>

                                  
                                </div>

                                <div class="row">
                                  <div class="col-md-4">
                                    <label><?php echo $this->lang->line('gender'); ?><small class="text-danger">*</small></label>
                                        <select class="form-control" style="width: 485px;" name="jeniskelamin">
                                          <option value="Pria">Pria</option>
                                          <option value="Wanita">Wanita</option>
                                        </select>
                                  </div>
                                  <div class="col-md-4">
                                      <label><?php echo $this->lang->line('size'); ?><small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;width: 300px;text-align: right;"  type="number" step="any" value="<?=$data->ukuran?>" name="ukuran" class="form-control">
                                  </div>
                                   
                                </div><br>
                                <div class="row" style="margin-top: 10px;">
                                  <div class="col-md-4">
                                      <h4>Jatah Susut</h4>
                                  </div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                    <h4>Estimasi Harga</h4>
                                  </div>
                                </div>
                               <br>
                                 
                                <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                            <label>Finishing<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px;  margin-left: 70px;text-align: right;" value="<?=$data->jsfinishing?>" type="number" step="any" name="jsfinishing" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;" placeholder="Satuan Berat" id="satuanjsfinishing" readonly value="<?=$data->satuan?>"  type="text" name="satuanberat" class="form-control" required>
                                        
                                       </div>
                                  </div>

                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Material<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;" id="hargamaterial"  type="hidden" value="<?php echo $data->hargamaterial ?>" name="hargamaterial" readonly class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;text-align: right;"  value="<?php echo $data->hargamaterial ?>" type="hidden" readonly id="hargamaterialawal"  name="hargamaterialawal" placeholder="<?php echo number_format(0,0,',','.') ?>" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;text-align: right;"  type="text" readonly id="hargamaterial_" id="hargamaterial_" name="hargamaterial_" placeholder="<?php echo number_format($data->hargamaterial,0,',','.') ?>" class="form-control">
                                        
                                       </div>
                                  </div>
                                </div><br>
                                <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Poles Rangka<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left: 37px;text-align: right;" value="<?=$data->jspolesrangka?>" type="number" step="any" name="jspolesrangka" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;" placeholder="Satuan Berat" id="satuanjspolesrangka" value="<?=$data->satuan?>" readonly  type="text" name="satuanberat" class="form-control" required>
                                       </div>
                                  </div>

                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                  <div id="tampilhargadiamondedit"></div>
                                  </div>
                                </div><br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Pasang Batu<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left: 44px;text-align: right;" type="number" step="any" name="jspasangbatu" value="<?=$data->jspasangbatu?>" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;" placeholder="Satuan Berat" id="satuanjspasangbatu" value="<?=$data->satuan?>" readonly  type="text" name="satuanberat" class="form-control" required>
                                        
                                       </div>
                                  </div>

                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                    <div id="tampilhargaprodukedit"></div>
                                  </div>
                                </div>
                                <br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Rakit<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left: 95px;text-align: right;"  type="number" step="any" name="jspolesrakit" class="form-control" value="<?=$data->jsrakit?>">
                                         <input style="padding-bottom: 10px;max-width: 100px;" placeholder="Satuan Berat" id="satuanjsrakit"  value="<?=$data->satuan?>" readonly  type="text" name="satuanberat" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Ongkos<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right;" id="hargaongkos" type="hidden" name="hargaongkos" value="<?php echo $data->hargaongkos ?>" readonly class="form-control">
                                        
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right;" id="hargaongkos_" type="text" name="hargaongkos_" value="<?php echo number_format($data->hargaongkos,0,',','.') ?>" readonly class="form-control">

                                       </div>
                                  </div>
                                 
                                </div><br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Poles Chrome<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left:30px;text-align: right;"  type="number" step="any" name="jspoleschrome" class="form-control" value="<?=$data->jspoleschrome?>" >
                                         <input style="padding-bottom: 10px;max-width: 100px;" placeholder="Satuan Berat" id="satuanjspoleschrome" readonly value="<?=$data->satuan?>"  type="text" name="satuanberat" class="form-control" required>
                                        
                                       </div>
                                  </div>

                                  <div class="col-md-4"></div>
                                     <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Total<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:67px;text-align: right;"  id="total" readonly type="text" name="total" class="form-control">
                                       </div>
                                  </div>
                                 
                                </div><br>
                              <?php } ?>

                                <div class="card">
                                  <div class="card-body">
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <h4   class="m-0 font-weight-bold text-primary"> Detail Diamond</h4>
                                          </div>
                                          <div class="col-md-6">
                                             <h6  style="text-align: right" class="m-0 font-weight-bold text-primary"> <a id="addbuttonsubdetail" class="text-info" style="text-decoration: none" class="btn btn-sm btn-danger mr-1"  href="#"> <i class="fas fa-fw fa-plus text-info"></i> <?php echo $this->lang->line('add'); ?></h6></a><br>
                                          </div>
                                        </div>
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                              <table class="table table-hover" width="100%"  cellspacing="0">
                                                  <thead>
                                                      <tr height="20px">
                                                         
                                                          <th>Parcel</th>
                                                          <th>Harga</th>
                                                          <th>Clarity</th>
                                                          <th>Shape</th>
                                                          <th>Color</th>
                                                          <th>Jumlah</th>
                                                          <th>Berat</th>
                                                          <th>Pengaturan</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody id="tabledetaildiamondedit">
                                                  </tbody>   
                                                  <tfoot>
                                                                 <tr id="addformsubdetail" style="display: none">
                                                                      <form id="formsubdetail"  enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">     
                                                                         <td style="width: 250px;">
                                                                            <div class="input-group" >
                                                                            <input autofocus style="padding-bottom: 10px;width: 10px;" id="parcel" type="text" name="parcel" class="form-control">
                                                                            <input style="padding-bottom: 10px;width: 10px;" id="idparcel" type="hidden" name="idparcel" class="form-control">
                                                                            <span class="input-group-btn" >
                                                                              <button style="margin-left: 5px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalparcel"><?php echo $this->lang->line('search'); ?></button>
                                                                            </span>

                                                                            </div>
                                                                        </td>
                                                                       <td style="width: 150px"> 
                                                                        <input type="text" style="text-align: right;" readonly name="harga" required id="harga" class="form-control">
                                                                       
                                                                      </td>
                                                                        <td style="width: 150px">
                                                                          <input type="text" readonly name="clarity" id="clarity" class="form-control">
                                                                        </td>
                                                                         <td style="width: 150px">
                                                                          <input type="text" readonly name="shape" id="shape" class="form-control">
                                                                        </td>
                                                                         <td style="width: 150px">
                                                                          <input type="text" readonly name="color" id="color" class="form-control">
                                                                        </td>
                                                                        <td style="width: 150px">
                                                                          <input type="number" step="any" style="text-align: right;" name="jumlah"   id="jumlah" class="form-control">
                                                                          <input type="hidden" value="1" style="text-align: right;" name="status"   id="status" class="form-control">
                                                                        </td>
                                                                        <td style="width: 150px">
                                                                          <input type="number" step="any" style="text-align: right;" name="berat"   onblur="onblurfunctionaddsubdetail_edit()" id="berat" class="form-control">
                                                                        </td>
                                                                        <td >
                                                                           <!-- <button style="display: none" type="submit" id="tombol-simpan" class="btn btn-info"><?php echo $this->lang->line('save'); ?></button>  -->
                                                                        </td>
                                                                     
                                                                        </form>
                                                                      </tr>  
                                                               </tfoot>               
                                              </table>
                                       </div>
                                </div>
                              </div>
                                  </div>
                                </div>
                                 
                              <br>
                              <div class="card">
                                <div class="card-body">
                                 <div class="row">
                                          <div class="col-md-6">
                                            <h4   class="m-0 font-weight-bold text-primary"> Konsep Kepala</h4>
                                          </div>
                                          <div class="col-md-6">
                                             <h6  style="text-align: right" class="m-0 font-weight-bold text-primary"> <a id="addbuttondetailkepala" class="text-info" style="text-decoration: none" class="btn btn-sm btn-danger mr-1"  href="#"> <i class="fas fa-fw fa-plus text-info"></i> <?php echo $this->lang->line('add'); ?></h6></a><br>
                                          </div>
                                        </div>
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                              <table class="table table-hover" width="100%"  cellspacing="0">
                                                  <thead>
                                                      <tr height="20px">
                                                         
                                                          <th>Nama Produk</th>
                                                          <th>Tipe Produk</th>
                                                          <th>Brand</th>
                                                          <th>Etalase</th>
                                                          <th>Kondisi</th>
                                                          <th>Harga</th>
                                                          <th>Jumlah</th>
                                                          <th>Pengaturan</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody id="tabledetailprodukedit"></tbody>  
                                                   <tfoot>
                                                                   <tr id="addformdetailkepala" style="display: none">
                                                                      <form id="formprodukdetail"  enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true"> 
                                                                       <td style="width: 250px;">
                                                                            <div class="input-group" >
                                                                            <input style="padding-bottom: 10px;width: 10px;" id="produk" type="text" name="produk" class="form-control" >
                                                                            <input style="padding-bottom: 10px;width: 10px;" id="idbarang" type="hidden" name="id_barang" class="form-control">
                                                                            <span class="input-group-btn" >
                                                                              <button style="margin-left: 5px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalproduk"><?php echo $this->lang->line('search'); ?></button>
                                                                            </span>

                                                                            </div>
                                                                        </td>  
                                                                        <td style="width: 150px">
                                                                          <input type="text" readonly name="brand" id="tipeproduk" class="form-control">
                                                                        </td>
                                                                        <td style="width: 150px">
                                                                          <input type="text" readonly name="brand" id="brand" class="form-control">
                                                                        </td>
                                                                         <td style="width: 150px">
                                                                          <input type="text" style="text-align: right;" readonly name="etalase" id="etalase" class="form-control">
                                                                        </td>
                                                                         <td style="width: 150px">
                                                                          <input type="text" readonly name="kondisi" id="kondisi" class="form-control">
                                                                        </td>
                                                                      
                                                                         <td style="width: 150px"> 
                                                                        <input type="hidden" style="text-align: right;" readonly name="harga"  id="hargaproduk" class="form-control">
                                                                        <input type="text" style="text-align: right;" readonly name="hargaproduk_" id="hargaproduk_" class="form-control">
                                                                      </td>
                                                                         
                                                                        
                                                                       
                                                                        <td style="width: 150px">
                                                                          <input type="text" style="text-align: right;" name="jumlah" onblur="onblurfunctionadddetailkepala_edit()"  id="jumlahproduk" class="form-control">
                                                                        </td> 

                                                                        <td style="display: none">
                                                                           <button type="submit" id="tombol-simpan" class="btn btn-info"><?php echo $this->lang->line('save'); ?></button> 
                                                                        </td>
                                                                     
                                                                        </form>
                                                                      </tr>
                                                              </tfoot>           
                                              </table>
                                       </div>
                                </div>
                              </div>
                                </div>
                              </div>
                              
                                <br><br>
                                  <?php foreach ($detaildesain as $data) {
                      
                                 ?>
                                 <div id="gambar" >
                                  <h5> Format gambar .jpg .jpeg .png dan untuk ukuran size maksimal 10 MB</h5>
                                  <div class="row">
                                    
                                       
                                        
                                       <div class="col-md-2" style="margin-right: 56px;">
                                          <label><?php echo $this->lang->line('picture'); ?> 1</label>
                                         <input type="hidden" class="form-control"   name="gambar1_" value="<?=$data->gambar1?>">
                                          <div class="drop-zone">
                                           <?php if ($data->gambar1 == "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar1?>">
                                            </div>
                                              <?php endif ?>
                                               <?php if ($data->gambar1 != "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar1?>">

                                               <img src="<?= base_url('assets/file/2ddesain/'). $data->gambar1?>" alt="" class="img-thumbnail  img-preview">
                                                </div>
                                              <?php endif ?>
                                            <input type="file" name="gambar1" class="drop-zone__input">
                                          </div>
                                      </div>
                                      <div class="col-md-2" style="margin-right: 56px;">
                                          <label><?php echo $this->lang->line('picture'); ?> 2</label>
                                          <input type="hidden" class="form-control"   name="gambar2_" value="<?=$data->gambar2?>">
                                          <div class="drop-zone">
                                          <?php if ($data->gambar2 == "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar2?>">
                                            </div>
                                              <?php endif ?>
                                               <?php if ($data->gambar2 != "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar2?>">

                                               <img src="<?= base_url('assets/file/2ddesain/'). $data->gambar2?>" alt="" class="img-thumbnail  img-preview">
                                                </div>
                                              <?php endif ?>
                                            <input type="file" name="gambar2" class="drop-zone__input">
                                          </div>
                                      </div>
                                   

                                    <div class="col-md-2" style="margin-right: 56px;">
                                        <label><?php echo $this->lang->line('picture'); ?> 3</label>
                                          <input type="hidden" class="form-control"   name="gambar3_" value="<?=$data->gambar3?>">

                                          <div class="drop-zone">
                                           <?php if ($data->gambar3 == "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar3?>">
                                            </div>
                                              <?php endif ?>
                                               <?php if ($data->gambar3 != "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar3?>">

                                               <img src="<?= base_url('assets/file/2ddesain/'). $data->gambar3?>" alt="" class="img-thumbnail  img-preview">
                                                </div>
                                              <?php endif ?>
                                            <input type="file" name="gambar3" class="drop-zone__input">
                                          </div>
                                      </div>
                                        <div class="col-md-2" style="margin-right: 56px;">
                                          <label><?php echo $this->lang->line('picture'); ?> 4</label>
                                         <input type="hidden" class="form-control"   name="gambar4_" value="<?=$data->gambar4?>">
                                          <div class="drop-zone">
                                           <?php if ($data->gambar4 == "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar4?>">
                                            </div>
                                              <?php endif ?>
                                               <?php if ($data->gambar4 != "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar4?>">

                                               <img src="<?= base_url('assets/file/2ddesain/'). $data->gambar4?>" alt="" class="img-thumbnail  img-preview">
                                                </div>
                                              <?php endif ?>
                                            <input type="file" name="gambar4" class="drop-zone__input">
                                          </div>
                                      </div>
                                      <div class="col-md-2" style="margin-right: 56px;">
                                          <label><?php echo $this->lang->line('picture'); ?> 5</label>
                                         <input type="hidden" class="form-control"   name="gambar5_" value="<?=$data->gambar4?>">
                                          <div class="drop-zone">
                                            <?php if ($data->gambar5 == "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar5?>">
                                            </div>
                                              <?php endif ?>
                                               <?php if ($data->gambar5 != "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->gambar5?>">

                                               <img src="<?= base_url('assets/file/2ddesain/'). $data->gambar5?>" alt="" class="img-thumbnail  img-preview">
                                                </div>
                                              <?php endif ?>
                                            <input type="file" name="gambar5" class="drop-zone__input">
                                          </div>
                                      </div>
                                  </div><br>
                                   <h5> Format video .mp4 .mkv .afi .mpg dan untuk size video maksimal 10 MB</h5>
                                   <div class="row">
                                   <div class="col-md-2" style="margin-right: 56px;">
                                          <label>Video 1</label>
                                         <input type="hidden" class="form-control"   name="video1_" value="<?=$data->video1?>">
                                          <div class="drop-zone">
                                             <?php if ($data->video1 == "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->video1?>">
                                            </div>
                                              <?php endif ?>
                                               <?php if ($data->video1 != "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->video1?>">

                                               <img src="<?= base_url('assets/file/2ddesain/'). $data->video1?>" alt="" class="img-thumbnail  img-preview">
                                                </div>
                                              <?php endif ?>
                                            
                                            <input type="file" name="video1" class="drop-zone__input">
                                          </div>
                                      </div>
                                       <div class="col-md-2" style="margin-right: 56px;">
                                          <label>Video 2</label>
                                         <input type="hidden" class="form-control"   name="video2_" value="<?=$data->video2?>">
                                          <div class="drop-zone">
                                            <?php if ($data->video2 == "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->video2?>">
                                            </div>
                                              <?php endif ?>
                                               <?php if ($data->video2 != "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->video2?>">

                                               <img src="<?= base_url('assets/file/2ddesain/'). $data->video2?>" alt="" class="img-thumbnail  img-preview">
                                                </div>
                                              <?php endif ?>
                                            <input type="file" name="video2" class="drop-zone__input">
                                          </div>
                                      </div>
                                    <div class="col-md-2" style="margin-right: 56px;">
                                          <label>Video 3</label>
                                         <input type="hidden" class="form-control"   name="video1_" value="<?=$data->video3?>">
                                          <div class="drop-zone">
                                            <?php if ($data->video3 == "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->video3?>">
                                            </div>
                                              <?php endif ?>
                                               <?php if ($data->video3 != "Tidak Ada File"): ?>
                                                <div class="drop-zone__thumb" data-label="<?=$data->video3?>">

                                               <img src="<?= base_url('assets/file/2ddesain/'). $data->video3?>" alt="" class="img-thumbnail  img-preview">
                                                </div>
                                              <?php endif ?>
                                            <input type="file" name="video3" class="drop-zone__input">
                                          </div>
                                      </div>
                                     
                                  </div>

                                </div>
                                <br>
                              <?php } ?>
                             
                              <div class="row">
                                  <div class="col-md-12">
                                   <button type="submit" class="btn btn-info"><?php echo $this->lang->line('change'); ?></button>

                                   <?php if ($data->id_header == "0"): ?>
                                      <a href="#" id="btncancel_" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>
                                   <?php endif ?>
                                     <?php if ($data->id_header != "0"): ?>
                                      <a id="btncancel2" href="#" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>
                                   <?php endif ?>
                                </div>

                                </div>
                                
                               
                  </form>

                  
                </div>
                </div><br>
                
                
        </div>

          </div>

      </div>
                </div>
            </div>

        </div>

    </div>

    </form>
    
       
      </div> 
    <br>
    <br>

 