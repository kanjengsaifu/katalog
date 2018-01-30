	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Update Profil</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Profil</div>
							<div class="panel-body">
						
			
				<form method="post" action="<?=base_url();?>index.php/cadmin/updateDataAdmin" class='form-horizontal'>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="<?=$admin[0]->nama?>">
						</div>
					</div>
					<div class="hr-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
							<input type="text" id="alamat" name="alamat" placeholder="Alamat" class="form-control"
							value="<?=$admin[0]->alamat ?>">
						</div>
					</div>


					<div class="hr-dashed"></div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							
							<button class="btn btn-primary" type="submit">Simpan</button>
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