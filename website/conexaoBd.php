<?php 
$servername = "localhost";
$username = "cristiano";
$password = "minhapass";
$database = "lojavirtual";

//criar uma conexão á base de dados
$conn = new mysqli($servername, $username, $password, $database);

//verificar se a conexão é válida?
if($conn->connect_error){
    die("Erro na conexão:" . $conn->connect_error);
}




?>