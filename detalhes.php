<?php
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";
include_once "sidebar.php";

date_default_timezone_set('America/Sao_Paulo');

$cod = isset($_GET['cod']) ? (int)$_GET['cod'] : 0;

// Busca do livro
$sql = "SELECT l.*,
               a.nome AS autor_nome,
               g.genero AS genero_nome,
               e.editora AS editora_nome
        FROM livros l
        LEFT JOIN autores a ON l.cod_autor = a.cod
        LEFT JOIN generos g ON l.cod_genero = g.cod
        LEFT JOIN editoras e ON l.cod_editora = e.cod
        WHERE l.cod = $cod";

$busca = $banco->query($sql);

if (!$busca || $busca->num_rows === 0) {
    echo "<div class='wrapper'><p>Livro não encontrado.</p></div>";
    exit;
}

$livro = $busca->fetch_object();
$capa = imagens($livro->capa);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title><?php echo htmlspecialchars($livro->nome); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/sidebar.css" />
  <link rel="stylesheet" href="css/pagina_dos_livro.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="shortcut icon" href="Img/Logo/logo_cima.png">
</head>
 
<body>

  <div class="wrapper">
    <!-- Livro -->
    <div class="container">
      <div class="base_container livro_flex">
       
        <div class="livro_capa">
          <img src="<?php echo $capa; ?>" alt="Capa de <?php echo htmlspecialchars($livro->nome); ?>" class="capinha" />
        </div>
 
        <div class="livro_info">
          <h1><?php echo htmlspecialchars($livro->nome); ?></h1>
          <h2><?php echo htmlspecialchars($livro->autor_nome); ?></h2>
          <h5>Nota: <?php echo $livro->nota ?? "N/A"; ?></h5>
 
          <div class="livro_botoes" data-livro-id="<?php echo $cod; ?>" data-usuario-id="<?php echo $user['cod']; ?>">
    <a href="#" class="btn-status btn-favoritar" data-status="favorito">
        <i class="bi bi-hearts"></i> Favoritar
    </a>
    <a href="#" class="btn-status btn-lendo" data-status="lendo">
        <i class="bi bi-book-half"></i> Lendo
    </a>
    <a href="#" class="btn-status btn-lido" data-status="lido">
        <i class="bi bi-check-circle-fill"></i> Lido
    </a>
</div>
 
          <h4>Editora: <?php echo htmlspecialchars($livro->editora_nome); ?></h4>
          <h4>Gênero: <?php echo htmlspecialchars($livro->genero_nome); ?></h4>
          <h4>Ano: <?php echo htmlspecialchars($livro->ano_publicacao); ?></h4>
 
          <div class="sinopse-resumida">
            <p><?php echo mb_strimwidth($livro->sinopse, 0, 150, "..."); ?></p>
          </div>
 
          <div class="sinopse-completa">
            <p><?php echo nl2br(htmlspecialchars($livro->sinopse)); ?></p>
          </div>
 
          <button class="toggle-sinopse">Leia Mais</button>
        </div>
 
        <div class="card">
          <div class="content">
            <div class="title"><?php echo htmlspecialchars($livro->nome); ?></div>
            <div class="price">R$<?php echo htmlspecialchars($livro->preco); ?></div>
          </div>
          <a href="<?php echo htmlspecialchars($livro->link); ?>" target="_blank">
            <button>compre agora</button>
          </a>      
        </div>
 
      </div>
    </div>
 
    <!-- JavaScript para sinopse -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.querySelector('.toggle-sinopse');
        const sinopseResumida = document.querySelector('.sinopse-resumida');
        const sinopseCompleta = document.querySelector('.sinopse-completa');
 
        toggleBtn.addEventListener('click', function () {
          sinopseCompleta.classList.toggle('mostrar');
          sinopseResumida.classList.toggle('esconder');
          toggleBtn.textContent = sinopseCompleta.classList.contains('mostrar') ? 'Mostrar Menos' : 'Leia Mais';
        });
      });
 

document.querySelectorAll('.btn-status').forEach(btn => {
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        const status = this.dataset.status;
        const livroId = this.closest('.livro_botoes').dataset.livroId;

        fetch('atualiza_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `livro_id=${livroId}&status=${status}`
        })
        .then(response => response.text())
        .then(data => alert(data));
    });
});
</script>

 
    <!-- Formulário e comentários -->
    <div class="comentarios-container">
 
      <h1 class="titulo-avaliacoes">Escreva uma avaliação</h1>
 <?php
 function tempoDecorrido($data) {
    if (empty($data) || $data == '0000-00-00 00:00:00') {
        return "(Data desconhecida)";
    }
    $agora = new DateTime();
    $dataComentario = new DateTime($data);
    $diferenca = $agora->diff($dataComentario);

    if ($diferenca->d > 0) return "(Há {$diferenca->d} dia" . ($diferenca->d > 1 ? "s" : "") . ")";
    if ($diferenca->h > 0) return "(Há {$diferenca->h} hora" . ($diferenca->h > 1 ? "s" : "") . ")";
    if ($diferenca->i > 0) return "(Há {$diferenca->i} minuto" . ($diferenca->i > 1 ? "s" : "") . ")";
    return "(Agora mesmo)";
}
    ?>
      <?php if (isset($_SESSION['msg'])): ?>
        <div class="msg-aviso"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
      <?php endif; ?>
 
      <form method="POST" action="processa.php" class="avaliacao">
        <input type="hidden" name="cod" value="<?php echo $cod; ?>" />
       
        <div class="estrelas">
          <?php for ($i = 5; $i >= 1; $i--): ?>
            <input type="radio" id="estrela<?php echo $i; ?>" name="estrela" value="<?php echo $i; ?>" />
            <label for="estrela<?php echo $i; ?>" title="<?php echo $i; ?> estrelas">&#9733;</label>
          <?php endfor; ?>
        </div>
 
        <textarea name="mensagem" rows="4" cols="30" placeholder="Digite o seu comentário..."></textarea><br /><br />
        <input type="submit" value="Cadastrar" />
      </form>
 
      <h1 class="titulo-avaliacoes">Avaliações dos Usuários</h1>
 
      <?php
      $sqlAvaliacao = "SELECT a.qtd_estrela, a.mensagem, a.created, u.nome
                       FROM avaliacoes a
                       LEFT JOIN usuarios u ON a.id_usuario = u.cod
                       WHERE a.id_livro = $cod
                       ORDER BY a.id DESC";
 
      $res = $banco->query($sqlAvaliacao);
 
      if ($res && $res->num_rows > 0):
        while ($row = $res->fetch_assoc()):
          $tempo = tempoDecorrido($row['created']);
          $nomeUsuario = $row['nome'] ?? 'Usuário Anônimo';
          $qtd_estrela = $row['qtd_estrela'];
      ?>
          <div class="caixa">
            <div class="user">
              <div class="conteudo">
                <div class="acima">
                  <span class="uusuario"><?php echo htmlspecialchars($nomeUsuario); ?></span>
                  <span class="horario"><?php echo $tempo; ?></span>
                  <div class="estrelas-avaliacao">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                      <?php if ($i <= $qtd_estrela): ?>
                        <i class="estrela-preenchida fa-solid fa-star"></i>
                      <?php else: ?>
                        <i class="estrela-vazia fa-solid fa-star"></i>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </div>
                  <p class="text_coment"><?php echo nl2br(htmlspecialchars($row['mensagem'])); ?></p>
                </div>
              </div>
            </div>
          </div><br />
      <?php
        endwhile;
      else:
      ?>
        <p class="mensagem-centro">Não há avaliações para este livro.</p>
      <?php endif; ?>
 
    </div>
 
    <?php include_once "footer.php"; ?>
  </div>
</body>
</html>