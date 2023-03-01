

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Rincia Penjualan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-rincian" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
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
               
                        
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  tb_rincian");
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
							</a>
							<a href="?page=edit-rincian&kode=<?php echo $data['id_penjualan']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
                            </a>
							<a href="?page=edit-jual&kode=<?php echo $data['id_penjualan']; ?>" title="Rincian"
							 class="btn btn-success btn-sm">
								<i class="fa fa-eye"></i>
							</a>
                              </a>
                              <a href="download.php?filename=<?=$data['pdf']?>" title="Download"
							 class="btn btn-success btn-sm">
								<i class="fa fa-download"></i>
                         
                           </a>
							<a href="?page=del-rincian&kode=<?php echo $data['id_penjualan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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