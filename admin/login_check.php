<?php
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "../dbconnect.php";
    $state = $conn->prepare("SELECT * FROM user WHERE username=:username");
    $state->execute(["username"=>$username]);

    if($state->rowCount() > 0){
        $user = $state->fetch();
        if(password_verify($password, $user["password"])){
            $_SESSION["success"] = "ok";
            $_SESSION["loggedin"] = "1";
            header("Location: /admin/index.php");exit;
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['error'] = "Parol xato!";
        }
    }else{
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['error'] = "Bunday emailli foydalanuvchi mavjud emas";
    }
}
header("Location: /admin/login.php  ");
?>