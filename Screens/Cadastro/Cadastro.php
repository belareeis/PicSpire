<?php
    include('../../settings/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (!isset($conect)) {
            die("Erro: Conexão com o banco de dados não encontrada.");
        }

        $conect->select_db($bd_name);

        $check_email = $conect->prepare("SELECT email FROM usuario WHERE email = ?");

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (nome_usuario, senha) VALUES (?, ?)";
        $stmt = $conect->prepare($sql);
        $stmt->bind_param("ss", $usuario, $senha_hash);

        if ($check_email === false) {
            die("Erro ao preparar consulta para verificar e-mail.");
        }
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $check_email->store_result();

        if ($check_email->num_rows > 0) {
            echo "<script>alert('Esse e-mail já foi cadastrado!');</script>";
        } else {
            
            $sql = "INSERT INTO usuario (nome_usuario, email, senha) VALUES (?, ?, ?)";
            $stmt = $conect->prepare($sql);

            if ($stmt === false) {
                die("Erro ao preparar a consulta de inserção.");
            }

           $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

           $sql = "INSERT INTO usuario (nome_usuario, email, senha) VALUES (?, ?, ?)";
           $stmt = $conect->prepare($sql);
           $stmt->bind_param("sss", $usuario, $email, $senha_hash);
   
           if ($stmt->execute()) {
               echo "<script> 
                       alert('Cadastro realizado com sucesso!');
                       window.location.href = '../Feed/feed.html'; 
                   </script>";
            } else {
                echo "<script>alert('Erro ao cadastrar usuário: " . $stmt->error . "');</script>";
            }
        }

        if (isset($check_email)) {
            $check_email->close();
        }
        if (isset($stmt)) {
            $stmt->close();
        }
        $conect->close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="Cadastro.css">
   <title>Cadastro</title>
</head>
<body>

    <div class="container">

        <section class="form-section">

            <h1>Cadastro</h1>

            <form id="cadastroForm" method="POST" action="Cadastro.php">

                <label for="username" id="label_nome">Nome de usuário</label>
                <input type="text" name="usuario" id="username" required>
                
                <label for="email" id="label_email">E-mail</label>
                <input type="email" name="email" id="email" required>

                <label for="password" id="label_senha">Senha</label>
                <input type="password" name="senha" id="password" required>

                <button type="submit" id="btn_cadastrar" name="cadastrar">Cadastrar-se</button>

            </form>

        </section>

        <section class="brand-section">

            <h1>PicSpire</h1>

        </section>

    </div>

    <script src="Cadastro.js"></script>

</body>
</html>
