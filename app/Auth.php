<?php

namespace App;

class Auth extends DB{
    public function __construct(){
        Parent::__construct();
    }

    public function setEmail($email){
        return $this->email = $email;
    }

    public function setPassword($password){
        return $this->password = $password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $stmt = $this->db->prepare($sql);   

        $stmt->execute();
        $row = $stmt->fetch();

        if(!empty($row)){
            $_SESSION['email'] = $row['email'];
            return header('location: layouts/app.php');
        }else{
            return header('location: layouts/auth.php');
        }
    }

    public function logout(){
        session_destroy();
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        return header('location: ../index.php');
    }
}