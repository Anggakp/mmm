<div class="content">
  <div class="container-fluid">
     <form action="<?php echo base_url() . 'tambahdataspk'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
    <div class="row">
        <div class="col-md-12"> 
         <h3>Order/SPK</h3> 
    <!--          
      <div class="row">
                <form action="<?php echo base_url() . 'pembelian'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                </form> 
      </div> -->
      <div class="row">
            <div class="col-md-12">
              <div class="shadow card">
                  <div class="col-md-3">
                           <h4 style="margin-top: 10px;margin-bottom: 0px;padding-bottom: 0px;margin-left: 7px;">Header Order</h4>
                  </div>
                  <div class="card-body"> 

                            <div class="row">
                              
                                <input style="padding-bottom: 10px;" type="hidden" name="id" class="form-control">
                                <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"><?php echo $this->lang->line('number'); ?></label>
                                            <input style="padding-bottom: 10px;width: 280px;" type="text" required name="nomor" class="form-control" readonly value="<?php if ($cek1->num_rows()<1) {}else{ ?><?=$number1['hasil_part']?><?php } ?><?php if ($cek2->num_rows()<1) {}else{ ?><?=$number2['hasil_part']?><?php } ?><?php if ($cek3->num_rows()<1) {}else{ ?><?=$number3['hasil_part']?><?php } ?><?php if ($cek4->num_rows()<1) {}else{ ?><?=$number4['hasil_part']?><?php } ?><?php if ($cek5->num_rows()<1) {}else{ ?><?=$number5['hasil_part']?><?php } ?><?php if ($cek6->num_rows()<1) {}else{ ?><?=$number6['hasil_part']?><?php } ?><?php if ($cek7->num_rows()<1) {}else{ ?><?=$number7['hasil_part']?><?php } ?><?php if ($cek8->num_rows()<1) {}else{ ?><?=$number8['hasil_part']?><?php }?><?php if ($cek9->num_rows()<1) {}else{ ?>number9['hasil_part']?><?php } ?><?php if ($cek10->num_rows()<1) {}else{ ?><?=$number10['hasil_part']?> <?php } ?>"> 
                                           <input style="padding-bottom: 10px;width: 230px;" type="hidden" required name="nomor_" class="form-control" readonly value="<?php if ($cek1->num_rows()<1) {}else{ ?><?=$number1['hasil_part']?><?php } ?>">
                                           <input style="padding-bottom: 10px;width: 230px;" type="hidden" required name="nomor_update" class="form-control" readonly value="<?=$nomorspk?>">
                                           <input style="padding-bottom: 10px;" type="hidden" name="id_header" class="form-control" readonly value="<?=$id_header?>">
                                           <input style="padding-bottom: 10px;" type="hidden" name="id_spkheader[]" class="form-control" readonly value="<?=$id_header?>">
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"><?php echo $this->lang->line('transactiondate'); ?></label>
                                          <input style="padding-bottom: 10px;" value="<?php echo date('Y-m-d'); ?>" type="date" value="<?= set_value('tanggaltransaksi') ?>"  name="tanggaltransaksi" id="tanggaltransaksi"  class="form-control"   >
                                          <?= form_error('tanggaltransaksi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"><?php echo $this->lang->line('deadline'); ?></label>
                                          <input style="padding-bottom: 10px;"  type="date" value="<?= set_value('tanggaltransaksi') ?>"  name="tanggalselesai" id="tanggalselesai"  class="form-control"   >
                                          <?= form_error('tanggalselesai', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                </div>
                                
                                
                              </div>
                              <div class="row"> 
                                 <div class="col-md-3">
                                        <div  class="form-group">
                                          <label class="bmd-label-floating"><?php echo $this->lang->line('typespk'); ?></label>
                                          <select style="padding-bottom: 10px;" id="typeclient" name="tipespk" class="form-control" required>
                                          <option value="New Design">New Order</option>
                                          <option value="Client Order">Repeat Order</option>
                                        </select>
                                        </div>
                                </div>
                               <div id="client"  class="col-md-3">
                                    
                                 <label  class="bmd-label-floating"><?php echo $this->lang->line('clientname'); ?></label>
                                  <div class="input-group">
                                   <input style="padding-bottom: 10px;width: 160px;" id="idclient" value="<?= set_value('idclient') ?>"   type="hidden" name="idclient" class="form-control" readonly>
                                    <input style="padding-bottom: 10px;" type="text" id="namaklien" value="<?= set_value('namaclient') ?>" name="namaclient" class="form-control" >
                                    <span class="input-group-btn">
                                      <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modalclient"><?php echo $this->lang->line('search'); ?></button>
                                    </span> 
                                   </div>
                                </div>
                                <div class="col-md-3">
                                        <label>Nomor Design<small class="text-danger">*</small></label>
                                      <div class="input-group">
                                        <input style="padding-bottom: 10px;max-width: 400px;" type="text" id="nomor" name="nomor" class="form-control" value="<?= set_value('nomor') ?>">
                                        <input style="padding-bottom: 10px;max-width: 400px;" type="hidden" id="iddetail" name="iddetail" class="form-control" value="<?= set_value('iddetail') ?>">
                                      <!--    
                                        <input style="padding-bottom: 10px;max-width: 100px; margin-left: 5px;" type="text" readonly name="submodel" class="form-control" id="submodel" value="<?= set_value('submodel') ?>" > -->
                                         <span class="input-group-btn">
                                            <button style="margin-left: 3px;" type="button" class="btn btn-success btn-flat" data-toggle="modal" required data-target="#modal2ddesign"><?php echo $this->lang->line('search'); ?></button>
                                         </span> 
                                       </div>
                                        <?= form_error('nomor', '<small class="text-danger" style="margin-left:5px;font-size:15px;">', '</small>'); ?>
                                </div>
                                <div class="col-md-3">

                                        <div class="form-group">
                                          <label class="bmd-label-floating">Jumlah</label>
                                          <input style="padding-bottom: 10px;max-width: 120px;text-align: right" type="number" value="<?= set_value('jumlah') ?>"  name="jumlah" id="jumlah"  class="form-control">
                                        </div>
                                </div>
                              </div>
                            
                              <div class="row">
                                 <div class="col-md-12">
                                 <div class="form-group">
                                     <label class="bmd-label-floating">Memo</label>
                                      <textarea id="summernote" name="memo" class="form-control" >
                                        <?= set_value('memo') ?>
                                      </textarea>
                                     <!-- <input style="padding-bottom: 10px; height: 55px;" value="" type="text" name="memo" class="form-control" > -->
                                  </div>
                              </div>
                             
                              </div>
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
                           <h4 style="margin-top: 10px;margin-bottom: 0px;padding-bottom: 0px;margin-left: 7px;">Detail Order</h4>
                </div>
               
              </div>
                <!-- <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                <table class="table table-hover" width="100%"  cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                           
                                            <th>No</th>
                                            <th>Model</th>
                                            <th >Keterangan</th>
                                            <th><?php echo $this->lang->line('pengaturan'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $no=1;
                                        foreach($detaildesain as $data){
                                       
                                        ?>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="5%"><?php echo $no ?></td>
                                          <td><img src="<?= base_url('assets/file/2ddesain/'). $data->gambar1?>" style="width: 200px;height: 100px;"> <br> Model : <?php echo $data->model?><br> Sub Model : <?php echo $data->submodel?> </td>
                                           <td style="width: 40%;">Tipe Design : <?php echo $data->tipedesign?> | Warna Produk : <?php echo $data->warnaproduk?> <br> Material : <?php echo $data->material?> | Berat Material : <?php echo $data->beratmaterial?> <?php echo $data->satuan?> <br> Konsep Kepala : <?=$data->konsepkepala?> | Finishing : <?=$data->finishing?> | Ongkos : <?=$data->ongkos?> <br> Gender : <?=$data->gender?> <br> Ukuran : <?=$data->ukuran?></td>
                                          <td>
                                         
                                          <a href="<?= base_url('detaildesain/' . $data->id_detail); ?>" class="btn btn-sm btn-secondary" role="button" title="<?php echo $this->lang->line('change'); ?>"><i class="fas fa-fw fa-search"></i> Detail Data</a>
                                        
                                           <a href="#" data-toggle="modal" data-target="#ModalEditdetaildesain" id="<?=$data->id_detail?>|"    class="editdetaildesain btn btn-sm btn-success" role="button" title="<?php echo $this->lang->line('change'); ?>">  <i class="fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                          <a href="#" data-toggle="modal" data-target="#ModalHapusdetaildesain" id="<?=$data->id_detail?>|<?=$data->id_header?>|<?=$data->gambar1?>|<?=$data->gambar2?>|<?=$data->gambar3?>|<?=$data->gambar4?>|<?=$data->gambar5?>|<?=$data->video1?>|<?=$data->video2?>|<?=$data->video3?>"    class="hapusdetaildesain btn btn-sm btn-danger" role="button" title="<?php echo $this->lang->line('delete'); ?>">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a></td>
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
                </div> -->

                  <div  id="detaildesign">

                 
                                </div><br><br>
                            
                                 <!-- <div class="row">
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
                                                                        <td style="width: 150px">
                                                                          <input type="number" step="any" style="text-align: right;" name="jumlah" required  id="jumlah" class="form-control">
                                                                           <input type="hidden"   style="text-align: right;" name="status" required  id="status" class="form-control">
                                                                        </td>
                                                                        <td style="width: 150px">
                                                                          <input type="number" step="any" style="text-align: right;" name="berat" required  onblur="onblurfunctionaddsubdetail()" id="berat" class="form-control">
                                                                        </td>
                                                                        <td >
                                                                           <button style="display: none" type="submit" id="tombol-simpan" class="btn btn-info"><?php echo $this->lang->line('save'); ?></button> 
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
                                                                          <input type="text" style="text-align: right;" name="jumlah" onblur="onblurfunctionadddetailkepala()"  id="jumlahproduk" class="form-control">
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
                                </div> -->
                                <br>
                               <!--  <div class="row">
                                  <div class="col-md-12" style="text-align: right;">
                                   <button type="submit" class="btn btn-info">Simpan Detail Design</button>
                                </div>

                                </div> -->  
                </div>
                </div>
                
        </div>

          </div>

      </div><br>
       <button type="submit" class="btn btn-info"><?php echo $this->lang->line('save'); ?></button> <a href="<?= base_url('listspk'); ?>" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>
                </div>
            </div> 
    </form>
    
       
      </div> 
    <br>
    <br>

 
