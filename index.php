<?php
    // Importa o UsuarioController.php
    require_once 'controller/UsuarioController.php';
    // Importa o ImovelController.php
    require_once 'controller/ImovelController.php';
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imovel e usuario cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav>
        <a href="index.php?page=usuario&action=listar">Usuários</a>
        <a href="index.php?page=imovel&action=listar">=Imóveis</a>
    </nav>
    <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $action = $_GET['action'] ?? '';
           
            if ($page == 'usuario') {
                if ($action == 'editar') {
                    $usuario = call_user_func(array('UsuarioController', 'editar'), $_GET['id']);
                    require_once 'view/cadUsuario.php';
                }
                elseif ($action == 'listar') {
                    require_once 'view/listUsuario.php';
                }
                elseif ($action == 'excluir') {
                    call_user_func(array('UsuarioController', 'excluir'), $_GET['id']);
                    require_once 'view/listUsuario.php';
                }
                else {
                    require_once 'view/cadUsuario.php';
                }
            }
            elseif ($page == 'imovel') {
                if ($action == 'editar') {
                    $imovel = call_user_func(array('ImovelController', 'editar'), $_GET['id']);
                    require_once 'view/cadImovel.php';
                }
                elseif ($action == 'listar') {
                    require_once 'view/listImovel.php';
                }
                elseif ($action == 'excluir') {
                    call_user_func(array('ImovelController', 'excluir'), $_GET['id']);
                    require_once 'view/listImovel.php';
                }
                else {
                    require_once 'view/cadImovel.php';
                }
            }
        }
        else {
            require_once 'view/cadUsuario.php';
        }
    ?>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
