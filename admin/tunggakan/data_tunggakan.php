<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Rincian Iuran </h3>
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
						<th>Nama</th>
						<th>Jenis Iuran</th>
						<th>Untuk Bulan</th>
                        <th>Tanggal Bayar</th>
                        <th>Status Pembayaran</th>
                        
						
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $tgl    =date("Y-m-d");
              $sql = $koneksi->query("SELECT a.no_bayar,a.tgl,a.bulan,a.jenis,a.jumlah,a.id_pengguna,a.status, a.foto,b.jenis,b.biaya,c.id_pengguna,c.nama_pengguna from tb_pembayaran a inner join tb_jenis b on a.jenis=b.jenis inner join tb_pengguna c on a.id_pengguna=c.id_pengguna");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_pengguna']; ?>
						</td>
						<td>
							<?php echo $data['jenis']; ?>
						</td>
						<td>
							<?php echo $data['bulan']; ?>
						</td>
						<td>
                        <?php echo $data['tgl']; ?>
						</td>
						<td>
                        <?php echo $data['status']; ?>
						
						
					

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->