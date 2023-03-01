<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Daftar Lagu</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-lagu" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
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
                        
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  tb_lagu");
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
						<td>
							</a>
							<a href="?page=edit-lagu&kode=<?php echo $data['id_lagu']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-lagu&kode=<?php echo $data['id_lagu']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
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