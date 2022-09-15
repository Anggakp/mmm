<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonsepKepala extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listkonsepkepala()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Konsep Kepala';
		$select = $this->db->select('*');
		$select = $this->db->order_by('konsepkepala');
		$data['read'] = $this->m->Get_All('konsepkepala', $select);

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
		$this->load->view('pages/master/lainlain/konsepkepala/listkonsepkepala',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
		
	}
	function createkonsepkepala()
	{
		
		$this->form_validation->set_rules(
			'namakonsepkepala',
			'namakonsepkepala',
			'required|trim',
			[
				'required' => 'Field konsep kepala tidak boleh kosong'
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
			$data['title'] = 'PT.MMM | Tambah Data Konsep Kepala';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/lainlain/konsepkepala/createkonsepkepala', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'konsepkepala'       =>	$this->input->post('namakonsepkepala'),
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'konsepkepala');

			$this->session->set_flashdata('success', 'Data konsep kepala berhasil ditambah');
			redirect('listkonsepkepala');		
		}
	}

	function editkonsepkepala($id_konsepkepala)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Konsep Kepala'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_konsepkepala', $id_konsepkepala);
		$data['konsepkepala'] = $this->m->Get_All('konsepkepala', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/lainlain/konsepkepala/updatekonsepkepala', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatekonsepkepala()
	{
		$table = 'konsepkepala';
		$where = array(
			'id_konsepkepala'		    =>	$this->input->post('idkonsepkepala')
		);

			$data = array(
				'konsepkepala'           =>	$this->input->post('namakonsepkepala'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data konsep kepala berhasil diubah');
		redirect('listkonsepkepala');
		
		
	}
	function deletekonsepkepala()
	{
		$table = 'konsepkepala';
		$where = array(
			'id_konsepkepala'		    =>	$this->input->post('id')
		);

		$this->m->Delete($where, $table);

		

		$this->session->set_flashdata('success', 'Data konsep kepala berhasil dihapus');
		redirect('listkonsepkepala');
	}
}