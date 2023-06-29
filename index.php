<?php


if (isset($_GET['url'])) {   
      
    $explode = explode('/', $_GET['url']);
    $file = $explode[0] . '.php';

    
    if (is_file('./Views/include/' . $file)) {
    
       include_once './Views/include/' . $file;  
        
        //echo $file;
    } else {
       // include_once("/Views/include/conteudo.php");
        echo "error 404";
        //  include_once("./baladas.php");
    }
}else{
   // echo 'teste';
   // echo $explode;
  include ("./Views/include/cabecalho.php"); 
  include ("./Views/include/carousel.php"); 
  include_once("./Views/include/conteudo.php"); 
  include_once("./Views/include/footer.php");
}
 

?>