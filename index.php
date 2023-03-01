<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
	header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
	  $data_level = $_SESSION["ses_level"];
    }

    //KONEKSI DB
    include "inc/koneksi.php";require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FINCGO</title>
	<link rel="icon" href="dist/img/izin.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-red navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">
						<font color="white">
							<b>FINCGO</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/admin.ico">
					</div>
					<div class="info">
						<a href="#" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
          if ($data_level=="Admin"){
        ?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dasboard
								</p>
							</a>
						</li>

						

						
						<li class="nav-item">
								<a href="?page=setor-admin" class="nav-link">
								<i class="nav-icon fas fa-wallet"></i>
								<p>
									Setor Tunai
								</p>
							</a>
						</li>
                                               <li class="nav-item">
								<a href="?page=tarik-admin" class="nav-link">
								<i class="nav-icon fa fa-comment-dollar"></i>
								<p>
									Tarik Tunai
								</p>
							</a>
						</li>


                                                                <li class="nav-item">
								<a href="?page=tunai-admin" class="nav-link">
								<i class="nav-icon fa fa-coins"></i>
								<p>
									Transfer Tunai
								</p>
							</a>
						</li>

                                                                <li class="nav-item">
								<a href="?page=antar-admin" class="nav-link">
								<i class="nav-icon fa fa-paper-plane"></i>
								<p>
									Transfer Antar Bank
								</p>
							</a>
						</li>
                                                                            
                                                                 <li class="nav-item">
								<a href="?page=kirim-admin" class="nav-link">
								<i class="nav-icon fa fa-credit-card"></i>
								<p>
									KUAT
								</p>
							</a>
						</li>


						<li class="nav-header">Setting</li>
						<li class="nav-item">
							<a href="?page=data-pengguna" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
									Data User
								</p>
							</a>
						</li>



						<?php
          				} elseif($data_level=="User"){
          				?>

						<li class="nav-item">
							<a href="?page=view-berita" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
                                                               <li class="nav-item">
								<a href="?page=data-setor" class="nav-link">
								<i class="nav-icon fas fa-wallet"></i>
								<p>
									Setor Tunai
								</p>
							</a>
						</li>
 
						

						
 <li class="nav-item">
								<a href="?page=data-tarik" class="nav-link">
								<i class="nav-icon fa fa-comment-dollar"></i>
								<p>
									Tarik Tunai
								</p>
							</a>
						</li>
						
<li class="nav-item">
								<a href="?page=data-tunai" class="nav-link">
								<i class="nav-icon fa fa-coins"></i>
								<p>
									Transfer Tunai
								</p>
							</a>
						</li>
<li class="nav-item">
								<a href="?page=data-antar" class="nav-link">
								<i class="nav-icon fa fa-paper-plane"></i>
								<p>
									Transfer Antar Bank
								</p>
							</a>
						</li>
<li class="nav-item">
								<a href="?page=data-kirim" class="nav-link">
								<i class="nav-icon fa fa-credit-card"></i>
								<p>
									KUAT
								</p>
							</a>
						</li>

						<!--<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-file"></i>
								<p>
									Kelola Surat
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="suket-domisili" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Domisili</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Kelahiran</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Kematian</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Pendatang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Su-Ket Pindah</p>
									</a>
								</li>
							</ul>
						</li>-->

						<!--<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-print"></i>
								<p>
									Kelola Laporan
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="http://localhost/sistem_penduduk/lap-kedantangan.php" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Penduduk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Kartu Keluarga</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Lahir</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Meninggal</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Pendatang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">
										<i class="nav-icon far fa-circle text-warning"></i>
										<p>Data Pindah</p>
									</a>
								</li>
							</ul>
						</li>-->

						<li class="nav-header">Setting</li>

						<?php
							}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-arrow-circle-right"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              
				//Pengguna
				case 'data-pengguna':
					include "admin/pengguna/data_pengguna.php";
					break;
				case 'add-pengguna':
					include "admin/pengguna/add_pengguna.php";
					break;
				case 'edit-pengguna':
					include "admin/pengguna/edit_pengguna.php";
					break;
				case 'del-pengguna':
					include "admin/pengguna/del_pengguna.php";
					break;

				//kartu KK
				case 'data-setor':
					include "admin/setor-user/data_setor.php";
					break;
				case 'add-setor':
					include "admin/setor-user/add_setor.php";
					break;
				case 'edit-lsetor':
					include "admin/setor-user/edit_lagu.php";
					break;
			
				case 'del-setor':
					include "admin/setor-user/del_lagu.php";

					break;

				case 'del-kartu':
					include "admin/kartu/del_kartu.php";
					break;
				case 'view-kartu':
						include "admin/kartu/view_kartu.php";
						break;



				//penduduk
				case 'data-tarik':
					include "admin/tarik-user/data_tarik.php";
					break;
				case 'add-tarik':
					include "admin/tarik-user/add_tarik.php";
					break;
				case 'edit-rincian':
					include "admin/rincian/edit_rincian.php";
					break;
case 'edit-jual':
					include "admin/rincian/edit_jual.php";
					break;
				case 'del-rincian':
					include "admin/rincian/del_rincian.php";
					break;
				case 'view-rincian':
					include "admin/rincian/view_rincian.php";
					break;

				//lahir
				case 'data-tunai':
					include "admin/transfer-user/data_tunai.php";
					break;
				case 'add-tunai':
					include "admin/transfer-user/add_tunai.php";
					break;
				case 'edit-transaksi':
					include "admin/transaksi/edit_transaksi.php";
					break;
				case 'del-transaksi':
					include "admin/transaksi/del_transaksi.php";
					break;
				case 'view-transaksi':
						include "admin/transaksi/view_transaksi.php";
						break;

				//mendu
				case 'data-antar':
					include "admin/antar-user/data_antar.php";
					break;
				case 'add-antar':
					include "admin/antar-user/add_antar.php";
					break;
				case 'edit-berita':
					include "admin/berita/edit_berita.php";
					break;
				case 'del-pesan':
					include "admin/pesan/del_pesan.php";
					break;
				case 'view-berita':
						include "admin/berita/view_berita.php";
						break;

				//pindah
				case 'data-kirim':
					include "admin/kirim-user/data_kirim.php";
					break;
				case 'add-kirim':
					include "admin/kirim-user/add_kirim.php";
					break;
				case 'transaksi-user':
					include "admin/transaksi_user/data_transaksi.php";
					break;

				case 'del-jenis':
					include "admin/jenis/del_jenis.php";
					break;
				case 'view-jenis':
						include "admin/jenis/view_jenis.php";
						break;

				//datang
				case 'setor-admin':
					include "admin/setor-admin/data_setor.php";
					break;
				case 'add-admin':
					include "admin/setor-admin/add_setor.php";
					break;
				case 'edit-setor':
					include "admin/setor-admin/edit_setor.php";
					break;
				case 'del-pesan':
					include "admin/sms/del_pesan.php";
					break;
				case 'view-datang':
						include "admin/datang/view_datang.php";
						break;
					
				//suket
				case 'tarik-admin':
					include "admin/tarik-admin/data_tarik.php";
					break;
				case 'add-as':
					include "surat/suket_lahir.php";
					break;
				case 'edit-tarik':
					include "admin/tarik-admin/edit_tarik.php";
					break;
				case 'suket-datang':
					include "surat/suket_datang.php";
					break;
				case 'suket-pindah':
					include "surat/suket_pindah.php";
					break;

					//dusun
				case 'tunai-admin':
					include "admin/transfer-admin/data_tunai.php";
					break;
				case 'add-dusun':
					include "admin/dusun/add_dusun.php";
					break;
				case 'edit-tunai':
					include "admin/transfer-admin/edit_tunai.php";
					break;
				case 'del-dusun':
					include "admin/dusun/del_dusun.php";
					break;
				case 'view-dusun':
						include "admin/dusun/view_dusun.php";
						break;

                                //laporan
				case 'antar-admin':
					include "admin/antar-admin/data_antar.php";
					break;
                                case 'edit-antar':
					include "admin/antar-admin/edit_antar.php";
					break;
				case 'kirim-admin':
					include "admin/kirim-admin/data_kirim.php";
					break;
				case 'edit-kirim':
					include "admin/kirim-admin/edit_kirim.php";
					break;
				case 'del-dusun':
					include "admin/dusun/del_dusun.php";
					break;
				case 'view-dusun':
						include "admin/dusun/view_dusun.php";
						break;
					
				

          
              //default
              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Admin"){
              include "home/admin.php";
              }
          elseif($data_level=="User"){
              include "home/kaur.php";
              }
          }
    ?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<!--<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="">
					<strong> elseif software house</strong>
				</a>
				All rights reserved.
			</div>-->
			<center><b>Copyright &copy; FINCGO 2023 </b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>