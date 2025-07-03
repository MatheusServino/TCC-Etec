<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editoras</title>
    <link rel="stylesheet" href="css/editora.css" />
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
  <!-- LISTA DE EDITORAS -->
<section class="lista-editoras">
  <div class="editoras-container">
    <?php
      $q = "SELECT cod, editora, pais, foto FROM editoras ORDER BY editora";
      $busca = $banco->query($q);

      if ($busca && $busca->num_rows > 0) {
        while ($editora = $busca->fetch_object()) {
          $img = imagens($editora->foto);
          echo "<div class='editora-card'>";
          echo "<p><a href='pagina_das_editoras.php?cod={$editora->cod}'>" .  "</p>";
          echo "<img src='$img' alt='Foto da editora $editora->editora' class='editora-foto'/>";
          echo "<div class='editora-info'>";
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
</section>

      </main>
    </div>

    <?php
        include_once "footer.php"; 
    ?>

    <script src="script/carrossel.js"></script>

</body>
</html>