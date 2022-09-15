<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HeadSetting extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listheadsetting()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Head Setting';
		$select = $this->db->select('*');
		$select = $this->db->where('deleted', 0);
		$select = $this->db->order_by('headsetting');
		$data['read'] = $this->m->Get_All('headsetting', $select);

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
		$this->load->view('pages/master/lainlain/headsetting/listheadsetting',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
		
	}
	function createheadsetting()
	{
		
		$this->form_validation->set_rules(
			'namaheadsetting',
			'namaheadsetting',
			'required|trim',
			[
				'required' => 'Field head setting tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'price',
			'price',
			'required|trim',
			[
				'required' => 'Field harga tidak boleh kosong'
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
			$data['title'] = 'PT.MMM | Tambah Data Head Setting';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/lainlain/headsetting/createheadsetting', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'headsetting'       =>	$this->input->post('namaheadsetting'),
				'price'       		=>	str_replace('.', '', $this->input->post('price')),
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'headsetting');

			$this->session->set_flashdata('success', 'Data head setting berhasil ditambah');
			redirect('listheadsetting');		
		}
	}

	function editheadsetting($id_headsetting)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Head Setting'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_headsetting', $id_headsetting);
		$data['headsetting'] = $this->m->Get_All('headsetting', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/lainlain/headsetting/updateheadsetting', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updateheadsetting()
	{
		$table = 'headsetting';
		$where = array(
			'id_headsetting'		    =>	$this->input->post('idheadsetting')
		);

			$data = array(
				'headsetting'       =>	$this->input->post('namaheadsetting'),
				'price'       		=>	str_replace('.', '', $this->input->post('price')),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data head setting berhasil diubah');
		redirect('listheadsetting');
		
		
	}
	function deleteheadsetting()
	{
		$table = 'headsetting';
		$where = array(
			'id_headsetting'		    =>	$this->input->post('id')
		);
		$data = array(
				'deleted' => 1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data head setting berhasil dihapus');
		redirect('listheadsetting');
	}
}