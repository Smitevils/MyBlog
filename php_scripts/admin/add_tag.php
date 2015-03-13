<?php
	// Так как в include есть какието header, перенаправление делаем в начале скрипта, а скрипт будет выполнен до конца.
	header('Location: ../../admin.php');
	// Подключаю названия БД
	include "../../data/bd.php";
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	$link = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db($bd) or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');

	//chechbox
	if (isset($_POST['newtag'])) {$newtag = $_POST['newtag'];} else {$newtag = "noname";};

	mysql_query(" INSERT INTO `tags`(`tag`) VALUES ('$newtag') ",$link);

  	exit;
?>

