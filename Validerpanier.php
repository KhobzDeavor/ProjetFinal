<!DOCTYPE html>
<html>
<head>
  <title>Validation du Panier</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

</head>
<body>
    <nav>
        

        


        
        
    </nav>

  <h1>Validation du Panier</h1>
  <form action="traitement_formulaire.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
    
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required>
    
    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" required>
    
    <label for="adresse">Adresse de facturation :</label>
    <input type="text" id="adresse" name="adresse" required>
    
    <label for="code_postal">Code Postal :</label>
    <input type="text" id="code_postal" name="code_postal" required>
    
    <label for="telephone">Numéro de téléphone :</label>
    <input type="text" id="telephone" name="telephone" required>
    
    <label for="carte_bleue">Numéro de carte bleue :</label>
    <input type="text" id="carte_bleue" name="carte_bleue" required>
    
    <label for="code_securite">Code de sécurité :</label>
    <input type="text" id="code_securite" name="code_securite" required>
    
    <button type="button" class="cf" onclick="window.location.href = 'commandes.php';">Valider le paiement</button>
  </form>
<style type="text/css">
  body{
    margin: 0px;
    padding: 0px;
    font-family: 'Montserrat', sans-serif;
    background: linear-gradient(#CD8CFF, #f2f2f2);
    background-repeat: no-repeat;
  
}

h1 {
  text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
}

label {
  display: block;
  margin-top: 10px;
}

input[type="text"] {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
}

.cf {
  display: block;
  width: 100%;
  margin-top: 20px;
  padding: 10px;
  background-color: #CD8CFF;
  color: #fff;
  border: none;
  cursor: pointer;
}

@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap');
html{
    scroll-behavior: smooth;
}



nav{
    display:flex;
    flex-wrap:wrap;
    justify-content: center;
    align-items: center;
    border-bottom: 3px solid #FFA9F9;
}
nav h1{
    color: #FFA9F9;
    font-family: 'Playfair Display', serif;
    font-size: 30px;
}
nav .onglets{
    margin-top: 3px;
    margin-left: 300px;
}
nav .onglets a{
    text-decoration: none;
    color: #000;
    margin-right: 10px;
    border-bottom: 1px solid #000;
    padding-bottom: 5px;
    text-align: center;
}

header{
    display: flex;
    flex-direction: column;
    align-items: center;
    background: url('https://wallpapercave.com/wp/wp5753409.jpg');
    background-size: cover;
    color: #ffffff;
    padding: 40px;
}
header h1{
    font-family: 'Playfair Display', serif;
    font-size: 50px;
}
header h4{
    margin-top: -20px;
    font-size: 20px;
    text-align: center;
    border-bottom: 1px solid #ffffff;
}
header button{
    padding: 10px 20px;
    background-color: #ffffff;
    color:#000;
    border:none;
    margin-bottom: 30px;
    outline:none;
    font-size: 20px;
    font-family: 'Playfair Display', serif;
    cursor: pointer;
}

.main{
    margin-top: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.main .content .card{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom:20px;
}
.main .content .card .left{
   flex: 0 0 30%;
   padding: 20px;
   background-color: #D622C9;
   color:#fff;
}
.main .content .card .right img{
    height:300px;
    width: 400px;
    margin-top: 5px;
}

footer{
    margin-top: 100px;
    border-top: 5px solid #6f6f6f;
    background-color: rgb(0, 0, 0);
    color: #ffffff;
    margin-top: 65px;
    padding: 30px 100px;;
    position: relative;
          left:px ;
          right: ;
          top: 100px ;
          bottom: ;w
        }
}
footer h1{
    font-family: 'Playfair Display', serif;
    border-bottom: 1px solid rgb(255, 255, 255);
    width: 20%;
    padding-bottom: 5px;
}
footer .services{
    margin-top: -10px;
    display:flex;
    flex-wrap:wrap;
   

}
footer .services .service{
    margin-right: 30px;

}
footer .services .service p{
    max-width: 300px;
}
footer #contact{
    color: rgb(181, 181, 181);
}

@media screen and (max-width:680px){
    nav .onglets {
        margin-left: 0px;
        margin-bottom: 20px;
    }
    .main .card {
        margin: 10px;
    }
    .main .content .card .right img{
        height:200px;
        width: 100%;
        margin-top: -0px;
    }
    .main .content .card{
        display: block;
    }
    footer{
        padding: 30px;
    }
}

.logo {
        height: 100px;
        width: 100px;
      margin-right: 20px;
      }

.brand {
      font-size: 35px;
      font-weight: bold;
      font-family: "Arial", sans-serif; 

    }

nav.menu ul li.bouton{
    list-style-type: none;
    display: inline-block;


}

.image2{
    position: relative;
    bottom: 1150px;
    right: 30px;
}

.image-4{
    position: relative;
    bottom: 1100px;
    left: 600px;
}

nav.menu ul li.bouton a{
    color: white;
    text-decoration: none;
    background-color: darkred;
    padding: 5px;
    padding-left: 20px;
    padding-right: 20px;
    font-size: 30px;

}

nav.menu ul li.bouton:hover a{
    color: red;
    background-color: white;
    transition: 0.5s all;

}

    

    .slider-container {
      position: relative;
      width: 400px;
      height: 300px;
      overflow: hidden;
      margin-top: 50px;
      margin-right: ;
      margin-left: 550px;
      border-radius: 8px;

    }

    .slider {
      display: flex;
      transition: transform 1.3s ease-in-out;
    }

    .slider img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .slider-controls {
      display: flex;
      justify-content: center;
      margin-top: 10px;
    }

    .slider-controls button {
      margin: 0 5px;
      padding: 8px 12px;
      background-color: #B24DFF;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .slider-controls button:hover {
      background-color: white;
    }
  


</style>
</body>
</html>