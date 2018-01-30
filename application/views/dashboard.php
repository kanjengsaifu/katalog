<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Dashboard</title>
</head>

<body>

<div class="login-page bk-img" style="background-image: url(<?=base_url();?>assets/img/dashboard.jpg);">
	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title" textcolor="1">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h4 "><?php echo $this->session->userdata('email'); ?></div>
													<div class="stat-panel-title text-uppercase">Admin</div>
												</div>
											</div>
											<a href="<?=base_url();?>index.php/Cadmin/tampilDataAdmin" class="block-anchor panel-footer text-center">Data Admin &nbsp;<i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php 
													echo $this->Madmin->jumlahMember(); ?></div>
													<div class="stat-panel-title text-uppercase">User</div>
												</div>
											</div>
											<a href="<?=base_url();?>index.php/Cadmin/tampilDataMember" class="block-anchor panel-footer text-center">Data User &nbsp;<i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php 
													echo $this->Madmin->jumlahProduk(); ?></div>
													<div class="stat-panel-title text-uppercase">Produk</div>
												</div>
											</div>
											<a href="<?=base_url();?>index.php/Cadmin/tampilDataProduk" class="block-anchor panel-footer text-center">Data Produk &nbsp;<i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php 
													echo $this->Madmin->jumlahPenjual(); ?></div>
													<div class="stat-panel-title text-uppercase">Penjual</div>
												</div>
											</div>
											<a href="<?=base_url();?>index.php/Cadmin/tampilDataPenjual" class="block-anchor panel-footer text-center">Data Penjual &nbsp;<i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php 
													echo $this->Madmin->jumlahPemesanan(); ?></div>
													<div class="stat-panel-title text-uppercase">Total Pemesanan</div>
												</div>
											</div>
											<a href="<?=base_url();?>index.php/Cadmin/tampilDataPemesanan" class="block-anchor panel-footer text-center">Data Pemesanan &nbsp;<i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php 
													echo $this->Madmin->jumlahApprovePemesanan(); ?></div>
													<div class="stat-panel-title text-uppercase">Approve Pemesanan</div>
												</div>
											</div>
											<a href="<?=base_url();?>index.php/Cadmin/tampilDataPemesanan" class="block-anchor panel-footer text-center">Data Approve Pemesanan &nbsp;<i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php 
													echo $this->Madmin->jumlahRejectPemesanan(); ?></div>
													<div class="stat-panel-title text-uppercase">Reject Pemesanan</div>
												</div>
											</div>
											<a href="<?=base_url();?>index.php/Cadmin/tampilDataPemesanan" class="block-anchor panel-footer text-center">Data Reject Pemesanan &nbsp;<i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
	</div>
	</div>

	<!-- Loading Scripts -->

	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>

</html>