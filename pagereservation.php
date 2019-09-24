
    <?php
    session_start();
    $nom= $_SESSION['nom'];
    $ID = $_POST['iD'];
    $servername = "localhost";
    $dbname = "lokar";
   

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'brother4',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM Véhicules WHERE ID='$ID'");
    $stmt->execute();
    $resultat = $stmt->fetch();?>
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
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher..."
                        aria-label="Rechercher">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Rechercher</button>
                </form>



                <div class="dropdown">
                    <img src="images/photodeprofil.jpg" alt="" style="width: 50px; height:50px; border-radius:50px">
                    <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 20px">
                        <?php echo $_SESSION['nom']?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="espacemembre.php">Mon Compte</a>
                        <a class="dropdown-item" href="deconnexion.php">Déconnection</a>

                    </div>
                </div>



            </div>
        </nav>
    </div>


    <h1 class="display-1 titre" style="margin-right: 5%; margin-top:2%">LOKAR</h1>



    <div class="divaffichagereservation">

        <div class="flex2" style="width:100%; margin-top: 20px">
            <img src="<?php echo $resultat['Photo'] ?>" alt=""
                style="border-radius: 10px; height:300px; width: 500px; margin-top: 60px">
        </div>


        <h2 style="margin: 40px; text-align:center">Vous avez choisi la <?php echo $resultat['Marque']?>
            <?php echo $resultat['Modele']?><input type="hidden" form="formu" name="id" value="<?php echo $resultat['ID']?>"></h2>

        <form action="resa.php" id="formu"method="post">

            <div class="col-md-10 ml-auto row " style="margin-top: 10px; align-items: center;">
                <div class="column ">
                    <h5>debut de location:</h5>
                    <input id="input" name="ddebu" type="date" />
                </div>
                <div style="text-align:center;margin-left: 10%">
                    <h5>au :</h5>
                </div>
                <div class="column" style="margin-left: 10%">
                    <h5>fin de location:</h5>
                    <input id="input1"  name="dfin" type="date" />
                </div>
            </div>
        </form>






        <div style="height: 80px"></div>




















    </div>
<div class="boutonbas">
    <div style="width: 50%;margin-left: 25%; margin-top: 10px">
        <button type="submit" form="formu" class="btn btn-outline-warning btn-lg btn-block">Veuillez confirmez votre reservation</button>

       <a href="index.php"> <button type="button" class="btn btn-outline-warning btn-lg"
            style="margin-top: 10px; margin-left: 34%; width: 300px">Annuler</button></a>

    </div>
</div>




    <div style="height: 600px"></div>






</body>

</html>