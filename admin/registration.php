<?php
session_start();

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confpass = $_POST['confirm-password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if($password != $confpass){
        $_SESSION['error'] = "Password va Confirm Password bir xil emas";
    }else{
        include "../dbconnect.php";
        $state = $conn->prepare("SELECT * FROM user WHERE username=:username");
        $state->bindValue(":username", $username); 
        $state->execute();

        if($state->rowcount() > 0){
            $_SESSION['error'] = "Bunday email bilan allaqachon ro'yxatdan o'tilgan";
        }else{
            $role = "author";
            $password = password_hash($password, PASSWORD_DEFAULT);
            $state = $conn->prepare("INSERT INTO user (username, password, firstname, lastname, role)
            VALUES(:username, :password, :firstname, :lastname, :role) ");
            try{
                $state->execute(["username"=>$username, "password"=>$password, "firstname"=>$firstname, "lastname"=>$lastname, "role"=>$role]);
                $_SESSION['success'] = "ok";
                header("Location: /admin/login.php");exit();
            }catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
            }
            
            
        }
    }
}else{
    $_SESSION['error'] = "Maydonlarni to'ldiring";
}
header("Location: register.php");

?>