<?php

$servername = "localhost";
$username = "root";
$password = "brother4";
$dbname = "lokar";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT ID, Marque, Modele, Date, Kilometrage, Immatriculation, Nombre_de_places, PrixJour, Motorisation, Boite_de_Vitesse, Climatiseur, Photo FROM Véhicules"); 
    $stmt->execute();
    
    // vérifier avec phpmyadmin
    }catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
		}
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lokar</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Date d'émission Carte Grise</th>
                <th>Kilométrage</th>
                <th>Immatriculation</th>
                <th>Nombre de place</th>
                <th>Prix /Jour</th>
                <th>Motorisation</th>
                <th>Boite de vitesse</th>
                <th>Climatiseur</th>
                
                <th><a >Modifier</a></th>
                <th><a >Suprimer</a></th>
            </tr>
        </thead>
      
        <tbody>
              <?php while ($resultat = $stmt->fetch()) {
            echo"<tr><td>" .$resultat['ID']."</td><td>" .$resultat['Marque']."</td><td>" .$resultat['Modele']."</td><td>" .$resultat['Date']."</td><td>".$resultat['Kilometrage']."</td><td>".$resultat['Immatriculation']."</td><td>".$resultat['Nombre_de_places']."</td><td>".$resultat['PrixJour']."</td><td>".$resultat['Motorisation']."</td><td>" .$resultat['Boite_de_Vitesse']."</td><td> ".$resultat['Climatiseur']."</td><td><form method=\"post\" action=\"modif.php\"><button type=\"submit\" value=\"".$resultat['ID']."\" name=\"id\">Modifier</button></form></td><td><form method=\"post\" action=\"sup.php\"><button type=\"submit\" value=\"".$resultat['ID']."\" name=\"id\">Supprimer</button></form></td></tr>";
        }?>
    
        </tbody>
    </table>
    <a href="ajout.html">Ajouter</a>
</body>

</html>