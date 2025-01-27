<?php
session_start();
include("../conexaoBd.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Titulo</title>
    <link rel="stylesheet" href="admin-style.css" />
</head>

<body>
    <header>
        <div class="top">
            <nav class="container">
                <div class="logo">
                    Admin
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">Produtos</a></li>
                        <li><a href="../index.php">Loja</a></li>
                        <li class="user">
                            <?php  
                                if(isset($_SESSION["admin"])){
                                    echo $_SESSION["admin"];
                                }
                                else{
                                    ?><a href="admin-login.php">Login Admin</a><?php
                                }
                            ?>
                        </li>
                        <li class="user">
                        <a href="../login.php">Login User</a> 
                        </li>
                        <li class="user">
                        <?php if(isset($_SESSION["admin"])){
                                    ?><a href='criaradmin.php' class='login'>Criar Admin</a> <?php
                                } ?>
                        </li>
                        
                               
                       
                        </li>
                        <?php if(isset($_SESSION["admin"])){
                                    ?><a href='logout.php' class='login'>logout</a> <?php
                                } ?>
                            |
                    </ul>
                </div>
            </nav>
        </div>
    </header>