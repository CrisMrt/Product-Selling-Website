<?php 
 include_once("top.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM produto WHERE id = " . $id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $preco = $row["preco"];
    $descricao = $row["descricao"];
    $nome = $row["nome"];
    $imagem = $row["filename"];

?>

<div class="container eliminarproduto">
    <h1>Deseja eliminar o seguinte produto? </h1>
    <h2 class="detalhe_nome"><?php echo $nome ?></h2>
    <div class="detalhe_produto">
        <div class="detalhe_imagem">
            <img src="../images/<?php echo $imagem ?>" />
        </div>
        <div class="detalhe_info">
            <p class="detalhe_descricao">
                <?php echo $descricao ?>
            </p>
            <p class="preco">
                <?php echo $preco ?>    
            
            </p>
            <div class="detalhe_action">
                <a href="processaEliminaproduto.php?id=<?php echo $id ?>&filename=<?php echo $imagem ?>">
                    <button>Confirmar</button>
                </a>
                <a href="index.php">
                    <button>Cancelar</button>
                </a>
            </div>
        </div>
    </div>
</div>

<?php }

include_once("footer.php");

?>