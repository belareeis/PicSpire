<?php
    session_start();
    include('../../settings/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha']; 

        if (!isset($conect)) {
            die("Erro: Conexão com o banco de dados não encontrada.");
        }

        $conect->select_db($bd_name);

        // Verificar se o e-mail já existe
        $check_email = $conect->prepare("SELECT email FROM usuario WHERE email = ?");
        if ($check_email === false) {
            die("Erro ao preparar consulta para verificar e-mail.");
        }
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $check_email->store_result();

        if ($check_email->num_rows > 0) {
            echo "<script>alert('Esse e-mail já foi cadastrado!');</script>";
        } else {
            // Inserindo o usuário com senha hash
            $sql = "INSERT INTO usuario (nome_usuario, email, senha) VALUES (?, ?, ?)";
            $stmt = $conect->prepare($sql);

            if ($stmt === false) {
                die("Erro ao preparar a consulta de inserção.");
            }

            $stmt->bind_param("sss", $usuario, $email, $senha);

            if ($stmt->execute()) {
                // Armazenar o user_id na sessão
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['usuario'] = $usuario;

                echo "<script> 
                        alert('Cadastro realizado com sucesso!');
                        window.location.href = 'http://localhost/PicSpire/Screens/Sugestões/sugestoes.html'; 
                    </script>";
            } else {
                echo "<script>alert('Erro ao cadastrar usuário: " . $stmt->error . "');</script>";
            }
        }

        $check_email->close();
        $stmt->close();
        $conect->close();
    }
?>
