<link rel="stylesheet" href="../../base_stylesheet.css">
<link rel="stylesheet" href="../../stylesheet.css">
<link rel="stylesheet" href="../../load.css">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
<link rel="stylesheet" href="../Legal.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Formulier</title>
    <link rel="stylesheet" type="text/css" href="reviewstyle.css">
    <!-- Andere stylesheet links hier -->
</head>
<body>
<?php include_once '../header.php'; ?>

<main> <!-- Hier de content van de pagina in doen :) -->
    <br>
    <h1>Voeg een review toe</h1>

    <form action="review.php" method="post">
        <input type="text" name='naam' placeholder="naam" required><br>
        <input type="number" name="beoordeling" placeholder="Beoordeling" min="1" max="5" required><br>
        <textarea name="opmerkingen" placeholder="Opmerking"></textarea><br>
        <input type="submit" value="Verstuur review">
    </form>

    <?php
    include('connection.php');

    // Controleer of het formulier is ingediend
    if (isset($_POST['naam'], $_POST['beoordeling'], $_POST['opmerkingen'])) {
        $naam = $_POST['naam'];
        $beoordeling = $_POST['beoordeling'];
        $opmerkingen = $_POST['opmerkingen'];

        $sql = "INSERT INTO reviews (naam, beoordeling, opmerkingen) VALUES ('$naam', $beoordeling, '$opmerkingen')";

        if ($conn->query($sql) === TRUE) {
            echo "Review succesvol toegevoegd";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Formulier is niet correct ingediend.";
    }

    $conn->close();
    ?>

<body>
    <?php
    include('connection.php');

    $result = $conn->query("SELECT * FROM reviews");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Naam: " . $row['naam'] . "<br>";
            echo "Beoordeling: " . $row['beoordeling'] . "<br>";
            echo "Opmerkingen: " . $row['opmerkingen'] . "<br><br>";
        }
    } else {
        echo "Geen reviews gevonden.";
    }

    $conn->close();
    ?>
</body>
</main>
</body>
</html>

