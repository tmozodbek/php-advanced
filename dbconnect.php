<?php
#Serverga ulanish
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "news";
$q = "mysql:host=$servername;dbname=$dbname;charset-UTF8";
try{
    $conn = new PDO($q, $dbusername, $dbpassword);
} catch(PDOException $e){
    echo "Bazaga ulana olmadi: ". $e->getMessage();
}
?>