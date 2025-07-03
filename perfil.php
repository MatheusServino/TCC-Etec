<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RBooks</title>
 
  <!-- Estilos Externos -->
  <link rel="stylesheet" href="css/perfil.css" />
  <link rel="stylesheet" href="css/sidebar.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="shortcut icon" href="Img/Logo/logo_cima.png">
</head>
 
<body>
 
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
        ?>
 
  <?php include_once "sidebar.php"; ?>
 
  <div class="wrapper">
    <!-- Cabeçalho -->
    <header class="topo">
      <div class="titulo-acima-do-perfil esquerda">
        <span class="icon"><i class="bi bi-book-half"></i></span>
        <span class="txt-link">MEU PERFIL</span>
      </div>
      <div class="titulo-acima-do-perfil direita">
        <a href="user_logout.php" class="logout-link">
          <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
          <span class="txt-link">SAIR</span>
        </a>
      </div>
    </header>
 
    <main>
      <!-- Seção de Perfil -->
      <section class="container perfil">
        <img src="Img/avatar.avif" alt="Foto de perfil do usuário" />
        <div class="info">
        <span class="txt-link">
            Olá, <strong><?php echo htmlspecialchars($_SESSION['nome']); ?></strong>
          </span>
                    <?php
          $id_usuario = $_SESSION['cod'];

          $sql = "SELECT COUNT(*) AS total_favoritos 
                  FROM ListaLeitura 
                  WHERE favorito = TRUE AND id_usuario = ?";

          $stmt = $banco->prepare($sql);
          $stmt->bind_param("i", $id_usuario);
          $stmt->execute();
          $result = $stmt->get_result();
          $dado = $result->fetch_assoc();
          $total_favoritos = $dado['total_favoritos'];
          ?>
          <p class="info-livros">
            <a href="favoritos.php"> <i class="bi bi-hearts"></i>
            <strong><?php echo $total_favoritos; ?></strong> livros favoritos</a>        
          </p>


          <?php
          $id_usuario = $_SESSION['cod'];

          $sql = "SELECT COUNT(*) AS total_lido 
                  FROM ListaLeitura 
                  WHERE lido = TRUE AND id_usuario = ?";

          $stmt = $banco->prepare($sql);
          $stmt->bind_param("i", $id_usuario);
          $stmt->execute();
          $result = $stmt->get_result();
          $dado = $result->fetch_assoc();
          $total_lido = $dado['total_lido'];
          ?>
          <p class="info-livros">
            <a href="lido.php"> <i class="bi bi-check-circle-fill"></i>
            <strong><?php echo $total_lido; ?></strong> livros lido</a>
          </p>


          <?php
          $id_usuario = $_SESSION['cod'];

          $sql = "SELECT COUNT(*) AS total_lendo 
                  FROM ListaLeitura 
                  WHERE lendo = TRUE AND id_usuario = ?";

          $stmt = $banco->prepare($sql);
          $stmt->bind_param("i", $id_usuario);
          $stmt->execute();
          $result = $stmt->get_result();
          $dado = $result->fetch_assoc();
          $total_lendo = $dado['total_lendo'];
          ?>
          <p class="info-livros">
            <a href="lendo.php"> <i class="bi bi-book-half"></i></i>
            <strong><?php echo $total_lendo; ?></strong> livros lendo</a>
         
          </p>

        </div>
        <p class="frase">"Quem lê, vive mil vidas. Quem não lê, vive apenas uma." – George R. R. Martin</p>
      </section>
 
      <!-- Título das Recomendações -->
      <h2 class="titulo-livros">RECOMENDAÇÕES</h2>
 
      <section class="carrossel-livros">
  <button class="btn-carrossel left" onclick="scrollCarrosselEsquerdaLivros()">❮</button>
 
  <div class="carrossel-container" id="carrossel-livros-container">
  <?php
    $q = "SELECT l.cod, l.nome, l.capa, a.nome as autor
          FROM livros l
          INNER JOIN autores a ON l.cod_autor = a.cod
          ORDER BY RAND() LIMIT 10";
 
    $busca = $banco->query($q);
 
    if ($busca && $busca->num_rows > 0) {
        while ($reg = $busca->fetch_object()) {
            $t = imagens($reg->capa);
            echo "<div class='book-card'>";
            echo "<img src='$t' alt='Capa do livro $reg->nome' class='book-cover' />";
            echo "<div class='conteudo'>";
            echo "<h3 class='book-title'>$reg->nome</h3>";
            echo "<p class='book-author'>Autor: $reg->autor</p>";
            echo "<a href='detalhes.php?cod=$reg->cod' class='read-more'>Leia mais</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum livro encontrado no carrossel.</p>";
    }
  ?>
  </div>
 
  <button class="btn-carrossel right" onclick="scrollCarrosselDireitaLivros()">❯</button>
</section>
    </main>
 
    <?php include_once "footer.php"; ?>
  </div>
 
  <!-- Scripts -->
   <script>
  // Livros
  function scrollCarrosselEsquerdaLivros() {
    const container = document.getElementById('carrossel-livros-container');
    if (container) {
      container.scrollBy({ left: -300, behavior: 'smooth' });
    }
  }
 
  function scrollCarrosselDireitaLivros() {
    const container = document.getElementById('carrossel-livros-container');
    if (container) {
      container.scrollBy({ left: 300, behavior: 'smooth' });
    }
  }
  </script>
</body>
</html>
 