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
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .invoice {
            width: 80%;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header,
        .invoice-body {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .invoice-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .invoice-body {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .invoice-body .left {
            flex: 1;
        }

        .invoice-body .right {
            flex: 1;
            text-align: right;
        }

        .invoice-item {
            margin-bottom: 10px;
        }

        .invoice-item:last-child {
            margin-bottom: 0;
        }

        .invoice-item .description {
            font-weight: bold;
        }

        .invoice-total {
            margin-top: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            Invoice
        </div>
        <div class="invoice-body">
            <div class="left">
                <div class="invoice-item">
                    <div class="description">ID Transaksi :</div>
                    <div><?= $detailTransaksi["id_transaksi"]?></div>
                </div>
                <div class="invoice-item">
                    <div class="description">Nama Barang:</div>
                    <div><?= $detailTransaksi["nama_produk"]?></div>
                </div>
                <div class="invoice-item">
                    <div class="description">Date:</div>
                    <div><?= $detailTransaksi["tanggal_transaksi"]?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Link back to the homepage -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="shop.php">Back</a>
    </div>
</body>
</html>

