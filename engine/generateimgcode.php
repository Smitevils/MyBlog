<!-- Блок для генерации кода картинки -->
<div class="insert_img_block">
	<div class="form_headline" id="headline_generator_img">Сгенерировать картинку &#8595</div>
	<div class="div_hiden" id="div_hiden_3">
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
<!-- /Блок для генерации кода картинки -->