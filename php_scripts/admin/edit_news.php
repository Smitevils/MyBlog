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
	if (isset($_POST['status'])) {$status = "ready";} else {$status = "unready";};

	if (isset($_POST['edit_id'])) {$edit_id = $_POST['edit_id'];} else {$edit_id = 0;};
	if (isset($_POST['edit_delite'])) {$edit_delite = $_POST['edit_delite'];} else {$edit_delite = "off";};

	// Создаем переменную res и заносим туда все данные из таблицы users построчно
	$res = mysql_query("SELECT * FROM `blog` WHERE id='$edit_id'");

	if ($edit_delite == "on") {
		mysql_query("DELETE FROM `blog` WHERE `id` = '$edit_id';");
		echo $edit_id."delited";
		die(); exit();
	};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['edit_text'])) {$news = $_POST['edit_text'];} else {$news = "none";};
	if ($news == "") {$news = "none";};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['edit_fulltext'])) {$fullnews = $_POST['edit_fulltext'];} else {$fullnews = "none";};
	if ($fullnews == "") {$news = $fullnews;};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['edit_title'])) {$title = $_POST['edit_title'];} else {$title = "New article";};
	if ($title == "") {$title = "New article";};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['edit_theme'])) {$theme = $_POST['edit_theme'];} else {$theme = "home";};

	//Вносим в переменную текст из глобального массива $_POST
	if (isset($_POST['tags_edit'])) {$tags = $_POST['tags_edit'];} else {$tags = "1";};

	// Вычисляем дату
	$date = date( "d.m.y" );

	if ($news != "") {
		//mysql_query(" INSERT INTO `blog` (`text`) VALUES ('$news') ",$link); // рабочий
		mysql_query("UPDATE `blog` SET title='$title', text='$news', fullnews='$fullnews', status='$status', theme='$theme', tags='$tags' WHERE id='$edit_id'",$link);
		//mysql_query(" INSERT INTO `blog` (`date`) VALUES ('$date') ",$link);
		//echo "Новость добавлена!";
		//echo 'news=' . $news;
	} else if ($news == "") {
		//echo "Новость не добавлена т.к. поле пустое.";
		//echo 'news=' . $news;
	};

  	exit;
?>

