<?php
    include_once("../conexaoBd.php");

    if(isset($_POST["descricao"])){
        $descricao = $_POST["descricao"];
        
        $sqlDescricao = "SELECT * FROM categoriaproduto 
        WHERE descricao = '" . $descricao . "'";
        $result = $conn->query($sqlDescricao);
        if($result->num_rows == 0){
            $sql = "Insert INTO categoriaproduto(descricao) 
                    values (?)";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("s", $descricao);
                  if($stmt->execute()){
                    header("Location: index.php?cod=6");
                  }else{
                    header("Location: index.php?cod=7");
                  }
        }else{
            header("Location: index.php?cod=8"); //já existe categoria
        }
    }
    else{
        header("Location: index.php");
    }


?>