<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Logout</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="shortcut icon" href="Img/Logo/logo_cima.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
            // Inclua os arquivos PHP necessários para o banco de dados, funções e login
            require_once "includes/banco.php";
            require_once "includes/funcoes.php";
            require_once "includes/login.php";
        ?>
    
        <div id="corpo"> <?php
                // Chama a função de logout
                logout();
                // Exibe uma mensagem de sucesso
                echo msg_sucesso('Usuário desconectado com sucesso');
                // Exibe o link para voltar (assumindo que 'l' leva à página de login)
                echo voltar("l"); 
            ?>
        </div>
        
    </body>
</html>