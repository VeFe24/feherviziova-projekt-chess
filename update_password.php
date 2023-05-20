<?php

session_start();
require_once("parts/db.php");

if (isset($_POST["id"]) && isset($_POST["new_password"])) {
    $client = new Database();

    $client->update_password($_POST["id"], $_POST["new_password"]);
    ?>
    <script>
        alert("Vaše heslo bolo úspešne zmenené. Prosím prihláste sa znovu pomocou nového hesla.");
        window.location.href = "logout.php";
    </script>
    <?php
}
?>