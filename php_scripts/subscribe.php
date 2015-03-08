<?php
	// Подключаю названия БД
	include "../data/bd.php";
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	$link = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db($bd) or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');
	// Создаем переменную res и заносим туда все данные из таблицы users построчно
	$res = mysql_query("SELECT * FROM `subscribe`");

	//subscribe
	if (isset($_POST['email'])) {$email = $_POST['email'];} else {$email = "noname";};


	mysql_query(" INSERT INTO `subscribe`(`email`) VALUES ('$email') ",$link);

	echo json_encode(true);

  	exit;
?>

