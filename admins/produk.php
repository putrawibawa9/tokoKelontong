<?php
require_once 'classProduk.php'; 
require_once '../admin/header.php'; 


$hasil = new Produk\Produk;
$burger = $hasil->readProduk();
?>


  
    
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
      <h3>Produk</h3>
      <a href="produk-tambah.php" class="btn btn-warning mb-3">Tambah</a>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Kategori</th>
              <th class="text-center">Nama Produk</th>
              <th class="text-center">Jumlah Stok</th>
              <th class="text-center">Deksripsi</th>
              <th class="text-center">Gambar</th>
              <th class="text-center">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($burger as $row):?>
              <tr>
                <td class="text-center"><?=$row['id_produk']?></td>
                <td><?=$row['nama_kategori']?></td>
                <td><?=$row['nama_produk']?></td>
                <td><?=$row['jumlah_stok']?></td>
                <td><?=$row['keterangan_produk']?></td>
                <td class="text-center"><img src="../img/<?=$row['gambar']?>" width="100px"></td>
                <td>
                  <a href="produk-form.php?id_produk=<?=$row['id_produk'];?>" class="btn btn-success btn-sm">Ubah</a>
                  <a href="produk-delete.php?id_produk=<?=$row['id_produk'];?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?');">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php require_once '../admin/footer.php';?>

<?php require_once '../admin/footer.php';?>
<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-binatang').addClass('active');

</script>
 
        