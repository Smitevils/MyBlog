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
	<!-- Add fancyBox main CSS -->
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<!-- Гугл Фонтс -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<script src="js/jquery-2.1.1.js"></script>
	<!-- Плагин для обертки видео -->
	<!-- http://fitvidsjs.com/ -->
	<script src="js/jquery.fitvids.js"></script>
	<!-- Скрипт комментов ВК -->
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
	<!-- /Скрипт комментов ВК -->
	<!-- Add fancyBox main JS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<script type="text/javascript" src="source/jquery.fancybox.me.js"></script>
	<!-- Скрипт Ajax для подписки на новости и вывода попап сообщения -->
	<script src="js/subscribe_ajax.js"></script>
</head>
<body>
<!-- Скрипт комментов ВК - Инициализируем блок -->
<script type="text/javascript">VK.init({apiId: 4803127, onlyWidgets: true});</script>
<!-- /Скрипт комментов ВК - Инициализируем блок -->
	<div class="left_block">
		<div class="info_block">
			<div class="photo_block">
				<!-- <img src="img/avatars/profile_img150x150_1.JPG" class="avatar" alt="avatar"> -->
				<div class="avatar"></div>
			</div>
			<h1>SmiteVils</h1>
			<p style="text-align: center;">smitevils@yandex.ru</p>
		</div>
		<?php /* вставляем блок поиска */ include "engine/searchblock.php"; ?>
		<?php /* вставляем блок подписки */ include "engine/subscribeblock.php"; ?>
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

	<!-- Всплывающее окно -->
	<div id="popup" style="display: none;">
		<p id="subscribe_alert" style="line-height: 100px;">12345</p>
	</div>
	<a href="#popup" id="a_popup" class="fancybox">ссылка</a>

</body>
</html>