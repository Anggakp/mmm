<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';


$route['login']      = 'auth/index';
$route['registrasi'] = 'auth/registration';
$route['blocked']    = 'auth/blocked';

$route['pimpinan']           = 'pimpinan';
$route['admin']              = 'admin';
$route['supplier']           = 'supplier';
$route['agen']               = 'agen';

//Routes Akses Admin
$route['listayam']                         = 'admin/listayam';
$route['tambahdataayam']                   = 'admin/createayam';
$route['editdataayam/(:any)']              = 'admin/editayam/$1';

$route['listpimpinan']                         = 'admin/listpimpinan';
$route['tambahdatapimpinan']                   = 'admin/createpimpinan';
$route['editdatapimpinan/(:any)']              = 'admin/editpimpinan/$1';

$route['listsupplier']                     = 'admin/listsupplier';
$route['tambahdatasupplier']               = 'admin/createsupplier';
$route['editdatasupplier/(:any)']          = 'admin/editsupplier/$1';

$route['listagen']                         = 'admin/listagen';
$route['tambahdataagen']                   = 'admin/createagen';
$route['editdataagen/(:any)']              = 'admin/editagen/$1';

$route['listayamhilang']                   = 'admin/listayamhilang';
$route['tambahdataayamhilang']             = 'admin/createayamhilang';
$route['detaildataayamhilang/(:any)']      = 'admin/detailayamhilang/$1';

$route['listayammati']                     = 'admin/listayammati';
$route['tambahdataayammati']               = 'admin/createayammati';
$route['detaildataayammati/(:any)']        = 'admin/detailayammati/$1';

$route['listpenjualan-admin']              = 'admin/listpenjualan';
$route['detaildatapenjualan-admin/(:any)'] = 'admin/detailpenjualan/$1';

$route['laporanayamhilang']                = 'admin/laporanayamhilang';
$route['laporanayamhilangtigabulan']       = 'admin/laporanayamhilangtigabulan';

$route['laporanayammati']                  = 'admin/laporanayammati';
$route['laporanayammatitigabulan']         = 'admin/laporanayammatitigabulan';

$route['profile-admin']                    = 'admin/profile';
$route['editprofile-admin']                = 'admin/edit';
$route['ubahpassword-admin']               = 'admin/changepassword';
//

//Routes Akses Supplier
$route['listpembelian']                      = 'supplier/listpembelian';
$route['tambahdatapembelian']                = 'supplier/createpembelian';
$route['detaildatapembelian/(:any)']         = 'supplier/detailpembelian/$1';
$route['laporanpembelian-supplier']          = 'supplier/laporanpembelian';
$route['laporanpembeliantigabulan-supplier'] = 'supplier/laporanpembelian';

$route['profile-supplier']                   = 'supplier/profile';
$route['editprofile-supplier']               = 'supplier/edit';
$route['ubahpassword-supplier']              = 'supplier/changepassword';
//

//Routes Akses Agen
$route['listpenjualan']              = 'agen/listpenjualan';
$route['tambahdatapenjualan']        = 'agen/createpenjualan';
$route['detaildatapenjualan/(:any)'] = 'agen/detailpenjualan/$1';

$route['profile-agen']               = 'agen/profile';
$route['editprofile-agen']           = 'agen/edit';
$route['ubahpassword-agen']          = 'agen/changepassword';
//

//Routes Profile
$route['profile']                    		   = 'profile/profile';
$route['editprofile']                		   = 'profile/edit';
$route['ubahpassword']               		   = 'profile/changepassword';

//Routes Menu Master Produk
$route['listmasterid']                         = 'masterid/listmasterid';
$route['tambahdatamasterid']                   = 'masterid/createmasterid';
$route['editdatamasterid/(:any)']              = 'masterid/editmasterid/$1';

$route['listproduk']                           = 'produk/listproduk';
$route['tambahdataproduk']                     = 'produk/createproduk';
$route['editdataproduk/(:any)']                = 'produk/editproduk/$1';

//Routes Menu Diamond
$route['listclarity']                          = 'clarity/listclarity';
$route['tambahdataclarity']                    = 'clarity/createclarity';
$route['editdataclarity/(:any)']               = 'clarity/editclarity/$1';

$route['listshape']                            = 'shape/listshape';
$route['tambahdatashape']                      = 'shape/createshape';
$route['editdatashape/(:any)']                 = 'shape/editshape/$1';

$route['listcolor']                            = 'color/listcolor';
$route['tambahdatacolor']                      = 'color/createcolor';
$route['editdatacolor/(:any)']                 = 'color/editcolor/$1';

$route['listdiagroup']                         = 'diagroup/listdiagroup';
$route['tambahdatadiagroup']                   = 'diagroup/creatediagroup';
$route['editdatadiagroup/(:any)']              = 'diagroup/editdiagroup/$1';

$route['listdiameter']                         = 'diameter/listdiameter';
$route['tambahdatadiameter']                   = 'diameter/creatediameter';
$route['editdatadiameter/(:any)']              = 'diameter/editdiameter/$1';

$route['listparcel']                           = 'parcel/listparcel';
$route['tambahdataparcel']                     = 'parcel/createparcel';
$route['editdataparcel/(:any)']                = 'parcel/editparcel/$1';

//Routes Menu Material
$route['listmaterial']                         = 'material/listmaterial';
$route['tambahdatamaterial']                   = 'material/creatematerial';
$route['editdatamaterial/(:any)']              = 'material/editmaterial/$1';

//Routes Menu Kurs Material
$route['listkursmaterial']                     = 'kursmaterial/listkursmaterial';
$route['tambahdatakursmaterial']               = 'kursmaterial/createkursmaterial';
$route['editdatakursmaterial/(:any)']          = 'kursmaterial/editkursmaterial/$1';

$route['pengaturan']                           = 'pengaturan';
$route['tambahreference']                      = 'pengaturan/createreference';

//Routes Menu Lain-lain
$route['listtipedesign']                       = 'tipedesign/listtipedesign';
$route['tambahdatatipedesign']                 = 'tipedesign/createtipedesign';
$route['editdatatipedesign/(:any)']            = 'tipedesign/edittipedesign/$1';

$route['listfinishing']                        = 'finishing/listfinishing';
$route['tambahdatafinishing']                  = 'finishing/createfinishing';
$route['editdatafinishing/(:any)']             = 'finishing/editfinishing/$1';

$route['listwarnaproduk']                      = 'warnaproduk/listwarnaproduk';
$route['tambahdatawarnaproduk']                = 'warnaproduk/createwarnaproduk';
$route['editdatawarnaproduk/(:any)']           = 'warnaproduk/editwarnaproduk/$1';

$route['listkonsepkepala']                     = 'konsepkepala/listkonsepkepala';
$route['tambahdatakonsepkepala']               = 'konsepkepala/createkonsepkepala';
$route['editdatakonsepkepala/(:any)']          = 'konsepkepala/editkonsepkepala/$1';

$route['listongkosrangka']                     = 'ongkosrangka/listongkosrangka';
$route['tambahdataongkosrangka']               = 'ongkosrangka/createongkosrangka';
$route['editdataongkosrangka/(:any)']          = 'ongkosrangka/editongkosrangka/$1';

$route['listheadsetting']                      = 'headsetting/listheadsetting';
$route['tambahdataheadsetting']                = 'headsetting/createheadsetting';
$route['editdataheadsetting/(:any)']           = 'headsetting/editheadsetting/$1';

$route['listongkoslainnya']                    = 'ongkoslainnya/listongkoslainnya';
$route['tambahdataongkoslainnya']              = 'ongkoslainnya/createongkoslainnya';
$route['editdataongkoslainnya/(:any)']         = 'ongkoslainnya/editongkoslainnya/$1';

//Routes Menu Mata Uang
$route['listmatauang']                         = 'matauang/listmatauang';
$route['tambahdatamatauang']                   = 'matauang/creatematauang';
$route['editdatamatauang/(:any)']              = 'matauang/editmatauang/$1';

//Routes Menu Kurs Mata Uang
$route['listkurs']                             = 'kursmatauang/listkurs';
$route['tambahdatakurs']                       = 'kursmatauang/createkurs';
$route['editdatakurs/(:any)']                  = 'kursmatauang/editkurs/$1';

//Routes Menu Client
$route['listclient']                   		   = 'client/listclient';
$route['tambahdataclient']             		   = 'client/createclient';
$route['editdataclient/(:any)']        		   = 'client/editclient/$1';
$route['detaildataclient/(:any)']      		   = 'client/detailclient/$1';

//Routes Menu Karyawan
$route['listkaryawan']                         = 'karyawan/listkaryawan';
$route['tambahdatakaryawan']                   = 'karyawan/createkaryawan';
$route['editdatakaryawan/(:any)']              = 'karyawan/editkaryawan/$1';
$route['detaildatakaryawan/(:any)']            = 'karyawan/detailkaryawan/$1';

//Routes Menu Bagian
$route['listbagian']                           = 'bagian/listbagian';
$route['tambahdatabagian']                     = 'bagian/createbagian';
$route['editdatabagian/(:any)']                = 'bagian/editbagian/$1';

//Routes Menu BSIS
$route['listbsis']                             = 'bsis/listbsis';
$route['tambahdatabsis']                       = 'bsis/createbsis';
$route['editdatabsis/(:any)']                  = 'bsis/editbsis/$1';

//Routes Menu COA
$route['listcoa']                              = 'coa/listcoa';
$route['tambahdatacoa/(:any)']                 = 'coa/addcoa/$1';
$route['editdatacoa/(:any)']                   = 'coa/editcoa/$1';

//Routes Menu Cost Center
$route['listcostcenter']                       = 'costcenter/listcostcenter';
$route['tambahdatacostcenter']         		   = 'costcenter/createcostcenter';
$route['editdatacostcenter/(:any)']            = 'costcenter/editcostcenter/$1';

//Routes Menu Group Akun
$route['listgroupakun']                        = 'groupakun/listgroupakun';
$route['tambahdatagroupakun']         		   = 'groupakun/creategroupakun';
$route['editdatagroupakun/(:any)']             = 'groupakun/editgroupakun/$1';

//Routes Menu Cash Bank
$route['listcashbank']                         = 'cashbank/listcashbank';
$route['tambahdatacashbank']            	   = 'cashbank/createcashbank';
$route['editdatacashbank/(:any)']              = 'cashbank/editcashbank/$1';
$route['detaildatacashbank/(:any)']            = 'cashbank/detailcashbankheader/$1';

//Routes Menu 2D Design
$route['list2ddesain']                         = 'dua_d_design/list2ddesain';
$route['tambahdata2ddesain']            	   = 'dua_d_design/create2ddesain';
$route['editdata2ddesain/(:any)']              = 'dua_d_design/edit2ddesain/$1';
$route['detaildata2ddesign/(:any)']            = 'dua_d_design/detaildata2ddesain/$1';
$route['editdetaildesain']                     = 'dua_d_design/editdetaildesain';
$route['detaildesain/(:any)']                  = 'dua_d_design/detaildesain/$1';
$route['detaildesain_header/(:any)']           = 'dua_d_design/detaildesain_header/$1';

//Routes Menu SPK
$route['listspk']                         	   = 'spk/listspk'; 
$route['tambahdataspk']            	   		   = 'spk/createspk';

//Routes Menu User
$route['listuser']                             = 'user/listuser';
$route['tambahdatauser']                       = 'user/createuser';
$route['editdatauser/(:any)']                  = 'user/edituser/$1';
$route['aksesrole/(:any)']                     = 'role/aksesrole/$1';


$route['listbarang']                           = 'pimpinan/listbarang';
$route['tambahdatabarang']                     = 'pimpinan/createbarang';
$route['editdatabarang/(:any)']                = 'pimpinan/editbarang/$1';
$route['detaildatabarang/(:any)']              = 'pimpinan/detailbarang/$1';



$route['listadmin']                           = 'pimpinan/listadmin';
$route['tambahdataadmin']                     = 'pimpinan/createadmin';
$route['editdataadmin/(:any)']                = 'pimpinan/editadmin/$1';

$route['listayam-pimpinan']                   = 'pimpinan/listayam';
$route['laporandataayam']                     = 'pimpinan/laporandataayam';

$route['listagen-pimpinan']                   = 'pimpinan/listagen';
$route['detaildataagen/(:any)']               = 'pimpinan/detailagen/$1';
$route['laporanhistoryagen/(:any)']           = 'pimpinan/laporanhistoryagen/$1';

$route['listsupplier-pimpinan']               = 'pimpinan/listsupplier';
$route['detaildatasupplier/(:any)']           = 'pimpinan/detailsupplier/$1';
$route['laporanhistorysupplier/(:any)']       = 'pimpinan/laporanhistorysupplier/$1';

$route['listpenjualan-pimpinan']              = 'pimpinan/listpenjualan';
$route['detaildatapenjualan-pimpinan/(:any)'] = 'pimpinan/detailpenjualan/$1';
$route['downloadgambar/(:any)']               = 'pimpinan/downloadgambar/$1';

$route['laporanpenjualan']                    = 'pimpinan/laporanpenjualan';
$route['laporanpenjualanhariini']             = 'pimpinan/laporanpenjualanhariini';
$route['laporanpenjualantigabulan']           = 'pimpinan/laporanpenjualantigabulan';

$route['laporanpembelian']                    = 'pimpinan/laporanpembelian';
$route['laporanpembeliantigabulan']           = 'pimpinan/laporanpembeliantigabulan';

$route['laporanuntungrugi']                   = 'pimpinan/laporanuntungrugi';
$route['laporanuntungrugitigabulan']          = 'pimpinan/laporanuntungrugitigabulan';

//


$route['404_override']                        = '';
$route['translate_uri_dashes']                = FALSE;
