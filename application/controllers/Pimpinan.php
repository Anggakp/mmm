<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }
	public function index()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		// $select = $this->db->select('*, count(kode_barang) as jumlahbarang');
		// $data['read']=$this->m->Get_All('barang',$select);
		$data['title'] = 'PT.MMM | Pimpinan';
		// echo "Selamat Datang" . $data->nama;
	

		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('templates_pimpinan/dashboard',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	
	function Createadmin()
	{
		

		$this->form_validation->set_rules(
			'namaadmin',
			'Namaadmin',
			'required|trim',
			[
				'required' => 'Field nama admin tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'username',
			'username',
			'required|trim|valid_username|is_unique[user.username]',

			[
				'required'    => 'Field username tidak boleh kosong',
				'valid_username' => 'Format username harus sesuai',
				'is_unique'   => 'username sudah terdaftar'
			]
		);
		

		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Tambah Data Admin';



			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/pimpinan/master/admin/createadmin', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {

			$data = array(
				'nama'				=>	htmlspecialchars($this->input->post('namaadmin', true)),
				'username'				=>	htmlspecialchars($this->input->post('username', true)),
				'image'				=>	'default.png',
				'password'			=>	password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id'			=>	'2',
				'is_active'			=>	'1',
				'tanggal_daftar'	=>	date('y-m-d'),


			);

			$this->m->Save($data, 'user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
			redirect('listadmin');
		}
	}
	function editadmin($id_user)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Admin'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->where('id_user', $id_user);
		$data['admin'] = $this->m->Get_All('user', $select);

		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/pimpinan/master/admin/editadmin', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function Updateadmin()
	{
		
		$table = 'user';
		$where = array(
			'id_user'		=>	$this->input->post('iduser')
		);
		$data = array(
				'nama'				=>	htmlspecialchars($this->input->post('namaadmin', true)),
				'username'				=>	htmlspecialchars($this->input->post('username', true)),
				'image'				=>	'default.png',
				'is_active'			=>	$this->input->post('status'),
			);
		$this->m->Update($where, $data, $table);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data admin berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
		redirect('listadmin');
	}
	function deleteadmin()
	{
		$table = 'user';
		$where = array(
			'id_user'		=>	$this->input->post('id')
		);
		$this->m->Delete($where, $table);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data admin berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
		redirect('listadmin');
	}
	function listayam()
	{
		
		$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Ayam';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('ayam', $select);

		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/pimpinan/master/ayam/listayam',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	
}
