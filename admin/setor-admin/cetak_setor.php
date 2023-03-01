<?php

if(isset($_GETPOS['kode'])){
    $sql_cek = "SELECT * FROM 
		tb_setor WHERE id_transaksi='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
    ?>
<!DOCTYPE html>
<html>

<body>
    <h2>Bukti Setor</h2>

    <?php
    include 'config.php';
    ?>

    <table id="example1" class="table table-bordered table-striped">
        <tr>
            <th>NO</th>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>
        <?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_setor");
              while ($data= $sql->fetch_assoc()) {
            ?>
        <tr>
            <td>
                <?php echo $no++; ?>
            </td>
            <td>
                <?php echo $data['id_transaksi']; ?>
            </td>
            <td>
                <?php echo $data['tgl']; ?>
            </td>
            <td>
                <?php echo $jumlah; ?>
            </td>
            <td>
                <?php echo $data['keterangan']; ?>
            </td>
            <td>
                <?php echo $data['status']; ?>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
    <script>
    window.print();
    </script>
</body>

</html>