<?php
//Função encode senha
function encode_pass($senha = null) {
    $options = [
        'cost' => 11,
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    return password_hash($senha, PASSWORD_BCRYPT, $options);
}

//Função encode string em base 64
function encode($string = null) {
    if ($string != null) {
        return base64_encode($string);
    } else {
        return false;
    }
}

//Função decode string em base 64
function decode($string = null) {
    if ($string != null) {
        return base64_decode($string);
    } else {
        return false;
    }
}

//Função para limpar os dados inseridos nos formulários
function anti_sql_injection($sql) {
    $seg = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/", "", $sql);
    $seg = trim($seg); //limpa espaços vazios
    $seg = htmlspecialchars($seg); // tira tags html e php
    $seg = addslashes($seg); //adiciona barras invertidas a uma string
    return $seg;
}

//percorre o array de requisições para filtrar os dados enviados
foreach ($_GET as $key => $value) {
    if (!is_array($value)) {
        $value = anti_sql_injection($value);
        $_GET[$key] = $value;
    }
}

foreach ($_POST as $key => $value) {
    if (!is_array($value)) {
        $value = anti_sql_injection($value);
        $_POST[$key] = $value;
    }
}

foreach ($_REQUEST as $key => $value) {
    if (!is_array($value)) {
        $value = anti_sql_injection($value);
        $_REQUEST[$key] = $value;
    }
}