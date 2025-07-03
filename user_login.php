<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Login de Usuário</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <link rel="shortcut icon" href="Img/Logo/logo_cima.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
       <!-- adicionar os includes -->
       <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
        ?>
        <div id="corpo">
                 <!-- Link da seta para voltar para a página inicial -->
        <a href="index.php" class="back-arrow">
            <i class="bi bi-arrow-left"></i>
        </a>
        <?php
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if (is_null($u) || is_null($s)) {
                require "user_login_form.php"; 
            } else {                  
                $q = "select usuario,nome,senha,cod from usuarios where usuario= '$u' limit 1";
                $busca = $banco->query($q);
                
                if (!$busca) {
                    echo msg_erro('Falha ao acessar o banco!');
                } else {
                    if ($busca->num_rows>0) {
                        $reg = $busca->fetch_object();

                        if (testarHash($s,$reg->senha)) {
                            echo msg_sucesso('Logado com sucesso');
                            $_SESSION['user'] = $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['cod'] = $reg->cod;
                        } else {
                            echo msg_erro('Senha inválida');
                        } 
                    } else {
                        echo msg_erro('Usuario não existe');
                    }                       
                }  
            }

        ?>
        </div> 
    </body>
</html>