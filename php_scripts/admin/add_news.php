<?php
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	$link = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db('smite211_smitevils') or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');
	// Создаем переменную res и заносим туда все данные из таблицы users построчно
	$res = mysql_query("SELECT * FROM `blog`");

	$news = $_POST['text'];

	if ($news != "") {
		mysql_query(" INSERT INTO `blog` (`text`) VALUES ('$news') ",$link);
		//echo "Новость добавлена!";
		//echo 'news=' . $news;
	} else if ($news == "") {
		//echo "Новость не добавлена т.к. поле пустое.";
		//echo 'news=' . $news;
	};

	header('Location: ../../admin.php');
  	exit;
?>

