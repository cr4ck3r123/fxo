<?php
include_once('Dao/dao-produtos.php');

$string = explode("?", $_SERVER['REQUEST_URI']);

if (!empty($string[1])) {
    $pagina = $string[1];
} else {
    $pagina = 1;
}

$itens_por_pagina = 10;

//pega a quantidade total de objetos no banco de dados
$num_total = listarProdutosTotal();

//calcular o numero de paginas
$num_pagina = ceil($num_total / $itens_por_pagina);

//calcular o inicio da visualização
$inicio = ($itens_por_pagina * $pagina) - $itens_por_pagina;

//echo $_GET['pagina'];
?>



<div class="container-fluid" style="margin-top: 1%">
    <div class="row">
        <div class="col-md-12">
            <h1 align="center"><i class="fa-brands fa-product-hunt"></i> Lista de Produtos</h1><br>
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
                        <th>Produto </th>
                        <th>Valor</th>
                        <th>Estoque</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody align="width">
                    <?php foreach (listarProdutos($inicio, $itens_por_pagina) as $row): ?>
                        <?php if ($row['qtde'] == 0) { ?>
                            <tr>                        
                                <td style="width: 3%; color: red;"><?php echo $row['idprodutos'] . "<br>"; ?></td> 
                                <td style="width: 65%; color: red;"> <?php echo $row['nome'] . "<br>"; ?></td> 
                                <td style="width: 65%; color: red;"><?php echo 'R$ ' . $row['valor'] . "<br>"; ?></td> 
                                <td style="width: 65%; color: red;"> <?php echo $row['qtde'] . "<br>"; ?></td> 
                               <td style="margin-left: 50%"><a data-toggle="modal" data-target=".bd-example-modal-lg"><button type="button" class="btn btn-info view_data" id="<?php //echo $row['id'];          ?>"><i class="fas fa-comment-alt-slash"></i> Editar</button></a></td>
                                <td style="margin-left: 50%"><a href="odontograma"><button type="button" class="btn btn-danger view_odonto" id="<?php echo $row['id']; ?>"><i class="far fa-tooth"></i> Editar</button></a></td>                    
                            </tr>    
                        <?php } else { ?>
                            <tr>                        
                                <td style="width: 3%;"><?php echo $row['idprodutos'] . "<br>"; ?></td> 
                                <td style="width: 65%;"><?php echo $row['nome'] . "<br>"; ?></td> 
                                <td style="width: 65%;"><?php echo 'R$ ' . $row['valor'] . "<br>"; ?></td> 
                                <td style="width: 65%;"> <?php echo $row['qtde'] . "<br>"; ?></td> 
                                <td style=""><a href="" data-toggle="modal" data-target="#"><button type="button" class="btn btn-success view_data" id="<?php echo $row['idprodutos']; ?>"><i class="fas fa-edit"></i> Editar</button></a></td>

                                <td style="margin-left: 50%"><a href="" data-toggle="modal" data-target="#modal-login" ><button type="button" class="btn btn-danger view_odonto" id="<?php //echo $row['idprodutos'];   ?>"><i class="fa-solid fa-trash-can"></i> Excluir</button></a></td>                    
                            </tr> 
                        <?php } ?>
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
            <?php for ($i = 1; $i < $num_pagina + 1; $i++) { ?>   
                <li class="<?php
                if ($i == $pagina) {
                    echo 'page-item active';
                }
                ?>" ><a class="page-link" href="?<?php echo $i; ?>"><?php echo $i; ?>
                <?php } ?>   
                    <span class="sr-only">(atual)</span></a>
            </li>               
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

                <form method="POST" action="envio" id="form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputNome">Produto</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="custom-select" name="categoria">
                            <option>Selecione</option>
                            <option>Eletronicos</option>
                            <option>Smartphones</option>
                            <option>Eletrodomesticos</option>
                            <option>Automotivo</option>
                            <option>Informatica</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputIdentidade">Valor</label>
                            <input type="text" class="form-control" id="txtValor" name="valor" placeholder="Valor">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputIdentidade">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="formFile" class="form-label">Selecione a Imagem</label>
                        <input class="form-control" type="file" id="imagem" name="imagem">
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


<!--- modal Editar Produto -->
<div class="modal fade" id="modal-alterar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form method="POST" action="envio" id="form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputNome">Id</label>
                            <input type="text" class="form-control" id="id" name="id" placeholder="ID" value="">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="inputNome">Produto</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="custom-select" name="categoria">
                            <option>Selecione</option>
                            <option>Eletronicos</option>
                            <option>Smartphones</option>
                            <option>Eletrodomesticos</option>
                            <option>Automotivo</option>
                            <option>Informatica</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputIdentidade">Valor</label>
                            <input type="text" class="form-control" id="txtValor" name="valor" placeholder="Valor">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputIdentidade">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="formFile" class="form-label">Selecione a Imagem</label>
                        <input class="form-control" type="file" id="imagem" name="imagem">
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


  
  
       
<!-- FUNÇÃO PARA RETORNA DADOS -->
<script type="text/javascript">
       
//       function editarProduto(id){
//           alert('funcionou')
//       }
//     
 
    $(document).ready(function () {
        $(document).on('click', '.view_data', function () {
           var user_id = $(this).attr("id");
             
            alert(user_id);
//            if (user_id !== '') {
//                var dados = {
//                    id: user_id
//                };
//                $.post('../Controle/Retorna_Odontograma.php', dados, function (retorna) {
//                    
//                    console.log(retorna);
//                    var retorno = JSON.parse(retorna);
//                                    ``
//                        
//                });
//            }
            
         });
    });

</script>
   