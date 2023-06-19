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

<style type="text/css">
  .tete{
    position: relative;
    right: 400px;
  }

  .tete2{
    position: relative;
    right: 400px;
  }
</style>
  <head>

    <nav>
      <div class="tete">
        <div class="logo">
            <img class="logo" src="img/Design sans titre (3).png" alt="Logo">
        </div>
      </div>

        

      <div class="tete2">
        <h5 class="brand">SHINE</h5>


        <div class="onglets">
            
        </div>
     
    </nav>
</head>

<?php
require('config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $_SESSION['username'] = $username;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn,$query) or die(mysql_error());
  
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if ($user['type'] == 'admin') {
      header('location: admin/home.php');      
    }else{
      header('location: index.php');
    }
  }else{

   
    

  }
}
?>

<body>

<div class="product-container">
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title">
</h1>
<h1 class="box-title">Connexion</h1>
<div class="form-group">
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
       
</div>
<div class="form-group">
  <input type="password" class="box-input" name="password" placeholder="Mot de passe">
       
</div>
<div class="form-group">
  <input type="submit" value="Connexion " name="submit" class="box-button">

       
</div>

<div class="form-group message">
  <p class="box-register">Vous êtes nouveau ici? 
  <a href="register.php">S'inscrire</a>

</div>






</p>
</div>




     
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
<style type="text/css">
  
  .product-container {
      max-width: 800px;
      margin: 0 auto;
      background: linear-gradient(#FF80F2, #f2f2f2);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      padding: 20px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 20px;
      margin-top: 150px;

    }

    /* Réinitialisation des styles par défaut */


h1 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

.form-group {
  margin-bottom: 20px;
  position: relative;
  left: 190px;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #555;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group button {
  width: 100%;
  padding: 10px;
  background-color: white;
  color: black;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.form-group button:hover {
  background-color: white;
}

.form-group .message {
  margin-top: 10px;
  text-align: center;
  color: #888;
  position: relative;
  left: 50px;
}

.form-group .message a {
  
  text-decoration: none;
  color: white;
  cursor: pointer;
  transition: 0.3ease;

  
  transition: 0.5s all;
}

.form-group .message a:hover {
  text-decoration: underline;
}

.box-title{
  position: relative;
  left: 190px;
}

/* Réinitialisation des styles par défaut */


}

h1 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #555;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group button {
  width: 100%;
  padding: 10px;
  background-color: #555;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.form-group button:hover {
  background-color: #333;
}

.form-group .message {
  margin-top: 10px;
  text-align: center;
  color: #888;
}

.form-group .message a {
  color: #555;
  text-decoration: none;
}

.form-group .message a:hover {
  text-decoration: underline;
}



</style>

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

</body>
</html>