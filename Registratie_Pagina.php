<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Registratie</title>
</head>

<body>
<a href="Login_Pagina.php">Login</a>
    <?php if (isset($_SESSION['login'])) {?><h3 style="color: red;">U bent nog ingelogd als: <?= $_SESSION['login'] ?>
    </h3><?php header("refresh:4; url=Sintloten_Hoofdpagina.php");?><?php }else{echo "";}?>
    <h2>Registreren:</h2>
    <div class="form-group">
        <form method="POST" action="Registratie_Pagina_Db.php">
            <input type="text" class="form-control" style="width: 200px;" name="GebruikersNaam"
                placeholder="Gebruikersnaam" required />
            <br>
            <input type="password" pattern=".{6,}" style="width: 280px;" class="form-control"
                name="GebruikersWachtwoord" placeholder="Wachtwoord (min 6 letters)" required />
            <br>
            <button type="submit" class="btn btn-primary">Registreer</button>
        </form>
    </div>
</body>

</html>