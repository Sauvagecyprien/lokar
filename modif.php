<?php
$servername = "localhost";
$username = "root";
$password = "brother4";
$dbname = "lokar";
$id=$_POST['id'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare(" SELECT `ID`, `Marque`, `Modele`, `Date`, `Kilometrage`, `Immatriculation`, `Nombre_de_places`, `PrixJour`, `Motorisation`, `Boite_de_Vitesse`, `Climatiseur`, `Photo`,`Description`,`Dispo` FROM `Véhicules` WHERE `ID` =$id"); 
    $stmt->execute();
    $resultat = $stmt->fetch();
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
    <title>Document</title>
</head>

<body>
    <form action="up.php" method="POST" id="for">

        <div class="champ">
            <label>Marque</label><br>
            <input value="<?php echo $resultat['Marque']?>"name="marque" type="text" class="full">
        </div>
        <div class="champ">
            <label>Modèle</label><br>
            <input value="<?php echo $resultat['Modele']?>"name="model" type="text" class="full" required="required">
        </div>
        <div class="champ">
            <label>Date d'émission de la Carte Grise</label><br>
            <input value="<?php echo $resultat['Date']?>"name="date" type="date" class="full" required="required">
        </div>
        <div class="champ">
            <label>Kilométrage</label><br>
            <input value="<?php echo $resultat['Kilometrage']?>"name="km" type="number" class="full" required="required">
        </div>
        <div class="champ">
            <label>Immatriculation</label><br>
            <input value="<?php echo $resultat['Immatriculation']?>"name="imat" type="text" class="full">
        </div>
        <div class="champ">
            <label>Nombre de place</label><br>
            <input value="<?php echo $resultat['Nombre_de_places']?>"name="nbp" type="number" class="full">
        </div>
        <div class="champ">
            <label>Prix journalier</label><br>
            <input value="<?php echo $resultat['PrixJour']?>"name="prix" type="number" class="full">
        </div>
        <div class="champ">
            <label>Icone</label><br>
            <input value="<?php echo $resultat['Photo']?>"name="ico" type="url" class="full">
        </div>
        <div class="champ">
            <label>Motorisation</label><br>
            <select name="motor" class="full">
            <option  selected="selected" value="<?php echo $resultat['Motorisation']?>"><?php echo $resultat['Motorisation']?></option>
                <option value="Essence">Essence</option>
                <option value="Diesel">Diesel</option>
            </select>
        </div>
        <div class="champ">
            <label>Climatisation</label><br>
            <select name="clim" class="full">
            <option  selected="selected" value="<?php echo $resultat['Climatiseur']?>"><?php echo $resultat['Climatiseur']?></option>
                <option value="Oui">Oui</option>
                <option value="Non">Non</option>
            </select>
        </div>
        <div class="champ">
            <label>Boites de Vitesse</label><br>
            <select name="boite" class="full">
            <option  selected="selected" value="<?php echo $resultat['Boite_de_Vitesse']?>"><?php echo $resultat['Boite_de_Vitesse']?></option>
                <option value="Automatique">Automtique</option>
                <option value="Manuel">Manuel</option>
            </select>
        </div>
        <div class="champ">
            <label>Disponibilité</label><br>
            <select name="dispo" class="full">
            <option  selected="selected" value="<?php echo $resultat['Dispo']?>"><?php echo $resultat['Dispo']?></option>
                <option value="Disponible">Disponible</option>
                <option value="Indisponible">Indisponible</option>
            </select>
        </div>
        <div class="champ">
            <label>Description</label><br>
            <textarea name="describ" class="zon" placeholder=" Ecrire votre texte..." form="for" ><?php echo $resultat['Description']?></textarea>
        </div>
        <div class="champ">
            <button type="submit" name ="id" value="<?php echo $resultat['ID']?>" class="btn btn-primary btn-block btn-large" style="margin-bottom: 5%">Envoie</button>
    </form>
</body>

</html>