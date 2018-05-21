<?php
$acao = !empty(get_url(2)) ? get_url(2) : '';

if (!empty($acao)) {
     if ($acao == 'estados-cadastro') {
         cadastro_estados();
    } else if ($acao == 'remover-estados') {
         remover_estados();
    }
} else {
    echo json_encode([ 'error', 'Erro fatal. Acesso negado.']);
}

/**
 * Função para cadastrar
 * * */
function cadastro_estados() {
    global $db;

    $id = $_REQUEST['id'];

    $data['estado'] = $_REQUEST['estado'];
    $data['uf'] = $_REQUEST['uf'];


    if (!empty($data['estado'])) {

        if ($id == 0) {
            $query = $db->create('estados', $data);
        } else {
            $query = $db->update('estados', $id, $data);
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
function remover_estados() {
    global $db;
    $id = !empty(get_url(3)) ? decode(get_url(3)) : '';
    if (!empty($id)) {
        $query = $db->delete('estados', $id);
        if ($query) {
            echo json_encode(['success', 'Cadastro removido com sucesso.']);
        } else {
            echo json_encode(['error', 'Não foi possível remover o cadastro.']);
        }
    } else {
        echo json_encode(['error', 'Escolha um cadastro para ser removido.']);
    }
}
