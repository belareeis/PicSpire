<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feed.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a7adcd534.js" crossorigin="anonymous"></script>
    <title>Feed</title>
</head>
<body>

    <header>

        <nav>
            <a href="http://localhost/PicSpire/Screens/Perfis/perfil.php">

                <span class="material-icons md-24">account_circle</span>
            </a>

                <span class="material-icons md-24" id="Criar">add_circle</span>

            <div class="pesquisa">

                <span class="material-icons md-24">search</span>
                
                <input type="text" placeholder="Encontre novos usuários!">
            </div>
        </nav>
        <hr>
        
    </header>
    
    <main>
        
        <!-- Popup Criar Pic -->

            <dialog id="popupDialog">

            <form action="feed_config.php" method="POST" enctype="multipart/form-data">
                
                <h1>Crie seus Pics +</h1>

                <div class="upload-area">

                    <label class="picture" for="picture__input">

                        <span class="picture__text">Faça upload</span>

                    </label>

                    <input type="file" id="picture__input" name="inputFile" accept="image/*" />

                    <div id = "preview-container">

                        <img id="preview-image" src="" alt="preview da imagem" style="display: none; width: 100%; height: auto; border-radius: 5px;" />

                    </div>

                </div>

                <input type="text" class="description-input" name="descricao" placeholder="Adicionar descrição">
    
                <button class="post-button" name="postar">Postar</button>
                <button class="close-button" id="closePopup">Fechar</button>
            </form>
                

            </dialog>
        
        <!-- Postagens-->    
     
        <div class="conteiner">
         
            <?php
            
                include('../../settings/config.php');

                // if ($conect->connect_error) {
                //     die("Erro na conexão com o banco de dados: " . $conect->connect_error);
                // }
                
                // echo "Conectado ao banco de dados com sucesso!";

                include('../../settings/config.php');

                $sql = "SELECT id_imagem, url, descricao FROM pics ORDER BY id_imagem DESC";
                $result = $conect->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card">';
                        echo '<img src="../../uploads/' . htmlspecialchars($row['url']) . '" alt="Imagem postada">';
                        echo '<p>' . htmlspecialchars($row['descricao']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Nenhuma postagem encontrada.</p>";
                }
            ?>
            
           
        </div>
        
    </main>
    
    <footer>
        
        <h1><strong>PicSpire</strong></h1>
        <p>Todos os direitos reservados</p>
        
        <span class="material-icons md-24">copyright</span>
        
        <p>2024</p>

    </footer>
    
    <script src="feed.js"></script>
</body>
</html>