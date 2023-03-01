<?php
$user= $_SESSION["ses_id"];
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Riwayat Pembayaran</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pembayaran" class="btn btn-primary">
					<i class="fa fa-edit"></i> Bayar Iuran</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NO Pembayaran</th>
						<th>Tanggal</th>
						<th>Bulan</th>
						<th>Jenis</th>
						<th>Biaya</th>
						<th>Transfer</th>
					  <th>Status</th>
                      
				  </tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT a.no_bayar,a.tgl,a.bulan,a.jenis,a.jumlah,a.id_pengguna,a.status, b.jenis,b.biaya from tb_pembayaran a inner join tb_jenis b on a.jenis=b.jenis where a.id_pengguna='$user' order by a.no_bayar desc");
              while ($data= $sql->fetch_assoc()) {
            	?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['no_bayar']; ?>
						</td>
						<td>
							<?php echo $data['tgl']; ?>
						</td>
						<td>
							<?php echo $data['bulan']; ?>
						</td>
						<td>
							<?php echo $data['jenis']; ?>
						</td>
						<td>
							<?php echo $data['biaya']; ?>
						</td>
						<td>
                        <?php echo $data['jumlah']; ?>
						</td>
					  <td>
							<?php echo $data['status']; ?>
						</td>
						
					</tr>

					<?php
              }
            ?>
			  </tbody>
				</tfoot>
			</table>
		  <p style="color: #F00">*Status &quot;Proses&quot; Menandakan Pembayaran sedang diverifikasi <br>
		    *Status &quot;Lunas&quot; Menandakan Pembayaran Berhasil <br>
	      *Status &quot;Gagal&quot; Menandakan Pembayaran Gagal</p>
      </div>
	</div>
	<!-- /.card-body -->