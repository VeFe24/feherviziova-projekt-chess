<?php
session_start();
?>

<div id="templatemo_menu">
    <ul>
        <li><a href="index.php" class="current">Domov</a></li>
        <li><a href="competitions.php" class="current">Turnaje</a></li>
        <?php
        if (isset($_SESSION["login"]) && $_SESSION["login"]) {
            ?>
            <li><a href="my_account.php" class="current">Môj účet</a></li>
            <li><a href="logout.php" class="current">Odhlásiť sa</a></li>
            <?php
        } else {
            ?>
            <li><a href="register.php" class="current">Registrácia</a></li>
            <li><a href="login.php" class="current">Prihlásenie</a></li>
            <?php
        }
        ?>
        <li><a href="contact.php" class="current">Kontakt</a></li>
    </ul>
</div>