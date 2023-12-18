<?php
require_once '../includes/dbh.php'; // Importeer de database variabelen
/* import de Database variabelen */

$conn = new mysqli($servername, $username, $password, $dbname); // Maak connectie met de database
/*

 Error is niet echt! PHPstorm leest niet goed. NIET FIXEN!!

 */

// Check connection
if ($conn->connect_error) { // Als de connectie mislukt
    die("Connection failed: " . $conn->connect_error); // Stop de connectie en geef een error
}

$conn->set_charset("utf8"); // Zet de charset naar UTF-8 zodat vreemde tekens goed worden weergegeven


?>