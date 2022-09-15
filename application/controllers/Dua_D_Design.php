<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dua_D_Design extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

	function gethargadiamond(){
		$select = $this->db->select('sum(harga*berat)as hargadiamond, sum(jumlah)as totaljumlah, sum(berat)as totalberat, sum(hargaheadsetting*jumlah) as hargaheadsetting');
		$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
		$select = $this->db->where('id_detail', 0);
		$select = $this->db->where('id_user', $this->session->userdata('id_user'));
		$data['diamond'] = $this->m->Get_All('2ddesainsubdetail', $select);

		$this->load->view('pages/2ddesain/hargadiamond',$data);
	}
	

	
	function getkepala(){
		$select = $this->db->select('sum(jumlah*harga)as kepala');
		$select = $this->db->where('tbl_2ddesainkepala.deleted', 0);
		$select = $this->db->where('id_detail', 0);
		$select = $this->db->where('id_user', $this->session->userdata('id_user'));
		$data['kepala'] = $this->m->Get_All('2ddesainkepala', $select);

		$this->load->view('pages/2ddesain/kepala',$data);
	}

	

	function gethargadiamond_edit()
	{
		$id_detail = $this->input->post("iddetail");

		$select = $this->db->select('sum(harga*berat)as hargadiamond, sum(jumlah)as totaljumlah, sum(berat)as totalberat,  sum(hargaheadsetting*jumlah) as hargaheadsetting');
		$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
		$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',$id_detail);
		$data['diamond'] = $this->m->Get_All('2ddesainsubdetail', $select);

		$this->load->view('pages/2ddesain/hargadiamond_',$data);
	}

	function getkepala_edit(){
		$id_detail = $this->input->post("iddetail");
		
		$select = $this->db->select('sum(jumlah*harga)as kepala');
		$select = $this->db->where('tbl_2ddesainkepala.deleted', 0);
		$select = $this->db->where('id_detail', $id_detail);
		$select = $this->db->where('id_user', $this->session->userdata('id_user'));
		$data['kepala'] = $this->m->Get_All('2ddesainkepala', $select);

		$this->load->view('pages/2ddesain/kepala_',$data);
	}
	function getdetaildesain()
	{
		
		$id_header = $this->input->post("idheader");

		$select       = $this->db->select('*, tbl_tipedesign.tipedesign, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_ongkos.ongkos');
		$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
		$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
		$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
		$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
		$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
		$select       = $this->db->join('tbl_ongkos', 'ongkos.id_ongkos = tbl_2ddesaindetail.id_ongkos');
		$select       = $this->db->where('tbl_2ddesaindetail.id_header', $id_header);
		$select 	  = $this->db->where('tbl_2ddesaindetail.deleted', 0);
		$data         = $this->m->Get_All('2ddesaindetail', $select);

		echo json_encode($data);	
	}
	function filterdesignbydesigner(){
		$designer = $this->input->post("designer");
		$approval = $this->input->post("approval");
		$from     = $this->input->post("from");
		$to       = $this->input->post("to");

		if (!empty($designer)) {
		   $this->db->where('tbl_2ddesainheader.id_karyawan', $designer);
		}
		if (!empty($approval) and $approval == "Design Manager") {
			 $this->db->where('tbl_2ddesainheader.disetujui_1', 1);
		}
		if (!empty($approval) and $approval == "Sales") {
			 $this->db->where('tbl_2ddesainheader.disetujui_2', 1);
		}
		if (!empty($approval) and $approval == "Sales Manager") {
			 $this->db->where('tbl_2ddesainheader.disetujui_3', 1);
		}
		if (!empty($approval) and $approval == "Customer") {
			 $this->db->where('tbl_2ddesainheader.disetujui_4', 1);
		}
		if (!empty($approval) and $approval == "BOD") {
			 $this->db->where('tbl_2ddesainheader.disetujui_5', 1);
		}if (!empty($from) and !empty($to)) {
			 $this->db->where('tanggal BETWEEN "'. $from. '" and "'. $to.'"');
		}
	
			$select = $this->db->select('*, tbl_karyawan.nama as namakaryawan, tbl_bagian.bagian');
			$select = $this->db->join('karyawan', 'karyawan.id_karyawan = 2ddesainheader.id_karyawan');
			$select = $this->db->join('client', 'client.id_client = 2ddesainheader.id_client', 'left');
			$select = $this->db->join('bagian', 'bagian.id_bagian = karyawan.id_bagian');
			$select = $this->db->order_by('nomor');
			$select = $this->db->where('tbl_2ddesainheader.deleted', 0);
			$data['read'] = $this->m->Get_All('2ddesainheader', $select);

			$select               = $this->db->select('*, tbl_2ddesaindetail.ongkos as hargaongkos, tbl_tipedesign.id_tipe, tbl_tipedesign.tipedesign, tbl_warnaproduk.id_warnaproduk, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_material.id_material, tbl_finishing.finishing, tbl_finishing.id_finishing, tbl_konsepkepala.id_konsepkepala, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.id_ongkosrangka, tbl_ongkosrangka.ongkosrangka as ongkos');
			$select               = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
			$select               = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
			$select               = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
				$select           = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
			$select               = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
			$select               = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
			$select               = $this->db->where('tbl_2ddesaindetail.deleted', 0);
			$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

			$select = $this->db->select('*');
			$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('tbl_karyawan.deleted', 0);
			$select = $this->db->where('tbl_bagian.bagian = "Designer 2D"');
			$data['karyawan'] = $this->m->Get_All('karyawan', $select);

			$this->load->view('pages/2ddesain/filter2ddesign',$data);
	}
	
	function list2ddesain()
	{
		$table = '2ddesainsubdetail';
		$where = array(
			'id_detail'		    =>	0
		);
		$this->m->Delete($where,$table);


		$table = '2ddesainkepala';
		$where = array(
			'id_detail'		    =>	0
		);
		$this->m->Delete($where,$table);

		
		

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List 2D Desain';

		$role_id = $this->session->userdata('role_id');
		$menu = $this->uri->segment(1);

        $this->db->select('*');
        $this->db->where("url = '$menu' or url_1 = '$menu' or url_2 = '$menu' or url_3 = '$menu' or url_4 = '$menu'");
        $queryMenu = $this->db->get('user_menu')->row_array();

        $menu_id =$queryMenu['id'];


		$this->db->where('role_id', $role_id);
	    $this->db->where('menu_id', $menu_id);
	    $this->db->where('add_btn = 1');
	    $data['aksesaddbtn'] = $this->db->get('user_access_menu');

	    $this->db->where('role_id', $role_id);
	    $this->db->where('menu_id', $menu_id);
	    $this->db->where('update_btn = 1');
	    $data['aksesupdatebtn'] = $this->db->get('user_access_menu');

	    $this->db->where('role_id', $role_id);
	    $this->db->where('menu_id', $menu_id);
	    $this->db->where('delete_btn = 1');
	    $data['aksesdeletebtn'] = $this->db->get('user_access_menu');

	     $this->db->where('role_id', $role_id);
	    $this->db->where('menu_id', $menu_id);
	    $this->db->where('detail_btn = 1');
	    $data['aksesdetailbtn'] = $this->db->get('user_access_menu');

		$select = $this->db->select('*, tbl_karyawan.nama as namakaryawan, tbl_bagian.bagian');
		$select = $this->db->join('karyawan', 'karyawan.id_karyawan = 2ddesainheader.id_karyawan');
		$select = $this->db->join('client', 'client.id_client = 2ddesainheader.id_client', 'left');
		$select = $this->db->join('bagian', 'bagian.id_bagian = karyawan.id_bagian');
		$select = $this->db->order_by('nomor');
		$select = $this->db->where('tbl_2ddesainheader.create_by', $this->session->userdata('id_user'));
		$select = $this->db->where('tbl_2ddesainheader.deleted', 0);
		$data['read'] = $this->m->Get_All('2ddesainheader', $select);

		$select               = $this->db->select('*, tbl_2ddesaindetail.ongkos as hargaongkos, tbl_2ddesaindetail.ukuran as size, tbl_tipedesign.id_tipe, tbl_tipedesign.tipedesign, tbl_warnaproduk.id_warnaproduk, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_material.id_material, tbl_finishing.finishing, tbl_finishing.id_finishing, tbl_konsepkepala.id_konsepkepala, tbl_konsepkepala.konsepkepala');
		$select               = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
		$select               = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
		$select               = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select           = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
		$select               = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
		$select               = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
		$select               = $this->db->where('tbl_2ddesaindetail.deleted', 0);
		$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

		$select = $this->db->select('*');
		$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
		$select = $this->db->order_by('nama');
		$select = $this->db->where('tbl_karyawan.deleted', 0);
		$select = $this->db->where('tbl_bagian.bagian = "Designer 2D"');
		$data['karyawan'] = $this->m->Get_All('karyawan', $select);



		$data['delete'] = $this->m->Delete_Relasi();

		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/2ddesain/list2ddesain',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	function Create2ddesain()
	{

		$this->form_validation->set_rules(
			'tanggaltransaksi',
			'tanggaltransaksi',
			'required|trim',
			[
				'required' => 'Field tanggal transaksi tidak boleh kosong'
			]
		);
		

		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');
			$nama = $this->session->userdata('nama');

			date_default_timezone_set('Asia/Jakarta');
		    $now = date('Y-m-d H:i:s');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Tambah Data 2D Desain';


			 

	        $select = $this->db->select('*');
			$select = $this->db->where('id_menu', 36);
			$select = $this->db->where('header_reference.deleted', 0);
			$data['nomorreference'] = $this->m->Get_All('header_reference', $select);

		

			$data1 = array(
				'ref_number' => 1,
				'id_menu' => 36
			);

			$data['cek1'] = $this->db->get_where('tbl_detail_reference', $data1);
			
			$data['number1'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 1,
				'id_menu' => 36
				])->row_array();
			
			

			$data2 = array(
				'ref_number' => 2,
				'id_menu' => 36
				);

			$data['cek2'] = $this->db->get_where('tbl_detail_reference', $data2);
			$data['number2'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 2,
				'id_menu' => 36
			])->row_array();

			$data3 = array(
				'ref_number' => 3,
				'id_menu' => 36
				);

			$data['cek3'] = $this->db->get_where('tbl_detail_reference', $data3);
			$data['number3'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 3,
				'id_menu' => 36
			])->row_array();

			$data4 = array(
				'ref_number' => 4,
				'id_menu' => 36
				);

			$data['cek4'] = $this->db->get_where('tbl_detail_reference', $data4);
			$data['number4'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 4,
				'id_menu' => 36
			])->row_array();

			$data5 = array(
				'ref_number' => 5,
				'id_menu' => 36
				);

			$data['cek5'] = $this->db->get_where('tbl_detail_reference', $data5);
			$data['number5'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 5,
				'id_menu' => 36
			])->row_array();

			$data6 = array(
				'ref_number' => 6,
				'id_menu' => 36
				);

			$data['cek6'] = $this->db->get_where('tbl_detail_reference', $data6);
			$data['number6'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 6,
				'id_menu' => 36
			])->row_array();

			$data7 = array(
				'ref_number' => 7,
				'id_menu' => 36
				);

			$data['cek7'] = $this->db->get_where('tbl_detail_reference', $data7);
			$data['number7'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 7,
				'id_menu' => 36
			])->row_array();

			$data8 = array(
				'ref_number' => 8,
				'id_menu' => 36
				);

			$data['cek8'] = $this->db->get_where('tbl_detail_reference', $data8);
			$data['number8'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 8,
				'id_menu' => 36
			])->row_array();
	 

			$data9 = array(
					'ref_number' => 9,
				'id_menu' => 36
				);

			$data['cek9'] = $this->db->get_where('tbl_detail_reference', $data9);

			$data['number9'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 9,
				'id_menu' => 36
			])->row_array();

			$data10 = array(
				'ref_number' => 10,
				'id_menu' => 36
				);

			$data['cek10'] = $this->db->get_where('tbl_detail_reference', $data10);

			$data['number10'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 10,
				'id_menu' => 36
			])->row_array();

			$data_ = array(
				'id_menu' => 36,
				'deleted' => 0
			);
			$data['a'] = $this->db->get_where('header_reference', $data_);

			$datacek = array(
				'ref_part' => 01,
				'id_menu' => 36
				);
			$data['nomorreference'] = $this->db->get_where('tbl_detail_reference', [
				'ref_part' => 01,
				'id_menu' => 36
			])->row_array();
 
			$data_ = array(
				'ref_part' => 01,
				'id_menu' => 36
			);

			$data['datacek'] = $this->db->get_where('tbl_detail_reference', $data_);
			
			$data['nomor'] = $this->db->get_where('tbl_detail_reference', [
				'ref_part' => 01,
				'id_menu' => 36
				])->row_array();

			$select = $this->db->select('*');
			$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('tbl_bagian.bagian', 'Designer 2D');
			$select = $this->db->where('tbl_karyawan.deleted', 0);
			$data['karyawan'] = $this->m->Get_All('karyawan', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('tbl_material.material asc');
			$select = $this->db->where('tbl_material.deleted', 0);	
			$data['material'] = $this->m->Get_All('material', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('tipedesign');
			$select = $this->db->where('deleted', 0);
			$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('warnaproduk');
			$select = $this->db->where('deleted', 0);
			$data['warnaproduk'] = $this->m->Get_All('warnaproduk', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('finishing');
			$select = $this->db->where('deleted', 0);
			$data['finishing'] = $this->m->Get_All('finishing', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('headsetting');
			$select = $this->db->where('deleted', 0);
			$data['headsetting'] = $this->m->Get_All('headsetting', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('ongkoslainnya');
			$select = $this->db->where('deleted', 0);
			$data['ongkoslainnya'] = $this->m->Get_All('ongkoslainnya', $select);


			$select = $this->db->select('*');
			$select = $this->db->order_by('konsepkepala'); 
			$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);
			

			$select = $this->db->select('sum(harga*berat)as hargadiamond, sum(jumlah)as totaljumlah, sum(berat)as totalberat');
			$select = $this->db->where('id_detail', 0);
			$select = $this->db->where('deleted', 0);
			$select = $this->db->where('id_user', $this->session->userdata('id_user'));
			$data['diamond'] = $this->m->Get_All('2ddesainsubdetail', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('deleted', 0);
			$data['client'] = $this->m->Get_All('client', $select);

			$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
			$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
			$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
			$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
			$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
			$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
			$select = $this->db->where('tbl_parcel.deleted', 0);
			$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
			$data['parcel'] = $this->m->Get_All('parcel', $select);


			$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
			$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
			$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
			$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
			$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
			$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
			$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
			$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
			$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
			$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
			$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
			$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
			$select = $this->db->order_by('namaproduk');
			$select = $this->db->where('tbl_masterproduk.deleted', 0);
			$data['produk'] = $this->m->Get_All('masterproduk', $select);

			$select = $this->db->select('*, sum(harga) as harga');
			$select       = $this->db->join('tbl_parcel', 'tbl_parcel.id_parcel = tbl_2ddesainsubdetail.id_parcel');
			$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
			$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
			$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
			$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
			$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
			$select = $this->db->where('tbl_2ddesainsubdetail.id_user',$this->session->userdata('id_user'));
			$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',0);
			$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
			$data['duaddesainsubdetail'] = $this->m->Get_All('2ddesainsubdetail', $select);

			$select       = $this->db->select('*, tbl_2ddesaindetail.ukuran as size, tbl_2ddesaindetail.ongkos as hargaongkos, tbl_tipedesign.tipedesign, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.ongkosrangka');
			$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
			$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
			$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
			$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
			$select       = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
			$select       = $this->db->where('tbl_2ddesaindetail.id_header', 0);
			$select 	  = $this->db->where('tbl_2ddesaindetail.deleted', 0);
			$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

			

			$data['id_header'] 				   = $this->m->id_header();
			$data['id_detail'] 				   = $this->m->id_detail();
			$data['nomor2ddesain']             = $this->m->nomor2ddesain();

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/2ddesain/create2ddesain',$data);
			$this->load->view('templates_pimpinan/script' ,$data);
			$this->load->view('templates_pimpinan/footer', $data);
		} 	
		else {
			if ($this->input->post('total') == "0") {
				$this->session->set_flashdata('warning', 'Total tidak boleh 0');
				redirect('tambahdata2ddesain');
			}
			else{
			 
			 
				$data = array(
					'nomor'              =>	$this->input->post('nomor'),
					'id_header'          =>	$this->input->post('id_header'),
					'nomor'              =>	$this->input->post('nomor'),
					'tanggal'            =>	$this->input->post('tanggaltransaksi'),
					'memo'               =>	$this->input->post('memo'),
					'tipedesain'         =>	$this->input->post('tipedesain'),
					'id_client'          =>	$this->input->post('idclient'),
					'id_karyawan'        =>	$this->input->post('idkaryawan'),
					'create_by'          =>	$this->session->userdata('id_user'),
					'create_date'        =>	date("Y-m-d"),

				);
				$this->m->Save($data, '2ddesainheader');

				$table = '2ddesaindetail';
				$where = array(
					'id_header'		        =>	0,
					'deleted'			    =>	0,
				);
				$data = array(
					'id_header'		        =>	$this->input->post('id_header'),
				);
				$this->m->Update($where, $data, $table);



                $originalString = $this->input->post('nomor_');
				$ambilkarakter = substr($originalString,-1);

				$table = 'detail_reference';
				$where = array(
					'id_menu'		        =>	36,
					'ref_part'		        =>	01,
				);
				$data = array(
					'hasil_part'		    =>	str_replace($ambilkarakter,$this->input->post('nomor_update'),$originalString),
				);
				$this->m->Update($where, $data, $table);

				

				$this->session->set_flashdata('success', 'Data 2D Desain Berhasil Ditambah');
				redirect('list2ddesain');

			}
		}
	}
	function edit2ddesain($id_header){
		$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Edit Data 2D Desain';


			$select = $this->db->select('*');
			$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('tbl_bagian.bagian', 'Designer 2D');
			$select = $this->db->where('tbl_karyawan.deleted', 0);
			$data['karyawan'] = $this->m->Get_All('karyawan', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('tbl_material.material asc');
			$select = $this->db->where('tbl_material.deleted', 0);	
			$data['material'] = $this->m->Get_All('material', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('tipedesign');
			$select = $this->db->where('deleted', 0);
			$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('warnaproduk');
			$select = $this->db->where('deleted', 0);
			$data['warnaproduk'] = $this->m->Get_All('warnaproduk', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('finishing');
			$select = $this->db->where('deleted', 0);
			$data['finishing'] = $this->m->Get_All('finishing', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('konsepkepala'); 
			$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('headsetting');
			$select = $this->db->where('deleted', 0);
			$data['headsetting'] = $this->m->Get_All('headsetting', $select);
			 
			$select = $this->db->select('*');
			$select = $this->db->order_by('ongkoslainnya');
			$select = $this->db->where('deleted', 0);
			$data['ongkoslainnya'] = $this->m->Get_All('ongkoslainnya', $select);	

			$select = $this->db->select('sum(harga*berat)as hargadiamond, sum(jumlah)as totaljumlah, sum(berat)as totalberat');
			$select = $this->db->where('id_detail', 0);
			$select = $this->db->where('deleted', 0);
			$select = $this->db->where('id_user', $this->session->userdata('id_user'));
			$data['diamond'] = $this->m->Get_All('2ddesainsubdetail', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('deleted', 0);
			$data['client'] = $this->m->Get_All('client', $select);

			$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
			$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
			$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
			$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
			$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
			$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
			$select = $this->db->where('tbl_parcel.deleted', 0);
			$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
			$data['parcel'] = $this->m->Get_All('parcel', $select);


			$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
			$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
			$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
			$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
			$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
			$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
			$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
			$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
			$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
			$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
			$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
			$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
			$select = $this->db->order_by('namaproduk');
			$select = $this->db->where('tbl_masterproduk.deleted', 0);
			$data['produk'] = $this->m->Get_All('masterproduk', $select);


			$select = $this->db->select('*, tbl_karyawan.nama as namakaryawan, tbl_bagian.bagian');
			$select = $this->db->join('karyawan', 'karyawan.id_karyawan = 2ddesainheader.id_karyawan');
			$select = $this->db->join('client', 'client.id_client = 2ddesainheader.id_client', 'left');
			$select = $this->db->join('bagian', 'bagian.id_bagian = karyawan.id_bagian');
			$select = $this->db->where('tbl_2ddesainheader.deleted', 0);
			$select = $this->db->where('tbl_2ddesainheader.id_header', $id_header);
			$data['designheader'] = $this->m->Get_All('2ddesainheader', $select);

			$select       = $this->db->select('*, tbl_tipedesign.tipedesign, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.ongkosrangka as ongkos, tbl_2ddesaindetail.ongkos as hargaongkos');
			$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
			$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
			$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
			$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
			$select       = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
			$select       = $this->db->where('tbl_2ddesaindetail.id_header', $id_header);
			$select 	  = $this->db->where('tbl_2ddesaindetail.deleted', 0);
			$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

			

			$data['id_header'] 				   = $this->m->id_header();
			$data['id_detail'] 				   = $this->m->id_detail();
			$data['nomor2ddesain']             = $this->m->nomor2ddesain();

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/2ddesain/edit2ddesain',$data);
			$this->load->view('templates_pimpinan/script' ,$data);
			$this->load->view('templates_pimpinan/footer', $data);
	}
	function update2ddesain(){
		$id_header = $this->input->post("id_header");
		if ($this->input->post('total') == "0") {
				$this->session->set_flashdata('warning', 'Total tidak boleh 0');
				$this->edit2ddesain($id_header);
			}
			else{
				
				$table = '2ddesainheader';
				$where = array(
					'id_header'		        =>  $this->input->post("id_header")
				);
				$data = array(
					'tanggal'            =>	$this->input->post('tanggaltransaksi'),
					'memo'               =>	$this->input->post('memo'),
					'id_client'          =>	$this->input->post('idclient'),
					'tipedesain'         =>	$this->input->post('tipedesain'),
					'id_karyawan'        =>	$this->input->post('idkaryawan'),
					'update_by'          =>	$this->session->userdata('id_user'),
					'update_date'        =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);

				$this->session->set_flashdata('success', 'Data 2D Desain Berhasil Diubah');
				redirect('list2ddesain');

			}
	}
	function detaildata2ddesain($id_header){
		$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Detail Data 2D Desain';


			$select = $this->db->select('*');
			$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('tbl_bagian.bagian', 'Designer 2D');
			$select = $this->db->where('tbl_karyawan.deleted', 0);
			$data['karyawan'] = $this->m->Get_All('karyawan', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('tbl_material.material asc');
			$select = $this->db->where('tbl_material.deleted', 0);	
			$data['material'] = $this->m->Get_All('material', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('tipedesign');
			$select = $this->db->where('deleted', 0);
			$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('warnaproduk');
			$select = $this->db->where('deleted', 0);
			$data['warnaproduk'] = $this->m->Get_All('warnaproduk', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('finishing');
			$select = $this->db->where('deleted', 0);
			$data['finishing'] = $this->m->Get_All('finishing', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('konsepkepala');
			$select = $this->db->where('deleted', 0);
			$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('ongkos');
			$select = $this->db->where('deleted', 0);
			$data['ongkos'] = $this->m->Get_All('ongkos', $select);

			$select = $this->db->select('sum(harga*berat)as hargadiamond, sum(jumlah)as totaljumlah, sum(berat)as totalberat');
			$select = $this->db->where('id_detail', 0);
			$select = $this->db->where('deleted', 0);
			$select = $this->db->where('id_user', $this->session->userdata('id_user'));
			$data['diamond'] = $this->m->Get_All('2ddesainsubdetail', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('deleted', 0);
			$data['client'] = $this->m->Get_All('client', $select);

			$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
			$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
			$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
			$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
			$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
			$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
			$select = $this->db->where('tbl_parcel.deleted', 0);
			$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
			$data['parcel'] = $this->m->Get_All('parcel', $select);


			$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
			$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
			$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
			$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
			$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
			$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
			$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
			$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
			$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
			$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
			$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
			$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
			$select = $this->db->order_by('namaproduk');
			$select = $this->db->where('tbl_masterproduk.deleted', 0);
			$data['produk'] = $this->m->Get_All('masterproduk', $select);


			$select = $this->db->select('*, tbl_karyawan.nama as namakaryawan, tbl_client.nama as namaclient, tbl_bagian.bagian');
			$select = $this->db->join('karyawan', 'karyawan.id_karyawan = 2ddesainheader.id_karyawan');
			$select = $this->db->join('client', 'client.id_client = 2ddesainheader.id_client', 'left');
			$select = $this->db->join('bagian', 'bagian.id_bagian = karyawan.id_bagian');
			$select = $this->db->where('tbl_2ddesainheader.deleted', 0);
			$select = $this->db->where('tbl_2ddesainheader.id_header', $id_header);
			$data['designheader'] = $this->m->Get_All('2ddesainheader', $select);

			$select       = $this->db->select('*, tbl_tipedesign.tipedesign, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_2ddesaindetail.ongkos as hargaongkos');
			$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
			$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
			$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
			$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
			$select       = $this->db->join('tbl_ongkos', 'ongkos.id_ongkos = tbl_2ddesaindetail.id_ongkos');
			$select       = $this->db->where('tbl_2ddesaindetail.id_header', $id_header);
			$select 	  = $this->db->where('tbl_2ddesaindetail.deleted', 0);
			$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

			

			$data['id_header'] 				   = $this->m->id_header();
			$data['id_detail'] 				   = $this->m->id_detail();
			$data['nomor2ddesain']             = $this->m->nomor2ddesain();

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/2ddesain/detail2ddesain',$data);
			$this->load->view('templates_pimpinan/script' ,$data);
			$this->load->view('templates_pimpinan/footer', $data);
	}
	function deletedata2ddesain()
	{
		$table = '2ddesainheader';
		$where = array(
			'id_header'		    =>	$this->input->post('id_header')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		$table = '2ddesaindetail';
		$where = array(
			'id_header'		    =>	$this->input->post('id_header')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		$this->session->set_flashdata('success', 'Data 2d design berhasil dihapus');
		redirect('list2ddesain');
	}
	function detaildesain_header($id_detail)
	{

		$data = [
			'title' => 'PT.MMM | Detail Data Desain'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
		$select = $this->db->order_by('nama');
		$select = $this->db->where('tbl_bagian.bagian', 'Designer 2D');
		$select = $this->db->where('tbl_karyawan.deleted', 0);
		$data['karyawan'] = $this->m->Get_All('karyawan', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('material');
		$select = $this->db->where('deleted', 0);
		$data['material'] = $this->m->Get_All('material', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('tipedesign');
		$select = $this->db->where('deleted', 0);
		$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('warnaproduk');
		$select = $this->db->where('deleted', 0);
		$data['warnaproduk'] = $this->m->Get_All('warnaproduk', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('finishing');
		$select = $this->db->where('deleted', 0);
		$data['finishing'] = $this->m->Get_All('finishing', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('konsepkepala'); 
		$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);

 

		$select = $this->db->select('*');
		$select = $this->db->order_by('tbl_material.material asc');
		$select = $this->db->where('tbl_material.deleted', 0);	
		$data['material'] = $this->m->Get_All('material', $select);

		$select = $this->db->select('*, tbl_parcel.hargabeli as hargadiamond,');
		$select       = $this->db->join('tbl_parcel', 'tbl_parcel.id_parcel = tbl_2ddesainsubdetail.id_parcel');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',$id_detail);
		$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
		$data['duaddesainsubdetail'] = $this->m->Get_All('2ddesainsubdetail', $select);

		$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->where('tbl_parcel.deleted', 0);
		$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
		$data['parcel'] = $this->m->Get_All('parcel', $select);

		$select               = $this->db->select('*, tbl_2ddesaindetail.ukuran as size, tbl_2ddesaindetail.ongkos as hargaongkos, tbl_tipedesign.id_tipe, tbl_tipedesign.tipedesign, tbl_warnaproduk.id_warnaproduk, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_material.id_material, tbl_finishing.finishing, tbl_finishing.id_finishing, tbl_konsepkepala.id_konsepkepala, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.id_ongkosrangka, tbl_ongkosrangka.ongkosrangka as ongkos, tbl_ongkoslainnya.ongkoslainnya as ongkoslainnya');
		$select               = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
		$select               = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
		$select               = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select           = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
		$select               = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
		$select               = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
		$select               = $this->db->join('tbl_ongkoslainnya', 'ongkoslainnya.id_ongkoslainnya = tbl_2ddesaindetail.id_ongkoslainnya');
		$select               = $this->db->where('tbl_2ddesaindetail.id_detail', $id_detail);
		$select               = $this->db->where('tbl_2ddesaindetail.deleted', 0);
		$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

		$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi,  g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil, tbl_masterproduk.hargabeli as hargaproduk');
		$select       = $this->db->join('tbl_masterproduk', 'tbl_masterproduk.id_produk = tbl_2ddesainkepala.id_barang');
		$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
		$select = $this->db->where('tbl_2ddesainkepala.id_detail',$id_detail);
		$select = $this->db->where('tbl_2ddesainkepala.deleted', 0);
		$data['desainkepala'] = $this->m->Get_All('2ddesainkepala', $select);

		$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
		$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
		$select = $this->db->order_by('namaproduk');
		$select = $this->db->where('tbl_masterproduk.deleted', 0);
		$data['produk'] = $this->m->Get_All('masterproduk', $select);

		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/2ddesain/detaildesain_header', $data);
		$this->load->view('templates_pimpinan/script', $data);
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function adddetaildesain()
	{	
		$this->form_validation->set_rules(
			'ukuran',
			'ukuran',
			'required|trim',
			[
				'required' => 'Field ukuran tidak boleh kosong', 
			]
		);

		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');
			$nama = $this->session->userdata('nama');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Tambah Data Cash Bank';



	        $select = $this->db->select('*');
			$select = $this->db->where('id_menu', 36);
			$select = $this->db->where('header_reference.deleted', 0);
			$data['nomorreference'] = $this->m->Get_All('header_reference', $select);

		

			$data1 = array(
				'ref_number' => 1,
				'id_menu' => 36
			);

			$data['cek1'] = $this->db->get_where('tbl_detail_reference', $data1);
			
			$data['number1'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 1,
				'id_menu' => 36
				])->row_array();
			
			

			$data2 = array(
				'ref_number' => 2,
				'id_menu' => 36
				);

			$data['cek2'] = $this->db->get_where('tbl_detail_reference', $data2);
			$data['number2'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 2,
				'id_menu' => 36
			])->row_array();

			$data3 = array(
				'ref_number' => 3,
				'id_menu' => 36
				);

			$data['cek3'] = $this->db->get_where('tbl_detail_reference', $data3);
			$data['number3'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 3,
				'id_menu' => 36
			])->row_array();

			$data4 = array(
				'ref_number' => 4,
				'id_menu' => 36
				);

			$data['cek4'] = $this->db->get_where('tbl_detail_reference', $data4);
			$data['number4'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 4,
				'id_menu' => 36
			])->row_array();

			$data5 = array(
				'ref_number' => 5,
				'id_menu' => 36
				);

			$data['cek5'] = $this->db->get_where('tbl_detail_reference', $data5);
			$data['number5'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 5,
				'id_menu' => 36
			])->row_array();

			$data6 = array(
				'ref_number' => 6,
				'id_menu' => 36
				);

			$data['cek6'] = $this->db->get_where('tbl_detail_reference', $data6);
			$data['number6'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 6,
				'id_menu' => 36
			])->row_array();

			$data7 = array(
				'ref_number' => 7,
				'id_menu' => 36
				);

			$data['cek7'] = $this->db->get_where('tbl_detail_reference', $data7);
			$data['number7'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 7,
				'id_menu' => 36
			])->row_array();

			$data8 = array(
				'ref_number' => 8,
				'id_menu' => 36
				);

			$data['cek8'] = $this->db->get_where('tbl_detail_reference', $data8);
			$data['number8'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 8,
				'id_menu' => 36
			])->row_array();
	 

			$data9 = array(
					'ref_number' => 9,
				'id_menu' => 36
				);

			$data['cek9'] = $this->db->get_where('tbl_detail_reference', $data9);

			$data['number9'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 9,
				'id_menu' => 36
			])->row_array();

			$data10 = array(
				'ref_number' => 10,
				'id_menu' => 36
				);

			$data['cek10'] = $this->db->get_where('tbl_detail_reference', $data10);

			$data['number10'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 10,
				'id_menu' => 36
			])->row_array();

			 

			$datacek = array(
				'ref_part' => 01,
				'id_menu' => 36
				);
			$data['nomorreference'] = $this->db->get_where('tbl_detail_reference', [
				'ref_part' => 01,
				'id_menu' => 36
			])->row_array();
 
			$data_ = array(
				'ref_part' => 01,
				'id_menu' => 36
			);

			$data['datacek'] = $this->db->get_where('tbl_detail_reference', $data_);
			
			$data['nomor'] = $this->db->get_where('tbl_detail_reference', [
				'ref_part' => 01,
				'id_menu' => 36
				])->row_array();

			$select = $this->db->select('*');
			$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('tbl_bagian.bagian', 'Designer 2D');
			$select = $this->db->where('tbl_karyawan.deleted', 0);
			$data['karyawan'] = $this->m->Get_All('karyawan', $select);

			$select = $this->db->select('*, tbl_material.material, tbl_material.satuan, tbl_kursmaterial.id_material');
			$select = $this->db->join('tbl_material', 'tbl_material.id_material = tbl_kursmaterial.id_material');
			$select = $this->db->order_by('tbl_kursmaterial.tanggal desc');
			$select = $this->db->where('tbl_kursmaterial.deleted', 0);
			$data['material'] = $this->m->Get_All('kursmaterial', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('tipedesign');
			$select = $this->db->where('deleted', 0);
			$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('warnaproduk');
			$select = $this->db->where('deleted', 0);
			$data['warnaproduk'] = $this->m->Get_All('warnaproduk', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('finishing');
			$select = $this->db->where('deleted', 0);
			$data['finishing'] = $this->m->Get_All('finishing', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('konsepkepala');
			$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('ongkoslainnya');
			$select = $this->db->where('deleted', 0);
			$data['ongkoslainnya'] = $this->m->Get_All('ongkoslainnya', $select);	

			$select = $this->db->select('sum(harga*berat)as hargadiamond, sum(jumlah)as totaljumlah, sum(berat)as totalberat');
			$select = $this->db->where('id_detail', 0);
			$select = $this->db->where('deleted', 0);
			$select = $this->db->where('id_user', $this->session->userdata('id_user'));
			$data['diamond'] = $this->m->Get_All('2ddesainsubdetail', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('deleted', 0);
			$data['client'] = $this->m->Get_All('client', $select);

			$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
			$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
			$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
			$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
			$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
			$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
			$select = $this->db->where('tbl_parcel.deleted', 0);
			$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
			$data['parcel'] = $this->m->Get_All('parcel', $select);


			$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
			$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
			$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
			$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
			$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
			$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
			$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
			$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
			$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
			$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
			$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
			$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
			$select = $this->db->order_by('namaproduk');
			$select = $this->db->where('tbl_masterproduk.deleted', 0);
			$data['produk'] = $this->m->Get_All('masterproduk', $select);

			$select = $this->db->select('*, sum(harga) as harga');
			$select       = $this->db->join('tbl_parcel', 'tbl_parcel.id_parcel = tbl_2ddesainsubdetail.id_parcel');
			$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
			$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
			$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
			$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
			$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
			$select = $this->db->where('tbl_2ddesainsubdetail.id_user',$this->session->userdata('id_user'));
			$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',0);
			$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
			$data['duaddesainsubdetail'] = $this->m->Get_All('2ddesainsubdetail', $select);

			$select       = $this->db->select('*, tbl_tipedesign.tipedesign, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.ongkosrangka');
			$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
			$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
			$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
			$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
			$select       = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
			$select       = $this->db->where('tbl_2ddesaindetail.id_header', 0);
			$select 	  = $this->db->where('tbl_2ddesaindetail.deleted', 0);
			$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

			

			$data['id_header'] 				   = $this->m->id_header();
			$data['id_detail'] 				   = $this->m->id_detail();
			$data['nomor2ddesain']             = $this->m->nomor2ddesain();

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/2ddesain/create2ddesain',$data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else{

			if ($this->input->post('diamond_')== "0") {
				$this->session->set_flashdata('error', 'Field diamond tidak boleh 0');
					$this->create2ddesain();
			}elseif ($this->input->post('kepala_')== "0") {
				$this->session->set_flashdata('error', 'Field kepala tidak boleh 0');
				$this->create2ddesain();
			}else{
			$config['upload_path']          = FCPATH . 'assets/file/2ddesain/' ;
		    $config['allowed_types']        = 'jpg|jpeg|png|mp4';
		    $config['max_size']             = 100000; //set max size allowed in Kilobyte
		    $config['max_width']            = 1000000; // set max width image allowed
		    $config['max_height']           = 1000000; // set max height allowed 
		    $config['encrypt_name']           = true; // set max height allowed 
		    $this->load->library('upload', $config);

		    if(!empty($_FILES['gambar1']['name']))
			{	

				$size = $_FILES['gambar1']['size'];
				$nama = $_FILES['gambar1']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 1 terlalu besar');
					redirect('tambahdata2ddesain');

				}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
					$this->session->set_flashdata('error', 'Format gambar 1 tidak sesuai');
					redirect('tambahdata2ddesain');
				} else{
					$this->upload->do_upload('gambar1');
					$data1 = $this->upload->data();
					$gambar1 = $data1['file_name'];
				}
				
			} else{
				$gambar1 = "Tidak Ada File";
			}

			if(!empty($_FILES['gambar2']['name']))
			{	

				$size = $_FILES['gambar2']['size'];
				$nama = $_FILES['gambar2']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 2 terlalu besar');
					redirect('tambahdata2ddesain');

				}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
					$this->session->set_flashdata('error', 'Format gambar 2 tidak sesuai');
					redirect('tambahdata2ddesain');
				} else{
					$this->upload->do_upload('gambar2');
					$data1 = $this->upload->data();
					$gambar2 = $data1['file_name'];
				}
				
			} else{
				$gambar2 = "Tidak Ada File";
			}

			if(!empty($_FILES['gambar3']['name']))
			{	

				$size = $_FILES['gambar3']['size'];
				$nama = $_FILES['gambar3']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 3 terlalu besar');
					redirect('tambahdata2ddesain');

				}elseif ($format != "jpg" and $format != "png" and  $format != "jpeg") {
					$this->session->set_flashdata('error', 'Format gambar 3 tidak sesuai');
					redirect('tambahdata2ddesain');
				} else{
					$this->upload->do_upload('gambar3');
					$data1 = $this->upload->data();
					$gambar3 = $data1['file_name'];
				}
				
			} else{
				$gambar3 = "Tidak Ada File";
			}

			if(!empty($_FILES['gambar4']['name']))
			{	

				$size = $_FILES['gambar4']['size'];
				$nama = $_FILES['gambar4']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 4 terlalu besar');
					redirect('tambahdata2ddesain');

				}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
					$this->session->set_flashdata('error', 'Format gambar 4 tidak sesuai');
					redirect('tambahdata2ddesain');
				} else{
					$this->upload->do_upload('gambar4');
					$data1 = $this->upload->data();
					$gambar4 = $data1['file_name'];
				}
				
			} else{
				$gambar4 = "Tidak Ada File";
			}

			if(!empty($_FILES['gambar5']['name']))
			{	

				$size = $_FILES['gambar5']['size'];
				$nama = $_FILES['gambar5']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 5 terlalu besar');
					redirect('tambahdata2ddesain');

				}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
					$this->session->set_flashdata('error', 'Format gambar 5 tidak sesuai');
					redirect('tambahdata2ddesain');
				} else{
					$this->upload->do_upload('gambar5');
					$data1 = $this->upload->data();
					$gambar5 = $data1['file_name'];
				}
				
			} else{
				$gambar5 = "Tidak Ada File";
			}

			
			if(!empty($_FILES['video1']['name']))
			{	

				$size = $_FILES['video1']['size'];
				$nama = $_FILES['video1']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Video 1 terlalu besar');
					redirect('tambahdata2ddesain');

				}elseif ($format != "mp4" and $format != "mkv" and $format != "mpg" and $format != "afi") {
					$this->session->set_flashdata('error', 'Format video 1 tidak sesuai');
					redirect('tambahdata2ddesain');
				} else{
					$this->upload->do_upload('video1');
					$data1 = $this->upload->data();
					$video1 = $data1['file_name'];
				}
				
			} else{
				$video1 = "Tidak Ada File";
			}

			if(!empty($_FILES['video2']['name']))
			{	

				$size = $_FILES['video2']['size'];
				$nama = $_FILES['video2']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', '>Video 2 terlalu besar');
					redirect('tambahdata2ddesain');

				}elseif ($format != "mp4" and $format != "mkv" and $format != "mpg" and $format != "afi") {
					$this->session->set_flashdata('error', 'Format Video 2 tidak sesuai');
					redirect('tambahdata2ddesain');
				} else{
					$this->upload->do_upload('video2');
					$data1 = $this->upload->data();
					$video2 = $data1['file_name'];
				}
				
			} else{
				$video2 = "Tidak Ada File";
			}

			if(!empty($_FILES['video3']['name']))
			{	

				$size = $_FILES['video3']['size'];
				$nama = $_FILES['video3']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Video 3 terlalu besar');
					redirect('tambahdata2ddesain');

				}elseif ($format != "mp4" and $format != "mkv" and $format != "mpg" and $format != "afi") {
					$this->session->set_flashdata('error', 'Format Video 3 tidak sesuai');
					redirect('tambahdata2ddesain');
				} else{
					$this->upload->do_upload('video3');
					$data1 = $this->upload->data();
					$video3 = $data1['file_name'];
				}
				
			} else{
				$video3 = "Tidak Ada File";
			}
			$data = array(

				'id_header'          =>	$this->input->post('id_header'),
				'id_detail'          =>	$this->input->post('id_detail'),
				'model'              =>	$this->input->post('model'),
				'submodel'           =>	$this->input->post('submodel'),
				'ukuran'             =>	$this->input->post('ukuran'),
				'hargadiamond'       =>	str_replace('.', '', $this->input->post('hargadiamond')),
				'totaljumlah'        =>	$this->input->post('totaljumlah'),
				'totalberat'         =>	$this->input->post('totalberat'),
				'id_ongkoslainnya'   =>	$this->input->post('ongkoslainnya'),
				'hargakepala'        =>	str_replace('.', '', $this->input->post('hargakepala')),
				'totalharga'         =>	str_replace('.', '', $this->input->post('total')),
				'ongkos'             =>	str_replace('.', '', $this->input->post('hargaongkos')),
				'hargamaterial'      =>	str_replace('.', '', $this->input->post('hargamaterial')),
				'beratmaterial'      =>	$this->input->post('beratmaterial'),
				'id_material'        =>	$this->input->post('idmaterial'),
				'id_tipe'            =>	$this->input->post('idtipedesign'),
				'id_warna'           =>	$this->input->post('idwarnaproduk'),
				'id_finishing'       =>	$this->input->post('idfinishing'),
				'id_konsepkepala'    =>	$this->input->post('idkonsepkepala'),
				'id_ongkosrangka'    =>	$this->input->post('idongkosrangka'),
				'jsfinishing'        =>	$this->input->post('jsfinishing'),
				'jspolesrangka'      =>	$this->input->post('jspolesrangka'),
				'jspasangbatu'       =>	$this->input->post('jspasangbatu'),
				'gender'             =>	$this->input->post('jeniskelamin'),
				'jsrakit'            =>	$this->input->post('jspolesrakit'),
				'jspoleschrome'      =>	$this->input->post('jspoleschrome'),
				'gambar1'            =>	$gambar1,
				'gambar2'            =>	$gambar2,
				'gambar3'            =>	$gambar3,
				'gambar4'            =>	$gambar4,
				'gambar5'            =>	$gambar5,
				'video1'             =>	$video1,
				'video2'             =>	$video2,
				'video3'             =>	$video3,
			);

			$this->m->Save($data, '2ddesaindetail');

			$id_user = $this->session->userdata('id_user') ;
			$table = '2ddesainsubdetail';
			$where = array(
				'id_detail'		       =>   0,
				'id_user'		       =>   $id_user
			);

		    $data = array(
					'id_detail'         =>	$this->input->post('id_detail'),
			);
			$this->m->Update($where, $data, $table);

			$id_user = $this->session->userdata('id_user') ;
			$table = '2ddesainkepala';
			$where = array(
				'id_detail'		       =>   0,
				'id_user'		       =>   $id_user
			);

				$data = array(
					'id_detail'         =>	$this->input->post('id_detail'),
			);
			$this->m->Update($where, $data, $table);


			$table = '2ddesainsubdetail';
			$where = array(
				'harga'		    =>	0
			);
			$this->m->Delete($where,$table);

			$table = '2ddesainkepala';
			$where = array(
				'harga'		    =>	0
			);
			$this->m->Delete($where,$table);

			$this->session->set_flashdata('success', 'Data detail desain detail berhasil ditambah');
			redirect('tambahdata2ddesain');
			}	
		}
			
	}
	function adddetaildesain_edit()
	{	
		$id_header = $this->input->post("id_header");
		$this->form_validation->set_rules(
			'ukuran',
			'ukuran',
			'required|trim',
			[
				'required' => 'Field ukuran tidak boleh kosong',
			]
		);

		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');
			$nama = $this->session->userdata('nama');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Edit Data 2D Design';

			$select = $this->db->select('*');
			$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('tbl_bagian.bagian', 'Designer 2D');
			$select = $this->db->where('tbl_karyawan.deleted', 0);
			$data['karyawan'] = $this->m->Get_All('karyawan', $select);

			$select = $this->db->select('*, tbl_material.material, tbl_material.satuan, tbl_kursmaterial.id_material');
			$select = $this->db->join('tbl_material', 'tbl_material.id_material = tbl_kursmaterial.id_material');
			$select = $this->db->order_by('tbl_kursmaterial.tanggal desc');
			$select = $this->db->where('tbl_kursmaterial.deleted', 0);
			$data['material'] = $this->m->Get_All('kursmaterial', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('tipedesign');
			$select = $this->db->where('deleted', 0);
			$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('warnaproduk');
			$select = $this->db->where('deleted', 0);
			$data['warnaproduk'] = $this->m->Get_All('warnaproduk', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('finishing');
			$select = $this->db->where('deleted', 0);
			$data['finishing'] = $this->m->Get_All('finishing', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('konsepkepala'); 
			$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);

		 

			$select = $this->db->select('sum(harga*berat)as hargadiamond, sum(jumlah)as totaljumlah, sum(berat)as totalberat');
			$select = $this->db->where('id_detail', 0);
			$select = $this->db->where('deleted', 0);
			$select = $this->db->where('id_user', $this->session->userdata('id_user'));
			$data['diamond'] = $this->m->Get_All('2ddesainsubdetail', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('nama');
			$select = $this->db->where('deleted', 0);
			$data['client'] = $this->m->Get_All('client', $select);

			$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
			$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
			$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
			$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
			$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
			$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
			$select = $this->db->where('tbl_parcel.deleted', 0);
			$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
			$data['parcel'] = $this->m->Get_All('parcel', $select);


			$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
			$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
			$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
			$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
			$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
			$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
			$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
			$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
			$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
			$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
			$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
			$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
			$select = $this->db->order_by('namaproduk');
			$select = $this->db->where('tbl_masterproduk.deleted', 0);
			$data['produk'] = $this->m->Get_All('masterproduk', $select);

			$select = $this->db->select('*, tbl_karyawan.nama as namakaryawan, tbl_client.nama as namaklien, tbl_bagian.bagian');
			$select = $this->db->join('karyawan', 'karyawan.id_karyawan = 2ddesainheader.id_karyawan');
			$select = $this->db->join('client', 'client.id_client = 2ddesainheader.id_client', 'left');
			$select = $this->db->join('bagian', 'bagian.id_bagian = karyawan.id_bagian');
			$select = $this->db->where('tbl_2ddesainheader.deleted', 0);
			$select = $this->db->where('tbl_2ddesainheader.id_header', $id_header);
			$data['designheader'] = $this->m->Get_All('2ddesainheader', $select);

			$select       = $this->db->select('*, tbl_tipedesign.tipedesign, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.ongkosrangka as ongkos');
			$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
			$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
			$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
			$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
			$select       = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
			$select       = $this->db->where('tbl_2ddesaindetail.id_header', $id_header);
			$select 	  = $this->db->where('tbl_2ddesaindetail.deleted', 0);
			$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

			$select       = $this->db->select('*, tbl_tipedesign.tipedesign, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.ongkosrangka as ongkos');
			$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
			$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
			$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
			$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
			$select       = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
			$select       = $this->db->where('tbl_2ddesaindetail.id_header',$id_header);
			$select 	  = $this->db->where('tbl_2ddesaindetail.deleted', 0);
			$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);


			$data['id_detail'] 				   = $this->m->id_detail();

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/2ddesain/edit2ddesain',$data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else{

			if ($this->input->post('diamond_')== "0") {
				$this->session->set_flashdata('error', 'Field diamond tidak boleh 0');
					redirect("editdata2ddesain/$id_header");;
			}elseif ($this->input->post('kepala_')== "0") {
				$this->session->set_flashdata('error', 'Field kepala tidak boleh 0');
				redirect("editdata2ddesain/$id_header");;
			}else{
				$config['upload_path']          = 'assets/file/2ddesain/';
		    $config['allowed_types']        = 'jpg|jpeg|png|mp4';
		    $config['max_size']             = 100000; //set max size allowed in Kilobyte
		    $config['max_width']            = 1000000; // set max width image allowed
		    $config['max_height']           = 1000000; // set max height allowed 
		    $config['encrypt_name']           = true; // set max height allowed 
		    $this->load->library('upload', $config);

		    if(!empty($_FILES['gambar1']['name']))
			{	

				$size = $_FILES['gambar1']['size'];
				$nama = $_FILES['gambar1']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 1 terlalu besar');
					$this->edit2ddesain($id_header);

				}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
					$this->session->set_flashdata('error', 'Format gambar 1 tidak sesuai');
					$this->edit2ddesain($id_header);
				} else{
					$this->upload->do_upload('gambar1');
					$data1 = $this->upload->data();
					$gambar1 = $data1['file_name'];
				}
				
			} else{
				$gambar1 = "Tidak Ada File";
			}

			if(!empty($_FILES['gambar2']['name']))
			{	

				$size = $_FILES['gambar2']['size'];
				$nama = $_FILES['gambar2']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 2 terlalu besar');
					$this->edit2ddesain($id_header);

				}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
					$this->session->set_flashdata('error', 'Format gambar 2 tidak sesuai');
					$this->edit2ddesain($id_header);
				} else{
					$this->upload->do_upload('gambar2');
					$data1 = $this->upload->data();
					$gambar2 = $data1['file_name'];
				}
				
			} else{
				$gambar2 = "Tidak Ada File";
			}

			if(!empty($_FILES['gambar3']['name']))
			{	

				$size = $_FILES['gambar3']['size'];
				$nama = $_FILES['gambar3']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 3 terlalu besar');
					$this->edit2ddesain($id_header);

				}elseif ($format != "jpg" and $format != "png" and  $format != "jpeg") {
					$this->session->set_flashdata('error', 'Format gambar 3 tidak sesuai');
					$this->edit2ddesain($id_header);
				} else{
					$this->upload->do_upload('gambar3');
					$data1 = $this->upload->data();
					$gambar3 = $data1['file_name'];
				}
				
			} else{
				$gambar3 = "Tidak Ada File";
			}

			if(!empty($_FILES['gambar4']['name']))
			{	

				$size = $_FILES['gambar4']['size'];
				$nama = $_FILES['gambar4']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 4 terlalu besar');
					$this->edit2ddesain($id_header);

				}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
					$this->session->set_flashdata('error', 'Format gambar 4 tidak sesuai');
					$this->edit2ddesain($id_header);
				} else{
					$this->upload->do_upload('gambar4');
					$data1 = $this->upload->data();
					$gambar4 = $data1['file_name'];
				}
				
			} else{
				$gambar4 = "Tidak Ada File";
			}

			if(!empty($_FILES['gambar5']['name']))
			{	

				$size = $_FILES['gambar5']['size'];
				$nama = $_FILES['gambar5']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Gambar 5 terlalu besar');
					$this->edit2ddesain($id_header);

				}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
					$this->session->set_flashdata('error', 'Format gambar 5 tidak sesuai');
					$this->edit2ddesain($id_header);
				} else{
					$this->upload->do_upload('gambar5');
					$data1 = $this->upload->data();
					$gambar5 = $data1['file_name'];
				}
				
			} else{
				$gambar5 = "Tidak Ada File";
			}

			
			if(!empty($_FILES['video1']['name']))
			{	

				$size = $_FILES['video1']['size'];
				$nama = $_FILES['video1']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Video 1 terlalu besar');
					$this->edit2ddesain($id_header);

				}elseif ($format != "mp4" and $format != "mkv" and $format != "mpg" and $format != "afi") {
					$this->session->set_flashdata('error', 'Format video 1 tidak sesuai');
					$this->edit2ddesain($id_header);
				} else{
					$this->upload->do_upload('video1');
					$data1 = $this->upload->data();
					$video1 = $data1['file_name'];
				}
				
			} else{
				$video1 = "Tidak Ada File";
			}

			if(!empty($_FILES['video2']['name']))
			{	

				$size = $_FILES['video2']['size'];
				$nama = $_FILES['video2']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Video 2 terlalu besar');
					$this->edit2ddesain($id_header);

				}elseif ($format != "mp4" and $format != "mkv" and $format != "mpg" and $format != "afi") {
					$this->session->set_flashdata('error', 'Format Video 2 tidak sesuai');
					$this->edit2ddesain($id_header);
				} else{
					$this->upload->do_upload('video2');
					$data1 = $this->upload->data();
					$video2 = $data1['file_name'];
				}
				
			} else{
				$video2 = "Tidak Ada File";
			}

			if(!empty($_FILES['video3']['name']))
			{	

				$size = $_FILES['video3']['size'];
				$nama = $_FILES['video3']['name'];

				$format = pathinfo($nama, PATHINFO_EXTENSION);

				
				
				if ($size > 10000000) {
					$this->session->set_flashdata('error', 'Video 3 terlalu besar');
					$this->edit2ddesain($id_header);

				}elseif ($format != "mp4" and $format != "mkv" and $format != "mpg" and $format != "afi") {
					$this->session->set_flashdata('error', 'Format Video 3 tidak sesuai');
					$this->edit2ddesain($id_header);
				} else{
					$this->upload->do_upload('video3');
					$data1 = $this->upload->data();
					$video3 = $data1['file_name'];
				}
				
			} else{
				$video3 = "Tidak Ada File";
			}
			$data = array(

				'id_header'          =>	$this->input->post('id_header'),
				'id_detail'          =>	$this->input->post('id_detail'),
				'model'              =>	$this->input->post('model'),
				'submodel'           =>	$this->input->post('submodel'),
				'ukuran'             =>	$this->input->post('ukuran'),
				'id_ongkoslainnya'   =>	$this->input->post('ongkoslainnya'),
				'hargadiamond'       =>	str_replace('.', '', $this->input->post('hargadiamond')),
				'totaljumlah'        =>	$this->input->post('totaljumlah'),
				'totalberat'         =>	$this->input->post('totalberat'),
				'hargakepala'        =>	str_replace('.', '', $this->input->post('hargakepala')),
				'totalharga'         =>	str_replace('.', '', $this->input->post('total')),
				'ongkos'             =>	str_replace('.', '', $this->input->post('hargaongkos')),
				'hargamaterial'      =>	str_replace('.', '', $this->input->post('hargamaterial')),
				'beratmaterial'      =>	$this->input->post('beratmaterial'),
				'id_material'        =>	$this->input->post('idmaterial'),
				'id_tipe'            =>	$this->input->post('idtipedesign'),
				'id_warna'           =>	$this->input->post('idwarnaproduk'),
				'id_finishing'       =>	$this->input->post('idfinishing'),
				'id_konsepkepala'    =>	$this->input->post('idkonsepkepala'),
				'id_ongkosrangka'	 =>	$this->input->post('idongkosrangka'),
				'jsfinishing'        =>	$this->input->post('jsfinishing'),
				'jspolesrangka'      =>	$this->input->post('jspolesrangka'),
				'jspasangbatu'       =>	$this->input->post('jspasangbatu'),
				'gender'             =>	$this->input->post('jeniskelamin'),
				'jsrakit'            =>	$this->input->post('jspolesrakit'),
				'jspoleschrome'      =>	$this->input->post('jspoleschrome'),
				'status'             =>	1,
				'gambar1'            =>	$gambar1,
				'gambar2'            =>	$gambar2,
				'gambar3'            =>	$gambar3,
				'gambar4'            =>	$gambar4,
				'gambar5'            =>	$gambar5,
				'video1'             =>	$video1,
				'video2'             =>	$video2,
				'video3'             =>	$video3,
			);

			$this->m->Save($data, '2ddesaindetail');

			$id_user = $this->session->userdata('id_user') ;
			$table = '2ddesainsubdetail';
			$where = array(
				'id_detail'		       =>   0,
				'id_user'		       =>   $id_user
			);

		    $data = array(
					'id_detail'         =>	$this->input->post('id_detail'),
					'part'              =>	$this->input->post('id_header'),
			);
			$this->m->Update($where, $data, $table);

			$id_user = $this->session->userdata('id_user') ;
			$table = '2ddesainkepala';
			$where = array(
				'id_detail'		       =>   0,
				'id_user'		       =>   $id_user
			);

				$data = array(
					'id_detail'         =>	$this->input->post('id_detail'),
					'part'              =>	$this->input->post('id_header'),
			);
			$this->m->Update($where, $data, $table);

			$this->session->set_flashdata('success', 'Data detail desain detail berhasil ditambah');
			redirect("editdata2ddesain/$id_header");
			}	
		}
			
	}
	function editdetaildesain()
	{
		$id_detail = $this->input->post("id_detail");
		$data = [
			'title' => 'PT.MMM | Edit Detail Desain'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
		$select = $this->db->order_by('nama');
		$select = $this->db->where('tbl_bagian.bagian', 'Designer 2D');
		$select = $this->db->where('tbl_karyawan.deleted', 0);
		$data['karyawan'] = $this->m->Get_All('karyawan', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('material');
		$select = $this->db->where('deleted', 0);
		$data['material'] = $this->m->Get_All('material', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('tipedesign');
		$select = $this->db->where('deleted', 0);
		$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('warnaproduk');
		$select = $this->db->where('deleted', 0);
		$data['warnaproduk'] = $this->m->Get_All('warnaproduk', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('finishing');
		$select = $this->db->where('deleted', 0);
		$data['finishing'] = $this->m->Get_All('finishing', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('konsepkepala'); 
		$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);

 		$select = $this->db->select('*');
		$select = $this->db->order_by('ongkoslainnya');
		$select = $this->db->where('deleted', 0);
		$data['ongkoslainnya'] = $this->m->Get_All('ongkoslainnya', $select);	

		$select = $this->db->select('*');
		$select = $this->db->order_by('tbl_material.material asc');
		$select = $this->db->where('tbl_material.deleted', 0);	
		$data['material'] = $this->m->Get_All('material', $select);

		$select = $this->db->select('*, tbl_parcel.hargabeli as hargadiamond,');
		$select       = $this->db->join('tbl_parcel', 'tbl_parcel.id_parcel = tbl_2ddesainsubdetail.id_parcel');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',$id_detail);
		$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
		$data['duaddesainsubdetail'] = $this->m->Get_All('2ddesainsubdetail', $select);

		$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->where('tbl_parcel.deleted', 0);
		$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
		$data['parcel'] = $this->m->Get_All('parcel', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('headsetting');
		$select = $this->db->where('deleted', 0);
		$data['headsetting'] = $this->m->Get_All('headsetting', $select);

		$select               = $this->db->select('*, tbl_2ddesaindetail.ukuran as size, tbl_2ddesaindetail.ongkos as hargaongkos, tbl_tipedesign.id_tipe, tbl_tipedesign.tipedesign, tbl_warnaproduk.id_warnaproduk, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_material.id_material, tbl_finishing.finishing, tbl_finishing.id_finishing, tbl_konsepkepala.id_konsepkepala, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.id_ongkosrangka, tbl_ongkosrangka.ongkosrangka as hargaongkosrangka, tbl_ongkoslainnya.price as hargaongkoslainnya');
		$select               = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
		$select               = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
		$select               = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select           = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
		$select               = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
		$select               = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
		$select               = $this->db->join('tbl_ongkoslainnya', 'ongkoslainnya.id_ongkoslainnya = tbl_2ddesaindetail.id_ongkoslainnya');
		$select               = $this->db->where('tbl_2ddesaindetail.id_detail', $id_detail);
		$select               = $this->db->where('tbl_2ddesaindetail.deleted', 0);
		$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

		$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi,  g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil, tbl_masterproduk.hargabeli as hargaproduk');
		$select       = $this->db->join('tbl_masterproduk', 'tbl_masterproduk.id_produk = tbl_2ddesainkepala.id_barang');
		$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
		$select = $this->db->where('tbl_2ddesainkepala.id_detail',$id_detail);
		$select = $this->db->where('tbl_2ddesainkepala.deleted', 0);
		$data['desainkepala'] = $this->m->Get_All('2ddesainkepala', $select);

		$select = $this->db->select('sum(harga*berat)as diamondharga, sum(jumlah)as totaljumlah, sum(berat)as totalberat');
		$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
		$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',$id_detail);
		$select = $this->db->where('id_user', $this->session->userdata('id_user'));
		$data['hargadiamond'] = $this->m->Get_All('2ddesainsubdetail', $select);

		$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
		$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
		$select = $this->db->order_by('namaproduk');
		$select = $this->db->where('tbl_masterproduk.deleted', 0);
		$data['produk'] = $this->m->Get_All('masterproduk', $select);

		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/2ddesain/editdetaildesain', $data);
		$this->load->view('templates_pimpinan/script', $data);
		$this->load->view('templates_pimpinan/footer', $data);
	}

	function updatedetaildesain()
	{
		$id_detail = $this->input->post('id_detail');
		$id_header = $this->input->post("idheader");
	
		
		$this->form_validation->set_rules(
			'ukuran',
			'ukuran',
			'required|trim',
			[
			  'required'   => 'Field ukuran tidak boleh kosong'
			]
		);

		if ($this->form_validation->run() == false) {
			$this->editdetaildesain();
		}else {
		
			if ($id_header == "0") { 
				$table = '2ddesaindetail';
				$where = array(
					'id_detail'		    =>	$id_detail
				);
			$data = array(

				'model'              =>	$this->input->post('model'),
				'submodel'           =>	$this->input->post('submodel'),
				'ukuran'             =>	$this->input->post('ukuran'),
				'hargadiamond'       =>	str_replace('.', '', $this->input->post('hargadiamond')),
				'totaljumlah'        =>	$this->input->post('totaljumlah'),
				'totalberat'         =>	$this->input->post('totalberat'),
				'hargakepala'        =>	str_replace('.', '', $this->input->post('hargakepala')),
				'totalharga'         =>	str_replace('.', '', $this->input->post('total')),
				'ongkos'             =>	str_replace('.', '', $this->input->post('hargaongkos')),
				'hargamaterial'      =>	str_replace('.', '', $this->input->post('hargamaterial')),
				'beratmaterial'      =>	$this->input->post('beratmaterial'),
				'id_material'        =>	$this->input->post('idmaterial'),
				'id_tipe'            =>	$this->input->post('idtipedesign'),
				'id_warna'           =>	$this->input->post('idwarnaproduk'),
				'id_finishing'       =>	$this->input->post('idfinishing'),
				'id_konsepkepala'    =>	$this->input->post('idkonsepkepala'),
				'id_ongkosrangka'    =>	$this->input->post('idongkosrangka'),
				'jsfinishing'        =>	$this->input->post('jsfinishing'),
				'jspolesrangka'      =>	$this->input->post('jspolesrangka'),
				'jspasangbatu'       =>	$this->input->post('jspasangbatu'),
				'gender'             =>	$this->input->post('jeniskelamin'),
				'jsrakit'            =>	$this->input->post('jspolesrakit'),
				'jspoleschrome'      =>	$this->input->post('jspoleschrome'),
				'deleted'            =>	0,
			);
			$gambar1 = $_FILES['gambar1']['name'];
            if ($gambar1) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar1')) {
 					   
	                $new_image = $this->upload->data('file_name');
	                $this->db->set('gambar1', $new_image);
	                $oldgambar1 = $this->input->post('gambar1_');
 					$path1 = './assets/file/2ddesain/'.$oldgambar1;
 					unlink($path1);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar1']['name']))
			{
				$this->upload->do_upload('gambar1');
				$data1 = $this->upload->data();
				$gambar1 = $data1['file_name'];
			} else{
								$gambar1 = "Tidak Ada File";
			}

			$gambar2 = $_FILES['gambar2']['name'];
            if ($gambar2) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar2')) {
                    $oldgambar2 = $this->input->post('gambar2_');

                 	
                 	$path2 = './assets/file/2ddesain/'.$oldgambar2;
            		unlink($path2);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar2']['name']))
			{
				$this->upload->do_upload('gambar2');
				$data1 = $this->upload->data();
				$gambar2 = $data1['file_name'];
			} else{
								$gambar2 = "Tidak Ada File";
			}

			$gambar3 = $_FILES['gambar3']['name'];
            if ($gambar3) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar3')) {
                   $oldgambar3 = $this->input->post('gambar3_');
                 	
                 	$path3 = './assets/file/2ddesain/'.$oldgambar3;
            		unlink($path3);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar3', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar3']['name']))
			{
				$this->upload->do_upload('gambar3');
				$data1 = $this->upload->data();
				$gambar3 = $data1['file_name'];
			} else{
								$gambar3 = "Tidak Ada File";
			}

			$gambar4 = $_FILES['gambar4']['name'];
            if ($gambar4) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar4')) {
                    $oldgambar4 = $this->input->post('gambar4_');
                 	
                 	$path4 = './assets/file/2ddesain/'.$oldgambar4;
            		unlink($path4);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar4', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar4']['name']))
			{
				$this->upload->do_upload('gambar4');
				$data1 = $this->upload->data();
				$gambar4 = $data1['file_name'];
			} else{
								$gambar4 = "Tidak Ada File";
			}

			$gambar5 = $_FILES['gambar5']['name'];
            if ($gambar5) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar5')) {
                    $oldgambar5 = $this->input->post('gambar5_');
                 	
                 	$path5 = './assets/file/2ddesain/'.$oldgambar5;
            		unlink($path5);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar5', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar5']['name']))
			{
				$this->upload->do_upload('gambar5');
				$data1 = $this->upload->data();
				$gambar5 = $data1['file_name'];
			} else{
								$gambar5 = "Tidak Ada File";
			}

			$video1 = $_FILES['video1']['name'];
            if ($video1) {
                $config['allowed_types'] = 'mp4|mkv|mpg|avi';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video1')) {
                    $oldvideo1 = $this->input->post('video1_');
                 	
                 	$pathvideo1 = './assets/file/2ddesain/'.$oldvideo1;
            		unlink($pathvideo1);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('video1', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['video1']['name']))
			{
				$this->upload->do_upload('video1');
				$data1 = $this->upload->data();
				$video1 = $data1['file_name'];
			} else{
								$video1 = "Tidak Ada File";
			}

			$video2 = $_FILES['video2']['name'];
            if ($video2) {
                $config['allowed_types'] = 'mp4|mkv|mpg|avi';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video2')) {
                    $oldvideo2 = $this->input->post('video2_');
                 	
                 	$pathvideo2 = './assets/file/2ddesain/'.$oldvideo2;
            		unlink($pathvideo2);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('video2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['video2']['name']))
			{
				$this->upload->do_upload('video2');
				$data1 = $this->upload->data();
				$video2 = $data1['file_name'];
			} else{
								$video2 = "Tidak Ada File";
			}


			$video3 = $_FILES['video3']['name'];
            if ($video3) {
                $config['allowed_types'] = 'mp4|mkv|mpg|avi';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video3')) {
                    $oldvideo2 = $this->input->post('video3_');
                 	
                 	$pathvideo2 = './assets/file/2ddesain/'.$oldvideo2;
            		unlink($pathvideo2);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('video2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['video3']['name']))
			{
				$this->upload->do_upload('video3');
				$data1 = $this->upload->data();
				$video3 = $data1['file_name'];
			} else{
								$video3 = "Tidak Ada File";
			}

				$this->m->Update($where, $data, $table);

				$table = '2ddesainsubdetail';
				$where = array(
					'id_detail'		    =>	$id_detail
				);
			$data = array(

				'status'             =>	0,
			);
			$this->m->Update($where, $data, $table);

			$table = '2ddesainkepala';
			$where = array(
					'id_detail'		    =>	$id_detail
				);
			$data = array(

				'status'             =>	0,
			);
			$this->m->Update($where, $data, $table);

			$table = '2ddesainsubdetail';
				$where = array(
					'id_detail'		    =>	$id_detail
				);
			$data = array(

				'status'              =>	0, 
			);
			$this->m->Update($where, $data, $table);

			$table = '2ddesainkepala';
				$where = array(
					'id_detail'		    =>	$id_detail
				);
			$data = array(

				'status'              =>	0, 
			);
			$this->m->Update($where, $data, $table);

			$table = '2ddesainsubdetail';
			$where = array(
				'harga'		    =>	0
			);
			$this->m->Delete($where,$table);

			$table = '2ddesainkepala';
			$where = array(
				'harga'		    =>	0
			);
			$this->m->Delete($where,$table);

				$this->session->set_flashdata('success', 'Detail desain berhasil diubah');
				redirect("tambahdata2ddesain");
			
			}elseif ($id_header != "0") { 
				$table = '2ddesaindetail';
				$where = array(
					'id_detail'		    =>	$id_detail
				);
			$data = array(

				'model'              =>	$this->input->post('model'),
				'submodel'           =>	$this->input->post('submodel'),
				'ukuran'             =>	$this->input->post('ukuran'),
				'hargadiamond'       =>	str_replace('.', '', $this->input->post('hargadiamond')),
				'totaljumlah'        =>	$this->input->post('totaljumlah'),
				'totalberat'         =>	$this->input->post('totalberat'),
				'hargakepala'        =>	str_replace('.', '', $this->input->post('hargakepala')),
				'totalharga'         =>	str_replace('.', '', $this->input->post('total')),
				'ongkos'             =>	str_replace('.', '', $this->input->post('hargaongkos')),
				'hargamaterial'      =>	str_replace('.', '', $this->input->post('hargamaterial')),
				'beratmaterial'      =>	$this->input->post('beratmaterial'),
				'id_material'        =>	$this->input->post('idmaterial'),
				'id_tipe'            =>	$this->input->post('idtipedesign'),
				'id_warna'           =>	$this->input->post('idwarnaproduk'),
				'id_finishing'       =>	$this->input->post('idfinishing'),
				'id_konsepkepala'    =>	$this->input->post('idkonsepkepala'),
				'id_ongkosrangka'    =>	$this->input->post('idongkosrangka'),
				'id_ongkoslainnya'   =>	$this->input->post('ongkoslainnya'),
				'jsfinishing'        =>	$this->input->post('jsfinishing'),
				'jspolesrangka'      =>	$this->input->post('jspolesrangka'),
				'jspasangbatu'       =>	$this->input->post('jspasangbatu'),
				'gender'             =>	$this->input->post('jeniskelamin'),
				'jsrakit'            =>	$this->input->post('jspolesrakit'),
				'jspoleschrome'      =>	$this->input->post('jspoleschrome'),
				'deleted'            =>	0,
			);
			$gambar1 = $_FILES['gambar1']['name'];
            if ($gambar1) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar1')) {

                	$id_detail = $this->input->post('iddetail');
                	$size = $_FILES['gambar1']['size'];
					$nama = $_FILES['gambar1']['name'];


					$format = pathinfo($nama, PATHINFO_EXTENSION);

					if ($size > 10000000) {
						$this->session->set_flashdata('error', 'Gambar 1 terlalu besar');
						$this->editdetaildesain($id_detail);
					}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
						$this->session->set_flashdata('error', 'Format gambar1 tidak sesuai');
						$this->editdetaildesain($id_detail);
					}else{
						 $oldgambar1 = $this->input->post('gambar1_');
                 	
	                 	 $path1 = './assets/file/2ddesain/'.$oldgambar1;
	            		 unlink($path1);
	                   
	                    $new_image = $this->upload->data('file_name');
	                    $this->db->set('gambar1', $new_image);
					}

                   
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar1']['name']))
			{
				$this->upload->do_upload('gambar1');
				$data1 = $this->upload->data();
				$gambar1 = $data1['file_name'];
			} else{
								$gambar1 = "Tidak Ada File";
			}

			$gambar2 = $_FILES['gambar2']['name'];
            if ($gambar2) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar2')) {
                    $oldgambar2 = $this->input->post('gambar2_');
                 	
                 	$path2 = './assets/file/2ddesain/'.$oldgambar2;
            		unlink($path2);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar2']['name']))
			{
				$this->upload->do_upload('gambar2');
				$data1 = $this->upload->data();
				$gambar2 = $data1['file_name'];
			} else{
								$gambar2 = "Tidak Ada File";
			}

			$gambar3 = $_FILES['gambar3']['name'];
            if ($gambar3) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar3')) {
                   $oldgambar3 = $this->input->post('gambar3_');
                 	
                 	$path3 = './assets/file/2ddesain/'.$oldgambar3;
            		unlink($path3);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar3', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar3']['name']))
			{
				$this->upload->do_upload('gambar3');
				$data1 = $this->upload->data();
				$gambar3 = $data1['file_name'];
			} else{
								$gambar3 = "Tidak Ada File";
			}

			$gambar4 = $_FILES['gambar4']['name'];
            if ($gambar4) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar4')) {
                    $oldgambar4 = $this->input->post('gambar4_');
                 	
                 	$path4 = './assets/file/2ddesain/'.$oldgambar4;
            		unlink($path4);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar4', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar4']['name']))
			{
				$this->upload->do_upload('gambar4');
				$data1 = $this->upload->data();
				$gambar4 = $data1['file_name'];
			} else{
								$gambar4 = "Tidak Ada File";
			}

			$gambar5 = $_FILES['gambar5']['name'];
            if ($gambar5) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar5')) {
                    $oldgambar5 = $this->input->post('gambar5_');
                 	
                 	$path5 = './assets/file/2ddesain/'.$oldgambar5;
            		unlink($path5);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar5', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['gambar5']['name']))
			{
				$this->upload->do_upload('gambar5');
				$data1 = $this->upload->data();
				$gambar5 = $data1['file_name'];
			} else{
								$gambar5 = "Tidak Ada File";
			}

			$video1 = $_FILES['video1']['name'];
            if ($video1) {
                $config['allowed_types'] = 'mp4|mkv|mpg|avi';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video1')) {
                    $oldvideo1 = $this->input->post('video1_');
                 	
                 	$pathvideo1 = './assets/file/2ddesain/'.$oldvideo1;
            		unlink($pathvideo1);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('video1', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['video1']['name']))
			{
				$this->upload->do_upload('video1');
				$data1 = $this->upload->data();
				$video1 = $data1['file_name'];
			} else{
								$video1 = "Tidak Ada File";
			}

			$video2 = $_FILES['video2']['name'];
            if ($video2) {
                $config['allowed_types'] = 'mp4|mkv|mpg|avi';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video2')) {
                    $oldvideo2 = $this->input->post('video2_');
                 	
                 	$pathvideo2 = './assets/file/2ddesain/'.$oldvideo2;
            		unlink($pathvideo2);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('video2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['video2']['name']))
			{
				$this->upload->do_upload('video2');
				$data1 = $this->upload->data();
				$video2 = $data1['file_name'];
			} else{
								$video2 = "Tidak Ada File";
			}


			$video3 = $_FILES['video3']['name'];
            if ($video3) {
                $config['allowed_types'] = 'mp4|mkv|mpg|avi';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/2ddesain';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video3')) {
                    $oldvideo3 = $this->input->post('video3_');
                 	
                 	$pathvideo3 = './assets/file/2ddesain/'.$oldvideo3;
            		unlink($pathvideo3);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('video2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }elseif(!empty($_FILES['video3']['name']))
			{
				$this->upload->do_upload('video3');
				$data1 = $this->upload->data();
				$video3 = $data1['file_name'];
			} else{
								$video3 = "Tidak Ada File";
			}

				$this->m->Update($where, $data, $table);

				$table = '2ddesainsubdetail';
				$where = array(
					'id_detail'		    =>	$id_detail
				);
				$data = array(

					'status'              =>	0, 
				);
				$this->m->Update($where, $data, $table);

				$table = '2ddesainkepala';
					$where = array(
						'id_detail'		    =>	$id_detail
					);
				$data = array(

					'status'              =>	0, 
				);
				$this->m->Update($where, $data, $table); 

				$table = '2ddesainsubdetail';
			$where = array(
				'harga'		    =>	0
			);
			$this->m->Delete($where,$table);

			$table = '2ddesainkepala';
			$where = array(
				'harga'		    =>	0
			);
			$this->m->Delete($where,$table);
				
				$this->session->set_flashdata('success', 'Detail desain berhasil diubah');
				redirect("list2ddesain");
			
			}
					
		}
		
	}
	function deletedetaildesainsementara()
	{
		$table = '2ddesaindetail';
		$where = array(
			'id_header'		    =>	$this->input->post('id_header'),
			'status'		    =>	$this->input->post('status')
		);
		$this->m->Delete($where, $table);

		$table = '2ddesainsubdetail';
		$where = array(
			'part'		    =>	$this->input->post('id_header'), 
		);

		$this->m->Delete($where, $table);

		$table = '2ddesainkepala';
		$where = array(
			'part'		    =>	$this->input->post('id_header'), 
		);

		$this->m->Delete($where, $table);
 
	}
	function deletesubdetailsementara()
	{
		$table = '2ddesainsubdetail';
		$where = array(
			'id_detail'		    =>	$this->input->post('id_detail'), 
			'status'		    =>	$this->input->post('status'),
		);

		$this->m->Delete($where, $table);

		$table = '2ddesainkepala';
		$where = array(
			'id_detail'		    =>	$this->input->post('id_detail'), 
			'status'		    =>	$this->input->post('status'),
		);

		$this->m->Delete($where, $table);
 
	}
	function deletedetaildesain()
	{	
		$id_header = $this->input->post("id_header");

		if ($id_header == "0") {
			$oldgambar1 = $this->input->post('gambar1'); 
			$oldgambar2 = $this->input->post('gambar2'); 
			$oldgambar3 = $this->input->post('gambar3'); 
			$oldgambar4 = $this->input->post('gambar4'); 
			$oldgambar5 = $this->input->post('gambar5'); 
			$oldvideo1 = $this->input->post('video1'); 
			$oldvideo2 = $this->input->post('video2'); 
			$oldvideo3 = $this->input->post('video3'); 


			if ($oldgambar1 == "Tidak" or $oldgambar2 == "Tidak" or $oldgambar3 == "Tidak" or $oldgambar4 == "Tidak" or $oldgambar5 == "Tidak" or $oldvideo1 == "Tidak" or $oldvideo2 == "Tidak" or $oldvideo3 == "Tidak") {
				$table = '2ddesaindetail';
				$where = array(
					'id_detail'		    =>	$this->input->post('id_detail')
				);

					$data = array(
						'deleted'           =>	1
				);
			
				$this->m->Update($where, $data, $table);

				$table = '2ddesainsubdetail';
				$where = array(
					'id_detail'		    =>	$this->input->post('id_detail')
				);

					$data = array(
						'deleted'           =>	1
				);
			
				$this->m->Update($where, $data, $table);

					$table = '2ddesainkepala';
				$where = array(
					'id_detail'		    =>	$this->input->post('id_detail')
				);

					$data = array(
						'deleted'           =>	1
				);
			
				$this->m->Update($where, $data, $table);

				

				$this->session->set_flashdata('success', 'Detail detail desain berhasil dihapus');
				redirect('tambahdata2ddesain');
			}else{
					$table = '2ddesaindetail';
				$where = array(
					'id_detail'		    =>	$this->input->post('id_detail')
				);

					$data = array(
						'deleted'           =>	1
				);
				$path1 = './assets/file/2ddesain/'.$oldgambar1;
	            unlink($path1);
	            $path2 = './assets/file/2ddesain/'.$oldgambar2;
	            unlink($path2);
	            $path3 = './assets/file/2ddesain/'.$oldgambar3;
	            unlink($path3);
	            $path4 = './assets/file/2ddesain/'.$oldgambar4;
	            unlink($path4);
	            $path5 = './assets/file/2ddesain/'.$oldgambar5;
	            unlink($path5);
	            $path6 = './assets/file/2ddesain/'.$oldvideo1;
	            unlink($path6);
	            $path7 = './assets/file/2ddesain/'.$oldvideo2;
	            unlink($path7);
	            $path8 = './assets/file/2ddesain/'.$oldvideo3;
	            unlink($path8);
				$this->m->Update($where, $data, $table);

				

				$this->session->set_flashdata('success', 'Detail detail desain berhasil dihapus');
				redirect('tambahdata2ddesain');
			}
		}elseif ($id_header != "0") {
			$id_header = $this->input->post("id_header");

			$oldgambar1 = $this->input->post('gambar1'); 
			$oldgambar2 = $this->input->post('gambar2'); 
			$oldgambar3 = $this->input->post('gambar3'); 
			$oldgambar4 = $this->input->post('gambar4'); 
			$oldgambar5 = $this->input->post('gambar5'); 
			$oldvideo1 = $this->input->post('video1'); 
			$oldvideo2 = $this->input->post('video2'); 
			$oldvideo3 = $this->input->post('video3'); 


			if ($oldgambar1 == "Tidak" or $oldgambar2 == "Tidak" or $oldgambar3 == "Tidak" or $oldgambar4 == "Tidak" or $oldgambar5 == "Tidak" or $oldvideo1 == "Tidak" or $oldvideo2 == "Tidak" or $oldvideo3 == "Tidak") {
				$table = '2ddesaindetail';
				$where = array(
					'id_detail'		    =>	$this->input->post('id_detail')
				);

					$data = array(
						'deleted'           =>	1
				);
			
				$this->m->Update($where, $data, $table);

				$table = '2ddesainsubdetail';
				$where = array(
					'id_detail'		    =>	$this->input->post('id_detail')
				);

					$data = array(
						'deleted'           =>	1
				);
			
				$this->m->Update($where, $data, $table);

					$table = '2ddesainkepala';
				$where = array(
					'id_detail'		    =>	$this->input->post('id_detail')
				);

					$data = array(
						'deleted'           =>	1
				);
			
				$this->m->Update($where, $data, $table);

				

				$this->session->set_flashdata('success', 'Detail detail desain berhasil dihapus');
				 redirect("editdata2ddesain/$id_header");
			}else{
					$table = '2ddesaindetail';
				$where = array(
					'id_detail'		    =>	$this->input->post('id_detail')
				);

					$data = array(
						'deleted'           =>	1
				);
				$path1 = './assets/file/2ddesain/'.$oldgambar1;
	            unlink($path1);
	            $path2 = './assets/file/2ddesain/'.$oldgambar2;
	            unlink($path2);
	            $path3 = './assets/file/2ddesain/'.$oldgambar3;
	            unlink($path3);
	            $path4 = './assets/file/2ddesain/'.$oldgambar4;
	            unlink($path4);
	            $path5 = './assets/file/2ddesain/'.$oldgambar5;
	            unlink($path5);
	            $path6 = './assets/file/2ddesain/'.$oldvideo1;
	            unlink($path6);
	            $path7 = './assets/file/2ddesain/'.$oldvideo2;
	            unlink($path7);
	            $path8 = './assets/file/2ddesain/'.$oldvideo3;
	            unlink($path8);
				$this->m->Update($where, $data, $table);

				

				$this->session->set_flashdata('success', 'Detail detail desain berhasil dihapus');
				 redirect("editdata2ddesain/$id_header");
			}
		}
		
	}
	function detaildesain($id_detail)
	{

		$data = [
			'title' => 'PT.MMM | Detail Data Desain'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
		$select = $this->db->order_by('nama');
		$select = $this->db->where('tbl_bagian.bagian', 'Designer 2D');
		$select = $this->db->where('tbl_karyawan.deleted', 0);
		$data['karyawan'] = $this->m->Get_All('karyawan', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('material');
		$select = $this->db->where('deleted', 0);
		$data['material'] = $this->m->Get_All('material', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('tipedesign');
		$select = $this->db->where('deleted', 0);
		$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('warnaproduk');
		$select = $this->db->where('deleted', 0);
		$data['warnaproduk'] = $this->m->Get_All('warnaproduk', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('finishing');
		$select = $this->db->where('deleted', 0);
		$data['finishing'] = $this->m->Get_All('finishing', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('konsepkepala'); 
		$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);

	 

		$select = $this->db->select('*');
		$select = $this->db->order_by('tbl_material.material asc');
		$select = $this->db->where('tbl_material.deleted', 0);	
		$data['material'] = $this->m->Get_All('material', $select);

		$select = $this->db->select('*, tbl_parcel.hargabeli as hargadiamond,');
		$select       = $this->db->join('tbl_parcel', 'tbl_parcel.id_parcel = tbl_2ddesainsubdetail.id_parcel');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',$id_detail);
		$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
		$data['duaddesainsubdetail'] = $this->m->Get_All('2ddesainsubdetail', $select);

		$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->where('tbl_parcel.deleted', 0);
		$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
		$data['parcel'] = $this->m->Get_All('parcel', $select);

		$select               = $this->db->select('*, tbl_2ddesaindetail.ukuran as size, tbl_2ddesaindetail.ongkos as hargaongkos, tbl_tipedesign.id_tipe, tbl_tipedesign.tipedesign, tbl_warnaproduk.id_warnaproduk, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_material.id_material, tbl_finishing.finishing, tbl_finishing.id_finishing, tbl_konsepkepala.id_konsepkepala, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.id_ongkosrangka, tbl_ongkosrangka.ongkosrangka as ongkos');
		$select               = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
		$select               = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
		$select               = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select           = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
		$select               = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
		$select               = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
		$select               = $this->db->join('tbl_ongkoslainnya', 'ongkoslainnya.id_ongkoslainnya= tbl_2ddesaindetail.id_ongkoslainnya');
		$select               = $this->db->where('tbl_2ddesaindetail.id_detail', $id_detail);
		$select               = $this->db->where('tbl_2ddesaindetail.deleted', 0);
		$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

		$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi,  g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil, tbl_masterproduk.hargabeli as hargaproduk');
		$select       = $this->db->join('tbl_masterproduk', 'tbl_masterproduk.id_produk = tbl_2ddesainkepala.id_barang');
		$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
		$select = $this->db->where('tbl_2ddesainkepala.id_detail',$id_detail);
		$select = $this->db->where('tbl_2ddesainkepala.deleted', 0);
		$data['desainkepala'] = $this->m->Get_All('2ddesainkepala', $select);

		$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
		$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
		$select = $this->db->order_by('namaproduk');
		$select = $this->db->where('tbl_masterproduk.deleted', 0);
		$data['produk'] = $this->m->Get_All('masterproduk', $select);

		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/2ddesain/detaildesain', $data);
		$this->load->view('templates_pimpinan/script', $data);
		$this->load->view('templates_pimpinan/footer', $data);
	}

	function addsubdetail()
	{	

			$data = array(
				'id_detail'  		 => $this->input->post('iddetail'),
				'id_parcel'          =>	$this->input->post('idparcel'),
				'id_headsetting'     =>	$this->input->post('idheadsetting'),
				'jumlah'             =>	$this->input->post('jumlah'),
				'berat'              =>	$this->input->post('berat'),
				'harga'              =>	$this->input->post('harga'),
				'hargaheadsetting'   =>	$this->input->post('priceheadsetting'),
				'id_user'            =>	$this->session->userdata('id_user'), 
				'status'             =>	$this->input->post('status'),
				'deleted'            =>	0,
			);

			$this->m->Save($data, '2ddesainsubdetail'); 
			// $this->session->set_flashdata('success', 'Data detail diamond berhasil ditambah');
			redirect('tambahdata2ddesain');
	}
 
	function editesubdetail()
	{
			
			$table = '2ddesainsubdetail';
			$where = array(
				'id_subdetail'		    =>	$this->input->post('idsubdetail')
			);

				$data = array(
					'id_parcel'       =>	$this->input->post('idparcel'),
					'jumlah'          =>	$this->input->post('jumlah'),
					'harga'           =>	$this->input->post('harga'), 
					'berat'           =>	$this->input->post('berat'), 
			);
			$this->m->Update($where, $data, $table);

			 
	}
	function deletesubdetail()
	{	
			$table = '2ddesainsubdetail';
				$where = array(
					'id_subdetail'		=>		$this->input->post('idsubdetail'),
				);

					$data = array(
						'deleted'           =>	1
				);
				
				$this->m->Update($where, $data, $table);
				$this->session->set_flashdata('success', 'Detail detail diamond berhasil dihapus');
				redirect('tambahdata2ddesain');
	}

	function adddetailkepala()
	{	

			$data = array(
				'id_detail'  		 =>	$this->input->post('iddetail'),
				'id_barang'          =>	$this->input->post('id_barang'),
				'jumlah'             =>	$this->input->post('jumlah'),
				'harga'              =>	str_replace('.', '', $this->input->post('harga')),
				'id_user'            =>	$this->session->userdata('id_user'),
				'status'             =>	$this->input->post('status'),
				'deleted'            =>	0,
			);

			$this->m->Save($data, '2ddesainkepala');
			$this->session->set_flashdata('success', 'Data detail kepala berhasil ditambah');
			redirect('tambahdata2ddesain');
	}
	function editeprodukdetail()
	{
			$table = '2ddesainkepala';
			$where = array(
				'id_subdetailkepala'		    =>	$this->input->post('idsubdetailkepala')
			);

				$data = array(
					'id_barang'        =>	$this->input->post('idbarang'),
					'jumlah'           =>	$this->input->post('jumlah'),
					'harga'            =>	$this->input->post('harga'),
			);
			$this->m->Update($where, $data, $table);

			
			$this->session->set_flashdata('success', 'Data detail diamond berhasil diubah');		
	}
	function deletedetailproduk()
	{	
			$table = '2ddesainkepala';
				$where = array(
					'id_subdetailkepala'		    =>	$this->input->post('idsubdetailkepala')
				);

					$data = array(
						'deleted'           =>	1
				);
				
				$this->m->Update($where, $data, $table);

				

				$this->session->set_flashdata('success', 'Detail detail diamond berhasil dihapus');
				redirect('tambahdata2ddesain');
		
	}
}