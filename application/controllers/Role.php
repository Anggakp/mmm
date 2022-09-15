<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function aksesrole($id_role)
	{


		$data = [
			'title' => 'PT.MMM | Akses Role'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$data['role'] = $this->db->get_where('tbl_role', ['id' => $id_role])->row_array();

		// $this->db->where('role_id', $id_role);
	 //    $this->db->where('menu_id', $menu_id);
	 //    $data['cekakses'] = $this->db->get('user_access_menu');

		$select = $this->db->select('*');
		$select = $this->db->order_by('kode_sub');
	    $select = $this->db->where('is_active', 0);
		$data['menu'] = $this->m->Get_All('user_menu', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/user/aksesrole', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}

	function adddatarole()
	{

			$data = array(
				'role'              =>	$this->input->post('role'),
			);

			$this->m->Save($data, 'role');

			$this->session->set_flashdata('success', 'Data role berhasil ditambah');
			redirect('listuser');		
		
	}
	function updaterole()
	{
		$table = 'role';
		$where = array(
			'id'		    =>	$this->input->post('idrole')
		);

		$data = array(
			'role'   => $this->input->post('role')
		);

		$this->m->Update($where, $data, $table);

		$this->session->set_flashdata('success', 'Data role berhasil diubah');
		redirect('listuser');
	}

	function deleterole()
	{
		$table = 'role';
		$where = array(
			'id'		    =>	$this->input->post('id')
		);

		$this->m->Delete($where, $table);

		$this->session->set_flashdata('success', 'Data role berhasil dihapus');
		redirect('listuser');
	}


	function changeAccess()
	{	
			$menu_id = $this->input->post('menuId');
			$role_id = $this->input->post('roleId');

			$data = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id
			);

			$result = $this->db->get_where('user_access_menu', $data);

			if ($result->num_rows()<1) {
					$this->m->Save($data, 'user_access_menu');
			}else{
				$this->db->delete('user_access_menu', $data);
			}

			$this->session->set_flashdata('success', 'Akses berhasil diubah');	
		
	}

	function changeAccessAddBtn()
	{	
			$menu_id = $this->input->post('menuId');
			$role_id = $this->input->post('roleId');

			$table = 'user_access_menu';
			$where = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id
			);

			$data = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id,
				'add_btn'              =>	1
			);

			$data_ = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id,
				'add_btn'              =>	0
			);

			$result = $this->db->get_where('user_access_menu', $data);

			if ($result->num_rows()<1) {
					$this->m->Update($where, $data, $table);
			}else{
					$this->m->Update($where, $data_, $table);
			}

			$this->session->set_flashdata('success', 'Akses berhasil diubah');	
		
	}

	function changeAccessUpdateBtn()
	{	
			$menu_id = $this->input->post('menuId');
			$role_id = $this->input->post('roleId');

			$table = 'user_access_menu';
			$where = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id
			);

			$data = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id,
				'update_btn'              =>	1
			);

			$data_ = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id,
				'update_btn'              =>	0
			);

			$result = $this->db->get_where('user_access_menu', $data);

			if ($result->num_rows()<1) {
					$this->m->Update($where, $data, $table);
			}else{
					$this->m->Update($where, $data_, $table);
			}

			$this->session->set_flashdata('success', 'Akses berhasil diubah');	
		
	}

	function changeAccessDeleteBtn()
	{	
			$menu_id = $this->input->post('menuId');
			$role_id = $this->input->post('roleId');

			$table = 'user_access_menu';
			$where = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id
			);

			$data = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id,
				'delete_btn'           =>	1
			);

			$data_ = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id,
				'delete_btn'           =>	0
			);

			$result = $this->db->get_where('user_access_menu', $data);

			if ($result->num_rows()<1) {
					$this->m->Update($where, $data, $table);
			}else{
					$this->m->Update($where, $data_, $table);
			}

			$this->session->set_flashdata('success', 'Akses berhasil diubah');	
		
	}

	function changeAccessDetailBtn()
	{	
			$menu_id = $this->input->post('menuId');
			$role_id = $this->input->post('roleId');

			$table = 'user_access_menu';
			$where = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id
			);

			$data = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id,
				'detail_btn'           =>	1
			);

			$data_ = array(
				'role_id'              =>	$role_id,
				'menu_id'              =>	$menu_id,
				'detail_btn'           =>	0
			);

			$result = $this->db->get_where('user_access_menu', $data);

			if ($result->num_rows()<1) {
					$this->m->Update($where, $data, $table);
			}else{
					$this->m->Update($where, $data_, $table);
			}

			$this->session->set_flashdata('success', 'Akses berhasil diubah');	
		
	}
}