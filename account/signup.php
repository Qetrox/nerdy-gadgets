<?php
/* hasht wachtwoord opgehaald van form */
$passwordhash = password_hash($_POST["psw"], PASSWORD_DEFAULT);
$mysqli = require __DIR__ . "/connection.php";
/* insert account registratie in de database */
$sql = "INSERT INTO user (email, password_hash, first_name, surname_prefix, surname, street_name, apartment_nr, postal_code, city)
values (?,?,?,?,?,?,?,?,?)";

$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)){
    die("catastrophe:". $mysqli->error);
};

$stmt->bind_param("sssssssss",
    $_POST["gebruikersnaam"],
    $passwordhash,
    $_POST["voornaam"],
    $_POST["tussenvoegsel"],
    $_POST["achternaam"],
    $_POST["straatnaam"],
    $_POST["huisnummer"],
    $_POST["postcode"],
    $_POST["plaats"]);
$stmt->execute();

echo "registratie succes"
?>

<!DOCTYPE html>
<html lang="nl-nl">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>

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

    

 
     
        <div class="account">
            <form method="post"?> 
            <label for="email"><b>gebruikersnaam</b></label>
            <input type="text" placeholder="Enter Username" name="gebruikersnaam" required>
        
            <label for="psw"><b>wachtwoord</b></label>
            <input type="Password" placeholder="Enter Password" name="psw" required>

                <label for="voornaam"><b>voornaam</b></label>
                <input type="text" placeholder="Enter name" name="voornaam" required>

                <label for="tussenvoegsel"><b>tussenvoegsel</b></label>
                <input type="text" placeholder="Enter prefix" name="tussenvoegsel" >

                <label for="achternaam"><b>achternaam</b></label>
                <input type="text" placeholder="Enter surname" name="achternaam" required>

                <label for="straatnaam"><b>straatnaam</b></label>
                <input type="text" placeholder="straatnaam" name="straatnaam" required>

                <label for="huisnummer"><b>huisnummer</b></label>
                <input type="text" placeholder="huisnummer" name="huisnummer" required>

                <label for="postcode"><b>postcode</b></label>
                <input type="text" placeholder="postcode" name="postcode" required>

                <label for="plaats"><b>plaats</b></label>
                <input type="text" placeholder="plaats" name="plaats" required>



                <button type="submit">registreren</button>
            <a href="login.php"> naar Inloggen</a>
          </form>
             
          </div>
    </div>  




</main>
 
  
</body>

 
</html>
