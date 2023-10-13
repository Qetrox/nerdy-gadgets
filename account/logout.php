<?php
/* inlog sessie word beëindigdt als file uitgevoerd word  */

session_start();
session_destroy();
header("Location: ../index.php");
exit;