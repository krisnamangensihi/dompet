<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama User</label>
                <div class="col-sm-6">
                    <input type="text" pattern="[A-Za-z ]+" class="form-control" id="nama_pengguna" name="nama_pengguna"
                        placeholder="Nama user" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NO ID</label>
                <div class="col-sm-6">
                    <input type="text" pattern="[0-9]+" class="form-control" id="hp" name="hp" placeholder="NO ID"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Label</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="password1" name="password1" placeholder="Nama Label">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="password2" name="password2" placeholder="Alamat">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="password" name="password3" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Telpon</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="password" name="password4" placeholder="Telpon">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="password" name="password5"
                        placeholder="Penanggung Jawab">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NO KTP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="password" name="password6" placeholder="No KTP">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NO Rekening</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="password" name="password7" placeholder="No rekening">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Bank</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="password" name="password8" placeholder="Nama Bank">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Hak Akses</label>
                <div class="col-sm-4">
                    <select name="level" id="level" class="form-control">
                        <option>- Pilih -</option>
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO is_users (id_user,username,nama_user,password,no_id,label,alamat,telpon,email,jawab,ktp,no_rek,bank,hak_akses) VALUES (
        '".$_POST['']."',
	    '".$_POST['username']."',
        '".$_POST['nama_pengguna']."',
        '".$_POST['password']."',
		'".$_POST['hp']."',
		'".$_POST['password1']."',
		'".$_POST['password2']."',
		'".$_POST['password4']."',
		'".$_POST['password3']."',
		'".$_POST['password5']."',
		'".$_POST['password6']."',
		'".$_POST['password7']."',
		'".$_POST['password8']."',
		
        '".$_POST['level']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengguna';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengguna';
          }
      })</script>";
    }}
     //selesai proses simpan data