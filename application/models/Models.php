<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models extends CI_Model
{
	public function Get_All($table, $select)
	{
		$select;
		$query = $this->db->get($table);
		return $query->result();
	}
	function getMaterial($postData)
	{
	    $response = array();
	  
	     $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
	      date_default_timezone_set('Asia/Jakarta');
		  $now = date('Y-m-d H:i:s');
	      $this->db->order_by('material');
	      $this->db->where('tbl_material.deleted', 0);
	      
	      
	      $records = $this->db->get('tbl_material')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_material,"label"=>$row->material, "labelsatuan"=>$row->satuan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getKursMaterial($postData, $tanggal)
	{
	    $response = array();
	  

	    $this->db->select('*');

	    if($postData['search'] and $tanggal['tanggaltransaksi']){
	 	
	      // Select record
	      date_default_timezone_set('Asia/Jakarta');
		  $now = date('Y-m-d H:i:s');
	      $this->db->where("tbl_kursmaterial.id_material like '%".$postData['search']."%'");
	  	  $this->db->where('tbl_kursmaterial.tanggal <=', $tanggal['tanggaltransaksi']);
	      $this->db->where('tbl_kursmaterial.deleted', 0);
	      $this->db->order_by('tbl_kursmaterial.tanggal desc');
	      $this->db->limit(1);
	      
	      $records = $this->db->get('tbl_kursmaterial')->result();

	      foreach($records as $row ){
	        $response[] = array("labelrate_"=>number_format($row->rate,0,',','.'),"labelrate"=>$row->rate, "labeltanggal"=>$row->tanggal );
	     
	      }
	 
	    }
	    
	    return $response;
	}
	function getOngkos($idtipedesign, $kesulitan)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($idtipedesign['idtipedesign'] and $kesulitan['kesulitan']){
	 
	      // Select record 

		  $this->db->join('tipedesign', 'tipedesign.id_tipe = ongkosrangka.id_tipe');
	      $this->db->where("tbl_ongkosrangka.id_tipe like '%".$idtipedesign['idtipedesign']."%'");
	      $this->db->where("filter like '%".$kesulitan['kesulitan']."%'"); 
	      $this->db->where("noro", "NO");
	      $this->db->where('tbl_ongkosrangka.deleted', 0);
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_ongkosrangka')->result();

	      foreach($records as $row ){
	        $response[] = array("labelidongkosrangka"=>$row->id_ongkosrangka, "labelharga"=>$row->ongkosrangka, "labelharga_"=>number_format($row->ongkosrangka,0,',','.'));
	      }
	 
	    }
	    
	    return $response;
	}
	public function autonumbering2ddesain($postData)
	{

		$this->db->select('RIGHT(tbl_2ddesainheader.id_header,'.$postData['search']. ')as id_header', FALSE);


		$this->db->where('tbl_2ddesainheader.deleted', 0);
		$this->db->order_by('tbl_2ddesainheader.id_header', 'DESC');
		$this->db->limit(1);
		$this->db->where('deleted', 0); 
		$query = $this->db->get('tbl_2ddesainheader');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id_header) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, $postData['search'], 0, STR_PAD_LEFT);
		$kodetampil = $batas;

	        $response[] = array("tampil"=>$kodetampil);
	     
	   
	      return $response;
	}
	public function autonumberingcashbank($postData)
	{

		$this->db->select('RIGHT(tbl_cashbankheader.nomor,' .$postData['search'].')as nomor', FALSE);
		$this->db->order_by('id_cashbankheader', 'DESC'); 
		$this->db->limit(1);
		$this->db->where('deleted', 0); 
		$query = $this->db->get('tbl_cashbankheader');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->nomor) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, $postData['search'], "0", STR_PAD_LEFT);
		$kodetampil = $batas; 

		 $response[] = array("tampil"=>$kodetampil);
	     
	   
	      return $response;
	}
	public function autonumberingspk($postData)
	{

		$this->db->select('RIGHT(tbl_spkheader.nomorspk,' .$postData['search'].')as nomor', FALSE);
		$this->db->order_by('id_spkheader', 'DESC'); 
		$this->db->limit(1);
		$this->db->where('deleted', 0); 
		$query = $this->db->get('tbl_spkheader');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->nomor) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, $postData['search'], "0", STR_PAD_LEFT);
		$kodetampil = $batas; 

		 $response[] = array("tampil"=>$kodetampil);
	     
	   
	      return $response;
	}
	function getWarnaProduk($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("warnaproduk like '%".$postData['search']."%'");
	      $this->db->where('tbl_warnaproduk.deleted', 0);
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_warnaproduk')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_warnaproduk,"label"=>$row->warnaproduk);
	      }
	 
	    }
	    
	    return $response;
	}
	function getCategory($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Category");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getParcel($postData)
	{
		
	   $response = array();
	  
	     $select = $this->db->select('*, tbl_diagroup.diagroup, tbl_diameter.id_diagroup, tbl_diameter.diameter_to, tbl_diameter.diameter_from, tbl_diameter.carat');

	    if($postData['search'] ){
	 
	      // Select record
			
		  $this->db->join('tbl_diameter', 'tbl_diameter.id_diameter = tbl_parcel.id_diameter');
		  $this->db->join('tbl_diagroup', 'tbl_diagroup.id_diagroup = tbl_diameter.id_diagroup');
		  $this->db->join('tbl_clarity', 'tbl_clarity.id_clarity = tbl_parcel.id_clarity');
		  $this->db->join('tbl_shape', 'tbl_shape.id_shape = tbl_parcel.id_shape');
		  $this->db->join('tbl_color', 'tbl_color.id_color = tbl_parcel.id_color');
	      $this->db->where("parcel like '%".$postData['search']."%'");
		  $this->db->where('tbl_parcel.deleted', 0);
		  $this->db->order_by('diagroup asc, parcel asc, diameter_from asc, diameter_to asc');
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_parcel')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_parcel,"label"=>$row->parcel,"labelclarity"=>$row->clarity,"labelshape"=>$row->shape,"labelshape"=>$row->shape,"labelcolor"=>$row->color,"labelharga"=>number_format($row->hargabeli,0,',','.'));
	      }
	 
	    }
	    
	    return $response;
	}
	function getBarang($postData)
	{
		
	   $response = array();
	  
	    
 	     $this->db->select('*, a.keterangan as tipeproduk, b.keterangan as brand, c.keterangan as category, d.keterangan as etalase, e.keterangan as jenisgaransi, f.keterangan as periodegaransi, g.keterangan as claimgaransi, h.keterangan as kondisi, i.keterangan as satuanbesar, j.keterangan as satuankecil');
	    if($postData['search'] ){
	 
	      // Select record
			
		
		  $this->db->join('tbl_masterid as a', 'a.id_masterid = tbl_masterproduk.id_tipeproduk');
		  $this->db->join('tbl_masterid as b', 'b.id_masterid = tbl_masterproduk.id_brand');
		  $this->db->join('tbl_masterid as c', 'c.id_masterid = tbl_masterproduk.id_category');
		  $this->db->join('tbl_masterid as d', 'd.id_masterid = tbl_masterproduk.id_etalase');
		  $this->db->join('tbl_masterid as e', 'e.id_masterid = tbl_masterproduk.id_jenisgaransi');
		  $this->db->join('tbl_masterid as f', 'f.id_masterid = tbl_masterproduk.id_periodegaransi');
		  $this->db->join('tbl_masterid as g', 'g.id_masterid = tbl_masterproduk.id_claimgaransi');
		  $this->db->join('tbl_masterid as h', 'h.id_masterid = tbl_masterproduk.id_kondisi');
		  $this->db->join('tbl_masterid as i', 'i.id_masterid = tbl_masterproduk.id_satuanbesar');
		  $this->db->join('tbl_masterid as j', 'j.id_masterid = tbl_masterproduk.id_satuankecil');
		  $this->db->join('tbl_matauang', 'tbl_matauang.id_matauang = tbl_masterproduk.id_matauang');
	      $this->db->where("namaproduk like '%".$postData['search']."%'");
		  $this->db->where('tbl_masterproduk.deleted', 0);
		  $this->db->order_by('namaproduk');
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterproduk')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_produk,"label"=>$row->namaproduk,"labeltipeproduk"=>$row->tipeproduk,"labelbrand"=>$row->brand,"labeletalase"=>$row->etalase,"labelkondisi"=>$row->kondisi,"labelharga"=>$row->hargabeli, "labelharga_"=>number_format($row->hargabeli,0,',','.'));
	      }
	 
	    }
	    
	    return $response;
	}
	function getJenisGaransi($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Jenis Garansi");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getBrand($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Brand");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getPeriodeGaransi($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Periode Garansi");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getEtalase($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Etalase");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getClaimGaransi($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Claim Garansi");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getSatuanBesar($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Satuan Besar");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getSatuanKecil($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Satuan Kecil");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getKondisi($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Kondisi");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getTipeProduk($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("keterangan like '%".$postData['search']."%'");
	      $this->db->where('tbl_masterid.deleted', 0);
	      $this->db->where('tbl_masterid.masterid', "Tipe Produk");
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_masterid')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_masterid,"label"=>$row->keterangan);
	      }
	 
	    }
	    
	    return $response;
	}
	function getClient($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record

	      $this->db->where("nama like '%".$postData['search']."%'");
	      $this->db->where('tbl_client.deleted', 0);
	      $this->db->order_by('nama');
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_client')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_client,"label"=>$row->nama);
	      }
	 
	    }
	    
	    return $response;
	}
	function getDesain($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');
	      $this->db->join('tbl_2ddesainheader', 'tbl_2ddesainheader.id_header = tbl_2ddesaindetail.id_header');

	    if($postData['search'] ){
	 
	      // Select record

	      $this->db->where("tbl_2ddesainheader.nomor like '%".$postData['search']."%'");
	      $this->db->where('tbl_2ddesaindetail.deleted', 0);
	      $this->db->order_by('tbl_2ddesainheader.nomor');
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_2ddesaindetail')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_detail,"label"=>$row->nomor);
	      }
	 
	    }
	    
	    return $response;
	}
	function getMataUang($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("kodematauang like '%".$postData['search']."%'");
	      $this->db->where('tbl_matauang.deleted', 0);
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_matauang')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_matauang,"label"=>$row->kodematauang);
	      }
	 
	    }
	    
	    return $response;
	}
	function getKaryawan($postData)
	{
		
	   $response = array();
	  
	     $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
	     $this->db->join('tbl_bagian', 'tbl_bagian.id_bagian = tbl_karyawan.id_bagian');
		 $this->db->order_by('nama');
		 $this->db->where('tbl_bagian.bagian', 'Designer 2D');
	     $this->db->where('tbl_karyawan.deleted', 0);
	     $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_karyawan')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_karyawan,"label"=>$row->nama);
	      }
	 
	    }
	    
	    return $response;
	}
	
	function getFinishing($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("finishing like '%".$postData['search']."%'");
	      $this->db->where('tbl_finishing.deleted', 0);
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_finishing')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_finishing,"label"=>$row->finishing);
	      }
	 
	    }
	    
	    return $response;
	}

	function getTipeDesign($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("tipedesign like '%".$postData['search']."%'");
	      $this->db->where('tbl_tipedesign.deleted', 0);
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_tipedesign')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_tipe,"label"=>$row->tipedesign);
	      }
	 
	    }
	    
	    return $response;
	}
	function getkonsepkepala($postData)
	{
		
	   $response = array();
	  
	      $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
			
		
	      $this->db->where("konsepkepala like '%".$postData['search']."%'");
	      $this->db->where('tbl_konsepkepala.deleted', 0);
	      $this->db->limit(5);
	      
	      $records = $this->db->get('tbl_konsepkepala')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->id_konsepkepala,"label"=>$row->konsepkepala);
	      }
	 
	    }
	    
	    return $response;
	}
	function getAkunCoaSatu($postData)
	{
		
	    $response = array();
	  
	    $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
	      $this->db->join('tbl_groupakun', 'tbl_groupakun.id_groupakun = tbl_coa.id_groupakun');
	      $this->db->where("akun like '%".$postData['search']."%'");
	      $this->db->where('groupakun', "CASH BANK");
	      $this->db->where('tbl_coa.deleted', 0);
	      $this->db->where('headerdetail', "D");
	      
	      $records = $this->db->get('tbl_coa')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->namaakun,"label"=>$row->akun);
	      }
	 
	    }
	    
	    return $response;
	}
	function getAkunCoaDua($postData)
	{
		
	    $response = array();
	  
	    $this->db->select('*');

	    if($postData['search'] ){
	 
	      // Select record
	      $this->db->join('tbl_groupakun', 'tbl_groupakun.id_groupakun = tbl_coa.id_groupakun');
	      $this->db->where("akun like '%".$postData['search']."%'");
	      $this->db->where('tbl_coa.deleted', 0);
		  $this->db->where('headerdetail', "D");
	      
	      $records = $this->db->get('tbl_coa')->result();

	      foreach($records as $row ){
	        $response[] = array("value"=>$row->namaakun,"label"=>$row->akun);
	      }
	 
	    }
	    
	    return $response;
	}
	public function Get_Where($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->row();
	}
	function Save($data, $table)
	{
		$result = $this->db->insert($table, $data);
		return $result;
	}
	function Update($where, $data, $table)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	function Update_All($data, $table)
	{
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	function Delete($where, $table)
	{
		$result = $this->db->delete($table, $where);
		return $result;
	}

	function Delete_Relasi()
	{
		
	     $query = "DELETE a.*, b.*, c.* FROM tbl_2ddesaindetail a , tbl_2ddesainsubdetail b, tbl_2ddesainkepala c where a.id_detail = b.id_detail and a.id_detail = c.id_detail and a.id_header = 0";
        return $this->db->query($query);
	}
	function Delete_All($table)
	{
		$result = $this->db->delete($table);
		return $result;
	}
	public function Masuk($username, $userpass)
	{
		$this->db->select('*');
		$this->db->from('user');

		$this->db->where('id', $username);
		$this->db->where('password', $userpass);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function get_by_id($id, $table)
	{
		$this->db->from($table);
		$this->db->where('id_penjualan', $id);
		$query = $this->db->get();

		return $query->row();
	}
	public function levelotomatis($kode)
	{

		$this->db->select('RIGHT(tbl_coa.level,1)as level', FALSE);
		$this->db->order_by('id_coa', 'desc');
		$this->db->where('headerdetail', 'H');
		$this->db->where('kode', $kode);
		$this->db->limit(1);
		$query = $this->db->get('tbl_coa');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->level) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, "0", STR_PAD_LEFT);
		$kodetampil = $batas;
		return $kodetampil;
	}
	
	public function id_headerreferance()
	{

		$this->db->select('RIGHT(tbl_header_reference.id_header,1)as id_header', FALSE);
		$this->db->order_by('id_header', 'desc');
		
		$this->db->limit(1);
		$query = $this->db->get('tbl_header_reference');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id_header) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, "0", STR_PAD_LEFT);
		$kodetampil = $batas;
		return $kodetampil;
	}

	public function id_cashbankheader()
	{

		$this->db->select('RIGHT(tbl_cashbankheader.id_cashbankheader,1)as id_cashbankheader', FALSE);
		$this->db->order_by('id_cashbankheader', 'desc');
		
		$this->db->limit(1);
		$query = $this->db->get('tbl_cashbankheader');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id_cashbankheader) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, "0", STR_PAD_LEFT);
		$kodetampil = $batas;
		return $kodetampil;
	}
	


	public function id_spkheader()
	{

		$this->db->select('RIGHT(tbl_spkheader.id_spkheader,1)as id_spkheader', FALSE);
		$this->db->order_by('id_spkheader', 'desc');
		
		$this->db->limit(1);
		$query = $this->db->get('tbl_spkheader');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id_spkheader) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, "0", STR_PAD_LEFT);
		$kodetampil = $batas;
		return $kodetampil;
	}
	
	public function id_header()
	{

		$this->db->select('RIGHT(tbl_2ddesainheader.id_header,1)as id_header', FALSE);
		$this->db->order_by('id_header', 'desc');
		
		$this->db->limit(1);
		$query = $this->db->get('tbl_2ddesainheader');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id_header) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, "0", STR_PAD_LEFT);
		$kodetampil = $batas;
		return $kodetampil;
	}
	public function id_detail()
	{

		$this->db->select('RIGHT(tbl_2ddesaindetail.id_detail,1)as id_detail', FALSE);
		$this->db->order_by('id_detail', 'desc');
		
		$this->db->limit(1);
		$query = $this->db->get('tbl_2ddesaindetail');
			if ($query->num_rows() <> 0) {
				$data = $query->row();
				$kode = intval($data->id_detail) + 1;
			}
			else{
				$kode = 1;
			}
		$batas = str_pad($kode, "0", STR_PAD_LEFT);
		$kodetampil = $batas;
		return $kodetampil;
	}
	public function nomorspk()
	{
		$data = array(
				'deleted'              =>	0,
			);

		$result = $this->db->get_where('tbl_spkheader', $data);

		if ($result->num_rows()<1) {
			$this->db->select_max('tbl_header_reference.id_header'); 
			$this->db->order_by('id_header', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('tbl_header_reference');
				if ($query->num_rows() <> 0) {
					$data = $query->row();
					$kode = intval($data->id_header) + 1;
				}
				else{
					$kode = 1;
				}
				
			$batas = $batas = str_pad($kode, STR_PAD_LEFT);
			$kodetampil = $batas;
			return $kodetampil;
		}else{
			$this->db->select_max('tbl_spkheader.id_spkheader'); 
			$this->db->order_by('id_spkheader', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('tbl_spkheader');
				if ($query->num_rows() <> 0) {
					$data = $query->row();
					$kode = intval($data->id_spkheader) + 2;
				}
				else{
					$kode = 1;
				}
				
			$batas = $batas = str_pad($kode, STR_PAD_LEFT);
			$kodetampil = $batas;
			return $kodetampil;
		}
	}

	public function nomor2ddesain()
	{
		$data = array(
				'deleted'              =>	0,
			);

		$result = $this->db->get_where('tbl_2ddesainheader', $data);

		if ($result->num_rows()<1) {
			$this->db->select_max('tbl_header_reference.id_header'); 
			$this->db->order_by('id_header', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('tbl_header_reference');
				if ($query->num_rows() <> 0) {
					$data = $query->row();
					$kode = intval($data->id_header) + 1;
				}
				else{
					$kode = 1;
				}
				
			$batas = $batas = str_pad($kode, STR_PAD_LEFT);
			$kodetampil = $batas;
			return $kodetampil;
		}else{
			$this->db->select_max('tbl_2ddesainheader.id_header'); 
			$this->db->order_by('id_header', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('tbl_2ddesainheader');
				if ($query->num_rows() <> 0) {
					$data = $query->row();
					$kode = intval($data->id_header) + 2;
				}
				else{
					$kode = 1;
				}
				
			$batas = $batas = str_pad($kode, STR_PAD_LEFT);
			$kodetampil = $batas;
			return $kodetampil;
		}
	}

	public function nomorcashbank()
	{
		$data = array(
				'deleted'              =>	0,
			);

		$result = $this->db->get_where('tbl_cashbankheader', $data);

		if ($result->num_rows()<1) {
			$this->db->select_max('tbl_header_reference.id_header'); 
			$this->db->order_by('id_header', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('tbl_header_reference');
				if ($query->num_rows() <> 0) {
					$data = $query->row();
					$kode = intval($data->id_header) + 1;
				}
				else{
					$kode = 1;
				}
				
			$batas = $batas = str_pad($kode, STR_PAD_LEFT);
			$kodetampil = $batas;
			return $kodetampil;
		}else{
			$this->db->select_max('tbl_cashbankheader.id_cashbankheader'); 
			$this->db->order_by('id_cashbankheader', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('tbl_cashbankheader');
				if ($query->num_rows() <> 0) {
					$data = $query->row();
					$kode = intval($data->id_cashbankheader) + 2;
				}
				else{
					$kode = 1;
				}
				
			$batas = $batas = str_pad($kode, STR_PAD_LEFT);
			$kodetampil = $batas;
			return $kodetampil;
		}

		
	}


	public function get_by_tanggal($dari, $sampai, $table1)
	{
		$this->db->from($table1);
		$this->db->where('tgl_ayamhilang BETWEEN "' . date('Y-m-d', strtotime($dari)) . '" and "' . date('Y-m-d', strtotime($sampai)) . '"');
		$query = $this->db->get();
		return $query->result();
	}
		public function checking($kode)
	{
		

		// $this->db->select('*');
		// $this->db->from('');
		// echo $this->db->count_all_results();

		// echo $this->db-> count_all_results ( 'tbl_coa' );   // Menghasilkan bilangan bulat, seperti 25 
		$this->db->where('kode', $kode);
		$this->db->where('headerdetail', "D");
		$this->db->where('deleted', 0);
		$hasil = $this->db->count_all_results('tbl_coa');
		return $hasil;
	}
}
