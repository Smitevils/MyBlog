$(document).ready(function(){

	function showPreviewAddNews(){
		var title = $("#title").val();
		var text = $(".add_post_text").val();
		var fulltext = $(".add_post_text_full").val();
		$("#preview").html("<a class='a_title' href='#'>"+title+"</a><div class='text_block' style='border: 1px orange solid;'>"+text+"</div><div class='clear'></div><br><div class='text_block' style='border: 1px orange solid;'>"+fulltext+"</div>");
	};

	function showPreviewEditNews(){
		var title = $("#edit_title").val();
		var text = $("#edit_text").val();
		var fulltext = $("#edit_fulltext").val();
		$("#preview").html("<a class='a_title' href='#'>"+title+"</a><div class='text_block' style='border: 1px orange solid;'>"+text+"</div><div class='clear'></div><br><div class='text_block' style='border: 1px orange solid;'>"+fulltext+"</div>");
	};

	$('#showPreviewAdd').click( function() { showPreviewAddNews(); } );
	$('#showPreviewEdit').click( function() { showPreviewEditNews(); } );
});