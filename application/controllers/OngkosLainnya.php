<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OngkosLainnya extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listongkoslainnya()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Ongkos Lainnya';
		$select = $this->db->select('*');
		$select = $this->db->where('deleted', 0);
		$select = $this->db->order_by('ongkoslainnya');
		$data['read'] = $this->m->Get_All('ongkoslainnya', $select);

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
		$this->load->view('pages/master/lainlain/ongkoslainnya/listongkoslainnya',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
		
	}
	function createongkoslainnya()
	{
		
		$this->form_validation->set_rules(
			'namaongkoslainnya',
			'namaongkoslainnya',
			'required|trim',
			[
				'required' => 'Field Ongkos Lainnya tidak boleh kosong'
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
			$data['title'] = 'PT.MMM | Tambah Data Ongkos Lainnya';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/lainlain/ongkoslainnya/createongkoslainnya', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'ongkoslainnya'     =>	$this->input->post('namaongkoslainnya'),
				'price'       		=>	str_replace('.', '', $this->input->post('price')),
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'ongkoslainnya');

			$this->session->set_flashdata('success', 'Data Ongkos Lainnya berhasil ditambah');
			redirect('listongkoslainnya');		
		}
	}

	function editongkoslainnya($id_ongkoslainnya)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Ongkos Lainnya'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_ongkoslainnya', $id_ongkoslainnya);
		$data['ongkoslainnya'] = $this->m->Get_All('ongkoslainnya', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/lainlain/ongkoslainnya/updateongkoslainnya', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updateongkoslainnya()
	{
		$table = 'ongkoslainnya';
		$where = array(
			'id_ongkoslainnya'		    =>	$this->input->post('idongkoslainnya')
		);

			$data = array(
				'ongkoslainnya'     =>	$this->input->post('namaongkoslainnya'),
				'price'       		=>	str_replace('.', '', $this->input->post('price')),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data Ongkos Lainnya berhasil diubah');
		redirect('listongkoslainnya');
		
		
	}
	function deleteongkoslainnya()
	{
		$table = 'ongkoslainnya';
		$where = array(
			'id_ongkoslainnya'		    =>	$this->input->post('id')
		);
		$data = array(
				'deleted' => 1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data Ongkos Lainnya berhasil dihapus');
		redirect('listongkoslainnya');
	}
}