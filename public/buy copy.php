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
<title>Sample Form</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.container h2 {
  text-align: center;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  background-color: #4caf50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #45a049;
}
</style>
</head>
<body>
<div class="container">
  <h2>Jumlah Beli</h2>
  <form action="buyLogic.php" method="POST">
      <input type="hidden" name="id_produk" value="<?= $id_produk?>">
      <input type="hidden" name="tanggal_transaksi" value="<?php echo date("Y-m-d"); ?>">

    <div class="form-group">
      <label for="name">Jumlah Beli:</label>
      <input autofocus type="number" id="name" name="jumlah" required oninput="validateInput()">
    </div>
    <button type="submit">Submit</button>
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
