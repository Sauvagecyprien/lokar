<?php session_start();
$id=$_SESSION['id'];
$idv=$_POST['id'];
$ddebu=$_POST['ddebu'];
$dfin=$_POST['dfin'];

$servername = "localhost";
$username = "root";
$password = "brother4";
$dbname = "lokar";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare(" SELECT ID, Nom, Prenom, Num FROM menbre WHERE ID='$id'");
            $stmt->execute();
            $resultat = $stmt->fetch();

            $ID=$resultat['ID'];
            $nom= $resultat['Nom']." ".$resultat['Prenom'];
            $num= "0".$resultat['Num'];
            echo $nom." ".$num;
    
            $stamt = $conn->prepare(" SELECT ID, Marque, Modele, Immatriculation FROM Véhicules WHERE ID='$idv'");
            $stamt->execute();
            $resultat = $stamt->fetch();

            $IDV=$resultat['ID'];
            $model=$resultat['Marque']." ".$resultat['Modele'];
            $imat=$resultat['Immatriculation'];
            
   $req = " INSERT INTO reservation(ID, ID_membres, Nom, Ntelephone, ID_vehicule, Modele, Imatriculation, Date_de_debut, Date_de_fin) VALUES (null,'$ID','$nom','$num','$IDV','$model','$imat','$ddebu','$dfin');";
           echo $req;
   $conn->exec($req);
            header('location: index.php');
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>