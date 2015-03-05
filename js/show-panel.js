$(document).ready(function(){

	var add_article = true;
	var edit_article = true;
	var generate_img = true;

	function showMenuAdd(){
		/* Проверка блока добавления статьи */
		if (add_article) {
			$('#div_hiden_1').css( "max-height", "0" )
			add_article = false;
		} else {
			$('#div_hiden_1').css( "max-height", "3000px" )
			add_article = true;
		}
	};

	function showMenuEdit(){
		/* Проверка блока редактирования статьи */
		if (edit_article) {
			$('#div_hiden_2').css( "max-height", "0" )
			edit_article = false;
		} else {
			$('#div_hiden_2').css( "max-height", "3000px" )
			edit_article = true;
		}
	};

	function showMenuGenerateImg(){
		/* Проверка блока редактирования статьи */
		if (generate_img) {
			$('#div_hiden_3').css( "max-height", "0" )
			generate_img = false;
		} else {
			$('#div_hiden_3').css( "max-height", "3000px" )
			generate_img = true;
		}
	};

	showMenuAdd();
	showMenuEdit();
	showMenuGenerateImg();

	$('#headline_add_article').click( function() { showMenuAdd(); } );
	$('#headline_edit_article').click( function() { showMenuEdit(); } );
	$('#headline_generator_img').click( function() { showMenuGenerateImg(); } );
});