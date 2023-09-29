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
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <header>
        <div class="navbar">
            <div class="nav-logo">
                <img src="images/logo_small_white.png" alt="logo" height="100%">
            </div>
            <a href="./">
                <div class="nav-item">
                    <p><span class="material-symbols-sharp">home</span>NERDY-GADGETS</p>
                </div>
            </a>
            <div class="nav-searchbar">
                <form action="./search/" method="get">
                    <input type="text" name="query" id="query" placeholder="Zoek een product">
                </form>
                <h1 class="mobile-show">Nerdy Gadgets</h1>
            </div>
            <a href="./">
                <div class="nav-item">
                    <p><span class="material-symbols-sharp">shopping_cart</span>WINKELWAGEN</p>
                </div>
            </a>
            <a href="./">
                <div class="nav-item">
                    <p><span class="material-symbols-sharp">account_circle</span>ACCOUNT</p>
                </div>
            </a>
        </div>
    </header>
    <main> <!-- Hier de content van de pagina in doen :) -->
        <div class="main-menu-display">
            <h1 id="typewriter"></h1>
            <div class="background"></div>
        </div>
        <div class="best-sellers">
            <h1>Best Sellers - Aanraders!</h1>
            <p>Dit zijn onze best verkochte producten.<br>Bekijk ze eens, misschien zit er wel iets tussen voor jou!</p>
            <div class="bs-list">

                <div class="bs">
                    <h1>PlayStation 5 <span class="euro-text">€550</span> </h1>
                    <img src="./images/playstation_5.jpg" alt="foto">
                    <p>Ervaar console gamen realistischer dan ooit tevoren met de PlayStation 5 Digital Edition. Deze PlayStation 5 Digital Edition heeft geen cd lade, waardoor je geen gebruik maakt van fysieke games en Blu-ray films.</p>
                </div>

                <div class="bs">
                    <h1>Dit ene product <span class="euro-text">€10</span> </h1>
                    <img src="./images/mainFrame.png" alt="foto">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet dictum sit amet. Nisl purus in mollis nunc sed id semper. Sit amet mattis vulputate enim nulla. </p>
                </div>

                <div class="bs">
                    <h1>Dit ene product <span class="euro-text">€10</span> </h1>
                    <img src="./images/mainFrame.png" alt="foto">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet dictum sit amet. Nisl purus in mollis nunc sed id semper. Sit amet mattis vulputate enim nulla. </p>
                </div>

            </div>
        </div>
        <div class="over-ons">
            <h1>Wie is Nerdy-Gadgets?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet dictum sit amet. Nisl purus in mollis nunc sed id semper. Sit amet mattis vulputate enim nulla.</p>
        </div>

        

        

    </main>
    <footer>
        <div class="footer-content">

            <h3>ik weet dat de kleur niet klopt</h3>

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
                <a href="./account.php">
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
