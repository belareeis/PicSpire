<?php 
    session_start();
    include('../../settings/config.php');

    if(isset($_POST['postar'])){

        if (!isset($_FILES['inputFile']) || $_FILES['inputFile']['error'] != 0) {
            die("<script>alert('Erro no upload do arquivo. Certifique-se de selecionar uma imagem válida.'); window.location.href = 'feed.php';</script>");
        }

        $input_file = $_FILES['inputFile'];
        $descricao = $_POST['descricao'];
        
        // Verificar se o usuário está logado
        if (!isset($_SESSION['user_id'])) {
            die("<script>alert('Usuário não autenticado.'); window.location.href = 'login.php';</script>");
        }
        $id_usuario = $_SESSION['user_id'];

        // Capturar id_tag, se existir
        $id_tag = isset($_POST['id_tag']) && $_POST['id_tag'] !== "" ? intval($_POST['id_tag']) : null;

        if ($id_tag) {
            // Verificar se id_tag existe na tabela tag
            $sql_check = "SELECT COUNT(*) FROM tag WHERE id_tag = ?";
            $stmt_check = $conect->prepare($sql_check);
            $stmt_check->bind_param("i", $id_tag);
            $stmt_check->execute();
            $stmt_check->bind_result($tag_exists);
            $stmt_check->fetch();
            $stmt_check->close();

            if ($tag_exists == 0) {
                die("<script>alert('Erro: A tag selecionada não existe.'); window.location.href = 'feed.php';</script>");
            }
        }

        $conect->select_db($bd_name);

        $arquivo_novo = explode('.', $input_file['name']);
        if (count($arquivo_novo) < 2) {
            die("<script>alert('Nome de arquivo inválido.'); window.location.href = 'feed.php';</script>");
        }

        $extensao = strtolower(end($arquivo_novo));
        if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg'){
            die("<script>alert('Você só pode fazer upload de arquivos JPG, JPEG ou PNG'); window.location.href = 'feed.php';</script>");
        } else {
            // Criando diretório se necessário
            $upload_dir = '../../uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Criando um nome único
            $nome_arquivo = uniqid() . "." . $extensao;
            $caminho_completo = $upload_dir . $nome_arquivo;

            if (move_uploaded_file($input_file['tmp_name'], $caminho_completo)) {
                // Inserindo no banco
                if ($id_tag) {
                    $sql = "INSERT INTO pics (url, descricao, id_usuario, id_tag) VALUES (?, ?, ?, ?)";
                    $stmt = $conect->prepare($sql);
                    $stmt->bind_param("ssii", $nome_arquivo, $descricao, $id_usuario, $id_tag);
                } else {
                    $sql = "INSERT INTO pics (url, descricao, id_usuario, id_tag) VALUES (?, ?, ?, NULL)";
                    $stmt = $conect->prepare($sql);
                    $stmt->bind_param("ssi", $nome_arquivo, $descricao, $id_usuario);
                }

                if ($stmt->execute()) {
                    // Redirecionar o usuário de volta ao feed
                    header("Location: feed.php?post_sucesso=1");
                    exit();
                } else {
                    die("<script>alert('Erro ao salvar no banco de dados.'); window.location.href = 'feed.php';</script>");
                }

                $stmt->close();
            } else {
                die("<script>alert('Erro ao mover o arquivo.'); window.location.href = 'feed.php';</script>");
            }
        }
    }
?>
