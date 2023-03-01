<?php
$user= $_SESSION["ses_id"];
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Pembayaran</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Bayar</label>
				
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Untuk Bulan</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option>- Pilih -</option>
						<option>Januari</option>
						<option>February</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>Oktober</option>
                        <option>November</option>
                        <option>Desember</option>
                       
					</select>
				</div>
			</div>
			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Iuran</label>
				<div class="col-sm-6">
					
                        
                        <select class="form-control select2bs4" name="jenis" data-placeholder="-- Pilih Jenis Iuran--"autocomplete="off" required>
                    <option value=""></option>
                    
						<?php
				// ambil data dari database
				$query = "select * from tb_jenis";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['jenis'] ?>">
							<?php echo $row['jenis'] ?>
							-
							<?php echo $row['biaya'] ?>
						</option>
						<?php
				}
				?>
					</select>
				</div>
			</div>
            
             
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Transfer</label>
				<div class="col-sm-6">
					<input type="text"  pattern="[0-9]+" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Transfer" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bukti Pembayaran</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_keterangan" name="fileket"  required="required">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
				</div>
			</div>

			
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pembayaran" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
$koneksi = new mysqli ("localhost","root","zainuri123","db_rt");
    if (isset ($_POST['Simpan'])){
		$nomor    = $_POST['fileket'];
        $ekstensi_diperbolehkan    = array('jpg','png','jpeg','pdf');
        $nama    = $_FILES['fileket']['name'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['fileket']['size'];
        $file_tmp    = $_FILES['fileket']['tmp_name']; 
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, 'C:/AppServ/www/Pembayaran RT/admin/Pembayaran/images/'.$nama);
		
	
        $sql_simpan = "INSERT INTO tb_pembayaran (no_bayar, tgl,bulan,jenis,jumlah,id_pengguna,status,foto) VALUES (
			
			'".$_POST['']."',
			'".$_POST['tgl_lh']."',
			'".$_POST['jekel']."',	
			'".$_POST['jenis']."',	
			'".$_POST['jumlah']."',	
			'$user',
			'Proses',
			'$nama')";
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);	
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pembayaran';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pembayaran';
          }
      })</script>";
    }}}
     //selesai proses simpan data
