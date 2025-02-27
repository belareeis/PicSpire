<?php

    if (isset($_POST['categorias'])) {
        $categoriasSelecionadas = $_POST['categorias'];
    } else {
        $categoriasSelecionadas = [];
    }

    $imagens = [];

    foreach ($categoriasSelecionadas as $categoria) {
        $diretorio = __DIR__ . "/imagens/" . $categoria;
        
        if (is_dir($diretorio)) {
            $arquivos = scandir($diretorio);
            
            foreach ($arquivos as $arquivo) {
                if ($arquivo !== "." && $arquivo !== "..") {
                    $imagens[] = "imagens/$categoria/$arquivo";
                }
            }
        }
    }
    
?>
