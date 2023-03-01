<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM 
		tb_rincian WHERE id_penjualan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Rincian Penjualan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Rincian Penjualan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kode_rincian" value="<?php echo $data['id_penjualan']; ?>" readonly required>
                </div>
              </div>
<div class="form-group">
                <label class="col-sm-2 control-label">Periode</label>
                <div class="col-sm-6">
                   <input name="periode" type="date" required class="form-control"autocomplete="off" value="<?php echo $data['periode']; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sumber</label>
                <div class="col-sm-6">
                  <input name="judul_rincian" type="text" required class="form-control"autocomplete="off" value="<?php echo $data['sumber']; ?>" readonly>
                </div>
              </div>
 <div class="form-group">
                <label class="col-sm-2 control-label">Audio/Video</label>
                <div class="col-sm-6">
                  <input name="pencipta" type="text" required class="form-control"autocomplete="off" value="<?php echo $data['konten']; ?>" readonly>
                </div>
              </div>
 <div class="form-group">
                <label class="col-sm-2 control-label">RBT</label>
                <div class="col-sm-6">
                  <input name="arranger" type="text" required class="form-control"autocomplete="off" value="<?php echo $data['rbt']; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Pajak</label>
                <div class="col-sm-6">
                  <input name="pajak" type="text" required class="form-control"autocomplete="off" value="<?php echo $data['pajak']; ?>" readonly>
                </div>
              </div>
 <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Konsul</label>
                <div class="col-sm-6">
                  <input name="status" type="text" required class="form-control"autocomplete="off" value="<?php echo $data['jumlah']; ?>" readonly>
                </div>
              </div>
 <div class="form-group">
                <label class="col-sm-2 control-label">Bagi Hasil</label>
                <div class="col-sm-6">
                   <input name="tgl" type="text" required class="form-control"autocomplete="off" value="<?php echo $data['bagi_hasil']; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Masukkan Rincian Penjualan</label>
                <div class="col-sm-6">
                   <input name="rincian" type="text" required class="form-control"autocomplete="off" value="<?php echo $data['rincian']; ?>">
                </div>
              </div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-rincian" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_rincian SET 
		rincian='".$_POST['rincian']."'
		WHERE id_penjualan='".$_POST['kode_rincian']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-rincian';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-rincian';
        }
      })</script>";
    }}
