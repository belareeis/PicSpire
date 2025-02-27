<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfil.css">
    <script src="https://kit.fontawesome.com/4a7adcd534.js" crossorigin="anonymous"></script>
    <title>Perfil do Usuário</title>
</head>
<body>

    <?php include 'perfil_config.php'; ?>
    
    <header>

        <div class="profile-picture">

            <div class="profile">

                <label for="image-upload" class="profile-image">

                    <img id="profile-img" src="/img/icon.png" alt="Imagem de Perfil">
                    <span class="edit-icon">+</span>

                </label>

                <div id="remove-image" class="remove-icon" title="Remover imagem">
                    <i class="fa-solid fa-trash"><strong></strong></i>
                </div>

                <input type="file" id="image-upload" accept="image/*" />

            </div>


            <h1 class="username"><?php echo htmlspecialchars($nome_usuario); ?></h1>
            
        </header>
        
    
    <div class="actions">

        <button id="btn_abrir_criar_pasta">Criar Pasta</button>
        <button id="Criar">Criar Pic</button>

    </div>

    <!-- Seção com pastas -->
     
    <!-- <div class="folders">

        <div id="screensList"></div>

        <!-- <span class="folder"><a href="/Screens/Pasta/Pasta.html"></a>Pasta</span>
        <span class="folder"><a href="/Screens/Pasta/Pasta.html"></a>Pasta</span>
        <span class="folder"><a href="/Screens/Pasta/Pasta.html"></a>Pasta</span>
        <span class="folder"><a href="/Screens/Pasta/Pasta.html"></a>Pasta</span> -->



    <!-- </div> -->

    <!-- Título de postagens -->

    <h2 class="posts-title">Todas as postagens</h2>

    <!-- Galeria de imagens -->

    <main>

        <!-- Pop-Up Criar Pasta -->

        <dialog id="pop_up_criar_pasta">

            <header id="header-pasta">
                
                <button id="btn_fechar_pasta">X</button>

            </header>

            <h1 id="title_criar_pasta">Criar Pasta</h1>

            <input type="text" name="nome_da_pasta" id="input_nome_da_pasta" placeholder="Nome da pasta">

            <button id="btn_criar_pasta">Criar</button>

        </dialog>

        <!-- Pop-Up Criar Postagem-->

        <dialog id="popupDialog">

            <form action="perfil.php" method="POST">

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

        <!-- Imagens -->

        <div class="gallery" id="gallery" action="perfil.php">
    
        <?php

            include('../../settings/config.php');

            $sql = "SELECT id_imagem, url, descricao FROM pics ORDER BY id_imagem DESC";
            $result = $conect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card" data-id="' . htmlspecialchars($row['id_imagem']) . '">';
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

    <script src="perfil.js"></script>
</body>
</html>
