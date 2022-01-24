<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['login'])){
    header("location: login-user.php");
    exit;
  }
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$mpdf->AddPage();


$mpdf->SetFont('Arial','B',14);
$mpdf->Cell(100    ,5,'Dari',0,0);
$mpdf->Cell(30     ,5,'Kepada',0,1);
$mpdf->Cell(100    ,5,'CHILLDUST',0,0);

$kategori = mysqli_query($koneksi,"SELECT DISTINCT nama,handphone,kode_pos,alamat,desa,kecamatan,kota,tanggal_pembelian,harga 
                          FROM pembelian WHERE nama='{$_SESSION['nama']}' ORDER BY id_pelanggan");
                if (mysqli_num_rows($kategori) > 0) {
                  while($row = mysqli_fetch_array($kategori)){
                    $mpdf->Cell(30    ,5,$row['nama'],0,1);
                    $mpdf->Cell(110    ,5,'',0,0);
                    $mpdf->Cell(30    ,5,'',0,1);
                    
                    $mpdf->SetFont('Arial','B',10);
                    
$mpdf->SetFont('Arial','B',10);
$mpdf->Cell(100     ,5,'Alamat: Jalan Jend urip sumoharjo',0,0);
$mpdf->Cell(70    ,5,$row['alamat'],0,1);
$mpdf->Cell(100     ,5,'RT.01/01 Kecamatan Cikarang Utara',0,0);
$mpdf->Cell(70    ,5,'Desa '.$row['desa'],0,1);
$mpdf->Cell(100     ,5,'Kabupaten Bekasi',0,0);

$mpdf->Cell(70   ,5,'Kecamatan '.$row['kecamatan'],0,1);
$mpdf->Cell(100     ,5,'No. 089529103923',0,0);
$mpdf->Cell(70    ,5,$row['kota'],0,1);
$mpdf->Cell(100    ,5,'',0,0);
$mpdf->Cell(70     ,5,'No. '.$row['handphone'],0,1);
$mpdf->Cell(100    ,5,'',0,0);
$mpdf->Cell(70     ,5,'Tanggal Pemesanan: '.$row['tanggal_pembelian'],0,1);
$mpdf->Cell(100    ,5,'',0,1);
$mpdf->Cell(100    ,5,'',0,1);
                  }}
$html = '<table border="1" cellpadding="10" cellspacing="0" >
<thead>
  <tr>
    <th scope="col">NO</th>
    <th scope="col">NAMA BARANG</th>
    <th scope="col">BERAT</th>
    <th scope="col">JUMLAH</th>
    <th scope="col">HARGA</th>
  </tr>
</thead>

<tbody>';
$ongkir=18000;
$final_harga=0;
$i=1;
foreach($_SESSION["cart"] as $cart =>$val){
$html .= '<tr>
            <td>'.$i++.'</td>
            <td>'.$val["nama"].'</td>
            <td>'.$val["berat"].'</td>
            <td>'.$val["jumlah"].'</td>
            <td>'.number_format($val["harga"]).'</td>
</tr>';
}
foreach($_SESSION["cart"] as $cart =>$val){ 
    $subtotal = $val["harga"]*$val["jumlah"];
                        $total_harga+= $subtotal;
                        $final_harga=$total_harga+$ongkir;
 }
$html .= '</tbody>
          </table>
          <h4>Ongkir: '.number_format($ongkir). '</h4>
          <h3>Total: '.number_format($final_harga).'</h3>';
          
$mpdf->writeHTML($html);
$mpdf->Output();