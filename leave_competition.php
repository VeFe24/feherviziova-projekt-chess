<?php

session_start();
require_once("parts/db.php");

if (!isset($_GET["competition"])) {
    // nebol správne volaný skript
    header("Location: index.php");
    die();
}

$client = new Database();
$client->leave_competition($_SESSION["id"], $_GET["competition"]);
?>

<script>
    alert("Boli ste úspešne odhlásený zo súťaže.");
    window.location.href = "competitions.php";
</script>