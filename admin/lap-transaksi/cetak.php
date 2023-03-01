<?php
session_start();
ob_start();
require_once "../../config/database.php";
// Panggil koneksi database.php untuk koneksi database
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

// ambil data hasil submit dari form
$jekel1    = $_GET['label'];


if (isset($_GET['label'])) {
    $query = mysqli_query($mysqli, "SELECT a.id_penjualan,a.periode,a.sumber,a.konten,a.rbt,a.pajak,a.jumlah, a.bagi_hasil,a.rincian,a.id_user,b.id_user,b.label from tb_rincian a inner join is_users b on a.id_user=b.id_user where a.id_user") 
                                    or die('Ada kesalahan pada query tampil  : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);

}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN DATA PENJUALAN</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            LAPORAN DATA PENJUALAN
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                         <th height="20" align="center" valign="middle">NO.</th>
                         <th height="20" align="center" valign="middle">ID PENJUALAN</th>
                        <th height="20" align="center" valign="middle">PERIODE </th>
                        <th height="20" align="center" valign="middle">SUMBER</th>
                        <th height="20" align="center" valign="middle">AUDIO/VIDEO</th>
                        <th height="20" align="center" valign="middle">RBT</th>
                        <th height="20" align="center" valign="middle">PAJAK</th>
                     <th height="20" align="center" valign="middle">KONSUL</th>
                     <th height="20" align="center" valign="middle">BAGI HASIL</th>
                        <th height="20" align="center" valign="middle">RINCIAN</th>
                     
                    </tr>
                </thead>
                <tbody>
<?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                       <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
					 <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
					
                </tr>";
    }
    // jika data tidak ada
    else {
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            

            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                      <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[id_penjualan]</td>
                        <td width='80' height='13' align='center' valign='middle'>$tanggal_masuk</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[sumber]</td>
                        <td style='padding-left:5px;' width='155' height='13' valign='middle'>$data[konten]</td>
                        <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'>$data[rbt]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[pajak]</td>
						 <td width='80' height='13' align='center' valign='middle'>$data[jumlah]</td>
						  <td width='80' height='13' align='center' valign='middle'>$data[bagi_hasil]</td>
						   <td width='80' height='13' align='center' valign='middle'>$data[rincian]</td>
                    </tr>";
            $no++;
        }
    }
?>	
                </tbody>
            </table>

            <div id="footer-tanggal">
               <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Foras Record
            </div>
            
            <div id="footer-nama">
                ----
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN DATA TRANSAKSI.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>