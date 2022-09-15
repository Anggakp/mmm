

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js')?>"></script>

   
 <script src="<?= base_url('assets/vendor/select2/js/select2.full.min.js')?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
  <!-- jQuery UI -->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/script.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.zoom.js"></script>

    <script src="<?= base_url('assets/js/demo/datatables-demo.js')?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/vendor/summernote/summernote-bs4.min.js')?>"></script>
    <script src="<?= base_url('assets/vendor/ekko-lightbox/ekko-lightbox.min.js')?>"></script>
    <script>
    $(document).ready(function(){
      $('.ex1').zoom(); 
    });
  </script>
    <script>
      $(function () {
        // Summernote
        $('#summernote').summernote()
      })
    </script>
    <script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    }); 
  })
</script>
    <script>
          <?php if ($this->session->flashdata('success')) {?>
          var isi = <?php echo json_encode($this->session->flashdata('success')) ?>
          
          Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: isi
          })
          <?php } ?>
          <?php if ($this->session->flashdata('error')) {?>
          var isi = <?php echo json_encode($this->session->flashdata('error')) ?>
          
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: isi
          })
          <?php } ?>
          <?php if ($this->session->flashdata('warning')) {?>
          var isi = <?php echo json_encode($this->session->flashdata('warning')) ?>
          
          Swal.fire({
              icon: 'warning',
              title: 'Gagal',
              text: isi
          })
          <?php } ?>
    </script>
        
        
        <script>
        $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
   

  })
    </script>
    
     <script>
       if ($('#hasil').val() == "") {
             $("#generatebutton").show();
            $("#savebutton").hide();
          } if ($('#hasil').val() != "") {
             $("#generatebutton").hide();
            $("#savebutton").show();
          }

      var generatebutton = document.getElementById("generatebutton");

      generatebutton.addEventListener('click', function(e){
        e.preventDefault();
        var hasil1 = $('#referencepart_1').val()
        var hasil2 = $('#referencepart_2').val()
        var hasil3 = $('#referencepart_3').val()
        var hasil4 = $('#referencepart_4').val()
        var hasil5 = $('#referencepart_5').val()
        var hasil6 = $('#referencepart_6').val()
        var hasil7 = $('#referencepart_7').val()
        var hasil8 = $('#referencepart_8').val()
        var hasil9 = $('#referencepart_9').val()
        var hasil10 = $('#referencepart_10').val()
        
        var hasilakhir = hasil1+hasil2+hasil3+hasil4+hasil5+hasil6+hasil7+hasil8+hasil9+hasil10;
       $('#hasil').val(hasilakhir);
          if ($('#hasil').val() == "") {
             $("#generatebutton").show();
            $("#savebutton").hide();
          }else if ($('#hasil').val() != "") {
             $("#generatebutton").show();
            $("#savebutton").show();
          }
       
      });

     
    </script>

    <script> 
      //REFERENCEPART YANG PERTAMA
      const referencen1 = document.getElementById('referencenumber_1');
      const referecepartnumber1 = document.getElementById('referencepart_number1');
      const referencepartseparator1 = document.getElementById('referencepart_separator1');
      const referencepartbulan1 = document.getElementById('referencepart_bulan1');
      const refereceparttahun1 = document.getElementById('referencepart_tahun1');
      const refereceparttext1 = document.getElementById('referencepart_text1');

      referencen1.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
           var ref_number1 = $("#refnumber1").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart1",
              type: 'post',
              data: {
                menu:menu,
               refnumber1:ref_number1
              },
              success: function() {

              }
              
            });
          $("#referencepart1_view").show();
          $("#referencepart_1").val("");
          $("#referencepart_number1").hide();
          $("#referencepart_separator1").hide();
          $("#referencepart_bulan1").hide();
          $("#referencepart_tahun1").hide();
          $("#referencepart_text1").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart1_view").hide();
          $("#referencepart_number1").show();
          $("#referencepart_separator1").hide();
          $("#referencepart_bulan1").hide();
          $("#referencepart_tahun1").hide();
          $("#referencepart_text1").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart1_view").hide();
          $("#referencepart_number1").hide();
          $("#referencepart_separator1").show();
          $("#referencepart_bulan1").hide();
          $("#referencepart_tahun1").hide();
          $("#referencepart_text1").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart1_view").hide();
          $("#referencepart_number1").hide();
          $("#referencepart_separator1").hide();
          $("#referencepart_bulan1").show();
          $("#referencepart_tahun1").hide();
          $("#referencepart_text1").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart1_view").hide();
          $("#referencepart_number1").hide();
          $("#referencepart_separator1").hide();
          $("#referencepart_bulan1").hide();
          $("#referencepart_tahun1").show();
          $("#referencepart_text1").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart1_view").hide();
          $("#referencepart_number1").hide();
          $("#referencepart_separator1").hide();
          $("#referencepart_bulan1").hide();
          $("#referencepart_tahun1").hide();
          $("#referencepart_text1").show();
        }
      });
      function jumlahdigit(){ 
          if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Ajax/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber1.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_1').val(val.tampil); 
                  });
              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Ajax/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber1.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_1').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "49"){
            $.ajax({
              url: "<?=base_url()?>Ajax/get_autonumberingspk",
              type: 'post',
              data: {
               search:referecepartnumber1.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_1').val(val.tampil); 
                  });
                  

              }
              
            });
          }
          
      }
      referencepart_separator1.addEventListener('change', function handleChange(event) {
             $('#referencepart_1').val(referencepart_separator1.value); 
      });
      referencepartbulan1.addEventListener('blur', (event) => {
       
       const monthtwodigit = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan1").val() == "MM") {
          let twodigit = new Date();

          $("#referencepart_1").val(monthtwodigit.format(twodigit))

      }else if($("#referencepart_bulan1").val() == "MMM"){
          let threedigit = new Date();
        $("#referencepart_1").val(monththreedigit.format(threedigit)); 
      }else if($("#referencepart_bulan1").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_1").val(bulan); 
      }
      });


      refereceparttahun1.addEventListener('blur', (event) => {
       const yearfourdigit = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun1").val() == "YYYY") {
          let fourdigit = new Date();

          $("#referencepart_1").val(yearfourdigit.format(fourdigit))

      }else if($("#referencepart_tahun1").val() == "YY"){
          let ytwodigit = new Date();
        $("#referencepart_1").val(yeartwodigit.format(ytwodigit)); 
      }
      });
       refereceparttext1.addEventListener('blur', (event) => {
          $('#referencepart_1').val(refereceparttext1.value); 
       });

       referecepartnumber1.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_1").val();
          var ref_number = $("#refnumber1").val();
          var ref_option = $("#referencepart_number1").val(); 
          var hasil_part = $("#referencepart_1").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference1",
            type: 'post',
            data: {
              menu: menu,
              referencepart_1: hasil_part,
              refnumber1: ref_number,
              referencepart_number1: ref_option,
              referencenumber_1: ref_part,
            },

            success: function(){
               
            }
        });
      });
      referencepart_separator1.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_1").val();
          var ref_number = $("#refnumber1").val();
          var ref_option = $("#referencepart_separator1").val(); 
          var hasil_part = $("#referencepart_1").val();
          console.log(hasil_part)
           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference1",
            type: 'post',
            data: {
              menu: menu,
              referencepart_1: hasil_part,
              refnumber1: ref_number,
              referencepart_separator1: ref_option,
              referencenumber_1: ref_part,
            },

            success: function(){
             
            }
        });
      });
      referencepartbulan1.addEventListener('blur', (event) => {
         var menu = $("#menu").val();
          var ref_part = $("#referencenumber_1").val();
          var ref_number = $("#refnumber1").val();
          var ref_option = $("#referencepart_bulan1").val(); 
          var hasil_part = $("#referencepart_1").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference1",
            type: 'post',
            data: {
              menu: menu,
              referencepart_1: hasil_part,
              refnumber1: ref_number,
              referencepart_bulan1: ref_option,
              referencenumber_1: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun1.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_1").val();
          var ref_number = $("#refnumber1").val();
          var ref_option = $("#referencepart_tahun1").val(); 
          var hasil_part = $("#referencepart_1").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference1",
            type: 'post',
            data: {
              menu: menu,
              referencepart_1: hasil_part,
              refnumber1: ref_number,
              referencepart_tahun1: ref_option,
              referencenumber_1: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext1.addEventListener('blur', (event) => {
         var menu = $("#menu").val();
          var ref_part = $("#referencenumber_1").val();
          var ref_number = $("#refnumber1").val();
          var ref_option = $("#referencepart_text1").val(); 
          var hasil_part = $("#referencepart_1").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference1",
            type: 'post',
            data: {
               menu: menu,
              referencepart_1: hasil_part,
              refnumber1: ref_number,
              referencepart_text1: ref_option,
              referencenumber_1: ref_part,
            },

            success: function(){
              
            }
        });
      });


      //REFERENCEPART YANG KEDUA

      const referencen2 = document.getElementById('referencenumber_2');
      const referecepartnumber2 = document.getElementById('referencepart_number2');
      const referencepartbulan2 = document.getElementById('referencepart_bulan2');
      const refereceparttahun2 = document.getElementById('referencepart_tahun2');
      const refereceparttext2 = document.getElementById('referencepart_text2');
      const referencepartseparator2 = document.getElementById('referencepart_separator2');

      referencen2.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
           var ref_number2 = $("#refnumber2").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart2",
              type: 'post',
              data: {
                menu:menu,
               refnumber2:ref_number2
              },
              success: function() {

              }
              
            });
          $("#referencepart_2").val("");
          $("#referencepart2_view").show();
          $("#referencepart_number2").hide();
          $("#referencepart_separator2").hide();
          $("#referencepart_bulan2").hide();
          $("#referencepart_tahun2").hide();
          $("#referencepart_text2").hide();
        }
        if (event.target.value == "") { 
          $("#referencepart2_view").show();
          $("#referencepart_number2").hide();
          $("#referencepart_separator2").hide();
          $("#referencepart_bulan2").hide();
          $("#referencepart_tahun2").hide();
          $("#referencepart_text2").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart2_view").hide();
          $("#referencepart_number2").show();
          $("#referencepart_separator2").hide();
          $("#referencepart_bulan2").hide();
          $("#referencepart_tahun2").hide();
          $("#referencepart_text2").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart2_view").hide();
          $("#referencepart_number2").hide();
          $("#referencepart_separator2").show();
          $("#referencepart_bulan2").hide();
          $("#referencepart_tahun2").hide();
          $("#referencepart_text2").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart2_view").hide();
          $("#referencepart_number2").hide();
          $("#referencepart_separator2").hide();
          $("#referencepart_bulan2").show();
          $("#referencepart_tahun2").hide();
          $("#referencepart_text2").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart2_view").hide();
          $("#referencepart_number2").hide();
          $("#referencepart_separator2").hide();
          $("#referencepart_bulan2").hide();
          $("#referencepart_tahun2").show();
          $("#referencepart_text2").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart2_view").hide();
          $("#referencepart_number2").hide();
          $("#referencepart_separator2").hide();
          $("#referencepart_bulan2").hide();
          $("#referencepart_tahun2").hide();
          $("#referencepart_text2").show();
        }
      });
      function jumlahdigit2(){ 
          if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber2.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_2').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber2.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_2').val(val.tampil); 
                  });
                  

              }
              
            });
          }
          
      } 
      referencepart_separator2.addEventListener('change', function handleChange(event) {

      $('#referencepart_2').val(referencepart_separator2.value); 
      });
      referencepartbulan2.addEventListener('blur', (event) => {
       
       const monthtwodigit_2 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_2 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan2").val() == "MM") {
          let twodigit_2 = new Date();

          $("#referencepart_2").val(monthtwodigit_2.format(twodigit_2))

      }else if($("#referencepart_bulan2").val() == "MMM"){
          let threedigit_2 = new Date();
        $("#referencepart_2").val(monththreedigit_2.format(threedigit_2)); 
      }else if($("#referencepart_bulan2").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_2").val(bulan); 
      }
      });


      refereceparttahun2.addEventListener('blur', (event) => {
       const yearfourdigit_2 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_2 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun2").val() == "YYYY") {
          let fourdigit_2 = new Date();

          $("#referencepart_2").val(yearfourdigit_2.format(fourdigit_2))

      }else if($("#referencepart_tahun2").val() == "YY"){
          let ytwodigit_2 = new Date();
        $("#referencepart_2").val(yeartwodigit_2.format(ytwodigit_2)); 
      }
      });

      refereceparttext2.addEventListener('blur', (event) => {
         $('#referencepart_2').val(refereceparttext2.value); 
      });
      
      referecepartnumber2.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_2").val();
          var ref_number = $("#refnumber2").val();
          var ref_option = $("#referencepart_number2").val(); 
          var hasil_part = $("#referencepart_2").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference2",
            type: 'post',
            data: {
              menu:menu,
              referencepart_2: hasil_part,
              refnumber2: ref_number,
              referencepart_number2: ref_option,
              referencenumber_2: ref_part,
            },

            success: function(){
              
            }
        });
      });
      referencepart_separator2.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_2").val();
          var ref_number = $("#refnumber2").val();
          var ref_option = $("#referencepart_separator2").val(); 
          var hasil_part = $("#referencepart_2").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference2",
            type: 'post',
            data: {
              menu:menu,
              referencepart_2: hasil_part,
              refnumber2: ref_number,
              referencepart_separator2: ref_option,
              referencenumber_2: ref_part,
            },

            success: function(){
             
            }
        });
      });
      referencepartbulan2.addEventListener('blur', (event) => {
         var menu = $("#menu").val();
          var ref_part = $("#referencenumber_2").val();
          var ref_number = $("#refnumber2").val();
          var ref_option = $("#referencepart_bulan2").val(); 
          var hasil_part = $("#referencepart_2").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference2",
            type: 'post',
            data: {
              menu:menu,
              referencepart_2: hasil_part,
              refnumber2: ref_number,
              referencepart_bulan2: ref_option,
              referencenumber_2: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun2.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_2").val();
          var ref_number = $("#refnumber2").val();
          var ref_option = $("#referencepart_tahun2").val();  
          var hasil_part = $("#referencepart_2").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference2",
            type: 'post',
            data: {
              menu:menu,
              referencepart_2: hasil_part,
              refnumber2: ref_number,
              referencepart_tahun2: ref_option,
              referencenumber_2: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext2.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_2").val();
          var ref_number = $("#refnumber2").val();
          var ref_option = $("#referencepart_text2").val(); 
          var hasil_part = $("#referencepart_2").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference2",
            type: 'post',
            data: {
              menu:menu,
              referencepart_2: hasil_part,
              refnumber2: ref_number,
              referencepart_text2: ref_option,
              referencenumber_2: ref_part,
            },

            success: function(){
             
            }
        });
      });
      
     
      //REFERENCEPART YANG KETIGA

      const referencen3 = document.getElementById('referencenumber_3');
      const referecepartnumber3 = document.getElementById('referencepart_number3');
      const referencepartbulan3 = document.getElementById('referencepart_bulan3');
      const refereceparttahun3 = document.getElementById('referencepart_tahun3');
      const refereceparttext3 = document.getElementById('referencepart_text3');
      const referencepartseparator3 = document.getElementById('referencepart_separator3');

      referencen3.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
          var ref_number3 = $("#refnumber3").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart3",
              type: 'post',
              data: {
                menu:menu,
               refnumber3:ref_number3
              },
              success: function() {

              }
              
            });
          $("#referencepart_3").val("");
          $("#referencepart3_view").show();
          $("#referencepart_number3").hide();
          $("#referencepart_separator3").hide();
          $("#referencepart_bulan3").hide();
          $("#referencepart_tahun3").hide();
          $("#referencepart_text3").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart3_view").hide();
          $("#referencepart_number3").show();
          $("#referencepart_separator3").hide();
          $("#referencepart_bulan3").hide();
          $("#referencepart_tahun3").hide();
          $("#referencepart_text3").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart3_view").hide();
          $("#referencepart_number3").hide();
          $("#referencepart_separator3").show();
          $("#referencepart_bulan3").hide();
          $("#referencepart_tahun3").hide();
          $("#referencepart_text3").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart3_view").hide();
          $("#referencepart_number3").hide();
          $("#referencepart_separator3").hide();
          $("#referencepart_bulan3").show();
          $("#referencepart_tahun3").hide();
          $("#referencepart_text3").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart3_view").hide();
          $("#referencepart_number3").hide();
          $("#referencepart_separator3").hide();
          $("#referencepart_bulan3").hide();
          $("#referencepart_tahun3").show();
          $("#referencepart_text3").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart3_view").hide();
          $("#referencepart_number3").hide();
          $("#referencepart_separator3").hide();
          $("#referencepart_bulan3").hide();
          $("#referencepart_tahun3").hide();
          $("#referencepart_text3").show();
        }
      });
      function jumlahdigit3(){ 
          if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber3.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_3').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber3.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_3').val(val.tampil); 
                  });
                  

              }
              
            });
          }
      }
      referencepart_separator3.addEventListener('change', (event) => {
         $('#referencepart_3').val(referencepart_separator3.value); 
      });
      referencepartbulan3.addEventListener('blur', (event) => {
       
       const monthtwodigit_3 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_3 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan3").val() == "MM") {
          let twodigit_3 = new Date();

          $("#referencepart_3").val(monthtwodigit_3.format(twodigit_3))

      }else if($("#referencepart_bulan3").val() == "MMM"){
          let threedigit_3 = new Date();
        $("#referencepart_3").val(monththreedigit_3.format(threedigit_3)); 
      }else if($("#referencepart_bulan3").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_3").val(bulan); 
      }
      });


      refereceparttahun3.addEventListener('blur', (event) => {
       const yearfourdigit_3 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_3 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun3").val() == "YYYY") {
          let fourdigit_3 = new Date();

          $("#referencepart_3").val(yearfourdigit_3.format(fourdigit_3))

      }else if($("#referencepart_tahun3").val() == "YY"){
          let ytwodigit_3 = new Date();
        $("#referencepart_3").val(yeartwodigit_3.format(ytwodigit_3)); 
      }
      });

      refereceparttext3.addEventListener('blur', (event) => {
        $('#referencepart_3').val(refereceparttext3.value); 
      });
      
      referecepartnumber3.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_3").val();
          var ref_number = $("#refnumber3").val();
          var ref_option = $("#referencepart_number3").val(); 
          var hasil_part = $("#referencepart_3").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference3",
            type: 'post',
            data: {
              menu:menu,
              referencepart_3: hasil_part,
              refnumber3: ref_number,
              referencepart_number3: ref_option,
              referencenumber_3: ref_part,
            },

            success: function(){
              
            }
        });
      });
      referencepart_separator3.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_3").val();
          var ref_number = $("#refnumber3").val();
          var ref_option = $("#referencepart_separator3").val(); 
          var hasil_part = $("#referencepart_3").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference3",
            type: 'post',
            data: {
              menu:menu,
              referencepart_3: hasil_part,
              refnumber3: ref_number,
              referencepart_separator3: ref_option,
              referencenumber_3: ref_part,
            },

            success: function(){
             
            }
        });
      });
      referencepartbulan3.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_3").val();
          var ref_number = $("#refnumber3").val();
          var ref_option = $("#referencepart_bulan3").val();
          var hasil_part = $("#referencepart_3").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference3",
            type: 'post',
            data: {
              menu:menu,
              referencepart_3: hasil_part,
              refnumber3: ref_number,
              referencepart_bulan3: ref_option,
              referencenumber_3: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun3.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_3").val();
          var ref_number = $("#refnumber3").val();
          var ref_option = $("#referencepart_tahun3").val();
          var hasil_part = $("#referencepart_3").val();  

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference3",
            type: 'post',
            data: {
              menu:menu,
              referencepart_3: hasil_part,
              refnumber3: ref_number,
              referencepart_tahun3: ref_option,
              referencenumber_3: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext3.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_3").val();
          var ref_number = $("#refnumber3").val();
          var ref_option = $("#referencepart_text3").val();
          var hasil_part = $("#referencepart_3").val();   

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference3",
            type: 'post',
            data: {
              menu:menu,
              referencepart_3: hasil_part,
              refnumber3: ref_number,
              referencepart_text3: ref_option,
              referencenumber_3: ref_part,
            },

            success: function(){
              
            }
        });
      });

      //REFERENCEPART YANG KEEMPAT

      const referencen4 = document.getElementById('referencenumber_4');
      const referecepartnumber4 = document.getElementById('referencepart_number4');
      const referencepartbulan4 = document.getElementById('referencepart_bulan4');
      const refereceparttahun4 = document.getElementById('referencepart_tahun4');
      const refereceparttext4 = document.getElementById('referencepart_text4');
      const referencepartseparator4 = document.getElementById('referencepart_separator4');

      referencen4.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
          var ref_number4 = $("#refnumber4").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart4",
              type: 'post',
              data: {
               menu:menu,
               refnumber4:ref_number4
              },
              success: function() {

              }
              
            });
          $("#referencepart_4").val("");
          $("#referencepart4_view").show();
          $("#referencepart_number4").hide();
          $("#referencepart_separator4").hide();
          $("#referencepart_bulan4").hide();
          $("#referencepart_tahun4").hide();
          $("#referencepart_text4").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart4_view").hide();
          $("#referencepart_number4").show();
          $("#referencepart_separator4").hide();
          $("#referencepart_bulan4").hide();
          $("#referencepart_tahun4").hide();
          $("#referencepart_text4").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart4_view").hide();
          $("#referencepart_number4").hide();
          $("#referencepart_separator4").show();
          $("#referencepart_bulan4").hide();
          $("#referencepart_tahun4").hide();
          $("#referencepart_text4").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart4_view").hide();
          $("#referencepart_number4").hide();
          $("#referencepart_separator4").hide();
          $("#referencepart_bulan4").show();
          $("#referencepart_tahun4").hide();
          $("#referencepart_text4").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart4_view").hide();
          $("#referencepart_number4").hide();
          $("#referencepart_separator4").hide();
          $("#referencepart_bulan4").hide();
          $("#referencepart_tahun4").show();
          $("#referencepart_text4").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart4_view").hide();
          $("#referencepart_number4").hide();
          $("#referencepart_separator4").hide();
          $("#referencepart_bulan4").hide();
          $("#referencepart_tahun4").hide();
          $("#referencepart_text4").show();
        }
      });
      function jumlahdigit4(){ 
          if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber4.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_4').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber4.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_4').val(val.tampil); 
                  });
                  

              }
              
            });
          }
          
      }
      referencepart_separator4.addEventListener('change', (event) => {
        $('#referencepart_4').val(referencepart_separator4.value); 
      });
      referencepartbulan4.addEventListener('blur', (event) => {
       
       const monthtwodigit_4 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_4 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan4").val() == "MM") {
          let twodigit_4 = new Date();

          $("#referencepart_4").val(monthtwodigit_4.format(twodigit_4))

      }else if($("#referencepart_bulan4").val() == "MMM"){
          let threedigit_4 = new Date();
        $("#referencepart_4").val(monththreedigit_4.format(threedigit_4)); 
      }else if($("#referencepart_bulan4").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_4").val(bulan); 
      }
      });


      refereceparttahun4.addEventListener('blur', (event) => {
       const yearfourdigit_4 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_4 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun4").val() == "YYYY") {
          let fourdigit_4 = new Date();

          $("#referencepart_4").val(yearfourdigit_4.format(fourdigit_4))

      }else if($("#referencepart_tahun4").val() == "YY"){
          let ytwodigit_4 = new Date();
        $("#referencepart_4").val(yeartwodigit_4.format(ytwodigit_4)); 
      }
      });
      
      referecepartnumber4.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_4").val();
          var ref_number = $("#refnumber4").val();
          var ref_option = $("#referencepart_number4").val(); 
          var hasil_part = $("#referencepart_4").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference4",
            type: 'post',
            data: {
              menu:menu,
              referencepart_4: hasil_part,
              refnumber4: ref_number,
              referencepart_number4: ref_option,
              referencenumber_4: ref_part,
            },

            success: function(){
               
            }
        });
      });
      referencepart_separator4.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_4").val();
          var ref_number = $("#refnumber4").val();
          var ref_option = $("#referencepart_separator4").val(); 
          var hasil_part = $("#referencepart_4").val();  

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference4",
            type: 'post',
            data: {
              menu:menu,
              referencepart_4: hasil_part,
              refnumber4: ref_number,
              referencepart_separator4: ref_option,
              referencenumber_4: ref_part,
            },

            success: function(){
              
            }
        });
      });
      referencepartbulan4.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_4").val();
          var ref_number = $("#refnumber4").val();
          var ref_option = $("#referencepart_bulan4").val(); 
          var hasil_part = $("#referencepart_4").val();  

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference4",
            type: 'post',
            data: {
              menu:menu,
              referencepart_4: hasil_part,
              refnumber4: ref_number,
              referencepart_bulan4: ref_option,
              referencenumber_4: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun4.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_4").val();
          var ref_number = $("#refnumber4").val();
          var ref_option = $("#referencepart_tahun4").val(); 
          var hasil_part = $("#referencepart_4").val();  

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference4",
            type: 'post',
            data: {
              menu:menu,
              refnumber4: ref_number,
              referencepart_4: hasil_part,
              referencepart_tahun4: ref_option,
              referencenumber_4: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext4.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_4").val();
          var ref_number = $("#refnumber4").val();
          var ref_option = $("#referencepart_text4").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference4",
            type: 'post',
            data: {
              menu:menu,
              refnumber4: ref_number,
              referencepart_text4: ref_option,
              referencenumber_4: ref_part,
            },

            success: function(){
              $('#referencepart_4').val(refereceparttext4.value); 
            }
        });
      });


      //REFERENCEPART YANG KELIMA

      const referencen5 = document.getElementById('referencenumber_5');
      const referecepartnumber5 = document.getElementById('referencepart_number5');
      const referencepartbulan5 = document.getElementById('referencepart_bulan5');
      const refereceparttahun5 = document.getElementById('referencepart_tahun5');
      const refereceparttext5 = document.getElementById('referencepart_text5');
      const referencepartseparator5 = document.getElementById('referencepart_separator5');

      referencen5.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
           var menu = $("#menu").val();
           var ref_number5 = $("#refnumber5").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart5",
              type: 'post',
              data: {
                menu:menu,
               refnumber5:ref_number5
              },
              success: function() {

              }
              
            });
          $("#referencepart_5").val("");
          $("#referencepart5_view").show();
          $("#referencepart_number5").hide();
          $("#referencepart_separator5").hide();
          $("#referencepart_bulan5").hide();
          $("#referencepart_tahun5").hide();
          $("#referencepart_text5").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart5_view").hide();
          $("#referencepart_number5").show();
          $("#referencepart_separator5").hide();
          $("#referencepart_bulan5").hide();
          $("#referencepart_tahun5").hide();
          $("#referencepart_text5").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart5_view").hide();
          $("#referencepart_number5").hide();
          $("#referencepart_separator5").show();
          $("#referencepart_bulan5").hide();
          $("#referencepart_tahun5").hide();
          $("#referencepart_text5").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart5_view").hide();
          $("#referencepart_number5").hide();
          $("#referencepart_separator5").hide();
          $("#referencepart_bulan5").show();
          $("#referencepart_tahun5").hide();
          $("#referencepart_text5").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart5_view").hide();
          $("#referencepart_number5").hide();
          $("#referencepart_separator5").hide();
          $("#referencepart_bulan5").hide();
          $("#referencepart_tahun5").show();
          $("#referencepart_text5").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart5_view").hide();
          $("#referencepart_number5").hide();
          $("#referencepart_separator5").hide();
          $("#referencepart_bulan5").hide();
          $("#referencepart_tahun5").hide();
          $("#referencepart_text5").show();
        }
      });
      function jumlahdigit5(){ 
         if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber5.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_5').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber5.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_5').val(val.tampil); 
                  });
                  

              }
              
            });
          }
      }
       referencepart_separator5.addEventListener('change', (event) => {
          $('#referencepart_5').val(referencepart_separator5.value); 
       });
       referencepartbulan5.addEventListener('blur', (event) => {
       
       const monthtwodigit_5 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_5 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan5").val() == "MM") {
          let twodigit_5 = new Date();

          $("#referencepart_5").val(monthtwodigit_5.format(twodigit_5))

      }else if($("#referencepart_bulan5").val() == "MMM"){
          let threedigit_5 = new Date();
        $("#referencepart_5").val(monththreedigit_5.format(threedigit_5)); 
      }else if($("#referencepart_bulan5").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_5").val(bulan); 
      }
      });


      refereceparttahun5.addEventListener('blur', (event) => {
       const yearfourdigit_5 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_5 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun5").val() == "YYYY") {
          let fourdigit_5 = new Date();

          $("#referencepart_5").val(yearfourdigit_5.format(fourdigit_5))

      }else if($("#referencepart_tahun5").val() == "YY"){
          let ytwodigit_5 = new Date();
        $("#referencepart_5").val(yeartwodigit_5.format(ytwodigit_5)); 
      }
      });
       refereceparttext5.addEventListener('blur', (event) => {
          $('#referencepart_5').val(refereceparttext5.value); 
       });
      referecepartnumber5.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_5").val();
          var ref_number = $("#refnumber5").val();
          var ref_option = $("#referencepart_number5").val();  
          var hasil_part = $("#referencepart_5").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference5",
            type: 'post',
            data: {
              menu:menu,
              referencepart_5: hasil_part,
              refnumber5: ref_number,
              referencepart_number5: ref_option,
              referencenumber_5: ref_part,
            },

            success: function(){
              
            }
        });
      });
      referencepart_separator5.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_5").val();
          var ref_number = $("#refnumber5").val();
          var ref_option = $("#referencepart_separator5").val(); 
          var hasil_part = $("#referencepart_5").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference5",
            type: 'post',
            data: {
              menu:menu,
              referencepart_5: hasil_part,
              refnumber5: ref_number,
              referencepart_separator5: ref_option,
              referencenumber_5: ref_part,
            },

            success: function(){
              
            }
        });
      });
      referencepartbulan5.addEventListener('blur', (event) => {
           var menu = $("#menu").val();
          var ref_part = $("#referencenumber_5").val();
          var ref_number = $("#refnumber5").val();
          var ref_option = $("#referencepart_bulan5").val(); 
          var hasil_part = $("#referencepart_5").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference5",
            type: 'post',
            data: {
              menu:menu,
              referencepart_5: hasil_part,
              refnumber5: ref_number,
              referencepart_bulan5: ref_option,
              referencenumber_5: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun5.addEventListener('blur', (event) => {
           var menu = $("#menu").val();
          var ref_part = $("#referencenumber_5").val();
          var ref_number = $("#refnumber5").val();
          var ref_option = $("#referencepart_tahun5").val(); 
          var hasil_part = $("#referencepart_5").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference5",
            type: 'post',
            data: {
              menu:menu,
              referencepart_5: hasil_part,
              refnumber5: ref_number,
              referencepart_tahun5: ref_option,
              referencenumber_5: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext5.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_5").val();
          var ref_number = $("#refnumber5").val();
          var ref_option = $("#referencepart_text5").val(); 
          var hasil_part = $("#referencepart_5").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference5",
            type: 'post',
            data: {
              menu:menu,
              refnumber5: ref_number,
              referencepart_5: hasil_part,
              referencepart_text5: ref_option,
              referencenumber_5: ref_part,
            },

            success: function(){
              
            }
        });
      });


      //REFERENCEPART YANG KEENAM

      const reference6 = document.getElementById('referencenumber_6');
      const referecepartnumber6 = document.getElementById('referencepart_number6');
      const referencepartbulan6 = document.getElementById('referencepart_bulan6');
      const refereceparttahun6 = document.getElementById('referencepart_tahun6');
      const refereceparttext6 = document.getElementById('referencepart_text6');
      const referencepartseparator6 = document.getElementById('referencepart_separator6');

      reference6.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
          var ref_number6 = $("#refnumber6").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart6",
              type: 'post',
              data: {
                menu:menu,
               refnumber6:ref_number6
              },
              success: function() {

              }
              
            });
          $("#referencepart_6").val("");
          $("#referencepart6_view").show();
          $("#referencepart_number6").hide();
          $("#referencepart_separator6").hide();
          $("#referencepart_bulan6").hide();
          $("#referencepart_tahun6").hide();
          $("#referencepart_text6").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart6_view").hide();
          $("#referencepart_number6").show();
          $("#referencepart_separator6").hide();
          $("#referencepart_bulan6").hide();
          $("#referencepart_tahun6").hide();
          $("#referencepart_text6").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart6_view").hide();
          $("#referencepart_number6").hide();
          $("#referencepart_separator6").show();
          $("#referencepart_bulan6").hide();
          $("#referencepart_tahun6").hide();
          $("#referencepart_text6").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart6_view").hide();
          $("#referencepart_number6").hide();
          $("#referencepart_separator6").hide();
          $("#referencepart_bulan6").show();
          $("#referencepart_tahun6").hide();
          $("#referencepart_text6").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart6_view").hide();
          $("#referencepart_number6").hide();
          $("#referencepart_separator6").hide();
          $("#referencepart_bulan6").hide();
          $("#referencepart_tahun6").show();
          $("#referencepart_text6").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart6_view").hide();
          $("#referencepart_number6").hide();
          $("#referencepart_separator6").hide();
          $("#referencepart_bulan6").hide();
          $("#referencepart_tahun6").hide();
          $("#referencepart_text6").show();
        }
      });
      function jumlahdigit6(){ 
         if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber6.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_6').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber6.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_6').val(val.tampil); 
                  });
                  

              }
              
            });
          }
      }
       referencepart_separator6.addEventListener('change', (event) => {
         $('#referencepart_6').val(referencepart_separator6.value); 
       });
       referencepartbulan6.addEventListener('blur', (event) => {
       
       const monthtwodigit_6 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_6 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan6").val() == "MM") {
          let twodigit_6 = new Date();

          $("#referencepart_6").val(monthtwodigit_6.format(twodigit_6))

      }else if($("#referencepart_bulan6").val() == "MMM"){
          let threedigit_6 = new Date();
        $("#referencepart_6").val(monththreedigit_6.format(threedigit_6)); 
      }else if($("#referencepart_bulan6").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_6").val(bulan); 
      }
      });


      refereceparttahun6.addEventListener('blur', (event) => {
       const yearfourdigit_6 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_6 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun6").val() == "YYYY") {
          let fourdigit_6 = new Date();

          $("#referencepart_6").val(yearfourdigit_6.format(fourdigit_6))

      }else if($("#referencepart_tahun6").val() == "YY"){
          let ytwodigit_6 = new Date();
        $("#referencepart_6").val(yeartwodigit_6.format(ytwodigit_6)); 
      }
      });

       refereceparttext6.addEventListener('blur', (event) => {
          $('#referencepart_6').val(refereceparttext6.value); 
       });
      
      referecepartnumber6.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_6").val();
          var ref_number = $("#refnumber6").val();
          var ref_option = $("#referencepart_number6").val(); 
          var hasil_part = $("#referencepart_6").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference6",
            type: 'post',
            data: {
              menu:menu,
              referencepart_6: hasil_part,
              refnumber6: ref_number,
              referencepart_number6: ref_option,
              referencenumber_6: ref_part,
            },

            success: function(){
               
            }
        });
      });
      referencepart_separator6.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_6").val();
          var ref_number = $("#refnumber6").val();
          var ref_option = $("#referencepart_separator6").val(); 
          var hasil_part = $("#referencepart_6").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference6",
            type: 'post',
            data: {
              menu:menu,
              referencepart_6: hasil_part,
              refnumber6: ref_number,
              referencepart_separator6: ref_option,
              referencenumber_6: ref_part,
            },

            success: function(){
             
            }
        });
      });
      referencepartbulan6.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_6").val();
          var ref_number = $("#refnumber6").val();
          var ref_option = $("#referencepart_bulan6").val(); 
          var hasil_part = $("#referencepart_6").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference6",
            type: 'post',
            data: {
              menu:menu,
              referencepart_6: hasil_part,
              refnumber6: ref_number,
              referencepart_bulan6: ref_option,
              referencenumber_6: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun6.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_6").val();
          var ref_number = $("#refnumber6").val();
          var ref_option = $("#referencepart_tahun6").val();
          var hasil_part = $("#referencepart_6").val();  

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference6",
            type: 'post',
            data: {
              menu:menu,
              referencepart_6: hasil_part,
              refnumber6: ref_number,
              referencepart_tahun6: ref_option,
              referencenumber_6: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext6.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_6").val();
          var ref_number = $("#refnumber6").val();
          var ref_option = $("#referencepart_text6").val(); 
          var hasil_part = $("#referencepart_6").val(); 

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference6",
            type: 'post',
            data: {
              menu:menu,
              referencepart_6: hasil_part,
              refnumber6: ref_number,
              referencepart_text6: ref_option,
              referencenumber_6: ref_part,
            },

            success: function(){
              
            }
        });
      });

      //REFERENCEPART YANG KETUJUH

      const reference7 = document.getElementById('referencenumber_7');
      const referecepartnumber7 = document.getElementById('referencepart_number7');
      const referencepartbulan7 = document.getElementById('referencepart_bulan7');
      const refereceparttahun7 = document.getElementById('referencepart_tahun7');
      const refereceparttext7 = document.getElementById('referencepart_text7');
      const referencepartseparator7 = document.getElementById('referencepart_separator7');

      reference7.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
          var ref_number7 = $("#refnumber7").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart7",
              type: 'post',
              data: {
                menu:menu,
               refnumber7:ref_number7
              },
              success: function() {

              }
              
            });
          $("#referencepart_7").val("");
          $("#referencepart7_view").show();
          $("#referencepart_number7").hide();
          $("#referencepart_separator7").hide();
          $("#referencepart_bulan7").hide();
          $("#referencepart_tahun7").hide();
          $("#referencepart_text7").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart7_view").hide();
          $("#referencepart_number7").show();
          $("#referencepart_separator7").hide();
          $("#referencepart_bulan7").hide();
          $("#referencepart_tahun7").hide();
          $("#referencepart_text7").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart7_view").hide();
          $("#referencepart_number7").hide();
          $("#referencepart_separator7").show();
          $("#referencepart_bulan7").hide();
          $("#referencepart_tahun7").hide();
          $("#referencepart_text7").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart7_view").hide();
          $("#referencepart_number7").hide();
          $("#referencepart_separator7").hide();
          $("#referencepart_bulan7").show();
          $("#referencepart_tahun7").hide();
          $("#referencepart_text7").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart7_view").hide();
          $("#referencepart_number7").hide();
          $("#referencepart_separator7").hide();
          $("#referencepart_bulan7").hide();
          $("#referencepart_tahun7").show();
          $("#referencepart_text7").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart7_view").hide();
          $("#referencepart_number7").hide();
          $("#referencepart_separator7").hide();
          $("#referencepart_bulan7").hide();
          $("#referencepart_tahun7").hide();
          $("#referencepart_text7").show();
        }
      });
      function jumlahdigit7(){ 
          if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber7.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_7').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber7.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_7').val(val.tampil); 
                  });
                  

              }
              
            });
          }
      }
       referencepart_separator7.addEventListener('change', (event) => {
            $('#referencepart_7').val(referencepart_separator7.value); 
       });
       referencepartbulan7.addEventListener('blur', (event) => {
       
       const monthtwodigit_7 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_7 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan7").val() == "MM") {
          let twodigit_7 = new Date();

          $("#referencepart_7").val(monthtwodigit_7.format(twodigit_7))

      }else if($("#referencepart_bulan7").val() == "MMM"){
          let threedigit_7 = new Date();
        $("#referencepart_7").val(monththreedigit_7.format(threedigit_7)); 
      }else if($("#referencepart_bulan7").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_7").val(bulan); 
      }
      });


      refereceparttahun7.addEventListener('blur', (event) => {
       const yearfourdigit_7 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_7 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun7").val() == "YYYY") {
          let fourdigit_7 = new Date();

          $("#referencepart_7").val(yearfourdigit_7.format(fourdigit_7))

      }else if($("#referencepart_tahun7").val() == "YY"){
          let ytwodigit_7 = new Date();
        $("#referencepart_7").val(yeartwodigit_7.format(ytwodigit_7)); 
      }
      });
      refereceparttext7.addEventListener('blur', (event) => {
        $('#referencepart_7').val(refereceparttext7.value); 
      });
      referecepartnumber7.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_7").val();
          var ref_number = $("#refnumber7").val();
          var ref_option = $("#referencepart_number7").val(); 
          var hasil_part = $("#referencepart_7").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference7",
            type: 'post',
            data: {
              menu:menu,
              referencepart_7: hasil_part,
              refnumber7: ref_number,
              referencepart_number7: ref_option,
              referencenumber_7: ref_part,
            },

            success: function(){
              console.log(ref_part, ref_number, ref_option);
            }
        });
      });
      referencepart_separator7.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_7").val();
          var ref_number = $("#refnumber7").val();
          var ref_option = $("#referencepart_separator7").val(); 
          var hasil_part = $("#referencepart_7").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference7",
            type: 'post',
            data: {
              menu:menu,
              referencepart_7: hasil_part,
              refnumber7: ref_number,
              referencepart_separator7: ref_option,
              referencenumber_7: ref_part,
            },

            success: function(){
            
            }
        });
      });
      referencepartbulan7.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_7").val();
          var ref_number = $("#refnumber7").val();
          var ref_option = $("#referencepart_bulan7").val(); 
          var hasil_part = $("#referencepart_7").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference7",
            type: 'post',
            data: {
              menu:menu,
              referencepart_7: hasil_part,
              refnumber7: ref_number,
              referencepart_bulan7: ref_option,
              referencenumber_7: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun7.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_7").val();
          var ref_number = $("#refnumber7").val();
          var ref_option = $("#referencepart_tahun7").val();  
          var hasil_part = $("#referencepart_7").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference7",
            type: 'post',
            data: {
              menu:menu,
              referencepart_7: hasil_part,
              refnumber7: ref_number,
              referencepart_tahun7: ref_option,
              referencenumber_7: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext7.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_7").val();
          var ref_number = $("#refnumber7").val();
          var ref_option = $("#referencepart_text7").val(); 
          var hasil_part = $("#referencepart_7").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference7",
            type: 'post',
            data: {
              menu:menu,
              referencepart_7: hasil_part,
              refnumber7: ref_number,
              referencepart_text7: ref_option,
              referencenumber_7: ref_part,
            },

            success: function(){
              
            }
        });
      });

      //REFERENCEPART YANG KEDELAPAN

      const reference8 = document.getElementById('referencenumber_8');
      const referecepartnumber8 = document.getElementById('referencepart_number8');
      const referencepartbulan8 = document.getElementById('referencepart_bulan8');
      const refereceparttahun8 = document.getElementById('referencepart_tahun8');
      const refereceparttext8 = document.getElementById('referencepart_text8');
      const referencepartseparator8 = document.getElementById('referencepart_separator8');

      reference8.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
          var ref_number8 = $("#refnumber8").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart8",
              type: 'post',
              data: {
                menu:menu,
               refnumber8:ref_number8
              },
              success: function() {

              }
              
            });
          $("#referencepart_8").val("");
          $("#referencepart8_view").show();
          $("#referencepart_number8").hide();
          $("#referencepart_separator8").hide();
          $("#referencepart_bulan8").hide();
          $("#referencepart_tahun8").hide();
          $("#referencepart_text8").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart8_view").hide();
          $("#referencepart_number8").show();
          $("#referencepart_separator8").hide();
          $("#referencepart_bulan8").hide();
          $("#referencepart_tahun8").hide();
          $("#referencepart_text8").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart8_view").hide();
          $("#referencepart_number8").hide();
          $("#referencepart_separator8").show();
          $("#referencepart_bulan8").hide();
          $("#referencepart_tahun8").hide();
          $("#referencepart_text8").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart8_view").hide();
          $("#referencepart_number8").hide();
          $("#referencepart_separator8").hide();
          $("#referencepart_bulan8").show();
          $("#referencepart_tahun8").hide();
          $("#referencepart_text8").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart8_view").hide();
          $("#referencepart_number8").hide();
          $("#referencepart_separator8").hide();
          $("#referencepart_bulan8").hide();
          $("#referencepart_tahun8").show();
          $("#referencepart_text8").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart8_view").hide();
          $("#referencepart_number8").hide();
          $("#referencepart_separator8").hide();
          $("#referencepart_bulan8").hide();
          $("#referencepart_tahun8").hide();
          $("#referencepart_text8").show();
        }
      });
      function jumlahdigit8(){ 
          if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber8.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_8').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber8.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_8').val(val.tampil); 
                  });
                  

              }
              
            });
          }
      }
       referencepartseparator8.addEventListener('change', (event) => {
        $('#referencepart_8').val(referencepart_separator8.value); 
       });
       referencepartbulan8.addEventListener('blur', (event) => {
       
       const monthtwodigit_8 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_8 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan8").val() == "MM") {
          let twodigit_8 = new Date();

          $("#referencepart_8").val(monthtwodigit_8.format(twodigit_8))

      }else if($("#referencepart_bulan8").val() == "MMM"){
          let threedigit_8 = new Date();
        $("#referencepart_8").val(monththreedigit_8.format(threedigit_8)); 
      }else if($("#referencepart_bulan8").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_8").val(bulan); 
      }
      });


      refereceparttahun8.addEventListener('blur', (event) => {
       const yearfourdigit_8 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_8 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun8").val() == "YYYY") {
          let fourdigit_8 = new Date();

          $("#referencepart_8").val(yearfourdigit_8.format(fourdigit_8))

      }else if($("#referencepart_tahun8").val() == "YY"){
          let ytwodigit_8 = new Date();
        $("#referencepart_8").val(yeartwodigit_8.format(ytwodigit_8)); 
      }
      });
      refereceparttext8.addEventListener('blur', (event) => {
        $('#referencepart_8').val(refereceparttext8.value); 
      });

      referecepartnumber8.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_8").val();
          var ref_number = $("#refnumber8").val();
          var ref_option = $("#referencepart_number8").val();  
          var hasil_part = $("#referencepart_8").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference8",
            type: 'post',
            data: {
              menu:menu,
              referencepart_8: hasil_part,
              refnumber8: ref_number,
              referencepart_number8: ref_option,
              referencenumber_8: ref_part,
            },

            success: function(){
               
            }
        });
      });
      referencepartseparator8.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_8").val();
          var ref_number = $("#refnumber8").val();
          var ref_option = $("#referencepart_separator8").val();   
          var hasil_part = $("#referencepart_8").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference8",
            type: 'post',
            data: {
              menu:menu,
              referencepart_8: hasil_part,
              refnumber8: ref_number,
              referencepart_separator8: ref_option,
              referencenumber_8: ref_part,
            },

            success: function(){
              
            }
        });
      });
      referencepartbulan8.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_8").val();
          var ref_number = $("#refnumber8").val();
          var ref_option = $("#referencepart_bulan8").val();   
          var hasil_part = $("#referencepart_8").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference8",
            type: 'post',
            data: {
              menu:menu,
              referencepart_8: hasil_part,
              refnumber8: ref_number,
              referencepart_bulan8: ref_option,
              referencenumber_8: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun8.addEventListener('blur', (event) => {
        var menu = $("#menu").val();
          var ref_part = $("#referencenumber_8").val();
          var ref_number = $("#refnumber8").val();
          var ref_option = $("#referencepart_tahun8").val();  
          var hasil_part = $("#referencepart_8").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference8",
            type: 'post',
            data: {
              menu:menu,
              referencepart_8: hasil_part,
              refnumber8: ref_number,
              referencepart_tahun8: ref_option,
              referencenumber_8: ref_part,
            },

            success: function(){
             
            }
        });
      });
      refereceparttext8.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_8").val();
          var ref_number = $("#refnumber8").val();
          var ref_option = $("#referencepart_text8").val();  
          var hasil_part = $("#referencepart_8").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference8",
            type: 'post',
            data: {
              menu:menu,
              referencepart_8: hasil_part,
              refnumber8: ref_number,
              referencepart_text8: ref_option,
              referencenumber_8: ref_part,
            },

            success: function(){
              
            }
        });
      });


      //REFERENCEPART YANG KESEMBILAN

      const reference9 = document.getElementById('referencenumber_9');
      const referecepartnumber9 = document.getElementById('referencepart_number9');
      const referencepartbulan9 = document.getElementById('referencepart_bulan9');
      const refereceparttahun9 = document.getElementById('referencepart_tahun9');
      const refereceparttext9 = document.getElementById('referencepart_text9');
      const referencepartseparator9 = document.getElementById('referencepart_separator9');

      reference9.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
          var ref_number9 = $("#refnumber9").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart9",
              type: 'post',
              data: {
                menu:menu,
               refnumber9:ref_number9
              },
              success: function() {

              }
              
            });
          $("#referencepart_9").val("");
          $("#referencepart9_view").show();
          $("#referencepart_number9").hide();
          $("#referencepart_separator9").hide();
          $("#referencepart_bulan9").hide();
          $("#referencepart_tahun9").hide();
          $("#referencepart_text9").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart9_view").hide();
          $("#referencepart_number9").show();
          $("#referencepart_separator9").hide();
          $("#referencepart_bulan9").hide();
          $("#referencepart_tahun9").hide();
          $("#referencepart_text9").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart9_view").hide();
          $("#referencepart_number9").hide();
          $("#referencepart_separator9").show();
          $("#referencepart_bulan9").hide();
          $("#referencepart_tahun9").hide();
          $("#referencepart_text9").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart9_view").hide();
          $("#referencepart_number9").hide();
          $("#referencepart_separator9").hide();
          $("#referencepart_bulan9").show();
          $("#referencepart_tahun9").hide();
          $("#referencepart_text9").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart9_view").hide();
          $("#referencepart_number9").hide();
          $("#referencepart_separator9").hide();
          $("#referencepart_bulan9").hide();
          $("#referencepart_tahun9").show();
          $("#referencepart_text9").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart9_view").hide();
          $("#referencepart_number9").hide();
          $("#referencepart_separator9").hide();
          $("#referencepart_bulan9").hide();
          $("#referencepart_tahun9").hide();
          $("#referencepart_text9").show();
        }
      });
      function jumlahdigit9(){ 
         if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber9.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_9').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Pengaturan/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber9.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_9').val(val.tampil); 
                  });
                  

              }
              
            });
          }
      }
      referencepart_separator9.addEventListener('change', (event) => {
         $('#referencepart_9').val(referencepart_separator9.value); 
      });

       referencepartbulan9.addEventListener('blur', (event) => {
       
       const monthtwodigit_9 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_9 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan9").val() == "MM") {
          let twodigit_9 = new Date();

          $("#referencepart_9").val(monthtwodigit_9.format(twodigit_9))

      }else if($("#referencepart_bulan9").val() == "MMM"){
          let threedigit_9 = new Date();
        $("#referencepart_9").val(monththreedigit_9.format(threedigit_9)); 
      }else if($("#referencepart_bulan9").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_9").val(bulan); 
      }
      });


      refereceparttahun9.addEventListener('blur', (event) => {
       const yearfourdigit_9 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_9 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun9").val() == "YYYY") {
          let fourdigit_9 = new Date();

          $("#referencepart_9").val(yearfourdigit_9.format(fourdigit_9))

      }else if($("#referencepart_tahun9").val() == "YY"){
          let ytwodigit_9 = new Date();
        $("#referencepart_9").val(yeartwodigit_9.format(ytwodigit_9)); 
      }
      });
       refereceparttext9.addEventListener('blur', (event) => {
          $('#referencepart_9').val(refereceparttext9.value); 
       });
      
      referecepartnumber9.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_9").val();
          var ref_number = $("#refnumber9").val();
          var ref_option = $("#referencepart_number9").val();  
          var hasil_part = $("#referencepart_9").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference9",
            type: 'post',
            data: {
              menu:menu,
              referencepart_9: hasil_part,
              refnumber9: ref_number,
              referencepart_number9: ref_option,
              referencenumber_9: ref_part,
            },

            success: function(){
               
            }
        });
      });
      referencepart_separator9.addEventListener('blur', (event) => {
           var menu = $("#menu").val();
          var ref_part = $("#referencenumber_9").val();
          var ref_number = $("#refnumber9").val();
          var ref_option = $("#referencepart_separator9").val(); 
          var hasil_part = $("#referencepart_9").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference9",
            type: 'post',
            data: {
              menu:menu,
              referencepart_9: hasil_part,
              refnumber9: ref_number,
              referencepart_separator9: ref_option,
              referencenumber_9: ref_part,
            },

            success: function(){
             
            }
        });
      });
      referencepartbulan9.addEventListener('blur', (event) => {
           var menu = $("#menu").val();
          var ref_part = $("#referencenumber_9").val();
          var ref_number = $("#refnumber9").val();
          var ref_option = $("#referencepart_bulan9").val(); 
          var hasil_part = $("#referencepart_9").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference9",
            type: 'post',
            data: {
              menu:menu,
              referencepart_9: hasil_part,
              refnumber9: ref_number,
              referencepart_bulan9: ref_option,
              referencenumber_9: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun9.addEventListener('blur', (event) => {
           var menu = $("#menu").val();
          var ref_part = $("#referencenumber_9").val();
          var ref_number = $("#refnumber9").val();
          var ref_option = $("#referencepart_tahun9").val(); 
          var hasil_part = $("#referencepart_9").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference9",
            type: 'post',
            data: {
              menu:menu,
              referencepart_9: hasil_part,
              refnumber9: ref_number,
              referencepart_tahun9: ref_option,
              referencenumber_9: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext9.addEventListener('blur', (event) => {
           var menu = $("#menu").val();
          var ref_part = $("#referencenumber_9").val();
          var ref_number = $("#refnumber9").val();
          var ref_option = $("#referencepart_text9").val(); 
          var hasil_part = $("#referencepart_9").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference9",
            type: 'post',
            data: {
              menu:menu,
              referencepart_9: hasil_part,
              refnumber9: ref_number,
              referencepart_text9: ref_option,
              referencenumber_9: ref_part,
            },

            success: function(){
              
            }
        });
      });

      //REFERENCEPART YANG KESEPULUH

      const reference10 = document.getElementById('referencenumber_10');
      const referecepartnumber10 = document.getElementById('referencepart_number10');
      const referencepartbulan10 = document.getElementById('referencepart_bulan10');
      const refereceparttahun10 = document.getElementById('referencepart_tahun10');
      const refereceparttext10 = document.getElementById('referencepart_text10');
      const referencepartseparator10 = document.getElementById('referencepart_separator10');

      reference10.addEventListener('change', function handleChange(event) {
        if (event.target.value == "") { 
          var menu = $("#menu").val();
          var ref_number10 = $("#refnumber10").val();
          $.ajax({
              url: "<?=base_url()?>Pengaturan/deletereferencepart10",
              type: 'post',
              data: {
                menu:menu,
               refnumber10:ref_number10
              },
              success: function() {

              }
              
            });
          $("#referencepart_10").val("");
          $("#referencepart10_view").show();
          $("#referencepart_number10").hide();
          $("#referencepart_separator10").hide();
          $("#referencepart_bulan10").hide();
          $("#referencepart_tahun10").hide();
          $("#referencepart_text10").hide();
        }
        else if (event.target.value == "01") { 
          $("#referencepart10_view").hide();
          $("#referencepart_number10").show();
          $("#referencepart_separator10").hide();
          $("#referencepart_bulan10").hide();
          $("#referencepart_tahun10").hide();
          $("#referencepart_text10").hide();
        }
        else if (event.target.value == "02") { 
          $("#referencepart10_view").hide();
          $("#referencepart_number10").hide();
          $("#referencepart_separator10").show();
          $("#referencepart_bulan10").hide();
          $("#referencepart_tahun10").hide();
          $("#referencepart_text10").hide();
        }
        else if (event.target.value == "03") { 
          $("#referencepart10_view").hide();
          $("#referencepart_number10").hide();
          $("#referencepart_separator10").hide();
          $("#referencepart_bulan10").show();
          $("#referencepart_tahun10").hide();
          $("#referencepart_text10").hide();
        }
        else if (event.target.value == "04") { 
          $("#referencepart10_view").hide();
          $("#referencepart_number10").hide();
          $("#referencepart_separator10").hide();
          $("#referencepart_bulan10").hide();
          $("#referencepart_tahun10").show();
          $("#referencepart_text10").hide();
        }
        else if (event.target.value == "05") { 
          $("#referencepart10_view").hide();
          $("#referencepart_number10").hide();
          $("#referencepart_separator10").hide();
          $("#referencepart_bulan10").hide();
          $("#referencepart_tahun10").hide();
          $("#referencepart_text10").show();
        }
      });
      function jumlahdigit10(){ 
          if ($("#menu").val() == "35") {
            $.ajax({
              url: "<?=base_url()?>Ajax/get_autonumberingcashbank",
              type: 'post',
              data: {
               search:referecepartnumber10.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_10').val(val.tampil); 
                  });
                  

              }
              
            });
          }else if($("#menu").val() == "36"){
            $.ajax({
              url: "<?=base_url()?>Ajax/get_autonumbering2ddesign",
              type: 'post',
              data: {
               search:referecepartnumber10.value
              },
              success: function( data ) {
                  data = JSON.parse(data);
                 
                       $.each(data,function(key, val){
                       $('#referencepart_10').val(val.tampil); 
                  });
                  

              }
              
            });
          }
      }
      referencepart_separator10.addEventListener('change', (event) => {
         $('#referencepart_10').val(referencepart_separator10.value); 
      });

       referencepartbulan10.addEventListener('blur', (event) => {
       
       const monthtwodigit_10 = new Intl.DateTimeFormat('default',{
          month:'2-digit'
       }); 
       const monththreedigit_10 = new Intl.DateTimeFormat('default',{
          month:'short'
       }); 

      if ($("#referencepart_bulan10").val() == "MM") {
          let twodigit_10 = new Date();

          $("#referencepart_10").val(monthtwodigit_10.format(twodigit_10))

      }else if($("#referencepart_bulan10").val() == "MMM"){
          let threedigit_10 = new Date();
        $("#referencepart_10").val(monththreedigit_10.format(threedigit_10)); 
      }else if($("#referencepart_bulan10").val() == "XXXX"){
          var romawi=new Date();
          var romawi=romawi.getMonth()+1
          switch (romawi){
            case 1:bulan="I";break
            case 2:bulan="II";break
            case 3:bulan="III";break
            case 4:bulan="IV";break
            case 5:bulan="V";break
            case 6:bulan="VI";break
            case 7:bulan="VII";break
            case 8:bulan="VIII";break
            case 9:bulan="IX";break
            case 10:bulan="X";break
            case 11:bulan="XI";break
            case 12:bulan="XII"
            }
        $("#referencepart_10").val(bulan); 
      }
      });


      refereceparttahun10.addEventListener('blur', (event) => {
       const yearfourdigit_10 = new Intl.DateTimeFormat('default',{
          year:'numeric'
       }); 
       const yeartwodigit_10 = new Intl.DateTimeFormat('default',{
          year:'2-digit'
       }); 

      if ($("#referencepart_tahun10").val() == "YYYY") {
          let fourdigit_10 = new Date();

          $("#referencepart_10").val(yearfourdigit_10.format(fourdigit_10))

      }else if($("#referencepart_tahun10").val() == "YY"){
          let ytwodigit_10 = new Date();
        $("#referencepart_10").val(yeartwodigit_10.format(ytwodigit_10)); 
      }
      });
      refereceparttext10.addEventListener('blur', (event) => {
         $('#referencepart_10').val(refereceparttext10.value); 
      });
      
      referecepartnumber10.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_10").val();
          var ref_number = $("#refnumber10").val();
          var ref_option = $("#referencepart_number10").val(); 
          var hasil_part = $("#referencepart_10").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference10",
            type: 'post',
            data: {
              menu:menu,
              referencepart_10: hasil_part,
              refnumber10: ref_number,
              referencepart_number10: ref_option,
              referencenumber_10: ref_part,
            },

            success: function(){
               
            }
        });
      });
      referencepart_separator10.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_10").val();
          var ref_number = $("#refnumber10").val();
          var ref_option = $("#referencepart_separator10").val(); 
          var hasil_part = $("#referencepart_10").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference10",
            type: 'post',
            data: {
              menu:menu,
              referencepart_10: hasil_part,
              refnumber10: ref_number,
              referencepart_separator10: ref_option,
              referencenumber_10: ref_part,
            },

            success: function(){
             
            }
        });
      });
      referencepartbulan10.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_10").val();
          var ref_number = $("#refnumber10").val();
          var ref_option = $("#referencepart_bulan10").val(); 
          var hasil_part = $("#referencepart_10").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference10",
            type: 'post',
            data: {
              menu:menu,
              referencepart_10: hasil_part,
              refnumber10: ref_number,
              referencepart_bulan10: ref_option,
              referencenumber_10: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttahun10.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_10").val();
          var ref_number = $("#refnumber10").val();
          var ref_option = $("#referencepart_tahun10").val(); 
          var hasil_part = $("#referencepart_10").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference10",
            type: 'post',
            data: {
              menu:menu,
              referencepart_10: hasil_part,
              refnumber10: ref_number,
              referencepart_tahun10: ref_option,
              referencenumber_10: ref_part,
            },

            success: function(){
              
            }
        });
      });
      refereceparttext10.addEventListener('blur', (event) => {
          var menu = $("#menu").val();
          var ref_part = $("#referencenumber_10").val();
          var ref_number = $("#refnumber10").val();
          var ref_option = $("#referencepart_text10").val(); 
          var hasil_part = $("#referencepart_10").val();

           $.ajax({
            url: "<?=base_url()?>Pengaturan/adddetailreference10",
            type: 'post',
            data: {
              menu:menu,
              referencepart_10: hasil_part,
              refnumber10: ref_number,
              referencepart_text10: ref_option,
              referencenumber_10: ref_part,
            },

            success: function(){
             
            }
        });
      });

    </script>

     <script>
           
            const btncancel = document.getElementById('btncancel');
            btncancel.addEventListener('click', function(e) {
            e.preventDefault();
            var id_header = $("#id_header").val();
            var status = $("#status").val();
            console.log(status, id_header)
          $.ajax({
            url: "<?=base_url()?>dua_d_design/deletedetaildesainsementara",
            type: 'post',
            data: {
              id_header:id_header,
              status:status
            },

            success: function(){
              document.location.href = "<?= base_url('list2ddesain')?>";
            }
          });
        });
     
     </script>
       <script> 
          const btncancel_ = document.getElementById('btncancel_');
            btncancel_.addEventListener('click', function(e) {
            e.preventDefault();
            var id_detail_ = $("#id_detail").val();
            var status = $("#status").val(); 

          $.ajax({
            url: "<?=base_url()?>dua_d_design/deletesubdetailsementara",
            type: 'post',
            data: {
              id_detail:id_detail_,
              status:status
            }, 
            success: function(){
              document.location.href = "<?= base_url('tambahdata2ddesain')?>";
            }
          });
        });
     </script> 
     <script> 
          const btncancel2 = document.getElementById('btncancel2');
            btncancel2.addEventListener('click', function(e) {
            e.preventDefault();
            var id_detail_ = $("#id_detail").val();
            var id_header = $("#id_header").val();
            var status = $("#status").val(); 

          $.ajax({
            url: "<?=base_url()?>dua_d_design/deletesubdetailsementara",
            type: 'post',
            data: {
              id_detail:id_detail_,
              status:status
            }, 
            success: function(){
              document.location.href = "<?= base_url('list2ddesain')?>" ;
            }
          });
        });
     </script>
     <script>
        $("select[id=typetransaksi]").on("change", function() { 
            
            if ($(this).val() == "Reguler") {
              $("div[id=subakun] ").hide(); 
              $("div[id=namasubakun] ").hide();
            } 
            else if ($(this).val() == "Down Payment")  { 
              $("div[id=subakun] ").show(); 
              $("div[id=namasubakun] ").show();
            } 
            else if ($(this).val() == "Invoice")  { 
              $("div[id=subakun] ").show(); 
              $("div[id=namasubakun] ").show();

            } 
            else if ($(this).val() == "Cancel Down Payment")  { 
              $("div[id=subakun] ").show(); 
              $("div[id=namasubakun] ").show();
            }  
          }); 
        $("select[id=typetransaksi]").trigger("change");
    </script>
    <script>
        $("select[id=typeclient]").on("change", function() { 
            if ($(this).val() == "New Design") {
              $("div[id=client] ").hide(); 
              $("div[id=namaclient] ").hide();
            } 
            else if ($(this).val() == "Client Order")  { 
              $("div[id=client] ").show(); 
              $("div[id=namaclient] ").show();
            } 
          }); 
        $("select[id=typeclient]").trigger("change");
    </script>
    <script>
      if ($("#totalnilaicashbankdetail").val() == "0,00") {
              $("#shadow").hide(); 
      } else{
        $("#shadow").show(); 
      }
    </script>

    <script>
      if ($('input[name=cekakses]:checked')) { 

              $(".form-check-button-add").show();
      } else{
        
              $(".form-check-button-add").hide();
      }
    </script>
    <script>
      if ($("#totalnilaicashbanklawan").val() == "0,00") {
              $("#shadow1").hide(); 
      } else{
        $("#shadow1").show(); 
      }
    </script>
    <script>
     $("#addbutton").click(function(){
     $("#addform").show();
     $("#shadow").show();
     });
    </script>
     <script>
       let addbutton = document.getElementById('addbuttonsubdetail');

      addbutton.addEventListener('click', function(e){
        e.preventDefault();
         $("#addformsubdetail").show();
      });
    </script>
    <script>
       var buttondetailkepala = document.getElementById('addbuttondetailkepala');

      buttondetailkepala.addEventListener('click', function(e){
        e.preventDefault();
         $("#addformdetailkepala").show();
      });
    
    </script>
     <script>
     $("#addpicture").click(function(){
      $("div[id=gambar] ").show(); 
     });
    </script>
    <script>
     $("#adddetail").click(function(){
      $("div[id=detaildesigner] ").show(); 
     });
    </script>
      <script>
     $("#addbuttondetaildiamond").click(function(){
      update();
     $("#addformdetaildiamond").show();
 
     });
    </script>
    <script>
     $("#addbutton1").click(function(){
     $("#addform1").show();
     $("#shadow1").show();

     });
    </script>

    <script>
      $('.form-check-input').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        console.log(menuId, roleId);
        $.ajax({
            url: "<?=base_url()?>Role/changeAccess",
            type: 'post',
            data: {
              menuId: menuId,
              roleId: roleId,
            },

            success: function(){
              document.location.href = "<?= base_url('aksesrole/')?>" + roleId;
            }
        });
      });
    </script>

    <script>
      $('.form-check-button-add').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        // console.log(menuId, roleId);
        $.ajax({
            url: "<?=base_url()?>Role/changeAccessAddBtn",
            type: 'post',
            data: {
              menuId: menuId,
              roleId: roleId,
            },

            success: function(){
              document.location.href = "<?= base_url('aksesrole/')?>" + roleId;
            }
        });
      });
    </script>
    <script>
      $('.form-check-button-update').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        // console.log(menuId, roleId);
        $.ajax({
            url: "<?=base_url()?>Role/changeAccessUpdateBtn",
            type: 'post',
            data: {
              menuId: menuId,
              roleId: roleId,
            },

            success: function(){
              document.location.href = "<?= base_url('aksesrole/')?>" + roleId;
            }
        });
      });
    </script>

    <script>
      $('.form-check-button-delete').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        // console.log(menuId, roleId);
        $.ajax({
            url: "<?=base_url()?>Role/changeAccessDeleteBtn",
            type: 'post',
            data: {
              menuId: menuId,
              roleId: roleId,
            },

            success: function(){
              document.location.href = "<?= base_url('aksesrole/')?>" + roleId;
            }
        });
      });
    </script>

    <script>
      $('.form-check-button-detail').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        // console.log(menuId, roleId);
        $.ajax({
            url: "<?=base_url()?>Role/changeAccessDetailBtn",
            type: 'post',
            data: {
              menuId: menuId,
              roleId: roleId,
            },

            success: function(){
              document.location.href = "<?= base_url('aksesrole/')?>" + roleId;
            }
        });
      });
    </script>

    <script>
      $('#jumlah').on('blur', function(){
         var iddetail =  $('#iddetail').val(); 
         var jumlah =  $('#jumlah').val();

         
        $.ajax({
            url: "<?=base_url()?>spk/getdetaildesain",
            type: 'post',
            data: {
              iddetail : iddetail, 
              jumlah : jumlah,
            },

              success: function(data) { 
                  $('#detaildesign').html(data);
              }
        });
      });
    </script>
 
     <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#produk" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_barang",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
              $('#produk').val(ui.item.label); // display the selected text
              $('#idbarang').val(ui.item.value); // display the selected text
              $('#tipeproduk').val(ui.item.labeltipeproduk); // display the selected text
              $('#brand').val(ui.item.labelbrand); // display the selected text
              $('#etalase').val(ui.item.labeletalase); // display the selected text
              $('#kondisi').val(ui.item.labelkondisi); // display the selected text
              $('#hargaproduk_').val(ui.item.labelharga_); // display the selected text
              $('#hargaproduk').val(ui.item.labelharga);
            
             return false;
            },
            focus: function(event, ui){
               $('#produk').val(ui.item.label); // display the selected text
              $('#idbarang').val(ui.item.value); // display the selected text
              $('#tipeproduk').val(ui.item.labeltipeproduk); // display the selected text
              $('#brand').val(ui.item.labelbrand); // display the selected text
              $('#etalase').val(ui.item.labeletalase); // display the selected text
              $('#kondisi').val(ui.item.labelkondisi); // display the selected text
              $('#hargaproduk_').val(ui.item.labelharga_); // display the selected text
              $('#hargaproduk').val(ui.item.labelharga);
             
               return false;
             },
           });
        });
          
        </script>
    <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#parcel" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_parcel",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
              $('#parcel').val(ui.item.label); // display the selected text
              $('#idparcel').val(ui.item.value);
              $('#clarity').val(ui.item.labelclarity);
               $('#shape').val(ui.item.labelshape);
               $('#color').val(ui.item.labelcolor);
               $('#harga').val(ui.item.labelharga);
            
             return false;
            },
            focus: function(event, ui){
               $( "#parcel" ).val( ui.item.label );
               $( "#idparcel" ).val( ui.item.value );
               $('#clarity').val(ui.item.labelclarity);
               $('#shape').val(ui.item.labelshape);
               $('#color').val(ui.item.labelcolor);
               $('#harga').val(ui.item.labelharga);
             
               return false;
             },
           });

        });
        </script>

       <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#nama" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_karyawan",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
              $('#idkaryawan').val(ui.item.value); // display the selected text
              $('#nama').val(ui.item.label);
            
             return false;
            },
            focus: function(event, ui){
               $('#idkaryawan').val(ui.item.value);
              $('#nama').val(ui.item.label);
             
               return false;
             },
           });

        });
        </script>
      
      <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#material" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_material",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
              $('#material').val(ui.item.label); // display the selected text
              $('#idmaterial').val(ui.item.value);
              $('#satuan').val(ui.item.labelsatuan);
              $('#satuanjsfinishing').val(ui.item.labelsatuan);
              $('#satuanjspolesrangka').val(ui.item.labelsatuan);
              $('#satuanjspasangbatu').val(ui.item.labelsatuan); 
              $('#satuanjsrakit').val(ui.item.labelsatuan);
              $('#satuanjspoleschrome').val(ui.item.labelsatuan);  // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#material" ).val( ui.item.label );
               $( "#idmaterial" ).val( ui.item.value );
               $('#satuan').val(ui.item.labelsatuan);
               $('#satuanjsfinishing').val(ui.item.labelsatuan);
               $('#satuanjspolesrangka').val(ui.item.labelsatuan); 
               $('#satuanjspasangbatu').val(ui.item.labelsatuan); 
               $('#satuanjsrakit').val(ui.item.labelsatuan);  
               $('#satuanjspoleschrome').val(ui.item.labelsatuan);
               return false;
             },
           });

        });
        </script>
    <script>
      function materialmodal(){
          $(document).on('click', '#material', function (e) {
             var idmaterial = $(this).attr('data-id');
             var material = $(this).attr('data-material');
             var satuan   =  $(this).attr('data-satuan');
             var satuanjsfinishing   =  $(this).attr('data-satuan');
             var satuanjspolesrangka   =  $(this).attr('data-satuan');
             var satuanjspasangbatu   =  $(this).attr('data-satuan');
             var satuanjsrakit   =  $(this).attr('data-satuan');
             var satuanjspoleschrome   =  $(this).attr('data-satuan');

             var tanggal =  $('#tanggaltransaksi').val();
 
             $.ajax({
              url: "<?=base_url()?>Ajax/get_kursmaterial",
              type: 'post',
              data: {
               tanggaltransaksi : tanggal,
               search: idmaterial
              },
              success: function( data ) {
                data = JSON.parse(data);
                  const isEmpty = Object.keys(data).length === 0;
                  // console.log(isEmpty);
                  if (isEmpty == true) {
                      $('#hargamaterial').val(0);
                      $('#hargamaterial_').val(0);
                       $('#hargamaterialawal').val(0);
                   
                  }else if(isEmpty == false){
                       $.each(data,function(key, val){
                       $('#hargamaterial_').val(val.labelrate_);
                       $('#hargamaterial').val(val.labelrate);
                       $('#hargamaterialawal').val(val.labelrate);
                  });
                  }
                 document.getElementById("idmaterial").value = idmaterial;
                 document.getElementById("material").value = material
                 document.getElementById("satuan").value = satuan
                 document.getElementById("satuanjsfinishing").value = satuanjsfinishing
                 document.getElementById("satuanjspolesrangka").value = satuanjspolesrangka
                 document.getElementById("satuanjspasangbatu").value = satuanjspasangbatu
                 document.getElementById("satuanjsrakit").value = satuanjsrakit
                 document.getElementById("satuanjspoleschrome").value = satuanjspoleschrome 
                 $('#modalmaterial').modal('hide');     

              }
              
            });
         
          }); 
      }
        function gethargamaterial()
      {
         var tanggal =  $('#tanggaltransaksi').val();
         var idmaterial = $('#idmaterial').val()
         // console.log(tanggal, idmaterial);
           $.ajax({
              url: "<?=base_url()?>Ajax/get_kursmaterial",
              type: 'post',
              data: {
               tanggaltransaksi : tanggal,
               search: idmaterial
              },
              success: function( data ) {
                data = JSON.parse(data);
                  const isEmpty = Object.keys(data).length === 0;
                  // console.log(isEmpty);
                  if (isEmpty == true) {
                      $('#hargamaterial').val(0);
                      $('#hargamaterial_').val(0);
                       $('#hargamaterialawal').val(0);
                   
                  }else if(isEmpty == false){
                       $.each(data,function(key, val){
                       $('#hargamaterial_').val(val.labelrate_);
                       $('#hargamaterial').val(val.labelrate);
                       $('#hargamaterialawal').val(val.labelrate);
                  });
                  }
              }
              
            });
        
      }
          function getongkosrangka()
           {
             var idtipedesign =  $('#idtipedesign').val();
             var kesulitan =  $('#kesulitan').val(); 

                
            $.ajax({
              url: "<?=base_url()?>Ajax/get_ongkos",
              type: 'post',
              data: {
               idtipedesign : idtipedesign,
               kesulitan: kesulitan, 
              },
              success: function( data ) {
                  data = JSON.parse(data);
                  $.each(data, function(key, val){
                     //$('#ongkos').val(val.labelharga_);
                     $('#ongkosrangka').val(val.labelharga);
                     $('#idongkosrangka').val(val.labelidongkosrangka);
                  });
                  updateongkos() 
                  hitung();
                //  var diamond =  $('#hargadiamond').val();
                //  var material =  $('#hargamaterial').val();
                //  var kepala =  $('#hargakepala').val();
                //  var ongkos =  $('#hargaongkos').val();

                // var total = parseInt(diamond)+parseInt(kepala)+parseInt(material)+parseInt(ongkos);
                 
              

                // if (material == 0 || ongkos == 0 || kepala == 0 || diamond == 0) {
                //    document.getElementById('total').value = 0;
                // }else if(material != 0 || ongkos != 0 || kepala != 0 || diamond != 0){
                //   document.getElementById('total').value = formatNumber(total);
                // }
              }
              
            });
           } 
       
    </script>
    <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#warnaproduk" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_warnaproduk",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#warnaproduk').val(ui.item.label); // display the selected text
             $('#idwarnaproduk').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#warnaproduk" ).val( ui.item.label );
               $( "#idwarnaproduk" ).val( ui.item.value );
               return false;
             },
           });

        });
        </script>     
          <script type='text/javascript'>
        $(document).ready(function(){
        
          

        });
        </script>
        <!-- Script produk -->
         <script type='text/javascript'> 
           $( "#tipeproduk" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_tipeproduk",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#tipeproduk').val(ui.item.label); // display the selected text
             $('#idtipeproduk').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#tipeproduk" ).val( ui.item.label );
               $( "#idtipeproduk" ).val( ui.item.value );
               return false;
             },
           });

            $( "#category" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_category",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#category').val(ui.item.label); // display the selected text
             $('#idcategory').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#category" ).val( ui.item.label );
               $( "#idcategory" ).val( ui.item.value );
               return false;
             },
           });

           $( "#jenisgaransi" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_jenisgaransi",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#jenisgaransi').val(ui.item.label); // display the selected text
             $('#idjenisgaransi').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#jenisgaransi" ).val( ui.item.label );
               $( "#idjenisgaransi" ).val( ui.item.value );
               return false;
             },
           });

            $( "#brand" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_brand",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#brand').val(ui.item.label); // display the selected text
             $('#idbrand').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#brand" ).val( ui.item.label );
               $( "#idbrand" ).val( ui.item.value );
               return false;
             },
           });

            $( "#periodegaransi" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_periodegaransi",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#periodegaransi').val(ui.item.label); // display the selected text
             $('#idperiodegaransi').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#periodegaransi" ).val( ui.item.label );
               $( "#idperiodegaransi" ).val( ui.item.value );
               return false;
             },
           });

            $( "#etalase" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_etalase",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#etalase').val(ui.item.label); // display the selected text
             $('#idetalase').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#etalase" ).val( ui.item.label );
               $( "#idetalase" ).val( ui.item.value );
               return false;
             },
           }); 

            $( "#claimgaransi" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_claimgaransi",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#claimgaransi').val(ui.item.label); // display the selected text
             $('#idclaimgaransi').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#claimgaransi" ).val( ui.item.label );
               $( "#idclaimgaransi" ).val( ui.item.value );
               return false;
             },
           });

            $( "#satuanbesar" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_satuanbesar",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#satuanbesar').val(ui.item.label); // display the selected text
             $('#idsatuanbesar').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#satuanbesar" ).val( ui.item.label );
               $( "#idsatuanbesar" ).val( ui.item.value );
               return false;
             },
           });

            $( "#satuankecil" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_satuankecil",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#satuankecil').val(ui.item.label); // display the selected text
             $('#idsatuankecil').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#satuankecil" ).val( ui.item.label );
               $( "#idsatuankecil" ).val( ui.item.value );
               return false;
             },
           });

            $( "#kondisi" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_kondisi",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#kondisi').val(ui.item.label); // display the selected text
             $('#idkondisi').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#kondisi" ).val( ui.item.label );
               $( "#idkondisi" ).val( ui.item.value );
               return false;
             },
           });

            $( "#matauang" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_matauang",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#matauang').val(ui.item.label); // display the selected text
             $('#idmatauang').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#matauang" ).val( ui.item.label );
               $( "#idmatauang" ).val( ui.item.value );
               return false;
             },
           });


        </script>
          <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#namaklien" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_client",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#namaklien').val(ui.item.label); // display the selected text
             $('#idclient').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#namaklien" ).val( ui.item.label );
               $( "#idclient" ).val( ui.item.value );
               return false;
             },
           });

        });
        </script> 
        <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#nomor" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_desain",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#nomor').val(ui.item.label); // display the selected text
             $('#iddetail').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#nomor" ).val( ui.item.label );
               $( "#iddetail" ).val( ui.item.value );
               return false;
             },
           });

        });
        </script> 
       <script type='text/javascript'>
        function gethargaongkos(){
           
        }
        
  
        </script>
     <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#finishing" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_finishing",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#finishing').val(ui.item.label); // display the selected text
             $('#idfinishing').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#finishing" ).val( ui.item.label );
               $( "#idfinishing" ).val( ui.item.value );
               return false;
             },
           });

        });
        </script>
    <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#tipedesign" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_tipedesign",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#tipedesign').val(ui.item.label); // display the selected text
             $('#idtipedesign').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#tipedesign" ).val( ui.item.label );
               $( "#idtipedesign" ).val( ui.item.value );
               return false;
             },
           });

        });
        </script>
      <script type='text/javascript'>
        $(document).ready(function(){
        
           $( "#konsepkepala" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_konsepkepala",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#konsepkepala').val(ui.item.label); // display the selected text
             $('#idkonsepkepala').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#konsepkepala" ).val( ui.item.label );
               $( "#idkonsepkepala" ).val( ui.item.value );
               return false;
             },
           });

        });
        </script>

    <script type='text/javascript'> 
           $( "#akun" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_akuncoasatu",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#akun').val(ui.item.label); // display the selected text
             $('#namaakun').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#akun" ).val( ui.item.label );
               $( "#namaakun" ).val( ui.item.value );
               return false;
             },
           });

           $( "#akun3" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_akuncoasatu",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#akun3').val(ui.item.label); // display the selected text
             $('#keterangan').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#akun" ).val( ui.item.label );
               $( "#keterangan" ).val( ui.item.value );
               return false;
             },
           });
           $( "#akundua" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_akuncoadua",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#akundua').val(ui.item.label); // display the selected text
             $('#namaakundua').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#akundua" ).val( ui.item.label );
               $( "#namaakundua" ).val( ui.item.value );
               return false;
             },
           });
           $( "#akun4" ).autocomplete({
            source: function( request, response ) {
             // Fetch data
             $.ajax({
              url: "<?=base_url()?>Ajax/get_akuncoadua",
              type: 'post',
              dataType: "json",
              data: {
               search: request.term
              },
              success: function( data ) {
               response( data );
              }
             });
            },
            select: function (event, ui) {
             // Set selection
             $('#akun4').val(ui.item.label); // display the selected text
             $('#keterangan4').val(ui.item.value); // save selected fullname to input
             return false;
            },
            focus: function(event, ui){
               $( "#akundua" ).val( ui.item.label );
               $( "#keterangan4" ).val( ui.item.value );
               return false;
             },
           });
        </script> 
    <script>
          
              function filterdata(){
                  // let k = $(this).val();
                // console.log(k);
                var designer = $("#designer").val();
                var approval = $("#approval").val();
                var from     = $("#from").val();
                var to       = $("#to").val();
                // console.log(designer, approval, from, to);
                $.ajax({
                      url: "<?php echo base_url(). 'dua_d_design/filterdesignbydesigner';?>",
                      type:"post",
                      data: { 
                          designer: designer,
                          approval: approval,
                          from    : from,
                          to      : to,
                      },
                      success:function(data){
                          $('#tampil').html(data);
                            $('#2ddesign').hide();
                      
                          
                      }
                });
              }
             

              
       
     
    </script>
      <script>
           $(document).ready(function () {
              $("#approval").change(function(){

                // let k = $(this).val();
                // console.log(k);
                var approval = $("#approval").val();
                $.ajax({
                      url: "<?php echo base_url(). 'dua_d_design/filterdesignbyapproval';?>",
                      type:"post",
                      data: { 
                          approval: approval,
                      },
                      success:function(data){
                        if (approval == "0") {
                            $('#tampil').hide();
                            $('#2ddesign').show();
                        }else if (approval != "0"){
                            $('#tampil').html(data);
                            $('#tampil').show();
                            $('#2ddesign').hide();
                        }
                            
                      }
                });
              });
          });
    </script>
    <script>
       $(document).on('click','#btndeleteprodukdetail',function(e){
         e.preventDefault();
         var idsubdetailkepala = $(this).attr('data-idsubdetailkepala');
         var iddetail = $(this).attr('data-iddetail');
         $.ajax({
          url: "<?php echo base_url(). 'dua_d_design/deletedetailproduk';?>",
          type:"post",
          data: { 
              idsubdetailkepala: idsubdetailkepala,
              iddetail: iddetail,
          },
          success:function(){
              updateproduk();
               updatehargaproduk();
          }
        });
      });
       function updateproduk() {
                $.ajax({
                    url: '<?php echo base_url("ajax/getdetailproduk");?>',
                    type: 'get',
                    success: function(data) {
                       let produk = "";
                        data = JSON.parse(data);
                        for (let i=0; i < data.length; i++) {
                           produk += `
                                      <tr id="user${data[i].id_subdetailkepala}">
                                           <td style="width: 250px"> <input readonly  style="padding-bottom: 10px;width: 250px;" value="${data[i].namaproduk}" id="produk_" type="text" name="produk" class="form-control" ><input style="padding-bottom: 10px;width: 10px;" value="${data[i].id_produk}" id="idproduk_" type="hidden" name="idbarang" class="form-control" ><input style="padding-bottom: 10px;width: 10px;" value="${data[i].id_subdetailkepala}" id="idsubdetailkepala_" type="hidden" name="idsubdetailkepala" class="form-control" ><input style="padding-bottom: 10px;width: 10px;" value="${data[i].id_detail}" id="idsubdetailkepala_" type="hidden" name="iddetail" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].tipeproduk}" id="tipeproduk_" type="text" name="tipeproduk" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].brand}" id="brand_" type="text" name="brand" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;text-align:right" value="${data[i].etalase}" id="etalase_" type="text" name="etalase" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].kondisi}" id="kondisi_" type="text" name="kondisi" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;text-align:right" value='${data[i].harga}'' id="harga_" type="text" name="harga" class="form-control" ></td>
                                           <td style="width: 150px"><input  style="padding-bottom: 10px;width: 150px;text-align:right" value="${data[i].jumlah}" id="jumlah_" type="number" step="any" name="jumlah" onblur="onblurfunctionupdatesubdetailkepala()" class="form-control" ></td>
                                           <td> <a href="#"  id="btndeleteprodukdetail" data-idsubdetailkepala="${data[i].id_subdetailkepala}" data-iddetail="${data[i].id_detail}"   class="hapusdetailproduk btn btn-sm btn-danger" role="button" title="<?php echo $this->lang->line('delete'); ?>">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                           </td>
                                      </tr>
                                      `;
                        }
                            let tabledetailproduk = document.querySelector("#tabledetailproduk");
                          
                            tabledetailproduk.innerHTML = produk;
                    }
                });

            }

           function updatehargaproduk() {
                $.ajax({
                    url: '<?php echo base_url("dua_d_design/getkepala");?>',
                    type: 'get',
                    success: function(data) {
                        $('#tampilhargaproduk').html(data);
                        hitung();
                    }
                });

            }
     
      function onblurfunctionupdatesubdetailkepala()
      {
         
        let jumlah = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=jumlah]`);
        let harga = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=harga]`);
        let idbarang = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idbarang]`);
        let idsubdetailkepala = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idsubdetailkepala]`);
        
          $.ajax({
              url: "<?php echo base_url("dua_d_design/editeprodukdetail");?>",
              type: "POST",
              data: {
                idsubdetailkepala: idsubdetailkepala.value,
                idbarang: idbarang.value,
                jumlah: jumlah.value,
                harga: harga.value,
              },

              success: function(msg){
                
                  updateproduk();
                  updatehargaproduk(); 
                
              }
            });
      }
      function onblurfunctionadddetailkepala()
      {
          var iddetail = $('#iddetail').val();
          var jumlah = $('#jumlahproduk').val();
          var idbarang = $('#idbarang').val();
          var harga = $('#hargaproduk').val();
          var status = $('#status').val();
          $.ajax({
              url: "<?php echo base_url("dua_d_design/adddetailkepala");?>",
              type: "POST",
              data: {
                
                iddetail: iddetail,
                id_barang: idbarang,
                jumlah: jumlah,
                harga: harga,
                status: status,
              },
              success: function(msg){
                  updateproduk();
                  updatehargaproduk(); 
                 $('#addformdetailkepala').hide();
                  document.getElementById("jumlahproduk").value = "";
                  document.getElementById("hargaproduk").value = "";
                  document.getElementById("hargaproduk_").value = "";
                  document.getElementById("tipeproduk").value = "";
                  document.getElementById("brand").value = "";
                  document.getElementById("etalase").value = "";
                  document.getElementById("kondisi").value = "";
                  document.getElementById("idbarang").value = "";
                  document.getElementById("produk").value = "";
                
              }
            });     
      }
     $(document).ready(function () {
                 updateproduk();
                 updatehargaproduk();
          });

        const enterkepala = document.querySelector(".inputkepala"); 
        enterkepala.addEventListener("keyup", function(e){
          e.preventDefault();
            if(e.keyCode === 13) {
               
                  var iddetail = $('#iddetail').val();
                  var jumlah = $('#jumlahproduk').val();
                  var idbarang = $('#idbarang').val();
                  var harga = $('#hargaproduk').val();
                  var status = $('#status').val();
                $.ajax({
                    url: "<?php echo base_url("dua_d_design/adddetailkepala");?>",
                    type: "POST",
                    data: {
                      iddetail: iddetail,
                      id_barang: idbarang,
                      jumlah: jumlah,
                      harga: harga,
                      status: status,
                    },
                    success: function(msg){
                        updateproduk();
                  updatehargaproduk(); 
                 $('#addformdetailkepala').hide();
                        
                      
                    }
                  });

                       document.getElementById("jumlahproduk").value = "";
                  document.getElementById("hargaproduk").value = "";
                  document.getElementById("hargaproduk_").value = "";
                  document.getElementById("tipeproduk").value = "";
                  document.getElementById("brand").value = "";
                  document.getElementById("etalase").value = "";
                  document.getElementById("kondisi").value = "";
                  document.getElementById("idbarang").value = "";
                  document.getElementById("produk").value = ""; 
                 
                
            }
           
        });
    
    </script> 

     <script>
      
       function hitungmaterial(){

        var berat = $('#beratmaterial').val();
        var material = $('#hargamaterialawal').val();

        var hargamaterial = parseFloat(berat)*parseInt(material);

        document.getElementById('hargamaterial_').value = formatNumber(Math.ceil(hargamaterial));
        document.getElementById('hargamaterial').value = hargamaterial;

         var diamond =  $('#hargadiamond').val();
         var material =  $('#hargamaterial').val();
         var kepala =  $('#hargakepala').val();
         var ongkos =  $('#hargaongkos').val();

        var total = parseInt(diamond)+parseInt(kepala)+parseInt(material)+parseInt(ongkos);
       
    

          if (material == 0 || ongkos == 0 || kepala == 0 || diamond == 0) {
             document.getElementById('total').value = 0;
          }else if(material != 0 || ongkos != 0 || kepala != 0 || diamond != 0){
            document.getElementById('total').value = formatNumber(total);
          }
       }
     </script>
     <script>
      function formatNumber(num){
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.', ",00")
      }
      function hitung()
      {
       var diamond =  $('#hargadiamond').val();
       var material =  $('#hargamaterial').val();
       var kepala =  $('#hargakepala').val();
       var ongkos =  $('#hargaongkos').val();

       var total = parseInt(diamond)+parseInt(kepala)+parseInt(material)+parseInt(ongkos);
       
    

      if (material == 0 || ongkos == 0 || kepala == 0 || diamond == 0) {
         document.getElementById('total').value = 0;
      }else if(material != 0 || ongkos != 0 || kepala != 0 || diamond != 0){
        document.getElementById('total').value = formatNumber(total);
      }
       // document.getElementById('total').value = formatNumber(total);
       
    

       // var total = diamond + material + kepala + ongkos;
      
      }

       function onblurfunctionaddsubdetail()
      
      { 
          var jumlah = $('#jumlah').val();
          var idparcel = $('#idparcel').val();
          var idheadsetting = $('#idheadsetting').val();
          var priceheadsetting = $('#priceheadsetting').val();
          var iddetail = $('#iddetail').val();
          var harga = $('#harga').val();
          var berat = $('#berat').val();
          var parcel = $('#parcel').val();
          var status = $('#status').val();
          
      
          $.ajax({
              url: "<?php echo base_url("dua_d_design/addsubdetail");?>",
              type: "POST",
              data: {
                iddetail: iddetail,
                idparcel: idparcel,
                status: status,
                jumlah: jumlah,
                berat: berat,
                idheadsetting: idheadsetting,
                priceheadsetting: priceheadsetting,
                harga: harga.replaceAll('.','')
              },
              success: function(msg){
                hitung()
                  update();

                   updateongkos(); 
                  updateharga();
                
                 
                  $('#addformsubdetail').hide()
                  
                   // document.getElementById("hargaheadsetting").value = priceheadsetting*jumlah
                 
                
              }
            });    
              document.getElementById("jumlah").value = "";
              document.getElementById("idheadsetting").value = "";
              document.getElementById("harga").value = "";
              document.getElementById("berat").value = "";
              document.getElementById("color").value = "";
              document.getElementById("clarity").value = "";
              document.getElementById("shape").value = "";
              document.getElementById("idparcel").value = "";
              document.getElementById("parcel").value = "";  
      }

     $(document).ready(function () {

                  updateongkos();
                  update();
                  updateharga();                     
          });

        const entersubdetail = document.querySelector(".input"); 
        entersubdetail.addEventListener("keyup", function(e){
          e.preventDefault();
            if(e.keyCode === 13) {
                  var jumlah = $('#jumlah').val();
                  var idparcel = $('#idparcel').val();
                  var iddetail = $('#iddetail').val();
                  var harga = $('#harga').val();
                  var berat = $('#berat').val();
                  var idheadsetting = $('#idheadsetting').val();
                  var priceheadsetting = $('#priceheadsetting').val();
                  var parcel = $('#parcel').val();
                  var status = $('#status').val();
                $.ajax({
                    url: "<?php echo base_url("dua_d_design/addsubdetail");?>",
                    type: "POST",
                    data: {
                      iddetail: iddetail,
                      idparcel: idparcel,
                      status: status,
                      jumlah: jumlah,
                      berat: berat,
                      idheadsetting: idheadsetting,
                      priceheadsetting: priceheadsetting,
                      harga: harga.replaceAll('.','')
                    },
                    success: function(msg){

                        updateongkos();
                        hitung()
                        update();
                        updateongkos(); 
                        updateharga(); 
                       
                        $('#addformsubdetail').hide()
                        
                      
                    }
                  });

                       document.getElementById("jumlah").value = "";
                      document.getElementById("harga").value = "";
                      document.getElementById("berat").value = "";
                      document.getElementById("color").value = "";
                      document.getElementById("clarity").value = "";
                      document.getElementById("shape").value = "";
                      document.getElementById("idparcel").value = "";
                      document.getElementById("parcel").value = "";  
                 
                
            }
           
        });
      function onblurfunctionupdatesubdetail()
      {
         
        let jumlah = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=jumlah]`);
        let berat = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=berat]`);
        let harga = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=harga]`);
        let idparcel = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idparcel]`);
        let idsubdetail = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idsubdetail]`);
     
          $.ajax({
              url: "<?php echo base_url("dua_d_design/editesubdetail");?>",
              type: "POST",
              data: {
                idsubdetail: idsubdetail.value,
                idparcel: idparcel.value,
                jumlah: jumlah.value,
                berat: berat.value,
                harga: harga.value,
              },

              success: function(msg){
                   
                   updateongkos();
                   update();
                   updateharga();


                
              }
            });
      }
       $(document).on('click','#btndeletesubdetail',function(e){
         e.preventDefault();
         var idsubdetail = $(this).attr('data-idsubdetail');
         var iddetail = $(this).attr('data-iddetail');
         $.ajax({
          url: "<?php echo base_url(). 'dua_d_design/deletesubdetail';?>",
          type:"post",
          data: { 
              idsubdetail: idsubdetail,
              iddetail: iddetail,
          },
          success:function(){

               updateongkos();
              update();
               updateharga();
          }
        });
      });
       
    
        function update() {
     
          
                $.ajax({
                    url: '<?php echo base_url("ajax/getdetaildiamond");?>',
                    type: 'get',
                    success: function(data) {
                     
                        let result = "";
                        data = JSON.parse(data);
                        for (let i=0; i < data.length; i++) {
                           result += `
                                       <tr id="user${data[i].id_subdetail}">
                                        <form id="formeditsubdetail"  enctype="multipart/form-data" method="post" accept-charset="utf-8" >
                                           <td style="width: 200px"><input readonly style="padding-bottom: 10px;width: 250px;" value="${data[i].id_subdetail}" id="idsubdetail" type="hidden" name="idsubdetail" class="form-control" > <input  style="padding-bottom: 10px;max-width: 250px;" readonly value="${data[i].parcel}" id="parcel_" type="text" name="parcel" class="form-control" ><input style="padding-bottom: 10px;max-width: 1000px;" value="${data[i].id_parcel}" id="id_parcel_" type="hidden" name="idparcel" class="form-control" ></td>
                                           <td style="width: 100px"><input readonly style="padding-bottom: 10px;width: 150px;text-align:right;" value="${data[i].harga}" id="harga_" type="text" name="harga" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].clarity}" id="clarity_" type="text" name="clarity" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].shape}" id="shape_" type="text" name="shape" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].color}" id="color_" type="text" name="color" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].headsetting}" id="headsetting" type="text" name="headsetting" class="form-control" ></td>
                                           <td style="width: 150px"><input style="padding-bottom: 10px;width: 150px;text-align:right" value="${data[i].jumlah}" id="jumlah_" type="number" step="any" onblur="onblurfunctionupdatesubdetail()"  name="jumlah" class="form-control" ></td>
                                           <td style="width: 150px"><input  style="padding-bottom: 10px;width: 150px;text-align:right" value="${data[i].berat}" id="berat_" type="number" step="any" onblur="onblurfunctionupdatesubdetail()" name="berat" class="updatesubdetail form-control" ></td>
                                           <td> 
                                           <a href="#" id="btndeletesubdetail"   data-idsubdetail='${data[i].id_subdetail}' data-iddetail='${data[i].id_detail}'   class="hapussubdetaildesain btn btn-sm btn-danger" role="button" title="<?php echo $this->lang->line('delete'); ?>">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                            
                                               
                                           </td>
                                    </form>
                                      
                                      </tr> `;
                        }
                            let table = document.querySelector("#tabledetaildiamond");
                          
                            table.innerHTML = result;
                       
                    }
                });

            }
        function updateongkos(){
          ongkoslainnya =  $('#hargaongkoslainnya').val();
          ongkosrangka =  $('#ongkosrangka').val();
          headsetting =  $('#hargaheadsetting').val();
          diamond =  $('#hargadiamond').val();
          // console.log(diamond)
          
          totalongkos = parseInt(ongkoslainnya)+parseInt(ongkosrangka)+parseInt(headsetting)

          
            if (ongkoslainnya == "" || ongkosrangka == "" || headsetting == "" ) {
                   document.getElementById('hargaongkos_').value = 0;
                }else if(ongkoslainnya =! "" || ongkosrangka != "" || headsetting != ""){
                       document.getElementById("hargaongkos").value = totalongkos;
                       document.getElementById("hargaongkos_").value = formatNumber(totalongkos);
                }
      

        }
        function updateharga() {

                $.ajax({
                    url: '<?php echo base_url("dua_d_design/gethargadiamond");?>',
                    type: 'get',
                    success: function(data) { 
                        $('#tampilharga').html(data);
                        hitung();
                        updateongkos()
                    }
                });

            }


           
    </script>

    <script>
         $(document).ready(function () {
                  updatediamond();   
                  updatehargadiamond();    
                  updateprodukedit();
                  updatehargaprodukedit();  
                           updateongkos(); 

          });
      
       function onblurfunctionaddsubdetail_edit()
      
      {

          var jumlah = $('#jumlah').val();
          var idparcel = $('#idparcel').val();
          var iddetail = $('#id_detail').val();
          var harga = $('#harga').val();
          var berat = $('#berat').val();
          var parcel = $('#parcel').val();
          var status = $('#status').val(); 
          var idheadsetting = $('#idheadsetting').val();
          var priceheadsetting = $('#priceheadsetting').val();

          // console.log(iddetail, idparcel, jumlah, harga, berat, parcel);
          $.ajax({
              url: "<?php echo base_url("dua_d_design/addsubdetail");?>",
              type: "POST",
              data: {
                iddetail: iddetail,
                idparcel: idparcel,
                jumlah: jumlah,
                berat: berat, 
                status   : status,
                idheadsetting: idheadsetting,
                priceheadsetting: priceheadsetting,
                harga: harga.replaceAll('.','')
              },
              success: function(msg){
                  hitung()
                   updateongkos();
                  updatediamond();
                  updatehargadiamond(); 
                 
                  $('#addformsubdetail').hide()
                 
                
              }
            });

              document.getElementById("idheadsetting").value = "";
              document.getElementById("jumlah").value = "";
              document.getElementById("harga").value = "";
              document.getElementById("berat").value = "";
              document.getElementById("color").value = "";
              document.getElementById("clarity").value = "";
              document.getElementById("shape").value = "";
              document.getElementById("idparcel").value = "";
              document.getElementById("parcel").value = "";
    
              
      }
       function updatediamond() {
              var iddetail = $('#id_detail').val();
              console.log(iddetail);
                $.ajax({
                    url: '<?php echo base_url("ajax/getdetaildiamond_edit");?>',
                    type: 'post',
                     data: {
                        iddetail: iddetail
                    },
                    success: function(data) {     
                        let tampildiamond = "";
                        data = JSON.parse(data);
                        for (let i=0; i < data.length; i++) {
                           tampildiamond += `
                                       <tr id="diamond${data[i].id_subdetail}">
                                        <form id="formsubdetailedit"  enctype="multipart/form-data" method="post" accept-charset="utf-8" >
                                           <td style="width: 250px"><input readonly style="padding-bottom: 10px;width: 250px;" value="${data[i].id_subdetail}" id="idsubdetail" type="hidden" name="idsubdetail" class="form-control" > <input  style="padding-bottom: 10px;width: 250px;" readonly value="${data[i].parcel}" id="parcel_" type="text" name="parcel" class="form-control" ><input style="padding-bottom: 10px;width: 10px;" value="${data[i].id_parcel}" id="id_parcel_" type="hidden" name="idparcel" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;text-align:right;" value="${data[i].harga}" id="harga_" type="text" name="hargadetail" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].clarity}" id="clarity_" type="text" name="clarity" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].shape}" id="shape_" type="text" name="shape" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].color}" id="color_" type="text" name="color" class="form-control" ></td>
                                            <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].headsetting}" id="headsetting" type="text" name="headsetting" class="form-control" ></td>
                                           <td style="width: 150px"><input style="padding-bottom: 10px;width: 150px;text-align:right" value="${data[i].jumlah}" id="jumlah_" type="text" onblur="onblurfunctionsubdetailedit()" name="jumlah" class="form-control" ></td>
                                           <td style="width: 150px"><input  style="padding-bottom: 10px;width: 150px;text-align:right" value="${data[i].berat}" id="berat_" type="text" onblur="onblurfunctionsubdetailedit()" name="berat" class="updatesubdetail form-control" ></td>
                                           <td> 
                                           <a href="#" id="btndeletesubdetailedit"   data-idsubdetail='${data[i].id_subdetail}' data-iddetail='${data[i].id_detail}'   class="hapussubdetaildesain btn btn-sm btn-danger" role="button" title="<?php echo $this->lang->line('delete'); ?>">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                            
                                               
                                           </td>
                                    </form>
                                      
                                      </tr> `;
                        }
                            let tablesubdetail = document.querySelector("#tabledetaildiamondedit");
                          
                            tablesubdetail.innerHTML = tampildiamond;
                       
                    }
                });

            }
              function updatehargadiamond() {
                var iddetail = $('#id_detail').val();
                $.ajax({
                    url: '<?php echo base_url("dua_d_design/gethargadiamond_edit");?>',
                    type: 'post',
                     data: {
                        iddetail: iddetail
                    },
                    success: function(data) {
                        $('#tampilhargadiamondedit').html(data);
                        updateongkos();
                        hitung();
                        
                    }
                });

            }
       function onblurfunctionsubdetailedit()
      {
         
        let jumlah_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=jumlah]`);
        let berat_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=berat]`);
        let harga_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=hargadetail]`);
        let idparcel_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idparcel]`);
        let idsubdetail_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idsubdetail]`);
     
     
          $.ajax({
              url: "<?php echo base_url("dua_d_design/editesubdetail");?>",
              type: "POST",
              data: {
                idsubdetail: idsubdetail_.value,
                idparcel: idparcel_.value,
                jumlah: jumlah_.value,
                berat: berat_.value,
                harga: harga_.value, 
              },

              success: function(msg){
                  hitung();
                  updatediamond();
                  updatehargadiamond(); 
                  updateongkos();
                
              }
            });
      }
       $(document).on('click','#btndeletesubdetailedit',function(e){
         e.preventDefault();
         var idsubdetail = $(this).attr('data-idsubdetail');
         var iddetail = $(this).attr('data-iddetail');
         $.ajax({
          url: "<?php echo base_url(). 'dua_d_design/deletesubdetail';?>",
          type:"post",
          data: { 
              idsubdetail: idsubdetail,
              iddetail: iddetail,
          },
          success:function(){
                updatediamond();
                updatehargadiamond(); 
                updateongkos();
          }
        });
      });

      function updateprodukedit() {
                var iddetail = $('#id_detail').val();
                $.ajax({
                    url: '<?php echo base_url("ajax/getdetailproduk_edit");?>',
                    type: 'post',
                    data: {
                        iddetail: iddetail
                    },
                    success: function(data) {
                       let produk = "";
                        data = JSON.parse(data);
                        for (let i=0; i < data.length; i++) {
                           produk += `
                                      <tr id="kepala${data[i].id_subdetailkepala}">
                                           <td style="width: 250px"> <input readonly  style="padding-bottom: 10px;width: 250px;" value="${data[i].namaproduk}" id="produk_" type="text" name="produk" class="form-control" ><input style="padding-bottom: 10px;width: 10px;" value="${data[i].id_produk}" id="idproduk_" type="hidden" name="idbarang" class="form-control" ><input style="padding-bottom: 10px;width: 10px;" value="${data[i].id_subdetailkepala}" id="idsubdetailkepala_" type="hidden" name="idsubdetailkepala" class="form-control" ><input style="padding-bottom: 10px;width: 10px;" value="${data[i].id_detail}" id="idsubdetailkepala_" type="hidden" name="iddetail" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].tipeproduk}" id="tipeproduk_" type="text" name="tipeproduk" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].brand}" id="brand_" type="text" name="brand" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;text-align:right" value="${data[i].etalase}" id="etalase_" type="text" name="etalase" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;" value="${data[i].kondisi}" id="kondisi_" type="text" name="kondisi" class="form-control" ></td>
                                           <td style="width: 150px"><input readonly style="padding-bottom: 10px;width: 150px;text-align:right" value='${data[i].harga}'' id="harga_" type="text" name="hargaproduk" class="form-control" ></td>
                                           <td style="width: 150px"><input  style="padding-bottom: 10px;width: 150px;text-align:right" value="${data[i].jumlah}" id="jumlah_" type="number" step="any" name="jumlah" onblur="onblurfunctionupdatesubdetailkepalaedit()" class="form-control" ></td>
                                           <td> <a href="#"  id="btndeleteprodukdetail_edit" data-idsubdetailkepala="${data[i].id_subdetailkepala}" data-iddetail="${data[i].id_detail}"   class="hapusdetailproduk btn btn-sm btn-danger" role="button" title="<?php echo $this->lang->line('delete'); ?>">  <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                           </td>
                                      </tr>
                                      `;
                        }
                            let tabledetailprodukedit = document.querySelector("#tabledetailprodukedit");
                          
                            tabledetailprodukedit.innerHTML = produk;
                    }
                });

            }
      function updatehargaprodukedit() {
        var iddetail = $('#id_detail').val();
        $.ajax({
            url: '<?php echo base_url("dua_d_design/getkepala_edit");?>',
            type: 'post',
            data :{
              iddetail:iddetail
            },
            success: function(data) {
                $('#tampilhargaprodukedit').html(data);
                 hitung();
            }
        });
      }
      const enterkepalaedit = document.querySelector(".inputkepalaedit"); 
        enterkepalaedit.addEventListener("keyup", function(e){
          e.preventDefault();
            if(e.keyCode === 13) {
               
                var jumlah = $('#jumlahproduk').val();
          var idbarang = $('#idbarang').val();
          var iddetail = $('#id_detail').val();
          var harga = $('#hargaproduk').val();
          var status = $('#status').val();
          $.ajax({
              url: "<?php echo base_url("dua_d_design/adddetailkepala");?>",
              type: "POST",
              data: {
                iddetail: iddetail,
                id_barang: idbarang,
                jumlah: jumlah,
                harga: harga,
                status: status,
              },
              success: function(msg){
                  updateprodukedit();
                  updatehargaprodukedit(); 
                  hitung();
                 $('#addformdetailkepala').hide();
                 
                
              }
            });   
             document.getElementById("jumlahproduk").value = "";
                  document.getElementById("hargaproduk").value = "";
                  document.getElementById("hargaproduk_").value = "";
                  document.getElementById("tipeproduk").value = "";
                  document.getElementById("brand").value = "";
                  document.getElementById("etalase").value = "";
                  document.getElementById("kondisi").value = "";
                  document.getElementById("idbarang").value = "";
                  document.getElementById("produk").value = "";     
            }
           
        });
      function onblurfunctionadddetailkepala_edit()
      {
          var jumlah = $('#jumlahproduk').val();
          var idbarang = $('#idbarang').val();
          var iddetail = $('#id_detail').val();
          var harga = $('#hargaproduk').val();
          var status = $('#status').val();
          $.ajax({
              url: "<?php echo base_url("dua_d_design/adddetailkepala");?>",
              type: "POST",
              data: {
                iddetail: iddetail,
                id_barang: idbarang,
                jumlah: jumlah,
                harga: harga,
                status: status,
              },
              success: function(msg){
                  updateprodukedit();
                  updatehargaprodukedit(); 
                  hitung();
                 $('#addformdetailkepala').hide();
                  document.getElementById("jumlahproduk").value = "";
                  document.getElementById("hargaproduk").value = "";
                  document.getElementById("hargaproduk_").value = "";
                  document.getElementById("tipeproduk").value = "";
                  document.getElementById("brand").value = "";
                  document.getElementById("etalase").value = "";
                  document.getElementById("kondisi").value = "";
                  document.getElementById("idbarang").value = "";
                  document.getElementById("produk").value = "";
                
              }
            });     
      }
      function onblurfunctionupdatesubdetailkepalaedit()
      {
         
        let jumlah_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=jumlah]`);
        let harga_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=hargaproduk]`);
        let idbarang_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idbarang]`);
        let idsubdetailkepala_ = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idsubdetailkepala]`);

  
        
          $.ajax({
              url: "<?php echo base_url("dua_d_design/editeprodukdetail");?>",
              type: "POST",
              data: {
                idsubdetailkepala: idsubdetailkepala_.value,
                idbarang: idbarang_.value,
                jumlah: jumlah_.value,
                harga: harga_.value,
              },

              success: function(msg){
                 updateprodukedit();
                 updatehargaprodukedit();

              }
            });
      }
      $(document).on('click','#btndeleteprodukdetail_edit',function(e){
         e.preventDefault();
         var idsubdetailkepala = $(this).attr('data-idsubdetailkepala');
         var iddetail = $(this).attr('data-iddetail');
         $.ajax({
          url: "<?php echo base_url(). 'dua_d_design/deletedetailproduk';?>",
          type:"post",
          data: { 
              idsubdetailkepala: idsubdetailkepala,
              iddetail: iddetail,
          },
          success:function(){
              updateprodukedit();
              supdatehargaprodukedit();
          }
        });
      });
    </script>
    <script>
        $("select[id=inout]").on("change", function() { 
            if ($(this).val() == "I") {
              document.getElementById("detail1").innerHTML = "<?php echo $this->lang->line('debit'); ?>"; 
              document.getElementById("detail2").innerHTML = "<?php echo $this->lang->line('credit'); ?>"; 
            } 
            else if ($(this).val() == "O")  { 
             document.getElementById("detail1").innerHTML = "<?php echo $this->lang->line('credit'); ?>"; 
              document.getElementById("detail2").innerHTML = "<?php echo $this->lang->line('debit'); ?>"; 
            } 
          }); 
        $("select[id=inout]").trigger("change");
    </script>
     <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.editprodukdetail').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodaleditprodukdetail").html('<input style="padding-bottom: 10px;" type="hidden" name="idsubdetailkepala" id="idsubdetailkepala" class="form-control" value='+datanya[0]+'> <input style="padding-bottom: 10px;" type="hidden" name="iddetail" class="form-control" value='+datanya[1]+'><div class="row"><div class="col-md-6"><div class="form-group"> <label class="bmd-label-floating">Jumlah <small class="text-danger">*</small></label><input type="text" name="jumlah" value='+datanya[2]+' id="jumlah" class="form-control"></div> </div><div class="col-md-6"> <div class="form-group">  <label class="bmd-label-floating">Harga <small class="text-danger">*</small></label><input type="text" name="hargaproduk" id="hargaproduk_" value='+datanya[3]+' class="form-control"> </div> </div></div>');
        });
    });
    </script>
    <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.hapusdetailproduk').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodalhapusdetailproduk").html('<input style="padding-bottom: 10px;" type="hidden" name="idsubdetailkepala" class="form-control" value='+datanya[0]+'> <input style="padding-bottom: 10px;" type="hidden" name="iddetail" class="form-control" value='+datanya[1]+'> <?php echo $this->lang->line('confirmdelete'); ?>');
        });
    
    });
    </script>
      <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.editsubdetail').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodaledit").html('<input style="padding-bottom: 10px;" type="hidden" name="idsubdetail" id="idsubdetail_" class="form-control" value='+datanya[0]+'> <input style="padding-bottom: 10px;" type="hidden" name="iddetail" class="form-control" value='+datanya[1]+'><div class="row"><div class="col-md-6"><div class="form-group"> <label class="bmd-label-floating">Jumlah <small class="text-danger">*</small></label><input type="text" name="jumlah" value='+datanya[2]+' id="jumlah" class="form-control"></div> </div><div class="col-md-6"> <div class="form-group">  <label class="bmd-label-floating">Berat <small class="text-danger">*</small></label><input type="text" name="berat" id="berat" value='+datanya[3]+' class="form-control"> </div> </div></div>');
        });
    });
    </script>
   
    <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.hapus').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodal").html('<input style="padding-bottom: 10px;" type="hidden" name="akun" class="form-control" value='+datanya[0]+'> <input style="padding-bottom: 10px;" type="hidden" name="kode" class="form-control" value='+datanya[1]+'> <input style="padding-bottom: 10px;" type="hidden" name="headerdetail" class="form-control" value='+datanya[2]+'><?php echo $this->lang->line('confirmdelete'); ?>');
        });
    
    });
    </script>
     <script>
            let input = document.querySelectorAll("tbody#updatedetail .js-nilai");
            input.forEach(elm => {
                    elm.addEventListener("blur", function(event) {
                        let akun = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=akun]`);
                        let keterangan = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=keterangan]`);
                        let nilai = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=nilai]`);
                        let idcashbankdetail = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idcashbankdetail]`);
                        let idcashbankheader = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idcashbankheader]`);

                        $.ajax({
                          url: "<?php echo base_url("cashbank/updatedetailcashbank");?>",
                          type: "POST",
                          data: {
                            idcashbankdetail: idcashbankdetail.value,
                            idcashbankheader: idcashbankheader.value,
                            akun: akun.value,
                            keterangan: keterangan.value,
                            nilai: nilai.value.replaceAll('.','')
                          },
                          success: function(msg){
                          location.reload();
                           //console.log(idcashbankdetail, idcashbankheader, akun, nilai, keterangan);
                          }
                        });
                  //         
          
                    });
                })
        </script>
      <script> 
            let inputa = document.querySelectorAll("tbody#updatedetaillawan .js-nilai");
            inputa.forEach(elm => {
                    elm.addEventListener("blur", function(event) {
                        let akun = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=akun]`);
                        let keterangan = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=keterangan]`);
                        let nilai = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=nilai]`);
                        let idcashbanklawan = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idcashbanklawan]`);
                        let idcashbankheader = document.querySelector(`tr#${event.target.parentNode.parentNode.id} input[name=idcashbankheader]`);

                          $.ajax({
                            url: "<?php echo base_url("cashbank/updatedetailcashbanklawan");?>",
                            type: "POST",
                            data: {
                              idcashbanklawan: idcashbanklawan.value,
                              idcashbankheader: idcashbankheader.value,
                              akun: akun.value,
                              keterangan: keterangan.value,
                              nilai: nilai.value.replaceAll('.','')
                            },
                            success: function(msg){
                            location.reload();
                          
                            }
                          });
                  //         
          
                    });
                })
      </script>
    <script type="text/javascript">
      function onblurfunctionlawan()
      {

          
          var akun = $('#akundua').val();
          var keterangan = $('#namaakundua').val();
          var nilai = $('#nilai1').val();
        
          $.ajax({
              url: "<?php echo base_url("cashbank/addcashlawan");?>",
              type: "POST",
              data: {
                akun: akun,
                keterangan: keterangan,
                nilai: nilai.replaceAll('.','')
              },
              success: function(msg){
                 location.reload();
                
              }
            });
              
      }

      // function onblurfunctionubahlawan()
      // {
          
          
              
      // }

      function onblurfunctiondetail()
      {

          
          var akun = $('#akun').val();
          var keterangan = $('#namaakun').val();
          var nilai = $('#nilai2').val();
        
          $.ajax({
              url: "<?php echo base_url("cashbank/addcashdetail");?>",
              type: "POST",
              data: {
                akun: akun,
                keterangan: keterangan,
                nilai: nilai.replaceAll('.','')
              },
              success: function(msg){
                 location.reload();
                
              }
            });
              
      }
      // function onblurfunctionubahdetail()
      // {
          
      //     var akun = $('#akun3').val();
      //     var keterangan = $('#keterangan').val();
      //     var nilai = $('#nilai').val();
      //     var idcashbankdetail = $('#idcashbankdetail').val();
      //     var idcashbankheader = $('#idcashbankheader').val();

          
      //     $.ajax({
      //         url: "<?php echo base_url("Pengaturan/updatedetailcashbank");?>",
      //         type: "POST",
      //         data: {
      //           idcashbankdetail: idcashbankdetail,
      //           idcashbankheader: idcashbankheader,
      //           akun: akun,
      //           keterangan: keterangan,
      //           nilai: nilai.replaceAll('.','')
      //         },
      //         success: function(msg){
      //         location.reload();
      //          //console.log(idcashbankdetail, idcashbankheader, akun, nilai, keterangan);
      //         }
      //       });
              
      // }


    </script>
    <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.hapusdetailcashbank').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodalhapus").html('<input style="padding-bottom: 10px;" type="hidden" name="id_cashbankdetail" class="form-control" value='+datanya[0]+'> <input style="padding-bottom: 10px;" type="hidden" name="id_cashbankheader" class="form-control" value='+datanya[1]+'><?php echo $this->lang->line('confirmdelete'); ?>');
        });
    
    });
    </script>
      <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.hapusdetail2ddesain').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodalhapusdetail2d").html('<input style="padding-bottom: 10px;" type="hidden" name="id_header" class="form-control" value='+datanya[0]+'><?php echo $this->lang->line('confirmdelete'); ?>');
        });
    
    });
    </script>
     <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.hapuscashbanklawan').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodalhapus1").html('<input style="padding-bottom: 10px;" type="hidden" name="id_cashbanklawan" class="form-control" value='+datanya[0]+'> <input style="padding-bottom: 10px;" type="hidden" name="id_cashbankheader" class="form-control" value='+datanya[1]+'><?php echo $this->lang->line('confirmdelete'); ?>');
        });
    
    });
    </script>

    <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.hapusdetaildesain').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodalhapusdesaindetail").html('<input style="padding-bottom: 10px;" type="hidden" name="id_detail" class="form-control" value='+datanya[0]+'> <input style="padding-bottom: 10px;" type="hidden" name="id_header" class="form-control" value='+datanya[1]+'><input style="padding-bottom: 10px;" type="hidden" name="gambar1" class="form-control" value='+datanya[2]+'><input style="padding-bottom: 10px;" type="hidden" name="gambar2" class="form-control" value='+datanya[3]+'><input style="padding-bottom: 10px;" type="hidden" name="gambar3" class="form-control" value='+datanya[4]+'><input style="padding-bottom: 10px;" type="hidden" name="gambar4" class="form-control" value='+datanya[5]+'><input style="padding-bottom: 10px;" type="hidden" name="gambar5" class="form-control" value='+datanya[6]+'><input style="padding-bottom: 10px;" type="hidden" name="video1" class="form-control" value='+datanya[7]+'><input style="padding-bottom: 10px;" type="hidden" name="video2" class="form-control" value='+datanya[8]+'><input style="padding-bottom: 10px;" type="hidden" name="video3" class="form-control" value='+datanya[9]+'><?php echo $this->lang->line('confirmdelete'); ?>');
        });
    
    });
    </script>


    <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.editdetaildesain').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodaleditdesaindetail").html('<input style="padding-bottom: 10px;" type="hidden" name="id_detail" class="form-control" value='+datanya[0]+'>Apakah anda yakin ingin mengubah data ini ?');
        });
    
    });
    </script>

     <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.editrole').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodalrole").html('<input style="padding-bottom: 10px;" type="hidden" name="idrole" class="form-control" value='+datanya[0]+'> <label class="bmd-label-floating">Role<small class="text-danger">*</small></label>  <input style="padding-bottom: 10px;" value='+datanya[1]+' type="text" name="role" class="form-control" required>');
        });
    
    });
    </script>

     <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.addsubdetail').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#isimodalsubdetail").html('<div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Id Detail</label><input style="padding-bottom: 10px;" type="text" name="iddetail" class="form-control" value='+datanya[0]+' readonly> </div></div></div>');
        });
    
    });
    </script>
  
<!--     <script>
        function hitung(value) {
              var totalcashbankdetail = document.getElementById('totalnilaicashbankdetail').value;
              var totalcashbanklawawn = document.getElementById('totalnilaicashbanklawan').value;
              var result = (totalcashbankdetail) + parseInt(totalcashbanklawawn);
              if (!isNaN(result)) {
                 document.getElementById('totalcashbankheader').value = result;
              }
        }
    </script> -->
    <script>
        $("select[id=headerdetail]").on("change", function() { 
          if ($(this).val() == "") {
              $("div[id=groupakun] ").hide(); 

            } else if ($(this).val() == "H") {
              $("div[id=groupakun] ").hide(); 

            } 
            else if ($(this).val() == "D")  { 
             $("div[id=groupakun] ").show(); 
            } 
          }); 
        $("select[id=headerdetail]").trigger("change");
    </script>
    <script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.ubah').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#IsiModal").html('<input style="padding-bottom: 10px;" type="hidden" name="id" class="form-control" value='+datanya[0]+'><input style="padding-bottom: 10px;" type="hidden" name="subtotal" class="form-control" value='+datanya[5]+'><input style="padding-bottom: 10px;" type="hidden" name="stok" class="form-control" value='+datanya[6]+'> <div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Id Barang</label><input style="padding-bottom: 10px;" type="text" name="idbarang" class="form-control" value='+datanya[1]+' readonly> </div></div><div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Nama Barang</label><input style="padding-bottom: 10px;" type="text" name="namabarang" class="form-control" value='+datanya[2]+' readonly> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Harga Jual</label><input style="padding-bottom: 10px;" type="text" name="hargajual" class="form-control" value='+datanya[3]+' readonly></div></div><div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Jumlah Beli</label><input style="padding-bottom: 10px;" type="text" name="jumlahbeli" class="form-control" value='+datanya[4]+'><input style="padding-bottom: 10px;" type="hidden" name="jumlahbeliasal" class="form-control" value='+datanya[4]+'></div></div></div> ');
        });
    
    });
</script>
<script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.change').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");

        console.log(datanya);
        $("#IsiModalChange").html('<input style="padding-bottom: 10px;" type="hidden" name="idcashbanklawan" class="form-control" value='+datanya[0]+'><input style="padding-bottom: 10px;" type="hidden" name="idcashbankheader" class="form-control" value='+datanya[1]+'><div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Cash Bank</label><input style="padding-bottom: 10px;" type="text" name="akun" class="form-control" value='+datanya[2]+' readonly> </div></div><div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Keterangan</label><input style="padding-bottom: 10px;" type="text" name="keterangan" class="form-control" value="'+datanya[3]+'"> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Amount</label><input style="padding-bottom: 10px;" type="text" name="nilai" class="form-control" value='+datanya[4]+'></div></div> ');
        });
    
    });
</script>
<script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.change2').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");

        console.log(datanya);
        $("#IsiModalChange2").html('<input style="padding-bottom: 10px;" type="hidden" name="idcashbankdetail" class="form-control" value='+datanya[0]+'><input style="padding-bottom: 10px;" type="hidden" name="idcashbankheader" class="form-control" value='+datanya[1]+'><div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Cash Bank</label><input style="padding-bottom: 10px;" type="text" name="akun" class="form-control" value='+datanya[2]+' readonly> </div></div><div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Keterangan</label><input style="padding-bottom: 10px;" type="text" name="keterangan" class="form-control" value="'+datanya[3]+'"> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Amount</label><input style="padding-bottom: 10px;" type="text" name="nilai" class="form-control" value='+datanya[4]+'></div></div> ');
        });
    
    });
</script>
<!-- <script>
    $(document).ready(function() {
        
        $('.change').on("click", function(){
        
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");

        console.log(datanya);
        $("#IsiModalChange").html('<input style="padding-bottom: 10px;" type="hidden" name="id" class="form-control" value='+datanya[0]+'><div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Cash Bank</label><input style="padding-bottom: 10px;" type="text" name="akun" class="form-control" value='+datanya[2]+' readonly> </div></div><div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Keterangan</label><input style="padding-bottom: 10px;" type="text" name="keterangan" class="form-control" value='+datanya[3]+';> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">Amount</label><input style="padding-bottom: 10px;" type="text" name="nilai" class="form-control" value='+datanya[4]+'></div></div> ');
        });
    
    });
</script> -->
<script>
    $(document).ready(function() {
            // ketika tombol detail ditekan
        $('.delete').on("click", function(){
        // ambil nilai id dari link print
        var DataJadwal= this.id;
        var datanya = DataJadwal.split("|");
        $("#IsiModalDelete").html('<input style="padding-bottom: 10px;" type="hidden" name="id" class="form-control" value='+datanya[0]+'><input style="padding-bottom: 10px;" type="hidden" name="idbarang" class="form-control" value='+datanya[1]+'><input style="padding-bottom: 10px;" type="hidden" name="jumlahbeli" class="form-control" value='+datanya[2]+'> <input style="padding-bottom: 10px;" type="hidden" name="stok" class="form-control" value='+datanya[3]+'> Apakah anda yakin ingin menghapus data ini ?');
        });
    
    });
    </script>
    
 
</body>

</html>