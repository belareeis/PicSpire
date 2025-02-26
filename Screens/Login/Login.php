<?php
session_start();
include('../../settings/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha']; // Senha sem hash

    if (!isset($conect)) {
        die("Erro: Conexão com o banco de dados não encontrada.");
    }

    $conect->select_db($bd_name);

    // Buscar usuário no banco
    $sql = "SELECT nome_usuario, senha FROM usuario WHERE nome_usuario = ?";
    $stmt = $conect->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a consulta.");
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($nome_usuario, $senha_bd);

    if ($stmt->fetch()) {
        if ($senha === $senha_bd) { // Comparação direta sem password_verify()
            $_SESSION['usuario'] = $nome_usuario;
            echo "<script>
                    alert('Login realizado com sucesso!');
                    window.location.href = '/Screens/Feed/feed.html';
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

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="Login.css">
   <title>Login</title>
</head>
<body>
   
   <div class="container">

       <section class="form-section">

           <h1>Login</h1>

           <form action="Login.php" method="POST">

               <label for="username">Nome de usuário</label>
               <input type="text" id="username" name="usuario">
               
               <label for="password" >Senha</label>
               <input type="password" id="password" name="senha">
           
               <button type="submit" name="entrar">Entrar</button>

           </form>

           <p>Ainda não possui cadastro? <a href="/Screens/Cadastro/Cadastro.html">Cadastrar-se</a></p>

       </section>

       <section class="brand-section">

           <h1>PicSpire</h1>


       </section>

   </div>

   <script src="Login.js"></script>
</body>
</html>