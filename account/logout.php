<?php
/* inlog sessie word beëindigdt als file uitgevoerd word  */

session_start(); // start de sessie
session_destroy(); // vernietig de sessie
header("Location: ../index.php"); // stuur de gebruiker terug naar de account pagina
exit;