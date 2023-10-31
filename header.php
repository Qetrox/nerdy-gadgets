<?php

session_start();
if(isset($_COOKIE["cartList"])) {
    $cartListItems = json_decode($_COOKIE["cartList"]);
} else {
    $cartListItems = array();
}
$cartCount = count($cartListItems);

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
                    <p class="user-text-header"> <?php echo $cartCount ?> </p>
                </div>
            </a>
            <?php
            if (isset($_SESSION["first_name"])):?>
            <a href="https://nerdy-gadgets.nl/account/login.php">
                <div class="nav-item">
                    <p><span class="material-symbols-sharp">account_circle</span></p>
                    <p class="user-text-header"> <?= htmlspecialchars($_SESSION["first_name"]) ?> </p>
                </div>
            </a>
                <a href="https://nerdy-gadgets.nl/account/logout.php">
                    <div class="nav-item">
                        <p><span class="material-symbols-sharp">logout</span></p>
                    </div>
                </a>
            <?php else: ?>

                <a href="https://nerdy-gadgets.nl/account/login.php">
                    <div class="nav-item">
                        <p><span class="material-symbols-sharp">login</span></p>
                    </div>
                </a>
            <?php endif;?>
           </div>
    </div>
</header>