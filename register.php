<?php

require_once("parts/db.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $client = new Database();

    try {
        $client->register_user($_POST["email"], $_POST["password"]);
        $success = true;
    } catch (\Exception $ex) {
        $error = $ex->getMessage();
    }
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
                <h2>Registrácia</h2>
                <h3>Vytvorenie nového konta</h3>
            </div>
        </div>

        <div id="templatemo_main_wrapper">
            <div id="templatemo_content_wrapper" align="center">
                <?php
                if (isset($error)) {
                    ?>
                    <p>Nastala chyba pri vytváraní účtu:
                        <?php echo $error; ?>
                    </p>
                    <?php
                }

                if (isset($success) && $success === true) {
                    ?>
                    <p>Váš účet bol úspešne vytvorený.</p>
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
                                <td class="tg-baqh" colspan="2"><input type="submit" value="Registrovať"></td>
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