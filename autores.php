<?php
   require_once "includes/banco.php";
   require_once "includes/funcoes.php";
   require_once "includes/login.php";
   include_once "sidebar.php";  

   $q = "SELECT cod, nome, foto FROM autores ORDER BY nome";
   $busca = $banco->query($q);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link rel="stylesheet" href="css/autores.css"/>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="icon" href="img/logo/logo_cima.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body>

  <!-- CONTEÚDO PRINCIPAL -->
  <div class="wrapper">
    <main>
      <!-- LISTA DE AUTORES -->
      <section class="lista-autores">
        <div class="autores-container">
          <?php
            if ($busca && $busca->num_rows > 0) {
              while ($autor = $busca->fetch_object()) {
                $img = imagens($autor->foto);
                echo "<div class='autor-card'>";
                echo "<a href='pagina_dos_autores.php?cod={$autor->cod}'>";
                echo "<img src='$img' alt='Foto de $autor->nome' class='autor-foto'/>";
                echo "<p class='autor-nome'>$autor->nome</p>";
                echo "</a>";
                echo "</div>";
              }
            } else {
              echo "<p>Nenhum autor encontrado.</p>";
            }
          ?>
        </div>
      </section>
    </main>
  </div>

  <?php include_once "footer.php"; ?>
  <script src="script/carrossel.js"></script>

</body>
</html>
