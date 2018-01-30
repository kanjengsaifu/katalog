
	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman data total ratting penjual</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Data Ratting</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Perusahaan</th>
											<th>Email Perusahaan</th>
									
							
											<th>Total Ratting</th>

										</tr>
									</thead>
									<tbody>
						              <?php 
						              $no=1;
						              foreach ($ratting as $var):?>
						              <tr>
						                <td><?=$no++?></td>
						                <td><?=$var->nama_perusahaan?></td>
						                <td><?=$var->email?></td>
					
						                <td><?=$var->total_ratting?></td>
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



