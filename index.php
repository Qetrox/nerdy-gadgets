
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
            <p>Door op Accepteren te drukken, gaat <br>u akkoord met <a href="/privacy">Onze Cookiebeleid</a></p>
            </div>
            <button onclick="dissapearcookies()" type="submit" name="CookieKnop" class="cookieacceptbtn" id="accept">Accepteer Cookies</button>
            <button type="submit" name="CookieKnop" class="cookiedeclinebtn">Afwijzen Cookies</button>
            <img src="cookie.png" alt="cookiespng" width="288" height="162" class="cookiepng">
        </div>
        <script src="cookies.js"></script>



        <div class="best-sellers" id="bestsellers">
            <h1>Best Sellers - Aanraders!</h1>
            <p>Dit zijn onze best verkochte producten.<br>Bekijk ze eens, misschien zit er wel iets tussen voor jou!</p>
            <div class="bs-list">

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
    <footer>
        <div class="footer-content">
            <!--dit maakt de tekst in de footer -Daan -->
            <div class="col1">
                <h3 style="color:#21212F"; >Handige Links</h3>
                <a style="color:#21212F"; href="./#about">Over ons</a>
                <a style="color:#21212F"; href="./legal/privacy/">Legaal</a>
                <a style="color:#21212F"; href="./search/">Producten</a>
                <a style="color:#21212F"; href="./account/">Account</a>
                <a style="color:#21212F"; href="./">Home</a>

            </div>
            <div class="col2">
                <h6 style="color:#21212F"; >@Copyright nerdy-gadgets.nl (Groep 1) 2023 - All Right Reserved.<br><span style="text-decoration: underline">DISCLAIMER: Dit is geen echte webshop, dit is een school project.</span></h6>

            </div>
            <div class="col3">
                <h3 style="color:#21212F"; >CONTACT</h3>
                <p style="color:#21212F"; >Hospitaaldreef 5,<br> 1315 RC Almere<br>Tel: +088 469 6600</p>
            </div>

        </div>


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
<script src="typewriter.js"></script>

</html>
