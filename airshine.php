<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet final</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="C:\wamp64\www\img\logoicone.ico.png" href="favicon.ico">
</head>
<body>
    <nav>
        <div class="logo">
            <img class="logo" src="img/Design sans titre (3).png" alt="Logo">
        </div>

        


        <h5 class="brand">SHINE</h5>
        <div class="onglets">
            <a href="index.php">Home</a>

            <a href="Airshinexarl.php">Air Shine's X ARL</a>
            
            <a href="commandes.php">Mes commandes</a>
           
            
            <img class="imageicon" src="img\Design sans titre (16).png" id="cart-icon">
        </div>
    </nav>

  <header4>
    <video class="videopub" muted loop id="myvideo">
      <source src="img\4 eme video.mp4" type="video/mp4">


    </video>

      <style>
        .videopub{
          height: 500px;
          display:flex;
          justify-content: center;
          align-items: center;
          margin-left: px;
          position: relative;
          left:280px ;
          right: ;
          top:  ;
          bottom: ;

        


        }

        .imageicon{
        width: 40px;
        height: auto;
        cursor: pointer;
        position: relative;
        top: 17px;
      }
        


      </style>

       <script type="text/javascript">

      let video = document.getElementById("myvideo");

      video.addEventListener("mouseover",()=>{
      video.play();

    })

       video.addEventListener("mouseout",()=>{
      video.pause();

    })
      


    </script>
      







<?php
session_start();
require('config.php');

// Fonction pour ajouter un produit au panier
function ajouterAuPanier($produit, $quantite = 1) {
    // Vérifier si le produit est déjà dans le panier
    if (isset($_SESSION['panier'][$produit])) {
        // Le produit existe déjà, augmenter la quantité
        $_SESSION['panier'][$produit] += $quantite;
    } else {
        // Le produit n'existe pas, l'ajouter avec la quantité spécifiée
        $_SESSION['panier'][$produit] = $quantite;
    }
}

// Fonction pour supprimer un produit du panier
function supprimerDuPanier($produit) {
    if (isset($_SESSION['panier'][$produit])) {
        unset($_SESSION['panier'][$produit]);
    }
}

// Vérifier si un produit a été ajouté au panier
if (isset($_POST['ajouter_au_panier'])) {
    $produit = $_POST['produit'];
    $quantite = $_POST['quantite'];
    ajouterAuPanier($produit, $quantite);
}

// Vérifier si un produit a été supprimé du panier
if (isset($_GET['supprimer_produit'])) {
    $produit = $_GET['supprimer_produit'];
    supprimerDuPanier($produit);
}

// Vérifier si une commande a été validée
if (isset($_POST['valider_commande'])) {
    // Récupérer les produits du panier
    $produits = $_SESSION['panier'];
    
    // Convertir les produits en format JSON
    $produitsJson = json_encode($produits);
    
    // Insérer la commande dans la base de données
    $requete = "INSERT INTO validerpanier.commandes (produits) VALUES ('$produitsJson')";
    mysqli_query($conn, $requete);
    
    // Réinitialiser le panier
    $_SESSION['panier'] = array();
    
    // Rediriger vers la page de confirmation de commande
    header("Location: Validerpanier.php");
    exit();
}

// Afficher le panier
if (!empty($_SESSION['panier'])) {
    echo "<div class='panier'>
        <div class='titre'>Votre panier</div>";

        $total = 0;
    
    // Boucle pour ajouter les produits au panier
    foreach ($_SESSION['panier'] as $produit => $quantite) {
        // Récupérer les informations du produit depuis la base de données
        $requeteProduit = "SELECT * FROM produits WHERE nom = '$produit'";
        $resultatProduit = mysqli_query($conn, $requeteProduit);
        $rowProduit = mysqli_fetch_assoc($resultatProduit);
        $imageData = $rowProduit['image'];
        $prixProduit = $rowProduit['prix'];
       
        $sousTotal = $prixProduit * $quantite;
        
        $total += $sousTotal;
    
        echo "
        <div class='panier-contenu'>
            <div class='titre2'>" . htmlspecialchars($produit) . "</div>
            <img class='panier-img' src='data:image/png;base64," . base64_encode($imageData) . "' alt='Image du produit'><br>
            <p>Prix : $prixProduit</p>
            <p Quantité : $quantite</p>

            <p>Sous-total : $sousTotal</p>
<a href='?supprimer_produit=" . urlencode($produit) . "'>Supprimer</a>
</div>";
}
echo "<div class='total'>
<div class='total-title'>Total</div>
<div class='total-price'>$total</div>

</div>";
echo "<form method='post' action=''>
<button type='submit' name='valider_commande' class='btn-buy' onclick=\"location.href='Validerpanier.php'\">Valider la commande</button>

</form>";
echo "</div>";
} else {
echo "<div class='panier'>
<div class='titre'>Le panier est vide.</div>
</div>";
}

// Récupérer les produits depuis la base de données
$requete = "SELECT * FROM produits";
$resultat = mysqli_query($conn, $requete);

// Afficher la liste des produits avec la possibilité d'ajouter au panier
while ($row = mysqli_fetch_assoc($resultat)) {
$produit = $row['nom'];
$prix = $row['prix'];
$imageProduit = $row['image'];


echo "<div class='image-card'>
    <div class='name'> <p>" . htmlspecialchars($produit) . "</p></div>
    <img class='panier-img' src='data:image/png;base64," . base64_encode($imageProduit) . "' alt='Image du produit'><br>
    <div class='price'><p>Prix : $prix</p></div>
    <form method='post' action=''>
        <input type='hidden' name='produit' value='" . htmlspecialchars($produit) . "'>
        <label for='quantite'>Quantité :</label>
        <input type='number' name='quantite' value='1' min='1'>
        <button type='submit' name='ajouter_au_panier'>Ajouter au panier</button>
    </form>
</div>";
}

echo "</div>";

mysqli_close($conn);
?>


<div class="panier">
    <div class="logo">
            <img class="logo" src="img\Design sans titre (3).png" alt="Logo">
    </div>

    
    <h10 class="panier-title">Votre panier</h10>
   <div class="panier-contenu">
    <div class="panier-box">
      
    </div>
   </div>
    <div class="total">
     <div class="total-title">Total</div>
     <div class="total-price">$0</div>
    </div>

   <button type="button" class="btn-buy">Acheter</button>
    
     <img class="imageicone "src="img\logoicone.ico.ico" alt="image" id="close-cart">
   

    </div>
</div>














<script type="text/javascript">
  let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".panier");
let closeCart = document.querySelector("#close-cart");

cartIcon.onclick = () => {
  cart.classList.add("active");
};

closeCart.onclick = () => {
  cart.classList.remove("active");
};

if (document.readyState === "loading") {
  document.addEventListener('DOMContentLoaded', ready);
} else {
  ready();
}

function ready() {
  var removeCartButtons = document.querySelectorAll(".cart-remove");
  console.log(removeCartButtons);
  for (var i = 0; i < removeCartButtons.length; i++) {
    var button = removeCartButtons[i];
    button.addEventListener("click", removeCartItem);
  }
  var quantityInputs = document.getElementsByClassName("panier-quantité");
  for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }

  var addCart = document.getElementsByClassName("addcart");
  for (var i = 0; i < addCart.length; i++) {
    var button = addCart[i];
    button.addEventListener("click", addCartClicked);
  }
}

function removeCartItem(event) {
  var buttonClicked = event.target;
  buttonClicked.parentElement.remove();
  updateTotal(); 
}

function quantityChanged(event) {
  var input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateTotal();
}

function addCartClicked(event) {
  var button = event.target;
  var shopProducts = button.parentElement;
  var title = shopProducts.getElementsByClassName("panier-titre")[0].innerText;

  console.log(title);
}

function updateTotal() {
  var cartBoxes = document.getElementsByClassName("panier-box");
  var total = 0;
  for (var i = 0; i < cartBoxes.length; i++) {
    var cartBox = cartBoxes[i];
    var priceElement = cartBox.getElementsByClassName("panier-prix")[0];
    var quantitéElement = cartBox.getElementsByClassName("panier-quantité")[0];
    var price = parseFloat(priceElement.innerText.replace("$", ""));
    var quantité = parseInt(quantitéElement.value);

    total += price * quantité;
  }

  document.getElementsByClassName("total-price")[0].innerText = '$' + total;
}



    

    


  </script>

  <style type="text/css">


    .panier{
      position: fixed;
      top: 0;
      right: -100%;
      width: 360px;
      min-height: 100vh;
      padding: 20px;
      background: var(--bg-color);
      box-shadow: -2px 0 4px hsl(0 4% 15% * 10%);

      background: linear-gradient(#FF80F2, #f2f2f2);
     
      transition: 0.5s all;



      }

      .panier.active{
        right: 0;
        transition: 0.5s all;


      }

      .panier .titre{
        text-align: center;
        font-size: 1.5rem;
        font-weight: 600;
        position: relative;
        left: 0px;
        bottom: 0px;
        right: 80px;
      }

      .panier .titre2{
        text-align: center;
        font-size: 1.0rem;
        font-weight: 400;
        position: relative;
        left: 0px;
        bottom: 0px;
        top: 20PX;
        right: 80px;
        color: #FFFFFF;
      }

      .panier .titre3{
      
        font-size: 1.0rem;
        font-weight: 400;
        position: relative;
        left: 0px;
        bottom: 0px;
        top: 20PX;
        right: 80px;
        color: #FFFFFF;
      }


      .panier-box{
        display: grid;
        grid-template-columns: 32% 50% 18%;
        align-items: center;
        gap: 1rem;
        margin-top: 1rem;


      }

      .panier-img{
        width: 100px;
        height: 100px;
        object-fit: contain;
        padding: 10px;
        padding-right: 5px;

      }

      .detail-box{
        display: grid;
        row-gap: 0.5rem;



      }

      .cart-product-title{
        font-size: 1.5rem;
        text-transform: uppercase;

      }

      .panier-prix{
        font-weight: 500;

      }

      .panier-quantité{
        border: 1px solid black;
        outline-color: green;
        width: 2.4rem;
        text-align: center;
        font-size: 1rem;
        border-radius: 4px;

      }

      .total{
        display: flex;
        justify-content: flex-end;
        margin-top: 1.5rem;
        border-top: 1px solid;

      }

      .imageicone{
        width: 30px;
        height: auto;
        cursor: pointer;
      }

      .total-title{
        font-size: 1rem;
        font-weight: 600;

      }

      .total-price{
        margin-left: 0.5rem;
      }

      .btn-buy{
        display: flex;
        margin: 1.5rem auto 0 auto;
        padding: 12px 20px;
        border: none;
        background-color: #FF80F2 ;
        color: purple;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
      }

      .btn-buy:hover{
        background: white;
        transition: 0.5s all;
      }



      .cart-remove{
        width: 30px;
        height: auto;
        cursor: pointer;
      }

      #close-cart{
        width: 30px;
        height: auto;
        cursor: pointer;
        position: absolute;
        top: 1rem;
        right: 0.8rem;
        font-size:2rem;


        


      }

      .imageicon{
        width: 40px;
        height: auto;
        cursor: pointer;
        position: relative;
        top: 17px;
      }

</style>


  <style>
    
     .image-card {
      margin-right: 20px;
      display: inline-block;
      text-align: center;
      align-content: center;
      width: 324px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin: 10px;
      color: #FFFFFF;
      position: relative;
          left:460px ;
          right: ;
          top: 80px ;
          bottom: ;
     
      transition: transform 0.3s ease;
      
      background: linear-gradient(#FF80F2, #000000)

    }

      .videopub2{

         height: 100px;
          display:flex;
          justify-content: center;
          align-items: center;
          margin-left: px;
          position: relative;
          left:20px ;
          right: ;
          top:  ;
          bottom: ;
        
      }

    .image-card img {
      width: 300px;
      height: 300px;
      object-fit: cover;
      border-radius: 4px;
      color: #D622C9;
      
    }

    .image-card:hover  {
      transform: scale(1.1);
      
    }

    .image-card .overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .image-card:hover .overlay {
      opacity: 1;
    }

    .image-card .name {
      margin-top: 10px;
      font-weight: bold;
    }

    .image-card .price {
      margin-top: 5px;
      color: green;
    }

    

    .image-card button {
      padding: 10px 20px;
      background-color: #333;
      color: #CB6CE6;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    .addcart{
        width: 
        50px;
        height: auto;
        cursor: pointer;
        position: absolute;
        bottom: 0;
        right: 0;
        padding: 10px;
       
        
      }

      .image4{
        width: auto;
     height: 100px;
       position: relative;
      bottom: 0px;

      left: 50px;
      top: 120px;

}
   

     
     

</style>

<img  class="image4" src="img\Copie de Jaune Orange Gris Net Professionnel Maquettes Technologie financière (Fintech) Technologie Présentation                                                                                                 .png">

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

