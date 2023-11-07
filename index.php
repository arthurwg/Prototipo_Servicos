<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();




if (isset($_SESSION['logado'])) {
    echo "Olá usuário";
} else {
    echo '<a href="logar.php">Entrar</a>';
        
        
}
?>
</body>
</html>
    
