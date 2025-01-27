<?php 
include_once("../conexaoBd.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["price"];
    $idcategoria = $_POST["idcategoria"];
    $id = $_POST["id"];

    $diretorioDestino = "../images/";
    $nomeArquivo = $_FILES["fileName"]["name"];
    $nomeArquivoOld = $_POST["fileNameOld"];
    $caminhoCompleto = $diretorioDestino . $nomeArquivo;

   if($nomeArquivo != $nomeArquivoOld && $_FILES["fileName"]["tmp_name"] != null){
      
    if(exif_imagetype($_FILES["fileName"]["tmp_name"]) != false){

            //apagar a imagem antiga
            unlink("../images/" .  $nomeArquivoOld);
        
            move_uploaded_file($_FILES["fileName"]["tmp_name"], $caminhoCompleto);

            $sql = "UPDATE produto set nome= ? , descricao = ? , preco = ? ,
            id_categoria= ?, filename = ? WHERE id = ?";


            $stm1 = $conn->prepare($sql);
            $stm1->bind_param("ssdssd", $nome, $descricao, $preco, $idcategoria, $nomeArquivo, $id);
            //executar o comando
        
            if($stm1->execute()){
               
                header("Location: index.php?cod=9");
            }else{
                header("Location: index.php?cod=10");
            }
            $stm1->close();
        
        }//não é imagem
        else{
            header("Location: index.php?cod=2");
        }

   }
   else if($nomeArquivoOld == $nomeArquivo || $_FILES["fileName"]["tmp_name"] == null){
            $sql = "UPDATE produto set nome= ? , descricao = ? , preco = ? ,
            id_categoria= ?, filename = ? WHERE id = ?";

            $stm2 = $conn->prepare($sql);
            $stm2->bind_param("ssdssd", $nome, $descricao, $preco, $idcategoria, $nomeArquivoOld, $id);
            if($stm2->execute()){
                header("Location: index.php?cod=9");
            }
            else{
                header("Location: index.php?cod=10");
            }

   } else{
    //não é imagem
    header("Location: index.php?cod=9");
   }
  $conn->close();



}


?>


