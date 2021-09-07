<?php 


function functie1(){
session_start();

$email = $_SESSION['mail'];
$pasw = $_SESSION['password'];
$naam = $_SESSION['name'];
$geslacht = $_SESSION['geslacht'];
$adres = $_SESSION['adres'];
$woonplaats = $_SESSION['woonplaats'];
$geboortedatum = $_SESSION['geboortedatum'];

include 'Dbconn.php';

$email = $_POST['mail'];
$pasw = $_POST['psw']; 
$naam = $_POST['naam']; 
$geslacht = $_POST['geslacht']; 
$adres = $_POST['adres']; 
$postcode = $_POST['postcode']; 
$woonplaats = $_POST['woonplaats']; 
$geboortedatum = $_POST['geboortedatum']; 

$sql = "INSERT INTO gebruikers (naam, mail, wachtwoord, geslacht, adres, postcode, woonplaats, geboortedatum) 
VALUES ('$email', '$pasw', '$naam', '$geslacht', '$adres', '$postcode', '$woonplaats', '$geboortedatum')";

$result = mysqli_query($conn,$sql);
}
?>