<?php
require_once '../includes/dbh.php'; // Importeer de database variabelen
/* import de Database variabelen */

$conn = new mysqli($servername, $username, $password, $dbname); // Maak connectie met de database
/*

 Error is niet echt! PHPstorm leest niet goed. NIET FIXEN!!

 */

// Check connection
if ($conn->connect_error) { // Als de connectie mislukt
    die("Connection failed: " . $conn->connect_error); // Stop de connectie en geef een error
}

$conn->set_charset("utf8"); // Zet de charset naar UTF-8 zodat vreemde tekens goed worden weergegeven


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

        let moneyz = 0;
        let moneyz_arr = {};


        /**
         * Verander de totaal prijs van een product, en bereken de nieuwe totale prijs
         * @param {float} productId - Het ID van het product
         * @param {number} newTotalPrice - De nieuwe totale prijs van het product (prijs * aantal)
         * @returns {void} - Returnt niks
         */
        function changePrice(productId, newTotalPrice) {
            newTotalPrice = parseFloat(newTotalPrice.toFixed(3)); // rond af op 2 decimalen
            moneyz = 0;


                moneyz_arr[productId] = newTotalPrice; // zet de prijs in de array


            for(let key in moneyz_arr) {
                moneyz += moneyz_arr[key]; // tel alle prijzen bij elkaar op
            }

            const e2 = document.getElementById('totalPrice'); // krijg HTML element van totale prijs
            e2.innerHTML = "€" + moneyz; // verander de totale prijs

            let isWindowLoaded = false;
            window.onload = function () {
                if (!isWindowLoaded) {
                    changePrice(productId, newTotalPrice);
                    isWindowLoaded = true;
                }
            };
        }





        /**
         * Pak cookie uit browser en return de cookie
         * @param cname - Naam van de cookie
         * @returns {string} - Returnt de cookie als string
         */
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie); // pak alle cookies uit de browser
            let ca = decodedCookie.split(';'); // splits de cookies op de zodat we losse cookies hebben;
            for(let i = 0; i <ca.length; i++) { // loop door alle cookies
                let c = ca[i]; // pak de cookie
                while (c.charAt(0) == ' ') { // haal alle spaties weg
                    c = c.substring(1); // haal de eerste letter weg
                }
                if (c.indexOf(name) == 0) { // als de naam van de cookie gelijk is aan de naam die we zoeken
                    return c.substring(name.length, c.length); // return de cookie
                }
            }
            return ""; // return niks als de cookie niet is gevonden
        }

        /**
         * Verander een cookie in de browser
         * @param cname - Naam van de cookie
         * @param cvalue - Waarde van de cookie
         * @param exdays - Na hoeveel dagen de cookie verloopt
         * @returns {void} - Returnt niks
         */
        function setCookie(cname, cvalue, exdays) {
            const d = new Date(); // maak een nieuwe datum object
            d.setTime(d.getTime() + (exdays*24*60*60*1000)); // bereken wanneer de cookie verloopt
            let expires = "expires="+ d.toUTCString(); // zet de datum om naar een string
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"; // maak de cookie en stop hem in de browser
        }

        arr = JSON.parse(getCookie('cartList')); // pak de cookie met de producten in de winkelwagen

        let productCounter = {};

        arr.forEach(ele => { // loop door alle producten in de winkelwagen
            if (productCounter[ele]) { // als het product al in de winkelwagen zit
                productCounter[ele] += 1; // verhoog de product hoeveelheid met 1
            } else { // als het product nog niet in de winkelwagen zit
                productCounter[ele] = 1; // zet de product hoeveelheid op 1
            }
        });

        /**
         * Verander de hoeveelheid van een product in de winkelwagen
         * @param productId - De ID van het product
         * @param change - Met hoeveel het aantal veranderd
         * @returns {void} - Returnt niks
         */
        function changeItemCount(productId, change) {
            cartList = JSON.parse(getCookie('cartList')); // pak de cookie met de producten in de winkelwagen
            if(change === -1) { // als het aantal omlaag gaat
                const index = cartList.indexOf(`${productId}`);
                if (index > -1) { // als het product in de winkelwagen zit
                    cartList.splice(index, 1); // haal het product uit de winkelwagen
                }
            } else if (change === 1) { // als het aantal omhoog gaat
                cartList.push(`${productId}`); // zet het product in de winkelwagen
            }
            setCookie('cartList', JSON.stringify(cartList), 30); // zet de nieuwe winkelwagen in de browser
            document.getElementById('cartcount').innerHTML = cartList.length; // verander het winkelwagen icoontje

            productCounter = {};

            cartList.forEach(ele => { // loop door alle producten in de winkelwagen
                if (productCounter[ele]) { // als het product al in de winkelwagen zit
                    productCounter[ele] += 1; // verhoog de product hoeveelheid met 1
                } else { // als het product nog niet in de winkelwagen zit
                    productCounter[ele] = 1; // zet de product hoeveelheid op 1
                }
            });
            document.getElementById(`productCount${productId}`).innerHTML = productCounter[`${productId}`]; // verander de hoeveelheid van het product in de winkelwagen
            if(productCounter[`${productId}`] === undefined || productCounter[`${productId}`] === 0) { // als het product niet meer in de winkelwagen zit
                UUOEOEWUU = document.getElementById(`productDiv${productId}`); // pak het product div element
                UUOEOEWUU.remove(); // verwijder het product div element
            }
            try {
                changePrice(productId, productCounter[`${productId}`] * parseFloat(document.getElementById(`price2${productId}`).innerHTML.split('€')[1])); // verander de totale prijs van het product
            } catch (e) {
                changePrice(productId, 0); // verander de totale prijs van het product naar 0 als er geen zijn
            }

        }

    </script>
</head>
<body>
<div class="loaderscreen"></div>
<?php include_once '../header.php'?>
<div class="totalPrice1"> <p> Totaal:</p></div><h1 id="totalPrice"></h1>
<button><span> Verder met Afrekenen!</span></button>
<main> <!-- Hier de content van de pagina in doen :) -->
    <div class="resultaten">
        <h1>
            <?php
            if(isset($_GET["query"]) && $_GET["query"] !== "") { // Ik weet niet wat deze code hier doet, geen functionaliteit maar laat het staan voor de zekerheid
                echo "Resultaten Voor: " . $_GET["query"];
            } else {
                echo "<br>". "Winkelwagen";
            }
            ?>
        </h1>
            <?php
            if(count($cartListItems) > 0) { // Als er producten in de winkelwagen zitten

                $counts = array(); // Maak een array aan voor de hoeveelheid van elk product

                foreach ($cartListItems as $key => $value) { // Loop door alle producten in de winkelwagen
                    if (isset($counts[$value])) { // Als het product al in de array zit
                        $counts[$value]++; // Verhoog de hoeveelheid van het product met 1
                    } else { // Als het product nog niet in de array zit
                        $counts[$value] = 1; // Zet de hoeveelheid van het product op 1
                    }
                }

                $coolarray = "("; // Maak een string aan voor de SQL query

                foreach($counts as $number => $amount) { // Loop door alle producten in de winkelwagen
                    if(!is_numeric($amount)) exit("Invalid input"); // Als de hoeveelheid van een product geen nummer is, stop de code
                    if($number == array_key_last($counts)) { // Als het de laatste product in de winkelwagen is
                        $coolarray .= $number; // Zet het product in de string
                    } else { // Als het niet het laatste product in de winkelwagen is
                        $coolarray .= $number . ', '; // Zet het product in de string
                    }
                }

                $coolarray .= ')'; // Sluit de string af
                $stmt = $conn->prepare("SELECT * FROM product WHERE productId IN $coolarray;"); // Maak een SQL query
                $stmt->execute(); // Voer de SQL query uit
                $result = $stmt->get_result(); // Pak de resultaten van de SQL query

                if ($result->num_rows > 0) { // Als er resultaten zijn
                    while($row = $result->fetch_assoc()) { // Loop door alle resultaten
                        if($row["productDiscountPercentage"] === 0) { // Als er geen korting is
                            echo '<div id="productDiv' . $row["productId"] . '">'; // Elke echo print gedeelte van een product uit in HTML
                            echo '<div class="resultaat-item">';
                            echo '<div class="resultaat-item-flexbox">';
                            echo '<div class="description">';
                            echo '<h1>' . $row["productName"] . '</h1>';
                            echo '<h2 class="price" id="price' . $row["productId"] . '">€' . $row["productPrice"] . '</h2>';
                            echo '<h2 style="display: none" class="price" id="price2' . $row["productId"] . '">€' . $row["productPrice"] . '</h2>';
                            echo '<div class="up-and-down"><p class="ud1" onclick="changeItemCount(' . $row["productId"] . ', 1)">+</p><p class="ud2" id="productCount' . $row["productId"] . '">' . $counts[$row["productId"]] . '</><p class="ud3" onclick="changeItemCount(' . $row["productId"] . ', -1)">-</p></div>';
                            echo '</div>';
                            echo '<div class="ah"><img src="https://nerdy-gadgets.nl/images/' . $row["productImage"] . '" alt="resultaat"></div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<script>changePrice('. $row["productId"] . ', ' . $row["productPrice"] * $counts[$row["productId"]] . ')</script>';
                        } else { // Als er wel korting is
                            $newPrice = $row["productPrice"] * (1 - $row["productDiscountPercentage"] / 100); // Bereken prijs met discount
                            echo '<div id="productDiv' . $row["productId"] . '">'; // Elke echo print gedeelte van een product uit in HTML
                            echo '<div class="resultaat-item">';
                            echo '<div class="resultaat-item-flexbox">';
                            echo '<div class="description">';
                            echo '<h1>' . $row["productName"] . '</h1>';
                            echo '<h2 style="display: none" class="price" id="price2' . $row["productId"] . '">€' .$newPrice . '</h2>';
                            echo '<h2 class="price"><span class="kortingsprijs">€' . number_format((float)$row["productPrice"], 2, '.', '') . '</span> €' .number_format((float)$newPrice, 2, '.', '') . ' </h2>';
                            echo '<div class="up-and-down"><p class="ud1" onclick="changeItemCount(' . $row["productId"] . ', 1)">+</p><p class="ud2" id="productCount' . $row["productId"] . '">' . $counts[$row["productId"]] . '</><p class="ud3" onclick="changeItemCount(' . $row["productId"] . ', -1)">-</p></div>';
                            echo '</div>';
                            echo '<div class="ah"><img src="https://nerdy-gadgets.nl/images/' . $row["productImage"] . '" alt="resultaat"></div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<script>changePrice('. $row["productId"] . ', ' . $newPrice * $counts[$row["productId"]] . ')</script>';
                        }
                    }
                } else {
                    echo '<div class="noppes"><h1>Niks in je winkelwagen :(</h1><p>Misschien ben je een te grote nerd voor ons...</p></div>'; // Als er geen resultaten zijn (iemand heeft zelf de cookie aangepast met ongeldige product ID's)
                }
            } else {
                echo '<div class="noppes"><h1>Niks in je winkelwagen :(</h1><p>Misschien ben je een te grote nerd voor ons...</p></div>'; // Als er geen producten in de winkelwagen zitten
            }
            ?>
        </div>
    </div>
</main>
<?php include_once '../Footer/footer.php' ?>
</body>
<script src="typewriter.js"></script>
<script>
    function submitForm() {
        document.querySelector('.sort').submit(); // Submit de form automatisch als de sorteeropties veranderen
    }
</script>

</html>
