<?php

session_start();
include_once("conexaoBd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $password = ($_POST["password"]);

    $sql = "INSERT INTO clientes (email, nome, PASSWORD) VALUES ('$email', '$nome', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao registrar utilizador: " . $conn->error;
    }
}
$conn->close();
?>