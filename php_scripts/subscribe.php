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

	// Делаем выборку из таблицы
	$subscribe_full = mysql_query("SELECT * FROM `subscribe`");
	// Переменная которая будет показателем того, есть ли совпадение в БД по емэйлу или нет
	// Пока значение normal, т.е. совпадение нет - можно занести данные в БД
	$answer = 'normal';
	// Запускем цыкл и проверяем есть ли совпадения введенного емэйла и данных в БД
	while($subscribe_string = mysql_fetch_assoc($subscribe_full)) {
		// Если найдено совпадение то закончить цикл и задать нашей переменной $answer значение coincidence
		// т.е. найдено совпадение
		if ($subscribe_string['email'] == $email) {
			$answer = 'coincidence';
			break;
			exit();
		};
	};

	// На основе значения $answer либо заносим данные в БД и отправляем AJAX что все норм
	if ($answer == 'normal') {
		mysql_query(" INSERT INTO `subscribe`(`email`) VALUES ('$email') ",$link);
		echo json_encode(true);
	// либо ничего с БД не делаем и отправляем AJAX что все печально
	} else if ($answer == 'coincidence') {
		echo json_encode(false);
	};

  	exit;
?>

