<?php
	// Подключаю названия БД
	include "data/bd.php";
	// хоть ранее и подключались, подключимся еще раз
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	$link_for_categories = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db($bd) or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');
	// заносим все данные из таблицы
	$categories = mysql_query("SELECT * FROM `categories` ORDER BY `id`");// Заносим в переменную все данные из таблицы

?>

<div class="navigation_block">
	<?php
		// выводим кнопки, x для нумерации иконок
		$x = 0;
		while($data=mysql_fetch_array($categories)) {// раскладываем на массив
			$x++;
		 echo '<a class="navigation_button btn_'.$x.'" href="'.$_SERVER['PHP_SELF'].'?theme='.$data['name'].'">'."</a>\n";
		};
	?>
	<div class="clear"></div>
</div>

