<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* hasht wachtwoord opgehaald van form */
if(isset($_POST["psw"])) {

    $passwordhash = password_hash($_POST["psw"], PASSWORD_DEFAULT);
}
if($_POST){
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

    try {
        if ($stmt->execute()) {
            header("Location: sucess.html");
            exit;
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) { // Check for duplicate entry error
            header("Location: duplicate.html");
            exit;
        } else {
            // Handle other errors if needed
            header("Location: error.html");
            exit;
        }
    }

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
     <link rel="stylesheet" href="../base_stylesheet.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"  defer  ></script>
    <script src ="./watisjavascript.js"  defer    ></script>
    <script src="../index.js" defer ></script>


    <link rel="stylesheet" href="stylesheet.css">
</head>





<body>
<?php include_once '../header.php'?>
<main> <!-- Hier de content van de pagina in doen :) -->





    <div class="account">
        <form method="post" id="registratie" novalidate>
            <div class="rounded-input2">
                <h1>Account Aanmaken</h1>
                <div>
                    <input type="text" placeholder="Voornaam" name="voornaam" required>
                    <div class="name-flex">
                        <input class="first-input" type="text" placeholder="Tussenvoegsel" name="tussenvoegsel" >
                        <input type="text" placeholder="Achternaam" name="achternaam" required>
                    </div>
                    <input type="text" placeholder="Email" name="gebruikersnaam" id ="email" required>
                    <input type="Password" placeholder="Wachtwoord" id="psw" name="psw" required>
                    <div class="house-flex">
                        <input class="first-input" type="text" placeholder="Straatnaam" name="straatnaam" required>
                        <input type="number" placeholder="Huisnummer" name="huisnummer" required>
                    </div>
                    <div class="location-flex">
                        <input class="first-input" type="text" placeholder="Postcode" name="postcode" required>
                        <input type="text" placeholder="Plaats" name="plaats" required>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit">Maak account aan</button>
            </div>
            <div class="text-center">
                <a href="login.php"> naar Inloggen</a>
            </div>
        </form>

    </div>
    </div>




</main>




</body>
</html>
