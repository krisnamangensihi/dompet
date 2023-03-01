<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Lagu</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
     <?php  
              // fungsi untuk membuat id transaksi
              $query = "SELECT RIGHT(id_lagu,6) as kode FROM tb_lagu
                                                ORDER BY id_lagu DESC LIMIT 1";
				$query_id= mysqli_query($koneksi, $query);

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode_lagu
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_lagu
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $kode_lagu = "LG$buat_id";
              ?>
		<div class="card-body">

<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Lagu</label>
				<div class="col-sm-6">
					<input name="id" type="text" required class="form-control" id="alasan" placeholder="Judul Lagu" value="<?php echo $kode_lagu; ?>">
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
				<label class="col-sm-2 col-form-label">Judul Lagu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="judul" placeholder="Judul Lagu" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Artis</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="artis" placeholder="Nama Artis" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Pencipta</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="pencipta" placeholder="Pencipta" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Arranger</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="arranger" placeholder="Arranger" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="status" placeholder="Status" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Rilis</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Rilis" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-lagu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_lagu(id_lagu,judul,artis,pencipta,arranger,status,tanggal_rilis,id_user) VALUES (
			'".$_POST['id']."',
            
			'".$_POST['judul']."',
			'".$_POST['artis']."',
			'".$_POST['pencipta']."',
			'".$_POST['arranger']."',
			'".$_POST['status']."',
			'".$_POST['tgl']."',
			'".$_POST['user']."')";
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-lagu';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-lagu';
          }
      })</script>";
    }}
     //selesai proses simpan data
