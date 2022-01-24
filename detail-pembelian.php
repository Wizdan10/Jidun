<?php session_start();
include 'koneksi.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Dashboard</title>
  </head>
  <body>
     <!-- AWAL NAVBAR -->
     <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #0EA691;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="font-family: Poopins;">SELAMAT DATANG ADMIN |<b> CHILLDUST</b> </a>
            <div class="icon ms-4">
              <h5>
                <a class="fas fa-sign-out-alt me-3 text-dark" href="logout_admin.php" data-toogle="tooltip" title="Sign Out"></a>
              </h5>
            </div>
          </div>
        </div>
      </nav>
     <!-- AKHIR NAVBAR -->
    <!-- AWAL NAVBAR VERTICAL -->
      <div class="row no-gutters">
        <div class="col-md-2 bg-dark pe-3 pt-4">
          <ul class="nav flex-column ml-3 mb-5" id="nav-vertical">
            <li class="nav-item">
              <a class="nav-link text-white" href="dashboard.php"><img class="pb-2" src="img/dashboard-svgrepo-com 1.png" alt="Dashboard" style="width: 20px;"> Dashboard</a><hr class="bg-white ">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="daftarbarang.php"><img class="pb-2 me-1" src="img/add-item-alt-svgrepo-com 1.png" alt="Dashboard" style="width: 20px;">Daftar Barang</a><hr class="bg-white" >
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="daftarpengguna.php"><img class="pb-2 me-1" src="img/user-svgrepo-com 2.png" alt="Dashboard" style="width: 20px;">Daftar Pengguna</a><hr class="bg-white ">
            </li>
          </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">
          <h3><i class= "fas fa-info-circle me-1"></i>DETAIL PESANAN</h3><hr>
          
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA PEMESAN</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">NOMOR TELEPON</th>
                <th scope="col">KODE POS</th>
                <th scope="col">KELURAHAN</th>
                <th scope="col">KECAMATAN</th>
                <th scope="col">KOTA</th>
                <th scope="col">TANGGAL PEMBELIAN</th>
                <th scope="col">HARGA BAJU</th>
                <th scope="col">HARGA TOTAL</th>
                <th colspan="1" scope="col">AKSI</th>

              </tr>
            </thead>  
            <tbody>
              <tr>
                <?php 
                
                  $no = 1;
                  $data = mysqli_query($koneksi,"SELECT * FROM pembelian");
                  
                  if (mysqli_num_rows($data) > 0) {
                    while($row = mysqli_fetch_array($data)){
                      
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo $row['nama_produk'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td><?php echo $row['handphone'] ?></td>
                  <td><?php echo $row['kode_pos'] ?></td>
                  <td><?php echo $row['desa'] ?></td>
                  <td><?php echo $row['kecamatan'] ?></td>
                  <td><?php echo $row['kota'] ?></td>
                  <td><?php echo $row['tanggal_pembelian'] ?></td>
                  <td><?php echo  $row['harga_baju']?></td>
                  <td><?php echo  $row['harga']?></td>
                  <td  class="text-center"><a href="proses-hapus.php?idd=<?php echo $row['id_pelanggan'] ?>" class="btn btn-danger fas fa-trash-alt " 
                  data-toogle="tooltip" title="Delete" onclick="return confirm('Anda Yakin Ingin Menghapus Data Tersebut?')"></a></td>
                  
                </tr>
                <?php }}else{ ?>
                  <tr>
                    <td colspan="8">Tidak ada data</td>
                  </tr>
                  <?php } ?>
              </tr>
            </tbody>
          </table>

        </div>
      </div>

     <!-- AKHIR NAVBAR  VERTICAL-->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>