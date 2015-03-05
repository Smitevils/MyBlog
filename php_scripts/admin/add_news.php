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
	// Создаем переменную res и заносим туда все данные из таблицы users построчно
	$res = mysql_query("SELECT * FROM `blog`");

	//chechbox
	if (isset($_POST['status'])) {$status = "ready";} else {$status = "unready";};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['text'])) {$news = $_POST['text'];} else {$news = "none";};
	if ($news == "") {$news = "none";};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['fulltext'])) {$fullnews = $_POST['fulltext'];} else {$fullnews = "none";};
	if ($fullnews == "") {$news = $fullnews;};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['title'])) {$title = $_POST['title'];} else {$title = "New article";};
	if ($title == "") {$title = "New article";};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['theme'])) {$theme = $_POST['theme'];} else {$theme = "home";};

	// Вычисляем дату
	$date = date( "d.m.y" );

	if ($news != "") {
		//mysql_query(" INSERT INTO `blog` (`text`) VALUES ('$news') ",$link); // рабочий
		mysql_query(" INSERT INTO `blog`(`title`, `text`, `fullnews`, `theme`, `date`, `status`) VALUES ('$title','$news','$fullnews','$theme','$date','$status') ",$link);
		//mysql_query(" INSERT INTO `blog` (`date`) VALUES ('$date') ",$link);
		//echo "Новость добавлена!";
		//echo 'news=' . $news;
	} else if ($news == "") {
		//echo "Новость не добавлена т.к. поле пустое.";
		//echo 'news=' . $news;
	};

  	exit;
?>

