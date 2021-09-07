<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Loten trekker</title>
</head>

<body>
    <h2>Lotentrekker!</h2>
    <a href="Gebruiker_Gegevens.php">Uw lot</a><br>
    <?php if (isset($_SESSION['login'])) {?><a id="login"
        href="Loguit.php">Loguit</a><?php }else{header("refresh:0; url=Niet_Toegestaan.php");;}?>
    <?php if (isset($_SESSION['login'])) {?><h4>Welkom: <?= $_SESSION['login']?></h4><?php }else{"";}?>
    
    <?php if (isset($_SESSION['mail'])){
         echo "";
     }else{?>
        <form method="post" action="randomrecord.php">
        <label>Voer uw E-mail in:</label><br>
        <input type="email" name="GebruikerEmail" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            required></input><br>
        <button type="submit" class="btn btn-light"><?php if(isset($_SESSION['mail'])){?>trek lot<?php }else{?>Geef mail mee<?php }?></button>
    </form>
    <?php }?>
    
   

</body>

</html>