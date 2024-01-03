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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="includes/logica/scripts/script.js"></script>  
    <script src="includes/logica/scripts/barraAtributos.js"></script>  
    
    <!--CSS-->
    <link rel="stylesheet" href="css/estiloIndex.css">

</head>
<body>

<div class="containerIndex">    
    <div class="navindex"> 
        <div class="nav-item">  
        <img style=" object-fit: cover;
    object-position: center;
    width: 100px; 
    height: 100px; 
    border-radius: 50%; " src="imagens/logo/logo1.png" class="imagem-redonda-logo">
        </div>     
        <div class="nav-item">  
        </div>  
        <div class="nav-item">  
        </div>      
        <div class="nav-item">   
<?php

if (isset($_SESSION['logado'])) {
    $nome_usuario = $_SESSION['nome'];
    echo "<h6 style='color:white'>Olá $nome_usuario </h6>
   </div>
   <div class='nav-item substitui-conteudo'><a onclick='toggle()' href='#'><img class='menu-burger-index' src='imagens/icones/menu-burger-white.png'></a></div>";
} else {
    echo '<h2 style=" border-radius:10px; padding:5px;"> 
    <a class="linkClean" href="logar.php">Entrar/Cadastrar</a> </h2></div>';
        
        
}
?>
 
        

    </div>   
    

    <div class="grid-inicial-index">
       <div class="dropDown2">asd</div>
       <div style="background-color:transparent;" class="item-index2">
        </div>
        <div class="item-index2">
       <form>
            <label class='form-label' for='pesquisar'><h5>Pesquisar:</h5></label>
            <input class='form-control lupa' type='text' id='pesquisar' name='pesquisar'>
            <label for="frutas"><h5 style="margin:10px;">Escolha uma categoria:</h5></label>
             <select class='form-select' id="categoriasIndex" name="categoriasIndex">
                <option value="1">Pedreiro</option>
                <option value="3">Eletrecista</option>
                <option value="4">Jardineiro</option>
                <option value="5">Mecanico</option>
                <option value="6">Encanador</option>
                <option value="7">Borracheiro</option>
                <option value="8">Pintor</option>
                <option value="9">Limpeza Residencial</option>
                <option value="10">Técnico de Informática</option>
                <option value="11">Ar Condicionado e Aquecimento</option>
                <option value="13">Babá</option>
                <option value="14">Montador de Móveis</option>
            </select>
            <br>
            <input class='btn btn-primary pesquisar' type='button' name='pesquisa' id='pesquisa' value='Pesquisar'>
</form>
         </div>
        
        
        <div style="background-color:transparent;" class="item-index2">
        </div>
    

    </div>
</div>
<h1 style="text-align:center">Categorias</h1>
<div id="listagens-index">
    <div class="grid-categorias">
    <?php

    function imprime_categorias($conexao)
    {
        try{
            $query = $conexao->prepare("select * from tipo_servico");
            if($query->execute()) {
                $categorias = $query->fetchAll(PDO::FETCH_ASSOC); //coloca os dados num array $categorias
                if ($categorias) {  
                    foreach ($categorias as $descricao => $categoria) {
                        $nomeCategoria = $categoria['descricao'];
                        $imagem_fundo = $categoria['foto'];
                        $cod_servico = $categoria['cod'];
                        echo "<a href='categorias.php?categoria=$nomeCategoria' class='grid-categoria-items categoria' data-id='$cod_servico'  style='background-image: url(imagens/categorias/$imagem_fundo);'>
                <h2>
                    <span class='categoria' data-id='$cod_servico'>$nomeCategoria</span>
                </h2>
            </a>";
                    }
                } else {
                     return false;
                }
            } else {
                return false;
            }
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        } 
    
    }

    imprime_categorias($conexao);
    ?>
    </div>
</div>

<footer>
    <div class="container">
      <p style="margin-top:10px">&copy; arthurweymar@gmail.com</p>
    </div>
  </footer>



</body>
</html>
    
