<?php
require_once 'classCategory.php'; 
require_once '../admin/header.php'; 


$kategori = new Category\Kategori;



$hasil = $kategori->readKategori();

?>


    
    
    
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
      <h3>Category</h3>
      <a href="kategori-tambah.php" class="btn btn-warning mb-3">Tambah</a>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Category</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($hasil as $row):?>
              <tr>
                <td class="text-center"><?=$row['id_kategori']?></td>
                <td><?=$row['nama_kategori']?></td>
                <td class="text-center">
                  <a href="kategori-form.php?id_kategori=<?=$row['id_kategori'];?>" class="btn btn-primary btn-sm">Ubah</a>
                  <a href="kategori-delete.php?id_kategori=<?=$row['id_kategori'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Hapus</a>
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
 
<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-category').addClass('active');
</script>