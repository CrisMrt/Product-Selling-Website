<?php 
session_start();
include_once("modelodados.php");
include_once("conexaoBd.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Titulo</title>
    <link rel="stylesheet" href="style.css"  />
    <link rel="stylesheet" href="css.css"  />
</head>
<body>
    <header>
        <div class="top">
            <nav class = "container">
                <div class="logo">
                    <a href="index.php">Logo</a>
                </div>
                

                <div class="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="produtos.php">Produtos</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li class="user">
                       <?php if(isset($_SESSION["user"])){
                                    echo $_SESSION["user"];
                                }
                                else{
                                    ?><a href="login.php">Login User</a><?php
                                }?>
                        <li class="user">
                        <a href='admin/admin-login.php'>Login Admin</a>       </li>
                    
                        <li class="imagemcarrinho">
                        <?php if(isset($_SESSION["user"])){
                                    ?> <a href="carrinho.php"><img src="images/shopping-cart.png"/></a> <?php
                                } ?>
                           
                        </li> 
                        <?php if(isset($_SESSION["user"])){
                                    ?><a href='logout.php' class='login'>logout</a> <?php
                                } ?>
                    
                    </ul>
                </div>         
             </nav>
    </div>
        
</header>