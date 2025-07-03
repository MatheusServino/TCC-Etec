<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>biblioteca</title>
    <link rel="stylesheet" href="css/biblioteca.css"/>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="Img/Logo/logo_cima.png">
</head>
<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
        include_once "sidebar.php";
    ?>

   <!-- CONTEÚDO PRINCIPAL -->
    <div class="container">
        
        <a href="lido.php">
        <div class="box">
            <i class="fas fa-book-open"></i>
            <p>Lido</p>
        </div>
        </a>
        
        <a href="lendo.php" >
        <div class="box">
            <i class="fas fa-book"></i>
            <p><b>Lendo</b></p>
        </div>
        </a>

        <a href="favoritos.php" >
        <div class="box">
            <i class="fas fa-heart"></i>
            <p><b>Favoritos</b></p>
        </div>
        </a>
    </div>

</body>
</html>