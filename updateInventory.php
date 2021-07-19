<?php
require_once "connect.php";

$connection = new mysqli($host,$db_user,$db_password,$db_name);
$login = $_POST['login'];
$inventorySlotId = $_POST['inventorySlotId'];
$changedValue = $_POST['changedValue'];

$rezultat = $connection->query("UPDATE bronieuzytkownikow SET " . $inventorySlotId . " = " . "'$changedValue'" . " WHERE login='$login'");
$connection->close();

?>