<?php 
session_start();
include_once("../conexaoBd.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM administradores 
            WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION["admin"] = $row["nome"];
        $_SESSION["email"] = $row["email"];
        header("Location: index.php");
    } else {
        header("Location: admin-login.php?erro=1");
    }
    

}







?>