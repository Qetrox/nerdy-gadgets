<?php

if(!isset($_GET["productId"])) {
    header('location: ../search/');
} else {
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


    $stmt = $conn->prepare("SELECT * FROM product JOIN brand ON productBrandId = brandId WHERE productId = ?");
    $stmt->bind_param("s", $_GET["productId"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $title = $row["productName"];
            $image = $row["productImage"];
            $description = $row["productDescription"];
            $price = $row["productPrice"];
            $discount = $row["productDiscountPercentage"];
            $brand = $row["brandName"];
            $category = $row["productCategory"];
            $stars = $row["productStars"];
        }
        if($discount > 0) {
            $newPrice = $price * (1 - $discount / 100); //bereken prijs met discount
            $priceHtml = '<span class="kortingsprijs">€' . number_format((float)$price, 2, '.', '') . '</span> €' .number_format((float)$newPrice, 2, '.', '');
        } else {
            $priceHtml = '€' . $price;
        }
        switch($stars) {
            case 1:
                $starHtml = "star_rate";
                break;
            case 2:
                $starHtml = "star_ratestar_rate";
                break;
            case 3:
                $starHtml = "star_ratestar_ratestar_rate";
            case 4:
                $starHtml = "star_ratestar_ratestar_ratestar_rate";
                break;
            case 5:
                $starHtml = "star_ratestar_ratestar_ratestar_ratestar_rate";
                break;
        }
    } else {
        header('location: ../search/');
    }

}

?>
<!DOCTYPE html>
<html lang="nl-nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nerdy Gadgets</title>

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
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="../load.css">
    <script src="../index.js"></script>
</head>

<div class="loaderscreen"></div>
<body>
<?php include_once '../header.php'?>
<main> <!-- Hier de content van de pagina in doen :) -->
    <div class="product">
        <h1><?php echo htmlspecialchars($title) ?></h1>

        <h3 class="tags">Merk: <span style="text-decoration: underline"><?php echo htmlspecialchars($brand) ?></span> - Categorie: <span style="text-decoration: underline"><?php echo htmlspecialchars($category) ?></span></h3>
        <div class="naastDeImage">
            <div class="aaaaah">
                <img src="../images/<?php echo $image; ?>" alt="resultaat">
            </div>
            <div class="info">
                <div class="mobile-extend">
                    <h2 class="price"><?php echo $priceHtml ?></h2>
                    <p class="voorraad">Op Voorraad: 232<br>Leverancier: 25.342</p>
                </div>
                <div class="mobile-extend">
                    <button class="addToCart" onclick=""><p class="winkelwagentekst"><span class="material-symbols-sharp" style="transform: translateY(20%)">shopping_cart</span> In winkelwagen</p></button>
                    <p class="stars"><span class="material-symbols-sharp"><?php echo $starHtml ?></span></p>
                    <p class="levertijd">Bestel voor 16:00, overmorgen in huis*</p>
                </div>
                    <h6 class="tijddisclaimer">*Wij doen ons best om uw bestelling op tijd te leveren, maar door drukte kan dit soms wat langer duren. Onze excuses hiervoor.</h6>

            </div>
        </div>
        <p><?php echo htmlspecialchars($description) ?></p>
    </div>
</main>
<footer>
    <div class="mobile-navbar">
        <div class="mobile-nav-item">
            <a href="./">
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
            <a href="./account/login.php">
                    <span class="material-symbols-sharp">
                        account_circle
                    </span>
            </a>
        </div>
    </div>
</footer>
</body>
</html>
