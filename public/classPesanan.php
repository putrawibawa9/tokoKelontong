<?php

use Connection\Connect;

    require_once "../construct.php";


class Pesanan extends Connection\Connect{
    public function viewPesanan(){
        $conn = $this->getConnection();
        $query = "SELECT *
        FROM pesanan
        JOIN produk ON pesanan.Id_produk = produk.Id_produk
        JOIN pelanggan ON pesanan.Id_pelanggan = pelanggan.Id_pelanggan;";  
        $result = $conn->query($query);
        $pesanan = $result->fetchAll();
        return $pesanan;
        }

        public function viewTransaksi($id_transaksi){
            $conn = $this->getConnection();
            $query = "SELECT *
            FROM transaksi
            JOIN produk ON transaksi.id_produk = produk.id_produk
             WHERE id_transaksi = $id_transaksi";  
            $result = $conn->query($query);
            $pesanan = $result->fetch();
            return $pesanan;
            }

        public function konfirmasiPesanan($Id_pesanan){
            $conn = $this->getConnection();
            $query = "DELETE FROM pesanan WHERE Id_pesanan = $Id_pesanan";
            $result = $conn->exec($query);
            return $result;
        }

        function viewStock($id_produk){
            $conn = $this->getConnection();
            $query = "SELECT jumlah_stok FROM produk WHERE id_produk = ?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $id_produk);
            $stmt->execute();
            
            // Fetch the result
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                // Return jumlah_stok if the query is successful
                return $result['jumlah_stok'];
            } else {
                // Return false or handle the error accordingly
                return false;
            }
        }
        


        function minStock( $id_produk, $jumlah ){
            $conn = $this->getConnection();

            $jumlah_stok = $this->viewStock($id_produk);
            if ($jumlah > $jumlah_stok) {
                echo "
                <script>
                alert('pesanan melebihi stok');
                document.location.href = 'shop.php';
                </script>
            ";
            exit;
            }

            $query    = "UPDATE produk SET jumlah_stok = jumlah_stok - $jumlah WHERE id_produk = $id_produk ";
            $conn->exec($query);
            

        }

        function transaksiTerakhir(){
            $conn = $this->getConnection();
            $query ="SELECT MAX(id_transaksi) FROM transaksi;";
            $result = $conn->query($query);
            $id_transaksi = $result->fetch();
            return $id_transaksi;
        }

        public function addTransaksi($data){
        $conn = $this->getConnection();

        $id_produk = $data['id_produk'];
        $tanggal_transaksi = $data['tanggal_transaksi'];
        $query = "INSERT INTO transaksi VALUES 
        ('',?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$tanggal_transaksi);
        $stmt->bindParam(2,$id_produk);
        $stmt->execute();
        return true;
    }
}





?>