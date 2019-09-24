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
    

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
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


    <title >Lokar</title>
</head>





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
            <button type="button" class="btn btn-outline-warning" style="margin: 5px" data-toggle="modal"
                data-target="#inscription" data-whatever="@fat">s'inscrire</button>
            <button type="button" class="btn btn-outline-warning" style="margin: 5px" data-toggle="modal"
                data-target="#connection" data-whatever="@fat">se connecter</button>
        </div>
    </nav>
</div>







<!-- les modal -->





<div class="modal fade" id="connection" tabindex="-1" role="dialog" aria-labelledby="connection" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: none !important">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="log.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email :</label>
                        <input name="email"type="text" class="form-control" id="recipient-name">

                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Mot De Passe :</label>
                        <input name="passe" type="password" class="form-control" id="recipient-name">
                    </div>

            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-outline-warning" id="ok">Login</button></form>
                <button type="button" class="btn btn-outline-warning" data-dismiss="modal" id="fermer">Fermer</button>

            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="inscription" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">S'inscrire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: none !important">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="new.php" mehod="post">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nom :</label>
                        <input name="nom" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Prenom :</label>
                        <input name="pnom" type="text" class="form-control" id="recipient-name">

                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Age :</label>
                        <input name="age" type="text" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Numero de téléphone :</label>
                        <input name="age" type="text" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email :</label>
                        <input name="mail" type="email" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Confirmer l'email :</label>
                        <input name="cmail" type="email" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Mot De Passe :</label>
                        <input name="pass" type="password" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Retaper Votre Mot De Passe :</label>
                        <input name="cpass" type="password" class="form-control" id="recipient-name">
                    </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline-warning" id="ok">s'inscrire</button>
                </form><button type="button" class="btn btn-outline-warning" data-dismiss="modal" id="fermer">Fermer</button></div>
        </div>
    </div>
</div>










<!--le titre-->




<h1 class=" titre">LOKAR</h1> <!--display-1-->




<!--les div d'affichage-->

<?php
 while ($resultat = $stmt->fetch()) {
     ?>
<div class="divaffichage col-4" style="margin-top: 5%">
    <div><img src="<?php echo $resultat['Photo']?>" alt="" class="voiture"></div>
    <div class="column">
        <h3><?php echo $resultat['Marque']?> <?php echo $resultat['Modele']?></h3>
        <p><b>Motorisation: </b><?php echo $resultat['Motorisation']?> </p>
        <p><b>Prix journalier: </b><?php echo $resultat['PrixJour']?>€ </p>
        <p><b>Année: </b><?php echo substr($resultat['Date'], 0, 4) ?></p>
        <p><b>Transmission: </b><?php echo $resultat['Boite_de_Vitesse'] ?></p>
    </div>
    <button type="button" class="btn btn-outline-warning " data-toggle="modal"
        data-target="#modal<?php echo $resultat['ID']?>">Voir +</button>

</div>


<!-- la modal pour les caracteristiques quand tu click sur le voir + -->



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true" id="modal<?php echo $resultat['ID']?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle"><?php echo $resultat['Marque']?> <?php echo $resultat['Modele']?></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: none !important">
                        <span aria-hidden="true" >&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    <div class="col-md-10 ml-auto">
                        <img src="<?php echo $resultat['Photo']?>" alt="" style="border-radius: 10px; height:300px;width:500px;">
                    </div>
                    <div>
                        <h3 style="margin-top:20px">Prix journalier:</h3>
                        <h5><span style="color: orange"><?php echo $resultat['PrixJour']?>€</span></h5>
                        <h5></h5>
                    </div>
                    <div style="border-bottom: 1px solid #dee2e6; margin-top: 20px; margin-bottom: 20px "></div>
                    <h3> Critère: </h3>

                    <p><strong>Marque :</strong> <?php echo $resultat['Marque']?></p>
                    <p><strong>Modele :</strong> <?php echo $resultat['Modele']?></p>
                    <p><strong>Année-Modele :</strong> <?php echo substr($resultat['Date'], 0, 4) ?></p>
                    <p><strong>Kilometrage :</strong> <?php echo $resultat['Kilometrage']?> km</p>
                    <p><strong>Carburant :</strong> <?php echo $resultat['Motorisation']?></p>
                    <p><strong>Boite de vitesse :</strong> <?php echo $resultat['Boite_de_Vitesse'] ?></p>
                    <p><strong>Climatiseur :</strong> <?php echo $resultat['Climatiseur'] ?></p>

                    <div style="border-bottom: 1px solid #dee2e6; margin-top: 20px; margin-bottom: 20px "></div>

                    <h3>Description :</h3>
                    <p>Vends Mégane 2,116cv (7fiscaux) 1.6 16v de 2004 : <br><br>

                        139 500km ,Essence. Ct ok le 03/09/19. <br>
                        -Sièges "isofix"(pour sièges auto bébé/enfants) <br>
                        -démarrage à carte <br>
                        -Climatisation. <br>
                        -vitres électriques. <br>
                        -Centralisation <br>
                        -abs <br>

                        Voici ce qui a été remplacé récemment: <br>
                        (le 29/05/19)(factures à l'appuie) <br>
                        kit complet de distribution,pompe à eau et courroie accessoire. <br>
                        Poulie déphaseur. et électrovanne. <br>
                        Biellette de direction avec soufflet droit et gauche. <br>
                        Soufflet de cardan avant. <br>
                        Disques de freins arrière. <br>
                        Plaquettes freins arrière. <br>
                        Parrallelisme. <br>
                        Pneus arrières neuf (06/09/19). <br>
                        vidange effectué avec remplacement de TOUT les filtres. <br><br>

                        AUCUN frais à prévoir. Véhicule très propre entretenue régulièrement. <br><br>

                        Vendu 3900 euros à contre coeur pour financer l'achat d'un camion.(création d'entreprise). <br>
                        <br>

                        Je réponds aux mails, sms, ou appel au 062331599</p> <br>


                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Fermer</button>
                  <form action="pagereservation.php" method="post"><button type="submit" class="btn btn-outline-warning" value="<?php echo $resultat['ID']?>" name="iD">Onglet
                            Reservation</button></form> 
                </div>
            </div>
        </div>
    </div>

 </div>


    <?php  
 }
?>









    </body>

</html>