<footer class="footer">
    <!-- include footer stylesheet-->
    <link rel="stylesheet" href="/footer/footer.css">

    <!--dit maakt de tekst in de footer verschillende kolommen zodat het er netjes uit ziet -Daan -->
    <div class="rij">
        <div class="col col1">
            <h4>Handige Links</h4>
            <a href="https://www.Nerdy-Gadgets.nl/#about">Over ons</a><br>
            <a href="https://www.Nerdy-Gadgets.nl/legal/privacy/">Legaal</a><br>
            <a href="https://www.Nerdy-Gadgets.nl/search/">Producten</a><br>
            <a href="https://www.Nerdy-Gadgets.nl/">Home</a><br>
            <a href="https://nerdy-gadgets.nl/eastereggmo/raadsel.php">NerdyQuiz</a>
            <br><br>

        </div>
        <div class="col col2">
            <h4>Account</h4>
            <a href="https://www.Nerdy-Gadgets.nl/account">Account</a><br>
            <a href="https://nerdy-gadgets.nl/account/login.php">Inloggen</a><br>
            <a href="https://www.Nerdy-Gadgets.nl/account/signup.php">Registreren</a><br>
            <a href="https://www.Nerdy-Gadgets.nl/cart">Winkelwagen</a><br>
            <a href="https://nerdy-gadgets.nl/review/review.php">Site Review</a><br>
            <?php if(isset($_SESSION["first_name"])) echo '<a href="https://nerdy-gadgets.nl/logout.php">Log uit</a>'; ?>
        </div>
        <div class="col col3">
            <h4>CONTACT</h4>
            <p>Hospitaaldreef 5,<br> 1315 RC Almere<br>Tel: +088 469 6600</p>
        </div>

    </div>
    <!-- Dit is de bar onder de footer -->
    <div class="footerbar">
        <h3 style="margin-top: -2%;"><br><br><br>
            @Copyright nerdy-gadgets.nl (Groep 1) 2023 - All Right Reserved.<br><br><span
                    style="text-decoration: underline">DISCLAIMER: Dit is geen echte webshop, dit is een school project.</span>
        </h3>
    </div>
    <div class="mobile-navbar">
        <div class="mobile-nav-item">
            <a href="https://nerdy-gadgets.nl/">
                    <span class="material-symbols-sharp">
                        home
                    </span>
            </a>
        </div>
        <div class="mobile-nav-item">
            <a href="https://nerdy-gadgets.nl/cart/">
                    <span class="material-symbols-sharp">
                        shopping_cart
                    </span>
            </a>
        </div>
        <div class="mobile-nav-item">
            <a href="https://nerdy-gadgets.nl/account/">
                    <span class="material-symbols-sharp">
                        account_circle
                    </span>
            </a>
        </div>
    </div>
</footer>
