<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){ // Check of het een POST request is.

    $mysqli = require __DIR__ . "/connection.php"; // Importeer de database connectie

    /* account username en wachtwoord ophalen van database */
    $sqla = sprintf("SELECT * FROM user
                           WHERE email ='%s'",
                           $mysqli->real_escape_string($_POST["gebruikersnaam"])); // Maak de query klaar om uit te voeren, voorkom SQL injection.
    $result = $mysqli->query($sqla); // Voer de query uit op de database.
    $user = $result->fetch_assoc(); // Haal de resultaten op als associatieve array.

    $password = $_POST['password']; // Haal het wachtwoord op uit het formulier.
    /*  wachtwoord checken daarna inloggen  */
    if(password_verify($_POST["password"], $user["password_hash"])){ // Check of het wachtwoord klopt.
        session_start(); // Start de sessie.
        session_regenerate_id(); // Maak een nieuw sessie ID aan.
        $_SESSION["user_id"] = $user["id"]; // Sla de user ID op in de sessie.
        $_SESSION["first_name"] = $user["first_name"]; // Sla de voornaam op in de sessie.
        $_SESSION["surname"] = $user["surname"]; // Sla de achternaam op in de sessie.
        $_SESSION["email"] = $user["email"]; // Sla de email op in de sessie.
        $_SESSION["surname_prefix"] = $user["surname_prefix"]; // Sla de tussenvoegsel op in de sessie.





        header("Location: ../index.php"); // Stuur de gebruiker door naar de account pagina.
        exit; // Stop met het uitvoeren van PHP code, zodat er minder load is op de server.

    }
    /* als inlog gegevens niet kloppen*/

    else {
        $is_invalid = true;
    }

 }

?>

<!DOCTYPE html>
<html lang="nl-nl" xmlns="http://www.w3.org/1999/html">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accountpage</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="../index.js"></script>
    <link rel="stylesheet" href="../base_stylesheet.css">
    <link rel="stylesheet" href="stylesheet.css">
</head>




<body>
<?php include_once '../header.php'?>
<main> <!-- Hier de content van de pagina in doen :) -->


    <?php
    if($is_invalid == true){
        print("gegevens incorrect"); // Print een error als de gebruikersnaam of wachtwoord niet klopt.

    }

    ?>

    <div class = "flex-container">

        <!--login form-->

        <div class="account">
            <h1>Inloggen</h1>
            <form method="post"?>
            <input type="text" placeholder="Email" name="gebruikersnaam" required>

            <input type="Password" placeholder="Wachtwoord" name="password" required>
             <div class="text-center">
            <button type="submit">Login</button>
             </div>
                <div class="text-center">
            Geen account? <a href="signup.php"> Maak een Account aan</a>
                </div>
          </form>
             
          </div>

    </div>  




</main>
<?php include_once '../footer.php'?>
  
</body>

</html>
