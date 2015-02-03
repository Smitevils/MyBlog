<?php
	include "php_scripts/blog/blog.php";
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
	<div class="left_block">
		<div class="info_block">
			<div class="photo_block">
				<img src="img/avatars/profile_img150x150_1.JPG" class="avatar" alt="avatar">
			</div>
			<h1>SmiteVils</h1>
			<p style="text-align: center;">smitevils@yandex.ru</p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="right_block">
		<div class="navigation_block">
			<div class="navigation_button megaphone"></div>
			<div class="clear"></div>
		</div>
		<div class="links_to_pages_block">
			<?php
				// запускаем массив для создания ссылок на эти страницы
				include "php_scripts/blog/add_links.php";
			?>
		</div>
		<?php
			//Выводим сами строки
			include "php_scripts/blog/add_posts.php";
		?>
		<div class="clear"></div>
	</div>
	<!-- Yandex Metrica and Google Analytics -->
	<?php
		include_once("php_scripts/metrika.php");
		include_once("php_scripts/analyticstracking.php");
	?>
</body>
</html>

