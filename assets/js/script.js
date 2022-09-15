$navbar = $(".navbar-customer");
$(window).scroll(function (e) {
  if ($(document).scrollTop() > 0) {
    $navbar.addClass("shadow-sm");
  } else {
    $navbar.removeClass("shadow-sm");
  }
});
function hitungtotal(){
   var totalbayar = document.getElementById('totalbayar').value;
   var bayar = document.getElementById('bayar').value;

  var kembalian = parseInt(bayar)  - parseInt(totalbayar);
  if (!isNaN(kembalian)) {
    document.getElementById('kembalian').value = kembalian;
  }    
}

function previewfile() {
  const picture = document.querySelector("#file-input");
  const pictureLabel = document.querySelector("#file-label");
  const imgPreview = document.querySelector("#file-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}
function previewfile2() {
  const picture = document.querySelector("#file2-input");
  const pictureLabel = document.querySelector("#file2-label");
  const imgPreview = document.querySelector("#file2-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}
function previewfile3() {
  const picture = document.querySelector("#file3-input");
  const pictureLabel = document.querySelector("#file3-label");
  const imgPreview = document.querySelector("#file3-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}
function previewfile4() {
  const picture = document.querySelector("#file4-input");
  const pictureLabel = document.querySelector("#file4-label");
  const imgPreview = document.querySelector("#file4-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}
function previewfile5() {
  const picture = document.querySelector("#file5-input");
  const pictureLabel = document.querySelector("#file5-label");
  const imgPreview = document.querySelector("#file5-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}



function previewfile6() {
  const picture = document.querySelector("#file6-input");
  const pictureLabel = document.querySelector("#file6-label");
  const imgPreview = document.querySelector("#file6-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}
function previewfile7() {
  const picture = document.querySelector("#file7-input");
  const pictureLabel = document.querySelector("#file7-label");
  const imgPreview = document.querySelector("#file7-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}
function previewfile8() {
  const picture = document.querySelector("#file8-input");
  const pictureLabel = document.querySelector("#file8-label");
  const imgPreview = document.querySelector("#file8-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}
function previewfile9() {
  const picture = document.querySelector("#file9-input");
  const pictureLabel = document.querySelector("#file9-label");
  const imgPreview = document.querySelector("#file9-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };

}

function previewPassword(elem, id) {
  const iconEye = elem.lastChild;
  // const elmPassword =
  //   elem.parentElement.parentElement.parentElement.firstElementChild;
  const elmPassword = document.getElementById(id);
  if (iconEye.classList.contains("fa-eye-slash")) {
    iconEye.classList.replace("fa-eye-slash", "fa-eye");
    elmPassword.setAttribute("type", "text");
  } else {
    iconEye.classList.replace("fa-eye", "fa-eye-slash");
    elmPassword.setAttribute("type", "password");
  }
}

function openDeleteModal(elem, link) {
  const id = $(elem).data("id");
  $("#valueId").attr("value", id);
  $("#formLinkDelete").attr("action", link);
}

function diametermodal(){
      $(document).on('click', '#diameter', function (e) {
        document.getElementById("iddiameter").value = $(this).attr('data-id');
        document.getElementById("diagroup").value = $(this).attr('data-diagroup');
        document.getElementById("diameterfrom").value = $(this).attr('data-diameterfrom');
        document.getElementById("diameterto").value = $(this).attr('data-diameterto');
        document.getElementById("carat").value = $(this).attr('data-carat');

        $('#modaldiameter').modal('hide');
      }); 
      
}

function coasatmdoal(){
      $(document).on('click', '#coasat', function (e) {
        document.getElementById("akun").value = $(this).attr('data-akun');
        document.getElementById("namaakun").value = $(this).attr('data-namaakun');

        $('#modalcoasat').modal('hide');
      }); 
      
}

function coaduamdoal(){
      $(document).on('click', '#coadua', function (e) {
        document.getElementById("akundua").value = $(this).attr('data-akun');
        document.getElementById("namaakundua").value = $(this).attr('data-namaakun');

        $('#modalcoadua').modal('hide');
      }); 
      
}

function kursmodal(){
      $(document).on('click', '#kurs', function (e) {
        document.getElementById("idmatauang").value = $(this).attr('data-id');
        document.getElementById("kodematauang").value = $(this).attr('data-kodematauang');
        document.getElementById("rate").value = $(this).attr('data-rate');

        $('#modalmatauang').modal('hide');
      }); 
      
}
function subaccountmodal(){
      $(document).on('click', '#subaccount', function (e) {
        document.getElementById("subaccount").value = $(this).attr('data-subaccount');
        document.getElementById("nama").value = $(this).attr('data-nama');

        $('#modalsubaccount').modal('hide');
      }); 
      
}

function karyawanmodal(){
      $(document).on('click', '#karyawan', function (e) {
        document.getElementById("idkaryawan").value = $(this).attr('data-id');
        document.getElementById("nama").value = $(this).attr('data-nama');
        $('#modalkaryawan').modal('hide');
      }); 
      
}

function clientmodal(){
      $(document).on('click', '#client', function (e) {
        document.getElementById("namaklien").value = $(this).attr('data-namaclient');
        document.getElementById("idclient").value = $(this).attr('data-id');

        $('#modalclient').modal('hide');
      }); 
      
}

function modelmodal(){
      $(document).on('click', '#model', function (e) {
        document.getElementById("nomor").value = $(this).attr('data-nomor'); 
        document.getElementById("iddetail").value = $(this).attr('data-iddetail'); 

        $('#modal2ddesign').modal('hide');
      }); 
      
}

// function materialmodal(){
//       $(document).on('click', '#material', function (e) {
//         document.getElementById("idmaterial").value = $(this).attr('data-id');
//         document.getElementById("material").value = $(this).attr('data-material');
//         document.getElementById("hargamaterial_").value = $(this).attr('data-hargamaterial_');
//         document.getElementById("hargamaterial").value = $(this).attr('data-hargamaterial');
//         document.getElementById("satuan").value = $(this).attr('data-satuan');
//         document.getElementById("satuanjsfinishing").value = $(this).attr('data-satuan');
//         document.getElementById("satuanjspolesrangka").value = $(this).attr('data-satuan');
//         document.getElementById("satuanjspasangbatu").value = $(this).attr('data-satuan');
//         document.getElementById("satuanjsrakit").value = $(this).attr('data-satuan');
//         document.getElementById("satuanjspoleschrome").value = $(this).attr('data-satuan');
//         $('#modalmaterial').modal('hide');
//       }); 
      
// }

function tipedesignmodal(){
      $(document).on('click', '#tipedesign', function (e) {
        document.getElementById("idtipedesign").value = $(this).attr('data-id');
        document.getElementById("tipedesign").value = $(this).attr('data-tipedesign');
        $('#modaltipedesign').modal('hide');
      }); 
      
}
function finishingmodal(){
      $(document).on('click', '#finishing', function (e) {
        document.getElementById("idfinishing").value = $(this).attr('data-id');
        document.getElementById("finishing").value = $(this).attr('data-finishing');
        $('#modalfinishing').modal('hide');
      }); 
      
}
function konsepkepalamodal(){
      $(document).on('click', '#konsepkepala', function (e) {
        document.getElementById("idkonsepkepala").value = $(this).attr('data-id');
        document.getElementById("konsepkepala").value = $(this).attr('data-konsepkepala');
        $('#modalkonsepkepala').modal('hide');
      }); 
      
}

function ongkosmodal(){
      $(document).on('click', '#ongkos', function (e) {        document.getElementById("idongkos").value = $(this).attr('data-id');
        document.getElementById("ongkos").value = $(this).attr('data-ongkos');
        document.getElementById("hargaongkos").value = $(this).attr('data-hargaongkos');
        document.getElementById("hargaongkos_").value = $(this).attr('data-hargaongkos_');


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
        $('#modalongkos').modal('hide');
      }); 
      
}

function warnaprodukmodal(){
      // $(document).on('click', '#warnaproduk', function (e) {
      //   document.getElementById("idwarnaproduk").value = $(this).attr('data-id');
      //   document.getElementById("warnaproduk").value = ($(this).attr('data-warnaproduk'))
      //   $('#modalwarnaproduk').modal('hide');
      // }); 
    
      
}
$(document).on("click", ".open-AddBookDialog", function () {
     var id = $(this).data('id');
    // $(".modal-body #bookId").val( myBookId );

      $(document).on('click', '#warnaproduk', function (e) {
         var id = $(this).data('id');
        document.getElementById("idwarnaproduk").value = $(this).attr('data-id');
        document.querySelector(`#detail${id} #warnaproduk`).value = ($(this).attr('data-warnaproduk'))
        $('#modalwarnaproduk').modal('hide');
      }); 
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
    });

function categorymodal(){
      $(document).on('click', '#category', function (e) {
        document.getElementById("idcategory").value = $(this).attr('data-id');
        document.getElementById("category").value = $(this).attr('data-category');
        $('#modalcategory').modal('hide');
      }); 
      
}

function jenisgaransimodal(){
      $(document).on('click', '#jenisgaransi', function (e) {
        document.getElementById("idjenisgaransi").value = $(this).attr('data-id');
        document.getElementById("jenisgaransi").value = $(this).attr('data-jenisgaransi');
        $('#modaljenisgaransi').modal('hide');
      }); 
      
}

function brandmodal(){
      $(document).on('click', '#brand', function (e) {
        document.getElementById("idbrand").value = $(this).attr('data-id');
        document.getElementById("brand").value = $(this).attr('data-brand');
        $('#modalbrand').modal('hide');
      }); 
      
}
function periodegaransimodal(){
      $(document).on('click', '#periodegaransi', function (e) {
        document.getElementById("idperiodegaransi").value = $(this).attr('data-id');
        document.getElementById("periodegaransi").value = $(this).attr('data-periodegaransi');
        $('#modalperiodegaransi').modal('hide');
      }); 
      
}
function etalasemodal(){
      $(document).on('click', '#etalase', function (e) {
        document.getElementById("idetalase").value = $(this).attr('data-id');
        document.getElementById("etalase").value = $(this).attr('data-etalase');
        $('#modaletalase').modal('hide');
      }); 
      
}
function claimgaransimodal(){
      $(document).on('click', '#claimgaransi', function (e) {
        document.getElementById("idclaimgaransi").value = $(this).attr('data-id');
        document.getElementById("claimgaransi").value = $(this).attr('data-claimgaransi');
        $('#modalclaimgaransi').modal('hide');
      }); 
      
}

function satuanbesarmodal(){
      $(document).on('click', '#satuanbesar', function (e) {
        document.getElementById("idsatuanbesar").value = $(this).attr('data-id');
        document.getElementById("satuanbesar").value = $(this).attr('data-satuanbesar');
        $('#modalsatuanbesar').modal('hide');
      }); 
      
}
function satuankecilmodal(){
      $(document).on('click', '#satuankecil', function (e) {
        document.getElementById("idsatuankecil").value = $(this).attr('data-id');
        document.getElementById("satuankecil").value = $(this).attr('data-satuankecil');
        $('#modalsatuankecil').modal('hide');
      }); 
      
}
function kondisimodal(){
      $(document).on('click', '#kondisi', function (e) {
        document.getElementById("idkondisi").value = $(this).attr('data-id');
        document.getElementById("kondisi").value = $(this).attr('data-kondisi');
        $('#modalkondisi').modal('hide');
      }); 
      
}
function matauangmodal(){
      $(document).on('click', '#matauang', function (e) {
        document.getElementById("idmatauang").value = $(this).attr('data-id');
        document.getElementById("matauang").value = $(this).attr('data-matauang');
        $('#modalmatauang_').modal('hide');
      }); 
      
}
function tipeprodukmodal(){
      $(document).on('click', '#tipeproduk', function (e) {
        document.getElementById("idtipeproduk").value = $(this).attr('data-id');
        document.getElementById("tipeproduk").value = $(this).attr('data-tipeproduk');
        $('#modaltipeproduk').modal('hide');
      }); 
      
}

function parcelmodal(){
      $(document).on('click', '#parcel', function (e) {
        document.getElementById("idparcel").value = $(this).attr('data-id');
        document.getElementById("parcel").value = $(this).attr('data-parcel');
        document.getElementById("shape").value = $(this).attr('data-shape');
        document.getElementById("color").value = $(this).attr('data-color');
        document.getElementById("clarity").value = $(this).attr('data-clarity');
        document.getElementById("harga").value = $(this).attr('data-harga');
        $('#modalparcel').modal('hide');
      }); 
      
}

function produkmodal(){
      $(document).on('click', '#produk', function (e) {
        document.getElementById("idbarang").value = $(this).attr('data-id');
        document.getElementById("produk").value = $(this).attr('data-produk');
        document.getElementById("tipeproduk").value = $(this).attr('data-tipeproduk');
        document.getElementById("brand").value = $(this).attr('data-brand');
        document.getElementById("kondisi").value = $(this).attr('data-kondisi');
        document.getElementById("etalase").value = $(this).attr('data-etalase');
        document.getElementById("hargaproduk").value = $(this).attr('data-harga');
        document.getElementById("hargaproduk_").value = $(this).attr('data-harga_');
        $('#modalproduk').modal('hide');
      }); 
      
}

// var nilai1 = document.getElementById("nilai1");
// nilai1.addEventListener("keyup", function(e) {
//   nilai1.value = convertRupiah(this.value);
// });
// nilai1.addEventListener('keydown', function(event) {
//   return isNumberKey(event);
// });
 
// var nilai2 = document.getElementById("nilai2");
// nilai2.addEventListener("keyup", function(e) {
//   nilai2.value = convertRupiah(this.value);
// });
// nilai2.addEventListener('keydown', function(event) {
//   return isNumberKey(event);
// });

document.querySelectorAll('.js-nilai').forEach(elm => {
  elm.addEventListener("keyup", function(e){
    elm.value = convertRupiah(elm.value);
  });

  
})




function convertRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split  = number_string.split(","),
    sisa   = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
 
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }
 
  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
}

document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
  

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove(); 
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }

   thumbnailElement.querySelector(".img-preview").remove();
}





// function isNumberKey(evt) {
//     key = evt.which || evt.keyCode;
//   if (  key != 188 // Comma
//      && key != 8 // Backspace
//      && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
//      && (key < 48 || key > 57) // Non digit
//     ) 
//   {
//     evt.preventDefault();
//     return;
//   }
// }

