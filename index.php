
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
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="index.js"></script>
    <link rel="stylesheet" href="base_stylesheet.css">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="load.css">
</head>

<div class="loaderscreen"></div>
<body>
    <?php include_once './header.php'?>
    <main> <!-- Hier de content van de pagina in doen :) -->
        <div class="main-menu-display">
            <h1 id="typewriter"></h1>
            <div class="background"></div>
        </div>


        </div>
        <!-- Hier de Cookie Pop-Up -->
        <div class="Cookies" id="cookies">
            <div class="CookiesText">
            <h2>Cookies Toestemming</h2>
            <h4>Wij maken gebruik van Cookies</h4>
            <p>Door op Accepteren te drukken, gaat <br>u akkoord met <a href="/legal/privacy">Onze Cookiebeleid</a>.<br></p>
            </div>
            <button onclick="dissapearCookies()" type="submit" name="CookieKnop" class="cookieacceptbtn" id="accept">Accepteer Cookies</button>
            <button onclick="rickroll()" type="submit" name="CookieKnop" class="cookiedeclinebtn" id="ugh">Afwijzen Cookies</button>
            <img src="cookies/cookie.png" alt="cookiespng" width="288" height="162" class="cookiepng">
        </div>
        <script src="cookies/cookies.js"></script>



        <div class="best-sellers" id="bestsellers">
            <h1><?php if(isset($_COOKIE["viewedProducts"])) { echo 'Laatst bekeken producten'; } else echo 'Best Sellers - Aanraders!'; ?></h1>
            <p><?php if(isset($_COOKIE["viewedProducts"])) { echo 'Je hebt deze producten voor het laatst bekeken <br> KOOP ZE!!'; } else echo 'Dit zijn onze best verkochte producten.<br>Bekijk ze eens, misschien zit er wel iets tussen voor jou!'; ?></p>
            <div class="bs-list">
                <?php
                include_once './includes/dbh.php';
                if(isset($_COOKIE["viewedProducts"])) { // Als er een viewedProducts cookie is, zet deze dan in een array
                    $viewedProducts = json_decode($_COOKIE["viewedProducts"]); // Zet cookie om naar array
                    $viewedProducts = array_reverse($viewedProducts); // Keer de array om zodat de laatst bekeken producten vooraan staan

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    /*

                     Error is niet echt! PHPstorm leest niet goed. NIET FIXEN!!

                     */

                    // Check connection
                    if ($conn->connect_error) { // Als er geen connectie is met de database, geef dan een error
                        die("Connection failed: " . $conn->connect_error); // Geef error
                    }
                    $conn->set_charset("utf8"); // Zet charset naar UTF-8 zodat special characters goed worden weergegeven

                    $stmt = $conn->prepare("SELECT * FROM product JOIN brand ON productBrandId = brandId WHERE productId IN (?, ?, ?)");
                    $stmt->bind_param("sss", $viewedProducts[0], $viewedProducts[1], $viewedProducts[2]); // Bind parameters aan statement
                    $stmt->execute();
                    $result = $stmt->get_result(); // haal de resultaten op

                    if ($result->num_rows > 0) { // als er resultaten zijn
                        while ($row = $result->fetch_assoc()) { // voor elk resultaat
                            if ($row["productDiscountPercentage"] === 0) { // als er geen korting is print het product in de lijst/HTML
                                echo '<a href="./product/?productId=' . $row["productId"] . '">';
                                echo '<div class="bs"><h1>' . $row["productName"] . '<br><span class="euro-text">€' . number_format((float)$row["productPrice"], 2, '.', '') . '</span> </h1><img src="https://nerdy-gadgets.nl/images/' . $row["productImage"] . '" alt="foto"><p>' . substr($row["productDescription"], 0, 400) . '...</p></div>';
                                echo '</a>';
                            } else { // Als er wel korting is print het product in de lijst/HTML
                                $newPrice = $row["productPrice"] * (1 - $row["productDiscountPercentage"] / 100); //bereken prijs met discount
                                echo '<a href="./product/?productId=' . $row["productId"] . '">';
                                echo '<div class="bs"><h1>' . $row["productName"] . '<br><span class="euro-text"><span class="kortingsprijs">€' . number_format((float)$row["productPrice"], 2, '.', '') . '</span> €' . number_format((float)$newPrice, 2, '.', '') . ' </span></h1><img src="https://nerdy-gadgets.nl/images/' . $row["productImage"] . '" alt="foto"><p>' . substr($row["productDescription"], 0, 400) . '...</p></div>';
                                echo '</a>';
                            }
                        }
                    }
                } else {
                    ?>
                <div class="bs">
                    <h1>PlayStation 5 <span class="euro-text">€440</span> </h1>
                    <img src="./images/playstation_5.jpg" alt="foto">
                    <p>Ervaar console gamen realistischer dan ooit tevoren met de PlayStation 5 Digital Edition. Deze PlayStation 5 Digital Edition heeft geen cd lade, waardoor je geen gebruik maakt van fysieke games en Blu-ray films.</p>
                </div>

                <div class="bs">
                    <h1>GRATIS 16GB RAM<span class="euro-text">€0</span> </h1>
                    <img src="https://nerdy-gadgets.nl/images/free_ram.png" alt="foto">
                    <p>Krijg nu 16 Gigabyte aan gratis random access memory (RAM)! Deze is vervolgens via onze website te downloaden. Gelimiteerd tot 4 stuks per klant.</p>
                </div>

                <div class="bs">
                    <h1>Moderator Pack <span class="euro-text">€68.99</span> </h1>
                    <img src="https://nerdy-gadgets.nl/images/discord_moderator_pack.png" alt="foto">
                    <p>Van plan om een Discord moderator te worden? Koop dan NU onze Discord Moderator Starter Pack. Dit geweldige pakketje bevat een Ban-Hammer, Anime Muismat, Koptelefoon & Deodorant en zorgt ervoor dat je enorm veel Discord Kittens krijgt.</p>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="over-ons" id="about">
            <h1>Wie zijn wij?</h1>
            <p> Welkom bij Nerdy Gadgets!

Stap binnen in de geeky hemel, waar tech en nerd-cultuur samenkomen om je zintuigen te prikkelen. Nerdy Gadgets is dé plek voor gadgetliefhebbers en popcultuur aficionado's. Hier vind je een onweerstaanbare mix van futuristische technologie en nostalgie uit je favoriete films, strips en games.
Bij Nerdy Gadgets geloven we dat nerds de wereld veranderen, en we zijn er trots op deel uit te maken van deze revolutie. Duik in onze virtuele schappen en ontdek de nieuwste en meest onverwachte gadgets die je nerd-zintuigen zullen laten tintelen.

Klaar om je passie naar een hoger niveau te tillen? Begin je ontdekkingstocht bij Nerdy Gadgets en laat je innerlijke geek stralen! </p>
        </div>
    </main>
    <?php include_once './footer/footer.php' ?>
</body>
<script src="typewriter.js"></script>

</html>
