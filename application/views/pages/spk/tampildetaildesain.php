<form id="formaddetaildetasain" action="<?php echo base_url() . 'dua_d_design/adddetaildesain'; ?> " enctype="multipart/form-data" method="post" id="formdetaildesain" accept-charset="utf-8" aria-hidden="true">
  <?php for ($i=1; $i<=$jumlah; $i++)

    { ?>
          <?php foreach ($detaildesain as $data)?>
        <div class="card-body" id="detail<?=$i?>">


                   <div class="row">
                                     <div class="col-md-4">
                                        <label>Model<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                           <input style="padding-bottom: 10px;" type="hidden" name="id_spkheader[]" class="form-control" readonly value="<?=$id_header?>"> 
                                        <input style="padding-bottom: 10px;max-width: 200px;" type="text" name="modeldetail[]" class="form-control" value="<?= $data->model ?>" readonly>
                                         
                                        <input style="padding-bottom: 10px;max-width: 100px; margin-left: 5px;" type="text" name="submodeldetail[]" class="form-control" value="<?= $data->submodel ?>" readonly >

                                         <input style="padding-bottom: 10px;max-width: 100px; margin-left: 5px;" type="hidden" name="iddetail[]" class="form-control" value="<?= $data->id_detail ?>" readonly >
                                         
                                        
                                       </div>
                                        <?= form_error('model', '<small class="text-danger" style="margin-left:5px;font-size:15px;">', '</small>'); ?>
                                    </div>
                                     <div class="col-md-4">
                                      
                                    </div>  
                                      
                                    <div class="col-md-2">
                                        <label><?php echo $this->lang->line('typedesign'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                         <input style="padding-bottom: 10px;max-width: 100px; margin-left: 5px;" type="hidden" name="nodetail" class="form-control" value="<?= $i ?>">
                                        <input style="padding-bottom: 10px;width: 160px;" id="tipedesign"   type="text" name="tipedesign" class="tipedesign form-control" readonly required value="<?= $data->tipedesign ?>">
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idtipedesign"   type="hidden" name="idtipedesign[]" class="form-control"  value="<?= $data->id_tipe  ?>" readonly>
 
                                       </div>
                                    </div>
                                     <div class="col-md-2">
                                        <label><?php echo $this->lang->line('framefee'); ?><small class="text-danger">*</small></label>
                                         <input style="padding-bottom: 10px;width: 160px;" id="idongkosrangka" value="<?= set_value('idongkosrangka') ?>"  type="hidden" name="idongkosrangka" class="form-control" readonly>
                                      <div class="input-group">
                                          <select id="kesulitan" onchange="getongkosrangka()" class="form-control" name="kesulitan">
                                             <option value="<?=$data->filter?>">Data Asal : <?=$data->filter?></option>
                                            <option value="Mudah Kecil 1-2">Mudah Kecil 1-2</option>
                                            <option value="Mudah Sedang/3-4">Mudah Sedang/3-4</option>
                                            <option value="Mudah Besar >4">Mudah Besar >4</option>
                                            <option value="Sedang Kecil 1-2">Sedang Kecil 1-2</option>
                                            <option value="Sedang Sedang/3-4">Sedang Sedang/3-4</option>
                                            <option value="Sedang Besar >4">Sedang Besar >4</option>
                                            <option value="Sulit Kecil 1-2">Sulit Kecil 1-2</option>
                                            <option value="Sulit Sedang/3-4">Sulit Sedang/3-4</option>
                                            <option value="Sulit Besar >4">Sulit Besar >4</option>
                                          </select>
                                       </div>
                                    </div>  
                                </div>
                                 <div class="row">
                                     <div class="col-md-4">
                                      <label>Material<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                        
                                        <input style="padding-bottom: 10px;width: 10px;" value="<?= $data->material ?>" id="material" type="text" name="material" class="form-control"  >                                      
                                        <input style="padding-bottom: 10px;width: 160px;" value="<?= $data->id_material ?>" id="idmaterial"   type="hidden" name="idmaterial[]"  class="form-control" readonly>
                                       

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalmaterial"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                        
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Berat<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                         <input style="padding-bottom: 10px;max-width: 400px;text-align: right" value="<?= $data->beratmaterial ?>" step="any"  type="number" step="any" name="beratmaterial[]" class="form-control" id="beratmaterial" onkeyup="hitungmaterial()" required>
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuan" readonly  type="text" value="<?= $data->satuan ?>" name="satuan" class="form-control" required>
                                      </div>
                                      
                                    </div>
                                   

                                     <div class="col-md-4">
                                        <label><?php echo $this->lang->line('headconcept'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                        
                                        <input style="padding-bottom: 10px;width: 200px;" id="konsepkepala" value="<?= $data->konsepkepala ?>"  type="text" readonly name="konsepkepala" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idkonsepkepala" value="<?= $data->id_konsepkepala ?>"  type="hidden" name="idkonsepkepala[]" class="form-control" readonly>
 
                                       </div>
                                    </div>

                                    
                                </div>

                                <div class="row">
                                     
                                    <div class="col-md-4">
                                        <label><?php echo $this->lang->line('finishing'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;width: 160px;" value="<?= $data->finishing ?>" id="finishing"   type="text" name="finishing" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" value="<?= $data->id_finishing ?>" id="idfinishing"   type="hidden" name="idfinishing[]" class="form-control" readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalfinishing"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div>
                                     <div class="col-md-4">
                                        <label><?php echo $this->lang->line('productcolor'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;max-width: 400px;" value="<?= $data->warnaproduk ?>" id="warnaproduk"   type="text" name="warnaproduk" class="warnaproduk form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idwarnaproduk" value="<?= $data->id_warnaproduk ?>"  type="hidden" name="idwarnaproduk[]" class="form-control" readonly>

                                        <span class="input-group-btn">
                                         <!--  <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" data-id="<?= $i; ?>" required data-target="#modalwarnaproduk"><?php echo $this->lang->line('search'); ?></button> -->
                                         <a data-toggle="modal" data-id="ISBN-001122" title="Add this item" class="open-AddBookDialog btn btn-primary" data-toggle="modal" data-id="<?= $i; ?>" required data-target="#modalwarnaproduk" >test</a>
                                        </span> 
                                       </div>
                                    </div>


                                   <div class="col-md-4">
                                      <label><?php echo $this->lang->line('ongkoslainnya'); ?><small class="text-danger">*</small></label>
                                        <div class="input-group">
                                          
                                           <select onchange="getdataongkoslainnya(this.value)" class="form-control" id="ongkoslainnya" name="ongkoslainnya">
                                          <option value="<?=$data->id_ongkoslainnya?>">Data Asal : <?=$data->ongkoslainnya?></option> 
                                          <?php  $arrayongkoslainnya = "var dataongkoslainnya = new Array();\n";  ?>
                                          <?php foreach ($ongkoslainnya as $dol) {
                                                                            
                                            echo'<option value="' . $dol->id_ongkoslainnya . '">' . $dol->ongkoslainnya . '</option>'; 
                                                                             
                                               $arrayongkoslainnya .= "dataongkoslainnya['". $dol->id_ongkoslainnya ."'] = {price:'".addslashes($dol->price)."'};"; 
                                           }?>
                                          </select>
                                       </div>
                                    </div>

                                  
                                </div>

                                <div class="row">
                                  <div class="col-md-4">
                                    <label><?php echo $this->lang->line('gender'); ?><small class="text-danger">*</small></label>
                                        <select class="form-control" name="gender[]">
                                          <?php if ($data->gender == "Pria"): ?> 
                                          <option value="<?= $data->gender ?>"><?= $data->gender ?></option>
                                          <option value="Wanita">Wanita</option>
                                          <?php endif ?>
                                          <?php if ($data->gender == "Wanita"): ?> 
                                          <option value="<?= $data->gender ?>"><?= $data->gender ?></option>
                                          <option value="Pria">Pria</option>
                                          <?php endif ?>
                                        </select>
                                  </div>
                                  <div class="col-md-4">
                                      <label><?php echo $this->lang->line('size'); ?><small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;width: 300px;text-align: right" value="<?= $data->size ?>"  type="number" step="any" step="any" name="ukuran[]" class="form-control">
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
                                        <input style="padding-bottom: 10px;max-width:  260px; margin-left: 70px;text-align: right" value="<?= $data->jsfinishing ?>" type="number" step="any" name="jsfinishing[]" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;"  id="satuanjsfinishing" readonly value="<?= $data->satuan ?>" type="text" name="satuanjsfinishing" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                         <div class="input-group">
                                          <label>Material<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;text-align: right;"  type="hidden" readonly id="hargamaterial" value="<?= $data->hargamaterial ?>" name="hargamaterial[]" placeholder="<?php echo number_format(0,0,',','.') ?>" class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;text-align: right;"  type="hidden" readonly id="hargamaterialawal"  name="hargamaterialawal" placeholder="<?php echo number_format($data->jsfinishing,0,',','.') ?>" class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;text-align: right;"  type="text" readonly id="hargamaterial_" value="<?php echo number_format($data->hargamaterial,0,',','.') ?>" name="hargamaterial_"   class="form-control">
                                        
                                       </div>
                                  </div>
                                </div><br>
                                <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Poles Rangka<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width:  260px; margin-left: 37px;text-align: right" value="<?= $data->jspolesrangka ?>"  type="number" step="any" name="jspolesrangka[]" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuanjspolesrangka" readonly value="<?= $data->satuan ?>" type="text" name="satuanjspolesrangka" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                    <div class="input-group">
                                        <label>Diamond<small class="text-danger">*</small></label> 
                                        <input style="padding-bottom: 10px;width:550px; margin-left: 40px;text-align: right" id="hargadiamond" type="hidden" name="hargadiamond[]" value= "<?=$data->hargadiamond?>" readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 40px;text-align: right"  type="hidden" name="totaljumlah[]" value="<?=$data->totaljumlah?> " readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 40px;text-align: right"  type="hidden" name="totalberat[]" value="<?=$data->totalberat?>" readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width:300px; margin-left:40px;text-align: right"  type="text" name="diamond_" value="<?php echo number_format($data->hargadiamond,0,',','.') ?>" readonly class="form-control">
                                        
                                       </div>
                                  </div>
                                 
                                </div><br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Pasang Batu<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left: 44px;text-align: right"  type="number" step="any" name="jspasangbatu[]" class="form-control" value="<?= $data->jspasangbatu ?>">
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuanjspasangbatu" readonly  type="text" value="<?= $data->satuan ?>" name="satuanjspasangbatu" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div> 
                                    <div class="col-md-4">
                                      <div class="input-group">
                                          <label>Kepala<small class="text-danger">*</small></label>
                                          
                                      
                                         <input style="padding-bottom: 10px;width:650px; margin-left:45px;text-align:right"   readonly  type="hidden" value="<?=$data->hargakepala?>" id="hargakepala" name="hargakepala[]" id="hargakepala" class="form-control">
                                        <input style="padding-bottom: 10px;max-width:300px; margin-left:55px;text-align:right"  value=" <?php echo number_format($data->hargakepala,0,',','.') ?>" readonly  type="text" name="kepala_" class="form-control">
                                       </div>
                                  </div>
                                  </div> <br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Rakit<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left: 97px;text-align: right"  type="number" step="any" name="jspolesrakit[]" class="form-control" value="<?=$data->jsrakit?>">
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuanjsrakit" readonly  value="<?= $data->satuan ?>" type="text" name="satuanjsrakit" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Ongkos<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" value="<?php echo $data->hargaongkos ?>" id="hargaongkos"  type="hidden" name="hargaongkos" readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" value="<?= $data->hargaongkoslainnya ?>" id="hargaongkoslainnya"  type="hidden" name="hargaongkoslainnya" readonly class="form-control">
                                      
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" value="<?=$data->hargaongkosrangka?>" id="ongkosrangka"  type="hidden" name="ongkosrangka" readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" value="<?=$data->hargaheadsetting?>" id="hargaheadsetting"  type="hidden" name="hargaheadsetting" readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right"    value="<?php echo number_format($data->hargaongkos,0,',','.') ?>" id="hargaongkos_" type="text" name="hargaongkos_" readonly class="form-control">
                                        
                                       </div>
                                  </div>
                                 
                                </div><br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Poles Chrome<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left:33px;text-align: right" value="<?= $data->jspoleschrome ?>" type="number" step="any" name="jspoleschrome[]" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuanjspoleschrome" readonly value="<?= $data->satuan ?>"  type="text" name="satuanjspoleschrome" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                     <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Total<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:67px; text-align: right;" value="<?php echo number_format($data->totalharga,0,',','.') ?>"readonly id="total"  type="text" name="totalharga[]" class="form-control js-nilai">
                                        
                                       </div>
                                  </div>
                                </div>
                              </div>
                              <div class="card" style=" margin-left: 20px;margin-right: 20px;">
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
                                                          <th>Head Setting</th>
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
                                                                         <td style="width: 200px">
                                                                          <select onchange="changeValue(this.value)" class="form-control" id="idheadsetting" name="idheadsetting">
                                                                          <option value="">- Head Setting -</option>
                                                                          <?php  $jsArray = "var settingHead = new Array();\n";  ?>
                                                                          <?php foreach ($headsetting as $dhs) {
                                                                            
                                                                            echo'<option value="' . $dhs->id_headsetting . '">' . $dhs->headsetting . '</option>'; 
                                                                             
                                                                              $jsArray .= "settingHead['". $dhs->id_headsetting ."'] = {price:'".addslashes($dhs->price)."'};"; 
                                                                           }?>
                                                                          </select>
                                                                        </td>
                                                                        <td style="width: 150px">
                                                                          <input type="number" step="any" style="text-align: right;" name="jumlah"   id="jumlah" class="form-control">
                                                                          <input type="hidden" value="1" style="text-align: right;" name="status"   id="status" class="form-control">
                                                                        </td>
                                                                        <td style="width: 150px">
                                                                          <input type="number" step="any" style="text-align: right;" name="berat"   onblur="onblurfunctionaddsubdetail_edit()" id="berat" class="form-control">
                                                                           <input type="hidden" readonly name="priceheadsetting" id="priceheadsetting" class="form-control">
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
                                 <div class="card" style=" margin-left: 20px;margin-right: 20px;">
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
                                                                          <input type="text" style="text-align: right;" name="jumlah" onblur="onblurfunctionadddetailkepala_edit()"   id="jumlahproduk" class="inputkepalaedit form-control">
                                                                        </td> 

                                                                        <td style="display: none">
                                                                           <!-- <button type="submit" id="tombol-simpan" class="btn btn-info"><?php echo $this->lang->line('save'); ?></button>  -->
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
                              <hr>

                                 
                            <?php } ?>

                                   </form>
 <script type="text/javascript">  
<?php echo $arrayongkoslainnya; ?>
function getdataongkoslainnya(id){
document.getElementById('hargaongkoslainnya').value = dataongkoslainnya[id].price;
updateongkos()
hitung()
};
</script>
