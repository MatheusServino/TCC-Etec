<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lido</title>
<link rel="stylesheet" href="css/favoritos.css"/>
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
 
    if (!is_logado()) {
      echo "<p class='erro'>Você precisa estar logado para ver seus favoritos.</p>";
      exit;
    }
 
    $id_usuario = $_SESSION['cod']; // CORRETO: Pegamos o ID do usuário logado
    if (isset($_GET['msg'])) {
      echo "<p class='mensagem'>" . htmlspecialchars($_GET['msg']) . "</p>";
  }
  ?>
 
  <h1 class="titulo-livros">Meus Livros Lido</h1>
 
<div class="carrossel-container" id="carrossel-livros-container">
<?php

$q = "SELECT l.cod, l.nome, l.capa, a.nome AS autor
            FROM livros l
            INNER JOIN autores a ON l.cod_autor = a.cod
            INNER JOIN ListaLeitura ll ON ll.id_livro = l.cod
            WHERE ll.id_usuario = ? AND ll.lido = TRUE
            ORDER BY l.nome";
      
 
      $stmt = $banco->prepare($q);
      $stmt->bind_param("i", $id_usuario);
      $stmt->execute();
      $busca = $stmt->get_result();
 
      if ($busca && $busca->num_rows > 0) {
        while ($livro = $busca->fetch_object()) {
          $img = imagens($livro->capa);
          echo "<div class='book-card'>";
          echo "<img src='$img' alt='Capa de $livro->nome' class='book-cover' />";
          echo "<div class='conteudo'>";
          echo "<div class='book-title'>$livro->nome</div>";
          echo "<div class='book-author'>Autor: $livro->autor</div>";
          echo "<div class='acoes-botoes'>";
          echo "<a href='detalhes.php?cod=$livro->cod' class='read-more'>Ver detalhes</a>";
          echo "<form method='post' action='remover.php' onsubmit='return confirm(\"Tem certeza?\")'>";
          echo "<input type='hidden' name='cod_livro' value='$livro->cod'>";
          echo "<input type='hidden' name='status' value='lido'>";
          echo "<button type='submit' class='btn-lixeira'><i class='bi bi-trash'></i> Remover</button>";
          echo "</form>";
          echo "</div>"; 
          echo "</div></div>"; 
      }
      } else {
        echo "<p>Você ainda não adicionou nenhum livro aos favoritos.</p>";
      }
 
      $stmt->close();
    ?>
</div>
<br>
  <?php include_once "footer.php"; ?>
 
  </body>
</html>