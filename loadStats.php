<?php

require_once "connect.php";

$connection = new mysqli($host,$db_user,$db_password,$db_name);
$login = $_POST['login'];
$rezultat = $connection->query("SELECT * FROM statystyki WHERE login='$login'");
	$liczbaUzytkownikow = $rezultat->num_rows;
	if($liczbaUzytkownikow>0){
		$wiersz = $rezultat->fetch_assoc();
		$gold = $wiersz["gold"];
		$crystals = $wiersz["crystals"];
		$level = $wiersz["level"];
		$exp = $wiersz["exp"];
		$hp = $wiersz["hp"];
		$mana = $wiersz["mana"];
		
		$result = $gold . "S" . $crystals . "S" . $level . "S" . $exp . "S" . $hp . "S" . $mana;
		echo $result;
	}
	else{
		echo "blad!";
	}
$connection->close();

?>