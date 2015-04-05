<?php
	// Начинаем сессию
	session_start();
	// Если не определена константа IN_ADMIN – завершаем работу скрипта
	if ($_SESSION['access'] != "yes") {
		header('Location: inside.php');
		echo "Вы не можете здесь находиться!";
		die;
	};
	//-----------
	include "php_scripts/blog/blog.php";
	// Подключаю названия БД
	include "data/bd.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>SmiteVils Blog - Admin Panel</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/admin_panel.css">
	<script src="js/jquery-2.1.1.js"></script>
	<!-- Гугл Фонтс -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<!-- Плагин для обертки видео -->
	<!-- http://fitvidsjs.com/ -->
	<script src="js/jquery.fitvids.js"></script>
	<!-- Скрипт показа и скрытия рабочих панелей -->
	<script src="js/show-panel.js"></script>
	<!-- Скрипт Ajax для вывода данных статьи для редактирования -->
	<script src="js/edit_ajax.js"></script>
	<!-- Скрипт для вывода preview -->
	<script src="js/preview.js"></script>
	<!-- Скролл -->
	<script type='text/javascript' src='js/jquery.scrollTo-1.4.3.1.js'></script>
</head>
<body>
	<div class="left_block">
		<div class="info_block">
			<div class="photo_block">
				<img src="img/avatars/profile_img150x150_1.JPG" class="avatar" alt="avatar">
			</div>
			<h1>Admin</h1>
		</div>
		<?php /* блок генерации кода картинки */ include "engine/generateimgcode.php"; ?>
		<div class="clear"></div>
	</div>
	<div class="right_block">
		<?php
			// вставляем меню
			include "engine/navigation.php";
		?>
		<!-- Блок - Добавить новость -->
		<div class="add_news_block">
			<div class="form_headline" id="headline_add_article">Добавить статью &#8595</div>
			<!-- Блок hiden будет скрываться и показываться при нажатии -->
			<div class="div_hiden" id="div_hiden_1">
				<form action="php_scripts/admin/add_news.php" method="post">
					<p><b>Введите заголовок статьи:</b></p>
					<p><input class="title" id="title" type="text" name="title"></p>
					<p><b>Выберете категорию:</b></p>
					<!-- Моделим радио кнопки для выбора темы, кнопки из базы данных -->
					<?php
						// подключаемся к серверу с базой данных // Данные выданы провайдером
						$link_for_categories = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
						// После подключения выбираем нужную базу данных
						mysql_select_db($bd) or die("ERROR: ".mysql_error());
						// Указываем кодировку в которой будем работать
						mysql_set_charset('utf8');
						// заносим все данные из таблицы
						$categories = mysql_query("SELECT * FROM `categories` ORDER BY `id`");// Заносим в переменную все данные из таблицы
						while($data=mysql_fetch_array($categories)) {// раскладываем на массив
							echo '<input type="radio" class="theme" name="theme" value="'.$data['name'].'"> '.$data['name'].'<br>';
						};
					?>
					<p><b>Введите текст анонса статьи:</b></p>
					<p><textarea class="add_post_text" rows="10" cols="45" name="text"></textarea></p>
					<p><b>Введите текст полной статьи:</b></p>
					<p><textarea class="add_post_text_full" rows="10" cols="45" name="fulltext"></textarea></p>
					<!-- Ввод Тегов -->
					<p><b>Введите теги:</b></p>
					<p>
						<div class="tags_wrap">
							<input class="tags" id="tags" type="text" name="tags">
							<div class="add_tag">Добавить</div>
							<div class="clear"></div><br>
							<div class="tags_preview">
								<!-- 
								<div class="tag_variants">
									<div class="tag">
										<div class="tag_text">12345</div>
										<div class="tag_delite">&#2363;</div>
									</div>
								</div>
								 -->
							</div>
							<div class="clear"></div>
						</div>
					</p>
					<!--/Ввод Тегов -->
					<!-- Ввод Тегов - Скрипт -->
					<script>
						//Создаем переменную которая задает порядковые номера новым тегам (задает значение value)...
						//...область видимости переменной - глобальная
						var num_of_tag = 0;
						//Код отработает после загрузки документа
						$(document).ready(function(){
							// Функция добавляет и удаляет теги (добавляет и удаляет код HTML)
							function tagAddDel() {
								// Плюсуем к порядковому номеру единицу...
								num_of_tag++;
								//Функцией .append добавляем в блок код HTML...
								//...в саму обертку тега добавляем value со значением порядкового номера...
								//...так же value с порядковым номером добавляем к элементу - крестику...
								$(".tags_preview").append("<div value='"+num_of_tag+"' class='tag_variants'><div class='tag'><div class='tag_text' value='"+$("#tags").val()+"'>"+$("#tags").val()+"</div><div value='"+num_of_tag+"' class='tag_delite'>&#2363;</div></div></div>");
								//После создания и вставки элементов (кода HTML) вешаем обработчик на...
								//...крестик (кнопку удаления) с явным указанием его порядкового номера, иначе...
								//...обработчик ляжет на подобные элементы повторно...
								$(".tag_delite[value='"+num_of_tag+"']").click( function() {
									//Ищем элемент со значением value таким же как и у элемента...
									//...по которому кликнули и удалаем его функцией .detach()
									$(".tag_variants[value='" + $(this).attr("value") + "']").detach();
									tagsToString();
								} );
								//Функция состовляет строку из всех введеных (существующих) тегов
								tagsToString();
							}
							function tagsToString(){
								//Переменная которая будет хранить строчку со всеми тегами
								var string_of_tags = "";
								//Перебираем все теги и берем у кождого значение value и...
								//...составляем строчку
								$(".tag_text").each(function() {
									string_of_tags = string_of_tags + "," + $(this).attr("value");
								})
								//удаляем первую запятую
								string_of_tags = string_of_tags.substring(1)
								alert(string_of_tags)
							}
							//Вешаем обработчик на кнопку Добавить тег
							$('.add_tag').click( function() { tagAddDel(); } );
						});
					</script>
					<!-- /Ввод Тегов - /Скрипт -->
					<label><input type="checkbox" name="status" /> Готовность </label>
					<p><div class="submit" id="showPreviewAdd">Preview</div></p>
					<p><input class="submit" type="submit" value="Отправить"></p>
				</form>
			</div>
		</div>
		<!-- Блок - Редактировать статью -->
		<div class="add_news_block">
			<div class="form_headline" id="headline_edit_article">Редактировать статью &#8595</div>
			<!-- Блок hiden будет скрываться и показываться при нажатии -->
			<div class="div_hiden" id="div_hiden_2">
				<form action="php_scripts/admin/edit_news.php" method="post">
					<input id="edit_id" type="hidden" name="edit_id">
					<p><b>Выбрать статью</b></p>
					<p>
						<select id="select_1" onchange="sendAjax(this.value)">
							<option value="0">Выбери статью...</option>
							<!-- Моделим пункты выпадающего меню -->
							<?php
								// подключаемся к серверу с базой данных // Данные выданы провайдером
								$link_for_categories = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
								// После подключения выбираем нужную базу данных
								mysql_select_db($bd) or die("ERROR: ".mysql_error());
								// Указываем кодировку в которой будем работать
								mysql_set_charset('utf8');
								// заносим все данные из таблицы
								$categories = mysql_query("SELECT * FROM `blog` ORDER BY `id`");// Заносим в переменную все данные из таблицы
								while($data=mysql_fetch_array($categories)) {// раскладываем на массив
									echo '<option value="'.$data['id'].'"> '.$data['status'].' - '.$data['id'].' - '.$data['title'].'</option>';
								};
							?>
						</select>
						<!-- <div class="submit" onclick="findForId(352)">Редактировать</div> -->
					</p>
					<p><b>Исправьте заголовок статьи:</b></p>
					<p><input id="edit_title" class="title" type="text" name="edit_title"></p>
					<p><b>Измените категорию:</b></p>
					<!-- Моделим радио кнопки для выбора темы, кнопки из базы данных -->
					<?php
						// подключаемся к серверу с базой данных // Данные выданы провайдером
						$link_for_categories = mysql_connect('localhost','smite211_smite','H@ng@11thepe0p1e') or die("ERROR: ".mysql_error());
						// После подключения выбираем нужную базу данных
						mysql_select_db($bd) or die("ERROR: ".mysql_error());
						// Указываем кодировку в которой будем работать
						mysql_set_charset('utf8');
						// заносим все данные из таблицы
						$categories = mysql_query("SELECT * FROM `categories` ORDER BY `id`");// Заносим в переменную все данные из таблицы
						while($data=mysql_fetch_array($categories)) {// раскладываем на массив
							echo '<input type="radio" id="theme_'.$data['name'].'" class="theme" name="edit_theme" value="'.$data['name'].'"> '.$data['name'].'<br>';
						};
					?>
					<p><b>Исправьте текст анонса статьи:</b></p>
					<p><textarea id="edit_text" class="add_post_text" value="defgsdg" rows="10" cols="45" name="edit_text"></textarea></p>
					<p><b>Исправьте текст полной статьи:</b></p>
					<p><textarea id="edit_fulltext" class="add_post_text_full" rows="10" cols="45" name="edit_fulltext"></textarea></p>
					<p><label><input type="checkbox" id="edit_status" name="status" /> Готовность </label></p>
					<p><label><input type="checkbox" name="edit_delite" /> Удалить </label></p>
					<p><div class="submit" id="showPreviewEdit">Preview</div></p>
					<p><input class="submit" type="submit" value="Edit"></p>
				</form>
			</div>
		</div>
		<!-- Блок - Превью -->
		<div class="post_block">
			<div id="preview"></div>
			<a href="#preview" id="here" class="scroll" style="display: none;">Нажмешь, перематаю!</a>
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>