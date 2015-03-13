<?php ?>



<div class="mail_subscribe">
	<h3>Подпишись на обновления:</h3>
	<form action="php_scripts/subscribe.php" method="post">
		<p><b>Введите ваш Email:</b></p>
		<p><input class="email" id="email" type="text" name="email"></p>
		<div class="submit" onclick="sendAjaxSubscribe()">Подписаться</div>
	</form>
</div>