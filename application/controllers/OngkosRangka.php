<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OngkosRangka extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listongkosrangka()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Ongkos Rangka';
		$select = $this->db->select('*, tipedesign.tipedesign');
		$select = $this->db->join('tipedesign', 'tipedesign.id_tipe = ongkosrangka.id_tipe');
		$select = $this->db->order_by('tipedesign.tipedesign', 'asc');
		$select = $this->db->order_by('kode', 'asc');
		$select = $this->db->order_by('noro', 'asc');
		$select = $this->db->where('ongkosrangka.deleted', 0);
		$data['read'] = $this->m->Get_All('ongkosrangka', $select);

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

		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/lainlain/ongkosrangka/listongkosrangka',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
		
	}

	function createongkosrangka()
	{
		
		$this->form_validation->set_rules(
			'ongkosrangka',
			'ongkosrangka',
			'required|trim',
			[
				'required' => 'Field ongkos rangka tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'createby',
			'CreateBy',
			'required|trim',
			[
				'required' => 'Field create by tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'createdate',
			'CreateDate',
			'required|trim',
			[
				'required' => 'Field create date tidak boleh kosong'
			]
		);
	
		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Tambah Data Ongkos Rangka';

			$select = $this->db->select('*');
			$select = $this->db->order_by('tipedesign');
			$select = $this->db->where('deleted', 0);
			$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/lainlain/ongkosrangka/createongkosrangka', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else { 
			$filter = $this->input->post('kesulitan').' '.$this->input->post('ukuran');
			 
			if ($this->input->post('ukuran') == "Kecil 1-2" and $this->input->post('kesulitan') == "Mudah") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'), 
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	1,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			}
			else if ($this->input->post('ukuran') == "Sedang/3-4" and $this->input->post('kesulitan') == "Mudah") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'), 
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	2,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			}else if ($this->input->post('ukuran') == "Besar >4" and $this->input->post('kesulitan') == "Mudah") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'), 
					'noro'            	=>	$this->input->post('noro'),
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	3,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			} if ($this->input->post('ukuran') == "Kecil 1-2" and $this->input->post('kesulitan') == "Sedang") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'), 
					'noro'            	=>	$this->input->post('noro'),
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	4,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			}
			else if ($this->input->post('ukuran') == "Sedang/3-4" and $this->input->post('kesulitan') == "Sedang") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'), 
					'noro'            	=>	$this->input->post('noro'),
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	5,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			}else if ($this->input->post('ukuran') == "Besar >4" and $this->input->post('kesulitan') == "Sedang") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'), 
					'noro'            	=>	$this->input->post('noro'),
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	6,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			} if ($this->input->post('ukuran') == "Kecil 1-2" and $this->input->post('kesulitan') == "Sulit") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'), 
					'noro'            	=>	$this->input->post('noro'),
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	7,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			}
			else if ($this->input->post('ukuran') == "Sedang/3-4" and $this->input->post('kesulitan') == "Sulit") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'), 
					'noro'            	=>	$this->input->post('noro'),
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	8,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			}else if ($this->input->post('ukuran') == "Besar >4" and $this->input->post('kesulitan') == "Sulit") {
					$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'), 
					'noro'            	=>	$this->input->post('noro'),
					'filter'            =>	$filter, 
					'deleted'           =>	0,
					'kode'   	        =>	9,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);
			$this->m->Save($data, 'ongkosrangka');
			} 

			$this->session->set_flashdata('success', 'Data  ongkos rangka berhasil ditambah');
			redirect('listongkosrangka');		
		}
	}


	function editongkosrangka($id_ongkosrangka)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Ongkos Rangka'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*, tipedesign.tipedesign, ongkosrangka.id_tipe as idtipedesign');
		$select = $this->db->join('tipedesign', 'tipedesign.id_tipe = ongkosrangka.id_tipe');
		$select = $this->db->where('id_ongkosrangka', $id_ongkosrangka);
		$data['ongkosrangka'] = $this->m->Get_All('ongkosrangka', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('tipedesign');
		$select = $this->db->where('deleted', 0);
		$data['tipedesign'] = $this->m->Get_All('tipedesign', $select);

		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/lainlain/ongkosrangka/updateongkosrangka', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updateongkosrangka()
	{	
		$filter = $this->input->post('kesulitan').' '.$this->input->post('ukuran');
		$table = 'ongkosrangka';
		$where = array(
			'id_ongkosrangka'		    =>	$this->input->post('idongkosrangka')
		);
			if ($this->input->post('ukuran') == "Kecil 1-2" and $this->input->post('kesulitan') == "Mudah") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	1,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);  
			}
			else if ($this->input->post('ukuran') == "Sedang/3-4" and $this->input->post('kesulitan') == "Mudah") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	2,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);  
			}else if ($this->input->post('ukuran') == "Besar >4" and $this->input->post('kesulitan') == "Mudah") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	3,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);  
			} if ($this->input->post('ukuran') == "Kecil 1-2" and $this->input->post('kesulitan') == "Sedang") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	4,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table); 
 
			}
			else if ($this->input->post('ukuran') == "Sedang/3-4" and $this->input->post('kesulitan') == "Sedang") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	5,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table); 
					 
			}else if ($this->input->post('ukuran') == "Besar >4" and $this->input->post('kesulitan') == "Sedang") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	6,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				 $this->m->Update($where, $data, $table); 
			} if ($this->input->post('ukuran') == "Kecil 1-2" and $this->input->post('kesulitan') == "Sulit") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	7,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table); 
			}
			else if ($this->input->post('ukuran') == "Sedang/3-4" and $this->input->post('kesulitan') == "Sulit") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	8,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);
				 
			}else if ($this->input->post('ukuran') == "Besar >4" and $this->input->post('kesulitan') == "Sulit") {
				$data = array(
					'ongkosrangka'      =>	str_replace('.', '', $this->input->post('ongkosrangka')),
					'id_tipe'           =>	$this->input->post('idtipedesign'),
					'kesulitan'         =>	$this->input->post('kesulitan'),
					'ukuran'            =>	$this->input->post('ukuran'),
					'noro'            	=>	$this->input->post('noro'),
					'kode'   	        =>	9,
					'filter'            =>	$filter, 
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);
					 
			} 

		 

		
		$this->session->set_flashdata('success', 'Data ongkos rangka berhasil diubah');
		redirect('listongkosrangka');
		
		
	}
	function deleteongkosrangka()
	{
		$table = 'ongkosrangka';
		$where = array(
			'id_ongkosrangka'		    =>	$this->input->post('id')
		);

		$data = array(
				'deleted'            =>	1,
		);

		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data ongkos rangka berhasil dihapus');
		redirect('listongkosrangka');
	}
}