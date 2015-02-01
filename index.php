<?php
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	$link = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db('smite211_smitevils') or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');
	
	/* (С помощью данного кода вычисляется какая страница открыта, методом добавления данных в адресную строку) */
	
	// $per_page = количество статей на страницу
	$per_page = 5;
	// Если в глобальном массиве $_GET есть индекс ['num'], то
	if (isset($_GET['num'])) 
	{
	// Создать переменную $page = число из $_GET['num'] - количество статей на страницу
		$page = $_GET['num'] - $per_page;
	// отобразить порядковый номер страницы
		echo $page/5 + 1 . " pages";
	// иначе если в $_GET ничего нет, то
	} else {
		$page=0;
	// отобразить порядковый номер страницы
		echo ($page/5) + 1 . " pages ";
	};

	// Создаем переменную res и заносим туда все данные из таблицы blog
	// LIMIT вызывается с двумя параметрами - с какой записи начинать, и сколько выводить
	$res = mysql_query("SELECT * FROM `blog` ORDER BY `id` DESC LIMIT $page,$per_page");

	//Выбираем все элементы из таблицы blog
	$string=mysql_query("SELECT count(*) FROM `blog`");
	// mysql_fetch_row() обрабатывает один ряд результата, на который ссылается переданный указатель. Ряд возвращается в массиве.
	$line=mysql_fetch_row($string);
	$total_rows=$line[0]; // Узнаем сколько всего строк в таблице
	echo $total_rows . " stroke of blog"; // Выводим сколько всего строк
	
	// узнаем количество будущих страниц = всего зписей в таблице / количество записей на страницу
	$num_pages=ceil($total_rows/$per_page);
	// выводмм количество страниц
	echo $num_pages . " shets " . "<br/>";
	// запускаем массив для создания ссылок на эти страницы
	// делаем столько ссылок сколько страниц
	for($i=1;$i<=$num_pages;$i++) {
		//$_SERVER['PHP_SELF'] - ставит имя файла в адресную строку, например index.php
		echo '<a href="'.$_SERVER['PHP_SELF'].'?num='.$i*$per_page.'">'.$i."</a>\n";
	}

	// Выводим сами строки
	while($row = mysql_fetch_assoc($res)) { //Присваиваем новые значение массиву столько раз сколько строк в таблице
		//echo "<div style=\"text-align: center;\">". $row['id'] . "</div>"; //Выводит поле id из таблицы
		echo "<div class=\"news\">". $row['text'] . "</div>";

	};
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>SmiteVils Blog</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/style.css">
	<script src="js/jquery-2.1.1.js"></script>
</head>
<body>
	<div class="info_block">
		<div class="photo_block">
			<img src="img/avatars/profile_img150x150_1.JPG" class="avatar" alt="avatar">
		</div>
		<h1>Title</h1>
	</div>
	<div class="navigation_block">
		<div class="navigation_button megaphone"></div>
	</div>
	<div class="post_block">
		
	</div>
</body>
</html>