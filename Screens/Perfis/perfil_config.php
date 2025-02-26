<?php
    session_start();
    include('../../settings/config.php');

    // Verificar se o usuário está logado (supondo que você tenha uma sessão de login)
    if (!isset($_SESSION['user_id'])) {
        die("Usuário não está logado.");
    }

    $user_id = $_SESSION['user_id'];

    // Conectar ao banco de dados
    if (!isset($conect)) {
        die("Erro: Conexão com o banco de dados não encontrada.");
    }

    $conect->select_db($bd_name);

    // Consultar o nome do usuário
    $sql = "SELECT nome_usuario FROM usuario WHERE id_usuario = ?";
    $stmt = $conect->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a consulta.");
    }

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($nome_usuario);
    $stmt->fetch();
    $stmt->close();
    $conect->close();
?>
