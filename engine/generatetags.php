<?php
	// Подключаю названия БД
	include "data/bd.php";
	// подключаемся к серверу с базой данных // Данные выданы провайдером
	$link = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
	// После подключения выбираем нужную базу данных
	mysql_select_db($bd) or die("ERROR: ".mysql_error());
	// Указываем кодировку в которой будем работать
	mysql_set_charset('utf8');
?>

<div class="insert_img_block">
	<div class="form_headline" id="headline_generator_tag">Добавить тег &#8595</div>
	<div class="div_hiden" id="div_hiden_4">
		<h5>Просмотр тегов<h5>
		<p>
			<select>
				<option value="0">Все теги...</option>
				<!-- Моделим пункты выпадающего меню -->
				<?php
					// заносим все данные из таблицы
					$tags = mysql_query("SELECT * FROM `tags` ORDER BY `id`");
					// раскладываем на массив и выводим
					while($data=mysql_fetch_array($tags)) {
						echo '<option value="'.$data['id'].'"> '.$data['id'].' - '.$data['tag'].'</option>';
					};
				?>
			</select>
		</p>
		<h5>Довавить тег</h5>
		<form action="php_scripts/admin/add_tag.php" method="post">
			<p><input class="title" id="newtag" type="text" name="newtag"></p>
			<p><input class="submit" type="submit" value="Отправить"></p>
		</form>
	</div>
</div>