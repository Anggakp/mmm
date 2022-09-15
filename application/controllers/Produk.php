<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listproduk()
	{
		$role_id = $this->session->userdata('role_id');
		$menu = $this->uri->segment(1);

        $this->db->select('*');
        $this->db->where("url = '$menu' or url_1 = '$menu' or url_2 = '$menu' or url_3 = '$menu' or url_4 = '$menu'");
        $queryMenu = $this->db->get('user_menu')->row_array();

        $menu_id =$queryMenu['id'];



		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Produk';
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
		$data['read'] = $this->m->Get_All('masterproduk', $select);

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


		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/masterproduk/produk/listproduk',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}

	function createproduk()
	{
		
		$this->form_validation->set_rules(
			'skuproduk',
			'skuproduk',
			'required|is_unique[masterproduk.skuproduk]|trim',
			[
				'required' => 'Field sku produk tidak boleh kosong',
				'is_unique' => 'SKU produk sudah terdaftar pada database'
			]
		);
		$this->form_validation->set_rules(
			'barcode',
			'barcode',
			'required|is_unique[masterproduk.barcode]|trim',
			[
				'required' => 'Field barcode tidak boleh kosong',
				'is_unique' => 'Barcode sudah terdaftar pada database'
			]
		);
		$this->form_validation->set_rules(
			'namaproduk',
			'namaproduk',
			'required|trim',
			[
				'required' => 'Field nama produk tidak boleh kosong'
			]
		);
		
		
		
		$this->form_validation->set_rules(
			'konversisatuan',
			'konversisatuan',
			'required|trim',
			[
				'required' => 'Field konversi satuan tidak boleh kosong'
			]
		);
		
		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Tambah Data Master Produk';

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Tipe Produk');
			$data['tipeproduk'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Category');
			$data['category'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Jenis Garansi');
			$data['jenisgaransi'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Brand');
			$data['brand'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Periode Garansi');
			$data['periodegaransi'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Etalase');
			$data['etalase'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Claim Garansi');
			$data['claimgaransi'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Kondisi');
			$data['kondisi'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Satuan Besar');
			$data['satuanbesar'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('masterid', 'Satuan Kecil');
			$data['satuankecil'] = $this->m->Get_All('masterid', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('kodematauang');
			$select = $this->db->where('deleted', 0);
			$data['matauang'] = $this->m->Get_All('matauang', $select);

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
		    $this->load->view('pages/master/masterproduk/produk/createproduk',$data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			$config['upload_path']          = 'assets/file/masterproduk/';
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
					$this->session->set_flashdata('erorr', 'Format gambar 4 tidak sesuai');
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
					$this->session->set_flashdata('error', 'Video 2 terlalu besar');
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

			
			
			$data = array(
				'skuproduk'         =>	$this->input->post('skuproduk'),
				'barcode'           =>	$this->input->post('barcode'),
				'namaproduk'        =>	$this->input->post('namaproduk'),
				'deskripsiproduk'   =>	$this->input->post('deskripsiproduk'),
				'id_tipeproduk'     =>	$this->input->post('idtipeproduk'),
				'id_category'       =>	$this->input->post('idcategory'),
				'id_brand'          =>	$this->input->post('idbrand'),
				'id_etalase'        =>	$this->input->post('idetalase'),
				'id_jenisgaransi'   =>	$this->input->post('idjenisgaransi'),
				'id_periodegaransi' =>	$this->input->post('idperiodegaransi'),
				'id_claimgaransi'   =>	$this->input->post('idclaimgaransi'),
				'id_kondisi'        =>	$this->input->post('idkondisi'),
				'berat'             =>	$this->input->post('berat'),
				'panjang'           =>	$this->input->post('panjang'),
				'lebar'             =>	$this->input->post('lebar'),
				'tinggi'            =>	$this->input->post('tinggi'),
				'id_satuanbesar'    =>	$this->input->post('idsatuanbesar'),
				'id_satuankecil'    =>	$this->input->post('idsatuankecil'),
				'konversisatuan'    =>	$this->input->post('konversisatuan'),
				'id_matauang'       =>	$this->input->post('idmatauang'),
				'hargabeli'         =>	str_replace('.', '', $this->input->post('hargajual')),
				'hargajual'         =>	str_replace('.', '', $this->input->post('hargabeli')),
				'gambar1'            =>	$gambar1,
				'gambar2'            =>	$gambar2,
				'gambar3'            =>	$gambar3,
				'gambar4'            =>	$gambar4,
				'gambar5'            =>	$gambar5,
				'video1'             =>	$video1,
				'video2'             =>	$video2,
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'masterproduk');

			$this->session->set_flashdata('success', 'Data produk berhasil ditambah');
			redirect('listproduk');		
		}
	}
	function editproduk($id_produk)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Master Produk'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*, a.keterangan as tipeproduk,a.id_masterid as idtipeproduk, b.id_masterid as idbrand, b.keterangan as brand, c.id_masterid as idcategory, c.keterangan as category, d.id_masterid as idetalase, d.keterangan as etalase, e.id_masterid as idjenisgaransi, e.keterangan as jenisgaransi,f.id_masterid as idperiodegaransi, f.keterangan as periodegaransi, g.id_masterid as idclaimgaransi, g.keterangan as claimgaransi, h.id_masterid as idkondisi, h.keterangan as kondisi, i.id_masterid as idsatuanbesar, i.keterangan as satuanbesar, j.id_masterid as idsatuankecil, j.keterangan as satuankecil');
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
		$select = $this->db->where('tbl_masterproduk.id_produk', $id_produk);
		$data['produk'] = $this->m->Get_All('masterproduk', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Tipe Produk');
		$data['tipeproduk'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Category');
		$data['category'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Jenis Garansi');
		$data['jenisgaransi'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Brand');
		$data['brand'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Periode Garansi');
		$data['periodegaransi'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Etalase');
		$data['etalase'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Claim Garansi');
		$data['claimgaransi'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Kondisi');
		$data['kondisi'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Satuan Besar');
		$data['satuanbesar'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('masterid', 'Satuan Kecil');
		$data['satuankecil'] = $this->m->Get_All('masterid', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('kodematauang');
		$select = $this->db->where('deleted', 0);
		$data['matauang'] = $this->m->Get_All('matauang', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/masterproduk/produk/updateproduk', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updateproduk()
	{
		$id_produk = $this->input->post('idproduk');
		$table = 'masterproduk';
				$where = array(
					'id_produk'		    =>	$id_produk
				);
			$data = array(
				'skuproduk'         =>	$this->input->post('skuproduk'),
				'barcode'           =>	$this->input->post('barcode'),
				'namaproduk'        =>	$this->input->post('namaproduk'),
				'deskripsiproduk'   =>	$this->input->post('deskripsiproduk'),
				'id_tipeproduk'     =>	$this->input->post('idtipeproduk'),
				'id_category'       =>	$this->input->post('idcategory'),
				'id_brand'          =>	$this->input->post('idbrand'),
				'id_etalase'        =>	$this->input->post('idetalase'),
				'id_jenisgaransi'   =>	$this->input->post('idjenisgaransi'),
				'id_periodegaransi' =>	$this->input->post('idperiodegaransi'),
				'id_claimgaransi'   =>	$this->input->post('idclaimgaransi'),
				'id_kondisi'        =>	$this->input->post('idkondisi'),
				'berat'             =>	$this->input->post('berat'),
				'panjang'           =>	$this->input->post('panjang'),
				'lebar'             =>	$this->input->post('lebar'),
				'tinggi'            =>	$this->input->post('tinggi'),
				'id_satuanbesar'    =>	$this->input->post('idsatuanbesar'),
				'id_satuankecil'    =>	$this->input->post('idsatuankecil'),
				'konversisatuan'    =>	$this->input->post('konversisatuan'),
				'id_matauang'       =>	$this->input->post('idmatauang'),
				'hargabeli'         =>	str_replace('.', '', $this->input->post('hargajual')),
				'hargajual'         =>	str_replace('.', '', $this->input->post('hargabeli')),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
			);
			$gambar1 = $_FILES['gambar1']['name'];
            if ($gambar1) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '100000';
                $config['upload_path'] = './assets/file/masterproduk';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar1')) {

                	$id_detail = $this->input->post('iddetail');
                	$size = $_FILES['gambar1']['size'];
					$nama = $_FILES['gambar1']['name'];


					$format = pathinfo($nama, PATHINFO_EXTENSION);

					if ($size > 10000000) {
						$this->session->set_flashdata('error', 'Gambar 1 terlalu besar');
						$this->editdetaildesain();
					}elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
						$this->session->set_flashdata('error', 'Format gambar1 tidak sesuai');
						$this->editdetaildesain();
					}else{
						 $oldgambar1 = $this->input->post('gambar1_');
                 	
	                 	 $path1 = './assets/file/masterproduk'.$oldgambar1;
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
                $config['upload_path'] = './assets/file/masterproduk';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar2')) {
                    $oldgambar2 = $this->input->post('gambar2_');
                 	
                 	$path2 = './assets/file/masterproduk'.$oldgambar2;
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
                $config['upload_path'] = './assets/file/masterproduk';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar3')) {
                   $oldgambar3 = $this->input->post('gambar3_');
                 	
                 	$path3 = './assets/file/masterproduk'.$oldgambar3;
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
                $config['upload_path'] = './assets/file/masterproduk';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar4')) {
                    $oldgambar4 = $this->input->post('gambar4_');
                 	
                 	$path4 = './assets/file/masterproduk'.$oldgambar4;
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
                $config['upload_path'] = './assets/file/masterproduk';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar5')) {
                    $oldgambar5 = $this->input->post('gambar5_');
                 	
                 	$path5 = './assets/file/masterproduk'.$oldgambar5;
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
                $config['upload_path'] = './assets/file/masterproduk';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video1')) {
                    $oldvideo1 = $this->input->post('video1_');
                 	
                 	$pathvideo1 = './assets/file/masterproduk'.$oldvideo1;
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
                $config['upload_path'] = './assets/file/masterproduk';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video2')) {
                    $oldvideo2 = $this->input->post('video2_');
                 	
                 	$pathvideo2 = './assets/file/masterproduk'.$oldvideo2;
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


				$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data produk berhasil diubah');
		redirect('listproduk');
		
		
	}
	function deleteproduk()
	{
		$table = 'masterproduk';
		$where = array(
			'id_produk'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data produk berhasil dihapus');
		redirect('listproduk');
	}
}