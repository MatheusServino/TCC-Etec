<!-- BARRA LATERAL -->
  <nav class="menu-lateral">
    <div class="logo">
      <img src="Img/Logo/logo de cima.png" alt="logo">
    </div>

    <ul>
      <!-- BARRA DE PESQUISA -->
      <li class="search-box">
        <form action="busca.php" method="GET">
          <input type="text" name="q" placeholder="Pesquisar...">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form>
      </li>
      <hr>
      <li class="item-menu">
        <a href="index.php">
          <span class="icon"><i class="bi bi-house-fill"></i></span>
          <span class="txt-link">INÍCIO</span>
        </a>
      </li>
      <hr>
      <?php
        if (empty($_SESSION['user'])) {
      ?>
      <?php
        } else {
      ?>
      <li class="item-menu">
        <a href="biblioteca.php">
          <span class="icon"><i class="bi bi-box-seam-fill"></i></span>
          <span class="txt-link">BIBLIOTECA</span>
        </a>
      </li>
        <hr>
      <?php
    }
  ?>
    
      <li class="item-menu">
        <a href="generos.php">
          <span class="icon"><i class="bi bi-book-half"></i></span>
          <span class="txt-link">GÊNEROS</span>
        </a>
      </li>
      <hr>
      <li class="item-menu">
        <a href="autores.php">
          <span class="icon"><i class="bi bi-layout-text-sidebar-reverse"></i></span>
          <span class="txt-link">AUTORES</span>
        </a>
      </li>
      <hr>
      <li class="item-menu">
        <a href="editoras.php">
          <span class="icon"><i class="bi bi-pencil-square"></i></span>
          <span class="txt-link">EDITORAS</span>
        </a>
      </li>
      <hr>
    </ul>
    
    <!-- LOGIN FORA DA <ul> -->
   <div class="item-menu item-login">
  <?php
    if (empty($_SESSION['user'])) {
  ?>
    <a href="user_login.php">
      <span class="icon"><i class="bi bi-person-plus-fill"></i></span>
      <span class="txt-link">LOGIN</span>
    </a>
  <?php
    } else {
  ?>
    <a href="perfil.php">
      <span class="icon"><i class="bi bi-person-circle"></i></span>
      <span class="txt-link">
        Olá, <strong><?php echo htmlspecialchars($_SESSION['nome']); ?></strong>
      </span>
    </a>
  <?php
    }
  ?>
</div>
  </nav>
