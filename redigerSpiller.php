<?php
    $spillerid=$_REQUEST["spillerid"];
    $spillernavn=$_REQUEST["spillernavn"];
    $alder=$_REQUEST["alder"];
    $draktnr=$_REQUEST["draktnr"];
    $antallMaal=$_REQUEST["antallMaal"];
    
    $servername = "localhost";
    $username = "id17642902_fotballsystemdb";
    $password = "Klregj24jgfr3-";
    $dbname = "id17642902_fotballsystem";

    // Koble til
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Sjekke tilkobling
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE Spillere SET spillernavn = '$spillernavn', alder= '$alder', draktnr='$draktnr', antallMaal='$antallMaal' WHERE id = '$spillerid'";


    if ($conn->query($sql) === TRUE) {
      echo json_encode("ok");;
    }

?>
