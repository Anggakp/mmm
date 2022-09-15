<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
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

			$select = $this->db->select('*');
		$select = $this->db->join('user_menu', 'user_menu.id = tbl_header_reference.id_menu');
		$data['read'] = $this->m->Get_All('header_reference', $select);

		$data1 = array(
				'ref_number' => 1,
			'id_menu' => 36
			);

		$data['cek1'] = $this->db->get_where('tbl_detail_reference', $data1);
		$data['number1'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 1,
			'id_menu' => 36
		])->row_array();

		$data2 = array(
			'ref_number' => 2,
			'id_menu' => 36
			);

		$data['cek2'] = $this->db->get_where('tbl_detail_reference', $data2);
		$data['number2'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 2,
			'id_menu' => 36
		])->row_array();

		$data3 = array(
			'ref_number' => 3,
			'id_menu' => 36
			);

		$data['cek3'] = $this->db->get_where('tbl_detail_reference', $data3);
		$data['number3'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 3,
			'id_menu' => 36
		])->row_array();

		$data4 = array(
			'ref_number' => 4,
			'id_menu' => 36
			);

		$data['cek4'] = $this->db->get_where('tbl_detail_reference', $data4);
		$data['number4'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 4,
			'id_menu' => 36
		])->row_array();

		$data5 = array(
			'ref_number' => 5,
			'id_menu' => 36
			);

		$data['cek5'] = $this->db->get_where('tbl_detail_reference', $data5);
		$data['number5'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 5,
			'id_menu' => 36
		])->row_array();

		$data6 = array(
			'ref_number' => 6,
			'id_menu' => 36
			);

		$data['cek6'] = $this->db->get_where('tbl_detail_reference', $data6);
		$data['number6'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 6,
			'id_menu' => 36
		])->row_array();

		$data7 = array(
			'ref_number' => 7,
			'id_menu' => 36
			);

		$data['cek7'] = $this->db->get_where('tbl_detail_reference', $data7);
		$data['number7'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 7,
			'id_menu' => 36
		])->row_array();

		$data8 = array(
			'ref_number' => 8,
			'id_menu' => 36
			);

		$data['cek8'] = $this->db->get_where('tbl_detail_reference', $data8);
		$data['number8'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 8,
			'id_menu' => 36
		])->row_array();
 

		$data9 = array(
				'ref_number' => 9,
			'id_menu' => 36
			);

		$data['cek9'] = $this->db->get_where('tbl_detail_reference', $data9);

		$data['number9'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 9,
			'id_menu' => 36
		])->row_array();

		$data10 = array(
			'ref_number' => 10,
			'id_menu' => 36
			);

		$data['cek10'] = $this->db->get_where('tbl_detail_reference', $data10);

		$data['number10'] = $this->db->get_where('tbl_detail_reference', [
			'ref_number' => 10,
			'id_menu' => 36
		])->row_array();

		$data['title'] = 'PT.MMM | Pengaturan';


		$this->load->view('templates_pimpinan/header',$data);
		$this->load->view('templates_pimpinan/sidebar',$data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/pengaturan/pengaturan',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}

	function createreference()
	{
		
		$this->form_validation->set_rules(
			'hasil',
			'hasil',
			'required|trim',
			[
				'required' => 'Field hasil generate tidak boleh kosong'
			]
		);
	
		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Tambah Reference';

			$select = $this->db->select('*');
			$select = $this->db->where('level', '2');
			$select = $this->db->where('jenis', '1');
			$select = $this->db->order_by('kode_sub');
			$data['menu'] = $this->m->Get_All('user_menu', $select);

			$data['idheaderreference'] = $this->m->id_headerreferance();

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/pengaturan/reference/createreference', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		}else {
			$data_ = array( 
				'id_menu'               =>	$this->input->post('menu')
			);

			$result = $this->db->get_where('header_reference', $data_);

			if ($result->num_rows()<1) {
				 $data = array(
					'id_header'         =>	$this->input->post('idheader'),
					'id_menu'           =>	$this->input->post('menu'),
					'hasil_reference'   =>	$this->input->post('hasil'),
					'deleted'           =>	0,
					'create_by'         =>	$this->session->userdata('nama'),
					'create_date'       =>	date("Y-m-d"),
				);

				$this->m->Save($data, 'header_reference');

				// $table = 'detail_reference';
				// $where = array(
				// 	'id_header'  => 0
	 		// 	);
				// $data = array(
				// 	'id_header'         =>	$this->input->post('idheader'),
				// );

				// $this->m->Update($where, $data, $table);
			}else{
				$table = 'header_reference';
				$where = array(
				'id_menu'  => $this->input->post('menu')
 				);
				$data = array(
				 
				'id_menu'           =>	$this->input->post('menu'),
				'hasil_reference'   =>	$this->input->post('hasil'),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Update($where, $data, $table);


			if ($this->input->post('referencepart_1') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 1
				);

				$this->m->Delete($where, $table);
			}

			if ($this->input->post('referencepart_2') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 2
				);

				$this->m->Delete($where, $table);
			}
			if ($this->input->post('referencepart_3') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 3
				);

				$this->m->Delete($where, $table);
			}
			if ($this->input->post('referencepart_4') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 4
				);

				$this->m->Delete($where, $table);
			}
			if ($this->input->post('referencepart_5') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 5
				);

				$this->m->Delete($where, $table);
			}
			if ($this->input->post('referencepart_6') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 6
				);

				$this->m->Delete($where, $table);
			}
			if ($this->input->post('referencepart_7') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 7
				);

				$this->m->Delete($where, $table);
			}
			if ($this->input->post('referencepart_8') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 8
				);

				$this->m->Delete($where, $table);
			}
			if ($this->input->post('referencepart_9') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 9
				);

				$this->m->Delete($where, $table);
			}
			if ($this->input->post('referencepart_10') == "") {
				$table = 'detail_reference';
				$where = array(
					'id_menu' => $this->input->post('menu'),
					'ref_number' => 10
				);

				$this->m->Delete($where, $table);
			}

			// $table = 'detail_reference';
			// $where = array(
			// 	'id_header'  => 0
 		// 	);
			// $data = array(
			// 	'id_header'         =>	$this->input->post('idheader'),
			// );

			// $this->m->Update($where, $data, $table);
			}

			

			$this->session->set_flashdata('success', 'Data reference berhasil ditambah');
			redirect('pengaturan');		
		}
	}     
	 
	function adddetailreference1()
	{
			$data_ = array(
				'ref_number'              =>	1,
				'id_menu'                 =>	$this->input->post('menu')
			);

			$result = $this->db->get_where('detail_reference', $data_);
			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_1') == "01") {
				$data = array(
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber1'),
					'ref_option'        =>	$this->input->post('referencepart_number1'),
					'ref_part'          =>	$this->input->post('referencenumber_1'),
					'hasil_part'        =>	$this->input->post('referencepart_1'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_1') == "02"){
					$data = array( 
					    'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber1'),
						'ref_option'        =>	$this->input->post('referencepart_separator1'),
						'ref_part'          =>	$this->input->post('referencenumber_1'),
						'hasil_part'        =>	$this->input->post('referencepart_1'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_1') == "03"){
					$data = array( 
					    'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber1'),
						'ref_option'        =>	$this->input->post('referencepart_bulan1'),
						'ref_part'          =>	$this->input->post('referencenumber_1'),
						'hasil_part'        =>	$this->input->post('referencepart_1'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_1') == "04"){
					$data = array( 
					    'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber1'),
						'ref_option'        =>	$this->input->post('referencepart_tahun1'),
						'ref_part'          =>	$this->input->post('referencenumber_1'),
						'hasil_part'        =>	$this->input->post('referencepart_1'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_1') == "05"){
					$data = array( 
					    'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber1'),
						'ref_option'        =>	$this->input->post('referencepart_text1'),
						'ref_part'          =>	$this->input->post('referencenumber_1'),
						'hasil_part'        =>	$this->input->post('referencepart_1'),
					);

					$this->m->Save($data, 'detail_reference');
				}
				
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 1,
					'id_menu'      => $this->input->post('menu')
				);
				if ($this->input->post('referencenumber_1') == "01") {
				$data = array( 
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber1'),
					'ref_option'        =>	$this->input->post('referencepart_number1'),
					'ref_part'          =>	$this->input->post('referencenumber_1'),
					'hasil_part'        =>	$this->input->post('referencepart_1'),
				);

			$this->m->Update($where, $data, $table);
	
			}else if($this->input->post('referencenumber_1') == "02"){
				$data = array( 
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber1'),
					'ref_option'        =>	$this->input->post('referencepart_separator1'),
					'ref_part'          =>	$this->input->post('referencenumber_1'),
					'hasil_part'        =>	$this->input->post('referencepart_1'),
				);

				$this->m->Update($where, $data, $table);
			}else if($this->input->post('referencenumber_1') == "03"){
				$data = array(
					'id_menu'           =>	$this->input->post('menu'), 
					'ref_number'        =>	$this->input->post('refnumber1'),
					'ref_option'        =>	$this->input->post('referencepart_bulan1'),
					'ref_part'          =>	$this->input->post('referencenumber_1'),
					'hasil_part'        =>	$this->input->post('referencepart_1'),
				);

				$this->m->Update($where, $data, $table);
			}else if($this->input->post('referencenumber_1') == "04"){
				$data = array( 
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber1'),
					'ref_option'        =>	$this->input->post('referencepart_tahun1'),
					'ref_part'          =>	$this->input->post('referencenumber_1'),
					'hasil_part'        =>	$this->input->post('referencepart_1'),
				);

				$this->m->Update($where, $data, $table);
			}else if($this->input->post('referencenumber_1') == "05"){
				$data = array( 
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber1'),
					'ref_option'        =>	$this->input->post('referencepart_text1'),
					'ref_part'          =>	$this->input->post('referencenumber_1'),
					'hasil_part'        =>	$this->input->post('referencepart_1'),
				);

				$this->m->Update($where, $data, $table);
			}
			
			}
			
	}
	function adddetailreference2()
	{
			
			$data_ = array(
				'ref_number'              =>	2,
				'id_menu'                 =>	$this->input->post('menu')
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_2') == "01") {
				$data = array(
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber2'),
					'ref_option'        =>	$this->input->post('referencepart_number2'),
					'ref_part'          =>	$this->input->post('referencenumber_2'),
					'hasil_part'        =>	$this->input->post('referencepart_2'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_2') == "02"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber2'),
						'ref_option'        =>	$this->input->post('referencepart_separator2'),
						'ref_part'          =>	$this->input->post('referencenumber_2'),
						'hasil_part'        =>	$this->input->post('referencepart_2'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_2') == "03"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber2'),
						'ref_option'        =>	$this->input->post('referencepart_bulan2'),
						'ref_part'          =>	$this->input->post('referencenumber_2'),
					    'hasil_part'        =>	$this->input->post('referencepart_2'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_2') == "04"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber2'),
						'ref_option'        =>	$this->input->post('referencepart_tahun2'),
						'ref_part'          =>	$this->input->post('referencenumber_2'),
						'hasil_part'        =>	$this->input->post('referencepart_2'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_2') == "05"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber2'),
						'ref_option'        =>	$this->input->post('referencepart_text2'),
						'ref_part'          =>	$this->input->post('referencenumber_2'),
						'hasil_part'        =>	$this->input->post('referencepart_2'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 2,
					'id_menu'           =>	$this->input->post('menu'),
				);
				if ($this->input->post('referencenumber_2') == "01") {
				$data = array(
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber2'),
					'ref_option'        =>	$this->input->post('referencepart_number2'),
					'ref_part'          =>	$this->input->post('referencenumber_2'),
					'hasil_part'        =>	$this->input->post('referencepart_2'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_2') == "02"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber2'),
						'ref_option'        =>	$this->input->post('referencepart_separator2'),
						'ref_part'          =>	$this->input->post('referencenumber_2'),
						'hasil_part'        =>	$this->input->post('referencepart_2'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_2') == "03"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber2'),
						'ref_option'        =>	$this->input->post('referencepart_bulan2'),
						'ref_part'          =>	$this->input->post('referencenumber_2'),
						'hasil_part'        =>	$this->input->post('referencepart_2'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_2') == "04"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber2'),
						'ref_option'        =>	$this->input->post('referencepart_tahun2'),
						'ref_part'          =>	$this->input->post('referencenumber_2'),
						'hasil_part'        =>	$this->input->post('referencepart_2'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_2') == "05"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber2'),
						'ref_option'        =>	$this->input->post('referencepart_text2'),
						'ref_part'          =>	$this->input->post('referencenumber_2'),
						'hasil_part'        =>	$this->input->post('referencepart_2'),
					);

				$this->m->Update($where, $data, $table);
				}
			}

			
			
	}
	function adddetailreference3()
	{
			
			$data_ = array(
				'ref_number'              =>	3,
				'id_menu'           =>	$this->input->post('menu'),
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_3') == "01") {
				$data = array(
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber3'),
					'ref_option'        =>	$this->input->post('referencepart_number3'),
					'ref_part'          =>	$this->input->post('referencenumber_3'),
					'hasil_part'        =>	$this->input->post('referencepart_3'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_3') == "02"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber3'),
						'ref_option'        =>	$this->input->post('referencepart_separator3'),
						'ref_part'          =>	$this->input->post('referencenumber_3'),
						'hasil_part'        =>	$this->input->post('referencepart_3'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_3') == "03"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber3'),
						'ref_option'        =>	$this->input->post('referencepart_bulan3'),
						'ref_part'          =>	$this->input->post('referencenumber_3'),
						'hasil_part'        =>	$this->input->post('referencepart_3'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_3') == "04"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber3'),
						'ref_option'        =>	$this->input->post('referencepart_tahun3'),
						'ref_part'          =>	$this->input->post('referencenumber_3'),
						'hasil_part'        =>	$this->input->post('referencepart_3'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_3') == "05"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber3'),
						'ref_option'        =>	$this->input->post('referencepart_text3'),
						'ref_part'          =>	$this->input->post('referencenumber_3'),
						'hasil_part'        =>	$this->input->post('referencepart_3'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 3,
					'id_menu'           =>	$this->input->post('menu'),
				);
				if ($this->input->post('referencenumber_3') == "01") {
				$data = array(
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber3'),
					'ref_option'        =>	$this->input->post('referencepart_number3'),
					'ref_part'          =>	$this->input->post('referencenumber_3'),
					'hasil_part'        =>	$this->input->post('referencepart_3'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_3') == "02"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber3'),
						'ref_option'        =>	$this->input->post('referencepart_separator3'),
						'ref_part'          =>	$this->input->post('referencenumber_3'),
						'hasil_part'        =>	$this->input->post('referencepart_3'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_3') == "03"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber3'),
						'ref_option'        =>	$this->input->post('referencepart_bulan3'),
						'ref_part'          =>	$this->input->post('referencenumber_3'),
						'hasil_part'        =>	$this->input->post('referencepart_3'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_3') == "04"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber3'),
						'ref_option'        =>	$this->input->post('referencepart_tahun3'),
						'ref_part'          =>	$this->input->post('referencenumber_3'),
						'hasil_part'        =>	$this->input->post('referencepart_3'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_3') == "05"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber3'),
						'ref_option'        =>	$this->input->post('referencepart_text3'),
						'ref_part'          =>	$this->input->post('referencenumber_3'),
						'hasil_part'        =>	$this->input->post('referencepart_3'),
					);

				$this->m->Update($where, $data, $table);
				}
			}	
	}

	function adddetailreference4()
	{
			
			$data_ = array(
				'ref_number'              =>	4,
				'id_menu'           =>	$this->input->post('menu'),
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_4') == "01") {
				$data = array(
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber4'),
					'ref_option'        =>	$this->input->post('referencepart_number4'),
					'ref_part'          =>	$this->input->post('referencenumber_4'),
					'hasil_part'        =>	$this->input->post('referencepart_4'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_4') == "02"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber4'),
						'ref_option'        =>	$this->input->post('referencepart_separator4'),
						'ref_part'          =>	$this->input->post('referencenumber_4'),
						'hasil_part'        =>	$this->input->post('referencepart_4'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_4') == "03"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber4'),
						'ref_option'        =>	$this->input->post('referencepart_bulan4'),
						'ref_part'          =>	$this->input->post('referencenumber_4'),
						'hasil_part'        =>	$this->input->post('referencepart_4'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_4') == "04"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber4'),
						'ref_option'        =>	$this->input->post('referencepart_tahun4'),
						'ref_part'          =>	$this->input->post('referencenumber_4'),
						'hasil_part'        =>	$this->input->post('referencepart_4'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_4') == "05"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber4'),
						'ref_option'        =>	$this->input->post('referencepart_text4'),
						'ref_part'          =>	$this->input->post('referencenumber_4'),
						'hasil_part'        =>	$this->input->post('referencepart_4'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 4,
					'id_menu'           =>	$this->input->post('menu'),
				);
				if ($this->input->post('referencenumber_4') == "01") {
				$data = array(
					'id_menu'           =>	$this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber4'),
					'ref_option'        =>	$this->input->post('referencepart_number4'),
					'ref_part'          =>	$this->input->post('referencenumber_4'),
					'hasil_part'        =>	$this->input->post('referencepart_4'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_4') == "02"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber4'),
						'ref_option'        =>	$this->input->post('referencepart_separator4'),
						'ref_part'          =>	$this->input->post('referencenumber_4'),
						'hasil_part'        =>	$this->input->post('referencepart_4'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_4') == "03"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber4'),
						'ref_option'        =>	$this->input->post('referencepart_bulan4'),
						'ref_part'          =>	$this->input->post('referencenumber_4'),
						'hasil_part'        =>	$this->input->post('referencepart_4'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_4') == "04"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber4'),
						'ref_option'        =>	$this->input->post('referencepart_tahun4'),
						'ref_part'          =>	$this->input->post('referencenumber_4'),
						'hasil_part'        =>	$this->input->post('referencepart_4'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_4') == "05"){
					$data = array(
						'id_menu'           =>	$this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber4'),
						'ref_option'        =>	$this->input->post('referencepart_text4'),
						'ref_part'          =>	$this->input->post('referencenumber_4'),
						'hasil_part'        =>	$this->input->post('referencepart_4'),
					);

				$this->m->Update($where, $data, $table);
				}
			}
	}

	function adddetailreference5()
	{
			
			$data_ = array(
				'ref_number'              =>	5,
				'id_menu'    => $this->input->post('menu')
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_5') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber5'),
					'ref_option'        =>	$this->input->post('referencepart_number5'),
					'ref_part'          =>	$this->input->post('referencenumber_5'),
					'hasil_part'        =>	$this->input->post('referencepart_5'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_5') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber5'),
						'ref_option'        =>	$this->input->post('referencepart_separator5'),
						'ref_part'          =>	$this->input->post('referencenumber_5'),
						'hasil_part'        =>	$this->input->post('referencepart_5'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_5') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber5'),
						'ref_option'        =>	$this->input->post('referencepart_bulan5'),
						'ref_part'          =>	$this->input->post('referencenumber_5'),
						'hasil_part'        =>	$this->input->post('referencepart_5'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_5') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber5'),
						'ref_option'        =>	$this->input->post('referencepart_tahun5'),
						'ref_part'          =>	$this->input->post('referencenumber_5'),
						'hasil_part'        =>	$this->input->post('referencepart_5'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_5') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber5'),
						'ref_option'        =>	$this->input->post('referencepart_text5'),
						'ref_part'          =>	$this->input->post('referencenumber_5'),
						'hasil_part'        =>	$this->input->post('referencepart_5'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 5,
					'id_menu'    => $this->input->post('menu')
				);
				if ($this->input->post('referencenumber_5') == "01") {
				$data = array(
					'id_menu'           => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber5'),
					'ref_option'        =>	$this->input->post('referencepart_number5'),
					'ref_part'          =>	$this->input->post('referencenumber_5'),
					'hasil_part'        =>	$this->input->post('referencepart_5'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_5') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber5'),
						'ref_option'        =>	$this->input->post('referencepart_separator5'),
						'ref_part'          =>	$this->input->post('referencenumber_5'),
						'hasil_part'        =>	$this->input->post('referencepart_5'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_5') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber5'),
						'ref_option'        =>	$this->input->post('referencepart_bulan5'),
						'ref_part'          =>	$this->input->post('referencenumber_5'),
						'hasil_part'        =>	$this->input->post('referencepart_5'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_5') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber5'),
						'ref_option'        =>	$this->input->post('referencepart_tahun5'),
						'ref_part'          =>	$this->input->post('referencenumber_5'),
						'hasil_part'        =>	$this->input->post('referencepart_5'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_5') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber5'),
						'ref_option'        =>	$this->input->post('referencepart_text5'),
						'ref_part'          =>	$this->input->post('referencenumber_5'),
						'hasil_part'        =>	$this->input->post('referencepart_5'),
					);

				$this->m->Update($where, $data, $table);
				}
			}
	}

	function adddetailreference6()
	{
			
			$data_ = array(
				'ref_number'              =>	6,
				'id_menu'    => $this->input->post('menu'),
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_6') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber6'),
					'ref_option'        =>	$this->input->post('referencepart_number6'),
					'ref_part'          =>	$this->input->post('referencenumber_6'),
					'hasil_part'        =>	$this->input->post('referencepart_6'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_6') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber6'),
						'ref_option'        =>	$this->input->post('referencepart_separator6'),
						'ref_part'          =>	$this->input->post('referencenumber_6'),
						'hasil_part'        =>	$this->input->post('referencepart_6'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_6') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber6'),
						'ref_option'        =>	$this->input->post('referencepart_bulan6'),
						'ref_part'          =>	$this->input->post('referencenumber_6'),
						'hasil_part'        =>	$this->input->post('referencepart_6'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_6') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber6'),
						'ref_option'        =>	$this->input->post('referencepart_tahun6'),
						'ref_part'          =>	$this->input->post('referencenumber_6'),
						'hasil_part'        =>	$this->input->post('referencepart_6'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_6') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber6'),
						'ref_option'        =>	$this->input->post('referencepart_text6'),
						'ref_part'          =>	$this->input->post('referencenumber_6'),
						'hasil_part'        =>	$this->input->post('referencepart_6'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 6,
					'id_menu'    => $this->input->post('menu'),
				);
				if ($this->input->post('referencenumber_6') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber6'),
					'ref_option'        =>	$this->input->post('referencepart_number6'),
					'ref_part'          =>	$this->input->post('referencenumber_6'),
					'hasil_part'        =>	$this->input->post('referencepart_6'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_6') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber6'),
						'ref_option'        =>	$this->input->post('referencepart_separator6'),
						'ref_part'          =>	$this->input->post('referencenumber_6'),
						'hasil_part'        =>	$this->input->post('referencepart_6'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_6') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber6'),
						'ref_option'        =>	$this->input->post('referencepart_bulan6'),
						'ref_part'          =>	$this->input->post('referencenumber_6'),
						'hasil_part'        =>	$this->input->post('referencepart_6'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_6') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber6'),
						'ref_option'        =>	$this->input->post('referencepart_tahun6'),
						'ref_part'          =>	$this->input->post('referencenumber_6'),
						'hasil_part'        =>	$this->input->post('referencepart_6'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_6') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber6'),
						'ref_option'        =>	$this->input->post('referencepart_text6'),
						'ref_part'          =>	$this->input->post('referencenumber_6'),
						'hasil_part'        =>	$this->input->post('referencepart_6'),
					);

				$this->m->Update($where, $data, $table);
				}
			}
	}


	function adddetailreference7()
	{
			
			$data_ = array(
				'ref_number'              =>	7,
				'id_menu'    => $this->input->post('menu'),
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_7') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber7'),
					'ref_option'        =>	$this->input->post('referencepart_number7'),
					'ref_part'          =>	$this->input->post('referencenumber_7'),
					'hasil_part'        =>	$this->input->post('referencepart_7'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_7') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber7'),
						'ref_option'        =>	$this->input->post('referencepart_separator7'),
						'ref_part'          =>	$this->input->post('referencenumber_7'),
						'hasil_part'        =>	$this->input->post('referencepart_7'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_7') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber7'),
						'ref_option'        =>	$this->input->post('referencepart_bulan7'),
						'ref_part'          =>	$this->input->post('referencenumber_7'),
						'hasil_part'        =>	$this->input->post('referencepart_7'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_7') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber7'),
						'ref_option'        =>	$this->input->post('referencepart_tahun7'),
						'ref_part'          =>	$this->input->post('referencenumber_7'),
						'hasil_part'        =>	$this->input->post('referencepart_7'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_7') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber7'),
						'ref_option'        =>	$this->input->post('referencepart_text7'),
						'ref_part'          =>	$this->input->post('referencenumber_7'),
						'hasil_part'        =>	$this->input->post('referencepart_7'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 7,
					'id_menu'    => $this->input->post('menu'),
				);
				if ($this->input->post('referencenumber_7') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber7'),
					'ref_option'        =>	$this->input->post('referencepart_number7'),
					'ref_part'          =>	$this->input->post('referencenumber_7'),
					'hasil_part'        =>	$this->input->post('referencepart_7'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_7') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber7'),
						'ref_option'        =>	$this->input->post('referencepart_separator7'),
						'ref_part'          =>	$this->input->post('referencenumber_7'),
						'hasil_part'        =>	$this->input->post('referencepart_7'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_7') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber7'),
						'ref_option'        =>	$this->input->post('referencepart_bulan7'),
						'ref_part'          =>	$this->input->post('referencenumber_7'),
						'hasil_part'        =>	$this->input->post('referencepart_7'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_7') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber7'),
						'ref_option'        =>	$this->input->post('referencepart_tahun7'),
						'ref_part'          =>	$this->input->post('referencenumber_7'),
						'hasil_part'        =>	$this->input->post('referencepart_7'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_7') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber7'),
						'ref_option'        =>	$this->input->post('referencepart_text7'),
						'ref_part'          =>	$this->input->post('referencenumber_7'),
						'hasil_part'        =>	$this->input->post('referencepart_7'),
					);

				$this->m->Update($where, $data, $table);
				}
			}
	}

	function adddetailreference8()
	{
			
			$data_ = array(
				'ref_number'              =>	8,
				'id_menu'    => $this->input->post('menu'),
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_8') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber8'),
					'ref_option'        =>	$this->input->post('referencepart_number8'),
					'ref_part'          =>	$this->input->post('referencenumber_8'),
					'hasil_part'        =>	$this->input->post('referencepart_8'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_8') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber8'),
						'ref_option'        =>	$this->input->post('referencepart_separator8'),
						'ref_part'          =>	$this->input->post('referencenumber_8'),
						'hasil_part'        =>	$this->input->post('referencepart_8'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_8') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber8'),
						'ref_option'        =>	$this->input->post('referencepart_bulan8'),
						'ref_part'          =>	$this->input->post('referencenumber_8'),
						'hasil_part'        =>	$this->input->post('referencepart_8'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_8') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber8'),
						'ref_option'        =>	$this->input->post('referencepart_tahun8'),
						'ref_part'          =>	$this->input->post('referencenumber_8'),
						'hasil_part'        =>	$this->input->post('referencepart_8'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_8') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber8'),
						'ref_option'        =>	$this->input->post('referencepart_text8'),
						'ref_part'          =>	$this->input->post('referencenumber_8'),
						'hasil_part'        =>	$this->input->post('referencepart_8'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 8,
					'id_menu'    => $this->input->post('menu'),
				);
				if ($this->input->post('referencenumber_8') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber8'),
					'ref_option'        =>	$this->input->post('referencepart_number8'),
					'ref_part'          =>	$this->input->post('referencenumber_8'),
					'hasil_part'        =>	$this->input->post('referencepart_8'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_8') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber8'),
						'ref_option'        =>	$this->input->post('referencepart_separator8'),
						'ref_part'          =>	$this->input->post('referencenumber_8'),
						'hasil_part'        =>	$this->input->post('referencepart_8'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_8') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber8'),
						'ref_option'        =>	$this->input->post('referencepart_bulan8'),
						'ref_part'          =>	$this->input->post('referencenumber_8'),
						'hasil_part'        =>	$this->input->post('referencepart_8'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_8') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber8'),
						'ref_option'        =>	$this->input->post('referencepart_tahun8'),
						'ref_part'          =>	$this->input->post('referencenumber_8'),
						'hasil_part'        =>	$this->input->post('referencepart_8'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_8') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber8'),
						'ref_option'        =>	$this->input->post('referencepart_text8'),
						'ref_part'          =>	$this->input->post('referencenumber_8'),
						'hasil_part'        =>	$this->input->post('referencepart_8'),
					);

				$this->m->Update($where, $data, $table);
				}
			}	
	}

	function adddetailreference9()
	{
			
			$data_ = array(
				'ref_number'              =>	9,
				'id_menu'    => $this->input->post('menu'),
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_9') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber9'),
					'ref_option'        =>	$this->input->post('referencepart_number9'),
					'ref_part'          =>	$this->input->post('referencenumber_9'),
					'hasil_part'        =>	$this->input->post('referencepart_9'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_9') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber9'),
						'ref_option'        =>	$this->input->post('referencepart_separator9'),
						'ref_part'          =>	$this->input->post('referencenumber_9'),
						'hasil_part'        =>	$this->input->post('referencepart_9'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_9') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber9'),
						'ref_option'        =>	$this->input->post('referencepart_bulan9'),
						'ref_part'          =>	$this->input->post('referencenumber_9'),
						'hasil_part'        =>	$this->input->post('referencepart_9'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_9') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber9'),
						'ref_option'        =>	$this->input->post('referencepart_tahun9'),
						'ref_part'          =>	$this->input->post('referencenumber_9'),
						'hasil_part'        =>	$this->input->post('referencepart_9'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_9') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber9'),
						'ref_option'        =>	$this->input->post('referencepart_text9'),
						'ref_part'          =>	$this->input->post('referencenumber_9'),
						'hasil_part'        =>	$this->input->post('referencepart_9'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 9,
					'id_menu'    => $this->input->post('menu'),
				);
				if ($this->input->post('referencenumber_9') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber9'),
					'ref_option'        =>	$this->input->post('referencepart_number9'),
					'ref_part'          =>	$this->input->post('referencenumber_9'),
					'hasil_part'        =>	$this->input->post('referencepart_9'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_9') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber9'),
						'ref_option'        =>	$this->input->post('referencepart_separator9'),
						'ref_part'          =>	$this->input->post('referencenumber_9'),
						'hasil_part'        =>	$this->input->post('referencepart_9'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_9') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber9'),
						'ref_option'        =>	$this->input->post('referencepart_bulan9'),
						'ref_part'          =>	$this->input->post('referencenumber_9'),
						'hasil_part'        =>	$this->input->post('referencepart_9'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_9') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber9'),
						'ref_option'        =>	$this->input->post('referencepart_tahun9'),
						'ref_part'          =>	$this->input->post('referencenumber_9'),
						'hasil_part'        =>	$this->input->post('referencepart_9'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_9') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber9'),
						'ref_option'        =>	$this->input->post('referencepart_text9'),
						'ref_part'          =>	$this->input->post('referencenumber_9'),
						'hasil_part'        =>	$this->input->post('referencepart_9'),
					);

				$this->m->Update($where, $data, $table);
				}
			}
	}


	function adddetailreference10()
	{
			
			$data_ = array(
				'ref_number'              =>	10,
				'id_menu'    => $this->input->post('menu'),
			);

			$result = $this->db->get_where('detail_reference', $data_);


			if ($result->num_rows()<1) {
				if ($this->input->post('referencenumber_10') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber10'),
					'ref_option'        =>	$this->input->post('referencepart_number10'),
					'ref_part'          =>	$this->input->post('referencenumber_10'),
					'hasil_part'        =>	$this->input->post('referencepart_10'),
				);

				$this->m->Save($data, 'detail_reference');
		
				}else if($this->input->post('referencenumber_10') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber10'),
						'ref_option'        =>	$this->input->post('referencepart_separator10'),
						'ref_part'          =>	$this->input->post('referencenumber_10'),
						'hasil_part'        =>	$this->input->post('referencepart_10'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_10') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber10'),
						'ref_option'        =>	$this->input->post('referencepart_bulan10'),
						'ref_part'          =>	$this->input->post('referencenumber_10'),
						'hasil_part'        =>	$this->input->post('referencepart_10'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_10') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber10'),
						'ref_option'        =>	$this->input->post('referencepart_tahun10'),
						'ref_part'          =>	$this->input->post('referencenumber_10'),
						'hasil_part'        =>	$this->input->post('referencepart_10'),
					);

					$this->m->Save($data, 'detail_reference');
				}else if($this->input->post('referencenumber_10') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber10'),
						'ref_option'        =>	$this->input->post('referencepart_text10'),
						'ref_part'          =>	$this->input->post('referencenumber_10'),
						'hasil_part'        =>	$this->input->post('referencepart_10'),
					);

					$this->m->Save($data, 'detail_reference');
				}
			}else{
				$table = 'detail_reference';
				$where = array(
					'ref_number'   => 10,
					'id_menu'    => $this->input->post('menu'),
				);
				if ($this->input->post('referencenumber_10') == "01") {
				$data = array(
					'id_menu'    => $this->input->post('menu'),
					'ref_number'        =>	$this->input->post('refnumber10'),
					'ref_option'        =>	$this->input->post('referencepart_number10'),
					'ref_part'          =>	$this->input->post('referencenumber_10'),
					'hasil_part'        =>	$this->input->post('referencepart_10'),
				);

				$this->m->Update($where, $data, $table);
		
				}else if($this->input->post('referencenumber_10') == "02"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber10'),
						'ref_option'        =>	$this->input->post('referencepart_separator10'),
						'ref_part'          =>	$this->input->post('referencenumber_10'),
						'hasil_part'        =>	$this->input->post('referencepart_10'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_10') == "03"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber10'),
						'ref_option'        =>	$this->input->post('referencepart_bulan10'),
						'ref_part'          =>	$this->input->post('referencenumber_10'),
						'hasil_part'        =>	$this->input->post('referencepart_10'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_10') == "04"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber10'),
						'ref_option'        =>	$this->input->post('referencepart_tahun10'),
						'ref_part'          =>	$this->input->post('referencenumber_10'),
						'hasil_part'        =>	$this->input->post('referencepart_10'),
					);

				$this->m->Update($where, $data, $table);
				}else if($this->input->post('referencenumber_10') == "05"){
					$data = array(
						'id_menu'    => $this->input->post('menu'),
						'ref_number'        =>	$this->input->post('refnumber10'),
						'ref_option'        =>	$this->input->post('referencepart_text10'),
						'ref_part'          =>	$this->input->post('referencenumber_10'),
						'hasil_part'        =>	$this->input->post('referencepart_10'),
					);

				$this->m->Update($where, $data, $table);
				}
			}
	}
	function deletereference()
	{
		$table = 'header_reference';
		$where = array(
			'id_menu'   => $this->input->post('id'),
		);
		$this->m->Delete($where, $table);

		$table = 'detail_reference';
		$where = array(
			'id_menu'   => $this->input->post('id'),
		);
		$this->m->Delete($where, $table);
		redirect("pengaturan");
	}
	function deletereferencepart1()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber1'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart2()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber2'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart3()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber3'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart4()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber4'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart5()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber5'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart6()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber6'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart7()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber7'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart8()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber8'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart9()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber9'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
	function deletereferencepart10()
	{
		$table = 'detail_reference';
		$where = array(
			'ref_number'   => $this->input->post('refnumber10'),
			'id_menu'    => $this->input->post('menu')
		);
		$this->m->Delete($where, $table);
	}
}