<?php
$user=$_SESSION["ses_id"];
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Daftar Lagu</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Lagu</th>
						<th>Judul Lagu</th>
						<th>Artis</th>
						<th>Pencipta</th>
                        <th>Arranger</th>
                        <th>Status</th>
                        <th>Tanggal Rilis</th>
                        
						
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT *
                                            FROM tb_lagu where id_user = '$user' ORDER BY id_lagu DESC");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_lagu']; ?>
						</td>
						<td>
							<?php echo $data['judul']; ?>
						</td>
						<td>
							<?php echo $data['artis']; ?>
						</td>
						<td>
                        <?php echo $data['pencipta']; ?>
						</td>
						<td>
                        <?php echo $data['arranger']; ?>
						</td>
						<td>
					<?php echo $data['status']; ?>
						</td>
						<td>
                        <?php echo $data['tanggal_rilis']; ?>
						</td>
						
						
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->