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

<div class="containerIndex">    
    <div class="navindex"> 
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
    <a class="linkClean" href="logar.php">Entrar/Cadastrar</a> </h2>';
        
        
}
?>
 

    </div>   
    </div>

    <div class="grid-inicial-index">
        <div class="item-index2">
            <label for="pesquisar"><h3 style="background-color:gray">Pesquisar</h3</label>
        <input type="text" id="pesquisar" name="pesquisar">
    </div>
    <div class="item-index">
    <label for="frutas">Escolha uma categoria:</label>
<select id="categorias" name="categorias">
  <option value="pedreiro">Pedreiro</option>
  <option value="mecanico">Mecânico</option>
  <option value="pintor">Pintor</option>
  <option value="jardineiro">Jardineiro</option>
</select>
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





</body>
</html>
    
