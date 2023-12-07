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
<script src="https://www.google.com/recaptcha/api.js"></script>
<!-- stylesheet van deze pagina-->
<link rel="stylesheet" type="text/css" href="reviewstyle.css">

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Formulier</title>

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
        <div class="g-recaptcha" data-sitekey="6Lf8iSkpAAAAAJdHgMIZb4RhtMcSXm4skdxLGqIW"></div>
        <input type="submit" value="Verstuur review">
    </form>

    <?php
    include('connection.php');

    function reCaptcha($recaptcha){
        $secret = "6Lf8iSkpAAAAAFbFEA0R-aO4cKzD8fzEvf2Ui6xE";
        $ip = $_SERVER['REMOTE_ADDR'];

        $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data, true);
    }

    $recaptcha = $_POST['g-recaptcha-response'];
    $res = reCaptcha($recaptcha);

    // Controleer of het formulier is ingediend
    if (isset($_POST['naam'], $_POST['beoordeling'], $_POST['opmerkingen'], $res['success'])) {
        $naam = $_POST['naam'];
        $beoordeling = $_POST['beoordeling'];
        $opmerkingen = $_POST['opmerkingen'];

        // Voeg gegevens toe aan de database
        $stmt = $conn->prepare("INSERT INTO reviews (naam, beoordeling, opmerkingen) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $naam, $beoordeling, $opmerkingen);

        if ($stmt->execute()) {
            echo "Review succesvol toegevoegd";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Formulier is niet correct ingediend.";
    }

    $conn->close();
    ?>

    <footer>

        <?php
        include('connection.php');

        $result = $conn->query("SELECT * FROM reviews");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="review">';
                echo "<h3>Naam: " . $row['naam'] . "</h3>";
                echo "<p>Beoordeling: <span class='star-rating'>" . str_repeat("★", $row['beoordeling']) . "</span></p>";
                echo "<p>Opmerkingen: " . $row['opmerkingen'] . "</p>";
                echo '</div>';
            }
        } else {
            echo '<div class="no-reviews">Geen reviews gevonden.</div>';
        }

        $conn->close();
        ?>



    </footer>
</main>
</body>
</html>

