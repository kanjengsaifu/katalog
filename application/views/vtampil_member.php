	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Data User</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Data User</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Telp</th>
											<th>Email</th>
											<th>Aksi</th>

										</tr>
									</thead>
									<tbody>
						              <?php 
						              $no=1;
						              foreach ($member as $var):?>
						              <tr>
						                <td><?=$no++?></td>
						                <td><?=$var->nama?></td>
						                <td><?=$var->telp?></td>
						                <td><?=$var->email?></td>
						                <td align="center">
										<a href="<?= base_url()?>index.php/cadmin/deleteDataMember/<?=$var->id_member?>">
										<span onclick="return confirm('Apakah anda ingin menghapus?')">
										<img src="<?=base_url();?>assets/img/icon_delete.jpg" class="ts-avatar hidden-side" width="30" height="30">
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



