<?php

$servername = "localhost";
$username = "root";
$password = "brother4";
$dbname = "lokar";
$id=$_POST['id'];
echo $id;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("DELETE FROM Véhicules WHERE ID='$id'"); 
    $stmt->execute();
    
    // vérifier avec phpmyadmin
    }catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
		}
		

?>
