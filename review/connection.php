<?php
include_once '../includes/dbh.php'; // Importeer database informatie
$mysqli = new mysqli($servername, $username, $password, $dbname); // maak een nieuwe connectie met de database
/*

 */

// Check connection
if ($mysqli->connect_error) { // check of er een error is
    die("rampzalig: " . $mysqli->connect_error); // als er een error is, stop dan de connectie en geef de error weer
}
return $mysqli;
