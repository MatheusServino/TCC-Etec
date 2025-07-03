<?php
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";  

// Identificar o autor pelo GET
$cod = isset($_GET['cod']) ? intval($_GET['cod']) : 0;

// Buscar dados do autor
$sql = "SELECT * FROM editoras WHERE cod = $cod";
$result = $banco->query($sql);

if (!$result || $result->num_rows == 0) {
    echo "<p>editora não encontrada</p>";
    exit;
}

$autor = $result->fetch_assoc();
$foto = imagens($autor['foto']);


include_once "sidebar.php";
// Buscar os editoras do autor em dois grupos: primeiros 5 e o restante
$sqlLivrosPrimeiros = "SELECT l.cod, l.nome, l.capa
                       FROM livros l
                       WHERE l.cod_editora = ?
                       ORDER BY l.nome
                       LIMIT 6";

$sqlLivrosRestantes = "SELECT l.cod, l.nome, l.capa
                       FROM livros l
                       WHERE l.cod_editora = ?
                       ORDER BY l.nome
                       LIMIT 1000 OFFSET 6"; // OFFSET 5 para pegar após os primeiros 5

$stmtPrimeiros = $banco->prepare($sqlLivrosPrimeiros);
$stmtPrimeiros->bind_param("i", $cod);
$stmtPrimeiros->execute();
$resultPrimeiros = $stmtPrimeiros->get_result();

$stmtRestantes = $banco->prepare($sqlLivrosRestantes);
$stmtRestantes->bind_param("i", $cod);
$stmtRestantes->execute();
$resultRestantes = $stmtRestantes->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="css/pagina_dos_autores.css">
   <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="shortcut icon" href="Img/Logo/logo_cima.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($autor['editora']); ?></title>
</head>

<body>

  <div class="wrapper">
    <div class="container">
      <div class="base_container livro_flex">

        <!-- Imagem do autor -->
        <div class="livro_capa">
          <img src="<?php echo $foto; ?>" alt="<?php echo htmlspecialchars($autor['editora']); ?>" class="capinha">
        </div>

        <!-- Informações do autor -->
        <div class="livro_info">
          <h1><?php echo htmlspecialchars($autor['editora']); ?></h1>

          <div class="sinopse-completa">
            <p><?php echo $autor['descricao']; ?></p>
          </div>
        </div>

      </div>
    </div>
    <div class="livros-do-autor">
    <h2 class="titulo-centralizado">Livros desta editora</h2>

      <?php if ($resultPrimeiros && $resultPrimeiros->num_rows > 0) : ?>
        <div class="livros-container">
          <?php while ($reg = $resultPrimeiros->fetch_object()) :
            $t = imagens($reg->capa);
          ?>
            <div class="book-card">
              <img src="<?php echo $t; ?>" alt="Capa do livro <?php echo htmlspecialchars($reg->nome); ?>" class="book-cover" />
              <div class="conteudo">
                <h3 class="book-title"><?php echo htmlspecialchars($reg->nome); ?></h3>
                <a href="detalhes.php?cod=<?php echo $reg->cod; ?>" class="read-more">Leia mais</a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <p>Este autor ainda não tem livros cadastrados.</p>
      <?php endif; ?>

      <?php if ($resultRestantes && $resultRestantes->num_rows > 0) : ?>
        <div class="livros-container" style="margin-top: 30px;">
          <?php while ($reg = $resultRestantes->fetch_object()) :
            $t = imagens($reg->capa);
          ?>
            <div class="book-card">
              <img src="<?php echo $t; ?>" alt="Capa do livro <?php echo htmlspecialchars($reg->nome); ?>" class="book-cover" />
              <div class="conteudo">
                <h3 class="book-title"><?php echo htmlspecialchars($reg->nome); ?></h3>
                <a href="detalhes.php?cod=<?php echo $reg->cod; ?>" class="read-more">Leia mais</a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
   <br> <br> <br>
      </div>
 
        <?php include_once "footer.php"; ?>
  </div>


</body>

</html>
