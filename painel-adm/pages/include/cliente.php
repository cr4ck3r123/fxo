<?php
include_once('Dao/dao-cliente.php');

$string = explode("?", $_SERVER['REQUEST_URI']);

//$pagina = explode("?", $string);
//pegar a pagina atual
//$pagina = (isset($_GET['?pagina'])) ? $_GET['?pagina'] : 0;

if(!empty($string[1])){
    $pagina = $string[1];
}else{
    $pagina = 1;
}

//var_dump($_GET['url']);
//defenir itens por pagina
$itens_por_pagina = 10;

//pega a quantidade total de objetos no banco de dados
$num_total = listarTotal();

//calcular o numero de paginas
$num_pagina = ceil($num_total / $itens_por_pagina);

//calcular o inicio da visualização
$inicio = ($itens_por_pagina * $pagina) - $itens_por_pagina;

//echo $_GET['pagina'];
?>


<div class="container-fluid" style="margin-top: 1%">
    <div class="row">
        <div class="col-md-12">
            <h1 align="center"><i class="fa-brands fa-product-hunt"></i> Lista de Clientes</h1><br>
        </div>
        <div class="col-md-12" align="center">
            <form class="form-inline my-6 my-lg-0" method="post" action="">
                <input class="form-inline mr-sm-1" type="text" name="nome_pesq" id="nome_pesq" placeholder="Pesquisar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 view_nome" type="submit">Pesquisar</button>
                <a href="" data-toggle="modal" data-target="#modal-login" style="padding-left: 10px"><button type="button" class="btn btn-info"><i class="fas fa-edit"></i> NOVO</button></a>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-hover">
                <thead class="thead-light" align="width">

                    <tr> 
                        <th>Codigo</th>
                        <th>Nome </th>
                        <th>Email</th>
                        <th>Quantidade</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody align="width">
                    <?php foreach (listarClientes($inicio, $itens_por_pagina) as $row): ?>
                        <tr>     
                            <?php if($row['nivel_usuario'] == 1){ ?>
                            <td style="width: 3%; font-weight: bold;"><?php echo $row['idusuarios'] . "<br>"; ?></td> 
                            <td style="width: 40%; font-weight: bold;"><?php echo $row['nome'] . "<br>"; ?></td> 
                            <td style="width: 45%; font-weight: bold;"><?php echo $row['email'] . "<br>"; ?></td> 
                            <td style="width: 100%; font-weight: bold;"><?php echo $row['whatssap'] . "<br>"; ?></td> 
                            <td style=""><a data-toggle="modal" data-target="#modal-alterar"><button type="button" class="btn btn-success view_data" id="<?php // echo $row['id'];    ?>"><i class="fas fa-edit"></i> Editar</button></a></td>
                            <td style="margin-left: 50%"><a data-toggle="modal" data-target=".bd-example-modal-lg"><button type="button" class="btn btn-info view_id" id="<?php //echo $row['id'];   ?>"><i class="fas fa-comment-alt-slash"></i> Editar</button></a></td>
                            <td style="margin-left: 50%"><a href="odontograma"><button type="button" class="btn btn-danger view_odonto" id="<?php echo $row['idusuarios']; ?>"><i class="far fa-tooth"></i> Editar</button></a></td>                    
                            <?php }else { ?>
                            <td style="width: 3%;"><?php echo $row['idusuarios'] . "<br>"; ?></td> 
                            <td style="width: 40%;"><?php echo $row['nome'] . "<br>"; ?></td> 
                            <td style="width: 45%;"><?php echo $row['email'] . "<br>"; ?></td> 
                            <td style="width: 100%;"><?php echo $row['whatssap'] . "<br>"; ?></td> 
                            <td style=""><a data-toggle="modal" data-target="#modal-alterar"><button type="button" class="btn btn-success view_data" id="<?php // echo $row['id'];    ?>"><i class="fas fa-edit"></i> Editar</button></a></td>
                            <td style="margin-left: 50%"><a data-toggle="modal" data-target=".bd-example-modal-lg"><button type="button" class="btn btn-info view_id" id="<?php //echo $row['id'];   ?>"><i class="fas fa-comment-alt-slash"></i> Editar</button></a></td>
                            <td style="margin-left: 50%"><a href="odontograma"><button type="button" class="btn btn-danger view_odonto" id="<?php echo $row['idusuarios']; ?>"><i class="far fa-tooth"></i> Editar</button></a></td>                    
                           
                            
                            
                            <?php } ?>
                        </tr>                  
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>
</div>

<?php
//verificar a pagina anterior e posterior
$anterior = $pagina - 1;
$posterior = $pagina;
?>

<!-- Paginação -->

<div class="container" style="width: 15%">
    <nav aria-label="...">
        <ul class="pagination">
        <?php if ($pagina == 1) { ?>
                <li class="page-item disabled">
                    <a class="page-link" href="?<?php echo $anterior; ?>">Anterior</a>
                </li>
        <?php } else { ?>
                <li class="page-item enabled">
                    <a class="page-link" href="?<?php echo $anterior; ?>" tabindex="-1">Anterior</a>
                </li>
        <?php } ?>  
                 <?php for($i=1; $i < $num_pagina + 1; $i++) {?>   
                <li class="<?php if($i == $pagina){ echo 'page-item active';} ?>" ><a class="page-link" href="?<?php echo $i; ?>"><?php echo $i; ?>
        <?php }  ?>   
                        <span class="sr-only">(atual)</span></a>
                </li>               
        <?php if($posterior == $num_pagina) {?>       
            <li class="page-item disabled">
                <a class="page-link" href="?<?php echo $posterior ?>">Próximo</a>
            </li>
        <?php } else {?> 
            <li class="page-item enabled">
                <a class="page-link" href="?<?php echo $posterior + 1 ?>" tabindex="+1">Próximo</a>
            </li>
        <?php } ?>
        </ul>
    </nav>
</div>


<!--- modal cadastro usuario -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form method="post" id="form"><div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress2">Descrição</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Descrição do Produto">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputIdentidade">Valor</label>
                            <input type="text" class="form-control" id="txtValor" name="txtValor" placeholder="Valor">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputIdentidade">Quantidade</label>
                            <input type="telProfissao" class="form-control" id="telProfissao" name="telProfissao" placeholder="Telefone Profissão" name="foneProfissao">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Insira a Imagem do Produto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Insira a imagem</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div align="center" class="" id="mensagem">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button name="btn-cadastro" id="btn-cadastro" class="btn btn-info">Cadastrar</button>

            </div>                    
            </form>

        </div>
    </div>
</div>
