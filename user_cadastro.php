<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/cadastro.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <link rel="shortcut icon" href="Img/Logo/logo_cima.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <!-- colocar os includes -->
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
        ?>
        <div id="corpo">
        <a href="index.php" class="back-arrow">
            <i class="bi bi-arrow-left"></i>
        </a>
        <?php                
                if (!isset($_POST['usuario'])) {
                    require "user_cadastro_form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;

                    if ($senha1 === $senha2) {
                        if (empty($usuario) || empty($nome) || empty($senha1) || empty($senha2)) {
                            echo msg_erro('Todos os dados são obrigatórios');
                        } else {
                            $senha = gerarHash($senha1);
                            $q = "INSERT INTO usuarios(usuario,nome,senha)VALUES('$usuario','$nome','$senha')";
                            
                            if ($banco->query($q)) {
                                echo msg_sucesso("Usuário $nome cadastrado com sucesso");
                            } else {
                                echo msg_erro("Não foi possivel criar o usuário $usuario");
                            }
                        }
                    } else {
                        echo msg_erro("Senhas não conferem. Repita o procedimento!");
                    }
                }
        ?>
        </div> 
    </body>
</html>