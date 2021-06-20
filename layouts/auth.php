<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo ASSET; ?>css/auth.css">
</head>
<body>
    <?php
        require_once "env.php";

        $login = new App\Auth();
        if (isset($_POST['submit'])) {
            $login->setEmail($_POST['email']);
            $login->setPassword($_POST['password']);

            $login->login();
        }  
    ?>

    <?php
        if(!isset($_GET['email'])){
            include 'pages/auth/login.php';
        }
    ?>
</body>
</html>