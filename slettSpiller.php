<?php
    $spillerid=$_REQUEST["spillerid"];
    
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

$sql = "DELETE FROM Spillere WHERE id='$spillerid'";
if ($conn->query($sql) === TRUE) {
  echo json_encode("ok");;
}

?>