<?php
include_once "header.php";

include_once "../admins/classProduk.php";


$result = new Produk\Produk;
$binatang = $result->readProduk();


?>


            <div class="row">
                <div class="col-12 p-5">
                    <h1 class="display-4"> Rosya</h1>
                
                    <p align="justify">Project untuk Sertifikasi Skema Programmer</p>
                    <br>
                 
                </div>
                <div class="row">
                    <div class="col-12">
                      
                    </div>
                </div>
            </div>
              

<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-about').addClass('active');
</script>
