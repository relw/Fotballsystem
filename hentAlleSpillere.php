<?php
    $servername = "localhost";
    $username = "id17642902_fotballsystemdb";
    $password = "Klregj24jgfr3-";
    $dbname = "id17642902_fotballsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM Spillere ORDER BY antallMaal+0 DESC';
$resultat = $conn->query($sql);


  
  $spillere=array();
  
  while($rad = mysqli_fetch_assoc($resultat)) {
    $spillere[]=$rad;
  }

    
    echo json_encode($spillere);


?>