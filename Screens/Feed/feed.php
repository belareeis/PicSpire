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