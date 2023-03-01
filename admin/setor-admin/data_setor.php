<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Setor Tunai
        </h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">


            <br>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Transaksi</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
              $no = 1;
			  $sql = mysqli_query($koneksi,"select * from tb_setor");
              while ($data= $sql->fetch_assoc()) {
			 $tanggal         = $data['tgl'];
              $exp             = explode('-',$tanggal);
              $tanggal_masuk   = $exp[2]."-".$exp[1]."-".$exp[0];
              $jumlah = format_rupiah($data['jumlah']);
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
                        <td>
                            <a href="?page=edit-setor&kode=<?php echo $data['id_transaksi']; ?>" title="Ubah"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <!-- <a href="?page=cetak-setor&kode=<?php echo $data['id_transaksi']; ?>" target="_blank"
                                title="print" class="btn btn-success btn-sm">
                                <i class="fa fa-print"></i>
                            </a> -->

                        </td>
                    </tr>
                    <?php
              }
            ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->