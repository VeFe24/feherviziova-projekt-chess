<?php

require_once("parts/db.php");
$client = new Database();
session_start();

$datetime = new DateTime();
$datetime->setDate(intval($_POST["year"]), intval($_POST["month"]), intval($_POST["day"]));
$datetime->setTime(intval($_POST["hour"]), intval($_POST["minute"]), 0);

$client->edit_competition($_POST["competition"], $_POST["name"], $_POST["description"], $datetime, $_POST["place"], $_SESSION["id"]);
?>

<script></script>
alert("Súťaž bola úspešne upravená.");
window.location.href = "competitions.php";
</script>