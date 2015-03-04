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
        }
    });
    /* /Ajax */

};