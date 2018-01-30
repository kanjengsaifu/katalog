
	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Data Produk</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Data Produk</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Perusahaan</th>
											<th>Produk</th>
											<th>Kategori</th>
											<th>Sub Kategori</th>
											<th>Tag Line</th>
											<th>Harga</th>
											<th>Aksi</th>

										</tr>
									</thead>
									<tbody>
						              <?php 
						              $no=1;
						              foreach ($produk as $var):?>
						              <tr>
						                <td><?=$no++?></td>
						                <td><?=$var->nama_perusahaan?></td>
						                <td><?=$var->nama_produk?></td>
						                <td><?=$var->kategori_nama?></td>
						                <td><?=$var->kategori_sub_nama?></td>
						                <td><?=$var->tag_line?></td>
						                <td><?=$var->harga?></td>
						                <td align="center">
					           			<a href="<?= base_url()?>index.php/cadmin/deleteDataProduk/<?=$var->id_produk?>">
					           			<span onclick="return confirm('Apakah anda ingin menghapus?')">
					           			<img src="<?=base_url();?>assets/img/icon_delete.jpg" class="ts-avatar hidden-side" width="30" height="30" >
					           			</span></a>
						                </td>
						              </tr>
						              <?php endforeach;?>
				
									</tbody>
								</table>
							</div>
						</div>				
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>

<script type="text/javascript">

function show_confirm(link){
// alert('Apakah anda ingin menghapus?');

if (confirm("Apakah anda ingin menghapus?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
}
</script>



