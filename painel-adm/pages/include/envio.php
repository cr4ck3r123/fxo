<?php



	// irá verificar se o arquivo já foi incluído, e se assim for, não inclui novamente.
	require_once("Dao/Upload.php");
	require_once("Dao/dao-produtos.php");
       
        
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $valor = $_POST['valor'];
        $qtde = $_POST['quantidade'];
       # echo 'variaveis ='. $nome."<br>".$descricao."<br>".$categoria."<br>".$valor."<br>".$qtde;
        
        $imagem = $_FILES['imagem'];
        $ext = strtolower(substr($_FILES["imagem"]['name'], -4));
        
        if($imagem != NULL){
            $nomeFinal = time(). $ext;
             if (move_uploaded_file($imagem['tmp_name'], "../images/".$nomeFinal)) {
                    
                 $tamanhoImg = filesize("../images/".$nomeFinal);
                 
                 
        $mysqlImg = addslashes(fread(fopen("../images/".$nomeFinal, "r"), $tamanhoImg));
        
        $url_foto = "images/".$nomeFinal;
        
        if($categoria == "Eletrodomesticos"){
        $categoria = 4;
           // echo "cadastro realizado com sucesso".$categoria;  
        cadastroProduto($url_foto, $nome, $valor, $descricao, $qtde, $categoria );
        }elseif ($categoria == "Eletronicos") {
         $categoria = 1;
         cadastroProduto($url_foto, $nome, $valor, $descricao, $qtde, $categoria );
        }elseif ($categoria == "Informatica") {
         $categoria = 3;
         cadastroProduto($url_foto, $nome, $valor, $descricao, $qtde, $categoria );
        }elseif ($categoria == "Smartphones") {
         $categoria = 5;
         cadastroProduto($url_foto, $nome, $valor, $descricao, $qtde, $categoria );
        }
        
        
        echo "categoria".$categoria;   
        
       // echo $nomeFinal;
       // $link = mysqli_connect($host, $username, $password) or die("Impossível Conectar");

//        mysqli_select_db($link, $db) or die("Impossível Conectar");
//        mysqli_query($link, "INSERT INTO pessoa (PES_IMG) VALUES ('$mysqlImg')") or
//                die("O sistema não foi capaz de executar a query");

//        unlink($nomeFinal);        
//        $url = 'http://' . $pegar_ip . '/imagem';
//        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
//        $_SESSION['insere_imagem'] = "Inserido com sucesso!";
    }
} else {
    echo"Você não realizou o upload de forma satisfatória.";
}
             

        
        
        
?>