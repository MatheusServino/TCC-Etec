<!-- CONTEÚDO PRINCIPAL -->
<div class="main-login">
        <!-- Link da seta para voltar para a página inicial -->
        <a href="index.php" class="back-arrow">
            <i class="bi bi-arrow-left"></i>
        </a>

        <!-- Página Cadastro -->
        <div class="card-login">
            
            <h1>CADASTRE-SE</h1>
            <form action="user_cadastro.php" method="POST">

                <div class="textfield">
                    <input type="usuario" id="usuario" name="usuario" placeholder="Usuário" required>
                </div>

                <div class="textfield">
                    <input type="text" id="nome" name="nome" placeholder="Nome" required>
                </div>

                <div class="textfield">
                    <input type="password" id="senha1" name="senha1" placeholder="Senha" required>
                </div>

                <div class="textfield">
                    <input type="password" id="senha2" name="senha2" placeholder="Confirmar Senha" required>
                </div>

                <button type="submit" class="btn-login">Cadastrar</button> <!-- Botão de Cadastro -->
            </form>

            <?php
            if (isset($_SESSION['erro_cadastro'])) {
                echo "<p style='color:red;'>".$_SESSION['erro_cadastro']."</p>";
                unset($_SESSION['erro_cadastro']);
            }

            if (isset($_SESSION['sucesso_cadastro'])) {
                echo "<p style='color:green;'>".$_SESSION['sucesso_cadastro']."</p>";
                unset($_SESSION['sucesso_cadastro']);
            }
            ?>

        </div>
</div>
