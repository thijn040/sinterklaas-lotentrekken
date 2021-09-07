<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinterklaasloten";

$conn = new mysqli($servername, $username, $password, $dbname);

session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account gegevens</title>
</head>
<body>
<a href="Sintloten_Hoofdpagina.php">Terug</a>
<h3>Gebruikersnaam: <?= $_SESSION['login']?></h3>
<h3>E-mail: <?php if (isset($_SESSION['mail'])) {?><?= $_SESSION['mail']?></h4><?php }else{echo "<a href='Sintloten_Hoofdpagina.php'>Geef een email mee</a>";}?>
    <?php
    $Gebruikersnaam = $_SESSION['login'];
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql1 = "SELECT getrokkenLot FROM gebruikers WHERE gebruikersNaam='$Gebruikersnaam'";
      
    $result1 = mysqli_query($conn, $sql1);
     while($row = mysqli_fetch_array($result1)){?>
       <table class=".table-dark">
       <tr><tr>
       <tr><th>Jou getrokken lot:</th>
       <td><?= $row[0]?></td></tr>
       </tr></tr>
       </table>
       <?php if(isset($_SESSION['mail']))
       {?>
                  <a href='mailto:<?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];}else{echo "geen mail";}?>?subject=Getrokken%20lot%20&body=Hallo%20<?= $_SESSION['login']?>,%0A%0AUw%20getrokken%20lot%20is:%20<?= $row[0]?>%0A%0AVeel%20Succes!'>E-mail lot</a>
       <?php }
       else
       {
           echo "";
       }
       ?>
     <?php }?>
</body>
</html>