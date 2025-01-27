<?php 
include_once("../conexaoBd.php");

if(isset($_GET["id"]) && isset($_GET["filename"])){
        $id = $_GET["id"];
        $filename = $_GET["filename"];
        
        $sql = "DELETE FROM produto WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            unlink("../images/" . $filename);
            header("Location: index.php?cod=4");
        }else{
            header("Location: index.php?cod=5");
        }
}

?>