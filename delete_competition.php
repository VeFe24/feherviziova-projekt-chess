<?php

require_once("parts/db.php");
$client = new Database();
session_start();

$client->delete_competition($_POST["competition"]);
?>

<script>
    alert("Súťaž bola úspešne zmazaná.");
    window.location.href = "competitions.php";
</script>