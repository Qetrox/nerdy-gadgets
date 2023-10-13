<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "/connection.php";

    /* account username en wachtwoord ophalen van database */
    $sqla = sprintf("SELECT * FROM user
                           WHERE email ='%s'",
                           $mysqli->real_escape_string($_POST["gebruikersnaam"]));
    $result = $mysqli->query($sqla);
    $user = $result->fetch_assoc();

    $password = $_POST['password'];
    /*  wachtwoord checken daarna inloggen  */
    if(trim($user["password"]) == trim($password)){
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["first_name"] = $user["first_name"];
        $_SESSION["surname"] = $user["surname"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["surname_prefix"] = $user["surname_prefix"];





        header("Location: ../index.php");
        exit;

    }
    /* als inlog gegevens niet kloppen*/

    else {
        $is_invalid = true;
    }

 }

?>

<!DOCTYPE html>
<html lang="nl-nl">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accountpage</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
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
    <link rel="stylesheet" href="stylesheet.css">
</head>




<body>
<?php include_once '../header.php'?>
<main> <!-- Hier de content van de pagina in doen :) -->


    <?php
    if($is_invalid == true){
        print("gegevens incorrect");

    }

    ?>

    <div class = "flex-container">

        <!--login form-->

        <div class="account">
            <form method="post"?> 
            <label for="gebruikersnaam"><b>gebruikersnaam</b></label>
            <input type="text" placeholder="Enter Username" name="gebruikersnaam" required>
        
            <label for="psw"><b>wachtwoord</b></label>
            <input type="Password" placeholder="Enter Password" name="password" required>
        
            <button type="submit">Login</button>
            <a href="signup.php"> naar Account aanmaken</a>
          </form>
             
          </div>

    </div>  




</main>
 
  
</body>

 
</html>