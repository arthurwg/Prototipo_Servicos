<?php require "includes/logica/conecta.php";
     require "includes/logica/logica_pessoa.php";
?>
     
     <!--Scripts-->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="includes/logica/scripts/script.js"></script>  
    <script src="includes/logica/scripts/barraAtributos.js"></script>  
    
    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estiloIndex.css">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>


    <nav> 
        <div class="nav-item">  
        <img style=" object-fit: cover;
    object-position: center;
    width: 100px; 
    height: 100px; 
    border-radius: 50%; " src="imagens/logo/logo1.png" class="imagem-redonda-logo">
        </div>  
        <div class="nav-item">  
            <a href="index.php">
                <img src='imagens/icones/home2.png'>
            </a>
        </div>   
        <div class="nav-item">  
        
        </div>   
    
        <div class="nav-item">   
<?php

if (isset($_SESSION['logado'])) {
    $nome_usuario = $_SESSION['nome'];
    echo "<h6 style='color:white'>Olá $nome_usuario</h6>
    </div>
    <div class='nav-item menu-burger'> 
    <a href='#'><img  src='imagens/icones/menu-burger.png' class='menu-burger-click'></a>";
} else {
    echo '<h2 style=" border-radius:10px; padding:5px;"> 
    <a class="linkClean" href="logar.php">Entrar</a> </h2>';
    ?>
    </div>
    <div class="nav-item">
    <?php
    echo '<h2 style=" border-radius:10px; padding:5px;"> 
    <a class="linkClean" href="cadastro.html">Cadastrar</a></h2></div>';
    
        
}
?>
 

  
    </nav>