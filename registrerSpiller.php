<?php
    $spillernavn=$_REQUEST["spillernavn"];
    $alder=$_REQUEST["alder"];
    $draktnr=$_REQUEST["draktnr"];
    $antallMaal=$_REQUEST["antallMaal"];
    
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

$sql = "INSERT INTO Spillere (spillernavn, alder, draktnr, antallMaal)
VALUES ('$spillernavn','$alder','$draktnr','$antallMaal')";
$resultat = $conn->query($sql);
    
    echo json_encode("ok");


?>