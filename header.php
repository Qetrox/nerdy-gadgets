<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . '/account/connection.php';
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

}

?>

<header>
    <div class="navbar">
        <div class="nav-logo">
            <img src="https://nerdy-gadgets.nl/images/logo_small_white.png" alt="logo" height="100%">
        </div>
        <a href="https://nerdy-gadgets.nl/">
            <div class="nav-item">
                <p><span class="material-symbols-sharp">home</span>NERDY-GADGETS</p>
            </div>
        </a>
        <div class="nav-searchbar">
            <form action="https://nerdy-gadgets.nl/search/" method="get">
                <input type="text" name="query" id="query" placeholder="Zoek een product">
            </form>
            <h1 class="mobile-show">Nerdy Gadgets</h1>
        </div>
        <a href="https://nerdy-gadgets.nl/search">
            <div class="nav-item">
                <p><span class="material-symbols-sharp">view_list</span>CATALOGUS</p>
            </div>
        </a>
        <div class="small-head-icons">
            <a href="https://nerdy-gadgets.nl/cart">
                <div class="nav-item">
                    <p><span class="material-symbols-sharp">shopping_cart</span></p>
                </div>
            </a>
            <?php
            if (isset($user)):?>
            <p> Welkom <?= htmlspecialchars($user["first_name"]) ?> </p>
            <p><a href="./account/logout.php"> Log uit</a> </p>
            <?php else: ?>

                <a href="https://nerdy-gadgets.nl/account/login.php">
                    <div class="nav-item">
                    <p><span class="material-symbols-sharp">account_circle</span></p>
                    </div>
                </a>
            <?php endif;?>
           </div>
    </div>
</header>