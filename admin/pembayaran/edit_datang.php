<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT d.id_datang, d.nik, d.nama_datang, d.tempat_lh, d.tgl_lh,  d.jekel, d.tgl_datang, p.id_pend, p.nama, d.alamat_asal, d.alamat_tujuan, 
		d.rt_tujuan, d.rw_tujuan, d.desa_tujuan, d.kec_tujuan, d.kab_tujuan, d.prov_tujuan, d.negara, d.agama, d.pekerjaan, d.gol_darah, d.kawin, d.file_kk, d.file_ket  from 
		tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend WHERE id_datang='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_datang" name="id_datang" value="<?php echo $data_cek['id_datang']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="nama_datang" name="nama_datang" value="<?php echo $data_cek['nama_datang']; ?>"
					 required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lh']; ?>"
					/>
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jenis Kelamin --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "Laki - Laki") echo "<option value='Laki - Laki' selected>Laki - Laki</option>";
                else echo "<option value='Laki - Laki'>Laki - Laki</option>";

                if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                else echo "<option value='Perempuan'>Perempuan</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Datang</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_datang" name="tgl_datang" value="<?php echo $data_cek['tgl_datang']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pelapor</label>
				<div class="col-sm-6">
					<select name="pelapor" id="prlapor" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_pdd";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_pend'] ?>" <?=$data_cek[
						 'id_pend']==$row[ 'id_pend'] ? "selected" : null ?>>
							<?php echo $row['nik'] ?>
							<?php echo $row['nama'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Asal</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_asal" name="alamat_asal" value="<?php echo $data_cek['alamat_asal']; ?>"
					 required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Tujuan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="alamat_tujuan" value="<?php echo $data_cek['alamat_tujuan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rt_tujuan" name="rt_tujuan" value="<?php echo $data_cek['rt_tujuan']; ?>"
					/>
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rw_tujuan" name="rw_tujuan" value="<?php echo $data_cek['rw_tujuan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Desa</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="desa_tujuan" name="desa_tujuan" value="<?php echo $data_cek['desa_tujuan']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kecamatan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="kec_tujuan" name="kec_tujuan" value="<?php echo $data_cek['kec_tujuan']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kabupaten</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="kab_tujuan" name="kab_tujuan" value="<?php echo $data_cek['kab_tujuan']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Provinsi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="prov_tujuan" name="prov_tujuan" value="<?php echo $data_cek['prov_tujuan']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kewarganegaraan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="negara" name="negara" value="<?php echo $data_cek['negara']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Darah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="gol_darah" name="gol_darah" value="<?php echo $data_cek['gol_darah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="agama" name="agama" value="<?php echo $data_cek['agama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option value="">-- Pilih Status --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['kawin'] == "Sudah") echo "<option value='Sudah' selected>Sudah</option>";
                else echo "<option value='Sudah'>Sudah</option>";

                if ($data_cek['kawin'] == "Belum") echo "<option value='Belum' selected>Belum</option>";
				else echo "<option value='Belum'>Belum</option>";
				
				if ($data_cek['kawin'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
                else echo "<option value='Cerai Mati'>Cerai Mati</option>";

                if ($data_cek['kawin'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
                else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $data_cek['pekerjaan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File KK</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_kk" name="filekk" value="<?php echo $data_cek['file_kk']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Keterangan</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_ket" name="fileket" value="<?php echo $data_cek['file_ket']; ?>"
					/>
				</div>
			</div>

			


		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-datang" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

		
		$nomor    = $_POST['fileket'];
        $ekstensi_diperbolehkan    = array('jpg','png','jpeg','pdf');
        $nama    = $_FILES['fileket']['name'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['fileket']['size'];
        $file_tmp    = $_FILES['fileket']['tmp_name']; 
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, 'C:/xampp/htdocs/sistem_penduduk/admin/datang/images/'.$nama);
		
		$nomors    = $_POST['filekk'];
        $ekstensi_diperbolehkans    = array('jpg','png','jpeg','pdf');
        $namas    = $_FILES['filekk']['name'];
        $xs        = explode('.', $namas);
        $ekstensis    = strtolower(end($xs));
        $ukurans        = $_FILES['filekk']['size'];
        $file_tmps    = $_FILES['filekk']['tmp_name']; 
     
        if(in_array($ekstensis, $ekstensi_diperbolehkans) === true){
        move_uploaded_file($file_tmps, 'C:/xampp/htdocs/sistem_penduduk/admin/datang/images/'.$namas);
		
    $sql_ubah = "UPDATE tb_datang SET 
		nik='".$_POST['nik']."',
		nama_datang='".$_POST['nama_datang']."',
		tempat_lh='".$_POST['tempat_lh']."',
		tgl_lh='".$_POST['tgl_lh']."',
		jekel='".$_POST['jekel']."',
		tgl_datang='".$_POST['tgl_datang']."',
		pelapor='".$_POST['pelapor']."',
		alamat_asal='".$_POST['alamat_asal']."',
		alamat_tujuan='".$_POST['alamat_tujuan']."',
		rt_tujuan='".$_POST['rt_tujuan']."',
		rw_tujuan='".$_POST['rw_tujuan']."',
		desa_tujuan='".$_POST['desa_tujuan']."',
		kec_tujuan='".$_POST['kec_tujuan']."',
		kab_tujuan='".$_POST['kab_tujuan']."',
		prov_tujuan='".$_POST['prov_tujuan']."',
		negara='".$_POST['negara']."',
		agama='".$_POST['agama']."',
		kawin='".$_POST['kawin']."',
		pekerjaan='".$_POST['pekerjaan']."',
		gol_darah='".$_POST['gol_darah']."',
		status='Ada',
		file_kk='$namaa',
		file_ket='$nama',
		file_ktp='$namas'
		WHERE id_datang='".$_POST['id_datang']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-datang';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-datang';
        }
      })</script>";
    }}}
