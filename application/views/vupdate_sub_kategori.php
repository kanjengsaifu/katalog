	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Update Data Sub Kategori</h2>
						<div class="panel panel-default">
							<div class="panel-heading">form sub kategori</div>
							<div class="panel-body">				
								<form method="post" action="<?=base_url();?>index.php/Cadmin/updateDataSubKategori/<?=$value->id_kategori_sub ?>" class='form-horizontal'>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Kategori</label>
										<div class="col-sm-10">
					        				<select name="id_kategori" class="form-control">
								                <option>Pilih Kategori</option>
								                	<?php	foreach ($kategori as $var):?>
								                <option value="<?php echo $var->id_kategori;?>"><?php echo $var->nama;?></option>
												    <?php endforeach;?>
							             	</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Sub Kategori</label>
										<div class="col-sm-10">
											<input type="text" id="nama_sub" name="nama" class="form-control" placeholder="Nama Sub Kategori" value="<?=$value->nama ?>">
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