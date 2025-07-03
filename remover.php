<?php
require_once "includes/banco.php";
require_once "includes/login.php";

if (!is_logado()) {
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['cod'];

if (isset($_POST['cod_livro']) && isset($_POST['status'])) {
    $cod_livro = intval($_POST['cod_livro']);
    $status = $_POST['status']; // 'lido', 'lendo', 'favorito'

    // Verifica se o status passado é válido
    $status_permitidos = ['lido', 'lendo', 'favorito'];
    if (!in_array($status, $status_permitidos)) {
        $msg = "Status inválido.";
        $pagina = "lidos.php"; // fallback
    } else {
        // Monta a query para deletar o registro onde o status é TRUE para o usuário e livro
        $q = "DELETE FROM ListaLeitura WHERE id_usuario = ? AND id_livro = ? AND $status = TRUE";
        $stmt = $banco->prepare($q);
        $stmt->bind_param("ii", $id_usuario, $cod_livro);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {

        } else {

        }
        $stmt->close();

        // Define a página para redirecionar conforme status
        switch ($status) {
            case 'lido':
                $pagina = "lido.php";
                break;
            case 'lendo':
                $pagina = "lendo.php";
                break;
            case 'favorito':
                $pagina = "favoritos.php";
                break;
            default:
                $pagina = "index.php";
        }
    }
} else {
    $msg = "Dados inválidos.";
    $pagina = "index.php";
}

header("Location: $pagina?msg=" . urlencode($msg));
exit;
