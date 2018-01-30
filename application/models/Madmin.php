<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}

	public function getuser($where){
		$query = $this->db->get_where('admin',$where);
		return $query;
	}

	public function findIdAdmin($id_admin){
		$query=$this->db->get_where('admin', array('id_admin'=>$id_admin));
		return $query->row();
	}

	public function updateDataAdmin($id_admin,$nama,$alamat){
		$this->db->query("UPDATE admin SET nama='$nama', alamat='$alamat' WHERE id_admin = '$id_admin' ");
	}

	public function updatePasswordAdmin($id_admin,$password_baru){
		$this->db->query("UPDATE admin SET password='$password_baru' WHERE id_admin = '$id_admin'");
	}
	
	public function getDataAdmin($where){
		$query = $this->db->query("select * from admin where id_admin = '$where'");
		if ($query->num_rows()>0) {return $query->result();} 
		else {return array();}
	}

	//Produk
	public function getAllProduk(){
		// $query = $this->db->query('select * from penjual '.$where);
		// $query = $this->db->get('produk');
		// if ($query->num_rows()>0) {return $query->result();} 
		// else {return array();}

		$this->db->select("*, kategori.nama AS 'kategori_nama',kategori_sub.nama AS 'kategori_sub_nama'");    
		$this->db->from('produk');
		$this->db->join('kategori_sub', 'produk.id_kategori_sub = kategori_sub.id_kategori_sub');
		$this->db->join('kategori', 'kategori_sub.id_kategori = kategori.id_kategori');
		$this->db->join('penjual', 'produk.id_penjual = penjual.id_penjual');
		$this->db->where('st_produk <>','0');
		$query = $this->db->get();

		if ($query->num_rows()>0) 
			{return $query->result();
		}else{
			return array();
		}
	}

	public function deleteDataProduk($id_produk){
		
		$query = $this->db->query("UPDATE produk SET st_produk='0' WHERE id_produk = '$id_produk' ");
	}

	public function jumlahProduk(){
		$query = $this ->db->count_all('produk');
		return $query;
	}


	//Penjual
	public function getAllPenjual(){
		$query = $this->db->query("SELECT * FROM penjual WHERE st_penjual='1'");
		if ($query->num_rows()>0) {return $query->result();} 
		else {return array();}
	}
	
	public function getAllPendaftaranPenjual(){
		$query = $this->db->query("SELECT * FROM penjual WHERE st_penjual='0'");
		
		if ($query->num_rows()>0) {return $query->result();} 
		else {return array();}
	}
	public function setPendaftaranPenjualSetujui($id_penjual){
		$query = $this->db->query("UPDATE penjual SET st_penjual = '1' WHERE id_penjual='$id_penjual'");
		
	}
	public function setPendaftaranPenjualTolak($id_penjual){
		$query = $this->db->query("UPDATE penjual SET st_penjual = '2' WHERE id_penjual ='$id_penjual'");
		
	}
	public function getEmailPenjual($id_penjual){
		 $query = $this->db->query("select email from penjual WHERE id_penjual = '$id_penjual' ");
		
		if ($query->num_rows()>0) {return $query->result_array();} 
		else {return array();}
	}

	public function deleteDataPenjual($id_penjual){
		$this->db->delete('penjual',array('id_penjual'=>$id_penjual));
	}

	public function jumlahPenjual(){
		$query = $this ->db->count_all('penjual');
		return $query;
	}


	//Member
	public function getAllMember(){
		 $query = $this->db->query("select * from member WHERE st_member = '1' ");
		
		if ($query->num_rows()>0) {return $query->result();} 
		else {return array();}
	}
	public function getAllPendaftaranMember(){
		$query = $this->db->query("select * from member WHERE st_member = '0' ");
		if ($query->num_rows()>0) {return $query->result();} 
		else {return array();}
	}
	
	public function setPendaftaranMemberSetujui($id_member){
		$query = $this->db->query("UPDATE member SET st_member = '1' WHERE id_member ='$id_member'");
		
	}
	public function setPendaftaranMemberTolak($id_member){
		$query = $this->db->query("UPDATE member SET st_member = '2' WHERE id_member ='$id_member'");
		
	}
	public function getEmailMember($id_member){
		 $query = $this->db->query("select email from member WHERE id_member = '$id_member' ");
		
		if ($query->num_rows()>0) {return $query->result_array();} 
		else {return array();}
	}

	public function deleteDataMember($id_member){
		$this->db->delete('member',array('id_member'=>$id_member));
	}

	public function jumlahMember(){
		$query = $this ->db->count_all('member');
		return $query;
	}

	//Pemesanan

	public function jumlahPemesanan(){
		$query = $this ->db->count_all('pemesanan');
		return $query;
	}

	public function jumlahApprovePemesanan(){
		$count=$this->db->query('SELECT COUNT(id_pemesanan) as id_pemesanan FROM pemesanan WHERE st_pemesanan = 1');
		return $count->row()->id_pemesanan;
	}

	public function jumlahRejectPemesanan(){
		$count=$this->db->query('SELECT COUNT(id_pemesanan) as id_pemesanan FROM pemesanan WHERE st_pemesanan = 2');
		return $count->row()->id_pemesanan;
	}

	public function getDataPemesanan(){
		$this->db->select('*');    
		$this->db->from('pemesanan');
		$this->db->join('produk', 'pemesanan.id_produk = produk.id_produk');
		$this->db->join('member', 'pemesanan.id_member = member.id_member');
		$this->db->join('rating', 'rating.id_pemesanan = pemesanan.id_pemesanan');
		$query = $this->db->get();

		if ($query->num_rows()>0) 
			{return $query->result();
		}else{
			return array();
		}
		// return $query->result_array();
	}

	//Ratting
	public function getdataRating(){
		$query = "SELECT *,		(SELECT sum(r.rating) FROM rating as r 
						

								INNER JOIN produk pr ON
								pr.id_produk = r.id_produk
								
								INNER JOIN penjual pn ON
								pn.id_penjual = pr.id_penjual

								WHERE pn.id_penjual = penjual.id_penjual
								) as total_ratting 
		FROM rating
		
		INNER JOIN produk ON
		produk.id_produk = rating.id_produk
		
		INNER JOIN penjual ON
		penjual.id_penjual = produk.id_penjual

		GROUP BY penjual.id_penjual
		";
		$query = $this->db->query($query);
		if ($query->num_rows()>0) {return $query->result();}
		else{return array();}
	}

	//Kategori
	public function updateIdPenjualKategori($id,$data){
		$this->db->update('kategori', $data, array('id_kategori'=>$id));
	}

	public function TambahKategori($tambah){
		$this->db->insert('kategori', $tambah);
		return $this->db->insert_id();
	}

	public function getDataKategori(){
		$this->db->select('*');    
		$this->db->from('kategori');
		$query = $this->db->get();

		if ($query->num_rows()>0) 
			{return $query->result();
		}else{
			return array();
		}
	}

	public function findIdKategori($id_kategori){
		$query=$this->db->get_where('kategori', array('id_kategori'=>$id_kategori));
		return $query->row();
	}

	public function updateDataKategori($id_kategori,$data){
		$this->db->update('kategori', $data, array('id_kategori'=>$id_kategori));
	}

	public function deleteDataKategori($id_kategori){
		$this->db->delete('kategori',array('id_kategori'=>$id_kategori));
	}


	//Sub Kategori

	public function TambahSubKategori($tambah){
		$this->db->insert('kategori_sub', $tambah);
		return $this->db->insert_id();
	}

	public function getDataSubKategori(){
		$this->db->select("*,kategori.nama AS 'kategori_nama',kategori_sub.nama AS 'kategori_sub_nama'");    
		$this->db->from('kategori_sub');
		$this->db->join('kategori', 'kategori_sub.id_kategori = kategori.id_kategori');
		$query = $this->db->get();
		if ($query->num_rows()>0) {return $query->result();}
		else{return array();}
	}

	public function getDataKategoriInsert(){
		$query = $this->db->query('select * from kategori');
		if ($query->num_rows()>0) {return $query->result();}
		else{return array();}
	}

	public function findIdSubKategori($id_kategori_sub){
		$query=$this->db->get_where('kategori_sub', array('id_kategori_sub'=>$id_kategori_sub));
		return $query->row();
	}

	public function updateDataSubKategori($id_kategori_sub,$data){
		$this->db->update('kategori_sub', $data, array('id_kategori_sub'=>$id_kategori_sub));
	}

	public function deleteDataSUbKategori($id_kategori_sub){
		$this->db->delete('kategori_sub',array('id_kategori_sub'=>$id_kategori_sub));
	}


}

/* End of file madmin.php */
/* Location: ./application/models/madmin.php */