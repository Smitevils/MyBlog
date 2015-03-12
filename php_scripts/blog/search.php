<?php
	// Так как в include есть какието header, перенаправление делаем в начале скрипта, а скрипт будет выполнен до конца.
	//header('Location: ../../search.php');
	// Подключаю названия БД
	include "data/bd.php";
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	//$link = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db($bd) or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');
	// Создаем переменную res и заносим туда все данные из таблицы users построчно
	$res = mysql_query("SELECT * FROM `blog`");

	//search
	if (isset($_POST['search'])) {$search = $_POST['search'];} else {$search = "none";};

	$search = trim($search); // Обрезаем пробелы и спецсимволы
	$search = mysql_real_escape_string($search); // Фильтруем текст
	$search = htmlspecialchars($search); // Переводим

	echo "<div class=\"post_block\">Поиск по запросу: <span class='orange'>".$search."</span></div>";

	$text = "";

	$sql = "SELECT `id`, `title`, `text`, `fullnews` FROM `blog` WHERE `title` LIKE '%$search%' OR `text` LIKE '%$search%' OR `fullnews` LIKE '%$search%'";

	$result = mysql_query($sql);

	while($data=mysql_fetch_array($result)) {// раскладываем на массив
		//$json='<a href="'$data['id']'"'.$data['title']'</a><br>';
		$json='<a href="fullnews.php?article='.$data['id'].'">'.$data['id']." - ".$data['title'].'</a><br>';
		echo "<div class=\"post_block\">";
		echo $json;
		echo "</div>";
	};

?>