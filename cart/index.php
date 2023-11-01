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
    <script>
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        arr = JSON.parse(getCookie('cartList'));

        let productCounter = {};

        arr.forEach(ele => {
            if (productCounter[ele]) {
                productCounter[ele] += 1;
            } else {
                productCounter[ele] = 1;
            }
        });

        function changeItemCount(productId, change) {
            cartList = JSON.parse(getCookie('cartList'));
            if(change === -1) {
                const index = cartList.indexOf(`${productId}`);
                if (index > -1) { // only splice array when item is found
                    cartList.splice(index, 1); // 2nd parameter means remove one item only
                }
            } else if (change === 1) {
                cartList.push(`${productId}`);
            }
            setCookie('cartList', JSON.stringify(cartList), 30);
            document.getElementById('cartcount').innerHTML = cartList.length;

            productCounter = {};

            cartList.forEach(ele => {
                if (productCounter[ele]) {
                    productCounter[ele] += 1;
                } else {
                    productCounter[ele] = 1;
                }
            });
            document.getElementById(`productCount${productId}`).innerHTML = productCounter[`${productId}`];
            if(productCounter[`${productId}`] === undefined || productCounter[`${productId}`] === 0) {
                UUOEOEWUU = document.getElementById(`productDiv${productId}`);
                UUOEOEWUU.remove();
            }
        }

    </script>
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
                            echo '<div id="productDiv' . $row["productId"] . '">';
                            echo '<div class="resultaat-item">';
                            echo '<div class="resultaat-item-flexbox">';
                            echo '<div class="description">';
                            echo '<h1>' . $row["productName"] . '</h1>';
                            echo '<h2 class="price">€' . $row["productPrice"] . '</h2>';
                            echo '<p id="productCount' . $row["productId"] . '">' . $counts[$row["productId"]] . '</p>';
                            echo '<p onclick="changeItemCount(' . $row["productId"] . ', 1)">plus</p><p onclick="changeItemCount(' . $row["productId"] . ', -1)">min</p>';
                            echo '</div>';
                            echo '<div class="ah"><img src="https://nerdy-gadgets.nl/images/' . $row["productImage"] . '" alt="resultaat"></div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        } else { //als er korting is
                            $newPrice = $row["productPrice"] * (1 - $row["productDiscountPercentage"] / 100); //bereken prijs met discount
                            echo '<div>';
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
                            echo '</div>';
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
    <div class="mobile-navbar">
        <div class="mobile-nav-item">
            <a href="https://nerdy-gadgets.nl">
                    <span class="material-symbols-sharp">
                        home
                    </span>
            </a>
        </div>
        <div class="mobile-nav-item">
            <a href="https://nerdy-gadgets.nl/cart">
                    <span class="material-symbols-sharp">
                        shopping_cart
                    </span>
            </a>
        </div>
        <div class="mobile-nav-item">
            <a href="https://nerdy-gadgets.nl/account">
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
