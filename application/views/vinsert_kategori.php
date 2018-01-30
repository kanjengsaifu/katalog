	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Tambah Data Kategori</h2>
						<div class="panel panel-default">
							<div class="panel-heading">form Kategori</div>
							<div class="panel-body">
						
								<?=form_open('Cadmin/insertDataKategori', ['class'=>'form-horizontal']);?>
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Kategori</label>
										<div class="col-sm-10">
											<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kategori">
										</div>
									</div>
									<div class="hr-dashed"></div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-2">
											<button type="reset" class="btn btn-warning">Ulangi</button>
											<button class="btn btn-primary" type="submit">Simpan</button>
										</div>
									</div>
								<?=form_close();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>