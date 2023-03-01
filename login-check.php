<?php
  include "inc/koneksi.php";
   
?>
<?php
  
	//anti inject sql
	$username=mysqli_real_escape_string($koneksi,$_POST['email']);
	$password=mysqli_real_escape_string($koneksi,$_POST['password']);

	//query login
	$sql_login = "SELECT * FROM is_users WHERE BINARY email='$username' AND password='$password'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);


	if ($jumlah_login ==1 ){
		session_start();
		$_SESSION["ses_id"]=$data_login["id_user"];
		$_SESSION["ses_nama"]=$data_login["nama_user"];
		$_SESSION["ses_username"]=$data_login["username"];
		$_SESSION["ses_password"]=$data_login["password"];
		$_SESSION["ses_level"]=$data_login["hak_akses"];
		
		echo "<script>
			
				{window.location = 'index.php';}
			})</script>";
		}else{
		echo "<script>
			
				{window.location = 'index2.php';}
			})</script>";
		}
		
