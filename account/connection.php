<?php
include("../includes/dbh.php");
include("../includes/functions.php");
if(!$conn = new mysqli($servername, $username, $password, $dbname))
{die("connection is catastrophisch gestorven");}