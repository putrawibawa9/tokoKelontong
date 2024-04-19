<?php 
    require_once '../admin/header.php';
    require_once 'classProduk.php';
    require_once 'classCategory.php';
?>

<?php
$id_produk = $_GET['id_produk'];


$data = new Produk\Produk;
$semuakategori = new Category\Kategori;

$kategori = $semuakategori->readKategori();
$result= $data->readTwoTablepart2($id_produk);

if(isset($_POST['submit'])){

    $edit = new Produk\Produk;
    $result = $edit->editProduk($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'produk.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'produk.php';
        </script>
    ";

    }

}

?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Edit Produk</h3>


        <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="id_produk" value="<?= $id_produk ?>;">
        <input type="hidden" name="gambarLama" value="<?= $result['tableKat']['gambar']?>">

    <div class="mb-3">
        <select class="form-select" name="id_kategori" required>
            <option value="<?= $result['tableKat']['id_kategori'] ?>"><?= $result['tableKat']['nama_kategori'] ?> </option>
            <?php foreach ($kategori as $ktg) : ?>
                <option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['nama_kategori'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>


            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" value="<?= $result['tableBin']['nama_produk']?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Stok</label>
                <input type="text" name="jumlah_stok" class="form-control" value="<?= $result['tableBin']['jumlah_stok']?>" required>
            </div>
            
            
            <div class="mb-3">
                <label class="form-label"> Deskripsi Produk</label>
            <textarea class="form-control" name="keterangan_produk" rows="3" placeholder="Keterangan Binatang"  required><?= $result['tableBin']['keterangan_produk']?></textarea>
            </div>

            <img src="../img/<?= $result['tableBin']['gambar'] ?>" width="100px" height="100px">

            <div class="mb-3">
                <label for="gambar" class="form-label"> Gambar Produk</label>
                <input type="file" name="gambar" class="form-control" >
            </div>

            <a href="produk.php" class="btn btn-success" >Back</a>
            <button type="submit" class="btn btn-primary" name="submit" >Save</button>
        </form>
    </div>
  </div>
</div>


<?php require_once '../admin/footer.php';?>

<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-binatang').addClass('active');
</script>
