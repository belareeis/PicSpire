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