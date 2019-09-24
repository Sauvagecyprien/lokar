<?php
$servername = "localhost";
$username = "root";
$password = "brother4";
$dbname = "lokar";
$marque=$_POST['marque'];
$model=$_POST['model'];
$km=$_POST['km'];
$date=$_POST['date'];
$imat=$_POST['imat'];
$nbp=$_POST['nbp'];
$prix=$_POST['prix'];
$ico=$_POST['ico'];
$motor=$_POST['motor'];
$clim=$_POST['clim'];
$boite= $_POST['boite'];
$describ= $_POST['describ'];
$dispo= $_POST['dispo'];
$cac=chr(92);

$describ = str_replace("'", $cac."'", $describ);
$describ = str_replace('"', $cac.'"', $describ);
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = " INSERT INTO Véhicules(ID, Marque, Modele, Date, Kilometrage, Immatriculation, Nombre_de_places, PrixJour, Motorisation, Boite_de_Vitesse, Climatiseur, Photo, Description, Dispo) VALUES (null,'$marque','$model','$date','$km','$imat','$nbp','$prix', '$motor','$boite','$clim', '$ico','$describ', '$dispo');";
            $conn->exec($req);
            header('location: admin.php');
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
?>