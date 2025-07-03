<?php
require_once "includes/banco.php";
session_start();

if (!isset($_SESSION['cod']) || empty($_SESSION['cod'])) {
    echo "Usuário não autenticado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_usuario = $_SESSION['cod'];
    $id_livro = (int) $_POST['livro_id'];
    $status = $_POST['status']; // 'favorito', 'lendo', 'lido'

    // Verifica se já existe registro
    $sql_verifica = "SELECT * FROM ListaLeitura WHERE id_usuario = ? AND id_livro = ?";
    $stmt = $banco->prepare($sql_verifica);
    $stmt->bind_param("ii", $id_usuario, $id_livro);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Atualiza o status específico
        $sql = "UPDATE ListaLeitura SET $status = NOT $status WHERE id_usuario = ? AND id_livro = ?";
        $stmt = $banco->prepare($sql);
        $stmt->bind_param("ii", $id_usuario, $id_livro);
    } else {
        // Cria novo registro com o status clicado como TRUE
        $sql = "INSERT INTO ListaLeitura (id_usuario, id_livro, $status) VALUES (?, ?, TRUE)";
        $stmt = $banco->prepare($sql);
        $stmt->bind_param("ii", $id_usuario, $id_livro);
    }

    if ($stmt->execute()) {
        echo "Status atualizado!";
    } else {
        echo "Erro ao atualizar.";
    }

    $stmt->close();
}
?>
