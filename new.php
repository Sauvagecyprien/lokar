<?php
$servername = "localhost";
$username = "root";
$password = "brother4";
$dbname = "lokar";
$nom=$_POST['nom'];
echo $nom;
$pnom=$_POST['pnom'];
$mail=$_POST['mail'];
$cmail=$_POST['cmail'];
$age=$_POST['age'];
$age=(int)$age;
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$num=$_POST['num'];
$date= date("Y-m-d");
$x=0;
if($mail==$cmail){
    if($pass==$cpass){
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare(" SELECT Email FROM menbre ");
            $stmt->execute();
            
            while($resultat = $stmt->fetch()){
                echo $resultat['Email'];
                
                if(empty($resultat['Email'])){
                    $req = " INSERT INTO menbre(ID, Nom, Prenom, Email, Age, Pass, Date, Num) VALUES (null,'$nom','$pnom','$mail','$age','$pass','$date','$num');";
                    echo $req;
                    $conn->exec($req);
                }
                elseif($resultat['Email']==$mail){
                    $x==$x++; 
                    echo $x;
                }
            }
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }else{ echo "erreur";}
}else{echo "erreur";} 
 if($x==0){$req = " INSERT INTO menbre(ID, Nom, Prenom, Email, Age, Pass, Date, Num) VALUES (null,'$nom','$pnom','$mail','$age','$pass','$date','$num');";
           echo $req;
    $conn->exec($req);
          //  header('location: admin.php');
    }else{
    echo "erreur1";}
?>