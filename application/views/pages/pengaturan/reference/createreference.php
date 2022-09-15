<div class="content">
  <div class="container-fluid">
   <br>
    
      <?= $this->session->flashdata('message');?>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Form Reference</h4>
          </div>
          <div class="card-body">
            <div class="card" >
               <div class="card-header">
                  <h5>Data Reference Part</h5>
                </div>
              <!-- /.card-header -->
               <div class="card-body">

                            <div class="table-responsive">
                                <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;"  id="dataTable" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                        <tr height="20px">
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Reference Part</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Part Option</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%">01</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Jumlah digit</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Auto Increment Number</td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%">02</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">-/\#|</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Separator</td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%">03</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">MM/MMM/XXXX</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Bulan</td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%">04</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">YY/YYYY</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Tahun</td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;"  width="7%">05</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">XXXXXXX</td>
                                          <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%">Text</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div><br>

            <form action="<?php echo base_url() . 'tambahreference'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
              <div class="row">
                <div class="col-md-3">
                    <h5>Pilih Menu</h5>

                    <select required name="menu" id="menu" class="form-control">
                      <option value="">== Menu ==</option>
                      <option value="35">Cash Bank</option>
                      <option value="36">2D Design</option>
                      <option value="49">Order/SPK</option>
                      <!-- <?php foreach ($menu as $data) { ?>
                        <option value="<?=$data->id?>"><?=$data->menu?></option>
                      <?php } ?> -->
                    </select>
                    <input style="padding-bottom: 10px;" type="hidden" name="idheader"   value="<?=$idheaderreference?>"  class="form-control">
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-3">
                  <input style="padding-bottom: 10px;" type="hidden" name="refnumber1" id="refnumber1" value="1"  class="form-control">
                  <div class="form-group">
                    <select name="referencenumber_1" id="referencenumber_1" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                    <!-- <input style="padding-bottom: 10px;" type="text" name="referencenumber_1" id="referencenumber_1" class="form-control"> -->
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart1_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart1" id="referencepart1"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number1" onkeyup="jumlahdigit()" placeholder="Masukkan jumlah digit" id="referencepart_number1"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator1" id="referencepart_separator1" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>

                      <!-- Reference Bulan -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_bulan1" id="referencepart_bulan1" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun1" id="referencepart_tahun1" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select> 
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text1" id="referencepart_text1"   class="form-control">
                  </div>
                </div>
               
                <!-- Hasil ReferencePart Pertama -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;"   readonly type="hidden" name="referencepart_1" id="referencepart_1" class="form-control">
                    
                    <input style="padding-bottom: 10px;" placeholder="Hasil Generate" readonly type="text"   name="hasil" id="hasil" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber2" id="refnumber2" value="2"  class="form-control">
                    <select name="referencenumber_2" id="referencenumber_2"  class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                    <!-- <input style="padding-bottom: 10px;" type="text" name="referencenumber_1" id="referencenumber_1" class="form-control"> -->
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart2_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart2" id="referencepart2"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number2" onkeyup="jumlahdigit2()" placeholder="Masukkan jumlah digit" id="referencepart_number2"   class="form-control">
                      <input style="padding-bottom: 10px;  text-align: right;" type="hidden" name="referencepart_number2"  id="referencepartview_number2"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator2" id="referencepart_separator2" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                     <select style="padding-bottom: 10px;display: none" name="referencepart_bulan2" id="referencepart_bulan2" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun2" id="referencepart_tahun2" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select> 
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text2" id="referencepart_text2"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Kedua -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;"   readonly type="hidden" name="referencepart_2" id="referencepart_2" class="form-control">
                  </div>
                </div>
              </div>

               <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber3" id="refnumber3" value="3"  class="form-control">
                    <select name="referencenumber_3" id="referencenumber_3" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                    <!-- <input style="padding-bottom: 10px;" type="text" name="referencenumber_1" id="referencenumber_1" class="form-control"> -->
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart3_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart3" id="referencepart3"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number3" onkeyup="jumlahdigit3()" placeholder="Masukkan jumlah digit" id="referencepart_number3"   class="form-control">
                      <input style="padding-bottom: 10px;  text-align: right;" type="hidden" name="referencepart_number3"  id="referencepartview_number3"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator3" id="referencepart_separator3" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_bulan3" id="referencepart_bulan3" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun3" id="referencepart_tahun3" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select>
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text3" id="referencepart_text3"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Ketiga -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;" placeholder="Hasil" readonly type="hidden" name="referencepart_3" id="referencepart_3" class="form-control">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber4" id="refnumber4" value="4"  class="form-control">
                    <select name="referencenumber_4" id="referencenumber_4" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart4_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart4" id="referencepart4"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number4" onkeyup="jumlahdigit4()" placeholder="Masukkan jumlah digit" id="referencepart_number4"   class="form-control">
                      <input style="padding-bottom: 10px;  text-align: right;" type="hidden" name="referencepart_number4"  id="referencepartview_number4"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator4" id="referencepart_separator4" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                     <select style="padding-bottom: 10px;display: none" name="referencepart_bulan4" id="referencepart_bulan4" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun4" id="referencepart_tahun4" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select>
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text4" id="referencepart_text4"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Keempat -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;" placeholder="Hasil" readonly type="hidden" name="referencepart_4" id="referencepart_4" class="form-control">
                  </div>
                </div>
            </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber5" id="refnumber5" value="5"  class="form-control">
                    <select name="referencenumber_5" id="referencenumber_5" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                     </div>
                  </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart5_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart5" id="referencepart5"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number5" onkeyup="jumlahdigit5()" placeholder="Masukkan jumlah digit" id="referencepart_number5"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator5" id="referencepart_separator5" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                     <select style="padding-bottom: 10px;display: none" name="referencepart_bulan5" id="referencepart_bulan5" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun5" id="referencepart_tahun5" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select>
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text5" id="referencepart_text5"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Kelima -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;" placeholder="Hasil" readonly type="hidden" name="referencepart_5" id="referencepart_5" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber6" id="refnumber6" value="6"  class="form-control">
                    <select name="referencenumber_6" id="referencenumber_6" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                     </div>
                  </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart6_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart6" id="referencepart6"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number6" onkeyup="jumlahdigit6()" placeholder="Masukkan jumlah digit" id="referencepart_number6"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator6" id="referencepart_separator6" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_bulan6" id="referencepart_bulan6" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun6" id="referencepart_tahun6" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select>
                      <input style="padding-bottom: 10px;display: none " type="text" name="referencepart_tahunview6" id="referencepart_tahunview6"  class="form-control">
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text6" id="referencepart_text6"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Keenam -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;" placeholder="Hasil" readonly type="hidden" name="referencepart_6" id="referencepart_6" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber7" id="refnumber7" value="7"  class="form-control">
                    <select name="referencenumber_7" id="referencenumber_7" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                     </div>
                  </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart7_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart7" id="referencepart7"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number7" onkeyup="jumlahdigit7()" placeholder="Masukkan jumlah digit" id="referencepart_number7"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator7" id="referencepart_separator7" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_bulan7" id="referencepart_bulan7" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun7" id="referencepart_tahun7" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select>
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text7" id="referencepart_text7"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Ketujuh -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;" placeholder="Hasil" readonly type="hidden" name="referencepart_7" id="referencepart_7" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber8" id="refnumber8" value="8"  class="form-control">
                    <select name="referencenumber_8" id="referencenumber_8" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                     </div>
                  </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart8_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart8" id="referencepart8"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number8" onkeyup="jumlahdigit8()" placeholder="Masukkan jumlah digit" id="referencepart_number8"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator8" id="referencepart_separator8" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_bulan8" id="referencepart_bulan8" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun8" id="referencepart_tahun8" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select>
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text8" id="referencepart_text8"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Kedelapan -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;" placeholder="Hasil" readonly type="hidden" name="referencepart_8" id="referencepart_8" class="form-control">
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber9" id="refnumber9" value="9"  class="form-control">
                    <select name="referencenumber_9" id="referencenumber_9" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                     </div>
                  </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart9_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart9" id="referencepart9"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number9" onkeyup="jumlahdigit9()" placeholder="Masukkan jumlah digit" id="referencepart_number9"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator9" id="referencepart_separator9" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_bulan9" id="referencepart_bulan9" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun9" id="referencepart_tahun9" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select>
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text9" id="referencepart_text9"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Kesembilan -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;" placeholder="Hasil" readonly type="hidden" name="referencepart_9" id="referencepart_9" class="form-control">
                  </div>
                </div>
              </div>  
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <input style="padding-bottom: 10px;" type="hidden" name="refnumber10" id="refnumber10" value="10"  class="form-control">
                    <select name="referencenumber_10" id="referencenumber_10" class="form-control">
                      <option value="">== Pilih Reference Part ==</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                    </select>
                     </div>
                  </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <div id="referencepart10_view">
                       <input style="padding-bottom: 10px;" type="text" name="referencepart10" id="referencepart10"  class="form-control">
                    </div>
                      <input style="padding-bottom: 10px;display: none;text-align: right;" type="number" name="referencepart_number10" onkeyup="jumlahdigit10()" placeholder="Masukkan jumlah digit" id="referencepart_number10"   class="form-control">

                      <!-- Reference Separator -->
                      <select style="padding-bottom: 10px;display: none" name="referencepart_separator10" id="referencepart_separator10" class="form-control">
                         <option value="">== Pilih Option Part ==</option>
                         <option value="-">-</option>
                         <option value="/">/</option>
                         <option value="\">\</option>
                         <option value="#">#</option>
                         <option value="|">|</option>
                      </select>
                      <!-- Reference Bulan -->
                       <select style="padding-bottom: 10px;display: none" name="referencepart_bulan10" id="referencepart_bulan10" class="form-control">
                         <option value="">== Pilih Format Bulan ==</option>
                         <option value="MM">MM</option>
                         <option value="MMM">MMM</option>
                         <option value="XXXX">XXXX</option>
                      </select>
                     
                      <!-- Reference Tahun --> 
                      <select style="padding-bottom: 10px;display: none" name="referencepart_tahun10" id="referencepart_tahun10" class="form-control">
                         <option value="">== Pilih Format Tahun ==</option>
                         <option value="YY">YY</option>
                         <option value="YYYY">YYYY</option>
                      </select>
                      
                      <!-- Reference Text -->
                      <input style="padding-bottom: 10px;display: none" type="text" placeholder="Masukkan Text" name="referencepart_text10" id="referencepart_text10"   class="form-control">
                  </div>
                </div>
                  <!-- Hasil ReferencePart Kesepuluh -->
                <div class="col-md-3">
                  <div class="form-group">
                    <input style="padding-bottom: 10px;" placeholder="Hasil" readonly type="hidden" name="referencepart_10" id="referencepart_10" class="form-control">
                  </div>
                </div>
              </div>  
              <div class="row">
                 <div class="col-md-6">
            <a href="#" id="generatebutton"  class="btn btn-info">Generate Reference</a>  
            </div>
            <div class="col-md-6" style="text-align: right" >
              
             <button type="submit"   id="savebutton" class="btn btn-info"><?php echo $this->lang->line('save'); ?> Reference</button>  <a href="<?= base_url('pengaturan'); ?>" class="btn btn-danger"><?php echo $this->lang->line('cancel'); ?></a>
            </div>
              </div>
           

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div><br>
