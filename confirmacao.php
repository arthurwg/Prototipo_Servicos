<?php
  require_once('includes/logica/conecta.php');
  
  $email = $_GET['email'];

if($_GET['escolha'] == 'usuario') {
  
    $query = $conexao->prepare("update  usuarios set confirmacao = 1 where email = ?");

            $resultado = $query->execute([$email]);
            
    echo "Confirmacao realizada com sucesso." ;
    echo '<a href="index.php">Fazer Login</a>' ;
} else if ($_GET['escolha'] == 'prestador') {
    $query = $conexao->prepare("update  prestadores_servico set confirmacao = 1 where email = ?");

    $resultado = $query->execute([$email]);

    echo "Confirmacao realizada com sucesso." ;
    echo '<a href="index.php">Fazer Login</a>' ;
}


?>