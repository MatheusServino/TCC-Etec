<div class="main-login">
    <div class="left-login">
        <h1>CADA LOGIN <br> UMA NOVA HISTÓRIA.</h1>
        <img src="Img/reading-comics-animate.svg" class="left-login-image" alt="livro">
    </div>

    <div class="right-login">
        <!-- Link da seta para voltar para a página inicial -->
        <a href="index.php" class="back-arrow">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div class="card-login">
            <h1>Login</h1>  
            <form action="user_login.php" method="POST">
                <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Usuário" required>
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>

            <h6>Faça seu cadastro já!
                <a href="user_cadastro.php">Cadastrar-se</a>
            </h6>
        </div>
    </div>
</div>