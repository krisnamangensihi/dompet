<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM 
		tb_tunai WHERE id_transaksi='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Proses Transaksi</h3>
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
                <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                <div class="col-sm-6">
                   <input name="periode" type="text" required class="form-control" autocomplete="off" value="<?php echo $data['tgl']; ?>" readonly>
                </div>
              </div>
              
          <div class="form-group row">
                <label class="col-sm-2 control-label">ID User</label>
                <div class="col-sm-6">
                   <input name="user" type="text" required class="form-control" autocomplete="off" value="<?php echo $data['id_user']; ?>" readonly>
                   </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">No Rek Tujuan</label>
                <div class="col-sm-6">
                   <input name="rek" type="text" required class="form-control" id="harga_jual" autocomplete="off" value="<?php echo $data['rek']; ?>" readonly>
                </div>
              </div>
            
              <div class="form-group row">
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-6">
                   <input name="jumlah" type="text" required class="form-control" id="harga_jual" autocomplete="off" value="<?php echo $data['jumlah']; ?>" readonly>
                </div>
              </div>
          <div class="form-group row">
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-6">
                  <input name="arranger" type="text" required class="form-control" autocomplete="off" value="<?php echo $data['keterangan']; ?>" readonly>
                </div>
              </div>
             <div class="form-group row">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-6">
                  <select name="status" required id="select">
                    <option>Selesai</option>
                    <option>Gagal</option>
                  </select>
                </div>
              </div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Proses" class="btn btn-success">
			<a href="?page=tunai-admin" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_tunai SET 
		
		status='".$_POST['status']."'
		
		
		
		WHERE id_transaksi='".$_POST['kode_rincian']. "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Transaksi Berhasil di Proses',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=tunai-admin';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Transaksi Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=tunai-admin';
        }
      })</script>";
    }}
