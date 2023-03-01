<?php
$user=$_SESSION["ses_id"]
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Rincian Penjualan</h3>
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
                    <th >NO</th>
						 <th >Periode</th>
                <th >Sumber</th>
                <th >Audio/Video</th>
                <th >RBT</th>
                <th >Pajak</th>
               <th>Jumlah Konsul</th>
               <th >Bagi Hasil</th>
                <th >rincian</th>
              <th >
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT *
                                            FROM tb_rincian where id_user ='$user' ORDER BY id_penjualan DESC");
              while ($data= $sql->fetch_assoc()) {
			  $tanggal         = $data['tanggal'];
              $exp             = explode('-',$tanggal);
              $tanggal_masuk   = $exp[2]."-".$exp[1]."-".$exp[0];
              $pajak = format_rupiah($data['pajak']);
			  $bagi = format_rupiah($data['bagi_hasil']);
			  $rbt = format_rupiah($data['rbt']);
			  $jumlah = format_rupiah($data['jumlah']);
			  $konten = format_rupiah($data['konten']);
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['periode']; ?>
						</td>
						<td>
							<?php echo $data['sumber']; ?>
						</td>
						<td>
							<?php echo $konten; ?>
						</td>
						<td>
                        <?php echo $rbt; ?>
						</td>
						<td>
                        <?php echo $pajak; ?>
						</td>
						<td>
					<?php echo $jumlah; ?>
						</td>
						<td>
                        <?php echo $bagi; ?>
						</td>
						<td>
                        
							<?php echo $data['rincian']; ?>
						</td>
						<td>
							</a>
                         <a href="download.php?filename=<?=$data['pdf']?>">Download File</a></td> 

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->