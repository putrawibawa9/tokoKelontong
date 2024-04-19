<?php

namespace Category{
    use Connection\Connect;
    require_once "../construct.php";

class Kategori extends Connect{
    
    public function readKategori(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM kategori";
        $result = $conn->query($query);
        $kategori = $result->fetchAll();
        return $kategori;
        }


    public function addKategori2($nama_kategori){
        $conn = $this->getConnection();
        $query = "INSERT INTO kategori VALUES 
        ('',?)";
    
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam(1,$nama_kategori);
        if($stmt->execute()){
            echo "
                    <script>
                    alert('data berhasil ditambah');
                    document.location.href = 'kategori.php';
                    </script>
                ";
        }else{
            echo " <script>
            alert('data gagal ditambah');
            document.location.href = 'kategori.php';
            </script>
        ";
        }
    }

    public function addKategori($nama_kategori){
        $conn = $this->getConnection();
        
        // Check if the category already exists
        $query_check = "SELECT COUNT(*) FROM kategori WHERE nama_kategori = ?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bindParam(1, $nama_kategori);
        $stmt_check->execute();
        $count = $stmt_check->fetchColumn();
    
        if ($count > 0) {
            echo "
                <script>
                alert('Kategori Sudah Ada');
                document.location.href = 'kategori-tambah.php';
                </script>
            ";
            return; // Exit the function if category already exists
        }
        
        // If category doesn't exist, proceed with insertion
        $query_insert = "INSERT INTO kategori VALUES ('', ?)";
        $stmt_insert = $conn->prepare($query_insert);
        $stmt_insert->bindParam(1, $nama_kategori);
    
        if($stmt_insert->execute()){
            echo "
                <script>
                alert('Data berhasil ditambah');
                document.location.href = 'kategori.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('Data gagal ditambah');
                document.location.href = 'kategori.php';
                </script>
            ";
        }
    }
    


    public function deleteKategori($id_kategori){
        $conn = $this->getConnection();
        $query = "DELETE FROM kategori WHERE id_kategori = $id_kategori";
        $rowsAffected = $conn->exec($query);
    if($rowsAffected !== false){
      echo "<script>
      alert('data berhasil dihapus');
      document.location.href = 'kategori.php';
        </script>";
        }else{
        echo "  <script>
      alert('data gagal dihapus');
      document.location.href = 'kategori.php';
      </script>";
    }
}

    public function viewEachCategory($id_kategori){
        $conn = $this->getConnection();
        $query = "SELECT * FROM kategori WHERE id_kategori= $id_kategori";
        $result = $conn->query($query);
        $kategori = $result->fetch();
        return $kategori;
    }

    public function editKategori($nama_kategori,$id_kategori){
        $conn = $this->getConnection();
        $query = "UPDATE kategori SET
        nama_kategori = ?
        WHERE id_kategori = ?";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$nama_kategori);
         $stmt->bindParam(2,$id_kategori);

          //check the progress
    if ($stmt->execute()) {
        echo "
            <script>
            alert('Data berhasil diupdate');
            document.location.href = 'kategori.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Data gagal diupdate');
            document.location.href = 'kategori.php';
            </script>
        ";
    }
    }

}
}
?>