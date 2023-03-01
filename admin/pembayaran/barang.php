
<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

if(isset($_POST['dataidbarang'])) {
	$kode_barang = $_POST['dataidbarang'];

  // fungsi query untuk menampilkan data dari tabel barang
  $query = mysqli_query($mysqli, "SELECT * FROM tb_jenis WHERE kd_jenis='$kode_barang'")
                                  or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

  // tampilkan data
  $data = mysqli_fetch_assoc($query);

  $harga   = $data['jenis'];


	if($harga != '') {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Jatuh Tempo</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='harga' name='harga' value='$harga' readonly>
                    
                  </div>
                </div>
              </div>";
	} else {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Jatuh Tempo</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='harga' name='harga' value='Data tidak ditemukan' readonly>
                    <span class='input-group-addon'>Datatidak ditemukan</span>
                  </div>
                </div>
              </div>";
	}		
}
?> 