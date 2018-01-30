<style type="text/css">
	table {
  table-layout: fixed; 
  width: 100%;
  *margin-left: -100px;/*ie7*/
}
td, th {
  vertical-align: top;

  padding:10px;
  width:100px;
}
th {
  position:absolute;
  *position: relative; /*ie7*/
  left:0; 
  width:100px;
}
.outer {position:relative}
.inner {
  overflow-x:scroll;
  overflow-y:visible;
  width:100%; 

}
</style>

	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Halaman Data Penjual</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Data Penjual</div>
							<div class="panel-body">
							<div class="outer">
						 	 <div class="inner">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th >Nama Perusahaan</th>
											<th >Nama Pemilik</th>
											<th>Telp</th>
											<th>Alamat</th>
											<th style='width:auto;'>Email</th>
											<th>Aksi</th>

										</tr>
									</thead>
									<tbody>
						              <?php 
						              $no=1;
						              foreach ($penjual as $var):?>
						              <tr>
						                <td><?=$no++?></td>
						                <td><?=$var->nama_perusahaan?></td>
						                <td><?=$var->nama_pemilik?></td>
						                <td><?=$var->telepon?></td>
						                <td><?=$var->alamat?></td>
						                <td><?=$var->email?></td>
						                <td align="center">
										<a href="<?= base_url()?>index.php/cadmin/deleteDataPenjual/<?=$var->id_penjual?>">
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



