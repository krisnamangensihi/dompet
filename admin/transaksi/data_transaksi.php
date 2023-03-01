

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Transaksi</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-transaksi" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                    <th >NO</th>
                     <th >Tanggal</th>
              <th >Jumlah</th>
                <th >Keterangan</th>
                <th>Status</th>
               
                        
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  tb_transaksi");
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
							<?php echo $data['tanggal']; ?>
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
						<td>
                      
							</a>
							<a href="?page=edit-transaksi&kode=<?php echo $data['id_transaksi']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
                           
							
                             
							<a href="?page=del-transaksi&kode=<?php echo $data['id_transaksi']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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