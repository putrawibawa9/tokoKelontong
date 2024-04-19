<?php

require_once 'classProduk.php';

$burger = new Produk\Produk;
$id_produk = $_GET['id_produk'];

if ($burger->deleteProduk($id_produk)){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'produk.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'produk.php';
            </script>";
}


?>