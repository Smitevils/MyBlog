<?php
	//$tagsstring = mysql_query("SELECT `tags` FROM `blog` WHERE `id`='$article'");
	// Выводим сами строки
	while($row = mysql_fetch_assoc($res)) { //Присваиваем новые значение массиву столько раз сколько строк в таблице
		//echo "<div style=\"text-align: center;\">". $row['id'] . "</div>"; //Выводит поле id из таблицы
		echo "<div class=\"post_block\">";
			//echo "<div class=\"title_block\">" . $row['title'] . "</div><a class=\"a_title\" href=\"fullnews.php?article=".$row['id']."\">".$row['title']."</a>";
			echo "<a class=\"a_title\" href=\"fullnews.php?article=".$row['id']."\">".$row['title']."</a>";
			echo "<div class=\"clear\"></div>";
		echo "<div class=\"text_block\">" . $row['text'] . "</div>";
			echo "<div class=\"clear\"></div>";
			echo "<div class=\"theme_block\">" . $row['theme'] . "</div>";
			echo "<div class=\"date_block\">" . $row['date'] . "</div>";
			// выводим теги
			//echo $row['tags'];
			echo "<div class=\"clear\"></div>";
			echo '<div class="wrap_tags">';
			$arr = explode(",", $row['tags']);
			//print_r($arr)."<br>";
			$countarr = count($arr);
			//$xxx = mysql_query("SELECT tag FROM tags WHERE id = 1");
			//$yyy = mysql_fetch_assoc($xxx);
			//echo $yyy["tag"];
			for ($i=0; $i < $countarr; $i++) {
				echo '<span class="tag">';
					$xxx = mysql_query("SELECT tag FROM tags WHERE id = $arr[$i]");
					$yyy = mysql_fetch_assoc($xxx);
					echo $yyy["tag"];
				echo '</span>';
			};
			echo "</div>";
			//
			echo "<div class=\"clear\"></div>";
		echo "</div><br>";
	};
	echo "<div class=\"clear\"></div>";
?>

