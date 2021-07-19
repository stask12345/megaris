<?php
$login = $_POST['loginRejestracja'];
$haslo = $_POST['hasloRejestracja'];
$hasloPotwiedzenie = $_POST['hasloRejestracjaPotwierdzenie'];
if ($login == "" || $haslo == "" || $hasloPotwiedzenie == ""){ 
//$_SESSION['bladRejestracja'] = '<span style="color: red">Wszystkie pola muszą <br/> być wypełnione!</span>';
}
else if (strlen($login) < 4){
	echo "login musi sie skladac minimum z 5 znakow!";
}
else if (strlen($haslo) < 4){
	echo "haslo musi sie skladac minimum z 5 znakow!";
}
else if (strlen($login) > 12){
	echo "login moze miec maksymalnie 12 znakow!";
}
else if (!preg_match('/^[a-zA-Z0-9]+$/', $login)){
	echo "login zawiera niedozwolone znaki!";
}
else if ($haslo != $hasloPotwiedzenie) {
	echo "Hasla nie sa takie same!";
}
else{
	require_once "connect.php";
	$poloczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
	$wynik = $poloczenie->query(sprintf("SELECT * FROM konta WHERE login='%s'",mysqli_real_escape_string($poloczenie,$login)));
	$liczbaKont = $wynik->num_rows;
	if ($liczbaKont > 0){
			echo "Ten login jest juz zajety!";
	}
	else{
		$hashowaneHaslo = password_hash($haslo,PASSWORD_DEFAULT);
		$poloczenie->query("INSERT INTO konta VALUES ('$login','$hashowaneHaslo',0)"); 
		$poloczenie->query("INSERT INTO statystyki VALUES ('$login',1,0,0,30,0,3)"); 
		$poloczenie->query("INSERT INTO bronieuzytkownikow VALUES ('$login',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)"); 
		echo "Konto zostalo utworzone";
	}
$poloczenie->close();
}
?>