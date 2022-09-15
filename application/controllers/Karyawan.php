<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listkaryawan()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Karyawan';
		$select = $this->db->select('*');
		$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
		$select = $this->db->order_by('nama');
		$select = $this->db->where('tbl_karyawan.deleted', 0);
		$data['read'] = $this->m->Get_All('karyawan', $select);

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

	     $this->db->where('role_id', $role_id);
	    $this->db->where('menu_id', $menu_id);
	    $this->db->where('detail_btn = 1');
	    $data['aksesdetailbtn'] = $this->db->get('user_access_menu');

		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/karyawan/listkaryawan',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}

	function createkaryawan()
	{
		
		$this->form_validation->set_rules(
			'nik',
			'nik',
			'trim|is_unique[karyawan.nik]',
			[
				'required' => 'Field NIK tidak boleh kosong',
				'is_unique'  => "NIK yang dimasukkan sudah terdaftar pada database"
			]
		);
		$this->form_validation->set_rules(
			'nip',
			'nip',
			'required|trim|is_unique[karyawan.nip]',
			[
				'required' => 'Field NIP tidak boleh kosong',
				'is_unique'  => "NIP yang dimasukkan sudah terdaftar pada database"
			]
		);
		$this->form_validation->set_rules(
			'nama',
			'nama',
			'required|trim',
			[
				'required' => 'Field nama tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'email',
			'email',
			'valid_email|trim',
			[
				'valid_email' => 'Format email tidak sesuai'
			]
		);
		
	
		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Tambah Data Karyawan';

			$select = $this->db->select('*');
			$select = $this->db->order_by('bagian');
			$select = $this->db->where('deleted', 0);
			$data['bagian'] = $this->m->Get_All('bagian', $select);


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/karyawan/createkaryawan', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'nip'               =>	$this->input->post('nip'),
				'nik'               =>	$this->input->post('nik'),
				'nama'     			=>	$this->input->post('nama'),
				'alamat'     		=>	$this->input->post('alamat'),
				'kota'     			=>	$this->input->post('kota'),
				'provinsi'     		=>	$this->input->post('provinsi'),
				'kodepos'     		=>	$this->input->post('kodepos'),
				'phone'     		=>	$this->input->post('phone'),
				'kontak'     		=>	$this->input->post('kontak'),
				'email'     		=>	$this->input->post('email'),
				'npwp'     			=>	$this->input->post('npwp'),
				'tanggalmasuk'      =>	$this->input->post('tanggalmasuk'),
				'id_bagian'     	=>	$this->input->post('bagian'),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'karyawan');

			$this->session->set_flashdata('success', 'Data karyawan berhasil ditambah');
			redirect('listkaryawan');		
		}
	}
	function editkaryawan($id_karyawan)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Karyawan'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
		$select = $this->db->where('id_karyawan', $id_karyawan);
		$data['karyawan'] = $this->m->Get_All('karyawan', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('bagian');
		$select = $this->db->where('deleted', 0);
		$data['bagian'] = $this->m->Get_All('bagian', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/karyawan/updatekaryawan', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatekaryawan()
	{
		$table = 'karyawan';
		$where = array(
			'id_karyawan'		    =>	$this->input->post('idkaryawan')
		);

			$data = array(
				'nip'               =>	$this->input->post('nip'),
				'nik'               =>	$this->input->post('nik'),
				'nama'     			=>	$this->input->post('nama'),
				'alamat'     		=>	$this->input->post('alamat'),
				'kota'     			=>	$this->input->post('kota'),
				'provinsi'     		=>	$this->input->post('provinsi'),
				'kodepos'     		=>	$this->input->post('kodepos'),
				'phone'     		=>	$this->input->post('phone'),
				'kontak'     		=>	$this->input->post('kontak'),
				'email'     		=>	$this->input->post('email'),
				'npwp'     			=>	$this->input->post('npwp'),
				'tanggalmasuk'     	=>	$this->input->post('tanggalmasuk'),
				'id_bagian'     	=>	$this->input->post('bagian'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data karyawan berhasil diubah');
		redirect('listkaryawan');
		
		
	}
	function deletekaryawan()
	{
		$table = 'karyawan';
		$where = array(
			'id_karyawan'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data karyawan berhasil dihapus');
		redirect('listkaryawan');
	}
	function detailkaryawan($id_karyawan)
	{

		$data = [
			'title' => 'PT.MMM | Detail Data Karyawan'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
		$select = $this->db->where('id_karyawan', $id_karyawan);
		$data['karyawan'] = $this->m->Get_All('karyawan', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/karyawan/detailkaryawan', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
}