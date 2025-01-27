<?php 
        include_once("top.php");
        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $sql = "SELECT produto.id as prodId, descricao, filename, nome, preco 
            FROM produto where produto.id = " .$id ."
             ORDER by produto.id desc" ;

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
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
<main role="main">
          
<div class="container">
    <h1 class="detalhe_nome">Detalhe do Produto <?php echo $row["nome"] ?></h1>
    
    <div class="detalhe_produto">
        <div class="detalhe_imagem">
            <img src="images/<?php echo $row["filename"]?>" />
        </div>
        <div class="detalhe_info">
            <p class="detalhe_descricao"><?php echo $row["descricao"] ?></p>
            <p class="preco"><?php echo $row["preco"]."€" ?></p>
            <form id="carrinhoForm" action="carrinho.php" method="post">
                <div class="detalhe_action">
                <?php  
                                if(isset($_SESSION["user"])){
                                   ?><button type="button" onclick="Adicionar(<?php echo $row["prodId"] ?>, 1);">Adicionar ao carrinho</button><?php
                                }
                            ?> 
                    <button id="vercarrinho" class="invisivel">Ver carrinho</button>
                </div>
            </form>
        </div>
    </div>
    </div>
        </main>
    </div>

    <footer>
       <p>Escola Gago Coutinho 2024</p>
</footer>
<script src="index.js"></script>
</body>
</html> 
