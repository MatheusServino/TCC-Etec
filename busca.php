<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'bd_livros';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Termo da busca
$busca = isset($_GET['q']) ? trim($_GET['q']) : '';

$resultados = [];

if ($busca) {
    $sql = "
        SELECT
            livros.nome,
            livros.cod,
            livros.capa,
            livros.ano_publicacao,
            livros.nota,
            livros.sinopse,
            autores.nome AS autor_nome,
            editoras.editora AS editora_nome,
            generos.genero AS genero_nome
        FROM livros
        INNER JOIN autores ON livros.cod_autor = autores.cod
        INNER JOIN editoras ON livros.cod_editora = editoras.cod
        INNER JOIN generos ON livros.cod_genero = generos.cod
        WHERE livros.nome LIKE :busca OR autores.nome LIKE :busca
        ORDER BY livros.nome ASC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':busca', '%' . $busca . '%', PDO::PARAM_STR);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$reg = $busca;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Busca</title>
    <link rel="stylesheet" href="css/pagina_dos_livro.css">
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
        include_once "sidebar.php"
    ?>
    <div class="wrapper">
    <h1>Resultados para: <?= htmlspecialchars($busca) ?></h1>

    <?php if (!empty($resultados)): ?>
        <?php foreach ($resultados as $livro): ?>
            <!-- Livro -->
            <div class="container">
                <div class="base_container livro_flex">
                    <div class="livro_capa">
                        <img src="img/<?php echo htmlspecialchars($livro['capa']); ?>" alt="Capa de <?php echo htmlspecialchars($livro['nome']); ?>" class="capinha">
                    </div>

                    <div class="livro_info">
                        <h1><?php echo htmlspecialchars($livro['nome']); ?></h1>
                        <h2><?php echo htmlspecialchars($livro['autor_nome']); ?></h2>
                        <h5>Nota: <?php echo $livro['nota'] ?? "N/A"; ?></h5>   

                        <h4>Editora: <?php echo htmlspecialchars($livro['editora_nome']); ?></h4>
                        <h4>Gênero: <?php echo htmlspecialchars($livro['genero_nome']); ?></h4>
                        <h4>Ano: <?php echo htmlspecialchars($livro['ano_publicacao']); ?></h4>

                        <div class="sinopse-resumida">
                            <p><?php echo mb_strimwidth($livro['sinopse'], 0, 150, "..."); ?></p>
                        </div>

                        <div class="sinopse-completa" style="display:none;">
                            <p><?php echo nl2br(htmlspecialchars($livro['sinopse'])); ?></p>
                        </div>
<br>
                        <a href='detalhes.php?cod=<?= urlencode($livro['cod']) ?>' class='leia-mais'>Saiba Mais</a>
                        
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum livro encontrado.</p>
    <?php endif; ?>
    </div>

    <script>
        // Script para alternar sinopse
        document.querySelectorAll(".toggle-sinopse").forEach(button => {
            button.addEventListener("click", () => {
                const container = button.closest(".livro_info");
                const completa = container.querySelector(".sinopse-completa");
                const resumida = container.querySelector(".sinopse-resumida");

                if (completa.style.display === "none") {
                    completa.style.display = "block";
                    resumida.style.display = "none";
                    button.textContent = "Mostrar Menos";
                } else {
                    completa.style.display = "none";
                    resumida.style.display = "block";
                    button.textContent = "Leia Mais";
                }
            });
        });
    </script>
     <?php include_once "footer.php"; ?>
</body>
</html>
