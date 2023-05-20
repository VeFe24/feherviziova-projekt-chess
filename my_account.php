<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Môj účet</title>
    <link rel="stylesheet" href="templatemo_style.css">
    <link rel="stylesheet" href="css/my_account.css">
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
                <h2>Môj účet</h2>
            </div>
        </div>

        <div id="templatemo_main_wrapper">
            <div id="templatemo_content_wrapper" align="center">

                <table class="tg">
                    <thead>
                        <tr>
                            <th class="tg-1wig">ID:</th>
                            <th class="tg-0lax">
                                <?php
                                echo $_SESSION["id"];
                                ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tr>
                        <td class="tg-1wig">E-mail:</td>
                        <td class="tg-0lax">
                            <?php echo $_SESSION["email"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-1wig">Nové heslo:</td>
                        <td class="tg-0lax">
                            <form method="post" action="update_password.php">
                                <input type="hidden" value="<?php echo $_SESSION["id"]; ?>" name="id">
                                <input type="password" name="new_password">
                                <input type="submit" value="Zmeniť heslo">
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <hr>

                <button><a href="delete_account.php">Odstrániť môj účet</a></button>

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