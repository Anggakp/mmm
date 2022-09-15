<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataUang extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listmatauang()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Mata Uang';
		$select = $this->db->select('*');
		$select = $this->db->order_by('kodematauang');
		$select = $this->db->where('deleted', 0);
		$data['read'] = $this->m->Get_All('matauang', $select);

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
		$this->load->view('pages/master/matauang/listmatauang',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	function creatematauang()
	{
		
		$this->form_validation->set_rules(
			'namamatauang',
			'namamatauang',
			'required|trim',
			[
				'required' => 'Field nama mata uang tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'kodematauang',
			'kodematauang',
			'required|trim',
			[
				'required' => 'Field kode mata uang tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'symbol',
			'symbol',
			'required|trim',
			[
				'required' => 'Field symbol tidak boleh kosong'
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
			$data['title'] = 'PT.MMM | Tambah Data Mata Uang';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/matauang/creatematauang', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'kodematauang'      =>	$this->input->post('kodematauang'),
				'namamatauang'      =>	$this->input->post('namamatauang'),
				'symbol'            =>	$this->input->post('symbol'),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'matauang');

			$this->session->set_flashdata('success', 'Data mata uang berhasil ditambah');
			redirect('listmatauang');		
		}
	}
	function editmatauang($id_matauang)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Mata Uang'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_matauang', $id_matauang);
		$data['matauang'] = $this->m->Get_All('matauang', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/matauang/updatematauang', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatematauang()
	{
		$table = 'matauang';
		$where = array(
			'id_matauang'		    =>	$this->input->post('idmatauang')
		);

			$data = array(
				'kodematauang'      =>	$this->input->post('kodematauang'),
				'namamatauang'      =>	$this->input->post('namamatauang'),
				'symbol'            =>	$this->input->post('symbol'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data mata uang berhasil diubah ');
		redirect('listmatauang');
		
		
	}
	function deletematauang()
	{
		$table = 'matauang';
		$where = array(
			'id_matauang'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data mata uang berhasil dihapus');
		redirect('listmatauang');
	}
}