<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diameter extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listdiameter()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Diameter';
		$select = $this->db->select('*, tbl_diagroup.diagroup');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->where('tbl_diameter.deleted', 0);
		$select = $this->db->order_by('diagroup asc, diameter_from asc, diameter_to asc');
		$data['read'] = $this->m->Get_All('diameter', $select);

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
		$this->load->view('pages/master/diamond/diameter/listdiameter',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}

	function creatediameter()
	{
		
		$this->form_validation->set_rules(
			'diameterto',
			'diameterto',
			'required|trim',
			[
				'required' => 'Field diameter to tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'diameterfrom',
			'diameterfrom',
			'required|trim',
			[
				'required' => 'Field diameter from tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'carat',
			'carat',
			'required|trim',
			[
				'required' => 'Field carat tidak boleh kosong'
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
			

			$select = $this->db->select('*');
			$select = $this->db->where('deleted', 0);
			$select = $this->db->order_by('diagroup');
			$data['diagroup'] = $this->m->Get_All('diagroup', $select);

			$data['title'] = 'PT.MMM | Tambah Data Diameter';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/diamond/diameter/creatediameter', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'id_diagroup'       =>	$this->input->post('diagroup'),
				'diameter_from'     =>	$this->input->post('diameterfrom'),
				'diameter_to'       =>	$this->input->post('diameterto'),
				'carat'        		=>	$this->input->post('carat'),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"), 
			);

			$this->m->Save($data, 'diameter');

			$this->session->set_flashdata('success', 'Data diameter berhasil ditambah');
			redirect('listdiameter');		
		}
	}

	function editdiameter($id_diameter)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Diameter'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*, tbl_diagroup.diagroup');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->where('id_diameter', $id_diameter);
		$data['diameter'] = $this->m->Get_All('diameter', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('deleted', 0);
		$data['diagroup'] = $this->m->Get_All('diagroup', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/diamond/diameter/updatediameter', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatediameter()
	{
		$table = 'diameter';
		$where = array(
			'id_diameter'		    =>	$this->input->post('iddiameter')
		);

			$data = array(
				'id_diagroup'       =>	$this->input->post('diagroup'),
				'diameter_from'     =>	$this->input->post('diameterfrom'),
				'diameter_to'       =>	$this->input->post('diameterto'),
				'carat'        		=>	$this->input->post('carat'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data diameter berhasil diubah');
		redirect('listdiameter');
		
		
	}
	function deletediameter()
	{
		$table = 'diameter';
		$where = array(
			'id_diameter'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data diameter berhasil dihapus');
		redirect('listdiameter');
	}
}