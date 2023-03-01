<?php

  $sql = $koneksi->query("SELECT COUNT(id_user) as pend  from is_users");
  while ($data= $sql->fetch_assoc()) {
    $pend=$data['pend'];
  }

  $sql = $koneksi->query("SELECT sum(jumlah) as total from tb_setor");
  while ($data= $sql->fetch_assoc()) {
	$jumlah = format_rupiah($data['total']);
    
  }

  $sql = $koneksi->query("SELECT sum(total) as tarik  from tb_tarik ");
  while ($data= $sql->fetch_assoc()) {
    $gagal=$data['tarik'];
  }

  $sql = $koneksi->query("SELECT sum(total) as tunai  from tb_tunai ");
  while ($data= $sql->fetch_assoc()) {
    $total=$data['tunai'];
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

                <p>Total User</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-folder"></i>
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

                <p>Total Setor tunai</p>
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
		small box -->
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
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>
                    <?php echo $gagal;  ?>
                </h3>

                <p>Total Tarik Tunai</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-happy"></i>
            </div>
            <!--<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>-->
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    <?php echo $total;  ?>
                </h3>

                <p>Total Transfer tunai</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-sad"></i>
            </div>
            <!--<a href="index.php?page=data-kartu" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>-->
        </div>
    </div>
    <!-- ./col -->

    <!--<a href="index.php?page=data-dusun" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>-->

</div>


<!-- <?php session_start();
include('config.php');
?> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>





</head>

<body>
    <br />
    <form method="post">
        <div class="form-group">
            <div id="container"></div>
        </div>
    </form>

    </div>




</body>

</html>