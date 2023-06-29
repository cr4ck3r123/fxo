<?php 
include_once("./Dao/conexao.php");

if(!isset($_SESSION['itens'])){
    $_SESSION['itens'] = array();
}


?>
   <!-- ----------------------- Carrinho ------------------------------->
                                        <div class="rd-navbar-basket-wrap">
                                            <button class="rd-navbar-basket fl-bigmug-line-shopping204 toggle-original" data-rd-navbar-toggle=".cart-inline"><span>0</span></button>
                                            <div class="cart-inline toggle-original-elements">
                                                <div class="cart-inline-header">
                                                    <h5 class="cart-inline-title">No Carrinho:<span> 2</span> Produtos</h5>
                                                    <h6 class="cart-inline-title">Total:<span> R$800</span></h6>
                                                </div>
                                                <div class="cart-inline-body">
                                                    <div class="cart-inline-item">
                                                        <div class="unit align-items-center">
                                                            <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="images/product-mini-1-108x100.png" alt="" width="108" height="100"></a></div>
                                                            <div class="unit-body">
                                                                <h6 class="cart-inline-name"><a href="#">Smartphones</a></h6>
                                                                <div>
                                                                    <div class="group-xs group-inline-middle">
                                                                        <div class="table-cart-stepper">
                                                                            <div class="stepper "><input class="form-input stepper-input" type="number" data-zeros="true" value="1" min="1" max="1000" style="color: #2b2a28"><span class="stepper-arrow up" style="color: #2b2a28"></span><span class="stepper-arrow down"></span></div>
                                                                        </div>
                                                                        <h6 class="cart-inline-title">R$550</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cart-inline-item">
                                                        <div class="unit align-items-center">
                                                            <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="images/product-mini-2-108x100.png" alt="" width="108" height="100"></a></div>
                                                            <div class="unit-body">
                                                                <h6 class="cart-inline-name"><a href="#">Eletronicos</a></h6>
                                                                <div>
                                                                    <div class="group-xs group-inline-middle">
                                                                        <div class="table-cart-stepper">
                                                                            <div class="stepper "><input class="form-input stepper-input" type="number" data-zeros="true" value="1" min="1" max="1000" style="color: #2b2a28"><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
                                                                        </div>
                                                                        <h6 class="cart-inline-title">$250</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-inline-footer">
                                                    <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha" href="#">Produtos</a><a class="button button-md button-primary button-pipaluk" href="#">Pagamentos</a></div>
                                                </div>
                                            </div>
                                        </div>
                    <!------------------------- FIM CARRINHO ------------------------------------------->