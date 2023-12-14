<?php

    // Pak het IP van persoon
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }

    $ip= '178.84.181.79';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_URL, 'http://ip-api.com/php/' . $ip);
    $result = curl_exec($curl);
    curl_close($curl);
    $result = unserialize($result);

    echo '<script> const ACCEPTEER = "IP: '. $ip .'<br> Land: ' . $result["country"] . '<br>Stad: ' . $result["city"] . '<br> Provider: ' . $result["isp"] . '<br> Organisatie: ' . $result["org"] . '"; </script>';

    ?>

<html lang="nl-nl">
<head>
    <title>C O O K I E S</title>
    <link rel="stylesheet" href="accept_our_cookies.css">
    <script src="accept_our_cookies.js"></script>
</head>
<body id="body">
<div class="accept_our_cookies">
    <div class="accept_our_cookies">
        <h1 class="accept_our_cookies" id="_accept_our_cookies">U heeft op 'cookies afwijzen' geklikt.</h1>
        <div class="accept_our_cookies" id="accept_our_cookies"></div>
    </div>
</div>
<iframe
        id="--accept-me-cookies--"
        width="100%"
        height="100%"
        frameborder="0"
        scrolling="no"
        marginheight="0"
        marginwidth="0"
        src="https://maps.google.com/maps?q=<?php echo $result["lat"] ?>,<?php echo $result["lon"] ?>&hl=nl&z=14&amp;output=embed"
>
</iframe>
</body>
<script>
    accept_our_cookies_();
</script>
</html>
