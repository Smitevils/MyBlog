$(document).ready(function(){

	var add_article = true;
	var edit_article = true;

	function showMenuAdd(){
		/* Проверка блока добавления статьи */
		if (add_article) {
			$('#div_hiden_1').css( "max-height", "0" )
			add_article = false;
		} else {
			$('#div_hiden_1').css( "max-height", "999px" )
			add_article = true;
		}
	};

	function showMenuEdit(){
		/* Проверка блока редактирования статьи */
		if (edit_article) {
			$('#div_hiden_2').css( "max-height", "0" )
			edit_article = false;
		} else {
			$('#div_hiden_2').css( "max-height", "999px" )
			edit_article = true;
		}
	};

	showMenuAdd();
	showMenuEdit();

	$('#headline_add_article').click( function() { showMenuAdd(); } );
	$('#headline_edit_article').click( function() { showMenuEdit(); } );
});