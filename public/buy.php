<?php

use Produk\Produk;

require_once 'classPesanan.php';
require_once '../admins/classProduk.php';

$pesanan = new Pesanan;
$id_produk = $_GET['id_produk'];

$minstock = new Pesanan;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/formjumlah.css">
</head>
<body>
        <div class="form">
      <div class="title">Terimakasih</div>
      <div class="subtitle">Masukan Jumlah Belanja</div>
        <form action="buyLogic.php" method="POST">
             <input type="hidden" name="id_produk" value="<?= $id_produk?>">
      <input type="hidden" name="tanggal_transaksi" value="<?php echo date("Y-m-d"); ?>">
      <div class="input-container ic1">
        <input autofocus type="number" name="jumlah" required id="name" class="input" type="text" placeholder=" "oninput="validateInput()" />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Jumlah Beli</label>
      </div>
      <button type="text" class="submit">submit</button>
        </form>
    </div>
    <script>
function validateInput() {
  var inputField = document.getElementById('name');
  var value = parseInt(inputField.value);

  if (value < 0) {
    inputField.setCustomValidity('Jangan pake negatif.');
  } else {
    inputField.setCustomValidity('');
  }
}
</script>
</body>
</html>