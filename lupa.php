<?php
  include "inc/koneksi.php";
   
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lupa Password | FORAS RECORD</title>
	<link rel="icon" href="dist/img/Foras.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<center>
					<img src="dist/img/foras.png" width=170px />
					<br>
					
				</center>


				<form action="" method="post">
					<div class="input-group mb-3">
						<input type="email" class="form-control" name="username" placeholder="Email" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-email"></span>
							</div>
						</div>
					</div>
					
 
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-danger btn-block btn-flat" name="btnLogin" title="Kirim">
								<b>Kirim</b>
							</button>
						</div>

						</div>
 <center> <a href="login.php"> Kembali </a></center>
				</form>

				</div>
			</div>
		</div>
		<!-- /.login-box -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- Alert -->
		<script src="plugins/alert.js"></script>

</body>

</html>

<?php





if (isset($_POST['btnLogin'])) {  
	//anti inject sql
	  $sql_simpan = "INSERT INTO tb_pesan(id_pesan,email) VALUES (
			'".$_POST['']."',
            
			
			'".$_POST['username']."')";
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Pesan Terkirim',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'login.php';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Pesan Gagal Dikirim',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'lupa.php';
          }
      })</script>";
    }}