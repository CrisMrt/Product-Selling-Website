<?php include_once("top.php");?>

<div class="container">
        <section class="loginadmin">
            
            <div class="quadro-login">
                <?php
                    if(isset($_GET["erro"])){
                        echo "Erro de Login";
                    }
                ?>
                <h1>Faça Login</h1>
                <form name="login" method="post" action="processalogin.php">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="center">
                            <button>Login</button>
                        </div>
                        <br>
                </form>
                <div class="center">
                          <a href = "criarcontautilizador.php"> <button>Criar Conta</button></a> 
                        </div>

            </div>
        </section>
</div>