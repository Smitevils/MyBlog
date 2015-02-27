<?php
	/*
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
	*/
	// Подключаю названия БД
	//include "data/bd.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<?php
		//Вставляем заголовок статьи
		include "php_scripts/blog/add_title.php";
	?>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/admin_panel.css">
	<script src="js/jquery-2.1.1.js"></script>
	<!-- Плагин для обертки видео -->
	<!-- http://fitvidsjs.com/ -->
	<script src="js/jquery.fitvids.js"></script>
	<!-- Скрипт комментов ВК -->
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
	<!-- /Скрипт комментов ВК -->
</head>
<body>
<!-- Скрипт комментов ВК - Инициализируем блок -->
<script type="text/javascript">VK.init({apiId: 4803127, onlyWidgets: true});</script>
<!-- /Скрипт комментов ВК - Инициализируем блок -->
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

		<?php
			//Выводим сами строки
			include "php_scripts/blog/add_fullnews.php";
		?>
		<div class="clear"></div>
	</div>
	<!-- Выполняем фунцию fitVids() с оберткой видео / Плагин fitVids -->
	<script>
	  $(document).ready(function(){
	    // Добавьте класс своего div контейнера тут
	    $(".video_container").fitVids();
	  });
	</script>
	<!-- End fitVids -->
</body>
</html>