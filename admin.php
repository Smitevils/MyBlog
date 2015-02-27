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
	<!-- Плагин для обертки видео -->
	<!-- http://fitvidsjs.com/ -->
	<script src="js/jquery.fitvids.js"></script>
</head>
<body>
	<div class="left_block">
		<div class="info_block">
			<div class="photo_block">
				<img src="img/avatars/profile_img150x150_1.JPG" class="avatar" alt="avatar">
			</div>
			<h1>Admin</h1>
		</div>
		<div class="clear"></div>
	</div>
	<div class="right_block">
		<?php
			// вставляем меню
			include "engine/navigation.php";
		?>
		<div class="add_news_block">
			<form action="php_scripts/admin/add_news.php" method="post">
				<p><b>Введите заголовок статьи:</b></p>
				<p><input class="title" type="text" name="title"></p>
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
				<p><input class="submit" type="submit" value="Отправить"></p>
			</form>
		</div>
		<div class="post_block">title
			<script>
				var title = "";
				var fulltext = "";
				function sec() {
					title = $(".title").val();
					fulltext = $(".add_post_text_full").val();
					$(".post_block").html("<a class='a_title' href='#'>"+title+"</a><div class='text_block'>"+fulltext+"</div>");
				}
				setInterval(sec, 100) // использовать функцию
			</script>
		</div>
		<div class="clear"></div>
	</div>

	<!-- Блок для генерации кода картинки -->
	<div class="left_block">
		<div class="insert_img_block">
			<h4>Вставка картинки:</h4>
			<!-- Выбор горизонтали -->
			<h5>Горизонталь:</h5>
			<input type="radio" class="theme" name="img_align" value="left" onclick="alignImg('left')">&nbsp;left&nbsp;
			<input type="radio" class="theme" name="img_align" value="center" onclick="alignImg('center')">&nbsp;center&nbsp;
			<input type="radio" class="theme" name="img_align" value="right" onclick="alignImg('right')">&nbsp;right&nbsp;
			<div class="clear"></div>
			<!-- /Выбор горизонтали -->
			<!-- Размер картинки -->
			<h5>Размер картинки:</h5>
			<input type="radio" class="theme" name="img_size" value="20" onclick="adressImg(20);">&nbsp;20%&nbsp;
			<input type="radio" class="theme" name="img_size" value="40" onclick="adressImg(40);">&nbsp;40%&nbsp;
			<input type="radio" class="theme" name="img_size" value="60" onclick="adressImg(60);">&nbsp;60%&nbsp;
			<input type="radio" class="theme" name="img_size" value="80" onclick="adressImg(80);">&nbsp;80%&nbsp;
			<input type="radio" class="theme" name="img_size" value="100" onclick="adressImg(100);">&nbsp;100%&nbsp;
			<div class="clear"></div>
			<!-- /Размер картинки -->
			<!-- Адрес картинки -->
			<h5>Адрес картинки:</h5>
			<input type="text" class="title" name="img_src" value="">
			<div class="clear"></div>
			<!-- /Адрес картинки -->
			<!-- Описание картинки -->
			<h5>Описание картинки:</h5>
			<input type="text" class="title" name="img_alt" value="">
			<div class="clear"></div>
			<!-- /Описание картинки -->
			<p><input class="submit" type="submit" onclick="secSecond();" value="Сгенерировать"></p>
			<textarea class="insert_img_block_text" rows="10" cols="10" name="code_of_img"></textarea>
			<div class="insert_img_preview"></div>
		</div>
		<div class="clear"></div>
		<script>
			var horizontalImg = "";
			var sizeImg = "";
			var srcImg = "";
			var descriptionImg = "";
			function alignImg(y) {
				horizontalImg = y;
				//alert(horizontalImg);
			}
			function adressImg(x) {
				sizeImg = x;
				//alert(sizeImg);
			}
			function secSecond() {
				srcImg = $('input[name="img_src"]').val();
				descriptionImg = $('input[name="img_alt"]').val();
				//fulltext = $(".add_post_text_full").val();
				//$('textarea[name="code_of_img"]').val("<a class='a_title' href='#'>"+title+"</a><div class='text_block'>"+fulltext+"</div>");
				$('textarea[name="code_of_img"]').val('<p style="text-align:'+horizontalImg+'"><img src="'+srcImg+'" width="'+sizeImg+'%" height="auto" alt="'+descriptionImg+'"></p>');
				$('.insert_img_preview').html('<p style="text-align:'+horizontalImg+'"><img src="'+srcImg+'" width="'+sizeImg+'%" height="auto" alt="'+descriptionImg+'"></p>');
			};
			//setInterval(secSecond, 3000) // использовать функцию
		</script>
	</div>
	<!-- /Блок для генерации кода картинки -->
</body>
</html>