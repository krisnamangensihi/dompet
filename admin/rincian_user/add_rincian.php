<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Input Rincian Penjualan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
     <?php  
              // fungsi untuk membuat id transaksi
             $query = "SELECT RIGHT(id_penjualan,6) as kode FROM tb_rincian
                                                ORDER BY id_penjualan DESC LIMIT 1";
				$query_id= mysqli_query($koneksi, $query);

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_rincian
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_rincian
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $kode_rincian = "RP$buat_id";
              ?>
<div class="card-body">

<div class="form-group row">
                <label class="col-sm-2 control-label">ID Rincian Penjualan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="id" value="<?php echo $kode_rincian; ?>" readonly required>
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
                <label class="col-sm-2 control-label">Periode</label>
                <div class="col-sm-6">
                   <input type="date" class="form-control" name="periode" autocomplete="off" required>
                </div>
              </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Sumber</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="judul_rincian" autocomplete="off" required>
                </div>
              </div>
<div class="form-group row">
                <label class="col-sm-2 control-label">Audio/Video</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="pencipta" autocomplete="off" required>
                </div>
              </div>
 <div class="form-group row">
                <label class="col-sm-2 control-label">RBT</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="arranger" autocomplete="off" required>
                </div>
              </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Pajak</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="pajak" autocomplete="off" required>
                </div>
              </div>
<div class="form-group row">
                <label class="col-sm-2 control-label">Jumlah Konsul</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="status" autocomplete="off" required>
                </div>
              </div>
 <div class="form-group row">
                <label class="col-sm-2 control-label">Bagi Hasil</label>
                <div class="col-sm-6">
                   <input type="text" class="form-control" name="tgl" autocomplete="off" required>
                </div>
              </div>
               <div class="form-group row">
              <label class="col-sm-2 control-label">File PDF</label>
              <div class="col-sm-6">
                   
                   <input type="file" name="fileket" id="fileField">
                </div>
              </div>
</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-rincian" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

$koneksi = new mysqli ("localhost","root","zainuri123","db_bd");
    if (isset ($_POST['Simpan'])){
		$nomor    = $_POST['fileket'];
        $ekstensi_diperbolehkan    = array('jpg','png','jpeg','pdf');
        $nama    = $_FILES['fileket']['name'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['fileket']['size'];
        $file_tmp    = $_FILES['fileket']['tmp_name']; 
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, 'C:/AppServ/www/foras/admin/rincian/images/'.$nama);
		
    
    //mulai proses simpan data
 $sql_simpan = "INSERT INTO tb_rincian(id_penjualan,periode,sumber,konten,rbt,pajak,jumlah,bagi_hasil,id_user,pdf) VALUES (
			'".$_POST['id']."', 
			'".$_POST['periode']."',
			'".$_POST['judul_rincian']."',
			'".$_POST['pencipta']."',
			'".$_POST['arranger']."',
			'".$_POST['pajak']."',
			'".$_POST['status']."',
			'".$_POST['tgl']."',
			'".$_POST['user']."',
			'$nama')";
			$query_simpan = mysqli_query($koneksi, $sql_simpan);	
		if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-rincian';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-rincian';
          }
      })</script>";
    }}}