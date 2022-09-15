<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coa extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listcoa()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List COA';
		$select = $this->db->select('*');
		$select = $this->db->order_by('kode asc');
		$select = $this->db->where('deleted', 0);
		$data['read'] = $this->m->Get_All('coa', $select);

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
		$this->load->view('pages/coa/coa/listcoa',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	function addcoa($id_coa)
	{

		$data = [
			'title' => 'PT.MMM | Tambah Data COA'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		
		

		$select = $this->db->select('*');
		$select = $this->db->where('id_coa', $id_coa);
		$data['coa'] = $this->m->Get_All('coa', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('groupakun asc, nama asc');
		$select = $this->db->where('deleted', 0);
		$data['groupakun'] = $this->m->Get_All('groupakun', $select);

		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/coa/coa/createcoa', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function createcoa()
	{
		$id_coa = $this->input->post('idcoa');

		
		$this->form_validation->set_rules(
			'akunbaru',
			'akunbaru',
			'required|is_unique[coa.akun]|trim',
			[
				'required'   => 'Field akun baru tidak boleh kosong',
				'is_unique'  => 'Akun yang dimasukkan sudah terdaftar pada database',
			]
		);
		if ($this->form_validation->run() == false) {

			$this->addcoa($id_coa);
			

		}else {
			
				$kode = $this->input->post('code');
				$level = $this->m->levelotomatis($kode);
				
			if ($this->input->post('headerdetail') == "H") {
				
				$data = array(
						
						'namaakun'          =>	$this->input->post('namaakun'),
						'level'				=>  $level,
						'akun'              =>	$this->input->post('akunbaru'),
						'kode'              =>	$this->input->post('code'),
						'headerdetail'      =>	$this->input->post('headerdetail'),
						'id_groupakun'      =>	$this->input->post('idgroupakun'),
						'create_by'         =>	$this->session->userdata('nama'),
						'create_date'       =>	date("Y-m-d"),
				);
				$this->m->Save($data, 'coa');

				$this->session->set_flashdata('success', 'Data coa berhasil ditambah');
				redirect('listcoa');
			}else if ($this->input->post('headerdetail') == "D") {
			
				$data = array(
						
						'namaakun'          =>	$this->input->post('namaakun'),
						'level'				=>  $level,
						'akun'              =>	$this->input->post('akunbaru'),
						'kode'              =>	$this->input->post('code'),
						'headerdetail'      =>	$this->input->post('headerdetail'),
						'id_groupakun'      =>	$this->input->post('idgroupakun'),
						// 'status'            =>	0,
						'create_by'         =>	$this->session->userdata('nama'),
						'create_date'       =>	date("Y-m-d"),
				);
				$this->m->Save($data, 'coa');
 

				$this->session->set_flashdata('success', 'Data coa berhasil ditambah');
				redirect('listcoa');
			}

					
			}		
	}
	function editcoa($id_coa)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data COA'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->join('groupakun', 'groupakun.id_groupakun = tbl_coa.id_groupakun', 'left');
		$select = $this->db->where('id_coa', $id_coa);
		$data['coa'] = $this->m->Get_All('coa', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('groupakun asc, nama asc');
		$select = $this->db->where('deleted', 0);
		$data['groupakun'] = $this->m->Get_All('groupakun', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/coa/coa/updatecoa', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatecoa()
	{
		$table = 'coa';
		$where = array(
			'id_coa'		    =>	$this->input->post('idcoa')
		);

			$data = array(
				'namaakun'          =>	$this->input->post('namaakun'),
				'headerdetail'      =>	$this->input->post('headerdetail'),
				'id_groupakun'      =>	$this->input->post('idgroupakun'),
				'update_by'         =>	$this->session->userdata('nama'),
				// 'status'            =>	0,
				'update_date'       =>	date("Y-m-d"),
		);
		$this->m->Update($where, $data, $table);

		
		$this->session->set_flashdata('success', 'Data coa berhasil diubah');
		redirect('listcoa');
	}
	function deletecoa()
	{
		$kode = $this->input->post('kode');
		$hasil = $this->m->checking($kode);

		if ($this->input->post('headerdetail') == "H") {
			if ($hasil == 0) {
				$table = 'coa';
				$where = array(
					'akun'		    =>	$this->input->post('akun')
				);

				$data = array(
						'deleted'           =>	1
				);
				$this->m->Update($where, $data, $table);
				$this->session->set_flashdata('success', 'Data coa berhasil dihapus');
				redirect('listcoa');
			}else{
				
				$this->session->set_flashdata('error', 'Data ini tidak bisa dihapus, karena sudah mempunyai detail');
				redirect('listcoa');
			}
		}elseif ($this->input->post('headerdetail') == "D") {
			$table = 'coa';
				$where = array(
					'akun'		    =>	$this->input->post('akun')
				);

				$data = array(
						'deleted'           =>	1
				);
				$this->m->Update($where, $data, $table);
				$this->session->set_flashdata('success', 'Data coa berhasil dihapus');
			redirect('listcoa');
		}
	}

}