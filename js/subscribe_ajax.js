var email;

function sendAjaxSubscribe()  {
    email = $("#email").val();
    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    //alert(email);
    /* Ajax */
    if (email == '') {
        $("#subscribe_alert").html('Заполните поле Email');
        $(".fancybox").click();
    } else if (pattern.test(email) == false) {
        $("#subscribe_alert").html('Введите корректный Email');
        $(".fancybox").click();
    } else {
        sendAjaxToPHP();
    };
};

function sendAjaxToPHP() {
    $.ajax({
        type: "POST",
        url: "php_scripts/subscribe.php",
        data: "email="+email,
        success: function(data) {
            //alert(data);
            // Скрипт php будет возвращать в переменную data true или false в зависимости
            // от того есть ли в базе данных введенный емэйл или нет. На основе этого
            // выводим нужное сообщение
            if (data == 'true') {
                $("#subscribe_alert").html('Вы успешно подписаны на рассылку!');
                $(".fancybox").click();
            } else if (data == 'false') {
                $("#subscribe_alert").html('Такой email уже существует!');
                $(".fancybox").click();
            };
        }
    });
};