
 <?php
    $servername = "localhost";
    $dbname = "lokar";
    session_start();
    $ID=$_SESSION['id'];
    $nom=$_SESSION['nom'];
    
    

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'brother4',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM menbre WHERE ID='$ID'");
    $stmt->execute();
    $resultat = $stmt->fetch();
    $stamt = $conn->prepare("SELECT * FROM reservation WHERE ID_membres='$ID'");
    $stamt->execute();   
?>







<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="CSS/stylepagemembre.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


  <title>Lokar</title>
</head>

<body>





  <!-- la navbar-->






  <div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="navbar">
      <img src="images/logovoiture.png" width="90" height="50" alt="" style="margin-left:20px">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


        </ul>
        <form class="form-inline my-2 my-lg-0" style="margin-right: 30%">
          <input class="form-control mr-sm-2" type="search" placeholder="Rechercher..." aria-label="Rechercher">
          <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Rechercher</button>
        </form>



        <div class="dropdown">
          <img src="images/photodeprofil.jpg" alt="" style="width: 50px; height:50px; border-radius:50px">
          <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 20px">
           <?php echo $nom ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="espacemembre.html">Mon Compte</a>
            <a class="dropdown-item" href="deconnexion.php">Déconnection</a>

          </div>
        </div>
      </div>
    </nav>
  </div>









  <!--la parti du body -->
  <div class="flex">

    <div class="divreservation col-8">


      <h4 style="text-align: center; margin-top:10px; margin-bottom:20px">Liste des reservations :</h4>
      <table class="table table-hover" id="tableau">
        <thead class="thead-dark">
          <tr>
            <th scope="col">commande</th>
            <th scope="col">Marque</th>
            <th scope="col">Modèle</th>
            <th scope="col">Début location</th>
            <th scope="col">Fin location</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while($result = $stamt->fetch()){

         
          ?> <tr>
          
            <th><?php echo $result['ID'] ?></th>
            <td><?php $model=explode(" ",$result['Modele']);
echo $model[0]; ?></td>
            <td><?php $model=explode(" ",$result['Modele']);
echo $model[1]; ?></td>
            <td><?php echo $result['Date_de_debut'] ?></td>
            <td><?php echo $result['Date_de_fin'] ?></td>
            <td><button type="button" class="btn btn-outline-primary">Modifier</button></td>
            <td><button type="button" class="btn btn-outline-secondary">Supprimer</button></td>
           
          </tr> <?php
          }
            ?>
        </tbody>
      </table>


    </div>















    <div class="divclient col-2 ">
      <h4 style="text-align: center; margin-top: 10px">Vos informations :</h4>
      <div class="flex">
        <img src="images/photodeprofil.jpg" alt=""
          style="width: 100px; height:100px; border-radius:50px; margin-top: 10px">
      </div>
      <div class="info" style="margin-top: 20px">
        <p><span> Nom : </span><?php echo $resultat['Nom']?>  </p>
        <p><span>Prenom : </span> <?php echo $resultat['Prenom']?></p>
        <p><span>Email : </span><?php echo $resultat['Email']?></p>
        <p><span>Numero :</span> 0<?php echo $resultat['Num']?></p>
        <p><span>Age : </span><?php echo $resultat['Age']?> ans</p>
      </div>

      <div class="flex" style="margin-top: 20px"> <button type="button" class="btn btn-outline-warning" data-toggle="modal"
        data-target="#inscription" data-whatever="@fat" id="modifier">Modifier</button></div>

    </div>



















                          <!-- la modal pour modifier les informations -->


    <div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="inscription"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifier mes informations :</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="new.php" mehod="post">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nom :</label>
                <input name="nom" type="text" class="form-control" id="recipient-name" value="<?php echo $resultat['Nom']?>">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Prenom :</label>
                <input name="pnom" type="text" class="form-control" id="recipient-name" value="<?php echo $resultat['Prenom']?>">

              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Age :</label>
                <input name="age" type="number" class="form-control" id="recipient-name" value="<?php echo $resultat['Age']?>">

              </div>



              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email :</label>
                <input name="mail" type="email" class="form-control" id="recipient-name" value="<?php echo $resultat['Email']?>">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Mot De Passe :</label>
                <input name="pass" type="password" class="form-control" id="recipient-name" value="<?php echo $resultat['Pass']?>">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Retaper Votre Mot De Passe :</label>
                <input name="cpass" type="password" class="form-control" id="recipient-name">
              </div>

          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-primary" id="ok">Modifier</button>
            </form><button type="button" class="btn btn-warning" data-dismiss="modal" id="fermer">Fermer</button></div>
            
        </div>
      </div>
    </div>








</body>

</html>