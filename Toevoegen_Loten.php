<?php 
session_start();
?>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinterklaasloten";

$conn1 = new mysqli($servername, $username, $password, $dbname);

$Uname1 = $_POST["GebruikersNaam"];

if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}


$result1 = mysqli_query($conn1, $sql1) or die(mysqli_error($conn1));
?>