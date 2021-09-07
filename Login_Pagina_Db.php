<?php 
session_start();
$Uname = $_POST["GebruikersNaam"];
$_SESSION['login'] = $Uname;
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinterklaasloten";

$conn = new mysqli($servername, $username, $password, $dbname);

$Uname = $_POST["GebruikersNaam"];
$PassWord = $_POST["GebruikersWachtwoord"];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM gebruikers WHERE gebruikersNaam='$Uname' and gebruikersWachtwoord='$PassWord'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

if ($count == 1)
    {
        echo "Welkom " . $Uname ;
        $sql1 = "UPDATE gebruikers SET lotingebruik='1' where gebruikersNaam='$Uname';";
        $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        header("refresh:3; url=Sintloten_Hoofdpagina.php");
    }
else
    {
        echo "Login Gegevens kloppen niet!";
        header("refresh:3; url=Login_Pagina.php");
        session_destroy();
    }
$conn->close();
?>