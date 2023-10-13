<?php
session_start();
if(isset($_SESSION['loggedin'])){
    unset($_SESSION['loggedin']);
    unset($_SESSION['success']);

}

header("Location: /admin/index.php");
exit();



?>