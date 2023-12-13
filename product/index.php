<?php
session_start();
if(!isset($_GET["productId"])) { // Als er geen productId is meegegeven, redirect naar search pagina
    header('location: ../search/'); // Redirect naar search pagina
} else {
    // Opslaan van bekeken producten
    if(isset($_COOKIE["viewedProducts"])) { // Als er een viewedProducts cookie is, zet deze dan in een array
        $viewedProducts = json_decode($_COOKIE["viewedProducts"]); // Zet cookie om naar array
        array_push($viewedProducts, $_GET["productId"]); // Voeg productId toe aan viewedProducts array
    } else { // Als er geen viewedProducts cookie is, maak dan een lege array
        $viewedProducts = array(); // Maak array
        $viewedProducts[] = $_GET["productId"]; // Voeg productId toe aan viewedProducts array
    }
    // Als er meer dan 3 producten in de array zitten haal de oudste eruit
    if(isset($viewedProducts[3])) {
        array_splice($viewedProducts, 0, count($viewedProducts) - 3);
    }
    // Zet cookie met viewedProducts array met 30 dagen geldigheid
    setcookie("viewedProducts", json_encode($viewedProducts), time() + (86400 * 30), "/");

    if(isset($_COOKIE["cartList"])) { // Als er een cartList cookie is, zet deze dan in een array
        $cartListItems = json_decode($_COOKIE["cartList"]); // Zet cookie om naar array
    } else { // Als er geen cartList cookie is, maak dan een lege array
        $cartListItems = array();
    }

    if(isset($_GET["addProduct"]) && $_GET["addProduct"] == "true") { // Als er een productId is meegegeven, voeg deze dan toe aan de cartList cookie
        array_push($cartListItems, $_GET["productId"]); // Voeg productId toe aan cartList array
        setcookie("cartList", json_encode($cartListItems), time() + (86400 * 30), "/"); // Zet cookie met cartList array met 30 dagen geldigheid
        header('location: ./?productId=' . $_GET["productId"]); // Redirect naar product pagina
    }

    $cartCount = count($cartListItems); // Tel aantal items in cartList array


    require_once '../includes/dbh.php'; // Importeer database connectie
    /* import de Database variabelen */

    $conn = new mysqli($servername, $username, $password, $dbname);
    /*

     Error is niet echt! PHPstorm leest niet goed. NIET FIXEN!!

     */

// Check connection
    if ($conn->connect_error) { // Als er geen connectie is met de database, geef dan een error
        die("Connection failed: " . $conn->connect_error); // Geef error
    }
    $conn->set_charset("utf8"); // Zet charset naar UTF-8 zodat special characters goed worden weergegeven


    $stmt = $conn->prepare("SELECT * FROM product JOIN brand ON productBrandId = brandId WHERE productId = ?"); // Bereid SQL statement voor
    $stmt->bind_param("s", $_GET["productId"]); // Bind parameters aan statement
    $stmt->execute(); // Voer statement uit
    $result = $stmt->get_result(); // Haal resultaten op
    if ($result->num_rows > 0) { // Als er resultaten zijn
        while($row = $result->fetch_assoc()) { // Loop door resultaten
            $title = $row["productName"]; // Zet product info in variabelen
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
        if($discount > 0) { // Als er korting is
            $newPrice = $price * (1 - $discount / 100); // Bereken prijs met discount
            $priceHtml = '<span class="kortingsprijs">€' . number_format((float)$price, 2, '.', '') . '</span> €' .number_format((float)$newPrice, 2, '.', ''); // Zet prijs in HTML
        } else {
            $priceHtml = '€' . $price;
        }
        switch($stars) { // Zet sterren om in HTML
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
        header('location: ../search/'); // Redirect naar search pagina
    }

    $imageSwitchHtml = ''; // Zet image switch HTML op leeg

    if ($image2 != '' &&  $image2 != null) { // Als er een tweede image is
        $imageSwitchHtml = '<div><p id="b1" class="hoverme" onclick="switchToImage(1)">1</p><p id="b2" class="hoverme" onclick="switchToImage(2)">2</p></div>';

        if ($image3 != '' &&  $image3 != null) { // Als er een derde image is
            $imageSwitchHtml = '<div><p id="b1" class="hoverme" onclick="switchToImage(1)">1</p><p id="b2" class="hoverme" onclick="switchToImage(2)">2</p><p id="b3" class="hoverme" onclick="switchToImage(3)">3</p></div>';

            if ($image4 != '' &&  $image4 != null) { // Als er een vierde image is
                $imageSwitchHtml = '<div><p id="b1" class="hoverme" onclick="switchToImage(1)">1</p><p id="b2" class="hoverme" onclick="switchToImage(2)">2</p><p class="hoverme" id="b3" onclick="switchToImage(3)">3</p><p id="b4" class="hoverme" onclick="switchToImage(4)">4</p></div>';
            }
        }
    }

}
//begin code Sterren reviews, en andere dingen.
// $reviewstmt = $conn->prepare("SELECT * FROM reviewitem = ?"); //bereid review statement

$sterren = "1";
$sterrenaantal = "(". "11". ")";
$starhalf = FALSE;
$stertekst = (str_repeat("star", $sterren));
$sterrenavg = "1.0". "/5";
if ($starhalf == TRUE){ //als er een halve ster is
    $stertekst = ($stertekst. " star_half". (str_repeat(" star_border", 4-$sterren )));
} else {
    $stertekst = ($stertekst. (str_repeat(" star_border", 5-$sterren)). "3");
}



?>
<script src="/product/itemreview.js"></script> <!-- include de itemreview javascript -->


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
    <link href="https://fonts.google.com/icons?selected=Material%20Icons%20Outlined%3Astar%3A"/>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> <!-- half star icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../index.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script>



        function switchToImage(imagenumber) { // Switch naar image
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

<!-- <div class="loaderscreen"></div> -->
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
                   <div class="stars">
                    <p class="star"><span class="material-icons"><?php print("$stertekst"); ?></span><div class="sternummeritem"><?php print($sterrenavg. ($sterrenaantal)); ?></div></p>
                   </div>
                    <p class="levertijd">Bestel voor 16:00, overmorgen in huis*</p>
                </div>
                    <h6 class="tijddisclaimer">*Wij doen ons best om uw bestelling op tijd te leveren, maar door drukte kan dit soms wat langer duren. Onze excuses hiervoor.</h6>
                <div class ="reviewlinker">
                    <p>hallo</p>

                </div>
            </div>

        </div>
        <p><?php echo $description ?></p>

    </div>
    <button  onclick="showreviewpopup()">testknop</button>
    <div  class="reviewmain">
        <div class="reviewschrijven" >
            <div class="reviewbackground">
                <a style="margin-left: 1em; margin-top: 0.7em" >
                    <?php //maak isset dat ingelogd moet zijn ?>
                    Review Toevoegen</a>
                <div class="material-symbols-outlined" style="margin-top: -0.53em; margin-left: 0.2em" ><span> <br>add_circle</span></div>
        </div>
             </div>
            <div class="reviewpopup" id="reviewpopup">
                <div class="reviewpopupbackground" id="reviewpopupbackground">
                    <div class="closebtn" onclick="showreviewpopup()">
                        <div class="material-symbols-outlined">close</div>
                    </div>
                    <div class="reviewpopupforms">
                        <h3><?php echo htmlspecialchars($title) ?></h3>
                       <p> <?= htmlspecialchars($_SESSION["first_name"]) ?> </p>
                        <br><br>
                    Hoeveel sterren geeft u dit product?<br>
                        <p class="star"><span class="material-icons"><?php print("$stertekst"); ?></span><div class="sternummeritem"><?php print($sterrenavg); ?></div></p>
                        <input class="Titel" type="text" maxlength="50" x placeholder="titel">
                        <br><br>
                        <textarea class="opmerkingen" type="text" maxlength="500" x placeholder="Plaats hier uw opmerking"></textarea>
                        <br><br><br>
                        <input type="submit" id="hallo" onclick="showreviewpopup()">
                    </div>
                </div>
             </div>
    </div>
    <div class="reviewbekijken">
Geen reviews op dit product :-(

    </div>
</main>
<?php include_once '../../footer/footer.php' ?>
</body>
<script>

    function getCookie(cname) { // Haal cookie op
        let name = cname + "="; // Zet naam van cookie
        let decodedCookie = decodeURIComponent(document.cookie); // Decode cookie
        let ca = decodedCookie.split(';'); // Split cookie
        for(let i = 0; i <ca.length; i++) { // Loop door cookie
            let c = ca[i]; // Zet cookie in variabele
            while (c.charAt(0) == ' ') { // Als er een spatie is, verwijder deze dan
                c = c.substring(1); // Verwijder spatie
            }
            if (c.indexOf(name) == 0) { // Als de naam van de cookie overeenkomt met de naam van de cookie die we zoeken, geef dan de waarde van de cookie terug
                return c.substring(name.length, c.length); // Geef waarde van cookie terug
            }
        }
        return "";
    }

    function setCookie(cname, cvalue, exdays) { // Zet cookie
        const d = new Date(); // Maak nieuwe datum
        d.setTime(d.getTime() + (exdays*24*60*60*1000)); // Zet datum
        let expires = "expires="+ d.toUTCString(); // Zet datum in UTC string
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"; // Zet cookie
    }

    function IWANTTHISITEM() { // Voeg product toe aan winkelwagen
        let e = [];
        try {
            const uh = getCookie('cartList'); // Haal cartList cookie op
            e = JSON.parse(uh); // Zet cookie om naar array
        } catch (err) {
        }
        e.push('<?php echo $_GET["productId"] ?>'); // Voeg productId toe aan array
        //console.log(e); /* Laat de winkelwagen lijst zien als array, alleen voor testen nodig */
        document.getElementById('cartcount').innerHTML = e.length; // Zet aantal items in winkelwagen

        setCookie('cartList', JSON.stringify(e), 30); // Zet cookie met cartList array met 30 dagen geldigheid

        /* Andere manier om product toe te voegen aan winkelwagen via PHP (langzamer) */
        //window.location.replace('./?productId=<?php echo $_GET["productId"] ?>&addProduct=true')
    }

    try {
        const b1 = document.getElementById('b1'); // Haal image switch buttons op
        b1.style.borderBottom = '1px solid' // Zet border onder eerste button (Geen flauw idee waarom)
    } catch(e) {
        //ssssh
    }
</script>
</html>
