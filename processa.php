<?php
include_once 'includes/banco.php';
include_once 'includes/login.php';
date_default_timezone_set('America/Sao_Paulo');

// ID do livro
$cod = filter_input(INPUT_POST, 'cod', FILTER_VALIDATE_INT);

// --- 1. VERIFICAÇÃO INICIAL DE LOGIN ---
// Se $_SESSION['cod'] não está definido, o usuário realmente não está logado.
if (!isset($_SESSION['cod']) || empty($_SESSION['cod'])) { // Adicionado empty() para IDs vazios/nulos
    $_SESSION['msg'] = "<p style='color: red;'>Erro: É necessário estar logado para comentar.</p>";
    header("Location: detalhes.php?cod=$cod");
    exit;
}

// Verifica se uma estrela foi selecionada
if (empty($_POST['estrela'])) {
    $_SESSION['msg'] = "<p style='color: red;'>Erro: Necessário selecionar pelo menos 1 estrela.</p>";
    header("Location: detalhes.php?cod=$cod");
    exit;
}

// Dados do formulário
$estrela = filter_input(INPUT_POST, 'estrela', FILTER_VALIDATE_INT);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
$created = date("Y-m-d H:i:s");
$id_usuario = $_SESSION['cod']; // pega o ID do usuário logado

// --- 2. VERIFICAÇÃO SE O USUÁRIO (ID DA SESSÃO) EXISTE NO BANCO ---
// Isso é crucial para pegar o erro da chave estrangeira de forma antecipada.
$check_user_query = "SELECT COUNT(*) FROM usuarios WHERE cod = ?";
$stmt_user = $banco->prepare($check_user_query);

if ($stmt_user) {
    $stmt_user->bind_param("i", $id_usuario);
    $stmt_user->execute();
    $stmt_user->bind_result($user_count);
    $stmt_user->fetch();
    $stmt_user->close();

    if ($user_count == 0) {
        // Se o ID da sessão não corresponde a um usuário real no banco
        $_SESSION['msg'] = "<p style='color: red;'>Erro: Seu status de login é inválido. Por favor, <a href='login.php'>faça login novamente</a>.</p>";
        header("Location: detalhes.php?cod=$cod");
        exit;
    }
} else {
    // Erro na preparação da consulta de verificação de usuário (problema no banco)
    $_SESSION['msg'] = "<p style='color: red;'>Erro interno do sistema ao verificar seu login. Tente novamente mais tarde.</p>";
    header("Location: detalhes.php?cod=$cod");
    exit;
}

// --- 3. TENTA INSERIR A AVALIAÇÃO ---
$query = "INSERT INTO avaliacoes (id_livro, id_usuario, qtd_estrela, mensagem, created) VALUES (?, ?, ?, ?, ?)";
$stmt = $banco->prepare($query);

if ($stmt) {
    $stmt->bind_param("iiiss", $cod, $id_usuario, $estrela, $mensagem, $created);
    if ($stmt->execute()) {
        $_SESSION['msg'] = "<p style='color: green;'>Avaliação cadastrada com sucesso.</p>";
    } else {
        // Isso pegaria outros erros de execução da inserção, além da chave estrangeira
        // Se o erro de chave estrangeira ainda passar por aqui, significa que a verificação acima falhou.
        // É bom ter um fallback genérico.
        $_SESSION['msg'] = "<p style='color: red;'>Erro ao cadastrar avaliação. Se o problema persistir, tente fazer login novamente.</p>";
    }
    $stmt->close();
} else {
    // Erro na preparação da consulta de inserção (problema no banco)
    $_SESSION['msg'] = "<p style='color: red;'>Erro interno do sistema ao processar sua avaliação. Tente novamente mais tarde.</p>";
}

// Redireciona de volta para a página do livro
header("Location: detalhes.php?cod=$cod");
exit;
?>