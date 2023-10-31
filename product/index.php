<?php
if(!isset($_GET["productId"])) {
    header('location: ../search/');
} else {

    if(isset($_COOKIE["cartList"])) {
        $cartListItems = json_decode($_COOKIE["cartList"]);
    } else {
        $cartListItems = array();
    }

    if(isset($_GET["addProduct"]) && $_GET["addProduct"] == "true") {
        array_push($cartListItems, $_GET["productId"]);
        setcookie("cartList", json_encode($cartListItems), time() + (86400 * 30), "/"); // 86400 = 1 day
        header('location: ./?productId=' . $_GET["productId"]);
    }

    $cartCount = count($cartListItems);


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
            $image2 = $row["productImage2"];
            $image3 = $row["productImage3"];
            $image4 = $row["productImage4"];
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

    $imageSwitchHtml = '';

    if ($image2 != '' &&  $image2 != null) {
        $imageSwitchHtml = '<div><p id="b1" class="hoverme" onclick="switchToImage(1)">1</p><p id="b2" class="hoverme" onclick="switchToImage(2)">2</p></div>';

        if ($image3 != '' &&  $image3 != null) {
            $imageSwitchHtml = '<div><p id="b1" class="hoverme" onclick="switchToImage(1)">1</p><p id="b2" class="hoverme" onclick="switchToImage(2)">2</p><p id="b3" class="hoverme" onclick="switchToImage(3)">3</p></div>';

            if ($image4 != '' &&  $image4 != null) {
                $imageSwitchHtml = '<div><p id="b1" class="hoverme" onclick="switchToImage(1)">1</p><p id="b2" class="hoverme" onclick="switchToImage(2)">2</p><p class="hoverme" id="b3" onclick="switchToImage(3)">3</p><p id="b4" class="hoverme" onclick="switchToImage(4)">4</p></div>';
            }
        }
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
    <script>



        function switchToImage(imagenumber) {
            const productImage = document.getElementById('product-image');
            const b1 = document.getElementById('b1');
            const b2 = document.getElementById('b2');
            const b3 = document.getElementById('b3');
            const b4 = document.getElementById('b4');
            if(imagenumber > 4) return;
            switch (imagenumber) {
                case 1:
                    try {
                        productImage.src = '../images/<?php echo $image; ?>';
                        b1.style.borderBottom = '1px solid'
                        b2.style.borderBottom = 'none'
                        b3.style.borderBottom = 'none'
                        b4.style.borderBottom = 'none'
                    } catch (e) {
                        //sssh..
                    }
                    break;
                case 2:
                    try {
                        productImage.src = '../images/<?php echo $image2; ?>';
                        b1.style.borderBottom = 'none'
                        b2.style.borderBottom = '1px solid'
                        b3.style.borderBottom = 'none'
                        b4.style.borderBottom = 'none'
                    } catch (e) {
                        //sssh..
                    }
                    break;
                case 3:
                    try {
                        productImage.src = '../images/<?php echo $image3; ?>';
                        b1.style.borderBottom = 'none'
                        b2.style.borderBottom = 'none'
                        b3.style.borderBottom = '1px solid'
                        b4.style.borderBottom = 'none'
                    } catch (e) {
                        //sssh..
                    }
                    break;
                case 4:
                    try {
                        productImage.src = '../images/<?php echo $image4; ?>';
                        b1.style.borderBottom = 'none'
                        b2.style.borderBottom = 'none'
                        b3.style.borderBottom = 'none'
                        b4.style.borderBottom = '1px solid'
                    } catch (e) {
                        //sssh..
                    }
                    break;
            }
        }

    </script>
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
                <img id="product-image" src="../images/<?php echo $image; ?>" alt="resultaat">
                <div class="imageSwitch">
                    <?php echo $imageSwitchHtml; ?>
                </div>
            </div>
            <div class="info">
                <div class="mobile-extend">
                    <h2 class="price"><?php echo $priceHtml ?></h2>
                    <p class="voorraad">Op Voorraad: 232<br>Leverancier: 25.342</p>
                </div>
                <div class="mobile-extend">
                    <button class="addToCart" onclick="IWANTTHISITEM()"><p class="winkelwagentekst"><span class="material-symbols-sharp" style="transform: translateY(20%)">shopping_cart</span> In winkelwagen</p></button>
                    <p class="stars"><span class="material-symbols-sharp"><?php echo $starHtml ?></span></p>
                    <p class="levertijd">Bestel voor 16:00, overmorgen in huis*</p>
                </div>
                    <h6 class="tijddisclaimer">*Wij doen ons best om uw bestelling op tijd te leveren, maar door drukte kan dit soms wat langer duren. Onze excuses hiervoor.</h6>

            </div>
        </div>
        <p><?php echo $description ?></p>
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
<script>

    function IWANTTHISITEM() {
        window.location.replace('./?productId=<?php echo $_GET["productId"] ?>&addProduct=true')
    }

    try {
        const b1 = document.getElementById('b1');
        b1.style.borderBottom = '1px solid'
    } catch(e) {
        //ssssh
    }
</script>
</html>
