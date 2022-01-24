<?php 
  session_start();
  
  include 'koneksi.php';
  
  if(!isset($_SESSION['login'])){
    header("location: login-user.php");
    exit;
  }

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="style/checkout.css">
    <title>Halaman Buy</title>
</head>
<body>
        
        <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container">
                <a class="navbar-brand me-5 text-success" href="#">CHILLDUST</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Produk Men-1.php" >Men</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Produk Women.php">Women</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="Produk Sale.php" >Sale</a>
                    </li>
                    <li class="nav-item">
                        <i class="cart fas fa-shopping-cart ms-5"><a class="text-dark" href="keranjang.php" style="text-decoration: underline;">Cart</a></i>
                    </li>
                    <?php 
                    
                    $data = mysqli_query($koneksi, "SELECT * FROM register WHERE nama = '{$_SESSION['login']}'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <li class="nav-item">
                        <i class="fas fa-user "><a class="text-dark" href="profile-ubah.php" ><?php echo $d['nama']?></a></i>
                    </li>
                    <?php }?>
                    
                    
                    <li class="nav-item">
                    <i class=" fas fa-sign-out-alt me-3 text-dark"><a href="logout.php"class="text-dark" data-toogle="tooltip" title="Sign Out">LogOut</a></i>
                    </li>

                    
                </div>
                </div>
            </nav>
    <div class="content-container">
        <div class="wrapper">
            <div class="content">
                <p class="keranjang">Checkout</p>
                <br><br>
                
                <ul class="checkout-items">
                    <li>
                    <?php 
                                if (!empty($_SESSION["cart"])) {
                                    
                                    foreach($_SESSION["cart"] as $cart =>$val){ 
                                ?>
                            <li>
                                <label for="cb1" class="cb">
                                    <div class="card" style="width: 16rem; background-color: #F9D080;">
                                        <img src="product-men/<?php echo $val["gambar"];?>" alt="Kosong">
                                    </div>
                                    <div class="item-name">
                                        <p><?php echo $val["nama"]; ?></p>
                                        <p>Rp <?php echo  number_format($val["harga"]); ?> </p>
                                        <div class="edit">
                    
                                            <div class="del-btn">
                                                <a href="hapus-cart.php?id=<?php echo $cart ?>"><img src="assets/delete.svg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <?php }}else{

                             ?>
                             <h5>Barang Kosong!</h5>
                             <?php }?>  
                    </li>   
                </ul>
                <br><br>
                <hr class="sec">
                <div class="delivery">
                    <p class="text-d">
                        Opsi Pengiriman
                    </p>
                    <label for="exampleInputKodepos" class="form-label text-danger"><b>*ONGKIR UNTUK SEKITAR JABODETABEK RP 18.000</b></label><br>
                    <label for="exampleInputKodepos" class="form-label text-danger"><b>*PEMBAYARAN MENGGUNAKAN COD</b></label>
                    <h5></h5>
                    <hr>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><b>Nama</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="nama">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputNohp" class="form-label"><b>NO.HP</b></label>
                                <input type="text" class="form-control" id="exampleInputNohp"
                                    aria-describedby="emailHelp" name="handphone">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputKodepos" class="form-label"><b>KODE POS</b></label>
                                <input type="text" class="form-control" id="exampleInputKodepos" name="kode_pos">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                            <label for="exampleInputAlamat" class="form-label"><b>KELURAHAN</b></label>
                                <input type="text" class="form-control" id="exampleInputKodepos" name="desa">
                                
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                            <label for="exampleInputAlamat" class="form-label"><b>KECAMATAN</b></label>
                                <input type="text" class="form-control" id="exampleInputKodepos" name="kecamatan">
                                
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                            <label for="exampleInputAlamat" class="form-label"><b>KOTA/KABUPATEN</b></label>
                                <input type="text" class="form-control" id="exampleInputKodepos" name="kota">
                                
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputAlamat" class="form-label"><b>ALAMAT</b></label>
                                <textarea type="text" class="form-control" id="exampleInputAlamat"
                                    aria-describedby="emailHelp" name="alamat"></textarea>
                                
                                
                            </div>
                        </div>
                        
                        
                        
                    </div>
                <br><br>
                <hr class="sec">
                <div class="payment">
                    <p class="text-p">
                        Harga Pembelian
                    </p>
                </div>
                <br><br>
                <div class="total-bayar">
                    <h5>Total</h5>
                    
                </div>
                <div class="total-harga">
                    <?php 
                     $total_harga = 0;
                     $final_harga=0;
                     $harga = 18000;
                     foreach($_SESSION["cart"] as $cart =>$val){ 
                        $subtotal = $val["harga"]*$val["jumlah"];
                        $total_harga+= $subtotal;
                        $final_harga=$total_harga+$harga;
                     }
                    ?>
                    <p><?php echo number_format($final_harga); ?> </p>
                </div>
                <br><br>
                <input type="submit" class="btn open-btn" value="Submit" name="buy" id="open"></input>
                </form>
                
                <?php 
                
              if (isset($_POST['buy'])) {  
                foreach($_SESSION["cart"] as $cart =>$val){
                $nama= $_POST['nama'];
                $nama_produk=  $val['nama'];
                $handphone = $_POST['handphone'];
                $kode_pos = $_POST['kode_pos'];
                $alamat = $_POST['alamat'];
                $kecamatan = $_POST['kecamatan'];
                $desa = $_POST['desa'];
                $kota = $_POST['kota'];
                $alamat = $_POST['alamat'];
                $tanggal_pembelian = date("y-m-d");
                $harga_baju=$val["harga"];
                $total=$final_harga;
                
                
                $item_name = mysqli_real_escape_string($koneksi,$val['nama']);
                $insert = mysqli_query($koneksi,"INSERT INTO pembelian VALUES(
                    null,
                    '".$nama."',
                    '".$item_name."',
                    '".$handphone."',
                    '".$kode_pos."',
                    '".$alamat."',
                    '".$desa."',
                    '".$kecamatan."',
                    '".$kota."',
                    '".$tanggal_pembelian."',
                    '".$harga_baju."',
                    '".$total."')");
                }
                    if($insert){
                        $_SESSION['nama'] = $_POST['nama'];
                        echo '<script>window.location="invoice.php" </script>';
                    }else{
                        echo 'Gagal'.mysqli_error($koneksi);
                    }
              }
              ?>
               </div> 
            
        </div>
    </div>
    
    <script src="main.js"></script>
    <script src="ongkir.js"></script>
    
    
    
</body>
</html>