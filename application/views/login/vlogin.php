<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login Penjual</title>
	<?php $this->load->view('plugin/include_css') ?>

</head>

<body>
	<div class="login-page bk-img" style="background-image: url(<?=base_url();?>assets/img/dashboard.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">QG - Souvenir</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
							<!-- 	<form action="" class="mt"> -->
							<?=form_open('login/ProsesLogin', ['class'=>'']);?>
									<label for="" class="text-uppercase text-sm">Email</label>
									<input type="text" id="email" name="email" placeholder="email" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" id="password" name="password" placeholder="password" class="form-control mb">
									<button class="btn btn-primary btn-block" type="submit">Masuk</button><br></br>
								<?=form_close();?>					
							</div>
						</div>
						<div class="text-center text-light">
							<a href="#" class="text-light">@Copyright 2016 QG - Souvenir, Bandung </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Loading Scripts -->
	<?php $this->load->view('plugin/include_js') ?>
</body>
</html>