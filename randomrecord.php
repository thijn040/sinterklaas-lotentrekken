<?php 
session_start();
$Email = $_POST["GebruikerEmail"];
$_SESSION['mail'] = $Email;
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinterklaasloten";

$conn = new mysqli($servername, $username, $password, $dbname);

$emailGebruiker = $_POST['GebruikerEmail'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$sql = "SELECT gebruikersNaam FROM gebruikers WHERE lotingebruik='0' and gebruikerGeloot='0' ORDER BY RAND() LIMIT 1;";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$sql3 = "SELECT * from gebruikers where lotgebruikt = '1' and gebruikersNaam = '{$_SESSION['login']}'";
$result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));

$count = mysqli_num_rows($result3);

if ($count == 1)
{
    //header("refresh:0; url=al_lot_getrokken.php"); 
}
else if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo "U heeft " . $row['gebruikersNaam'] . " getrokken,";
    $getrokkenlot = $row['gebruikersNaam'];
    
    $sql1 = "UPDATE gebruikers SET getrokkenLot = '$getrokkenlot' WHERE gebruikersNaam = '{$_SESSION['login']}';";
    $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

    $sql2 = "UPDATE gebruikers SET lotgebruikt = '1' WHERE gebruikersNaam = '{$_SESSION['login']}';";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

    $sql4 = "UPDATE gebruikers SET gebruikerGeloot = '1' WHERE gebruikersNaam = '$getrokkenlot';";
    $result4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
} else {
    echo "Er zijn geen loten meer"; 
}
?>
<br>
<a href="Sintloten_Hoofdpagina.php">Home</a>
<br>
<a href="Gebruiker_Gegevens.php">Account gegevens</a>
<br>
<a href='mailto:<?= $emailGebruiker;?>?subject=Getrokken%20lot%20&body=Hallo%20<?= $_SESSION['login']?>,%0A%0AUw%20getrokken%20lot%20is:%20<?php if(isset($getrokkenlot)){ echo $getrokkenlot; }else{ echo ""; }?>%0A%0AVeel%20Succes!'>E-mail lot</a>


