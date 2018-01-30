	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Update Profil</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Profil</div>
							<div class="panel-body">
						
			
				<form method="post" action="<?=base_url();?>index.php/cadmin/updatePasswordAdmin/" class='form-horizontal'>
					<div class="form-group">
						<label class="col-sm-2 control-label">Masukan Password Lama</label>
						<div class="col-sm-10">
							<input type="password" name="password_lama" class="form-control" placeholder="Masukan Password Lama">
						</div>
					</div>
					<div class="hr-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Masukan Password Baru</label>
						<div class="col-sm-10">
							<input type="password"  name="password_baru" placeholder="Masukan Password Baru" class="form-control"
							value="">
						</div>
					</div>
					<div class="hr-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Ulangi Password Baru</label>
						<div class="col-sm-10">
							<input type="password" name="ulangi_password" placeholder="Ulangi Password Baru" class="form-control"
							value="">
						</div>
					</div>
	
					<div class="hr-dashed"></div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							
							<button class="btn btn-primary" type="submit">Ubah Paswsword</button>
						</div>
					</div>
				<!-- <?=form_close();?> -->
				</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>