<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listspk()
	{
		 
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Order/SPK';

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

	 

		$select = $this->db->select('*, tbl_karyawan.nama as namakaryawan, tbl_bagian.bagian, tbl_spkheader.memo as memospk');
		$select = $this->db->join('tbl_2ddesaindetail', 'tbl_2ddesaindetail.model = tbl_spkheader.model'); 
		$select = $this->db->join('tbl_2ddesainheader', 'tbl_2ddesainheader.id_header = tbl_2ddesaindetail.id_header'); 
		$select = $this->db->join('karyawan', 'karyawan.id_karyawan = 2ddesainheader.id_karyawan'); 
		$select = $this->db->join('tbl_client', 'tbl_client.id_client = tbl_spkheader.id_client'); 
		$select = $this->db->join('bagian', 'bagian.id_bagian = karyawan.id_bagian');
		$select = $this->db->where('spkheader.deleted', 0);
		$data['read'] = $this->m->Get_All('spkheader', $select);

		$select               = $this->db->select('*, spkdetail.ongkos as hargaongkos, tbl_tipedesign.id_tipe, tbl_tipedesign.tipedesign, tbl_warnaproduk.id_warnaproduk, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_material.id_material, tbl_finishing.finishing, tbl_finishing.id_finishing, tbl_konsepkepala.id_konsepkepala, tbl_konsepkepala.konsepkepala');
		$select               = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = spkdetail.id_tipe');
		$select               = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = spkdetail.id_warna');
		$select               = $this->db->join('tbl_material', 'material.id_material = spkdetail.id_material');
			$select           = $this->db->join('tbl_finishing', 'finishing.id_finishing = spkdetail.id_finishing');
		$select               = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = spkdetail.id_konsepkepala');
		$select               = $this->db->join('tbl_2ddesaindetail', 'tbl_2ddesaindetail.model = spkdetail.model');
		$select               = $this->db->join('tbl_spkheader', 'tbl_spkheader.id_spkheader = spkdetail.id_spkheader');
		$select               = $this->db->where('spkdetail.deleted', 0);
		$data['detailspk'] = $this->m->Get_All('spkdetail', $select);


		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/spk/listspk',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}

	function getdetaildesain(){
		$iddetail 	  = $this->input->post('iddetail');
	
		$select       = $this->db->select('*,sum(hargaheadsetting*jumlah) as hargaheadsetting, tbl_2ddesaindetail.ukuran as size, tbl_tipedesign.tipedesign,  tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.ongkosrangka, tbl_2ddesaindetail.ongkos as hargaongkos,  tbl_ongkosrangka.id_ongkosrangka, tbl_ongkosrangka.ongkosrangka as hargaongkosrangka, tbl_ongkoslainnya.price as hargaongkoslainnya');
		$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
		$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
		$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
		$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
		$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
		$select       = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka');
		$select       = $this->db->join('tbl_ongkoslainnya', 'ongkoslainnya.id_ongkoslainnya = tbl_2ddesaindetail.id_ongkoslainnya');
		$select       = $this->db->join('tbl_2ddesainsubdetail', 'tbl_2ddesainsubdetail.id_detail = tbl_2ddesaindetail.id_detail');
		$select 	  = $this->db->where('tbl_2ddesaindetail.id_detail', $iddetail);
		$select		  = $this->db->where('tbl_2ddesaindetail.deleted', 0); 
		$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

	 	$select = $this->db->select('*');
		$select = $this->db->order_by('headsetting');
		$select = $this->db->where('deleted', 0);
		$data['headsetting'] = $this->m->Get_All('headsetting', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('ongkoslainnya');
		$select = $this->db->where('deleted', 0);
		$data['ongkoslainnya'] = $this->m->Get_All('ongkoslainnya', $select);	

		$data['id_header'] 				   = $this->m->id_spkheader();
		$data['jumlah']	 	  = $this->input->post('jumlah');
		$this->load->view('pages/spk/tampildetaildesain',$data);
	}

	function Createspk()
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
			$data['title'] = 'PT.MMM | Tambah Data Order/SPK';


			 

	        $select = $this->db->select('*');
			$select = $this->db->where('id_menu', 49);
			$select = $this->db->where('header_reference.deleted', 0);
			$data['nomorreference'] = $this->m->Get_All('header_reference', $select);

		

			$data1 = array(
				'ref_number' => 1,
				'id_menu' => 49
			);

			$data['cek1'] = $this->db->get_where('tbl_detail_reference', $data1);
			
			$data['number1'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 1,
				'id_menu' => 49
				])->row_array();
			
			

			$data2 = array(
				'ref_number' => 2,
				'id_menu' => 49
				);

			$data['cek2'] = $this->db->get_where('tbl_detail_reference', $data2);
			$data['number2'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 2,
				'id_menu' => 49
			])->row_array();

			$data3 = array(
				'ref_number' => 3,
				'id_menu' => 49
				);

			$data['cek3'] = $this->db->get_where('tbl_detail_reference', $data3);
			$data['number3'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 3,
				'id_menu' => 49
			])->row_array();

			$data4 = array(
				'ref_number' => 4,
				'id_menu' => 49
				);

			$data['cek4'] = $this->db->get_where('tbl_detail_reference', $data4);
			$data['number4'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 4,
				'id_menu' => 49
			])->row_array();

			$data5 = array(
				'ref_number' => 5,
				'id_menu' => 49
				);

			$data['cek5'] = $this->db->get_where('tbl_detail_reference', $data5);
			$data['number5'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 5,
				'id_menu' => 49
			])->row_array();

			$data6 = array(
				'ref_number' => 6,
				'id_menu' => 49
				);

			$data['cek6'] = $this->db->get_where('tbl_detail_reference', $data6);
			$data['number6'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 6,
				'id_menu' => 49
			])->row_array();

			$data7 = array(
				'ref_number' => 7,
				'id_menu' => 49
				);

			$data['cek7'] = $this->db->get_where('tbl_detail_reference', $data7);
			$data['number7'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 7,
				'id_menu' => 49
			])->row_array();

			$data8 = array(
				'ref_number' => 8,
				'id_menu' => 49
				);

			$data['cek8'] = $this->db->get_where('tbl_detail_reference', $data8);
			$data['number8'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 8,
				'id_menu' => 49
			])->row_array();
	 

			$data9 = array(
					'ref_number' => 9,
				'id_menu' => 49
				);

			$data['cek9'] = $this->db->get_where('tbl_detail_reference', $data9);

			$data['number9'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 9,
				'id_menu' => 49
			])->row_array();

			$data10 = array(
				'ref_number' => 10,
				'id_menu' => 49
				);

			$data['cek10'] = $this->db->get_where('tbl_detail_reference', $data10);

			$data['number10'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 10,
				'id_menu' => 49
			])->row_array();

			$data_ = array(
				'id_menu' => 49,
				'deleted' => 0
			);
			$data['a'] = $this->db->get_where('header_reference', $data_);

			$datacek = array(
				'ref_part' => 01,
				'id_menu' => 49
				);
			$data['nomorreference'] = $this->db->get_where('tbl_detail_reference', [
				'ref_part' => 01,
				'id_menu' => 49
			])->row_array();
 
			$data_ = array(
				'ref_part' => 01,
				'id_menu' => 49
			);

			$data['datacek'] = $this->db->get_where('tbl_detail_reference', $data_);
			
			$data['nomor'] = $this->db->get_where('tbl_detail_reference', [
				'ref_part' => 01,
				'id_menu' => 49
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
			$select = $this->db->order_by('konsepkepala'); 
			$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('ongkosrangka');
			$select = $this->db->where('deleted', 0);
			$data['ongkosrangka'] = $this->m->Get_All('ongkosrangka', $select);

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

			$select       = $this->db->select('*, tbl_2ddesaindetail.ongkos as hargaongkos, tbl_2ddesainheader.nomor, tbl_tipedesign.tipedesign, tbl_warnaproduk.warnaproduk, tbl_material.material, tbl_finishing.finishing, tbl_konsepkepala.konsepkepala, tbl_ongkosrangka.ongkosrangka, tbl_2ddesaindetail.ukuran as size');
			$select       = $this->db->join('tbl_2ddesainheader', 'tbl_2ddesainheader.id_header = tbl_2ddesaindetail.id_header'); 
			$select       = $this->db->join('tbl_tipedesign', 'tipedesign.id_tipe = tbl_2ddesaindetail.id_tipe');
			$select       = $this->db->join('tbl_warnaproduk', 'warnaproduk.id_warnaproduk = tbl_2ddesaindetail.id_warna');
			$select       = $this->db->join('tbl_material', 'material.id_material = tbl_2ddesaindetail.id_material');
			$select       = $this->db->join('tbl_finishing', 'finishing.id_finishing = tbl_2ddesaindetail.id_finishing');
			$select       = $this->db->join('tbl_konsepkepala', 'konsepkepala.id_konsepkepala = tbl_2ddesaindetail.id_konsepkepala');
			$select       = $this->db->join('tbl_ongkosrangka', 'ongkosrangka.id_ongkosrangka = tbl_2ddesaindetail.id_ongkosrangka'); 
			$select 	  = $this->db->where('tbl_2ddesaindetail.deleted', 0);
			$data['detaildesain'] = $this->m->Get_All('2ddesaindetail', $select);

			

			$data['id_header'] 				   = $this->m->id_spkheader();
			$data['id_detail'] 				   = $this->m->id_detail();
			$data['nomorspk']            	   = $this->m->nomorspk();

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/spk/createspk',$data);
			$this->load->view('templates_pimpinan/script' ,$data);
			$this->load->view('templates_pimpinan/footer', $data);
		} 	
		else {
			if ($this->input->post('total') == "0") {
				$this->session->set_flashdata('success', 'Total tidak boleh 0');
				redirect('tambahdata2ddesain');
			}
			else{
			 	$jumlah = $this->input->post('jumlah');


			 
				$data = array(
					'nomorspk'           =>	$this->input->post('nomor'),
					'id_spkheader'       =>	$this->input->post('id_header'), 
					'tanggalspk'         =>	$this->input->post('tanggaltransaksi'),
					'typespk'            =>	$this->input->post('tipespk'),
					'memo'               =>	$this->input->post('memo'),
					'jumlah'        	 =>	$this->input->post('jumlah'),
					'model'        	 	 =>	$this->input->post('model'),
					'submodel'        	 =>	$this->input->post('submodel'),
					'id_client'          =>	$this->input->post('idclient'), 
					'create_by'          =>	$this->session->userdata('nama'),
					'create_date'        =>	date("Y-m-d"),

				);
				$this->m->Save($data, 'spkheader');

				$originalString = $this->input->post('nomor_');
					$ambilkarakter = substr($originalString,-1);

					$table = 'detail_reference';
					$where = array(
						'id_menu'		        =>	49,
						'ref_part'		        =>	01,
					);
					$data = array(
						'hasil_part'		    =>	str_replace($ambilkarakter,$this->input->post('nomor_update'),$originalString),
					);
					$this->m->Update($where, $data, $table);

				for ($i=0; $i<$jumlah; $i++) { 
					$data = array(
					'id_spkheader'           =>	$this->input->post('id_spkheader['.$i.']'),
					'no_detail'              =>	$this->input->post('nodetail['.$i.']'), 
					'model'                  =>	$this->input->post('modeldetail['.$i.']'),
					'submodel'        	     =>	$this->input->post('submodeldetail['.$i.']'),
					'id_tipe'        	 	 =>	$this->input->post('idtipedesign['.$i.']'),
					'id_warna'        	 	 =>	$this->input->post('idwarnaproduk['.$i.']'),
					'id_material'            =>	$this->input->post('idmaterial['.$i.']'), 
					'beratmaterial'          =>	$this->input->post('beratmaterial['.$i.']'),
					'id_finishing'           =>	$this->input->post('idfinishing['.$i.']'),
					'id_konsepkepala'        =>	$this->input->post('idkonsepkepala['.$i.']'),
					'id_ongkosrangka'              =>	$this->input->post('idongkosrangka['.$i.']'),
					'gender'                 =>	$this->input->post('gender['.$i.']'),
					'hargamaterial'          =>	$this->input->post('hargamaterial['.$i.']'),
					'hargadiamond'           =>	$this->input->post('hargadiamond['.$i.']'),
					'hargakepala'            =>	$this->input->post('hargakepala['.$i.']'),
					'ongkosrangka'                 =>	$this->input->post('hargaongkosrangka['.$i.']'),
					'totalharga'             =>	$this->input->post('totalharga['.$i.']'),
					'totaljumlah'            =>	$this->input->post('totaljumlah['.$i.']'),
					'totalberat'             =>	$this->input->post('totalberat['.$i.']'),
					'jsfinishing'            =>	$this->input->post('jsfinishing['.$i.']'),
					'jspolesrangka'          =>	$this->input->post('jspolesrangka['.$i.']'),
					'jspasangbatu'           =>	$this->input->post('jspasangbatu['.$i.']'),
					'jsrakit'                =>	$this->input->post('jspolesrakit['.$i.']'),
					'jspoleschrome'          =>	$this->input->post('jspoleschrome['.$i.']'),
					'ukuran'                 =>	$this->input->post('ukuran['.$i.']'), 

				);
				$this->m->Save($data, 'spkdetail');
	                
				}
				

				

				$this->session->set_flashdata('success', 'Data Order/SPK Berhasil Ditambah');
				redirect('listspk');

			}
		}
	}
}