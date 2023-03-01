<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Informasi</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Informasi</label>
				<div class="col-sm-6">
					<input type="textarea" class="form-control" id="alasan" name="alasan" placeholder="isi Informasi" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-berita" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_berita (kd_berita,berita) VALUES (
			'".$_POST['']."',
			'".$_POST['alasan']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-berita';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-berita';
          }
      })</script>";
    }}
     //selesai proses simpan data
