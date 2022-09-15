<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listclient()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Client';
		$select = $this->db->select('*');
		$select = $this->db->order_by('nama');
		$select = $this->db->where('deleted', 0);
		$data['read'] = $this->m->Get_All('client', $select);
		
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
		$this->load->view('pages/master/client/listclient',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	function createclient()
	{
		
		$this->form_validation->set_rules(
			'subaccount',
			'subaccount',
			'required|trim|min_length[10]|is_unique[client.subaccount]',
			[
				'required' => 'Field sub account tidak boleh kosong',
				'min_length' => "Field sub account tidak boleh kurang dari 10 karakter",
				'is_unique'  => "Sub account yang dimasukkan sudah ada pada database"
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
			'alamat',
			'alamat',
			'required|trim|max_length[400]',
			[
				'required' => 'Field alamat tidak boleh kosong',
				'max_length' => "Field alamat tidak boleh lebih dari 400 karakter"
			]
		);
		$this->form_validation->set_rules(
			'kota',
			'kota',
			'required|trim',
			[
				'required' => 'Field kota tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'provinsi',
			'provinsi',
			'required|trim',
			[
				'required' => 'Field provinsi tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'kodepos',
			'kodepos',
			'required|trim',
			[
				'required' => 'Field kode pos tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'phone',
			'phone',
			'required|trim',
			[
				'required' => 'Field phone tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'kontak',
			'kontak',
			'required|trim',
			[
				'required' => 'Field kontak tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'email',
			'email',
			'required|trim|valid_email',
			[
				'required' => 'Field email tidak boleh kosong',
				'valid_email' => 'Format Email Harus Sesuai'
			]
		);
		$this->form_validation->set_rules(
			'npwp',
			'npwp',
			'required|trim',
			[
				'required' => 'Field npwp tidak boleh kosong'
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
			$data['title'] = 'PT.MMM | Tambah Data Client';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/master/client/createclient', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'subaccount'        =>	$this->input->post('subaccount'),
				'nama'     			=>	$this->input->post('nama'),
				'alamat'     		=>	$this->input->post('alamat'),
				'kota'     			=>	$this->input->post('kota'),
				'provinsi'     		=>	$this->input->post('provinsi'),
				'kodepos'     		=>	$this->input->post('kodepos'),
				'phone'     		=>	$this->input->post('phone'),
				'kontak'     		=>	$this->input->post('kontak'),
				'email'     		=>	$this->input->post('email'),
				'npwp'     			=>	$this->input->post('npwp'),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'client');

			$this->session->set_flashdata('success', 'Data client berhasil ditambah');
			redirect('listclient');		
		}
	}

	function editclient($id_client)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Client'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_client', $id_client);
		$data['client'] = $this->m->Get_All('client', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/client/updateclient', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updateclient()  
	{
		$table = 'client';
		$where = array(
			'id_client'		    =>	$this->input->post('idclient')
		);

			$data = array(
				'subaccount'        =>	$this->input->post('subaccount'),
				'nama'     			=>	$this->input->post('nama'),
				'alamat'     		=>	$this->input->post('alamat'),
				'kota'     			=>	$this->input->post('kota'),
				'provinsi'     		=>	$this->input->post('provinsi'),
				'kodepos'     		=>	$this->input->post('kodepos'),
				'phone'     		=>	$this->input->post('phone'),
				'kontak'     		=>	$this->input->post('kontak'),
				'email'     		=>	$this->input->post('email'),
				'npwp'     			=>	$this->input->post('npwp'),
				'update_by'         =>	$this->session->userdata('nama'),
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data client berhasil diubah');
		redirect('listclient');
		
		
	}
	function deleteclient()
	{
		$table = 'client';
		$where = array(
			'id_client'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data client berhasil dihapus');
		redirect('listclient');
	}

	
	function detailclient($id_client)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Client'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_client', $id_client);
		$data['client'] = $this->m->Get_All('client', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/master/client/detailclient', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
}