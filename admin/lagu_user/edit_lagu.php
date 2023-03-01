<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM 
		tb_lagu WHERE id_lagu='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Lagu</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Lagu</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_pindah" name="id_pindah" value="<?php echo $data_cek['id_lagu']; ?>"
					 readonly/>
				</div>
			</div>

			
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Judul Lagu</label>
				<div class="col-sm-6">
					<input name="judul" type="text" required class="form-control" id="alasan" placeholder="Judul Lagu" value="<?php echo $data_cek['judul']; ?>">
				</div>
		  </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Artis</label>
				<div class="col-sm-6">
					<input name="artis" type="text" required class="form-control" id="alasan" placeholder="Nama Artis" value="<?php echo $data_cek['artis']; ?>">
				</div>
			</div>
            <div class="form-group row">
			  <label class="col-sm-2 col-form-label">Pencipta</label>
				<div class="col-sm-6">
					<input name="pencipta" type="text" required class="form-control" id="alasan" placeholder="Pencipta" value="<?php echo $data_cek['pencipta']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Arranger</label>
				<div class="col-sm-6">
					<input name="arranger" type="text" required class="form-control" id="alasan" placeholder="Arranger" value="<?php echo $data_cek['arranger']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-6">
					<input name="status" type="text" required class="form-control" id="alasan" placeholder="Status" value="<?php echo $data_cek['status']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Rilis</label>
				<div class="col-sm-6">
					<input name="tgl" type="date" required class="form-control" id="tgl" placeholder="Tanggal Rilis" value="<?php echo $data_cek['tanggal_rilis']; ?>">
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-lagu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_lagu SET 
		judul='".$_POST['judul']."',
		artis='".$_POST['artis']."',
		pencipta='".$_POST['pencipta']."',
		arranger='".$_POST['arranger']."',
		status='".$_POST['status']."',
		tanggal_rilis='".$_POST['tgl']."'
		
		WHERE id_lagu='".$_POST['id_pindah']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lagu';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lagu';
        }
      })</script>";
    }}
