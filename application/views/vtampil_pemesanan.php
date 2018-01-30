	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Data Pemesanan</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Data Pemesanan</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Email User</th>
											<th>Nama Produk</th>
											<th>Ratting</th>
											<th>Status Pemesanan</th>

										</tr>
									</thead>
									<tbody>
						              <?php 
						              $no=1;
						              if (is_array($pemesanan) && count($pemesanan) > 0) {
						              foreach ($pemesanan as $var):?>
						              <tr>
						                <td><?=$no++?></td>
						                <td><?=$var->email?></td>
						                <td><?=$var->nama_produk?></td>
						                <td><?php 
						                if($var->rating ==0)
						                	echo "Belum ratting";
						                else
						                	echo $var->rating;

						                ?>
						                	

						                </td>
						                <td>
						                <?php 
  										 if ($var->st_pemesanan == 1) {
						                	echo "Approve";
						                }elseif ($var->st_pemesanan == 2) {
						                	echo "Reject";
						                }elseif ($var->st_pemesanan == 0) {
						                	echo "-";
						                }
						                 ?>
						                </td>

						              </tr>

						              <?php endforeach; } else { ?>
										error message here
										<?php } ?>

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



