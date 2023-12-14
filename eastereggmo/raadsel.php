<link rel="stylesheet" href="../base_stylesheet.css">
<link rel="stylesheet" href="../load.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="stylesheet" href="easteregg%20mo.css">

<?php
// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verwacht wachtwoord
    $verwachtWachtwoord = "jouw_geheim_wachtwoord";

    // Ontvang het ingevoerde wachtwoord
    $ingevoerdWachtwoord = $_POST["password"];

    // Controleer of het ingevoerde wachtwoord overeenkomt met het verwachte wachtwoord
    if ($ingevoerdWachtwoord == $verwachtWachtwoord) {
        // Het wachtwoord is correct, toon de beveiligde inhoud
        echo "Welkom op de beveiligde pagina!<br>";
        echo "Hier is een vraag voor je:<br>";
        echo "Noem de eerste 6 cijfers van pi (in numerieke volgorde).<br>";
        echo "<form action='' method='post'>";
        echo "<input type='text' name='antwoord' placeholder='Jouw antwoord' required>";
        echo "<button type='submit'>Controleer antwoord</button>";
        echo "</form>"; // Zorg ervoor dat het formulier hier wordt afgesloten
    } else {
        // Het wachtwoord is onjuist, toon een foutmelding
        echo "Fout wachtwoord. Probeer opnieuw.";
    }
}

// Controleer of het antwoord op de vraag is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["antwoord"])) {
    // Verwacht antwoord
    $verwachtAntwoord = "314159";

    // Ontvang het ingevoerde antwoord
    $ingevoerdAntwoord = $_POST["antwoord"];

    // Controleer of het ingevoerde antwoord overeenkomt met het verwachte antwoord
    if ($ingevoerdAntwoord == $verwachtAntwoord) {
        echo "Gefeliciteerd! Je hebt de vraag correct beantwoord.";
    } else {
        echo "Helaas, het antwoord is niet correct. Probeer opnieuw.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nerdy Gadgets - Review</title>


</head>
<body>
<?php include_once '../header.php'; ?>

<main> <!-- Hier de content van de pagina in doen :) -->



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beveiligde Pagina</title>


    </head>

<center><h1> Wat zijn de eerste zes digits van PI? </h1></center>
    <body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center><form action="login.php" method="post">
        <label for="password">Antwoord:</label>
        <input type="password" name="password" required><br> <br>
        <button type="submit">verzend!</button>
        </form></center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    </body>
    </html>




</main>
<?php include_once '../footer/footer.php' ?>
</body>
</html>

