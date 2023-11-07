<?php
  require_once('includes/logica/conecta.php');
  
  $email = $_GET['email'];
  
    $query = $conexao->prepare("update  usuarios set confirmacao = 1 where email = ?");

            $resultado = $query->execute([$email]);
            
    echo "Confirmacao realizada com sucesso." ;
    echo '<a href="index.php">Fazer Login</a>' ;


?>