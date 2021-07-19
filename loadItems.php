<?php

require_once "connect.php";

$connection = new mysqli($host,$db_user,$db_password,$db_name);
$login = $_POST['login'];
$rezultat = $connection->query("SELECT * FROM bronieuzytkownikow WHERE login='$login'");
	$liczbaUzytkownikow = $rezultat->num_rows;
	if($liczbaUzytkownikow>0){
		$wiersz = $rezultat->fetch_assoc();
		$eq1 = $wiersz["eq1"];
		$eq2 = $wiersz["eq2"];
		$eq3 = $wiersz["eq3"];
		$eq4 = $wiersz["eq4"];
		$eq5 = $wiersz["eq5"];
		$bag1 = $wiersz["bag1"];
		$bag2 = $wiersz["bag2"];
		$bag3 = $wiersz["bag3"];
		$bag4 = $wiersz["bag4"];
		$bag5 = $wiersz["bag5"];
		$bag6 = $wiersz["bag6"];
		$bag7 = $wiersz["bag7"];
		$bag8 = $wiersz["bag8"];
		$bag9 = $wiersz["bag9"];
		$bag10 = $wiersz["bag10"];
		$bag11 = $wiersz["bag11"];
		$bag12 = $wiersz["bag12"];
		$result = $eq1 . "S" . $eq2 . "S" . $eq3 . "S" . $eq4 . "S" . $eq5 . "S" . $bag1 . "S" . $bag2 . "S" . $bag3 . "S" . $bag4 . "S" . $bag5 . "S" . $bag6 . "S" . $bag7 . "S" . $bag8 . "S" . $bag9 . "S" . $bag10 . "S" . $bag11 . "S" . $bag12;
		echo $result;
	}
	else{
		echo "blad!";
	}
$connection->close();

?>