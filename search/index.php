<?php
$query = "";
if(isset($_GET["query"]) && $_GET["query"] !== "") {
    $query = "\"" . $_GET["query"] . "\"";
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
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="index.js"></script>
    <link rel="stylesheet" href="../base_stylesheet.css">
    <link rel="stylesheet" href="./stylesheet.css">
</head>

<body>
<header>
    <div class="navbar">
        <div class="nav-logo">
            <img src="../images/logo_small_white.png" alt="logo" height="100%">
        </div>
        <a href="../">
            <div class="nav-item">
                <p><span class="material-symbols-sharp">home</span>NERDY-GADGETS</p>
            </div>
        </a>
        <div class="nav-searchbar">
            <form action="./" method="get">
                <input type="text" name="query" id="query" placeholder="Zoek een product" value=<?php echo $query ?> >
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
    <div class="resultaten">
        <h1>
            <?php
            if(isset($_GET["query"]) && $_GET["query"] !== "") {
                echo "Resultaten Voor: " . $_GET["query"];
            } else {
                echo "Complete Catalogus";
            }


            ?>
        </h1>
        <div class="resultaten-lijst">
            <div class="resultaat-item">
                <div class="resultaat-item-flexbox">
                    <div class="description">
                        <h1>Playstation 5<span>€550</span></h1>
                        <p>Ervaar console gamen realistischer dan ooit tevoren met de PlayStation 5 Digital Edition. Deze PlayStation 5 Digital Edition heeft geen cd lade, waardoor je geen gebruik maakt van fysieke games en Blu-ray films. Door de krachtige grafische processor in deze console game je met 4K resolutie met een maximale verversingssnelheid van 120hz.</p>
                    </div>
                    <img src="../images/playstation_5.jpg" alt="resultaat">
                </div>

            </div>
            <div class="resultaat-item">
                <div class="resultaat-item-flexbox">
                    <div class="description">
                        <h1>Super cool item<span>€10</span></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <img src="../images/mainFrame.png" alt="resultaat">
                </div>

            </div>
            <div class="resultaat-item">
                <div class="resultaat-item-flexbox">
                    <div class="description">
                        <h1>Super cool item<span>€10</span></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <img src="../images/mainFrame.png" alt="resultaat">
                </div>

            </div>
            <div class="resultaat-item">
                <div class="resultaat-item-flexbox">
                    <div class="description">
                        <h1>Super cool item<span>€10</span></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <img src="../images/mainFrame.png" alt="resultaat">
                </div>

            </div>
            <div class="resultaat-item">
                <div class="resultaat-item-flexbox">
                    <div class="description">
                        <h1>Super cool item<span>€10</span></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <img src="../images/mainFrame.png" alt="resultaat">
                </div>

            </div>
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

</html>
