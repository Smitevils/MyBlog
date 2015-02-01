<?php
	// запускаем массив для создания ссылок на эти страницы
	// делаем столько ссылок сколько страниц
	for($i=1;$i<=$num_pages;$i++) {
		//$_SERVER['PHP_SELF'] - ставит имя файла в адресную строку, например index.php
		echo '<a class="links_to_pages" href="'.$_SERVER['PHP_SELF'].'?num='.$i*$per_page.'">'.$i."</a>\n";
	}
?>

