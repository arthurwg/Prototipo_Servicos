<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="includes/logica/scripts/script.js"></script>  
<script src="includes/logica/scripts/viacep.js"></script>
<?php
include "cabecalho.php";
$categoria = $_GET['cat'];
$cod_prestador = $_GET['cod'];
if(isset($_SESSION['logado'])){
$cod_usuario = $_SESSION['codpessoa'];
}
$query = $conexao->prepare("select nome,prestadores_servico.cod_prestador,nome_profissional,cep,celular,
cidade,bairro,email,foto_perfil, estado
from prestadores_servico where
 prestadores_servico.cod_prestador = ?");

$query->bindParam(1, $cod_prestador, PDO::PARAM_STR); 
$query->execute();
$resultado = $query->fetch(PDO::FETCH_ASSOC);
$foto_perfil = $resultado['foto_perfil'];
$celular = $resultado['celular'];
$email = $resultado['email'];
$cidade = $resultado['cidade'];
$estado = $resultado['estado'];
$bairro = $resultado['bairro'];
$nomeProfissional = $resultado['nome_profissional'];

$query2 = $conexao->prepare("select descricao,foto from tipo_servico where cod = ?");

$query2->bindParam(1, $categoria, PDO::PARAM_STR); 
$query2->execute();
$resultado2 = $query2->fetch(PDO::FETCH_ASSOC);

$descricaoCategoria = $resultado2['descricao'];
$foto = $resultado2['foto'];
$fotoCategoria = "imagens/coloridas/$foto";


$query3 = $conexao->prepare("select usuarios.nome,usuarios.cod_usuario,servicos_realizados.cd_usuario, 
servicos_realizados.nota,servicos_realizados.comentario,servicos_realizados.cd_prestador, 
servicos_realizados.data_termino from servicos_realizados 
join usuarios on servicos_realizados.cd_usuario = usuarios.cod_usuario
where servicos_realizados.cd_prestador = $cod_prestador");
$query3->execute();
$resultado3 = $query3->fetchAll(PDO::FETCH_ASSOC);


$query4 = $conexao->prepare("select round(AVG(servicos_realizados.nota),1) as media
from servicos_realizados
join prestadores_servico on prestadores_servico.cod_prestador = servicos_realizados.cd_prestador
where servicos_realizados.cd_prestador = ?");

$query4->execute([$cod_prestador]);
$resultado4 = $query4->fetch(PDO::FETCH_ASSOC);

$media = $resultado4['media'];


echo "<body>
<div id='overlay'>
  <div id='form-container'>
    <h2>Informações sobre o Serviço</h2>
    <form id='agendamento'>
    <div class='row'>
    <div class='col-md-6'> 
      <label class='form-label' for='cep'>Cep:</label>
      
      <input class='form-control' type='text' id='cep' name='cep'>
      </div>
      <div class='col-md-6'> 
      <label class='form-label' for='cidade'>Cidade:</label>
      <input class='form-control' type='text' id='cidade' name='cidade'>
      </div>
</div>
      <br>
      <div class='row'>
      <div class='col-md-6'> 
      <label class='form-label' for='uf'>Estado:</label>
      <input class='form-control' type='text' id='uf' name='uf'>
      </div>
      
      <div class='col-md-6'> 
      <label class='form-label' for='bairro'>Bairro:</label>
      <input class='form-control' type='text' id='bairro' name='bairro'>
      </div>
      </div>
      <br>
      <div class='row'>
      <div class='col-md-6'> 
      <label class='form-label' for='rua'>Rua:</label>
      <input class='form-control' type='text' id='rua' name='rua'>
      </div>
      
      <div class='col-md-6'> 
      <label class='form-label' for='numero'>Numero:</label>
      <input class='form-control' type='text' id='numero' name='numero'>
      </div>
      </div>
      <br>
      <div class='row'>
      <div class='col-md-6'> 
      <label class='form-label' for='complemento'>Complemento:</label>
      <input class='form-control' type='text' id='complemento' name='complemento'>
      </div>
      
      <div class='col-md-6'> 
      <label class='form-label' for='descricao'>Descriçao do Serviço:</label>
      <input class='form-control' type='text' id='descricao' name='descricao'>
      </div>
      </div>

      <label class='form-label' for='data'>Data:</label>
      <input class='form-control' type='date' id='data' name='data'>

      <br>
";
if(isset($_SESSION['logado'])){
      echo "<input type='hidden' id='cod_prestador' name='cod_prestador' value='$cod_prestador'>";
}
   echo   "<input type='hidden' id='cod_usuario' name='cod_usuario' value='$cod_usuario'>

      <button class='btn btn-secondary' onclick='enviaFormulario(event)'>Enviar</button>
      <button class='btn btn-secondary' onclick='fecharFormulario(event)'>Fechar</button>
    </form>
  </div>
</div>
<div class='fundo-categoria' style='background-image:url($fotoCategoria);'>

  <div class='container-perfil-prestador'>

    <div class='itens-perfil-prestador'>
    </div>

    <div class='itens-perfil-prestador'>
    <img style='margin-top:10px; border:5px solid #2C2C2C;' class='imagem-redonda2' src='imagens/fotos_perfil_prestador/$foto_perfil'>
    </div>

    <div style='margin:0px' class='itens-perfil-prestador alinha-dropdown'>
    <div class='dropDown'>
      <table>
      <tr>
        
          <td><h4><a>Meu Perfil</a></h4></td>
        
     
      </tr>
      <tr>
        
          <td><h4><a href='listagem_solicitacoes.php'>Minhas Solicitações</h4><a/></td>
       
      </tr>
    
      </table>
    </div>
    </div>


    <div class='itens-perfil-prestador'>
    </div>

    <div  class='itens-perfil-prestador'>
    <h4 class='contraste'>
    $nomeProfissional
    <br>
    <h6 class='contraste' style='margin-top: 0px;'>
    $descricaoCategoria em $cidade/$estado
    <br>
    <h6 class='contraste' style='margin-top: 0px;'>
    Avaliação: $media
    </h6>
    </h4>
    </div>

    <div class='itens-perfil-prestador'>
    </div>
  </div>
</div>  

<div class='container-perfil-prestador3'>

    <div style='background-color:transparent' class='itens-perfil-prestador'>
    
    </div>

    <div style='background-color:white' class='itens-perfil-prestador canto-esquerdo'>
    <img src='imagens/icones/cell-phone.png' style='margin-top:10px'><br>
    <h5>Celular:</h5><h4>$celular</h4>
    </div>

    <div style='background-color:white' class='itens-perfil-prestador'>
    <img src='imagens/icones/email.png' style='margin-top:10px'><br>
    <h5>Email:</h5><h4>$email</h4>
    </div>

    <div style='background-color:white;' class='itens-perfil-prestador canto-direito'>
    <img src='imagens/icones/endereco.png' style='margin-top:10px'><br>
    <h5>Bairro:</h5><h4>$bairro</h4>
    </div>

    <div class='itens-perfil-prestador'>
    </div>
</div>




<div class='container-perfil-prestador'>
    <div class='itens-perfil-prestador'>
    </div>
    <div  border-radius:10px;' class='itens-perfil-prestador '>
    <a href='javascript:void(0);' class='bloqueado'>
    <img class='icone' style='margin-top: 50px;' src='imagens/icones/agendar.png'>
    </a>
    <br>
    <h4 style='margin-top: 0px;'>Agendar</h4>
    </div>
    <div class='itens-perfil-prestador'>
    </div>

</div>

<div class='container-perfil-prestador2'>
<h3>Descrição</h3>
<div class='itens-perfil-prestador2'>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et leo non libero tincidunt tempus. Suspendisse suscipit mi fermentum lectus commodo, a auctor eros pretium. Integer magna magna, bibendum a est vitae, lobortis placerat ligula. In hac habitasse platea dictumst. Maecenas mattis egestas ante a molestie. Morbi eget dapibus turpis, nec lobortis turpis. Nulla porta accumsan lobortis. Praesent cursus efficitur dictum. Ut facilisis nibh vel nulla auctor, cursus ultricies sapien consectetur. Mauris tristique, tellus non aliquam vulputate, libero diam tristique neque, in feugiat urna ipsum vel augue. Vestibulum ultricies molestie urna. Cras luctus dictum arcu sit amet mattis. Sed mattis, risus non rhoncus imperdiet, velit nunc tincidunt quam, vitae imperdiet nisi est eu enim.
</div>



</div>
<div class='container-perfil-prestador2'>
<h3>Avaliações</h3>
 ";
foreach($resultado3 as $avaliacoes){
  $nome = $avaliacoes['nome'];
  $nota = $avaliacoes['nota'];
  $comentario = $avaliacoes['comentario'];
  $data = $avaliacoes['data_termino'];

  echo "
  
  <div class='itens-perfil-prestador2'>
  <h6  style='font-weight: bold;'>$nome</h6>
  <p  style='margin-left: auto;'>$data</p>
  
  <h6>$comentario</h6>
  <br>
  <h5>$nota/5</h5>
  

  </div>
  ";
}
echo "</div>
<footer>
    <div class='container'>
      <p style='margin-top:10px'>&copy; arthurweymar@gmail.com</p>
    </div>
  </footer>
</body>";
?>

