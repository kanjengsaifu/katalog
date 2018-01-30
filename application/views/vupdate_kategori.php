	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Update Data Kategori</h2>
						<div class="panel panel-default">
							<div class="panel-heading">form kategori</div>
							<div class="panel-body">
						
							
								<form method="post" action="<?=base_url();?>index.php/cadmin/updateDataKategori/<?=$value->id_kategori ?>" class='form-horizontal'>
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Kategori</label>
										<div class="col-sm-10">
											<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kategori" value="<?=$value->nama ?>">
										</div>
									</div>
					
									<div class="hr-dashed"></div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-2">
											<button class="btn btn-warning" type="reset">Ulangi</button>
											<button class="btn btn-primary" type="submit">Update</button>
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