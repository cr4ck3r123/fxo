<?php

include_once '../Dao/conexao.php';
$pdo = conecta();

//FUNÇÃO LISTAR
function listarProdutos($pagina, $itens_por_pagina) {
    $pdo = conecta();
    try {
        $listar = $pdo->query("SELECT * FROM produtos  LIMIT $pagina, $itens_por_pagina;");
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
function listarProdutosTotal() {
    $pdo = conecta();
    try {
        $listar = $pdo->query("select * from produtos;");
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
//function cadastro($nome, $telefone, $email, $senha) {
//    $pdo = conecta();
//     try {
//        $cadastro = $pdo->prepare("INSERT INTO usuarios(nome, whatssap, email, senha) VALUES (?,?,?,?);");
//        $cadastro->bindValue(1, $nome, PDO::PARAM_STR);
//        $cadastro->bindValue(2, $telefone, PDO::PARAM_STR);
//        $cadastro->bindValue(3, $email, PDO::PARAM_STR);
//        $cadastro->bindValue(4, $senha, PDO::PARAM_STR);
//        $cadastro->execute();
//
//        if ($cadastro->rowCount() > 0):
//            return TRUE;
//        else :
//            return FALSE;
//        endif;
//    } catch (PDOException $exc) {
//        echo $exc->getLine();
//        echo "<br>";
//        echo $exc->getMessage();
//    }
//}


//FUNÇÃO VERIFICA ESTOQUE
function VerificaEstoque($id) {
    $pdo = conecta();
    try {
        $qtde = $listar = $pdo->query("SELECT qtde FROM eletronicos where idprodutos = ?");
        $qtde->bindValue(1, $id, PDO::PARAM_INT);
        $qtde->execute();

       echo $qtde;
    } catch (PDOException $exc) {
        echo $exc->getLine();
        echo "<br>";
        echo $exc->getMessage();
    }
}

//SOMAR TOTAL DE PRODUTOS 
function TotalProdutos() {
    $pdo = conecta();
    try {
         $qtde = $pdo->query("SELECT SUM(qtde) AS total FROM produtos;");
         $qtde->execute();
         $qtde = $qtde->fetch(PDO::FETCH_ASSOC);
     return  $qtde['total'];
    } catch (PDOException $exc) {
        echo $exc->getLine();
        echo "<br>";
        echo $exc->getMessage();
    }
}

//FUNÇÃO DE CADASTRO 
function cadastroProduto( $url_foto, $nome, $valor, $descricao, $qtde, $categoria) {
    $pdo = conecta();
     try {
        $cadastro = $pdo->prepare("INSERT INTO produtos(url_foto, nome, valor, descricao, qtde, categorias_id) VALUES (?,?,?,?,?,?);");
        $cadastro->bindValue(1, $url_foto, PDO::PARAM_STR);
        $cadastro->bindValue(2, $nome, PDO::PARAM_STR);
        $cadastro->bindValue(3, $valor, PDO::PARAM_STR);
        $cadastro->bindValue(4, $descricao, PDO::PARAM_STR);
        $cadastro->bindValue(5, $qtde, PDO::PARAM_INT);
        $cadastro->bindValue(6, $categoria, PDO::PARAM_INT);
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
?>