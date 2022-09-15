<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KursMataUang extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

   function listkurs()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Kurs';
		$select = $this->db->select('*, tbl_matauang.kodematauang, tbl_matauang.namamatauang');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_kurs.id_matauang');
		$select = $this->db->order_by('tbl_matauang.kodematauang');
		$select = $this->db->where('tbl_kurs.deleted', 0);
		$data['read'] = $this->m->Get_All('kurs', $select);

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
		$this->load->view('pages/master/kurs/listkurs',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}

	function createkurs()
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
			$data['title'] = 'PT.MMM | Tambah Data Kurs';

			$select = $this->db->select('*');
			$select = $this->db->order_by('kodematauang');
			$select = $this->db->where('deleted', 0);
			$data['matauang'] = $this->m->Get_All('matauang', $select);


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/kurs/createkurs', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'id_matauang'       =>	$this->input->post('idmatauang'),
				'rate'              =>	$this->input->post('rate'),
				'deleted'           =>	0,
				'tanggal'           =>	date('Y-m-d h:i:s'),
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'kurs');

			$this->session->set_flashdata('success', 'Data kurs berhasil ditambah');
			redirect('listkurs');		
		}
	}

	function editkurs($id_kurs)
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
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_kurs.id_matauang');
		$select = $this->db->where('id_kurs', $id_kurs);
		$data['kurs'] = $this->m->Get_All('kurs', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('kodematauang');
		$select = $this->db->where('deleted', 0);
		$data['matauang'] = $this->m->Get_All('matauang', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/kurs/updatekurs', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatekurs()
	{
		$table = 'kurs';
		$where = array(
			'id_kurs'		    =>	$this->input->post('idkurs')
		);

			$data = array(
				'id_matauang'       =>	$this->input->post('idmatauang'),
				'rate'      		=>	$this->input->post('rate'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data mata uang berhasil diubah');
		redirect('listkurs');
		
		
	}
	function deletekurs()
	{
		$table = 'kurs';
		$where = array(
			'id_kurs'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data kurs berhasil dihapus');
		redirect('listkurs');
	}
}