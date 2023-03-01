<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM 
		tb_transaksi WHERE id_transaksi='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Transaksi</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

              
            <div class="form-group row">
                <label class="col-sm-2 control-label">ID Transaksi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kode_rincian" value="<?php echo $data['id_transaksi']; ?>" readonly required>
                </div>
              </div>
<div class="form-group row">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-6">
                   <input name="periode" type="date" required class="form-control" autocomplete="off" value="<?php echo $data['tanggal']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-6">
                   <input name="jumlah" type="text" required class="form-control" id="harga_jual" autocomplete="off" value="<?php echo $data['jumlah']; ?>">
                </div>
              </div>
          <div class="form-group row">
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-6">
                  <input name="arranger" type="text" required class="form-control" autocomplete="off" value="<?php echo $data['keterangan']; ?>">
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
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-transaksi" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_transaksi SET 
		tanggal='".$_POST['periode']."',
		jumlah='".$_POST['jumlah']."',
		keterangan='".$_POST['arranger']."',
		status='".$_POST['status']."'
		
		
		
		WHERE id_transaksi='".$_POST['kode_rincian']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-transaksi';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-transaksi';
        }
      })</script>";
    }}
