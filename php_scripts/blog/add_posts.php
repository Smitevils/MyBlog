<?php
	// Выводим сами строки
	while($row = mysql_fetch_assoc($res)) { //Присваиваем новые значение массиву столько раз сколько строк в таблице
		//echo "<div style=\"text-align: center;\">". $row['id'] . "</div>"; //Выводит поле id из таблицы
		echo "<div class=\"post_block\">";
			echo "<div class=\"title_block\">" . $row['title'] . "</div>";
		echo "<div class=\"text_block\">" . $row['text'] . "</div>";
			echo "<div class=\"theme_block\">" . $row['theme'] . "</div>";
			echo "<div class=\"date_block\">" . $row['date'] . "</div>";
			echo "<div class=\"clear\"></div>";
		echo "</div><br>";
		//<div class=\"date_block\">". $row['date'] . "</div>
	};
?>

