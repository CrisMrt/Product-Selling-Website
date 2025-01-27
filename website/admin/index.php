    <?php 
        include_once("top.php");
        
        if(!isset($_SESSION["admin"])){
            header("Location: admin-login.php");
        }

        $pesquisa ="";
        $categoria ="";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $pesquisa = $_POST["pesquisa"];
            $categoria = $_POST["filtro"];
        }



    ?>
    <div class="container">
        <main role="main">
            <div class="novo-produto">
                <a href="admin-inserirproduto.php"><button class="btnovo">Novo produto</button></a>
            </div>
            <div class="pesquisa">
                <form name="pesquisa" action="index.php" method="post">
                    <div class="grelha-pesquisa">
                        <div class="caixa-pesquisa">
                            <label for="pesquisa">Pesquisa</label>
                            <input type="text" name="pesquisa" id="pesquisa" />
                            <button type="submit">OK</button>
                        </div>
                        <div class="caixa-filtro">
                            <label for="filtro">Categoria</label>
                            <select name="filtro" id="filtro">
                                <option value="0">Todas as categorias</option>
                                <?php
                                $sql = "Select * from categoriaproduto ";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["descricao"]; ?></option>
                                <?php } ?>
                            </select>
                            <a href="admin-inserirCategoria.php"><button type="button">Nova</button></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="listaProdutos">
                <?php
                $cod = 0;
                $message = "";
                $class = "";
                if (isset($_GET["cod"])) {
                    $cod = $_GET["cod"];
                    if ($cod == 1) {
                        $message = "Produto inserido com Successo!";
                        $class = "sucesso";
                    }
                    if ($cod == 2) {
                        $message = "Produto Não Inserido!";
                        $class = "erro";
                    }
                    if ($cod == 4) {
                        $message = "Produto eliminado!";
                        $class = "sucesso";
                    }
                    if ($cod == 5) {
                        $message = "Produto Não eliminado!";
                        $class = "erro";
                    }
                    if ($cod == 6) {
                        $message = "Categoria inserida com sucesso!";
                        $class = "sucesso";
                    }
                    if ($cod == 7) {
                        $message = "Categoria não Inserida!";
                        $class = "erro";
                    }
                    if ($cod == 8) {
                        $message = "Categoria já existente!";
                        $class = "erro";
                    }

                    if ($cod == 9) {
                        $message = "Produto alterado com sucesso!";
                        $class = "sucesso";
                    }

                    if ($cod == 10) {
                        $message = "Erro na alteração do Produto!";
                        $class = "erro";
                    }
                    if($cod == 11){
                        $message = "Sucesso em dar Login";
                        $class = "sucesso";
                    }
                    if($cod = 12){
                        $message = "Erro ao dar Login";
                        $class = "erro";
                    }
                } else {
                    $class = "invisivel";
                }
                ?>

                <div id="mensagem" class="mensagem <?php echo $class ?>">
                    <h4><?php echo $message ?></h4>
                    <div class="close" onclick="CloseMessage();">X</div>
                </div>

                <?php
                if($categoria != "" && $categoria !=0){
                    $sql = "SELECT produto.id as prodId, filename, nome, preco 
                    FROM produto,  categoriaproduto 
                    WHERE categoriaproduto.id = " . $categoria  . "
                    and produto.nome like '%" . $pesquisa . "%' 
                    and  produto.id_categoria = categoriaproduto.id
                    ORDER by produto.id desc ";

                }
                else{
                    $sql = "SELECT produto.id as prodId, filename, nome, preco 
                    FROM produto 
                    WHERE produto.nome like '%" . $pesquisa . "%'  
                    ORDER by produto.id desc";
                }

               

                ?>
              
                <h2>Listagem de produtos <span class="texto-categorias"></span></h2>
                <div class="grelha-produtos">
                    <div class="header">
                        <div>id</div>
                        <div>Foto</div>
                        <div>Nome</div>
                        <div>Preço</div>
                        <div>Opções</div>
                    </div>
                    <div class="dados">
                        <?php
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>

                            <!--//inicio de ciclo -->
                            <div class="linha-produto">
                                <div><?php echo $row["prodId"] ?></div>
                                <div class="imagemProduto"><img src="../images/<?php echo $row["filename"] ?>"></div>
                                <div><?php echo $row["nome"] ?></div>
                                <div><?php echo $row["preco"] ?> </div>
                                <div class="opcoes">
                                    <a href="editaproduto.php?id=<?php echo $row["prodId"] ?>"><img src="images/edit.png"></a>
                                    <a href="eliminaproduto.php?id=<?php echo $row["prodId"] ?>"><img src="images/close.png"></a>
                                </div>
                            </div>

                        <?php  } ?>
                      



                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>

    <?php 
     include_once("footer.php");
    ?>