<!-- Ввод Тегов -->
<p><b>Отредактируйте теги:</b></p>
<p>
	<div id="edit_tags" class="tags_wrap">
		<input class="tags" id="tags" type="text">
		<input type="hidden" name="tags_edit">
		<div class="add_tag">Добавить</div>
		<div class="clear"></div><br>
		<div class="tags_preview">
			<!-- 
			<div class="tag_variants">
				<div class="tag">
					<div class="tag_text">12345</div>
					<div class="tag_delite">&#2363;</div>
				</div>
			</div>
			 -->
		</div>
		<div class="clear"></div>
	</div>
</p>
<!--/Ввод Тегов -->
<!-- Ввод Тегов - Скрипт -->
<script>
	//Создаем переменную которая задает порядковые номера новым тегам (задает значение value)...
	//...область видимости переменной - глобальная
	var num_of_tag_edit = 0;
	//Код отработает после загрузки документа
	$(document).ready(function(){
		// Функция добавляет и удаляет теги (добавляет и удаляет код HTML)
		function tagAddDelEdit() {
			// Плюсуем к порядковому номеру единицу...
			num_of_tag_edit++;
			//Функцией .append добавляем в блок код HTML...
			//...в саму обертку тега добавляем value со значением порядкового номера...
			//...так же value с порядковым номером добавляем к элементу - крестику...
			$("#edit_tags").find(".tags_preview").append("<div value='"+num_of_tag_edit+"' class='tag_variants'><div class='tag'><div class='tag_text' value='"+$("#edit_tags").find("#tags").val()+"'>"+$("#edit_tags").find("#tags").val()+"</div><div value='"+num_of_tag_edit+"' class='tag_delite'>&#2363;</div></div></div>");
			//После создания и вставки элементов (кода HTML) вешаем обработчик на...
			//...крестик (кнопку удаления) с явным указанием его порядкового номера, иначе...
			//...обработчик ляжет на подобные элементы повторно...
			$("#edit_tags").find(".tag_delite[value='"+num_of_tag_edit+"']").click( function() {
				//Ищем элемент со значением value таким же как и у элемента...
				//...по которому кликнули и удалаем его функцией .detach()
				$("#edit_tags").find(".tag_variants[value='" + $(this).attr("value") + "']").detach();
				tagsToStringEdit();
			} );
			//Функция состовляет строку из всех введеных (существующих) тегов
			tagsToStringEdit();
		}
		function tagsToStringEdit(){
			//Переменная которая будет хранить строчку со всеми тегами
			var string_of_tags = "";
			//Перебираем все теги и берем у кождого значение value и...
			//...составляем строчку
			$("#edit_tags").find(".tag_text").each(function() {
				string_of_tags = string_of_tags + "," + $(this).attr("value");
			})
			//удаляем первую запятую
			string_of_tags = string_of_tags.substring(1);
			alert(string_of_tags);
			$("#edit_tags").find("input[name='tags_edit']").val(string_of_tags);
		}
		//Вешаем обработчик на кнопку Добавить тег
		$("#edit_tags").find('.add_tag').click( function() { tagAddDelEdit(); } );
	});
</script>
<!-- /Ввод Тегов - /Скрипт -->