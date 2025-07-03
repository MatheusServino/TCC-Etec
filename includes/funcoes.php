<?php
    function imagens($arq) {
        $caminho = "Img/$arq";

        if (is_null($arq) || !file_exists($caminho)) {
            return "Img/indisponivel.png";
        } else {
            return $caminho;
        }
    }

    function voltar($i) {
        if ($i == "a") {
            $r = "<a href='autores.php'><span class='material-icons'>arrow_back</span></a>";    
        } else if ($i == "e") {
            $r = "<a href='editoras.php'><span class='material-icons'>arrow_back</span></a>";    
        } else if ($i == "g") {
            $r = "<a href='generos.php'><span class='material-icons'>arrow_back</span></a>";    
        } else {
            // CORREÇÃO AQUI: Usar Material Icon em vez de Bootstrap Icon
            $r = "<a href='index.php'><span class='material-icons'>arrow_back</span></a>"; // Ou 'home', 'login', dependendo da sua intenção
            // Se 'l' significa login, você pode querer um ícone diferente ou apenas texto
            // Por exemplo: $r = "<a href='login.php'><span class='material-icons'>login</span></a>";
        }

        return $r;
    }

    function msg_sucesso($m) {
        $resp = "<div class='sucesso'><span class='material-icons'>check_circle</span>$m</div>";
        return $resp;
    }

    function msg_erro($m) {
        $resp = "<div class='erro'><span class='material-icons'>error</span>$m</div>";
        return $resp;
    }
?>