<?php
require_once 'classPesanan.php';

$jumlah = $_POST["jumlah"];
$id_produk = $_POST["id_produk"];
$tanggal_transaksi = $_POST["tanggal_transaksi"];


// var_dump($tanggal_transaksi);
// exit;
$logic = new Pesanan;

$pesanan = $logic->addTransaksi($_POST);

$id_transaksis = $logic->transaksiTerakhir();

$logic->minStock($id_produk, $jumlah);

$id_transaksi = $id_transaksis["MAX(id_transaksi)"];

$detailTransaksi = $logic->viewTransaksi($id_transaksi);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/invoice.css">
</head>
<body>
    <div class="container mt-6 mb-7">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-xl-7">
        <div class="card">
          <div class="card-body p-5">
            <h2>
              Hey Customer,
            </h2>
            <p class="fs-sm">
              This is the receipt for a payment of shopping in my toko kelontong.
            </p>

            <div class="border-top border-gray-200 pt-4 mt-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="text-muted mb-2">Payment No.</div>
                  <strong><?= $detailTransaksi["id_transaksi"]?></strong>
                </div>
                <div class="col-md-6 text-md-end">
                  <div class="text-muted mb-2">Payment Date</div>
                  <strong><?= $detailTransaksi["tanggal_transaksi"]?></strong>
                </div>
              </div>
            </div>


            <table class="table border-bottom border-gray-200 mt-3">
              <thead>
                <tr>
                  <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-0"><?= $detailTransaksi["nama_produk"]?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <a href="shop.php" class="btn btn-dark btn-lg card-footer-btn justify-content-center text-uppercase-bold-sm hover-lift-light">
            <span class="svg-icon text-white me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-g</title><path d="M336,208V113a80,80,0,0,0-160,0v95" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><rect x="96" y="208" width="320" height="272" rx="48" ry="48" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></rect></svg>
            </span>
            Pay and Back
          </a>
        </div>
      </div>
    </div>
  </div>



<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>