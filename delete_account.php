<?php

session_start();
require_once("parts/db.php");

// Aby sa náhodou nedalo zmazať admin účet
if ($_SESSION["id"] === 1) {
    header("Location: index.php");
    die();
}

$client = new Database();
$client->delete_account($_SESSION["id"]);
session_destroy();
?>

<script>
    alert("Váš účet bol úspešne zmazaný.");
    window.location.href = "index.php";
</script>