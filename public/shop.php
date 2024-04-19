<?php

use Produk\Produk;

session_start();
require '../admins/classProduk.php';
require 'classPesanan.php';

$products = new Produk;

$product = $products->readProduk();

if (isset($_SESSION['login'])) {
  $user_id = $_SESSION['dataUser']['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- title -->
  <title>Toko Kelontong</title>

  <!-- css -->

  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

</head>

<body id="home">

  <!-- navbar -->
  <nav class="navbar-container">
    <div class="navbar-logo">
      <h3><a href="./">Toko Kelontong</a></h3>
    </div>
    <div class="navbar-box">
      <ul class="navbar-list">
        <li><a href=""><i class="fas fa-home"></i> Beranda</a></li>
          <li><a href="../index.php"><i class="fas fa-lock"></i> Logout</a></li>
      </ul>
    </div>
    <div class="navbar-toggle">
      <span></span>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- all product -->
  <section class="product" id="shop">
    <div class="product-content">
      <div class="row">
        <?php foreach ($product as $product) : ?>
          <div class="col-md-4" data-aos="zoom-in">
            <div class="card-custom">
              <div class="card-custom-header">
                <img src="../img/<?= $product['gambar'] ?>" alt="" class="img-custom">
              </div>
              <div class="card-custom-body d-flex justify-content-between">
                <div class="card-custom-text my-auto">
                  <h4 class="m-0"><?= $product['nama_produk'] ?></h4>
                  <p><?= $product['keterangan_produk'] ?></p>
                  <span class="d-block font-weight-bold mb-3">Jumlah Stok :<?= $product['jumlah_stok'] ?></span>
                </div>
              </div>
              <a href="buy.php?id_produk=<?=$product['id_produk']?>" class="btn btn-sm btn-primary">Beli</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- akhir all product -->

  <!-- footer -->
  <section class="footer bg-dark" id="contact">
    <div class="footer-content">

      <div class="row">
        <div class="col-md-5 my-3 mx-auto" data-aos="fade-in">
          <h4 class="text-light text-poppins font-weight-bold">Link Terkait</h4>
          <div class="d-flex flex-column">
            <a href="#home" class="text-light font-weight-light">Home</a>
          </div>
        </div>
        <div class="col-md-5 my-3 mx-auto" data-aos="fade-in">
          <h4 class="text-light text-poppins font-weight-bold">Toko Kelontong</h4>
          <p class="d-block font-weight-light text-light">
          Toko kelontong masa kini
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="d-flex justify-content-center align-items-center text-center flex-column mx-auto">
            <span class="d-block text-light">© Copyright <strong>2024</strong>. All Right Reserved</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir footer -->

  <!-- javascript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- <script src="https://kit.fontawesome.com/6d2ea823d0.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="assets/script.js"></script>

  <script>
    $('#success').hide();
    $('#close-alert').on('click', () => {
      $('#success').hide();
    })
    // ajax add to cart
    function addToCart(productId, qty, user_id) {
      $.ajax({
        url: 'add-to-cart.php',
        method: 'post',
        data: {
          product_id: productId,
          user_id: user_id,
          qty: qty
        },
        cache: false,
        success: function(res) {
          let result = JSON.parse(res);
          console.log(result)
          if (result.statusCode === 200) {
            window.location.href = './my-cart'
          } else {
            $('#success').hide()
          }
        }
      })
    }
  </script>

</body>

</html>