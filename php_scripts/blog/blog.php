<?php
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	$link = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db('smite211_smitevils') or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');

	/* (С помощью данного кода вычисляется какая страница открыта, методом добавления данных в адресную строку) */

	// Узнаем с какой темой выводить посты
	// ..если есть в массиве $_POST['theme'] данные то занести в переменную $theme иначе $theme = "home"
	if (isset($_GET['theme'])) {$theme = $_GET['theme'];} else {$theme = "home";};

	// $per_page = количество статей на страницу
	$per_page = 5;
	// Если в глобальном массиве $_GET есть индекс ['num'], то
	if (isset($_GET['num']))
	{
	// Создать переменную $page = число из $_GET['num'] - количество статей на страницу
		$page = $_GET['num'] - $per_page;
	// отобразить порядковый номер страницы
		//echo $page/5 + 1 . " pages";
	// иначе если в $_GET ничего нет, то
	} else {
		$page=0;
	// отобразить порядковый номер страницы
		//echo ($page/5) + 1 . " pages ";
	};

	// Создаем переменную res и заносим туда все данные из таблицы blog
	// LIMIT вызывается с двумя параметрами - с какой записи начинать, и сколько выводить
	if ($theme == "home") {// если темы нет то выводим все...
		$res = mysql_query("SELECT * FROM `blog` ORDER BY `id` DESC LIMIT $page,$per_page");
	} else {// ...если тема есть то выводим только по теме
		$res = mysql_query("SELECT * FROM `blog` WHERE `theme`='$theme' ORDER BY `id` DESC LIMIT $page,$per_page");
	};


	//Выбираем все элементы из таблицы blog с темой или без
	// LIMIT вызывается с двумя параметрами - с какой записи начинать, и сколько выводить
	if ($theme == "home") {// если темы нет то...
		$string=mysql_query("SELECT count(*) FROM `blog`"); //WHERE `theme`='$theme'
	} else {// ...если тема есть то
		$string=mysql_query("SELECT count(*) FROM `blog` WHERE `theme`='$theme'"); //WHERE `theme`='$theme'
	};

	// mysql_fetch_row() обрабатывает один ряд результата, на который ссылается переданный указатель. Ряд возвращается в массиве.
	$line=mysql_fetch_row($string);
	$total_rows=$line[0]; // Узнаем сколько всего строк в таблице
	//echo $total_rows . " stroke of blog"; // Выводим сколько всего строк

	// узнаем количество будущих страниц = всего зписей в таблице / количество записей на страницу
	$num_pages=ceil($total_rows/$per_page);
	// выводмм количество страниц
	//echo $num_pages . " shets " . "<br/>";

	// Далее код скрипта вставлен в сам index.php
	/* include "php_scripts/blog/add_links.php"; include "php_scripts/blog/add_posts.php"; */
?>

