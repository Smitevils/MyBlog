var id_article = 0;

function sendAjax(id)  {
    id_article = id;
    $("#edit_id").attr('value', id_article);
    /*alert(id_article)*/

    /* Ajax */
    $.ajax({
        type: "POST",
        url: "php_scripts/admin/find_article_ajax.php",
        data: "id="+id_article,
        success: function(data) {
            // Отсекаем кавычки после json_encode
            data = data.substring(3, data.length - 1);
            /**/
            data = data.split(/[*]/);

            //alert(data);
            $("#edit_title").attr('value', data[0]); // выводим информацию в нужный блок
            $("#edit_text").val(data[1]); // выводим информацию в нужный блок
            $("#edit_fulltext").val(data[2]); // выводим информацию в нужный блок
            // создаем переменную theme и моделим в нее id нужного нам input-a, по соотношению с БД
            var theme = $('#theme_'+data[3]+'')
            // ставим галочку
            theme.prop("checked", true)
            if (data[4] == "ready") {
                $("#edit_status").prop("checked", true)
            } else {
                $("#edit_status").prop("checked", false)
            };

            var tag_get = data[5];
            alert(tag_get);
            tag_get = tag_get.split(/[,]/);


            /*for (var i = 0; i < tag_get.length; i++) {
                    $('[name = "'+tag_get[i]+'"]').prop("checked", true)
            };*/

            for (var i = 0; i < tag_get.length; i++) {
                num_of_tag_edit++;
                $("#edit_tags").find(".tags_preview").append("<div value='"+num_of_tag_edit+"' class='tag_variants'><div class='tag'><div class='tag_text' value='"+tag_get[i]+"'>"+tag_get[i]+"</div><div value='"+num_of_tag_edit+"' class='tag_delite'>&#2363;</div></div></div>");
                $("#edit_tags").find(".tag_delite[value='"+num_of_tag_edit+"']").click( function() {
                    $("#edit_tags").find(".tag_variants[value='" + $(this).attr("value") + "']").detach();
                    var string_of_tags = "";
                    $("#edit_tags").find(".tag_text").each(function() {
                        string_of_tags = string_of_tags + "," + $(this).attr("value");
                    })
                    string_of_tags = string_of_tags.substring(1);
                    alert(string_of_tags);
                    $("#edit_tags").find("input[name='tags_edit']").val(string_of_tags);
                } );
            };

                    var string_of_tags = "";
                    $("#edit_tags").find(".tag_text").each(function() {
                        string_of_tags = string_of_tags + "," + $(this).attr("value");
                    })
                    string_of_tags = string_of_tags.substring(1);
                    alert(string_of_tags);
                    $("#edit_tags").find("input[name='tags_edit']").val(string_of_tags);

            checkTagEdit();



            //$("#edit_status").attr("checked", data[3]);
        }
    });
    /* /Ajax */


};