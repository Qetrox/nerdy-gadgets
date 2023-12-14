<?php
// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verwacht antwoord
    $verwachtAntwoord = "3.14159";

    // Ontvang het ingevoerde antwoord
    $ingevoerdAntwoord = $_POST["antwoord"];

    // Controleer of het ingevoerde antwoord overeenkomt met het verwachte antwoord
    if ($ingevoerdAntwoord == $verwachtAntwoord) {
        // Het antwoord is correct, stuur door naar een andere pagina
        header("Location: https://nerdy-gadgets.nl/eastereggmo/gameroom.php");
        exit(); // Zorg ervoor dat het script hier wordt afgesloten na doorsturen
    } else {
        // Het antwoord is onjuist, toon een foutmelding
        $foutmelding = "Helaas, het antwoord is niet correct. Probeer opnieuw.";
        echo $foutmelding;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nerdy Gadgets - Review</title>

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



</head>

<body>

<?php include_once '../header.php'; ?>

<main>
    <center><h1> Wat zijn de eerste 6 digits van π? </h1></center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
        <form action="" method="post">
            <label for="antwoord">Antwoord:</label>
            <input type="text" name="antwoord" required><br> <br>
            <button type="submit">verzend!</button>
        </form>
    </center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</main>



<?php include_once '../footer/footer.php' ?>
</body>
</html>
