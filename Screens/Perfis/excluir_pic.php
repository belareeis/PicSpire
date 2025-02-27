<?php
    // Configuração de conexão com o banco
    include('../../settings/config.php');

    // Receber os dados da requisição
    $data = json_decode(file_get_contents('php://input'), true);
    $id_imagem = $data['id_imagem'] ?? null;

    if ($id_imagem) {
        // Buscar a URL do arquivo para excluir fisicamente
        $sql = "SELECT url FROM pics WHERE id_imagem = ?";
        $stmt = $conect->prepare($sql);
        $stmt->bind_param('i', $id_imagem);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $urlImagem = $row['url'];
            
            // Remover a imagem fisicamente
            $filePath = '../../uploads/' . $urlImagem;
            if (file_exists($filePath)) {
                unlink($filePath); // Deletar a imagem do diretório
            }
            
            // Deletar a imagem do banco de dados
            $sqlDelete = "DELETE FROM pics WHERE id_imagem = ?";
            $stmtDelete = $conect->prepare($sqlDelete);
            $stmtDelete->bind_param('i', $id_imagem);
            
            if ($stmtDelete->execute()) {
                // Retornar sucesso
                echo json_encode(['success' => true]);
            } else {
                // Retornar erro na exclusão
                echo json_encode(['success' => false, 'message' => 'Erro ao excluir imagem do banco.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Imagem não encontrada.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'ID da imagem não fornecido.']);
    }

    $conect->close();
?>
