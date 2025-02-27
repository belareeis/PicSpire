<?php
    session_start();
    include('../../settings/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if (!isset($conect)) {
            die("Erro: Conexão com o banco de dados não encontrada.");
        }

        $conect->select_db($bd_name);

        // Buscar usuário no banco
        $sql = "SELECT id_usuario, nome_usuario, senha FROM usuario WHERE nome_usuario = ?";
        $stmt = $conect->prepare($sql);

        if ($stmt === false) {
            die("Erro ao preparar a consulta.");
        }

        $stmt->bind_param("s", $usuario); // Associar o parâmetro de entrada

        $stmt->execute();
        $stmt->bind_result($id, $nome_usuario, $senha_bd);

        if ($stmt->fetch()) {
            if ($senha === $senha_bd) { // Comparação direta sem password_verify()
                $_SESSION['user_id'] = $id; // Armazenar o user_id na sessão
                $_SESSION['usuario'] = $nome_usuario;
                echo "<script>
                        alert('Login realizado com sucesso!');
                        window.location.href = 'http://localhost/PicSpire/Screens/Feed/feed.php';
                    </script>";
            } else {    
                echo "<script>alert('Senha incorreta!');</script>";
            }
        } else {
            echo "<script>alert('Usuário não encontrado!');</script>";
        }

        $stmt->close();
        $conect->close();
    }
?>
