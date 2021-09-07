<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <?php if (isset($_SESSION['login'])) {?><h3 style="color: red;">U bent al ingelogd als: <?= $_SESSION['login'] ?>
    </h3><?php header("refresh:4; url=Sintloten_Hoofdpagina.php");?><?php }else{echo "";}?>
    <h2>Login:</h2>
    <form method="POST" action="Login_Pagina_Db.php">
        <input type="text" style="width: 200px;" class="form-control" name="GebruikersNaam" placeholder="Gebruikersnaam"
            required />
        <br>
        <input type="password" style="width: 280px;" pattern=".{6,}" class="form-control" name="GebruikersWachtwoord"
            placeholder="Wachtwoord (min 6 letters)" required />
        <br>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <form action="Registratie_Pagina.php">
        <button type="submit" style="float: right;" class="btn btn-dark">Registreren</button>
    </form>
</body>

</html>