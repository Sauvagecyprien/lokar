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
$id= $_POST['id'];
$dispo=$_POST['dispo'];
$describ=$_POST['describ'];
$cac=chr(92);

$describ = str_replace("'", $cac."'", $describ);
$describ = str_replace('"', $cac.'"', $describ);
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = " UPDATE Véhicules SET  Marque='$marque', Modele='$model', Date='$date', Kilometrage='$km', Immatriculation='$imat', Nombre_de_places='$nbp', PrixJour='$prix', Motorisation='$motor', Boite_de_Vitesse='$boite', Climatiseur='$clim', Photo='$ico', Description='$describ', Dispo='$dispo' WHERE ID='$id'";
            $conn->exec($req);
            header('location: admin.php');
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
?>