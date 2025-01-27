<?php
include_once("../conexaoBd.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["price"];
    $idcategoria = $_POST["idcategoria"];

    $diretorioDestino = "../images/";
    $nomeArquivo = $_FILES["fileName"]["name"];
    $caminhoCompleto = $diretorioDestino . $nomeArquivo;

    if(exif_imagetype($_FILES["fileName"]["tmp_name"]) != false){

        //mover o arquivo para o destino servidor
       
        move_uploaded_file($_FILES["fileName"]["tmp_name"], $caminhoCompleto);

        $sql = "INSERT INTO produto(nome, descricao, preco, id_categoria, filename) 
                VALUES (?, ?, ?, ?, ?)";

        $stm = $conn->prepare($sql);
        $stm->bind_param("ssdss", $nome, $descricao, $preco, $idcategoria, $nomeArquivo);
        //executar o comando
       
        if($stm->execute()){
           header("Location: index.php?cod=1");
        }else{
           header("Location: index.php?cod=2");
        }
        $stm->close();
       
    }//não é imagem
    else{
        header("Location: index.php?cod=2");
    }


}


?>


