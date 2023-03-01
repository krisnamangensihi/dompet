<script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript"  src="dist/js/rupiah.js"></script>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Input Rincian Penjualan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
     <?php  
              // fungsi untuk membuat id transaksi
             $query = "SELECT RIGHT(id_transaksi,6) as kode FROM tb_transaksi
                                                ORDER BY id_transaksi DESC LIMIT 1";
				$query_id= mysqli_query($koneksi, $query);

              $count = mysqli_num_rows($query_id);

             if ($count <> 0) {
                  // mengambil data kode_transaksi
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_transaksi
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $kode_transaksi = "TR$buat_id";
              ?>
<div class="card-body">

<div class="form-group row">
                <label class="col-sm-2 control-label">ID Transaksi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="id" value="<?php echo  $kode_transaksi; ?>" readonly required>
                </div>
              </div>
              <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama User</label>
				<div class="col-sm-6">
					
                        
                        <select class="form-control select2bs4" name="user" data-placeholder="-- Pilih Nam User--"autocomplete="off" required>
                    <option value=""></option>
                    
						<?php
				// ambil data dari database
				$query = "select * from is_users";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['id_user'] ?>">
							<?php echo $row['nama_user'] ?>
							-
							<?php echo $row['label'] ?>
						</option>
						<?php
				}
				?>
					</select>
				</div>
			</div>

<div class="form-group row">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-6">
                   <input type="date" class="form-control" name="periode" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-6">
                   <input type="text" class="form-control" id="harga_jual" name="jumlah" autocomplete="off" onkeyup="convertToRupiah(this);" required>
                </div>
              </div>
          <div class="form-group row">
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="arranger" autocomplete="off" required>
                </div>
              </div>
             <div class="form-group row">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-6">
                  <select name="status" required id="select">
                    <option>Lunas</option>
                    <option>Belum Lunas</option>
                  </select>
                </div>
              </div>
</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-transaksi" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    
    //mulai proses simpan data
 $sql_simpan = "INSERT INTO tb_transaksi(id_transaksi,tanggal,jumlah,keterangan,status,id_user) VALUES (
			'".$_POST['id']."', 
			'".$_POST['periode']."',
			'".str_replace('.', '',($_POST['jumlah']))."',
			'".$_POST['arranger']."',
			'".$_POST['status']."',		
		    '".$_POST['user']."')";
			
			$query_simpan = mysqli_query($koneksi, $sql_simpan);	
		if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-transaksi';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-transaksi';
          }
      })</script>";
    }}