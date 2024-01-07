<?php
require_once '../includes/dbh.php';
/* import de Database variabelen */

$conn = new mysqli($servername, $username, $password, $dbname);
/*

 Error is niet echt! PHPstorm leest niet goed. NIET FIXEN!!

 */

// Check connection
if ($conn->connect_error) { // als er een error is met de connectie
    die("Connection failed: " . $conn->connect_error); // laat de error zien
}

$conn->set_charset("utf8"); // zet de charset naar utf8 zodat de data goed wordt weergegeven

/* krijg alle categorieen */
$stmt = $conn->prepare("SELECT productCategory FROM product GROUP BY productCategory;");
$stmt->execute();
$catResult = $stmt->get_result();

/* krijg all merken */
$stmt = $conn->prepare("SELECT * from brand;");
$stmt->execute();
$brandResult = $stmt->get_result();

/* kijk wat je hebt opgezocht */
$query = "";
if(isset($_GET["query"]) && $_GET["query"] !== "") {
    $query = "\"" . $_GET["query"] . "\"";
}

$sort = null;
/* kijk of er sorteer opties zijn aangegeven */
if(isset($_GET["sortOption"])) {
    $sort = $_GET["sortOption"]; //price asc, price desc, verschijndatum
    if(!in_array($sort, ['priceascending', 'pricedescending', 'datepublished'])) {
        $sort = null;
    }
}
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
</head>

<body>
<div class="loaderscreen"></div>
<?php include_once '../header.php'?>
<main> <!-- Hier de content van de pagina in doen :) -->
    <div class="resultaten">
        <h1>
            <?php
            if(isset($_GET["query"]) && $_GET["query"] !== "") { // als er een zoekopdracht is
                echo "Resultaten Voor: " . $_GET["query"]; // laat de zoekopdracht zien
            } else {
                echo "Complete Catalogus"; // anders laat de complete catalogus zien
            }
            ?>
        </h1>
        <form class="sort" action="./" method="get">
            <input type="text" name="query" id="query" placeholder="Zoek een product" hidden value=<?php echo $query ?> >
            <label>Merk</label>
                <select name="brand" id="brand" onchange="submitForm()">
                    <option value="all">Alles</option>
                    <?php
                        while($row = $brandResult->fetch_assoc()) {
                            if(isset($_GET["brand"]) && $_GET["brand"] ==  $row["brandName"]) {
                                echo '<option value="' . $row["brandName"] . '" selected>' . $row["brandName"] . '</option>';
                            } else {
                                echo '<option value="' . $row["brandName"] . '">' . $row["brandName"] . '</option>';
                            }
                        }
                    ?>
                </select>
            <label>Categorie</label>
                <select name="category" id="category" onchange="submitForm()">
                    <option value="all">Alles</option>
                    <?php
                    while($row = $catResult->fetch_assoc()) {
                        if(isset($_GET["category"]) && $_GET["category"] ==  $row["productCategory"]) {
                            echo '<option value="' . $row["productCategory"] . '" selected>' . $row["productCategory"] . '</option>';
                        } else {
                            echo '<option value="' . $row["productCategory"] . '">' . $row["productCategory"] . '</option>';
                        }
                    }
                    ?>
                </select>
            <label>Sorteer op</label>
                <select name="sortOption" id="sortOption" onchange="submitForm()">
                    <?php
                    if($sort != null) { // als er een sorteer optie is aangegeven
                        switch($sort) { //priceascending, pricedescending, datepublished
                            case 'priceascending': // als de sorteer optie priceascending is
                                echo '<option value="datepublished">Datum</option>';
                                echo '<option value="priceascending" selected>Prijs oplopend</option>';
                                echo '<option value="pricedescending">Prijs aflopend</option>';
                                break;
                            case 'pricedescending': // als de sorteer optie pricedescending is
                                echo '<option value="datepublished">Datum</option>';
                                echo '<option value="priceascending">Prijs oplopend</option>';
                                echo '<option value="pricedescending" selected>Prijs aflopend</option>';
                                break;
                            case 'datepublished': // als de sorteer optie datepublished is
                                echo '<option value="datepublished" selected>Datum</option>';
                                echo '<option value="priceascending">Prijs oplopend</option>';
                                echo '<option value="pricedescending">Prijs aflopend</option>';
                                break;
                        }
                    } else { // als er geen sorteer optie is aangegeven
                        echo '<option value="datepublished" selected>Datum</option>';
                        echo '<option value="priceascending">Prijs oplopend</option>';
                        echo '<option value="pricedescending">Prijs aflopend</option>';
                    }
                    ?>
                </select>
            </label>
        </form>
        <div class="resultaten-lijst">
            <?php
$query = "";
$sortStatement = "";
if($sort != null) {
    switch($sort) { //priceascending, pricedescending, datepublished
        case 'priceascending': // als de sorteer optie priceascending is
            $sortStatement = " ORDER BY productPrice asc"; // sorteer op prijs oplopend
            break;
        case 'pricedescending': // als de sorteer optie pricedescending is
            $sortStatement = " ORDER BY productPrice desc";
            break;
        case 'datepublished': // als de sorteer optie datepublished is
            $sortStatement = " ORDER BY productId asc";
            break;
    }
}

if(isset($_GET["category"]) && $_GET["category"] !== "" && $_GET["category"] !== "all") { // als er een categorie is aangegeven
    $new_string = preg_replace("/[^A-Za-z0-9.!?]/",'', $_GET["category"]); // haal alle speciale tekens weg, zodat SQL injection niet mogelijk is
    $categoryStatement = " AND UPPER(productCategory) = UPPER(\"" . $new_string . "\")"; // zoek naar producten met de categorie
} else {
    $categoryStatement = "";
}

if(isset($_GET["brand"]) && $_GET["brand"] !== "" && $_GET["brand"] !== "all") { // als er een merk is aangegeven
    $new_string = preg_replace("/[^A-Za-z0-9.!?]/",'', $_GET["brand"]); // haal alle speciale tekens weg, zodat SQL injection niet mogelijk is
    $brandStatement = " AND UPPER(brandName) = UPPER(\"" . $new_string . "\")"; // zoek naar producten met het merk
} else {
    $brandStatement = "";
}

if(isset($_GET["query"]) && $_GET["query"] !== "") { // als er een zoekopdracht is
    $query_sql = '%' . $_GET["query"] . '%';

    /* zoek voor producten in de database die je zoekopdracht matchen */
    $stmt = $conn->prepare("SELECT * FROM product JOIN brand ON productBrandId = brandId WHERE UPPER(productName) LIKE UPPER(?) OR UPPER(productTags) LIKE UPPER(?)" . $categoryStatement . $brandStatement . $sortStatement);
    $stmt->bind_param("ss", $query_sql, $query_sql);
    $stmt->execute();
    $result = $stmt->get_result();

    /* laat resultaten zien (als die er zijn) */
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["productDiscountPercentage"] === 0) { // als er geen korting is print het product in de lijst/HTML
                echo '<a href="../product/?productId=' . $row["productId"] . '">';
                echo '<div class="resultaat-item">';
                echo '<div class="resultaat-item-flexbox">';
                echo '<div class="description">';
                echo '<h1>' . $row["productName"] . '</h1>';
                echo '<h2 class="price">€' . $row["productPrice"] . '</h2>';
                echo '<p>' . substr($row["productDescription"], 0, 400) . '...</p>';
                echo '</div>';
                echo '<div class="ah"><img src="../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../images/' . $row["productImage"] . '" alt="resultaat"></div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            } else { // Als er wel korting is print het product in de lijst/HTML
                $newPrice = $row["productPrice"] * (1 - $row["productDiscountPercentage"] / 100); //bereken prijs met discount
                echo '<a href="../product/?productId=' . $row["productId"] . '">';
                echo '<div class="resultaat-item">';
                echo '<div class="resultaat-item-flexbox">';
                echo '<div class="description">';
                echo '<h1>' . $row["productName"] . '</h1>';
                echo '<h2 class="price"><span class="kortingsprijs">€' . number_format((float)$row["productPrice"], 2, '.', '') . '</span> €' .number_format((float)$newPrice, 2, '.', '') . ' </h2>';
                echo '<p>' . substr($row["productDescription"], 0, 400) . '...</p>';
                echo '</div>';
                echo '<div class="ah"><img src="../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../images/' . $row["productImage"] . '" alt="resultaat"></div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        }
    } else {
        /* Als er geen resultaten zijn */
        echo '<div class="noppes"><h1>Niks gevonden :(</h1><p>Misschien ben je een te grote nerd voor ons...</p></div>';
    }
} else {
    /* laat alle producten zien */
    $datenesqlding = "SELECT * FROM product JOIN brand ON productBrandId = brandId WHERE productId LIKE '%' " . $categoryStatement . $brandStatement . $sortStatement; // haal alle producten op
    $stmt = $conn->prepare($datenesqlding); // bereid de SQL statement voor

    $stmt->execute(); // voer de SQL statement uit
    $result = $stmt->get_result(); // haal de resultaten op

    if ($result->num_rows > 0) { // als er resultaten zijn
        while ($row = $result->fetch_assoc()) { // voor elk resultaat
            if($row["productDiscountPercentage"] === 0) { // als er geen korting is print het product in de lijst/HTML
                echo '<a href="../product/?productId=' . $row["productId"] . '">';
                echo '<div class="resultaat-item">';
                echo '<div class="resultaat-item-flexbox">';
                echo '<div class="description">';
                echo '<h1>' . $row["productName"] . '</h1>';
                echo '<h2 class="price">€' . $row["productPrice"] . '</h2>';
                echo '<p>' . substr($row["productDescription"], 0, 400) . '...</p>';
                echo '</div>';
                echo '<div class="ah"><img src="../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../images/' . $row["productImage"] . '" alt="resultaat"></div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            } else { // Als er wel korting is print het product in de lijst/HTML
                $newPrice = $row["productPrice"] * (1 - $row["productDiscountPercentage"] / 100); //bereken prijs met discount
                echo '<a href="../product/?productId=' . $row["productId"] . '">';
                echo '<div class="resultaat-item">';
                echo '<div class="resultaat-item-flexbox">';
                echo '<div class="description">';
                echo '<h1>' . $row["productName"] . '</h1>';
                echo '<h2 class="price"><span class="kortingsprijs">€' . number_format((float)$row["productPrice"], 2, '.', '') . '</span> €' .number_format((float)$newPrice, 2, '.', '') . ' </h2>';
                echo '<p>' . substr($row["productDescription"], 0, 400) . '...</p>';
                echo '</div>';
                echo '<div class="ah"><img src="../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../../images/' . $row["productImage"] . '" alt="resultaat"></div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        }
    }
}
?>
        </div>
    </div>
</main>
<footer>
    <?php include_once '../footer/footer.php' ?>
</body>
<script src="typewriter.js"></script>
<script>
    function submitForm() {
        document.querySelector('.sort').submit(); // submit de form met de sorteer opties als er een nieuwe optie is aangegeven
    }
</script>

</html>
