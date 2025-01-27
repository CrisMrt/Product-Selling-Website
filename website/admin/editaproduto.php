<?php 
   include("top.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM produto WHERE id=" . $id;
        $resul = $conn->query($sql);

        $row = $resul->fetch_assoc();

        $preco = $row["preco"];
        $descricao = $row["descricao"];
        $nome = $row["nome"];
        $imagem = $row["filename"];
        $idCategoria = $row["id_categoria"];
        
    }



?>
<div class="container">
    <main role="main">
        <div class="formproduto">
            <h1>Alterar Produto</h1>
            <form method="post" enctype="multipart/form-data" action="admin-processaAlteraproduto.php">
                <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
                <div class="form-group">
                    <label class="control-label" for="nome">Nome produto</label><br>
                    <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $nome?>" />
                </div>
                <div class="form-group">
                    <label class="control-label" for="descricao">Descrição do produto</label><br>
                    <input class="form-control" type="text" id="descricao" name="descricao" value="<?php echo $descricao?>" />
                </div>
                <div class="form-group">
                    <div class="imagem">
                        <img src="../images/<?php echo $imagem ?>">
                    </div>
                    <input type="hidden" name="fileNameOld" id="fileNameOld" value ="<?php echo $imagem?>" />
                    <label class="control-label" for="fileName">Foto do produto</label><br>
                    <div class="mostrar_escolher_imagem" onclick="MostraCarregaImagem();">Carrega Imagem</div>
                    <input type="file" class="form-control invisivel"  id="fileName" name="fileName" value ="<?php echo $imagem?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="price">Preço</label><br>
                    <input class="form-control" type="text" data-val="true" id="price" name="price" value="<?php echo $preco?>" />
                </div>
                <div class="form-group">
                    <label class="control-label" for="idcategoria">Categoria</label><br>
                    <select class="form-control" data-val="true" data-val-required="The Categoria field is required." id="idcategoria" name="idcategoria">
                     <?php 
                            $sql = "SELECT * FROM categoriaproduto";
                            $result = $conn->query( $sql );
                            while( $row = $result->fetch_assoc() ){ ?>
                                <option  <?php 
                                    if($idCategoria == $row["id"])
                                       echo "selected";
                                ?> value="<?php echo $row["id"] ?>"><?php echo $row["descricao"] ?>
                                </option>

                          <?php  } ?>
                     ?>
                     </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Alterar Produto" />
                </div>
            </form>
        </div>
    </main>
</div>
<script src="scripts/scripts.js"></script>
<footer>
       <p>Escola Gago Coutinho 2024</p>
</footer>
<script src="index.js"></script>
</body>
</html>         