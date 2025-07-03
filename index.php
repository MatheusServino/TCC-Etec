<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RBooks</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="shortcut icon" href="Img/Logo/logo_cima.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
   
</head>
<body>

    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";
        include_once "sidebar.php";
    ?>

    <!-- CONTEUDO PRINCIPAL -->
    <div class="wrapper">
 
    <!-- BANNER TOPO -->
    <section class="banner-topo">
        <div class="banner-conteudo">
            <img src="img/BANEER.jpg" alt="Banner principal" class="banner-imagem" />
        </div>
    </section>
 
 
<!-- CARROSSEL DOS LIVROS -->
 
<h2 class="titulo-livros" id="destaque">Destaque</h2>
 
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
 
<!-- CARROSSEL DE AUTORES DINÂMICO -->
<br><br><hr><br><br>
 
<section class="carrossel-autores">
  <button class="btn-carrossel left" onclick="scrollCarrosselEsquerdaAutores()">❮</button>
 
  <div class="carrossel-container" id="carrossel">
  <?php
    $q = "SELECT cod, nome, foto FROM autores ORDER BY nome";
    $busca = $banco->query($q);
 
    if ($busca && $busca->num_rows > 0) {
        while ($autor = $busca->fetch_object()) {
            $img = imagens($autor->foto);
            echo "<a href='pagina_dos_autores.php?cod={$autor->cod}'>";
            echo "<div class='autor-card'>";
            echo "<img src='$img' alt='Foto de $autor->nome' class='autor-foto'/>";
            echo "<p class='autor-nome'>$autor->nome</p>";
            echo "</div>";
            echo "</a>";
        }
    } else {
        echo "<p>Nenhum autor encontrado.</p>";
    }
  ?>
  </div>
 
  <button class="btn-carrossel right" onclick="scrollCarrosselDireitaAutores()">❯</button>
</section>

<!-- CARROSSEL DE editoras DINÂMICO -->
<br><br><hr><br><br>
 
<section class="carrossel-autores">
  <button class="btn-carrossel left" onclick="scrollCarrosselEsquerdaeditoras()">❮</button>
 
  <div class="carrossel-container" id="carrossel-editoras">
  <?php
    $q = "SELECT cod, editora, pais, foto FROM editoras ORDER BY editora";
    $busca = $banco->query($q);
 
    if ($busca && $busca->num_rows > 0) {
      while ($editora = $busca->fetch_object()) {
        $img = imagens($editora->foto);
        echo "<div class='autor-card'>";
        echo "<p><a href='pagina_das_editoras.php?cod={$editora->cod}'>" .  "</p>";
        echo "<img src='$img' alt='Foto da editora $editora->editora' class='autor-foto'/>";
        echo "<div class='autor-nome'>";
        echo "<strong>$editora->editora</strong><br><span>$editora->pais</span>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
      }
    } else {
      echo "<p>Nenhuma editora encontrada.</p>";
    }
  ?>
  </div>
 
  <button class="btn-carrossel right" onclick="scrollCarrosselDireitaeditoras()">❯</button>
</section>

<!-- JS Scroll funcional -->
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
 
  // Autores
  function scrollCarrosselEsquerdaAutores() {
    const container = document.getElementById('carrossel');
    if (container) {
      container.scrollBy({ left: -300, behavior: 'smooth' });
    }
  }
 
  function scrollCarrosselDireitaAutores() {
    const container = document.getElementById('carrossel');
    if (container) {
      container.scrollBy({ left: 300, behavior: 'smooth' });
    }
  }

  // editoras
  function scrollCarrosselEsquerdaeditoras() {
    const container = document.getElementById('carrossel-editoras');
    if (container) {
      container.scrollBy({ left: -300, behavior: 'smooth' });
    }
  }
 
  function scrollCarrosselDireitaeditoras() {
    const container = document.getElementById('carrossel-editoras');
    if (container) {
      container.scrollBy({ left: 300, behavior: 'smooth' });
    }
  }
</script>
 
 
    <?php include_once "footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js"integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+"crossorigin="anonymous"></script>
 
</body>
</html>