<?php
if(isset($_POST['login'])){
    include_once "../construct.php";
    include_once "../auth.php";

    $auth = new Auth;


    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $auth->loginAdmin($username, $password);
}

if (isset($_GET['error']) && $_GET['error'] == 1) {
    $error = $_GET["error"];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    
    
    <div class="container mt-5">
   
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-center">
                        Login Admin
                    </div>

                    <div class="card-body">
                    <?php if(isset($error)): ?>
                <p style="color : red">Username / Password salah</p>
                <?php endif; ?>
                         <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" name="username" placeholder="username" class="form-control">
                            </div>

                            <div class="mb-3">
                                <input type="password" name="password" placeholder="password" class="form-control">
                            </div> 

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="login" name="login">Login</button>
                                </div>
                                </div>
                        <a href="../index.php" class="btn btn-sm btn-primary">Login User</a>
                </div> 
                         </form>
                        </div>
                </div> 
            </div>
        </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>