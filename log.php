<?php
$servername = "localhost";
$username = "root";
$password = "brother4";
$dbname = "lokar";

$email = $_POST["email"];
$pass = $_POST["passe"];
echo $email;

echo $pass;


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM menbre WHERE Email = '$email'"); 
    $stmt->execute();

    // set the resulting array to associative
   $result = $stmt->fetch();
   

   if (!$result){
       echo 'mauvais';
   }
   else {
       if ($result['Pass']==$pass) {
          
           session_start();
           $_SESSION['id'] = $result['ID'];
           $_SESSION['nom'] = $result['Nom']." ".$result['Prenom'];
           
           $id = $_SESSION['id'];
           echo $_SESSION['pnom'];
           
            header('Location: index.php');
       }
       else {
           echo'Mauvaise indentification ou mot de pass ' ;
       }
   }


?>