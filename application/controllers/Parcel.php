<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parcel extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listparcel()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Parcel';

		$select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->where('tbl_parcel.deleted', 0);
		$select = $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
		$data['read'] = $this->m->Get_All('parcel', $select);


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
		$this->load->view('pages/master/diamond/parcel/listparcel',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}

	function createparcel()
	{
		
		$this->form_validation->set_rules(
			'parcel',
			'parcel',
			'required|trim',
			[
				'required' => 'Field parcel to tidak boleh kosong'
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
			

			$select = $this->db->select('*, tbl_diagroup.diagroup');
			$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
			$select = $this->db->where('tbl_diameter.deleted', 0);
			$select = $this->db->order_by('diagroup asc, diameter_from asc, diameter_to asc');
			$data['diameter'] = $this->m->Get_All('diameter', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('deleted', 0);
			$data['clarity'] = $this->m->Get_All('clarity', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('deleted', 0);
			$data['shape'] = $this->m->Get_All('shape', $select);

			$select = $this->db->select('*');
			$select = $this->db->where('deleted', 0);
			$data['color'] = $this->m->Get_All('color', $select);

			$data['title'] = 'PT.MMM | Tambah Data Parcel';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/diamond/parcel/createparcel', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'parcel'            =>	$this->input->post('parcel'),
				'hargabeli'         =>	str_replace('.', '', $this->input->post('hargabeli')),
				'hargajual'         =>	str_replace('.', '', $this->input->post('hargajual')),
				'id_diameter'       =>	$this->input->post('iddiameter'),
				'id_clarity'        =>	$this->input->post('idclarity'),
				'id_shape'          =>	$this->input->post('idshape'),
				'id_color'          =>	$this->input->post('idcolor'),
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"), 
				'deleted'           =>	0,
			);

			$this->m->Save($data, 'parcel');

			$this->session->set_flashdata('success', 'Data diameter berhasil ditambah');
			redirect('listparcel');		
		}
	}

	function editparcel($id_parcel)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Parcel'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*, tbl_clarity.clarity,tbl_shape.shape, tbl_color.color, tbl_diagroup.id_diagroup, tbl_diagroup.diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->where('id_parcel', $id_parcel);
		$data['parcel'] = $this->m->Get_All('parcel', $select);

		$select = $this->db->select('*, tbl_diagroup.diagroup');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->order_by('diagroup asc, diameter_from asc, diameter_to asc');
		$select = $this->db->where('tbl_diameter.deleted', 0);
		$data['diameter'] = $this->m->Get_All('diameter', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('deleted', 0);
		$data['clarity'] = $this->m->Get_All('clarity', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('deleted', 0);
		$data['shape'] = $this->m->Get_All('shape', $select);

		$select = $this->db->select('*');
		$select = $this->db->where('deleted', 0);
		$data['color'] = $this->m->Get_All('color', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/diamond/parcel/updateparcel', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updateparcel()
	{
		$table = 'parcel';
		$where = array(
			'id_parcel'		    =>	$this->input->post('idparcel')
		);

			$data = array(
				'parcel'            =>	$this->input->post('parcel'),
				'hargabeli'         =>	str_replace('.', '', $this->input->post('hargabeli')),
				'hargajual'         =>	str_replace('.', '', $this->input->post('hargajual')),
				'id_diameter'       =>	$this->input->post('iddiameter'),
				'id_clarity'        =>	$this->input->post('idclarity'),
				'id_shape'          =>	$this->input->post('idshape'),
				'id_color'          =>	$this->input->post('idcolor'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data diameter berhasil diubah');
		redirect('listparcel');
		
		
	}
	function deleteparcel()
	{
		$table = 'parcel';
		$where = array(
			'id_parcel'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		$this->session->set_flashdata('success', 'Data parcel berhasil dihapus');
		redirect('listparcel');
	}
}