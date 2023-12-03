<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <?php require "includes/logica/conecta.php";
     require "includes/logica/logica_pessoa.php";
        ?>
     
     <!--Scripts-->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="includes/logica/scripts/script.js"></script>  
    <script src="includes/logica/scripts/barraAtributos.js"></script>  
    
    <!--CSS-->
    <link rel="stylesheet" href="css/estiloIndex.css">

</head>
<body>


    <nav> 
        <div class="nav-item">  
            <h2>Serviços Já</h2>
        </div>     
        <div class="nav-item">  
        </div>   
    
        <div class="nav-item">   
<?php

if (isset($_SESSION['logado'])) {
    $nome_usuario = $_SESSION['nome'];
    echo "<h2 style='color:white'>Olá $nome_usuario<h2>";
} else {
    echo '<h2 style="background-color:gray; border-radius:10px; padding:5px;"> 
    <a class="linkClean" href="logar.php">Entrar</a> </h2>';
    ?>
    </div>
    <div class="nav-item">
    <?php
    echo '<h2 style="background-color:gray; border-radius:10px; padding:5px;"> 
    <a class="linkClean" href="cadastro.html">Cadastrar</a></h2>';
        
        
}
?>
 
</div>
  
    </nav>