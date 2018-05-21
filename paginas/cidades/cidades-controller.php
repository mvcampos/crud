<?php

$acao = !empty(get_url(2)) ? get_url(2) : '';

if (!empty($acao)) {

     if ($acao == 'cidades-cadastro') {
         cadastro_cidades();
    } else if ($acao == 'remover-cidades') {
         remover_cidades();
    }
} else {
    echo json_encode([ 'error', 'Erro fatal. Acesso negado.']);
}

/**
 * Função para cadastrar
 * * */
function cadastro_cidades() {
    global $db;

    $id = $_REQUEST['id'];

    $data['idEstado'] = $_REQUEST['idEstado'];
    $data['cidade'] = $_REQUEST['cidade'];


    if (!empty($data['cidade']) && !empty($data['idEstado'])) {

        if ($id == 0) {
            $query = $db->create('cidades', $data);
        } else {
            unset($data['data_cadastro']);
            $query = $db->update('cidades', $id, $data);
        }

        if ($query) {
            echo json_encode(['success', 'Cadastro realizado com sucesso.']);
        } else {
            echo json_encode(['error', 'Não foi possível realizar o cadastro.']);
        }
    } else {
        echo json_encode(['error', 'Preencha os campos obrigatórios corretamente.']);
    }
}

/**
 * Função para remover o cadastro
 * * */
function remover_cidades() {
    global $db;
    $id = !empty(get_url(3)) ? decode(get_url(3)) : '';
    if (!empty($id)) {
        $query = $db->delete('cidades', $id);
        if ($query) {
            echo json_encode(['success', 'Cadastro removido com sucesso.']);
        } else {
            echo json_encode(['error', 'Não foi possível remover o cadastro.']);
        }
    } else {
        echo json_encode(['error', 'Escolha um cadastro para ser removido.']);
    }
}
