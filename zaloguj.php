<?php

require_once "connect.php";

$connection = new mysqli($host,$db_user,$db_password,$db_name);

$login = $_POST['login'];
$password = $_POST['password'];
$login = htmlentities($login, ENT_QUOTES, "UTF-8");

$rezultat = $connection->query(sprintf("SELECT * FROM konta WHERE login='%s'",mysqli_real_escape_string($connection,$login)));
	$liczbaUzytkownikow = $rezultat->num_rows;
	if($liczbaUzytkownikow>0){
		$wiersz = $rezultat->fetch_assoc();
		$hasloKonta = $wiersz['password'];
		$rezultat->close();
		if (password_verify($password,$hasloKonta)){ //idzie dalej
			echo "Dalej";
		}
		else{
			echo "Bledny login lub haslo";
		}
	}
	else{
		echo "Bledny login lub haslo";
	}
$connection->close();

?>