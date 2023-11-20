<?php
/* hasht wachtwoord opgehaald van form */
<<<<<<< HEAD
if(isset($_POST["psw"])) {

    $passwordhash = password_hash($_POST["psw"], PASSWORD_DEFAULT);
}
if($_POST){
$mysqli = require __DIR__ . "/connection.php";
=======
$passwordhash = password_hash($_POST["psw"], PASSWORD_DEFAULT); // hash het wachtwoord wat is ingevuld in het formulier
$mysqli = require __DIR__ . "/connection.php"; // importeer de database connectie
>>>>>>> 5427475ed578a04ba7985556554de142d677a1a8
/* insert account registratie in de database */
$sql = "INSERT INTO user (email, password_hash, first_name, surname_prefix, surname, street_name, apartment_nr, postal_code, city)
values (?,?,?,?,?,?,?,?,?)"; // sql statement

$stmt = $mysqli->stmt_init(); // initialiseer de statement
if (!$stmt->prepare($sql)){ // check of de statement goed is
    die("catastrophe:". $mysqli->error); // als de statement niet goed is, stop dan en geef een error
};

$stmt->bind_param("sssssssss", // bind de parameters aan de statement
    $_POST["gebruikersnaam"],
    $passwordhash,
    $_POST["voornaam"],
    $_POST["tussenvoegsel"],
    $_POST["achternaam"],
    $_POST["straatnaam"],
    $_POST["huisnummer"],
    $_POST["postcode"],
    $_POST["plaats"]);
$stmt->execute(); // voer de statement uit



    header("Location: ../index.php");
    exit;
}
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
            <label for="email"><b>gebruikersnaam</b></label> <input type="text" placeholder="Enter Username" name="gebruikersnaam" required>
<br>
            <label for="psw"><b>wachtwoord</b></label> <input type="Password" placeholder="Enter Password" name="psw" required>
 <br>
                <label for="voornaam"><b>voornaam</b></label> <input type="text" placeholder="Enter name" name="voornaam" required>
<br>
                <label for="tussenvoegsel"><b>tussenvoegsel</b></label> <input type="text" placeholder="Enter prefix" name="tussenvoegsel" >
<br>
                <label for="achternaam"><b>achternaam</b></label> <input type="text" placeholder="Enter surname" name="achternaam" required>
<br>
                <label for="straatnaam"><b>straatnaam</b></label> <input type="text" placeholder="straatnaam" name="straatnaam" required>
<br>
                <label for="huisnummer"><b>huisnummer</b></label> <input type="text" placeholder="huisnummer" name="huisnummer" required>
<br>
                <label for="postcode"><b>postcode</b></label> <input type="text" placeholder="postcode" name="postcode" required>
<br>
                <label for="plaats"><b>plaats</b></label> <input type="text" placeholder="plaats" name="plaats" required>



                <button type="submit">registreren</button>
            <a href="login.php"> naar Inloggen</a>
          </form>
             
          </div>
    </div>  




</main>
 
  
</body>

 
</html>
