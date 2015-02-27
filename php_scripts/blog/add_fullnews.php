<?php
	// Подключаю названия БД
	include "data/bd.php";
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	$link = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db($bd) or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');

	// Узнаем какой номер поста
	// ..если есть в массиве $_GET['article'] данные то занести в переменную $article иначе $article = "1"
	if (isset($_GET['article'])) {$article = $_GET['article'];} else {$article = "1";};

	// Создаем переменную res_full и заносим туда все данные из таблицы blog где id равен номеру статьи переданному в GET
	$res_full = mysql_query("SELECT * FROM `blog` WHERE `id`='$article'");

	// Выводим сами строки // выполняем по количеству строк в массиве
	while($row_full = mysql_fetch_assoc($res_full)) { //Присваиваем новые значение массиву столько раз сколько строк в таблице
		echo "<div class=\"post_block\">";
			echo "<div class=\"title_block\">" . $row_full['title'] . "</div>";
		echo "<div class=\"text_block\">" . $row_full['fullnews'] . "</div>";
			echo "<div class=\"clear\"></div>";
			echo "<div class=\"theme_block\">" . $row_full['theme'] . "</div>";
			echo "<div class=\"date_block\">" . $row_full['date'] . "</div>";
			echo "<div class=\"clear\"></div>";
			// Вставляем код комментов ВК
			echo "<br><div id=\"vk_comments\"></div>";
			echo "<script type=\"text/javascript\">VK.Widgets.Comments(\"vk_comments\", {limit: 10, width: \"665\", attach: false});</script>";
			// End - Вставляем код комментов ВК
		echo "</div><br>";
	};
?>