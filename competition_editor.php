<?php

require_once("parts/db.php");
$client = new Database();

$competition = null;
foreach ($client->get_competitions() as $db_competition) {
    if ($db_competition["id"] === intval($_POST["competition"])) {
        $competition = $db_competition;
        break;
    }
}

$datetime = DateTimeImmutable::createFromFormat("Y-m-d H:i:s", $competition["time"]);
?>

<!DOCTYPE html>
<html>

</html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editovanie súťaže</title>
    <link rel="stylesheet" href="templatemo_style.css">
    <link rel="stylesheet" href="css/competition_creator.css">
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
                <h2>Editovanie súťaže</h2>
            </div>
        </div>

        <div id="templatemo_main_wrapper">
            <div id="templatemo_content_wrapper" align="center">
                <form action="edit_competition.php" method="post">
                    <input type="hidden" name="competition" value="<?php echo $competition["id"]; ?>">
                    <table class="tg">
                        <tbody>
                            <tr>
                                <th class="tg-1wig">Názov:</th>
                                <th class="tg-0lax">
                                    <input class="txtinput" type="text" maxlength="45" name="name"
                                        value="<?php echo $competition["name"]; ?>">
                                </th>
                            </tr>
                            <tr>
                                <td class="tg-1wig">Popis:</td>
                                <td class="tg-0lax"><input class="txtinput" type="text" maxlength="45"
                                        name="description" value="<?php echo $competition["description"]; ?>"></td>
                            </tr>
                            <tr>
                                <td class="tg-1wig">Dátum a čas</td>
                                <td class="tg-0lax">
                                    <select name="day">
                                        <?php
                                        $selected_day = intval($datetime->format("d"));
                                        for ($i = 1; $i <= 31; $i++) {
                                            if ($i < 10) {
                                                $number = "0" . $i;
                                            } else {
                                                $number = $i;
                                            }

                                            if ($i === $selected_day) {
                                                ?>
                                                <option value="<?php echo $number; ?>" selected><?php echo $number; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    .
                                    <select name="month">
                                        <?php
                                        $selected_month = intval($datetime->format("m"));
                                        for ($i = 1; $i <= 12; $i++) {
                                            if ($i < 10) {
                                                $number = "0" . $i;
                                            } else {
                                                $number = $i;
                                            }

                                            if ($i === $selected_month) {
                                                ?>
                                                <option value="<?php echo $number; ?>" selected><?php echo $number; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $number; ?>"><?php echo $number; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    .
                                    <select name="year">
                                        <?php
                                        $selected_year = intval($datetime->format("Y"));
                                        for ($i = 2022; $i <= 2030; $i++) {
                                            if ($i === $selected_year) {
                                                ?>
                                                <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    o
                                    <input type="number" min="0" max="23" value="12" name="hour"
                                        value="<?php echo $datetime->format("H"); ?>">
                                    :
                                    <input type="number" min="0" max="59" value="0" name="minute"
                                        value="<?php echo $datetime->format("m"); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-1wig">Miesto:</td>
                                <td class="tg-0lax">
                                    <input class="txtinput" type="text" maxlength="20" name="place"
                                        value="<?php echo $competition["place"]; ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>

                    <input type="submit" value="Aktualizovať">
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