<?php

require_once 'rotinas/rotinas.php';

$pagina = '';
$param = '';

$url = !isset($_REQUEST['url']) ? 'home' : $_REQUEST['url'];
$url = explode('/', $url);

$pasta = $url[0];
$pagina = isset($url[1]) ? $url[1] : 'index';

//função para retornar os parametros na url
function get_url($param = 0) {
    global $url;

    if (isset($url[$param])) {
        return $url[$param];
    }
}

//Verifica se o arquivo solicitado existe na pasta
if (file_exists('paginas/' . $pasta . '/' . $pagina . '.php')) {
    require_once 'paginas/' . $pasta . '/' . $pagina . '.php';
} else {
    require_once 'error/404.php';
}


