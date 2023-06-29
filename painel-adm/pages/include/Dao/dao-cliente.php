<?php 

include_once '../Dao/conexao.php';
$pdo = conecta();



//FUNÇÃO LISTAR
function listarClientes($pagina, $itens_por_pagina) {
    $pdo = conecta();
    try {
        $listar = $pdo->query("SELECT * FROM usuarios LIMIT $pagina, $itens_por_pagina;");
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
function listarTotal() {
    $pdo = conecta();
    try {
        $listar = $pdo->query("select * from usuarios;");
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
//FUNÇÃO CONSULTA PARA TRAZER O CPF
function recuperaDados($email) {
    $pdo = conecta();
    try {
        $pegaEmail = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $pegaEmail->bindValue(1, $email, PDO::PARAM_STR);  
        $pegaEmail->execute();

        if ($pegaEmail->rowCount() > 0):
            return $pegaEmail->fetchAll(PDO::FETCH_ASSOC);
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
    $nivel = "Cliente";
    try {
        $cadastro = $pdo->prepare("INSERT INTO usuarios(nome, whatssap, email, senha, nivel_usuario) VALUES (?,?,?,?,0);");
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
//if(isset($_POST['btn-cadastro'])){
//    
//$nome = $_POST['nome']; 
//$cpf = $_POST['cpf']; 
//$telefone = $_POST['telefone']; 
//$email = $_POST['email']; 
//$senha = $_POST['senha']; 
//
//try {
//    $this->cadastro($nome, $cpf, $telefone, $email, $senha);
//} catch (Exception $exc) {
//    echo $exc->getTraceAsString();
//}




//
//$res = $pdo->prepare("INSERT INTO usuarioss (nome, cpf, telefone, email, senha, nivel)"
//        . "values (:nome, :cpf, :telefone, :email, :senha, :nivel)");
//
//$res->bindValue(":nome", $nome);
//$res->bindValue(":cpf", $cpf);
//$res->bindValue(":telefone", $telefone);
//$res->bindValue(":email", $email);
//$res->bindValue(":senha", $senha);
//$res->bindValue(":nivel", 'Cliente');
//
//$res->execute();
//echo $nome, $cpf;
?>