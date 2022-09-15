<div class="content">
  <div class="container-fluid">
     <form action="<?php echo base_url() . 'dua_d_design/update2ddesain'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
    <div class="row">
        <div class="col-md-12">
           
            <h3 class="card-title" style=""><?php echo $this->lang->line('transaction2ddesign'); ?></h3>
              
          
      <div class="row">
                <form action="<?php echo base_url() . 'pembelian'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                </form> 
      </div>
      <div class="row">
            <div class="col-md-12">
              <div class="shadow card">
                  <div class="col-md-3">
                           <h4 style="margin-top: 10px;margin-bottom: 0px;padding-bottom: 0px;margin-left: 7px;">Header Design</h4>
                  </div>
                  
                  <div class="card-body"> 
                    <?php foreach ($designheader as $data) {
                    
                   ?>

                            <div class="row">
                              
                                <input style="padding-bottom: 10px;" type="hidden" name="id" class="form-control">
                                <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"><?php echo $this->lang->line('number'); ?></label>
                                          <input style="padding-bottom: 10px;width: 300px;" type="text" name="nomor" class="form-control" readonly value="<?=$data->nomor?>" required>
                                           <input style="padding-bottom: 10px;" type="hidden" name="id_header" class="form-control" readonly value="<?=$data->id_header?>">
                                           
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"><?php echo $this->lang->line('transactiondate'); ?></label>
                                          <input style="padding-bottom: 10px;" value="<?php echo date('Y-m-d'); ?>" type="date" value="<?=$data->tanggal?>"  name="tanggaltransaksi" id="tanggaltransaksi"  class="form-control"   required>
                                        </div>
                                </div>
                                 <div class="col-md-4">
                                        <div  class="form-group">
                                          <label class="bmd-label-floating"><?php echo $this->lang->line('client'); ?></label>
                                          <select style="padding-bottom: 10px;" id="typeclient" name="tipedesain" class="form-control" required>
                                          <?php if ($data->tipedesain == "New Design") {
                                            
                                          ?>
                                          <option value="<?=$data->tipedesain?>"><?=$data->tipedesain?></option>
                                          <option value="Client Order">Client Order</option>
                                        <?php } ?>
                                        <?php if ($data->tipedesain == "Client Order") {
                                            
                                          ?>
                                          <option value="<?=$data->tipedesain?>"><?=$data->tipedesain?></option>
                                          <option value="New Design">New Design</option>
                                        <?php } ?>
                                          
                                        </select>
                                        </div>
                                </div>
                                
                              </div>
                              <div class="row">
                                
                                  
                                 <div class="col-md-4">
                                    <label style="margin-top: 10px;margin-bottom: 0px;padding-bottom: 0px;">Designer</label>
                                  <div class="input-group">
                                  
                                    <input style="padding-bottom: 10px;width: 160px;" id="nama" required  type="text" value="<?=$data->namakaryawan?>" name="karyawan" class="form-control" >
                                  
                                     <input style="padding-bottom: 10px;width: 160px;" id="idkaryawan"   type="hidden" value="<?=$data->id_karyawan?>" name="idkaryawan" class="form-control" readonly>

                                    <span class="input-group-btn">
                                      <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalkaryawan"><?php echo $this->lang->line('search'); ?></button>
                                    </span> 
                                   </div>
                                </div>
                               <div id="client"  class="col-md-3">
                                    
                                 <label  class="bmd-label-floating"><?php echo $this->lang->line('clientname'); ?></label>
                                  <div class="input-group">
                                    <?php if ($data->tipedesain == "New Design"): ?>
                                        <input style="padding-bottom: 10px;width: 160px;" id="idclient" value=""   type="hidden" name="idclient" class="form-control" readonly>
                                        <input style="padding-bottom: 10px;" type="text" id="namaklien" value="" name="namaclient" class="form-control" >
                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalclient"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                    <?php endif ?>
                                    <?php if ($data->tipedesain == "Client Order"): ?>
                                        <input style="padding-bottom: 10px;width: 160px;" id="idclient" value="<?=$data->id_client?>"   type="hidden" name="idclient" class="form-control" readonly>
                                        <input style="padding-bottom: 10px;" type="text" id="namaklien" value="<?=$data->nama?>" name="namaclient" class="form-control" >
                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalclient"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                    <?php endif ?>
                                   </div>
                                </div>
                                
                              </div>
                            
                              <div class="row">
                                 <div class="col-md-12">
                                 <div class="form-group">
                                     <label class="bmd-label-floating">Memo</label>
                                      <textarea id="summernote" name="memo" class="form-control" >
                                        <?=$data->memo?>
                                      </textarea><!-- 
                                     <input style="padding-bottom: 10px; height: 55px;" value="" type="text" name="memo" class="form-control" > -->
                                  </div>
                              </div>
                             
                              </div>
                               <?php } ?>
                      </div>
                   
              </div>
        </div>
    </div><br>
               <?= $this->session->flashdata('message');?> 
      <div class="row">

          <div class="col-md-12">
            <div class="shadow card">
              <div class="row">
                <div class="col-md-3">
                           <h4 style="margin-top: 10px;margin-bottom: 0px;padding-bottom: 0px;margin-left: 7px;">Detail Design</h4>
                </div>
               
              </div>
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                <table class="table table-hover" width="100%"  cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                           
                                            <th>No</th>
                                            <th>Model</th>
                                            <th>Keterangan</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $no=1;
                                        foreach($detaildesain as $data){
                                       
                                        ?>
                                        <tr id="user#<?=$data->id_detail?>">
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td><img src="<?= base_url('assets/file/2ddesain/'). $data->gambar1?>" style="width: 200px;height: 100px;"> <br> Model : <?php echo $data->model?><br> Sub Model : <?php echo $data->submodel?> </td>
                                           <td style="width: 40%;">Tipe Design : <?php echo $data->tipedesign?> | Warna Produk : <?php echo $data->warnaproduk?> <br> Material : <?php echo $data->material?> | Berat Material : <?php echo $data->beratmaterial?> <?php echo $data->satuan?> <br> Konsep Kepala : <?=$data->konsepkepala?> | Finishing : <?=$data->finishing?> |  Ongkos : <?php echo number_format($data->hargaongkos,0,',','.') ?> <br> Gender : <?=$data->gender?> <br> Ukuran : <?=$data->ukuran?> 
                                            
                                         </td>
                                          <td> 
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

                <div id="detaildesigner">

                  <form id="formaddetaildetasain" action="<?php echo base_url() . 'dua_d_design/adddetaildesain_edit'; ?> " enctype="multipart/form-data" method="post" id="formdetaildesain" accept-charset="utf-8" aria-hidden="true">
                  <div class="card-body">
                   <div class="row">
                                     <div class="col-md-4">
                                        <label>Model<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                        <input style="padding-bottom: 10px;" type="hidden" id="id_header" name="id_header" class="form-control" value="<?=$data->id_header?>" readonly> 
                                        <input style="padding-bottom: 10px;" type="hidden" name="id_detail" class="form-control" value="<?=$id_detail?>" readonly> 
                                        <input style="padding-bottom: 10px;max-width: 200px;" readonly type="text" name="model" class="form-control" value="<?= set_value('model') ?>">
                                         <input style="padding-bottom: 10px;" type="hidden" name="status" id="status" class="form-control" value="1" readonly> 
                                        <input readonly style="padding-bottom: 10px;max-width: 100px; margin-left: 5px;" type="text" name="submodel" class="form-control" value="<?= set_value('submodel') ?>" >
                                        
                                       </div>
                                    </div>
                                     <div class="col-md-4">
                                      
                                    </div>  
                                      
                                    <div class="col-md-2">
                                        <label><?php echo $this->lang->line('typedesign'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;width: 160px;" id="tipedesign"   type="text" name="tipedesign" class="form-control" required value="<?= set_value('tipedesign') ?>">
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idtipedesign"   type="hidden" name="idtipedesign" class="form-control"  value="<?= set_value('idtipedesign') ?>" readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modaltipedesign"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div>
                                     <div class="col-md-2">
                                        <label><?php echo $this->lang->line('framefee'); ?><small class="text-danger">*</small></label>
                                         <input style="padding-bottom: 10px;width: 160px;" id="idongkosrangka" value="<?= set_value('idongkosrangka') ?>"  type="hidden" name="idongkosrangka" class="form-control" readonly>
                                      <div class="input-group">
                                          <select id="kesulitan" onchange="getongkosrangka()" class="form-control" name="kesulitan">
                                            <option value="">======= Pilih Kesulitan =======</option>
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
                                        
                                        <input style="padding-bottom: 10px;width: 10px;" value="<?= set_value('material') ?>" id="material" type="text" name="material" class="form-control" onblur="gethargamaterial()">                                      
                                        <input style="padding-bottom: 10px;width: 160px;" value="<?= set_value('idmaterial') ?>" id="idmaterial"   type="hidden" name="idmaterial"  class="form-control" readonly>
                                       

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalmaterial"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                        
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Berat<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                         <input style="padding-bottom: 10px;max-width: 400px;text-align: right" value="<?= set_value('beratmaterial') ?>" step="any"  type="number" step="any" name="beratmaterial" class="form-control" id="beratmaterial" onkeyup="hitungmaterial()" required>
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuan" readonly  type="text" value="<?= set_value('satuan') ?>" name="satuan" class="form-control" required>
                                      </div>
                                      
                                    </div>
                                   

                                     <div class="col-md-4">
                                        <label><?php echo $this->lang->line('headconcept'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                        
                                        <input style="padding-bottom: 10px;width: 200px;" id="konsepkepala" value="<?= set_value('konsepkepala') ?>"  type="text" name="konsepkepala" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idkonsepkepala" value="<?= set_value('idkonsepkepala') ?>"  type="hidden" name="idkonsepkepala" class="form-control" readonly>

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
                                      
                                        <input style="padding-bottom: 10px;width: 160px;" value="<?= set_value('finishing') ?>" id="finishing"   type="text" name="finishing" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" value="<?= set_value('idfinishing') ?>" id="idfinishing"   type="hidden" name="idfinishing" class="form-control" readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalfinishing"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div>
                                     <div class="col-md-4">
                                        <label><?php echo $this->lang->line('productcolor'); ?><small class="text-danger">*</small></label>
                                      <div class="input-group">
                                      
                                        <input style="padding-bottom: 10px;max-width: 400px;" value="<?= set_value('warnaproduk') ?>" id="warnaproduk"   type="text" name="warnaproduk" class="form-control" required>
                                      
                                         <input style="padding-bottom: 10px;width: 160px;" id="idwarnaproduk" value="<?= set_value('idwarnaproduk') ?>"  type="hidden" name="idwarnaproduk" class="form-control" readonly>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalwarnaproduk"><?php echo $this->lang->line('search'); ?></button>
                                        </span> 
                                       </div>
                                    </div> 
                                    <div class="col-md-4">
                                      <label><?php echo $this->lang->line('ongkoslainnya'); ?><small class="text-danger">*</small></label>
                                        <div class="input-group">
                                          <select onchange="getdataongkoslainnya(this.value)" class="form-control" id="ongkoslainnya" name="ongkoslainnya">
                                          <option value="">======= Pilih Ongkos Lainnya =======</option> 
                                          <?php  $arrayongkoslainnya = "var dataongkoslainnya = new Array();\n";  ?>
                                          <?php foreach ($ongkoslainnya as $dol) {
                                                                            
                                            echo'<option value="' . $dol->id_ongkoslainnya . '">' . $dol->ongkoslainnya . '</option>'; 
                                                                             
                                               $arrayongkoslainnya .= "dataongkoslainnya['". $dol->id_ongkoslainnya ."'] = {price:'".addslashes($dol->price)."'};"; 
                                           }?>
                                          </select>



                                        <!--   <select id="ongkoslainnya" onchange="getongkoslainnya()" class="form-control" name="ongkoslainnya">
                                            <option value="">======= Pilih Ongkos Lainnya =======</option> 
                                            <?php foreach ($ongkoslainnya as $dol) {?>
                                              <option value="<?=$dol->price?>"><?=$dol->ongkoslainnya?></option>
                                            <?php } ?>
                                          </select> -->
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
                                        <input style="padding-bottom: 10px;width: 300px;text-align: right" value="<?= set_value('ukuran') ?>"  type="number" step="any" step="any" name="ukuran" class="form-control">

                                        <?= form_error('ukuran', '<small class="text-danger" style="margin-left:5px;font-size:15px;">', '</small>'); ?>
                                  </div>
                                   <!--  <div class="col-md-4"><br>
                                      <div class="input-group">
                                      
                                         <button style="margin-left: 3px;width: 200px;" type="button" class="btn btn-primary btn-flat" data-toggle="modal" required data-target="#ModalTambahsubdetail">Detail Diamond</button>

                                        <span class="input-group-btn">
                                          <button style="margin-left: 3px;width: 200px;" type="button" class="btn btn-primary btn-flat" data-toggle="modal" required data-target="#modalfinishing">Detail Kepala</button>
                                        </span> 
                                       </div>
                                    </div> -->
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
                                        <input style="padding-bottom: 10px;max-width:  260px; margin-left: 70px;text-align: right" value="<?= set_value('jsfinishing') ?>" type="number" step="any" name="jsfinishing" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;"  id="satuanjsfinishing" readonly value="<?= set_value('satuanjsfinishing') ?>" type="text" name="satuanjsfinishing" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                         <div class="input-group">
                                          <label>Material<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;text-align: right;"  type="hidden" readonly id="hargamaterial" value="<?= set_value('hargamaterial') ?>" name="hargamaterial" placeholder="<?php echo number_format(0,0,',','.') ?>" class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;text-align: right;"  type="hidden" readonly id="hargamaterialawal"  name="hargamaterialawal" placeholder="<?php echo number_format(0,0,',','.') ?>" class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left: 43px;text-align: right;"  type="text" readonly id="hargamaterial_" value="<?= set_value('hargamaterial_') ?>" name="hargamaterial_" placeholder="<?php echo number_format(0,0,',','.') ?>" class="form-control">
                                        
                                       </div>
                                  </div>
                                </div><br>
                                <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Poles Rangka<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width:  260px; margin-left: 37px;text-align: right" value="<?= set_value('jspolesrangka') ?>"  type="number" step="any" name="jspolesrangka" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuanjspolesrangka" readonly value="<?= set_value('satuanjspolesrangka') ?>" type="text" name="satuanjspolesrangka" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                    <div id="tampilharga"></div>
                                  </div>
                                </div><br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Pasang Batu<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left: 44px;text-align: right"  type="number" step="any" name="jspasangbatu" class="form-control" value="<?= set_value('jspasangbatu') ?>">
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuanjspasangbatu" readonly  type="text" value="<?= set_value('satuanjspasangbatu') ?>" name="satuanjspasangbatu" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                    <div id="tampilhargaproduk"></div>
                                  </div> 
                                </div>
                                <br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Rakit<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left: 97px;text-align: right"  type="number" step="any" name="jspolesrakit" class="form-control" value="<?= set_value('jspolesrakit') ?>">
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuanjsrakit" readonly  value="<?= set_value('satuanjsrakit') ?>" type="text" name="satuanjsrakit" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                 <!--  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Ongkos<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" value="<?= set_value('hargaongkos') ?>" id="hargaongkos"  type="hidden" name="hargaongkos" readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" placeholder="<?php echo number_format(0,0,',','.') ?>"  value="<?= set_value('hargaongkos_') ?>" id="hargaongkos_" type="text" name="hargaongkos_" readonly class="form-control">
                                        
                                       </div>
                                  </div> -->
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Ongkos<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" value="<?= set_value('hargaongkos') ?>" id="hargaongkos"  type="hidden" name="hargaongkos" readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" value="<?= set_value('hargaongkoslainnya') ?>" id="hargaongkoslainnya"  type="hidden" name="hargaongkoslainnya" readonly class="form-control">
                                      
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" value="<?= set_value('ongkosrangka') ?>" id="ongkosrangka"  type="hidden" name="ongkosrangka" readonly class="form-control">
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:48px;text-align: right" placeholder="<?php echo number_format(0,0,',','.') ?>"  value="<?= set_value('hargaongkos_') ?>" id="hargaongkos_" type="text" name="hargaongkos_" readonly class="form-control">
                                        
                                       </div>
                                  </div>
                                 
                                </div><br>
                                 <div class="row">
                                  <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Poles Chrome<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 260px; margin-left:33px;text-align: right" value="<?= set_value('jspoleschrome') ?>" type="number" step="any" name="jspoleschrome" class="form-control">
                                         <input style="padding-bottom: 10px;max-width: 100px;" id="satuanjspoleschrome" readonly value="<?= set_value('satuanjspoleschrome') ?>"  type="text" name="satuanjspoleschrome" class="form-control" required>
                                        
                                       </div>
                                  </div>
                                  <div class="col-md-4"></div>
                                     <div class="col-md-4">
                                      
                                         <div class="input-group">
                                          <label>Total<small class="text-danger">*</small></label>
                                        <input style="padding-bottom: 10px;max-width: 300px; margin-left:67px; text-align: right;" value="<?= set_value('total') ?>"readonly id="total"  type="text" name="total" class="form-control js-nilai">
                                        
                                       </div>
                                  </div>
                                   </form>
                                </div><br><br>
                            
                                 <div class="row">
                                  <div class="col-md-12">

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
                                                  <table  class="table"  width="100%"  cellspacing="0">
                                                              <thead id="theadsubdetail">
                                                                  <tr height="20px">
                                                                      <th>Parcel</th>
                                                                      <th>Harga</th>
                                                                      <th>Clarity</th>
                                                                      <th>Shape</th>
                                                                      <th>Color</th>
                                                                      <th>Head Setting</th>
                                                                      <th>Jumlah</th>
                                                                      <th>Berat</th>
                                                                      <th><?php echo $this->lang->line('pengaturan'); ?></th>
                                                                  </tr>
                                                              </thead>
                                                               <tbody id="tabledetaildiamond"> 
                                                               </tbody>
                                                                <tfoot>
                                                                 <tr id="addformsubdetail" style="display: none">
                                                                      <form id="formsubdetail"  enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">     
                                                                         <td style="width: 250px;">
                                                                            <div class="input-group" >
                                                                            <input autofocus style="padding-bottom: 10px;width: 10px;" id="parcel" type="text" name="parcel" class="form-control">
                                                                              <input autofocus style="padding-bottom: 10px;width: 10px;"  type="hidden" id="iddetail" value="0" name="iddetail" class="form-control">
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
                                                                          <input type="number" step="any" style="text-align: right;" name="jumlah" required  id="jumlah" class="form-control">
                                                                           <input type="hidden" readonly name="priceheadsetting" id="priceheadsetting" class="form-control">
                                                                        </td>
                                                                        <td style="width: 150px">
                                                                          <input type="number" step="any" style="text-align: right;" name="berat" required  onblur="onblurfunctionaddsubdetail()" id="berat" class="input form-control">
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
                                  </div>
                                  
                                 </div>
                                <br>

                                <div class="row">

                                  <div class="col-md-12">
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
                                            <form action="<?php echo base_url() . 'pembelian'; ?> "></form>
                                            <div class="col-md-12">

                                                <div class="table-responsive"  >
                                                   <div id="tampilkepala"></div>
                                             
                                                  <table class="table table-hover" width="100%"  cellspacing="0">
                                                              <thead id="theaddetailkepala">
                                                                  <tr height="20px">
                                                                     
                                                                      <th>Nama Produk</th>
                                                                      <th>Tipe Produk</th>
                                                                      <th>Brand</th>
                                                                      <th>Etalase</th>
                                                                      <th>Kondisi</th>
                                                                      <th>Harga</th>
                                                                      <th>Jumlah</th>
                                                                      <th><?php echo $this->lang->line('pengaturan'); ?></th>
                                                                    
                                                                  </tr>
                                                              </thead>
                                                              <tbody id="tabledetailproduk"></tbody>
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
                                                                            <input type="hidden" readonly name="iddetail" id="iddetail" value="0" class="form-control">
                                                                          <input type="text" readonly name="tipeproduk" id="tipeproduk" class="form-control">
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
                                                                          <input type="text" style="text-align: right;" name="jumlah" onblur="onblurfunctionadddetailkepala()"  id="jumlahproduk" class="inputkepala form-control">
                                                                        </td> 

                                                                        <td style="display: none">
                                                                          <!--  <button type="submit" id="tombol-simpan" class="btn btn-info"><?php echo $this->lang->line('save'); ?></button>  -->
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
                                  </div>
                                </div>
                                
                                <br><br>
                                <div id="gambar" >
                                  <h5> Format gambar .jpg .jpeg .png dan untuk ukuran size maksimal 10 MB</h5>
                                  <div class="row">
                                     <div class="col-md-2" style="margin-right: 56px;">
                                          <div class="drop-zone">
                                            <span class="drop-zone__prompt"><?php echo $this->lang->line('picture'); ?> 1</span>
                                            <input type="file" name="gambar1" class="drop-zone__input">
                                          </div>
                                      </div>

                                    <div class="col-md-2" style="margin-right: 56px;">
                                          <div class="drop-zone">
                                            <span class="drop-zone__prompt"><?php echo $this->lang->line('picture'); ?> 2</span>
                                            <input type="file" name="gambar2" class="drop-zone__input">
                                          </div>
                                      </div>

                                    <div class="col-md-2" style="margin-right: 56px;">
                                          <div class="drop-zone">
                                            <span class="drop-zone__prompt"><?php echo $this->lang->line('picture'); ?> 3</span>
                                            <input type="file" name="gambar3" class="drop-zone__input">
                                          </div>
                                      </div>
                                      <div class="col-md-2" style="margin-right: 56px;">
                                          <div class="drop-zone">
                                            <span class="drop-zone__prompt"><?php echo $this->lang->line('picture'); ?> 4</span>
                                            <input type="file" name="gambar4" class="drop-zone__input">
                                          </div>
                                      </div>
                                       <div class="col-md-2" style="margin-right: 56px;">
                                          <div class="drop-zone">
                                            <span class="drop-zone__prompt"><?php echo $this->lang->line('picture'); ?> 5</span>
                                            <input type="file" name="gambar5" class="drop-zone__input">
                                          </div>
                                      </div>
                                  </div><br>
                                   <h5> Format video .mp4 .mkv .afi .mpg dan untuk size video maksimal 10 MB</h5>
                                   <div class="row">
                                   <div class="col-md-2" style="margin-right: 56px;">
                                          <div class="drop-zone">
                                            <span class="drop-zone__prompt">Video 1</span>
                                            <input type="file" name="video1" class="drop-zone__input">
                                          </div>
                                      </div>
                                   <div class="col-md-2" style="margin-right: 56px;">
                                          <div class="drop-zone">
                                            <span class="drop-zone__prompt">Video 2</span>
                                            <input type="file" name="video2" class="drop-zone__input">
                                          </div>
                                      </div>
                                     <div class="col-md-2" style="margin-right: 56px;">
                                          <div class="drop-zone">
                                            <span class="drop-zone__prompt">Video 3</span>
                                            <input type="file" name="video3" class="drop-zone__input">
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-12" style="text-align: right;">
                                   <button type="submit" class="btn btn-info">Simpan Detail Design</button>
                                </div>

                                </div>
                                
                               
           
                  
                </div>
                </div>
                
        </div>

          </div>

      </div><br>
       <button type="submit" class="btn btn-info"><?php echo $this->lang->line('change'); ?></button> <a href="#" id="btncancel"    class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>
                </div>
            </div>

        </div>

    </div>

    </form>
    
       
      </div> 
    <br>
    <br>

<script type="text/javascript">  
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('priceheadsetting').value = settingHead[id].price;
};
</script>
<script type="text/javascript">  
<?php echo $arrayongkoslainnya; ?>
function getdataongkoslainnya(id){
document.getElementById('hargaongkoslainnya').value = dataongkoslainnya[id].price;
updateongkos()
};
</script>