<?php
	/* скрипт грузится при построении search.php */
	// подключаем путь до БД
	include "data/bd.php";
	// проверка на подключение к БД иначе ERROR
	mysql_select_db($bd) or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');

	/* если в глобальном массиве $_POST, с индексом search, что-то есть, то зоздаем переменную
	$search и вносим туда данные, иначе создаем переменную и присваиваем ей пустое значение */
	if (isset($_POST['search'])) {$search = $_POST['search'];} else {$search = "none";};

	// защищаем нашу спеременную от вредоносного кода
	$search = trim($search); // Обрезаем пробелы и спецсимволы
	$search = mysql_real_escape_string($search); // Фильтруем текст
	$search = htmlspecialchars($search); // Переводим

	// выводим строчку того что ввел пользователь
	echo "<div class=\"post_block\">Поиск по запросу: <span class='orange'>".$search."</span></div>";

	// составляем строку с выборкой из БД
	/* ВЫБРАТЬ поля `id`, `title`, `text`, `fullnews` ИЗ таблицы `blog` ГДЕ поле `title` ПОЖОЖЕ на '%$search%' и т.д.*/
	$sql = "SELECT `id`, `title`, `text`, `fullnews` FROM `blog` WHERE `title` LIKE '%$search%' OR `text` LIKE '%$search%' OR `fullnews` LIKE '%$search%'";

	// делаем выборку и пишем в переменную
	$result = mysql_query($sql);

	// выводим ссылки на статьи в которых найдено совпадение
	while($data=mysql_fetch_array($result)) {
		$json='<a href="fullnews.php?article='.$data['id'].'">'.$data['id']." - ".$data['title'].'</a><br>';
		echo "<div class=\"post_block\">";
		echo $json;
		echo "</div>";
	};
?>