<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loguit</title>
</head>
<body>
<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinterklaasloten"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$sql1 = "UPDATE gebruikers SET lotingebruik='0' where gebruikersNaam='{$_SESSION['login']}';";
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

session_destroy();?>
<br><h2>Uitgelogd!</h2>
<?php header("refresh:3; url=Login_Pagina.php");?>
</body>
</html>
