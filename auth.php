<?php


require_once "construct.php";
class Auth extends Connection\Connect{
    public $error =false;
    public $row;


    public function register($username, $password){
        $connection = $this->getConnection();
    
        // Check if the username already exists
        $query = "SELECT COUNT(*) as count FROM user WHERE username = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // If the count is greater than 0, it means the username already exists
        if($row['count'] > 0) {
            echo "<script>
            alert('Username sudah ada');
            document.location.href = 'register.php';
      </script>";
        }
    
        // If username doesn't exist, proceed with insertion
        $query = "INSERT INTO user (username, password) VALUES (?, ?)";
        $result = $connection->prepare($query);
        $result->execute([$username, $password]);
    
        return $result;
    }


    
public function login ($username, $password){

    $connection = $this->getConnection();

    $query = "SELECT * FROM user WHERE username = ? AND password = ?";
    $result = $connection->prepare($query);

    $result->execute([$username, $password]);
    if($this->row = $result->fetch()){
        header("Location: public/shop.php");
    }else{
        $this->error = True;
        header("Location: index.php?error=1");
        exit();
    };
   
    }
public function loginAdmin ($username, $password){

    $connection = $this->getConnection();

    $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $result = $connection->prepare($query);

    $result->execute([$username, $password]);
    if($this->row = $result->fetch()){
        header("Location: index.php");
    }else{
        $this->error = True;
        header("Location: login-admin.php?error=1");
        exit();
    };
   
    }

public function logout(){
    header("Location: ../index.php");
    exit;
}
}
?>