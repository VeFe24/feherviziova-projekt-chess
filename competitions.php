<?php
require_once("parts/db.php");

$client = new Database();
$competitions = $client->get_competitions();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Šach a šachové turnaje</title>
    <link rel="stylesheet" href="templatemo_style.css">
    <link rel="stylesheet" href="css/competitions.css">
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
                <h2>Súťaže</h2>
                <h3>Verejný zoznam aktuálnych súťaží</h3>
            </div>
        </div>

        <?php
        $logged_in = isset($_SESSION["login"]) && $_SESSION["login"] === true;
        ?>

        <div id="templatemo_main_wrapper">
            <div id="templatemo_content_wrapper" align="center">


                <?php
                if ($logged_in) {
                    $count = $client->get_signup_count($_SESSION["id"]);
                    ?>
                    <p>Aktuálne ste prihlásený na
                        <?php echo $count; ?> súťaž(ov).
                    </p>
                    <?php
                } else {
                    ?>
                    <p>Na prihlasovanie/odhlasovanie musíte byť prihlásený.</p>
                    <?php
                }
                ?>

                <table class="tg">
                    <thead>
                        <tr>
                            <th class="tg-amwm">ID</th>
                            <th class="tg-amwm">Názov súťaže</th>
                            <th class="tg-amwm">Správa</th>
                            <th class="tg-amwm">Miesto</th>
                            <th class="tg-amwm">Dátum a čas</th>
                            <th class="tg-amwm">Organizátor</th>
                            <?php
                            if ($logged_in) {
                                ?>
                                <th class="tg-amwm">Akcia</th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($competitions as $competition) {
                            ?>
                            <tr>
                                <td class="tg-0lax">
                                    <?php echo $competition["id"]; ?>
                                </td>
                                <td class="tg-0lax">
                                    <?php echo $competition["name"]; ?>
                                </td>
                                <td class="tg-0lax">
                                    <?php echo $competition["description"]; ?>
                                </td>
                                <td class="tg-0lax">
                                    <?php echo $competition["place"]; ?>
                                </td>
                                <td class="tg-0lax">
                                    <?php echo $competition["time"]; ?>
                                </td>
                                <td class="tg-0lax">
                                    <?php echo $client->get_username_by_id($competition["organizer"]); ?>
                                </td>
                                <?php
                                if ($logged_in) {
                                    ?>
                                    <td class="tg-0lax">
                                        <?php
                                        if ($client->is_signed_up($_SESSION["id"], $competition["id"])) {
                                            ?>
                                            <form action="leave_competition.php">
                                                <input type="hidden" name="competition" value="<?php echo $competition["id"]; ?>">
                                                <input type="submit" value="Odhlásiť sa">
                                            </form>
                                            <?php
                                        } else {
                                            ?>
                                            <form action="signup_competition.php">
                                                <input type="hidden" name="competition" value="<?php echo $competition["id"]; ?>">
                                                <input type="submit" value="Prihlásiť sa">
                                            </form>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if ($_SESSION["is_admin"]) {
                                            ?>
                                            <form action="delete_competition.php" method="post">
                                                <input type="hidden" name="competition" value="<?php echo $competition["id"]; ?>">
                                                <input type="submit" value="Odstrániť">
                                            </form>
                                            <form action="competition_editor.php" method="post">
                                                <input type="hidden" name="competition" value="<?php echo $competition["id"]; ?>">
                                                <input type="submit" value="Editovať">
                                            </form>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <?php
                                } ?>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                if ($logged_in && $_SESSION["is_admin"]) {
                    ?>
                    <hr>
                    <p>Administrácia</p>
                    <button><a href="competition_creator.php">Vytvoriť novú súťaž</a></button>
                    <?php
                }
                ?>

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