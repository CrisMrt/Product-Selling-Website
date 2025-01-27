<?php

include("top.php");

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
        <div class="produtos">
            <h1>
                <?php 
                    if (isset($_GET["categoria"])){
                        $sqlcat = "SELECT * FROM categoriaproduto where id=" . $_GET["categoria"];
                        $result = $conn->query($sqlcat);
                        $row = $result->fetch_assoc();
                        echo "Listagem de  " . $row["descricao"];
                    }
                    else{
                        echo "Listagem de Produtos";
                    }
                ?>
            </h1>
            <?php
            $sql = "";
            //verificar se temos pequisa por categoria
                if (isset($_GET["categoria"])) {
                    $categoria = $_GET["categoria"];
                    $sql = "SELECT produto.id as prodId, categoriaproduto.descricao as descat, produto.descricao, filename, nome, preco 
                        FROM produto, categoriaproduto 
                        WHERE produto.id_categoria = categoriaproduto.id 
                        and categoriaproduto.id  = " . $categoria . " 
                        ORDER by produto.id desc";
                } else {
                    $sql = "SELECT produto.id as prodId, categoriaproduto.descricao as descat, produto.descricao, filename, nome, preco 
                        FROM produto, categoriaproduto 
                        WHERE produto.id_categoria = categoriaproduto.id 
                        ORDER by produto.id desc";
            }

            ?>
            <div class="grelhaprodutos">
                <!--//inicio de ciclo -->
                <?php
                $result = $conn->query($sql);
                if( $result->num_rows > 0){
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="cartaoproduto">
                        <div class="imagemproduto">
                            <img src="images/<?php echo $row["filename"] ?>" />
                        </div>
                        <div class="infoproduto">
                            <div class="nomeproduto"><?php echo $row["nome"] ?></div>
                            <div class="precoproduto"><?php echo $row["preco"] ?></div>
                        </div>
                        <p class="descricao"><?php echo $row["descricao"] ?></p>
                        <a href="detalhe.php?id=<?php echo $row["prodId"] ?>">
                            <div class="vermais">Ver Mais</div>
                        </a>
                    </div>
                <?php  }
                }
                else{
                    echo "Não existem produtos para listar..";
                }
                
                ?>

            </div>
        </div>

        <div class="categorias">
            <h2>Categorias</h2>
            <ul>
                <!-- categorias de Produtos -->
                <?php
                $sql = "SELECT c.id as idCat, c.descricao AS descricao, COUNT(p.id) AS quantidade
                FROM categoriaproduto c
                left JOIN produto p ON c.id = p.id_categoria
                GROUP BY c.descricao";

                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) { ?>
                    <li><a href="index.php?categoria=<?php echo $row["idCat"]; ?>"><?php echo $row["descricao"] . "( " . $row["quantidade"] . ")" ; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </main>
</div>

<? include_once("footer.php"); ?>