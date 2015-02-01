<?php
	// Выводим сами строки
	while($row = mysql_fetch_assoc($res)) { //Присваиваем новые значение массиву столько раз сколько строк в таблице
		//echo "<div style=\"text-align: center;\">". $row['id'] . "</div>"; //Выводит поле id из таблицы
		echo "<div class=\"post_block\">". $row['text'] . "</div><br>";
	};
?>

