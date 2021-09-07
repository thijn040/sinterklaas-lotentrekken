<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinterklaasloten";

$conn = new mysqli($servername, $username, $password, $dbname);

$UnameAdd = $_POST["GebruikersNaam"];
$PassWordAdd = $_POST["GebruikersWachtwoord"];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql1 = "SELECT gebruikersNaam FROM gebruikers WHERE gebruikersNaam='$UnameAdd'";
$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1) >= 1)
{
        echo "Dit gebruikersnaam bestaat al";
        header("refresh:3; url=Registratie_Pagina.php");
}
else
{
    $sql = "INSERT INTO gebruikers (gebruikersNaam, gebruikersWachtwoord) VALUES ('$UnameAdd', '$PassWordAdd')";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Welkom,<br>U wordt doorverwezen naar de login!";
        header("refresh:3; url=Login_Pagina.php");
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>