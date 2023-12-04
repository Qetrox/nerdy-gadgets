<link rel="stylesheet" href="../../base_stylesheet.css">
<link rel="stylesheet" href="../../stylesheet.css">
<link rel="stylesheet" href="../../load.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
<link rel="stylesheet" href="../Legal.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<body>
<?php include_once '../header.php'?>
<main> <!-- Hier de content van de pagina in doen :) -->
<body>

<h2>Voeg een review toe</h2>

<form action="verwerk_review.php" method="post">
    Naam: <input type="text" name="naam" required><br>
    Beoordeling: <input type="number" name="beoordeling" min="1" max="5" required><br>
    Opmerkingen: <textarea name="opmerkingen"></textarea><br>
    <input type="submit" value="Verstuur review">
</form>

</body>

</html>
</main>
