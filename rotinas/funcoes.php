<?php

//Função para montar links
function href($url = null) {
    if ($url != null) {
        return BASE_URL . '/' . $url;
    } else {
        return BASE_URL;
    }
}

//Função para redirecionar páginas
function redireciona($url = null) {
    if ($url != null) {
        header('Location: ' . BASE_URL . $url);
        exit;
    }
}