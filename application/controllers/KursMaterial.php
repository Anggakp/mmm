<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KursMaterial extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listkursmaterial()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Kurs Material';
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');

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
		
		$select = $this->db->select('*, tbl_material.material, tbl_material.satuan, tbl_kursmaterial.id_material');
		$select = $this->db->join('tbl_material', 'tbl_material.id_material = tbl_kursmaterial.id_material');
		$select = $this->db->where('tbl_kursmaterial.tanggal <', $now);
		$select = $this->db->where('tbl_kursmaterial.deleted', 0);
		$select = $this->db->order_by('tbl_kursmaterial.tanggal desc');
		$data['read'] = $this->m->Get_All('kursmaterial', $select);

		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/kursmaterial/listkursmaterial',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	function createkursmaterial()
	{
		
		$this->form_validation->set_rules(
			'rate',
			'rate',
			'required|trim',
			[
				'required' => 'Field rate tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'tanggaltransaksi',
			'tanggaltransaksi',
			'required|trim',
			[
				'required' => 'Field tanggal transaksi tidak boleh kosong'
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
			$data['title'] = 'PT.MMM | Tambah Data Material';

			$select = $this->db->select('*');
			$select = $this->db->order_by('material');
			$select = $this->db->where('deleted', 0);
			$data['material'] = $this->m->Get_All('material', $select);


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/kursmaterial/createkursmaterial', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			date_default_timezone_set('Asia/Jakarta');
			$data = array(
				'id_material'       =>	$this->input->post('idmaterial'),
				'rate'              =>	str_replace('.', '', $this->input->post('rate')),
				'deleted'           =>	0,
				'tanggal'           =>	$this->input->post('tanggaltransaksi'),
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'kursmaterial');

			$this->session->set_flashdata('success', 'Data kurs berhasil ditambah');
			redirect('listkursmaterial');		
		}
	}
	function editkursmaterial($id_kursmaterial)
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
		$select = $this->db->join('tbl_material', 'tbl_material.id_material = tbl_kursmaterial.id_material');
		$select = $this->db->where('id_kursmaterial', $id_kursmaterial);
		$data['kursmaterial'] = $this->m->Get_All('kursmaterial', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('material');
		$select = $this->db->where('deleted', 0);
		$data['material'] = $this->m->Get_All('material', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/kursmaterial/updatekursmaterial', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatekursmaterial()
	{

		$table = 'kursmaterial';
		$where = array(
			'id_kursmaterial'		    =>	$this->input->post('idkursmaterial')
		);
			date_default_timezone_set('Asia/Jakarta');
			$data = array(
				'id_material'       =>	$this->input->post('idmaterial'),
				'rate'      		=>	str_replace('.', '', $this->input->post('rate')),
				'tanggal'           =>	$this->input->post('tanggaltransaksi'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d H"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data kurs material berhasil diubah');
		redirect('listkursmaterial');
		
		
	}
	function deletekursmaterial()
	{
		$table = 'kursmaterial';
		$where = array(
			'id_kursmaterial'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data kurs material berhasil dihapus');
		redirect('listkursmaterial');
	}
}