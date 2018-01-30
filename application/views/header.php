<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>QG - Souvenir</title>

	<?php $this->load->view('plugin/include_css') ?>

</head>

<body>
	<div class="brand clearfix">
		<a href="<?=base_url();?>index.php/Cadmin" class="logo"><img src="<?=base_url();?>assets/img/QG.png" class="img-responsive" alt=""  style="width:40px;height:40px;"></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#" style="width:400px;"><img src="<?=base_url();?>assets/img/user_icon.jpg" class="ts-avatar hidden-side" alt=""> <?= $this->session->userdata('email');?></a>
				<ul>
					<li><?=anchor('cadmin/tampilDataAdmin', 'Akun Saya', ['class'=>'fa fa-plug']);?></li>
					<li><?=anchor('cadmin/updatePasswordAdmin', 'Ubah Password', ['class'=>'fa fa-plug']);?></li>
					<li><?=anchor('login/logout', 'Keluar', ['class'=>'fa fa-plug']);?></li>
				</ul>
			</li>
		</ul>
	</div>
		<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label">Main Navigasi</li>
				<li><a href="#"><i class="fa fa-desktop"></i>Data Pendaftaran</a>
					<ul>
						
						<li><a href="<?=base_url();?>index.php/Cadmin/PendaftaranMember">Pendaftaran Member</a></li>
						<li><a href="<?=base_url();?>index.php/Cadmin/PendaftaranPenjual">Pendaftaran Penjual</a></li>
					</ul>
				</li>
				
				<li><a href="<?=base_url();?>index.php/Cadmin/tampilDataPemesanan"><i class="fa fa-desktop"></i>Data Pemesanan</a></li>
				<li><a href="<?=base_url();?>index.php/Cadmin/tampilDataPenjual"><i class="fa fa-desktop"></i> Data Penjual</a></li>
				<li><a href="#"><i class="fa fa-desktop"></i>Data Kategori</a>
					<ul>
						<li><a href="<?=base_url();?>index.php/Cadmin/insertDataKategori">Tambah Kategori</a></li>
						<li><a href="<?=base_url();?>index.php/Cadmin/tampilDataKategori">Tampil Kategori</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-desktop"></i>Data Sub Kategori</a>
					<ul>
						<li><a href="<?=base_url();?>index.php/Cadmin/insertDataSubKategori">Tambah Sub Kategori</a></li>
						<li><a href="<?=base_url();?>index.php/Cadmin/tampilDataSubKategori">Tampil Sub Kategori</a></li>
					</ul>
				</li>
				<li><a href="<?=base_url();?>index.php/Cadmin/tampilDataProduk"><i class="fa fa-desktop"></i> Data Produk</a></li>
				
				<li><a href="<?=base_url();?>index.php/Cadmin/tampilDataKoderatting"><i class="fa fa-desktop"></i>Data Ratting</a></li>
				<li><a href="<?=base_url();?>index.php/Cadmin/tampilDataMember"><i class="fa fa-desktop"></i> Data Member</a></li>
				<li><a href="<?=base_url();?>index.php/Login/logout"><i class="fa fa-desktop"></i>Keluar</a></li>
			</ul>
		</nav>
	</div>
	
	<?php $this->load->view('plugin/include_js') ?>

</body>
</html>

