<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
        cekuser();
    }
    //Ajax Menu Produk
    function get_category()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getCategory($postData);

	    echo json_encode($data);
	}
	function get_jenisgaransi()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getJenisGaransi($postData);

	    echo json_encode($data);
	}
	function get_tipeproduk()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getTipeProduk($postData);

	    echo json_encode($data);
	}
	function get_brand()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getBrand($postData);

	    echo json_encode($data);
	}
	function get_periodegaransi()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getPeriodeGaransi($postData);

	    echo json_encode($data);
	}
	function get_etalase()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getEtalase($postData);

	    echo json_encode($data);
	}
	function get_claimgaransi()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getClaimGaransi($postData);

	    echo json_encode($data);
	}
	function get_satuanbesar()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getSatuanBesar($postData);

	    echo json_encode($data);
	}
	function get_satuankecil()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getSatuanKecil($postData);

	    echo json_encode($data);
	}
	function get_kondisi()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getKondisi($postData);

	    echo json_encode($data);
	}
	function get_matauang()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getMataUang($postData);

	    echo json_encode($data);
	}

	//Ajax Menu Cashbank
	function get_akuncoasatu()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getAkunCoaSatu($postData);

	    echo json_encode($data);
	}
	function get_akuncoadua()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getAkunCoaDua($postData);

	    echo json_encode($data);
	}

	//Ajax Menu 2D Design
	function getdetaildiamond()
	{
		$select = $this->db->select('*');
		$select       = $this->db->join('tbl_parcel', 'tbl_parcel.id_parcel = tbl_2ddesainsubdetail.id_parcel');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->join('tbl_headsetting', 'tbl_headsetting.id_headsetting = tbl_2ddesainsubdetail.id_headsetting');
		$select = $this->db->where('tbl_2ddesainsubdetail.id_user',$this->session->userdata('id_user'));
		$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',0);
		$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
		$data   = $this->m->Get_All('2ddesainsubdetail', $select);

		echo json_encode($data);	
		
		
	}
	function getdetailproduk()
	{
		$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
		$select       = $this->db->join('tbl_masterproduk', 'tbl_masterproduk.id_produk = tbl_2ddesainkepala.id_barang');
		$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
		$select = $this->db->where('tbl_2ddesainkepala.id_user',$this->session->userdata('id_user'));
		$select = $this->db->where('tbl_2ddesainkepala.id_detail',0);
		$select = $this->db->where('tbl_2ddesainkepala.deleted', 0);
		$data   = $this->m->Get_All('2ddesainkepala', $select);


		echo json_encode($data);	
		
	}

		function getdetailproduk_edit()
	{
		$id_detail = $this->input->post("iddetail");

		$select = $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
		$select       = $this->db->join('tbl_masterproduk', 'tbl_masterproduk.id_produk = tbl_2ddesainkepala.id_barang');
		$select = $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		$select = $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		$select = $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		$select = $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		$select = $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		$select = $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		$select = $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		$select = $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		$select = $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		$select = $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		$select = $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
		$select = $this->db->where('tbl_2ddesainkepala.id_user',$this->session->userdata('id_user'));
		$select = $this->db->where('tbl_2ddesainkepala.id_detail',$id_detail);
		$select = $this->db->where('tbl_2ddesainkepala.deleted', 0);
		$data   = $this->m->Get_All('2ddesainkepala', $select);


		echo json_encode($data);	
		
	}

	function getdetaildiamond_edit()
	{
		
		$id_detail = $this->input->post("iddetail");

		$select = $this->db->select('*');
		$select       = $this->db->join('tbl_parcel', 'tbl_parcel.id_parcel = tbl_2ddesainsubdetail.id_parcel');
		$select = $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		$select = $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		$select = $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		$select = $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		$select = $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
		$select = $this->db->join('tbl_headsetting', 'tbl_headsetting.id_headsetting = tbl_2ddesainsubdetail.id_headsetting');
		$select = $this->db->where('tbl_2ddesainsubdetail.id_user',$this->session->userdata('id_user'));
		$select = $this->db->where('tbl_2ddesainsubdetail.id_detail',$id_detail);
		$select = $this->db->where('tbl_2ddesainsubdetail.deleted', 0);
		$data   = $this->m->Get_All('2ddesainsubdetail', $select);

		echo json_encode($data);	
	}

	function get_karyawan()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getKaryawan($postData);

	    echo json_encode($data);
	}
	
	function get_warnaproduk()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getWarnaProduk($postData);

	    echo json_encode($data);
	}
	

	function get_client()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getClient($postData);

	    echo json_encode($data);
	}
	 
	 function get_ongkos()
	{
		$idtipedesign = $this->input->post();
		$kesulitan = $this->input->post(); 
	    // get data
	    $data = $this->m->getOngkos($idtipedesign, $kesulitan);

	    echo json_encode($data);
	}
	
	function get_finishing()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getFinishing($postData);

	    echo json_encode($data);
	}
	function get_tipedesign()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getTipeDesign($postData);

	    echo json_encode($data);
	}
	function get_konsepkepala()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getKonsepKepala($postData);

	    echo json_encode($data);
	}
	function get_parcel()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getParcel($postData);

	    echo json_encode($data);
	}
	function get_material()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getMaterial($postData);

	    echo json_encode($data);
	}

	function get_kursmaterial()
	{
		$postData = $this->input->post();
		$tanggal  = $this->input->post();

	    // get data
	    $data = $this->m->getKursMaterial($postData, $tanggal);


	    echo json_encode($data);
	}
	function get_barang()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getBarang($postData);

	    echo json_encode($data);
	}

	//Ajax Menu SPK
	function get_desain()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->getDesain($postData);

	    echo json_encode($data);
	}

	//Ajax Menu Pengaturan
	function get_autonumbering2ddesign()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->autonumbering2ddesain($postData);


	    echo json_encode($data);
	}
	function get_autonumberingcashbank()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->autonumberingcashbank($postData);


	    echo json_encode($data);
	}

	function get_autonumberingspk()
	{
		$postData = $this->input->post();

	    // get data
	    $data = $this->m->autonumberingspk($postData);


	    echo json_encode($data);
	}
}