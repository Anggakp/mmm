<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CashBank extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }

    function listcashbank()
	{
		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);
		$data['title'] = 'PT.MMM | List Cash Bank';
		$select = $this->db->select('*, tbl_matauang.namamatauang as matauang');
		$select = $this->db->join('matauang', 'matauang.id_matauang = cashbankheader.id_matauang');
		$select = $this->db->order_by('nomor');
		$select = $this->db->where('tbl_cashbankheader.deleted', 0);
		$data['read'] = $this->m->Get_All('cashbankheader', $select);

		$role_id = $this->session->userdata('role_id');
		$menu = $this->uri->segment(1);

        $this->db->select('*');
        $this->db->where("url = '$menu' or url_1 = '$menu' or url_2 = '$menu' or url_3 = '$menu' or url_4 = '$menu'");
        $queryMenu = $this->db->get('user_menu')->row_array();

        $menu_id =$queryMenu['id'];

        $table = 'cashbankdetail';
		$where = array(
			'id_cashbankheader'		    =>	0
		);
		$this->m->Delete($where,$table);


		$table = 'cashbanklawan';
		$where = array(
			'id_cashbankheader'		    =>	0
		);

		$this->m->Delete($where,$table);
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
		$this->load->view('pages/cashbank/listcashbank',$data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer',$data);
	}
	function Createcashbank()
	{
		$this->form_validation->set_rules(
			'tanggaltransaksi',
			'tanggaltransaksi',
			'required|trim',
			[
				'required' => 'Field tanggal transaksi tidak boleh kosong'
			]
		);
		

		if ($this->form_validation->run() == false) {
			$role_id = $this->session->userdata('role_id');
			$nama = $this->session->userdata('nama');

			$table = 'user';
			$where=array(
				'id_user'		=>	$this->session->userdata('id_user')
			);

			$data['user'] = $this->m->Get_Where($where, $table);
			$data['title'] = 'PT.MMM | Tambah Data Cash Bank';


			// $data['id_penjualan'] = $this->m->kodepenjualan();

			$data1 = array(
				'ref_number' => 1,
				'id_menu' => 35
			);

			$data['cek1'] = $this->db->get_where('tbl_detail_reference', $data1);
			
			$data['number1'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 1,
				'id_menu' => 35
				])->row_array();
			
			

			$data2 = array(
				'ref_number' => 2,
				'id_menu' => 35
				);

			$data['cek2'] = $this->db->get_where('tbl_detail_reference', $data2);
			$data['number2'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 2,
				'id_menu' => 35
			])->row_array();

			$data3 = array(
				'ref_number' => 3,
				'id_menu' => 35
				);

			$data['cek3'] = $this->db->get_where('tbl_detail_reference', $data3);
			$data['number3'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 3,
				'id_menu' => 35
			])->row_array();

			$data4 = array(
				'ref_number' => 4,
				'id_menu' => 35
				);

			$data['cek4'] = $this->db->get_where('tbl_detail_reference', $data4);
			$data['number4'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 4,
				'id_menu' => 35
			])->row_array();

			$data5 = array(
				'ref_number' => 5,
				'id_menu' => 35
				);

			$data['cek5'] = $this->db->get_where('tbl_detail_reference', $data5);
			$data['number5'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 5,
				'id_menu' => 35
			])->row_array();

			$data6 = array(
				'ref_number' => 6,
				'id_menu' => 35
				);

			$data['cek6'] = $this->db->get_where('tbl_detail_reference', $data6);
			$data['number6'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 6,
				'id_menu' => 35
			])->row_array();

			$data7 = array(
				'ref_number' => 7,
				'id_menu' => 35
				);

			$data['cek7'] = $this->db->get_where('tbl_detail_reference', $data7);
			$data['number7'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 7,
				'id_menu' => 35
			])->row_array();

			$data8 = array(
				'ref_number' => 8,
				'id_menu' => 35
				);

			$data['cek8'] = $this->db->get_where('tbl_detail_reference', $data8);
			$data['number8'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 8,
				'id_menu' => 35
			])->row_array();
	 

			$data9 = array(
					'ref_number' => 9,
				'id_menu' => 35
				);

			$data['cek9'] = $this->db->get_where('tbl_detail_reference', $data9);

			$data['number9'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 9,
				'id_menu' => 35
			])->row_array();

			$data10 = array(
				'ref_number' => 10,
				'id_menu' => 35
				);

			$data['cek10'] = $this->db->get_where('tbl_detail_reference', $data10);

			$data['number10'] = $this->db->get_where('tbl_detail_reference', [
				'ref_number' => 10,
				'id_menu' => 35
			])->row_array();
 

			$datacek = array(
				'ref_part' => 01,
				'id_menu' => 35
				);
			$data['nomorreference'] = $this->db->get_where('tbl_detail_reference', [
				'ref_part' => 01,
				'id_menu' => 35
			])->row_array();

			$data_ = array(
				'ref_part' => 01,
				'id_menu' => 35
			);

			$data['datacek'] = $this->db->get_where('tbl_detail_reference', $data_);
			
			$data['nomor'] = $this->db->get_where('tbl_detail_reference', [
				'ref_part' => 01,
				'id_menu' => 35
				])->row_array();

			$select = $this->db->select('CAST(SUM(tbl_cashbankdetail.nilai) as DECIMAL(9,3)) + CAST(SUM(tbl_cashbanklawan.nilai) as DECIMAL(9,3)) as totalcashbankheader ');
			$select = $this->db->join('cashbankdetail', 'cashbankdetail.id_cashbankheader = cashbankheader.id_cashbankheader');
			$select = $this->db->join('cashbanklawan', 'cashbanklawan.id_cashbankheader = cashbankheader.id_cashbankheader');
			$select = $this->db->where('tbl_cashbankdetail.create_by', $nama);
			$select = $this->db->where('tbl_cashbanklawan.create_by', $nama);
			$select = $this->db->where('tbl_cashbankdetail.deleted', 0);
			$select = $this->db->where('tbl_cashbanklawan.deleted', 0);
			$select = $this->db->where('tbl_cashbankdetail.id_cashbankheader',0);
			$select = $this->db->where('tbl_cashbanklawan.id_cashbankheader',0);
			$data['totalcashbankheader'] = $this->m->Get_All('cashbankheader', $select);

			$select = $this->db->select('*, tbl_groupakun.groupakun');
			$select = $this->db->join('tbl_groupakun', 'tbl_groupakun.id_groupakun = tbl_coa.id_groupakun');
			$select = $this->db->order_by('kode asc');
			$select = $this->db->where('tbl_coa.deleted', 0);
			$select = $this->db->where('headerdetail', "D");
			$select = $this->db->where('groupakun', "CASH BANK");
			$data['coasat'] = $this->m->Get_All('coa', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('kode asc');
			$select = $this->db->where('tbl_coa.deleted', 0);
			$select = $this->db->where('headerdetail', "D");
			$data['coadua'] = $this->m->Get_All('coa', $select);

			$select       = $this->db->select('*, tbl_coa.namaakun, tbl_coa.akun');
			$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbankdetail.akun');
			$select       = $this->db->where('tbl_cashbankdetail.id_cashbankheader', 0);
			$select       = $this->db->where('cashbankdetail.create_by', $nama);
			$select       = $this->db->where('cashbankdetail.deleted', 0);
			$data['cashbankdetail'] = $this->m->Get_All('cashbankdetail', $select);

			$select       = $this->db->select('*, tbl_coa.namaakun, tbl_coa.akun');
			$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbanklawan.akun');
			$select       = $this->db->where('tbl_cashbanklawan.id_cashbankheader', 0);
			$select       = $this->db->where('cashbanklawan.create_by', $nama);
			$select       = $this->db->where('cashbanklawan.deleted', 0);
			$data['cashbanklawan'] = $this->m->Get_All('cashbanklawan', $select);

			$select       = $this->db->select('SUM(nilai) as totalnilai');
			$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbankdetail.akun');
			$select       = $this->db->where('tbl_cashbankdetail.id_cashbankheader', 0);
			$select       = $this->db->where('cashbankdetail.create_by', $nama);
			$select       = $this->db->where('cashbankdetail.deleted', 0);
			$data['totalcashbankdetail'] = $this->m->Get_All('cashbankdetail', $select);

			$select       = $this->db->select('SUM(nilai) as totalnilai');
			$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbanklawan.akun');
			$select       = $this->db->where('tbl_cashbanklawan.id_cashbankheader', 0);
			$select       = $this->db->where('cashbanklawan.create_by', $nama);
			$select       = $this->db->where('cashbanklawan.deleted', 0);
			$data['totalcashbanklawan'] = $this->m->Get_All('cashbanklawan', $select);

			$select = $this->db->select('*, tbl_matauang.kodematauang, tbl_matauang.namamatauang');
			$select = $this->db->join('tbl_matauang','tbl_matauang.id_matauang = tbl_kurs.id_matauang');
			$select = $this->db->order_by('tbl_kurs.tanggal desc');
			$select = $this->db->where('tbl_kurs.deleted', 0);
			$data['kurs'] = $this->m->Get_All('kurs', $select);

			$select = $this->db->select('*');
			$select = $this->db->order_by('subaccount asc');
			$select = $this->db->where('deleted', 0);
			$data['subaccount'] = $this->m->Get_All('client', $select);



			$data['id_cashbankheader'] = $this->m->id_cashbankheader();
			
			$data['nomorcashbank']             = $this->m->nomorcashbank();

			$this->load->view('templates_pimpinan/header', $data);
			$this->load->view('templates_pimpinan/sidebar', $data);
			$this->load->view('templates_pimpinan/navigation', $data);
			$this->load->view('pages/cashbank/createcashbank', $data);
			$this->load->view('templates_pimpinan/script');
			$this->load->view('templates_pimpinan/footer', $data);
		} 
		else {
			if ($this->input->post('total') == "0,00") {
				$this->session->set_flashdata('warning', 'Total tidak boleh 0');
				redirect('tambahdatacashbank');
			}elseif ($this->input->post('totalnilaicashbankdetail') != $this->input->post('totalnilaicashbanklawan')) {
				$this->session->set_flashdata('warning', 'Total debet kredit tidak sama');
				redirect('tambahdatacashbank');
			}elseif ($this->input->post('nomor') == "") {
				$this->session->set_flashdata('warning', 'Field nomor tidak boleh kosong');
				redirect('tambahdatacashbank');
			}
			else{
				$data = array(
					'id_cashbankheader'  =>	$this->input->post('id_cashbankheader'),
					'id_matauang'        =>	$this->input->post('idmatauang'),
					'nomor'              =>	$this->input->post('nomor'),
					'tanggal'            =>	$this->input->post('tanggaltransaksi'),
					'inout'              =>	$this->input->post('inout'),
					'typetransaksi'      =>	$this->input->post('typetransaksi'),
					'rate'               =>	$this->input->post('rate'),
					'subaccount'         =>	$this->input->post('subaccount'),
					'total'              =>	$this->input->post('total'),
					'memo'               =>	$this->input->post('memo'),
					'create_by'          =>	$this->session->userdata('nama'),
					'create_date'        =>	date("Y-m-d"),

				);

				$this->m->Save($data, 'cashbankheader');

				$table = 'cashbankdetail';
				$where = array(
					'id_cashbankheader'		=>	0,
					'nomor'					=>	2,
					'deleted'			    =>	0,
				);
				$data = array(
					'id_cashbankheader'		=>	$this->input->post('id_cashbankheader'),
					'nomor'       			=>	$this->input->post('nomor'),
				);
				$this->m->Update($where, $data, $table);

				$table = 'cashbanklawan';
				$where = array(
					'id_cashbankheader'		=>	0,
					'nomor'					=>	2,
					'deleted'			    =>	0,
				);
				$data = array(
					'id_cashbankheader'		=>	$this->input->post('id_cashbankheader'),
					'nomor'       			=>	$this->input->post('nomor'),
				);
				$this->m->Update($where, $data, $table);

				$originalString = $this->input->post('nomor_');
				$ambilkarakter = substr($originalString,-1);

				$table = 'detail_reference';
				$where = array(
					'id_menu'		        =>	35,
					'ref_part'		        =>	01,
				);
				$data = array(
					'hasil_part'		    =>	str_replace($ambilkarakter,$this->input->post('nomor_update'),$originalString),
				);
				$this->m->Update($where, $data, $table);

				$this->session->set_flashdata('success', 'Data Transaksi Cash Bank Berhasil Ditambah');
				redirect('listcashbank');

			}
		}
	}
	function editcashbank($id_cashbankheader)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Cash Bank Detail'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->order_by('kodematauang');
		$select = $this->db->where('deleted', 0);
		$data['matauang'] = $this->m->Get_All('matauang', $select);

		$select = $this->db->select('*, tbl_matauang.namamatauang as matauang, tbl_client.nama');
		$select = $this->db->join('matauang', 'matauang.id_matauang = cashbankheader.id_matauang');
		$select = $this->db->join('client', 'client.subaccount = cashbankheader.subaccount');
		$select = $this->db->order_by('nomor');
		$select = $this->db->where('tbl_cashbankheader.id_cashbankheader', $id_cashbankheader);
		$data['cashbankheader'] = $this->m->Get_All('cashbankheader', $select);

		$select = $this->db->select('CAST(SUM(tbl_cashbankdetail.nilai) as DECIMAL(9,3)) totalnilai1, CAST(SUM(tbl_cashbanklawan.nilai) as DECIMAL(9,3)) totalnilai2 ');
		$select = $this->db->join('cashbankdetail', 'cashbankdetail.id_cashbankheader = cashbankheader.id_cashbankheader');
		$select = $this->db->join('cashbanklawan', 'cashbanklawan.id_cashbankheader = cashbankheader.id_cashbankheader');
		$select = $this->db->where('tbl_cashbankheader.id_cashbankheader', $id_cashbankheader);
		$data['totalcashbankheader'] = $this->m->Get_All('cashbankheader', $select);

		$select       = $this->db->select('*, tbl_coa.namaakun, tbl_coa.akun');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbankdetail.akun');
		$select       = $this->db->where('tbl_cashbankdetail.id_cashbankheader', $id_cashbankheader);
		$select 	  = $this->db->where('tbl_cashbankdetail.deleted', 0);
		$data['cashbankdetail'] = $this->m->Get_All('cashbankdetail', $select);

		$select       = $this->db->select('*, tbl_coa.namaakun, tbl_coa.akun');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbanklawan.akun');
		$select       = $this->db->where('tbl_cashbanklawan.id_cashbankheader', $id_cashbankheader);
		$select 	  = $this->db->where('tbl_cashbanklawan.deleted', 0);
		$data['cashbanklawan'] = $this->m->Get_All('cashbanklawan', $select);

		$select       = $this->db->select('SUM(nilai) as totalnilai');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbankdetail.akun');
		$select       = $this->db->where('tbl_cashbankdetail.id_cashbankheader', $id_cashbankheader);
		$select       = $this->db->where('cashbankdetail.deleted', 0);
		$data['totalcashbankdetail'] = $this->m->Get_All('cashbankdetail', $select);

		$select       = $this->db->select('SUM(nilai) as totalnilai');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbanklawan.akun');
		$select       = $this->db->where('tbl_cashbanklawan.id_cashbankheader', $id_cashbankheader);
		$select       = $this->db->where('cashbanklawan.deleted', 0);
		$data['totalcashbanklawan'] = $this->m->Get_All('cashbanklawan', $select);

		$select = $this->db->select('*, tbl_matauang.kodematauang, tbl_matauang.namamatauang');
		$select = $this->db->join('tbl_matauang','tbl_matauang.id_matauang = tbl_kurs.id_matauang');
		$select = $this->db->order_by('tbl_kurs.tanggal desc');
		$select = $this->db->where('tbl_kurs.deleted', 0);
		$data['kurs'] = $this->m->Get_All('kurs', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('subaccount asc');
		$select = $this->db->where('deleted', 0);
		$data['subaccount'] = $this->m->Get_All('client', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/cashbank/updatecashbankheader', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatecashbankheader()
	{
		$id_cashbankheader = $this->input->post('idcashbankheader');

		if ($this->input->post('total') == "0") {
				$this->session->set_flashdata('warning', 'Total tidak boleh 0');
			$this->editcashbank($id_cashbankheader);
		}elseif ($this->input->post('totalnilaicashbankdetail') != $this->input->post('totalnilaicashbanklawan')) {
				$this->session->set_flashdata('warning', 'Total debet kredit tidak sama');
			$this->editcashbank($id_cashbankheader);
		}else{
			if ($this->input->post('typetransaksi') == "Reguler") {
				$table = 'cashbankheader';
				$where = array(
					'id_cashbankheader'		    =>	$this->input->post('idcashbankheader')
				);

					$data = array(
						'id_matauang'        =>	$this->input->post('idmatauang'),
						'nomor'              =>	$this->input->post('nomor'),
						'tanggal'            =>	$this->input->post('tanggaltransaksi'),
						'inout'              =>	$this->input->post('inout'),
						'typetransaksi'      =>	$this->input->post('typetransaksi'),
						'rate'               =>	$this->input->post('rate'),
						'subaccount'         =>	$this->input->post('subaccount'),
						'total'              =>	$this->input->post('total'),
						'memo'               =>	$this->input->post('memo'),
						'update_by'          =>	$this->session->userdata('nama'),
						'update_date'        =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);

				$table = 'cashbankdetail';
				$where = array(
					'id_cashbankheader'		    =>	$this->input->post('iddashbankheader')
				);

					$data = array(
						'update_by'         =>	$this->session->userdata('nama'),
						'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);

				$table = 'cashbanklawan';
				$where = array(
					'id_cashbankheader'		    =>	$this->input->post('iddashbankheader')
				);

					$data = array(
						'update_by'         =>	$this->session->userdata('nama'),
						'update_date'       =>	date("Y-m-d"),
				);
				$this->m->Update($where, $data, $table);

				
				$this->session->set_flashdata('success', 'Data cash bank header berhasil diubah');
				redirect('listcashbank');
				}else{
					$table = 'cashbankheader';
					$where = array(
						'id_cashbankheader'		    =>	$this->input->post('idcashbankheader')
					);

						$data = array(
							'id_matauang'        =>	$this->input->post('idmatauang'),
							'nomor'              =>	$this->input->post('nomor'),
							'tanggal'            =>	$this->input->post('tanggaltransaksi'),
							'inout'              =>	$this->input->post('inout'),
							'typetransaksi'      =>	$this->input->post('typetransaksi'),
							'rate'               =>	$this->input->post('rate'),
							'subaccount'         =>	$this->input->post('subaccount'),
							'total'              =>	$this->input->post('total'),
							'memo'               =>	$this->input->post('memo'),
							'update_by'          =>	$this->session->userdata('nama'),
							'update_date'        =>	date("Y-m-d"),
					);
					$this->m->Update($where, $data, $table);

					$table = 'cashbankdetail';
					$where = array(
						'id_cashbankheader'		    =>	$this->input->post('iddashbankheader')
					);

						$data = array(
							'update_by'         =>	$this->session->userdata('nama'),
							'update_date'       =>	date("Y-m-d"),
					);
					$this->m->Update($where, $data, $table);

					$table = 'cashbanklawan';
					$where = array(
						'id_cashbankheader'		    =>	$this->input->post('iddashbankheader')
					);

						$data = array(
							'update_by'         =>	$this->session->userdata('nama'),
							'update_date'       =>	date("Y-m-d"),
					);
					$this->m->Update($where, $data, $table);

					
					$this->session->set_flashdata('success', 'Data cash bank header berhasil diubah');
					redirect('listcashbank');
					}
				}
			
		
	}
	function deletecashbankheader()
	{
		$table = 'cashbankheader';
		$where = array(
			'id_cashbankheader'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		$table = 'cashbanklawan';
		$where = array(
			'id_cashbankheader'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		$table = 'cashbankdetail';
		$where = array(
			'id_cashbankheader'		    =>	$this->input->post('id')
		);

			$data = array(
				'deleted'           =>	1
		);
		$this->m->Update($where, $data, $table);

		

		$this->session->set_flashdata('success', 'Data cash bank berhasil dihapus');
		redirect('listcashbank');
	}

	function detailcashbankheader($id_cashbankheader)
	{

		$data = [
			'title' => 'PT.MMM | Detail Data Cash Bank'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select = $this->db->select('*');
		$select = $this->db->order_by('kodematauang');
		$select = $this->db->where('deleted', 0);
		$data['matauang'] = $this->m->Get_All('matauang', $select);

		$select = $this->db->select('*, tbl_matauang.namamatauang as matauang');
		$select = $this->db->join('matauang', 'matauang.id_matauang = cashbankheader.id_matauang');
		$select = $this->db->order_by('nomor');
		$select = $this->db->where('tbl_cashbankheader.id_cashbankheader', $id_cashbankheader);
		$data['cashbankheader'] = $this->m->Get_All('cashbankheader', $select);

		$select       = $this->db->select('*, tbl_coa.namaakun, tbl_coa.akun');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbankdetail.akun');
		$select       = $this->db->where('tbl_cashbankdetail.id_cashbankheader', $id_cashbankheader);
		$select 	  = $this->db->where('tbl_cashbankdetail.deleted', 0);
		$data['cashbankdetail'] = $this->m->Get_All('cashbankdetail', $select);

		$select       = $this->db->select('*, tbl_coa.namaakun, tbl_coa.akun');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbanklawan.akun');
		$select       = $this->db->where('tbl_cashbanklawan.id_cashbankheader', $id_cashbankheader);
		$select 	  = $this->db->where('tbl_cashbanklawan.deleted', 0);
		$data['cashbanklawan'] = $this->m->Get_All('cashbanklawan', $select);

		$select       = $this->db->select('sum(nilai) as totalnilai');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbankdetail.akun');
		$select       = $this->db->where('tbl_cashbankdetail.id_cashbankheader', $id_cashbankheader);
		$select 	  = $this->db->where('tbl_cashbankdetail.deleted', 0);
		$data['totalcashbankdetail'] = $this->m->Get_All('cashbankdetail', $select);

		$select       = $this->db->select('sum(nilai) as totalnilai');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbanklawan.akun');
		$select       = $this->db->where('tbl_cashbanklawan.id_cashbankheader', $id_cashbankheader);
		$select 	  = $this->db->where('tbl_cashbanklawan.deleted', 0);
		$data['totalcashbanklawan'] = $this->m->Get_All('cashbanklawan', $select);

		$select = $this->db->select('*, tbl_matauang.kodematauang, tbl_matauang.namamatauang');
		$select = $this->db->join('tbl_matauang','tbl_matauang.id_matauang = tbl_kurs.id_matauang');
		$select = $this->db->order_by('tbl_kurs.tanggal desc');
		$select = $this->db->where('tbl_kurs.deleted', 0);
		$data['kurs'] = $this->m->Get_All('kurs', $select);

		$select = $this->db->select('*');
		$select = $this->db->order_by('subaccount asc');
		$select = $this->db->where('deleted', 0);
		$data['subaccount'] = $this->m->Get_All('client', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/cashbank/detailcashbankheader', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}

	function addcashdetail()
	{
			$data = array(

				'id_cashbankheader'  =>	"0",
				'nomor'              =>	"2",
				'akun'               =>	$this->input->post('akun'),
				'keterangan'         =>	$this->input->post('keterangan'),
				'nilai     '         =>	str_replace('.', '', $this->input->post('nilai')),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),
			);

			$this->m->Save($data, 'cashbankdetail');

			$this->session->set_flashdata('success', 'Data cash bank detail berhasil ditambah');
			redirect('tambahdatacashbank');
	}
	function editdetailcashbank($id_cashbankdetail)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Cash Bank Detail'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select       = $this->db->select('*, tbl_coa.namaakun, tbl_coa.akun');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbankdetail.akun');
		$select       = $this->db->where('tbl_cashbankdetail.id_cashbankdetail', $id_cashbankdetail);
		$data['read'] = $this->m->Get_All('cashbankdetail', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/cashbank/updatedetailcashbank', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatedetailcashbank()
	{
		if ($this->input->post('idcashbankheader') == 0) {

			$table = 'cashbankdetail';
			$where = array(
				'id_cashbankdetail'		    =>	$this->input->post('idcashbankdetail'),
			);

				$data = array(
					'akun'              =>	$this->input->post('akun'),
					'keterangan'        =>	$this->input->post('keterangan'),
					'nilai'             =>	str_replace('.', '', $this->input->post('nilai')),
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
			);
			$this->m->Update($where, $data, $table);

			
			$this->session->set_flashdata('success', 'Detail cash bank berhasil diubah');
			redirect('tambahdatacashbank');

		}elseif ($this->input->post('idcashbankheader') != 0) {
			$id_cashbankheader = $this->input->post('idcashbankheader');


			$table = 'cashbankdetail';
			$where = array(
				'id_cashbankdetail'		    =>	$this->input->post('idcashbankdetail')
			);

				$data = array(
					'akun'              =>	$this->input->post('akun'),
					'keterangan'        =>	$this->input->post('keterangan'),
					'nilai'             =>	$this->input->post('nilai'),
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
			);
			$this->m->Update($where, $data, $table);

			
			$this->session->set_flashdata('success', 'Detail cash bank berhasil diubah');

			$this->editcashbank($id_cashbankheader);
		}
		
		
	}
	function deletecashbankdetail()
	{
		if ($this->input->post('id_cashbankheader') == "0") {
			$table = 'cashbankdetail';
			$where = array(
				'id_cashbankdetail'		    =>	$this->input->post('id_cashbankdetail')
			);

				$data = array(
					'deleted'           =>	1
			);
			$this->m->Update($where, $data, $table);

			

			$this->session->set_flashdata('success', 'Detail cash bank berhasil dihapus');
			redirect('tambahdatacashbank');
		}elseif($this->input->post('id_cashbankheader') != "0"){
			$id_cashbankheader = $this->input->post('id_cashbankheader');

			$table = 'cashbankdetail';
			$where = array(
				'id_cashbankdetail'		    =>	$this->input->post('id_cashbankdetail')
			);

				$data = array(
					'deleted'           =>	1
			);
			$this->m->Update($where, $data, $table);

			

			$this->session->set_flashdata('success', 'Detail cash bank berhasil dihapus');
			$this->editcashbank($id_cashbankheader);
		}
		
	}

	function addcashlawan()
	{
			$data = array(

				'id_cashbankheader'  =>	"0",
				'nomor'              =>	"2",
				'akun'               =>	$this->input->post('akun'),
				'keterangan'         =>	$this->input->post('keterangan'),
				'nilai     '         =>	str_replace('.', '', $this->input->post('nilai')),
				'deleted'           =>	0,
				'create_by'         =>	$this->session->userdata('nama'),
				'create_date'       =>	date("Y-m-d"),

			);

			$this->m->Save($data, 'cashbanklawan');

			$this->session->set_flashdata('success', 'Data cash bank lawan berhasil ditambah');
			redirect('tambahdatacashbank');
	}

	function editdetailcashbanklawan($id_cashbanklawan)
	{

		$data = [
			'title' => 'PT.MMM | Edit Data Cash Bank Detail'
		];
		$role_id = $this->session->userdata('role_id');

		$table = 'user';
		$where=array(
			'id_user'		=>	$this->session->userdata('id_user')
		);

		$data['user'] = $this->m->Get_Where($where, $table);

		$select       = $this->db->select('*, tbl_coa.namaakun, tbl_coa.akun');
		$select       = $this->db->join('tbl_coa', 'coa.akun = tbl_cashbanklawan.akun');
		$select       = $this->db->where('tbl_cashbanklawan.id_cashbanklawan', $id_cashbanklawan);
		$data['read'] = $this->m->Get_All('cashbanklawan', $select);


		$this->load->view('templates_pimpinan/header', $data);
		$this->load->view('templates_pimpinan/sidebar', $data);
		$this->load->view('templates_pimpinan/navigation', $data);
		$this->load->view('pages/cashbank/updatecashbanklawan', $data);
		$this->load->view('templates_pimpinan/script');
		$this->load->view('templates_pimpinan/footer', $data);
	}
	function updatedetailcashbanklawan()
	{
		if ($this->input->post('idcashbankheader') == 0) {
			$table = 'cashbanklawan';
			$where = array(
				'id_cashbanklawan'		    =>	$this->input->post('idcashbanklawan')
			);

				$data = array(
					// 'id_cashbanklawan'  =>	$this->input->post('idcashbanklawan'),
					'akun'              =>	$this->input->post('akun'),
					'keterangan'        =>	$this->input->post('keterangan'),
					'nilai     '        =>	str_replace('.', '', $this->input->post('nilai')),
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
			);
			$this->m->Update($where, $data, $table);

			
			$this->session->set_flashdata('success', 'Detail cash bank lawan berhasil diubah');
			redirect('tambahdatacashbank');
		}elseif ($this->input->post('idcashbankheader') != 0) {
			$id_cashbankheader = $this->input->post('idcashbankheader');


			$table = 'cashbanklawan';
			$where = array(
				'id_cashbanklawan'		    =>	$this->input->post('idcashbanklawan')
			);

				$data = array(
					'akun'              =>	$this->input->post('akun'),
					'keterangan'        =>	$this->input->post('keterangan'),
					'nilai'             =>	$this->input->post('nilai'),
					'update_by'         =>	$this->session->userdata('nama'),
					'update_date'       =>	date("Y-m-d"),
			);
			$this->m->Update($where, $data, $table);

			
			$this->session->set_flashdata('success', 'Detail cash bank lawan berhasil diubah ');

			$this->editcashbank($id_cashbankheader);
		}
		
		
	}
	function deletecashbanklawan()
	{
		if ($this->input->post('id_cashbankheader') == "0") {
			$table = 'cashbanklawan';
			$where = array(
				'id_cashbanklawan'		    =>	$this->input->post('id_cashbanklawan')
			);

				$data = array(
					'deleted'           =>	1
			);
			$this->m->Update($where, $data, $table);

			

			 $this->session->set_flashdata('success', 'Detail cash bank lawan berhasil dihapus');
			redirect('tambahdatacashbank');
		}elseif ($this->input->post('id_cashbankheader') != "0") {

			$id_cashbankheader = $this->input->post('id_cashbankheader');
			$table = 'cashbanklawan';
			$where = array(
				'id_cashbanklawan'		    =>	$this->input->post('id_cashbanklawan')
			);

				$data = array(
					'deleted'           =>	1
			);
			$this->m->Update($where, $data, $table);

			

			$this->session->set_flashdata('success', 'Detail cash bank lawan berhasil dihapus');
			$this->editcashbank($id_cashbankheader);
		}
		
	}
}