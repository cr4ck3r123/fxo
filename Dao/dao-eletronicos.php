<?php

//include_once 'conexao.php';
include_once 'conexao.php';
//$pdo = conecta();

//FUNÇÃO LISTAR
function listarEletronico($pagina, $itens_por_pagina) {
    $pdo = conecta();
    try {
        $listar = $pdo->query("SELECT * FROM produtos where categorias_id = 1 LIMIT $pagina, $itens_por_pagina");
        $listar->execute();
      
        if ($listar->rowCount() > 0):
            return $listar->fetchAll();
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getLine();
        echo "<br>";
        echo $exc->getMessage();
    }
}

//FUNÇÃO LISTAR
function listarEletronicosTotal() {
    $pdo = conecta();
    try {
        $listar = $pdo->query("SELECT * FROM produtos where categorias_id = 1;");
        $listar->execute();

        if ($listar->rowCount() > 0):
            return $listar->rowCount();
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getLine();
        echo "<br>";
        echo $exc->getMessage();
    }
}



//FUNÇÃO CONSULTA PARA TRAZER OS DADOS
function recuperaDadosEletronicos($id) {
    $pdo = conecta();
    
    try {
        $pegaDados = $pdo->prepare("SELECT * FROM produtos 
WHERE idprodutos = ?");
        $pegaDados->bindValue(1, $id, PDO::PARAM_STR);
        $pegaDados->execute();

        if ($pegaDados->rowCount() > 0):
            return $pegaDados->fetch();
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}

//FUNÇÃO DE CADASTRO 
function cadastro($nome, $telefone, $email, $senha) {
    $pdo = conecta();
     try {
        $cadastro = $pdo->prepare("INSERT INTO produtos(url_foto, nome, valor, descricao, qtde, categoria) VALUES (?,?,?,?,?,?);");
        $cadastro->bindValue(1, $nome, PDO::PARAM_STR);
        $cadastro->bindValue(2, $telefone, PDO::PARAM_STR);
        $cadastro->bindValue(3, $email, PDO::PARAM_STR);
        $cadastro->bindValue(4, $senha, PDO::PARAM_STR);
        $cadastro->execute();

        if ($cadastro->rowCount() > 0):
            return TRUE;
        else :
            return FALSE;
        endif;
    } catch (PDOException $exc) {
        echo $exc->getLine();
        echo "<br>";
        echo $exc->getMessage();
    }
}


//FUNÇÃO VERIFICA ESTOQUE
function VerificaEstoque($id) {
    $pdo = conecta();
    try {
        $qtde = $listar = $pdo->query("SELECT qtde FROM eletronicos where categorias_id = ?");
        $qtde->bindValue(1, $id, PDO::PARAM_INT);
        $qtde->execute();

       echo $qtde;
    } catch (PDOException $exc) {
        echo $exc->getLine();
        echo "<br>";
        echo $exc->getMessage();
    }
}
?>