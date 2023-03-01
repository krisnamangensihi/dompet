<?php
$user=$_SESSION["ses_id"];
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Transaksi</h3>
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
                    <th >ID Transaksi</th>
                     <th >Tanggal</th>
                     
              <th >Jumlah</th>
                <th >Keterangan</th>
                <th>Status</th>
               
                        
						
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT *
                                            FROM tb_transaksi where id_user = '$user' ORDER BY id_transaksi desc");
              while ($data= $sql->fetch_assoc()) {
			 $tanggal         = $data['tanggal'];
              $exp             = explode('-',$tanggal);
              $tanggal_masuk   = $exp[2]."-".$exp[1]."-".$exp[0];
              $jumlah = format_rupiah($data['jumlah']);
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
                        <?php echo $data['id_transaksi']; ?>
						</td>
						<td>
							<?php echo $tanggal_masuk; ?>
						</td>
						<td>
							<?php echo $jumlah; ?>
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
						</td>
						<td>
                        
					<?php echo $data['status']; ?>
						</td>
						
                      
					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->