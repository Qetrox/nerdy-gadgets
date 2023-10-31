<?php
require_once '../includes/dbh.php';
/* import de Database variabelen */

$conn = new mysqli($servername, $username, $password, $dbname);
/*

 Error is niet echt! PHPstorm leest niet goed. NIET FIXEN!!

 */

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");


?>

<!DOCTYPE html>
<html lang="nl-nl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nerdy Gadgets</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="./stylesheet.css">
    <link rel="stylesheet" href="../load.css">
</head>

<body>
<div class="loaderscreen"></div>
<?php include_once '../header.php'?>
<main> <!-- Hier de content van de pagina in doen :) -->
    <div class="resultaten">
        <h1>
            <?php
            if(isset($_GET["query"]) && $_GET["query"] !== "") {
                echo "Resultaten Voor: " . $_GET["query"];
            } else {
                echo "Winkelwagen";
            }
            ?>
        </h1>

        <div class="resultaten-lijst">
            <?php
            if($cartListItems > 0) {

                $counts = array();

                foreach ($cartListItems as $key => $value) {
                    if (isset($counts[$value])) {
                        // Increment the count for the number
                        $counts[$value]++;
                    } else {
                        // Initialize the count for the number
                        $counts[$value] = 1;
                    }
                }

                $coolarray = "(";

                foreach($counts as $number => $amount) {
                    if($number == array_key_last($counts)) {
                        $coolarray .= $number;
                    } else {
                        $coolarray .= $number . ', ';
                    }
                }

                $coolarray .= ')';

                echo "SELECT * FROM product WHERE productId IN $coolarray;";

                $stmt = $conn->prepare("SELECT * FROM product WHERE productId IN $coolarray;");
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row["productDiscountPercentage"] === 0) {
                            echo '<a href="../product/?productId=' . $row["productId"] . '">';
                            echo '<div class="resultaat-item">';
                            echo '<div class="resultaat-item-flexbox">';
                            echo '<div class="description">';
                            echo '<h1>' . $row["productName"] . '</h1>';
                            echo '<h2 class="price">€' . $row["productPrice"] . '</h2>';
                            echo '<p>' . $counts[$row["productId"]] . '</p>';
                            echo '</div>';
                            echo '<div class="ah"><img src="https://nerdy-gadgets.nl/images/' . $row["productImage"] . '" alt="resultaat"></div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                        } else { //als er korting is
                            $newPrice = $row["productPrice"] * (1 - $row["productDiscountPercentage"] / 100); //bereken prijs met discount
                            echo '<a href="../product/?productId=' . $row["productId"] . '">';
                            echo '<div class="resultaat-item">';
                            echo '<div class="resultaat-item-flexbox">';
                            echo '<div class="description">';
                            echo '<h1>' . $row["productName"] . '</h1>';
                            echo '<h2 class="price"><span class="kortingsprijs">€' . number_format((float)$row["productPrice"], 2, '.', '') . '</span> €' .number_format((float)$newPrice, 2, '.', '') . ' </h2>';
                            echo '<p>' . $counts[$row["productId"]] . '</p>';
                            echo '</div>';
                            echo '<div class="ah"><img src="https://nerdy-gadgets.nl/images/' . $row["productImage"] . '" alt="resultaat"></div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                        }
                    }
                } else {
                    echo '<div class="noppes"><h1>Niks gevonden :(</h1><p>Misschien ben je een te grote nerd voor ons...</p></div>';
                }
            }
            ?>
        </div>
    </div>
</main>
<footer>
    <div class="footer-content">

        <h3>ik weet dat de kleur niet klopt</h3>

    </div>


    <div class="mobile-navbar">
        <div class="mobile-nav-item">
            <a href="../">
                    <span class="material-symbols-sharp">
                        home
                    </span>
            </a>
        </div>
        <div class="mobile-nav-item">
            <a href="./">
                    <span class="material-symbols-sharp">
                        shopping_cart
                    </span>
            </a>
        </div>
        <div class="mobile-nav-item">
            <a href="./">
                    <span class="material-symbols-sharp">
                        account_circle
                    </span>
            </a>
        </div>
    </div>
</footer>
</body>
<script src="typewriter.js"></script>
<script>
    function submitForm() {
        document.querySelector('.sort').submit();
    }
</script>

</html>
