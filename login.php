<?php

require_once("parts/db.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $client = new Database();

    if ($client->login($_POST["email"], $_POST["password"])) {
        // úspešný login
        session_start();
        $_SESSION["login"] = true;
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["id"] = $client->get_user_id($_POST["email"]);
        $_SESSION["is_admin"] = $client->is_admin($_SESSION["id"]);

        header("Location: index.php");
        die();
    }

    // neúspešný login
    $error = true;
}

?>

<!DOCTYPE html>
<html>

<head></head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Šach a šachové turnaje</title>
<link rel="stylesheet" href="templatemo_style.css">
<link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="templatemo_wrapper">
        <div id="templatemo_top">
            <div class="cleaner"></div>
        </div>

        <div id="templatemo_header">
            <div id="site_title">
                <a href="#"><img src="images/sach1.png" alt="css templates" /></a>
            </div>
        </div>

        <div id="templatemo_banner">
            <?php require_once("parts/nav.php") ?>
            <div id="banner_right">
                <h2>Prihlásenie</h2>
            </div>
        </div>

        <div id="templatemo_main_wrapper">
            <div id="templatemo_content_wrapper" align="center">
                <?php
                if (isset($error) && $error) {
                    ?>
                    <p>Nesprávny email alebo heslo.</p>
                    <?php
                }
                ?>

                <form method="post">
                    <table class="tg">
                        <thead>
                            <tr>
                                <th class="tg-0lax">Email:</th>
                                <th class="tg-0lax"><input type="email" name="email">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tg-0lax">Heslo:</td>
                                <td class="tg-0lax"><input type="password" name="password"></td>
                            </tr>
                            <tr>
                                <td class="tg-baqh" colspan="2"><input type="submit" value="Prihlásiť sa"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="cleaner"></div>
            </div>
        </div>
        <div id="templatemo_main_bottom"></div>

        <div id="templatemo_footer">
            Copyright © 2023 <a href="#">Veronika Fehérvíziová</a>
        </div>

        <div class="cleaner"></div>
    </div>
</body>

</html>