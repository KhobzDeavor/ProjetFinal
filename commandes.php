<!DOCTYPE html>
 <html lang="fr">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet final</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">

<html>  
<head>
    <title>Passer une commande</title>
    <style>
        body {
            background: linear-gradient(#CD8CFF, #f2f2f2);
            background-repeat: no-repeat;
        

        }

        .h1{
            
            text-align: center;
            
        }

        .h2{
            
            text-align: center;
            font-size: 12px;
            color: #FFFFFF;
        }

        .grey-line {
            height: 3px;
            background-color: #d3d3d3;
            width: 80%;
            display: inline-block;
            justify-content: center;
            margin-left: 20px;


        }
        
        nav.menu3 ul li.bouton {
            display: inline-block;
            justify-content: center;

            
            text-align: center;
        }

        nav.menu3 ul li.bouton a{

            
            color: white;
            text-decoration: none;
            background-color: #B24DFF;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
        }

        nav.menu3 ul li.bouton:hover a{
            color: #B24DFF;
            background-color: white;
            transition: 0.5s all;

        }
        
        .container {
            margin-top: 50px;
            background: linear-gradient(#C800FF, #f2f2f2);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 50px;

        }
        .stylefooter {
             margin-top: 100px;
             text-align: center;

        }

        
    
  

        

    


        
       

  
    .img {
        margin-left: 200px;
    }



    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .h7 {
        padding:  5px 15px;
    }
        

        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"] {
            width: 1300px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .btn  {
            display: flex;
            justify-content: center;
            padding: 10px 20px;
            background-color: #B24DFF;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            margin-left: 42%;
            margin-top: 100px;
             transition: all 0.5s;
            cursor: pointer;ds
        }

        

    </style>



    <nav>
        <div class="logo">
            <img class="logo" src="img/Design sans titre (3).png" alt="Logo">
        </div>

        


        <h5 class="brand">SHINE</h5>
        <div class="onglets">
            <a href="index.php">Home</a>
            <a href="airrshine.php">Air Shine's</a>

            <a href="Airshinexarl.php">Air Shine's X ARL</a>
            
            
            
        </div>
    </nav>

    
    
</head>
<body>
<?php
session_start();
require('config2.php');

// Effectuer la requête pour récupérer les commandes
$requeteCommandes = "SELECT * FROM commandes";
$resultatCommandes = mysqli_query($conn, $requeteCommandes);

echo "<div class='container'>";

if (mysqli_num_rows($resultatCommandes) > 0) {
    echo "<div class='container'>";
    echo " <div class='h1'>
                  <h1>Mes commandes</h1>
               </div>
               <div class='h2'>
               <h2>Toutes vos commandes sont en dessous</h2>
               </div>
               <table>
            <thead>
                <tr>
                    <th>Commandes:</th>
                 
                </tr>
            </thead>
        </table>";


    // Afficher les commandes
    while ($rowCommande = mysqli_fetch_assoc($resultatCommandes)) {
        $idCommande = $rowCommande['id'];
        $dateCommande = $rowCommande['date_commande'];
        $produitsCommande = $rowCommande['produits'];

        // Afficher les détails de la commande
        echo "<table>";
        echo "<thead>";
        echo "<p>ID de la commande : $idCommande</p>";
        echo "<p>Date de commande : $dateCommande</p>";
        echo "<p>Produits de la commande : $produitsCommande</p>";
        echo "<tr>Statut : En cours d'expedition</p>";
        echo "</thead>";
        echo "</table>";

        
        // Ajoutez ici d'autres informations de commande que vous souhaitez afficher
       
    }


     echo "</div>";
} else {
    echo "<div class='container'>";
    echo "<p>Aucune commande trouvée.</p>";

}

echo "</div>";

mysqli_close($conn);
?>



    
           
    
    
    <footer>

        <h1>Nos services</h1>
        <div class="services">
            
            <div class="service">
                <h3>Livraison gratuite</h3>
                <p>Nos magasins sont présents dans la France entière, vous pouvez commander ou bien trouver la paire de vos rêves sur place dans nos magasins !</p>
            </div>

            <div class="service">
                <h3>Paiement en ligne</h3>
                <p>Visa, PaySafeCard, AmazonPay, Paypal, Klarna,... Nous acceptons tous types de paiements en ligne de façon sécurisée !</p>
            </div>

            <div class="service">
                <h3>Aimé ou remboursé</h3>
                <p>Bien qu'il n'y ait aucune chance que vous n'appréciez pas nos produits, nous acceptons tout de même de vous rembourser si vous n'êtes pas satisfait !</p>
            </div>

        </div>

        <p id="contact">Contact : 06 70 22 72 72 | &copy; 2023, Belaid, Rhazlaoui.</p>
    </footer>

    
    
</body>
</html>