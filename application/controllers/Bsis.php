<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bsis extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listbsis()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List BSIS';
		$select = $this->db->select('*');
		$select = $this->db->order_by('akun');
		$select = $this->db->where('deleted', 0);
		$data['read'] = $this->m->Get_All('bsis', $select);

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
		$this->load->view('pages/coa/bsis/listbsis',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}

	function createbsis()
	{
		
		$this->form_validation->set_rules(
			'namaakun',
			'namaakun',
			'required|trim',
			[
				'required' => 'Field nama akun tidak boleh kosong'
			]
		);
		$this->form_validation->set_rules(
			'akun',
			'akun',
			'required|max_length[2]|is_unique[bsis.akun]|trim',
			[
				'required'   => 'Field akun tidak boleh kosong',
				'max_length' => 'Field akun tidak boleh lebih dari dua digit',
				'is_unique'  => 'Akun yang dimasukkan sudah terdaftar pada database',
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
			$data['title'] = 'PT.MMM | Tambah Data BSIS';


			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/coa/bsis/createbsis', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			
			$data = array(
				'normal'            =>	$this->input->post('normal'),
				'namaakun'          =>	$this->input->post('namaakun'),
				'pengurang'         =>	$this->input->post('pengurang'),
				'bsis'              =>	$this->input->post('bsis'),
				'akun'              =>	$this->input->post('akun'),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'bsis');

			$data = array(
				
				'namaakun'          =>	$this->input->post('namaakun'),
				'akun'              =>	$this->input->post('akun'),
				'kode'              =>	$this->input->post('akun'),
				'level'             =>	1,
				'headerdetail'      =>	"H",
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'coa');

			$this->session->set_flashdata('success', 'Data bsis berhasil ditambah');
			redirect('listbsis');		
		}
	}

	function editbsis($id_bsis)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data BSIS'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->where('id_bsis', $id_bsis);
		$data['bsis'] = $this->m->Get_All('bsis', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/coa/bsis/updatebsis', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatebsis()
	{
		$id_bsis = $this->input->post('idbsis');

		
		$this->form_validation->set_rules(
			'akun',
			'akun',
			'max_length[2]|is_unique[bsis.akun]|trim',
			[
				'max_length' => 'Field akun tidak boleh lebih dari dua digit',
				'is_unique'  => 'Akun yang dimasukkan sudah terdaftar pada database',
			]
		);
		if ($this->form_validation->run() == false) {
			$this->editbsis($id_bsis);
		}else {
			if ($this->input->post('akun') == "") {
				$table = 'bsis';
				$where = array(
					'id_bsis'		    =>	$this->input->post('idbsis')
				);

					$data = array(
						'normal'            =>	$this->input->post('normal'),
						'namaakun'          =>	$this->input->post('namaakun'),
						'pengurang'         =>	$this->input->post('pengurang'),
						'bsis'              =>	$this->input->post('bsis'),
						'akun'              =>	$this->input->post('akun_'),
						'update_by'         =>	$this->session->userdata('nama'),
						'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);

				
				$this->session->set_flashdata('success', 'Data bsis berhasil diubah');
				redirect('listbsis');
			}elseif ($this->input->post('akun') != "") {
				$table = 'bsis';
				$where = array(
					'id_bsis'		    =>	$this->input->post('idbsis')
				);

					$data = array(
						'normal'            =>	$this->input->post('normal'),
						'namaakun'          =>	$this->input->post('namaakun'),
						'pengurang'         =>	$this->input->post('pengurang'),
						'bsis'              =>	$this->input->post('bsis'),
						'akun'              =>	$this->input->post('akun'),
						'update_by'         =>	$this->session->userdata('nama'),
						'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);

				
				$this->session->set_flashdata('success', 'Data bsis berhasil diubah');
				redirect('listbsis');
			} 		
		} 
	}
	function deletebsis()
	{
		$table = 'bsis';
		$where = array(
			'id_bsis'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data bsis berhasil dihapus');
		redirect('listbsis');
	}
}