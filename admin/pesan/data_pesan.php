

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Pesan Masuk</h3>
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
                   <th>ID Pesan</th>
                
                <th >Email</th>
                <th >Pesan</th>
               <th >Tanggal</th>
              
               
                        
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  tb_pesan");
              while ($data= $sql->fetch_assoc()) {
			
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
						
						
							<?php echo $data['id_pesan']; ?>
						</td>
						<td>
                        
					<?php echo $data['email']; ?>
						</td>
						<td>
                      <?php echo $data['pesan']; ?>
						</td>
						<td>
                        <?php echo $data['tgl']; ?>
						</td>
						<td>
							
                             
							<a href="?page=del-pesan&kode=<?php echo $data['id_pesan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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