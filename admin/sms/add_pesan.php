<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Kirim SMS</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Subjek</label>
				<div class="col-sm-6">
					<input name="subjek" type="text" required class="form-control" id="subjek" placeholder="subjek" value="Pemberitahuan Iuran">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">isi</label>
				<div class="col-sm-6">
					<input name="isi" type="text" required class="form-control" id="isi" placeholder="isi pesan" value="Segera lakukan pembayaran iuran, abaikan pesan ini jika anda sdh bayar">
				</div>
			</div>

<div class="form-group row">
				<label class="col-sm-2 col-form-label">NO Tujuan</label>
				<div class="col-sm-6">
					
                        
                        <select class="form-control select2bs4" name="tujuan" data-placeholder="-- Pilih NO Tujuan--"autocomplete="off" required>
                    <option value=""></option>
                    
						<?php
				// ambil data dari database
				$query = "select * from tb_pengguna";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['no_hp'] ?>">
							<?php echo $row['no_hp'] ?>
							-
							<?php echo $row['nama_pengguna'] ?>
						</option>
						<?php
				}
				?>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-sms" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_sms (kd_pesan,subjek,isi,no_hp) VALUES (
			'".$_POST['']."',
            
			'".$_POST['subjek']."',
			'".$_POST['isi']."',
			'".$_POST['tujuan']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Berhasil Mengirim Pesan',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-sms';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Gagal Mengirim Pesan',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pesan';
          }
      })</script>";
    }}
     //selesai proses simpan data
