<?php

$acao = !empty(get_url(2)) ? get_url(2) : '';

if (!empty($acao)) {
     if ($acao == 'enderecos-cadastro') {
         cadastro_enderecos();
    } else if ($acao == 'remover-enderecos') {
         remover_enderecos();
    } else if ($acao == 'cidades') {
         cidades();
    }
} else {
    echo json_encode([ 'error', 'Erro fatal. Acesso negado.']);
}

/**
 * Função para cadastrar
 *
 * * */

function cadastro_enderecos() {
    global $db;
    $id = $_REQUEST['id'];

    $data['cep'] = $_REQUEST['cep'];
    $data['logradouro'] = $_REQUEST['logradouro'];
    $data['numero'] = $_REQUEST['numero'];
    $data['bairro'] = $_REQUEST['bairro'];
    $data['complemento'] = $_REQUEST['complemento'];
    $data['idEstado'] = $_REQUEST['idEstado'];
    $data['idCidade'] = $_REQUEST['idCidade'];

    if (!empty($data['idCidade']) && !empty($data['idEstado']) && !empty($data['cep']) && !empty($data['logradouro'])) {

        if ($id == 0) {
            $query = $db->create('enderecos', $data);
        } else {
            unset($data['data_cadastro']);
            $query = $db->update('enderecos', $id, $data);
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
function remover_enderecos() {
    global $db;
    $id = !empty(get_url(3)) ? decode(get_url(3)) : '';
    if (!empty($id)) {
        $query = $db->delete('enderecos', $id);
        if ($query) {
            echo json_encode(['success', 'Cadastro removido com sucesso.']);
        } else {
            echo json_encode(['error', 'Não foi possível remover o cadastro.']);
        }
    } else {
        echo json_encode(['error', 'Escolha um cadastro para ser removido.']);
    }
}

/**
 * Função para remover o cadastro
 * * */
function cidades() {
    global $db;
    $id = !empty(get_url(3)) ? get_url(3) : '';
    $arrayCidades = [];
    if (!empty($id)) {
        $cidades = $db->query("SELECT * FROM cidades WHERE idEstado='$id' ORDER BY cidade ASC");

        while($row_cidades = mysqli_fetch_assoc($cidades)){
            array_push($arrayCidades , $row_cidades);
        }
        echo json_encode($arrayCidades);
    } else {
        echo json_encode(['error', 'Escolha um estado.']);
    }
}
