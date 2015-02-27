<?php
echo '<script type="text/javascript">(function() {';
echo 'if (window.pluso)if (typeof window.pluso.start == "function") return;';
echo 'if (window.ifpluso==undefined) { window.ifpluso = 1;';
    echo 'var d = document, s = d.createElement(\'script\'), g = \'getElementsByTagName\';';
    echo 's.type = \'text/javascript\'; s.charset=\'UTF-8\'; s.async = true;';
    echo 's.src = (\'https:\' == window.location.protocol ? \'https\' : \'http\')  + \'://share.pluso.ru/pluso-like.js\';';
    echo 'var h=d[g](\'body\')[0];';
    echo 'h.appendChild(s);';
  echo '}})();</script>';
echo '<div style="margin: 0 auto; text-align: center;">';
echo '<div class="pluso" style="margin: 0 auto; text-align: center;" data-background="transparent" data-options="medium,round,line,horizontal,nocounter,theme=06" data-services="vkontakte,facebook,twitter" data-user="251157641"></div>';
echo '</div>';
?>
