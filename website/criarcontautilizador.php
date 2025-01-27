<?php include_once("top.php");?>

<div class="container">
        <section class="loginadmin">

            <div class="quadro-login">
                <?php
                    if(isset($_GET["erro"])){
                        echo "Erro de Login";
                    }
                ?>
                <h1>Crie uma Conta Nova</h1>
                <form name="login" method="post" action="processaCONTAnova.php">
                        <div class="form-group">
                            <label for="email">Novo Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Nova Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="center">
                            <button>Criar Conta</button>
                        </div>
                        <br>
                </form>
                <div class="center">
                          <a href = "login.php"> <button>Login</button></a> 
                        </div>
            </div>
        </section>
</div>