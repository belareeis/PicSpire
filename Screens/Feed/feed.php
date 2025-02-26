<?php

    include('../../settings/config.php');
 
    if(isset($_POST['postar'])){

        if (!isset($_FILES['inputFile']) || $_FILES['inputFile']['error'] != 0) {
            die("<script>alert('Erro no upload do arquivo. Certifique-se de selecionar uma imagem válida.');</script>");
        }

        $input_file = $_FILES['inputFile']; // Obtendo os detalhes do arquivo
        $descricao = $_POST['descricao'];

        $conect->select_db($bd_name);

        $arquivo_novo = explode('.', $input_file['name']);

        if (count($arquivo_novo) < 2) {
            die("<script>alert('Nome de arquivo inválido.');</script>");
        }

        $extensao = strtolower(end($arquivo_novo)); // Obtém a extensão do arquivo

        if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg'){
            die("<script>alert('Você só pode fazer upload de arquivos JPG, JPEG ou PNG');</script>");

        } else {
            // Definindo um diretório para salvar a imagem (verifique se existe)
            $upload_dir = '../../uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Criando um nome único para evitar conflitos
            $nome_arquivo = uniqid() . "." . $extensao;
            $caminho_completo = $upload_dir . $nome_arquivo;

            // Movendo o arquivo para a pasta de uploads
            if (move_uploaded_file($input_file['tmp_name'], $caminho_completo)) {
                // Salvando a URL no banco de dados
                $sql = "INSERT INTO pics (url, descricao) VALUES (?, ?)";
                $stmt = $conect->prepare($sql);
                $stmt->bind_param("ss", $nome_arquivo, $descricao);

                if ($stmt->execute()) {
                    echo "<script>alert('Imagem postada com sucesso!');</script>";
                } else {
                    echo "<script>alert('Erro ao salvar no banco de dados.');</script>";
                }

                $stmt->close();
            } else {
                echo "<script>alert('Erro ao mover o arquivo.');</script>";
            }
        }
    }

?>


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
            <a href="/Screens/Perfis/perfil.html">

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

            <form action="feed.php" method="POST" enctype="multipart/form-data">
                
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
         
            <div class="card" >

                <img src="https://i.pinimg.com/736x/81/83/1b/81831bb22ffd02085a19f6cfd3c44e37.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/e2/da/0d/e2da0d84c85982ef28d264e3b544833b.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/20/5f/6a/205f6aa2b997c9d500898a9b4ecf16f3.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/84/b9/40/84b9409f60987c0b681944b297e34ae5.jpg
                " alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/9e/94/20/9e94206d3ccf42b8409be158c5882af4.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/f5/4f/01/f54f01b11ef98d758669fab884d0c91b.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/65/e3/6e/65e36edc9782defa4771fefd310b8aaf.jpg
                " alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/02/65/01/026501bce5700996c54c1296fc676b67.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/c5/98/fa/c598fa4fc3648c92d15b6f4f67d289b2.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/29/55/4f/29554ffaef06f99bbc839425b4f71609.jpg
                " alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/99/2e/58/992e582a2d9b793895a79db066bfa070.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/57/ce/38/57ce38ec486bdb684698f0e30ec5c6a6.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/8b/d6/45/8bd645c2adac29dd88579c93ac544727.jpg
                " alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/2b/f1/48/2bf148cf27d0d7cf99d23f8c896edc31.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/bc/ba/77/bcba77c426cc120b69dca149d0ccbc0e.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/4f/00/62/4f0062cbfcceb4bf4c6b270fe2c9522d.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/64/27/b9/6427b9f15d74817f17bd6611f0e434b2.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/af/31/3b/af313b124620e5f8ff7dfc3183fed41d.jpg
                " alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/62/1f/c4/621fc414d2f665df105f05661ea6de72.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/f5/96/9f/f5969f1c35291259c673de40e96ac26f.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/89/76/06/897606008ac8534082182ba2e4ef1abe.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/e5/e9/4c/e5e94ce72284bbb653cd94cc333d729f.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="https://i.pinimg.com/736x/db/b1/4d/dbb14dd6c0eb93199c718db7ee467fc2.jpg" alt="">
             
                <p>teste</p>
            </div>
            
            <div class="card">

                <img src="	https://i.pinimg.com/736x/77/2d/10/772d106a80453bd49fdd84c7d2250b7a.jpg" alt="">
             
                <p>teste</p>
            </div>
            
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