<!-- <?php include 'categorias.php'; ?> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sugestoes.css">
    <title>Sugestões de Conteúdo</title>
</head>
<body>

    
    <header>

        <h1>Escolha o que deseja ver no seu feed </h1>

    </header>

    <main>

        <div class="conteiner1">

            <button class="option" data-value="Futebol">Futebol</button>
            <button class="option" data-value="Jogos">Jogos</button>
            
        </div>
        
        <div class="conteiner2">
            
            <button class="option" data-value="Filmes">Filmes</button>
            <button class="option" data-value="Música">Música</button>
            <button class="option" data-value="Tecnologia">Tecnologia</button>

        </div>

        <div class="conteiner3">
            
            <button class="option" data-value="Moda">Moda</button>
            <button class="option" data-value="Viagens">Viagens</button>

        </div>


    </main>

    
    <footer>

        <button id="submit" onclick="location.href='http://localhost/PicSpire/Screens/Feed/feed.php'">Pronto!</button>

    </footer>

    <script src="sugestoes.js"></script>
    
</body>
</html>