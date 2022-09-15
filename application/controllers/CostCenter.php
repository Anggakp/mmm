<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CostCenter extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listcostcenter()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Cost Center';
		$select = $this->db->select('*');
		$select = $this->db->order_by('kodecostcenter asc, namacostcenter asc');
		$select = $this->db->where('deleted', 0);
		$data['read'] = $this->m->Get_All('costcenter', $select);

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
		$this->load->view('pages/coa/costcenter/listcostcenter',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	function createcostcenter()
	{
		$this->form_validation->set_rules(
			'kodecostcenter',
			'kodecostcenter',
			'required|is_unique[costcenter.kodecostcenter]|trim',
			[
				'required'  => 'Field kode cost center tidak boleh kosong',
				'is_unique' => 'Kode cost center sudah terdaftar pada database',
			]
		);

		$this->form_validation->set_rules(
			'namacostcenter',
			'namacostcenter',
			'required|trim',
			[
				'required' => 'Field nama cost center tidak boleh kosong'
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
			$data['title'] = 'PT.MMM | Tambah Data Cost Center';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/coa/costcenter/createcostcenter', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'kodecostcenter'    =>	$this->input->post('kodecostcenter'),
				'namacostcenter'    =>	$this->input->post('namacostcenter'),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'costcenter');

			$this->session->set_flashdata('success', 'Data cost center berhasil ditambah');
			redirect('listcostcenter');		
		}
	}

	function editcostcenter($id_costcenter)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Cost Center'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_costcenter', $id_costcenter);
		$data['costcenter'] = $this->m->Get_All('costcenter', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/coa/costcenter/updatecostcenter', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatecostcenter()
	{
		$table = 'costcenter';
		$where = array(
			'id_costcenter'		    =>	$this->input->post('idcostcenter')
		);

			$data = array(
				'kodecostcenter'    =>	$this->input->post('kodecostcenter'),
				'namacostcenter'    =>	$this->input->post('namacostcenter'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data costcenter berhasil diubah');
		redirect('listcostcenter');
		
		
	}
	function deletecostcenter()
	{
		$table = 'costcenter';
		$where = array(
			'id_costcenter'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data cost center berhasil dihapus');
		redirect('listcostcenter');
	}
}