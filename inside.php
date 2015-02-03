<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>Authorization</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/inside.css">
	<script src="js/jquery-2.1.1.js"></script>
</head>
<body>
	<div class="authorization_blok">
		<form action="php_scripts/auth/auth.php" method="post">
			<p><b>Authorization</b></p>
			<p><input class="login" type="text" name="login"></p>
			<p><input class="passw" type="text" name="passw"></p>
			</p><input type="hidden" name="enter" value="yes"></p>
			<p><input class="submit" type="submit" value="Отправить"></p>
		</form>
	</div>
</body>
</html>

<script type="text/javascript">
	// узнаем высоту окна
	var window_height = document.body.clientHeight;
	// узнаем высоту блока
	var block_height = $(".authorization_blok").height();
	// вычисляем отступ для блока сверху
	var margin_top = (window_height/2) + (block_height/2);
	// делаем отступ в виде строки с PX
	var margin_top_string = margin_top + "px";
	// задаем отступ блоку
	$(".authorization_blok").css('marginTop', margin_top_string);

</script>