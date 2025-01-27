<?php 
    include_once("top.php");

?>
    <div class="container">
        <div class="formcategoria">
            <h1>Inserir Nova Categoria</h1>
            <form method="post" action="admin-processaInserirCategoria.php">
                <div class="form-group">
                    <label class="control-label" for="descricao">Nome Categoria</label><br>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="" />
                </div>
                <div class="form-group">
                   <input type="submit" value="Inserir Categoria" />
                </div>
            </form>
        </div>
    </div>



<?php
    include_once("footer.php");
?>