<?php
require_once 'config/config.php';



if(isset($_SESSION['user_id'])){
    header('Location' . BASE_URL . '/app/' . $_SESSION['user_role'] . '/index.php');
}

$error='';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $login = trim($_POST['login'] ?? '' );
    $password = $_POST['password'] ?? '';

    

    $error = 'Invalid Login Credentials';

    if ($login=== '' || $password ===''){

        // Log Incomplete
        logActivity($pdo,null,$login,'login','failed');

    }else{

    $result = loginUser($pdo,$login,$password);

    if($result===true){
        logActivity(
            $pdo,$_SESSION['user_id'],
            $_SESSION['user_email'],
            'login',
            'success'
        );
        
        header('Location:' . BASE_URL . '/app/' . $_SESSION['user_role'] . '/index.php');
        exit;



    }elseif($result=== 'active_session'){
        echo 'This Account is already logged in on another device';
        $error = 'This Account is already logged in on another device';
        

    }else{

        $error = 'Invalid login credentials';
    }
    }

}


?>


<!DOCTYPE html>
<html lang="en">
    <html lang="en" data-bs-theme="dark">
        
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    
  <div class="d-flex justify-content-center align-items-center min-vh-100">
<form method="POST">

   <?php if (!empty($error)): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?> 

    <label>Username or Email</label>
    <input type="text" name="login" class="form-control"  required>

    <br>
    <br>
    <label>Password</label>
    <input type="password"
            name="password" class = "form-control" 
            required>
    <br>
    <button type="submit">Sign In</button>
    
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.8/js/bootstrap.bundle.min.js"></script>
</body>
</html>