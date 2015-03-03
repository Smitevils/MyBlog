$(document).ready(function(){

	var add_article = true;

	function showMenu(){
		if (add_article) {
			$('#div_hiden_1').css( "max-height", "0" )
			add_article = false;
		} else {
			$('#div_hiden_1').css( "max-height", "999px" )
			add_article = true;
		}
	}

	showMenu();

	$('#headline_add_article').click( function() { showMenu(); } );
});