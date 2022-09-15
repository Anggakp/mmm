<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listmaterial()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Material';
		$select = $this->db->select('*');
		$select = $this->db->order_by('material');
		$select = $this->db->where('deleted', 0);
		$data['read'] = $this->m->Get_All('material', $select);

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
		$this->load->view('pages/master/material/listmaterial',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	function creatematerial()
	{
		
		$this->form_validation->set_rules(
			'namamaterial',
			'namamaterial',
			'required|trim',
			[
				'required' => 'Field material tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'satuan',
			'satuan',
			'required|trim',
			[
				'required' => 'Field satuan tidak boleh kosong'
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
			$data['title'] = 'PT.MMM | Tambah Data material';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/material/creatematerial', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'material'              =>	$this->input->post('namamaterial'),
				'satuan'            =>	$this->input->post('satuan'),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'material');

			$this->session->set_flashdata('success', 'Data material berhasil ditambah');
			redirect('listmaterial');		
		}
	}
	function editmaterial($id_material)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Material'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_material', $id_material);
		$data['material'] = $this->m->Get_All('material', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/material/updatematerial', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatematerial()
	{
		$table = 'material';
		$where = array(
			'id_material'		    =>	$this->input->post('idmaterial')
		);

			$data = array(
				'material'              =>	$this->input->post('namamaterial'),
				'satuan'            =>	$this->input->post('satuan'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', '>Data material berhasil diubah');
		redirect('listmaterial');
		
		
	}
	function deletematerial()
	{
		$table = 'material';
		$where = array(
			'id_material'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data material berhasil dihapus');
		redirect('listmaterial');
	}
}