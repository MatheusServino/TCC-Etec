<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros por Gênero</title>
    <link rel="stylesheet" href="css/generos.css"/>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
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
    <div class="wrapper">
        <div class="livros">
            <main>
                <?php
                    $q_generos = "SELECT cod, genero FROM generos";
                    $busca_generos = $banco->query($q_generos);

                    if ($busca_generos && $busca_generos->num_rows > 0) {
                        while ($genero = $busca_generos->fetch_object()) {
                            echo "<h2 class='titulo-livros'>$genero->genero</h2>";

                            $q_livros = "SELECT l.cod, l.nome, l.capa, a.nome as autor 
                                         FROM livros l 
                                         INNER JOIN autores a ON l.cod_autor = a.cod
                                         WHERE l.cod_genero = $genero->cod
                                         ORDER BY l.cod ";
                            $busca_livros = $banco->query($q_livros);

                            if ($busca_livros && $busca_livros->num_rows > 0) {
                                $containerId = "carrossel-livros-container-" . $genero->cod;

                                echo "<section class='carrossel-livros'>";
                                echo "<button class='btn-carrossel left' onclick='scrollCarrosselEsquerda(\"$containerId\")'>❮</button>";
                                echo "<div class='carrossel-container' id='$containerId'>";

                                while ($reg = $busca_livros->fetch_object()) {
                                    $t = imagens($reg->capa);
                                    echo "<div class='book-card'>";
                                    echo "<img src='$t' alt='Capa de $reg->nome' class='book-cover' />";
                                    echo "<div class='conteudo'>";
                                    echo "<h3 class='book-title'>$reg->nome</h3>";
                                    echo "<p class='book-author'>Autor: $reg->autor</p>";
                                    echo "<a href='detalhes.php?cod=$reg->cod' class='read-more'>Leia mais</a>";
                                    echo "</div>";
                                    echo "</div>";
                                }

                                echo "</div>";
                                echo "<button class='btn-carrossel right' onclick='scrollCarrosselDireita(\"$containerId\")'>❯</button>";
                                echo "</section>";
                            } else {
                                echo "<p>Nenhum livro encontrado para o gênero $genero->genero.</p>";
                            }
                        }
                    } else {
                        echo "<p>Nenhum gênero encontrado.</p>";
                    }
                ?>
            </main>
        </div>
    </div>

    <?php include_once "footer.php"; ?>

    <!-- SCRIPT PARA SCROLL DO CARROSSEL -->
    <script>
        function scrollCarrosselEsquerda(containerId) {
            const container = document.getElementById(containerId);
            if (container) {
                container.scrollBy({ left: -300, behavior: 'smooth' });
            }
        }

        function scrollCarrosselDireita(containerId) {
            const container = document.getElementById(containerId);
            if (container) {
                container.scrollBy({ left: 300, behavior: 'smooth' });
            }
        }
    </script>
</body>
</html>
