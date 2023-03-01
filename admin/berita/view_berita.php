<?php
$user=$_SESSION["ses_id"];
?>
<?php

 $sql = $koneksi->query("SELECT sum(jumlah) as pend  from tb_setor where id_user='$user'");
  while ($data= $sql->fetch_assoc()){
    $pend=$data['pend'];
  }

  $sql = $koneksi->query("SELECT sum(total) as proses from tb_tarik where id_user='$user'");
  while ($data= $sql->fetch_assoc()) {
	$jumlah = format_rupiah($data['proses']);
    
  }

  $sql = $koneksi->query("SELECT sum(total) as proses from tb_tunai where id_user='$user'");
  while ($data= $sql->fetch_assoc()) {
    $gagal=format_rupiah($data['proses']);
  }
  ?>
  <div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $pend;  ?>
				</h3>

				<p>Total Setor Tunai</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<!--<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>-->
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>
					<?php echo $jumlah;  ?>
				</h3>

				<p>Nilai Transaksi</p>
			</div>
			<div class="icon">
				<i class="ion ion-card"></i>
			</div>
			<!--<a href="index.php?page=data-kartu" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>-->
			</a>
		</div>
	</div>
	<!-- ./col -->
	<!--<div class="col-lg-3 col-6">
		<!-- small box -->
		<!--<div class="small-box bg-red">
			<div class="inner">
				<h3>
				<?php echo $laki;  ?>
				</h3>

				<p>Laki-laki</p>
			</div>
			<div class="icon">
				<i class="ion ion-male"></i>
			</div>
			<a href="index.php?page=data-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>-->
	<!-- ./col -->
	<!--<div class="col-lg-3 col-6">
		<!-- small box -->
		<!--<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					
				</h3>

				<p>Perempuan</p>
			</div>
			<div class="icon">
				<i class="ion ion-female"></i>
			</div>
			<a href="index.php?page=log-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>-->

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $gagal;  ?>
				</h3>

				<p>Saldo</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-sad"></i>
			</div>
			<!--<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>-->
		</div>
	</div>
	
</div>

<?php


        $sql_cek = "SELECT * from is_users where id_user='$user'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Profil </h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table">
			<tbody>
				<tr>
					<td style="width: 150px">
						<b>Username</b>
					</td>
					<td>:
						<?php echo $data_cek['username']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Nama</b>
					</td>
					<td>:
						<?php echo $data_cek['nama_user']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Email</b>
					</td>
					<td>:

						<?php echo $data_cek['email']; ?>
					</td>
				</tr>
				<tr>
					
			</tbody>
		</table>
		<div class="card-footer">
			
		</div>
	</div>
</div>