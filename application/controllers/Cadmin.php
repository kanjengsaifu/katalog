<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Madmin');

		if($this->session->userdata('status') != 'login'){            
			redirect('login','refresh');
		}
	}

	public function index(){
		$this->tampilDataPemesanan();
	}

	public function Dashboard(){
		$data['title'] = "Dashboard";
		$this->load->view('header');
		$this->load->view('dashboard',$data);
	}





	public function tampilDataAdmin(){       
		$data['title'] = "Profil";
		$data['action'] = 'tampil';
		$id_admin= $this->session->userdata('id_admin');
		$data['admin']= $this->Madmin->getDataAdmin($id_admin);
		
		$this->load->view('header');
		$this->load->view('vtampil_admin',$data);
			
	}

	public function updateDataAdmin(){
	
		$id_admin= $this->session->userdata('id_admin');
		
		if ($this->input->post()) {
			$nama =$this->input->post('nama');
			$alamat =$this->input->post('alamat');
			$this->Madmin->updateDataAdmin($id_admin,$nama,$alamat);
			redirect('cadmin/tampilDataAdmin');
		}
		
		$data['admin']= $this->Madmin->getDataAdmin($id_admin);
		
		$this->load->view('header');
		$this->load->view('vupdate_admin', $data);
	}
	
	
	public function updatePasswordAdmin(){
		
		$id_admin= $this->session->userdata('id_admin');
		
		
		

		
		if ($this->input->post()) {
			$password_lama_param = $this->input->post('password_lama');
			$password_baru_param = $this->input->post('password_baru');
			$ulangi_password_param = $this->input->post('ulangi_password');
			
			
			$data_admin = $this->Madmin->findIdAdmin($id_admin);
			$password_lama = $data_admin->password;
			
			if($password_baru_param == $ulangi_password_param){
				if(md5($password_lama_param) == $password_lama){
					$this->Madmin->updatePasswordAdmin($id_admin,md5($password_baru_param));
					echo "<script>alert('Password berhasil di ganti.');</script>";
				}else{
					echo "<script>alert('Password lama anda salah.');</script>";
				}
			}else{
				echo "<script>alert('Password baru dan ulangi password tidak sama.');</script>";
			}
			
			
		}
		
		$this->load->view('header');
		$this->load->view('vupdate_admin_password');
	}



	//Produk
	public function tampilDataProduk(){
		$data['produk']= $this->Madmin->getAllProduk();
		$this->load->view('header');
		$this->load->view('vtampil_produk',$data);
	}

	public function deleteDataProduk($id_produk){
		$this->Madmin->deleteDataProduk($id_produk);
		redirect('cadmin/tampilDataProduk','refresh');
	}

	//Penjual
	public function tampilDataPenjual(){
		$data['penjual']= $this->Madmin->getAllPenjual();
		$this->load->view('header');
		$this->load->view('vtampil_penjual',$data);
	}

	public function deleteDataPenjual($id_penjual){
		$this->Madmin->deleteDataPenjual($id_penjual);
		redirect('cadmin/tampilDataPenjual','refresh');
	}
		
	public function pendaftaranPenjual(){
		$data['penjual']= $this->Madmin->getAllPendaftaranPenjual();
		$this->load->view('header');
		$this->load->view('vpendaftaran_penjual',$data);
	}
	public function pendaftaranPenjualSetujui($id_penjual){
		$this->Madmin->setPendaftaranPenjualSetujui($id_penjual);
		$member = $this->Madmin->getEmailPenjual($id_penjual);
		$email = $member[0]['email'];
		
		$subject = "Konfirmasi Pendaftaran [Penjual]";
		$body= "<p>Hai ," . $email ."<br>";
		$body.= "Akun anda telah aktif, silahkan login"."<br>";
		$body.= "Terimakasih</p>";
		$this->sendEmail($email,$subject,$body);
		redirect('cadmin/pendaftaranPenjual','refresh');
	}
	public function pendaftaranPenjualTolak($id_penjual){
		$this->Madmin->setPendaftaranPenjualTolak($id_penjual);
		
		$member = $this->Madmin->getEmailPenjual($id_penjual);
		$email = $member[0]['email'];
		
		$subject = "Konfirmasi Pendaftaran [Penjual]";
		$body= "<p>Hai ," . $email ."<br>";
		$body.= "Maaf kami tidak bisa mengaktifkan akun anda."."<br>";
		$body.= "Terimakasih</p>";
		$this->sendEmail($email,$subject,$body);
		
		redirect('cadmin/pendaftaranPenjual','refresh');
		
	
	}
	

	//Member
	public function tampilDataMember(){
		$data['member']= $this->Madmin->getAllMember();
		$this->load->view('header');
		$this->load->view('vtampil_member',$data);
	}
	
	public function pendaftaranMember(){
		$data['member']= $this->Madmin->getAllPendaftaranMember();
		$this->load->view('header');
		$this->load->view('vpendaftaran_member',$data);
	}

	public function pendaftaranMemberSetujui($id_member){
		$this->Madmin->setPendaftaranMemberSetujui($id_member);
		$member = $this->Madmin->getEmailMember($id_member);
		$email = $member[0]['email'];
		
		$subject = "Konfirmasi Pendaftaran [Member]";
		$body= "<p>Hai ," . $email ."<br>";
		$body.= "Akun anda telah aktif, silahkan login"."<br>";
		$body.= "Terimakasih</p>";
		$this->sendEmail($email,$subject,$body);
		redirect('cadmin/pendaftaranMember','refresh');
	}
	public function pendaftaranMemberTolak($id_member){
		$this->Madmin->setPendaftaranMemberTolak($id_member);
		
		$member = $this->Madmin->getEmailMember($id_member);
		$email = $member[0]['email'];
		
		$subject = "Konfirmasi Pendaftaran [Member]";
		$body= "<p>Hai ," . $email ."<br>";
		$body.= "Maaf kami tidak bisa mengaktifkan akun anda."."<br>";
		$body.= "Terimakasih</p>";
		$this->sendEmail($email,$subject,$body);
		redirect('cadmin/pendaftaranMember','refresh');
		
		
		
	
	}

	public function deleteDataMember($id_member){
		$this->Madmin->deleteDataMember($id_member);
		redirect('cadmin/tampilDataMember','refresh');
	}

	//Pemesanan
	public function tampilDataPemesanan(){

		$data['pemesanan']= $this->Madmin->getDataPemesanan();

		$this->load->view('header');
		$this->load->view('vtampil_pemesanan',$data);
	}

	//Ratting
	public function tampilDataKoderatting(){
		$data['ratting']= $this->Madmin->getdataRating();
		
		$this->load->view('header');
		$this->load->view('vtampil_kodeRatting',$data);
	}

	//Kategori
	public function insertDataKategori(){
			
		$post = $this->input->post();
		if ($post) {
			$this->Madmin->TambahKategori($post);
			redirect('cadmin/tampilDataKategori','refresh');
		}
		
		$this->load->view('header');
		$this->load->view('vinsert_kategori');
	}

	public function tampilDataKategori(){
		$data['kategori']= $this->Madmin->getDataKategori();
		$this->load->view('header');
		$this->load->view('vtampil_kategori',$data);
	}

	public function updateDataKategori($id_kategori){
		$data['value']=$this->Madmin->findIdKategori($id_kategori);
		$update=$this->input->post();
		if ($update) {
			$this->Madmin->updateDataKategori($id_kategori,$update);
			redirect('cadmin/tampilDataKategori');
		}
		$this->load->view('header');
		$this->load->view('vupdate_kategori', $data);
	}

	public function deleteDataKategori($id_kategori){
		$this->Madmin->deleteDataKategori($id_kategori);
		redirect('cadmin/tampilDataKategori','refresh');
	}

	//Sub Kategori
	public function updateIdKategoriSubKategori($id){
		$id_penjual = $this->session->userdata('id');
		$data_insert['id_penjual'] = $id_penjual;
		if ($data_insert) {
			$this->Mproduk->updateIdPenjualSubKategori($id,$data_insert);
			redirect('cproduk/tampilDataSubKategori','refresh');
		}
	}

	public function insertDataSubKategori(){	
		$post = $this->input->post();
		if ($post) {
			$this->Madmin->TambahSubKategori($post);
			redirect('cadmin/tampilDataSubKategori','refresh');
		}
		$data['kategori']= $this->Madmin->getDataKategoriInsert();
		// print_r($data);
		$this->load->view('header');
		$this->load->view('vinsert_sub_kategori',$data);
	}

	public function tampilDataSubKategori(){
		$data['sub_kategori']= $this->Madmin->getDataSubKategori();
		$this->load->view('header');
		$this->load->view('vtampil_sub_kategori',$data);

		// print_r($data);
	}

	public function updateDataSubKategori($id_kategori_sub){
		$data['value']=$this->Madmin->findIdSubKategori($id_kategori_sub);
		$update=$this->input->post();
		if ($update) {
			$this->Madmin->updateDataSubKategori($id_kategori_sub,$update);
			redirect('cadmin/tampilDataSubKategori');
		}
		$data['kategori']= $this->Madmin->getDataKategoriInsert();
		$this->load->view('header');
		$this->load->view('vupdate_sub_kategori', $data);
	}

	public function deleteDataSubKategori($id_kategori_sub){
		$this->Madmin->deleteDataSubKategori($id_kategori_sub);
		redirect('cadmin/tampilDataSubKategori','refresh');
	}
	
	public function sendEmail($email,$judul,$body){
		
		$to = $email;
		$subject = $judul;
		
		$message = "
		<html>
		<head>
		<title>QGSouvenir Bandung</title>
		</head>
		<body>
		$body
		</body>
		</html>
		";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <qgsouvenir@qgsouvenir.com>' . "\r\n";
		$headers .= 'Cc: qgsouvenir@qgsouvenir.com' . "\r\n";
		
		mail($to,$subject,$message,$headers);
	}

}

/* End of file cadmin.php */
/* Location: ./application/controllers/cadmin.php */