<?php
include("../includes/dbh.php");
include("../includes/functions.php");
$mysqli = new mysqli($servername, $username, $password, $dbname);
/*



 */

// Check connection
if ($mysqli->connect_error) {
    die("rampzalig: " . $mysqli->connect_error);
}
return $mysqli;