<?php
$user=$_SESSION["ses_id"]
?>
<script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript"  src="dist/js/rupiah.js"></script>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tarik Tunai</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
     <?php  
              // fungsi untuk membuat id transaksi
             $query = "SELECT RIGHT(id_transaksi,6) as kode FROM tb_tarik
                                                ORDER BY id_transaksi DESC LIMIT 1";
				$query_id= mysqli_query($koneksi, $query);

              $count = mysqli_num_rows($query_id);

             if ($count <> 0) {
                  // mengambil data kode_transaksi
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_transaksi
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $kode_transaksi = "TR$buat_id";
              ?>
<div class="card-body">

<div class="form-group row">
                <label class="col-sm-2 control-label">ID Transaksi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="id" value="<?php echo  $kode_transaksi; ?>" readonly required>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-2 control-label">Jumlah Penarikan</label>

<div class="col-sm-6">
                   <input type="text" class="form-control" id="harga_jual" name="jumlahtf" autocomplete="off" onkeyup="convertToRupiah(this);" required>
                </div>
             </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Fee</label>

<div class="col-sm-6">
       <input name="fee" type="text" required class="form-control" id="harga_jual" autocomplete="off" onkeyup="convertToRupiah(this);" value="15000" readonly>
                
              </div>
              </div>
              
              <div class="form-group row">
                <label class="col-sm-2 control-label">Rekening Tujuan</label>

<div class="col-sm-6">
                   <input name="jumlah" type="text" required class="form-control" id="harga_jual" autocomplete="off" onkeyup="convertToRupiah(this);" value="03567887908" readonly>
                   </div>
      </div>
                <div class="form-group row">
				<label class="col-sm-2 col-form-label">metode Pembayaran Fee</label>
				<div class="col-sm-4">
					<select name="metode" id="level" class="form-control">
						<option>- Pilih -</option>
						<option>Tunai</option>
						<option>Transfer</option>
					</select>
				</div>
			</div>
             
</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-transaksi" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
error_reporting(0);
$jumlah    =str_replace('.', '',($_POST['jumlahtf']));
        $fee    =$_POST['fee'];
        $total    =$jumlah+$fee;
    if (isset ($_POST['Simpan'])){
    
    //mulai proses simpan data
 $sql_simpan = "INSERT INTO tb_tarik(id_transaksi,jumlah,fee,total,keterangan,status,id_user) VALUES (
			'".$_POST['id']."', 
			'".str_replace('.', '',($_POST['jumlahtf']))."',
			'".str_replace('.', '',($_POST['fee']))."',
			
			'".$total."',
			'".$_POST['metode']."', 
			'".'Pending'."',		
		    '".$user."')";
			
			$query_simpan = mysqli_query($koneksi, $sql_simpan);	
		if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Setor Tunai Sedang Diproses',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-tarik';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-tarik';
          }
      })</script>";
    }}