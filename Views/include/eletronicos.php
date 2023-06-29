<?php

 @$url = $_GET['tipo'];
 @$id = explode("?", $_SERVER['REQUEST_URI']);
 @$id = explode('=', $id[1]);

if (empty(@$id[1] || @$id[1] = 0) ) {

  include_once("cabecalho.php");
  include_once("./Dao/dao-eletronicos.php");
  
    //pegar a pagina atual
    if (!empty($string[1])) {
        $pagina = $string[1];
    } else {
        $pagina = 1;
    }

//defenir itens por pagina
    $itens_por_pagina = 6;
  
//pega a quantidade total de objetos no banco de dados
    $num_total = listarEletronicosTotal();

//calcular o numero de paginas
    $num_pagina = ceil($num_total / $itens_por_pagina);

//calcular o inicio da visualização
    $inicio = ($itens_por_pagina * $pagina) - $itens_por_pagina;

//echo $num_pagina;
  
    ?>

    <!-- Icons Ruby-->
    <section class="section section-md bg-default section-top-image">
        <div class="container">
            <div class="row row-30 justify-content-center">
                <?php foreach (listarEletronico($inicio, $itens_por_pagina) as $row): ?>
                    <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0s">
                        <div class="card" style="width: 20rem;">                           
                            <img class="card-img-top" src="<?php echo $row['url_foto']; ?>" alt="Card image cap">

                            <div class="card-body">
                                <form action="eletronicos" method="GET">
                                    <h5 class="card-title" name="title"><?php echo $row['nome']; ?></h5>
                                    <b style="font-size: 18px;">VALOR:</b> <b style="color: red; font-size: 18px;">R$ <?php echo $row['valor']; ?> </b><br>
                                    <input type="hidden" style="display: hidden;" id="tipo" name="tipo" value="<?php echo $row['idprodutos']; ?>">                           
                                    <input  style="cursor: pointer;" class="btn btn-primary" type="submit" name="" value="Saiba Mais" />
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    
    <?php
//verificar a pagina anterior e posterior
    $anterior = $pagina - 1;
    $posterior = $pagina;
    ?>
    <nav aria-label="...">
        <ul class="pagination">
            <?php if ($pagina == 1) { ?>  
                <li class="page-item disabled">        
                    <a class="page-link" href="?<?php echo $anterior ?>">Anterior</a>
                </li>
            <?php } else { ?>

                <li class="page-item enabled">        
                    <a class="page-link" href="?<?php echo $anterior ?>" tabindex="-1">Anterior</a>
                </li>
            <?php } ?>  


            <?php for ($i = 1; $i < $num_pagina + 1; $i++) { ?>
                <li class=" <?php
                if ($i == $pagina) {
                    echo 'page-item active';
                }
                ?>"><a class="page-link" href="?<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php } ?>         

            <!--        <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only">(atual)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>-->

    <?php if ($posterior == $num_pagina) { ?>  
                <li class="page-item disabled">        
                    <a class="page-link" href="?<?php echo $posterior ?>">Próximo</a>
                </li>
    <?php } else { ?>

                <li class="page-item enabled">        
                    <a class="page-link" href="?<?php echo $posterior + 1 ?>" tabindex="+1">Próximo</a>
                </li>
    <?php } ?> 
        </ul>
    </nav>
    <br>
    <br>
    <?php
    include_once("footer.php");
} else {
    include_once("cabecalho.php");
    include_once("./Dao/dao-eletronicos.php");

 @$url = $_GET['tipo'];
 $id = explode("?", $_SERVER['REQUEST_URI']);
 $idprodutos = explode('=', $id[1]);

    
    $eletronico = recuperaDadosEletronicos($idprodutos[1]);
    
   
    ?>

    <!-- Contact Form and Gmap --> 
    <section class="section section-md bg-default section-top-image">
        <div class="container">
            <div class="row row-50">
                <div class="col-lg-6">

                    <img class="" src="<?php echo $eletronico['url_foto']; ?>">

                </div>

                <div class="col-lg-6 section-map-small">
                    <b style="font-size: 18px;">PRODUTO</b>
                    <h5 class="card-title"><?php echo $eletronico['nome']; ?></h5>

                    <p class="card-text" style="font-size: 18px;"><br><br><b>DESCRIÇÃO</b><div class="card-text" style="font-size: 18px;"> <?php echo $eletronico['descricao']; ?></div>
                    <br>
                    <br>           
                    <b style="font-size: 18px;">ESTOQUE:</b> <b style="color: green; font-size: 18px;"><?php if ($eletronico['qtde'] > 0) {
        echo 'DISPONÍVEL';
    } else {
        echo '<b style="color: red; font-size: 18px;">INDISPONÍVEL </b>';
    } ?></b><br><br>
                    <b style="font-size: 18px;">VALOR:</b> <b style="color: red; font-size: 18px;">R$ <?php echo $eletronico['valor']; ?> </b><br>
                    <br>

                    <!-- Botão adicionar carrinho -->               
                    <?php
                    if (!isset($_SESSION['nome_usuario'])) {
                        echo '<form action="login" method="post">                                                                                               
                 <input  style="cursor: pointer;" class="btn btn-primary" type="submit" name="saibamais" value="Compre já" />
                 </form>';
                    } else {
                        echo '<button style="cursor: pointer;" class="btn btn-primary" type="submit" name="adicionar" value="Adicionar no carrinho">Adicionar <i class="fas fa-shopping-cart"></i></button>';
                    }
                    ?>  

                </div>
            </div>
        </div>
    </section>

    <?php
    include_once("footer.php");
}
?>





