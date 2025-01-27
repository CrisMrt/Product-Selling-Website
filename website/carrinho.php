
<?php include_once("top.php");  ?> 

<?php
    //verificar se o formulário foi enviado
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["itens"])){

            $carrinho = new CarrinhoCompras();
            if(!isset($_SESSION['lista_ids'])){
                $_SESSION['lista_ids'] = array();
            }

            
            $itens = $_POST['itens']; //itens que vêm do formulário
            $totalItens = count($itens);
            
            //vou ter que percorrer a lista de itens
            //para usar por exemplo Select * FROM produto where ID IN (1,3,6)
            $ListaIn = "(";
            $ListaIn = CriaListaIds($totalItens, $ListaIn, $itens);
            $ListaIn = $ListaIn . ")";

            $sql ="SELECT * FROM produto WHERE id IN " . $ListaIn;
            $result = $conn->query($sql);
            $TotalCarrinho =0;
            PreencheCarrinho($result, $itens, $carrinho);

    }
    else{
        if(isset($_SESSION['lista_ids'])){
                $carrinho = new CarrinhoCompras();

                $itens = $_SESSION['lista_ids'];
                foreach($itens as $valor){
                    $ids[] = $valor['id'];

                }
                $ListaIn = '(' . implode(',', $ids) . ')';
                $sql = "SELECT * FROM produto WHERE id in ". $ListaIn;
                $result = $conn->query($sql);
                $TotalCarrinho = 0;
                PreencheCarrinho($result, $itens, $carrinho);

        }
    }
    ?>

    <section class="hero">
        <h1 class="titulo">
            A minha Loja
        </h1>
        <h2>
           Macramé
        </h2>
    </section>

    <div class="container">
        <main role="main">
        <h1>Carrinho de compras</h1>
        <p><p>

    <section class="carrinho" >
        
        <div class="esquerda">
            <div class="carrinho_grelha">
                <div class="carrinho_colunas">
                    <div class="titulo_coluna">Produto</div>
                    <div class="titulo_coluna">Preço</div>
                    <div class="titulo_coluna">Quantidade</div>
                    <div class="titulo_coluna"></div>
                    <div class="titulo_coluna">Total</div>
                    
                </div>
                <!-- Listagem de itens do carrinho ----   -->
                    <?php 
                        $i = 0;
                        foreach($carrinho->listaItens as $item){
                            $subTotalItem = $item->produto->price * $item->quantidade;?>
                        <div class="linha_dados" id="produto<?php echo $item->produto->id; ?>">
                            <div class="linha_foto">
                                <div class="foto">
                                    <img src="images/<?php echo $item->produto->filename; ?>" />
                                </div>
                                <div>
                                    <p class="nome_produto"><?php echo $item->produto->nome; ?></p>
                                    <!--<p class="tamanho">M</p>-->
                                </div>
                            </div>
                            <div class="preco"> <?php echo $item->produto->price ?>€</div>
                            <div
                            class="quantidade center">
                                <div onclick="Adiciona(-1, <?php echo $item->produto->id; ?>, -<?php echo $item->produto->price ?>);" class="btmenos">-</div>
                                <div id="<?php echo $item->produto->id; ?>">1</div>
                                <div onclick="Adiciona(1, <?php echo $item->produto->id; ?>, <?php echo $item->produto->price ?>);" class="btmais">+</div>
                            </div>
                            <div class="apagar"><img src="images/delete.png" onclick="RemoveProduto(<?php echo $item->produto->id; ?>)"/></div>
                             <div class="total" id="itemsubtotal<?php echo $item->produto->id; ?>"><?php echo $subTotalItem ?>€</div>
                        </div>
                    <?php 
                      $i++;
                    }
                    ?>
                        
            </div>
        </div>
        <div class="direita">
            <div class="quadro_sumario">
                <h2>Sumário</h2>
                <div class="subtotal">
                    <h3>Subtotal</h3>
                    <h4><strong id="subtotal"><?php echo $carrinho->total ?></strong></h4>
                </div>
                <div class="portes">
                    <h3>Portes</h3>
                    <h4>0€</h4>
                </div>
                <div class="total">
                    <h3><strong>Total</strong></h3>
                    <h4><strong id="total"><?php echo $carrinho->total ?></strong></h4>
                </div>
            
            
            </div>
           
            <form action="checkout.php" method="post" id="carrinhoForm" name="carrinho_form">
                                        <input type="hidden" name="itens[0][id]" value="25" />
                        <input type="hidden" name="itens[0][quantidade]" value="1" />
                                        <button type="submit" class="checkout">
                    checkout
                </button>
            </form>

            
        </div>
        
    </section>
        </main>
    </div>
<footer>
       <p>Escola Gago Coutinho 2024</p>
</footer>
<script src="index.js"></script>
</body>
</html> 



<?php   
   
   function CriaListaIds($totalItens, $ListaIn, $itens){
        for ($i = 0; $i < $totalItens; $i++){
            $id = $itens[$i]['id'];
           // echo $id;
            if(!($i == ($totalItens - 1))){
                $ListaIn = $ListaIn . $id .", ";
            } else {
                $ListaIn = $ListaIn . $id;
            }
        }
     return $ListaIn;

   }


   function PreencheCarrinho($result, $itens, $carrinho){
     unset($_SESSION['lista_ids']);
        while($row = $result->fetch_assoc()){
            $produto = new Produto();
            $produto->id = $row["id"];
            $produto->nome = $row["nome"];
            $produto->descricao = $row["descricao"];
            $produto->price = $row["preco"];
            $produto->filename = $row["filename"];

            $itemCarrinho = new ItemCarrinho();
            $itemCarrinho->quantidade = 1;

            //comparar o que tenho na base de dados com 
            //o que vem do formulario e atualizar as quantidades

            foreach($itens as $item){
                if($item['id'] == $produto->id){
                    $itemCarrinho->quantidade = $item["quantidade"];
                    $_SESSION['lista_ids'][] = array('id' => $produto->id,
                                                     'quantidade' => $itemCarrinho->quantidade);
                }
            }
            $itemCarrinho->idCarrinho = $carrinho->idCarrinho;
            $itemCarrinho->produto = $produto;
            $carrinho->total  += $itemCarrinho->quantidade * $produto->price; 
            $carrinho->listaItens[] = $itemCarrinho;
        }
     }
   


?>
