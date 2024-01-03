<?php
session_start();
require_once 'includes/logica/conecta.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('location: http://localhost/Projeto_Integrado_table/index.php#');
    exit;
}
$usuario_tipo = $_SESSION['tipo'];
$pessoa_nome = $_SESSION['nome'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="includes/logica/scripts/script.js"></script>  
</head>
<body>
<input type="hidden" id="usuario_tipo" value="<?php echo"$usuario_tipo"?>">


<div id='overlayAvaliacao'>
  <div class='form-container'>
    <h2>Informações sobre o Serviço</h2>
    <form id='avaliacaoForm'>
    <input type="hidden" id="idHidden" name="idHidden">
      <div class='row'>
        <div class='col-md-6'> 
          <label class='form-label' for='nota'>Dê uma nota para o serviço:</label>
          <select class='form-control' id="nota" name="nota">
            <option value="1">1 - Ruim</option>
            <option value="2">2 - Razoaável</option>
            <option value="3">3 - Bom</option> 
            <option value="4">4 - Muito Bom</option> 
            <option value="5">5 - Excelente</option> 
          </select> 
        </div>
        <div class='col-md-6'> 
          <label class='form-label' for='valor'>Valor Pago:</label>
          <input class='form-control' type='text' id='valor' name='valor'>
        </div>
      </div>
      <br>
      <div class='row'>
        <div class='col-md-6'> 
          <label class='form-label' for='conclusao'>Conclusao:</label>
          <select class='form-control' type='text' id='conclusao' name='conclusao'>
            <option value="concluido">Concluido</option>
            <option value="interrompido">Interrompido</option>
            <option value="cancelado">Cancelado</option>
          </select> 
        </div>
        <div class='col-md-6'> 
          <label class='form-label' for='comentario'>Comentário:</label>
          <input class='form-control' type='text' id='comentario' name='comentario'>
        </div>
      </div>
      <div class='row'> 
      <div class='col-md-6'> 
      <select class='form-control' id="situacao" name="situacao">
            <option value="pago">1 - Pago</option>
            <option value="pendente">2 - Pendente</option>
          </select> 
      </div>
        <div class='col-md-6'> 
          <button class='btn btn-secondary' onclick='enviaAvaliacao(event)'>Enviar</button>
          <button class='btn btn-secondary' onclick='fecharAvaliacao(event)'>Fechar</button>
        </div>
      </div> 
    </form>
  </div>
</div>


<div class="container-fluid h-100" style="z-index: 1;">
    <div class="row h-100">
        <!-- Div que ocupa 1/4 da tela -->
        <div class="col-md-2 custom-div">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td><?php echo "<h4>$pessoa_nome</h4>" ?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h4><a data-status="pendente" id="Pendente" class="solicitacoes" href='#'>Solicitações Pendentes</a></h4></td>
                    </tr>
                    <tr>
                        <td><h4><a data-status="aceita" id="Aceita" class="solicitacoes" href='#'>Solicitações Aceitas</a></h4></td>
                    </tr>
                    <tr>
                        <td><h4><a data-status="recusada" id="Deletada" class="solicitacoes" href='#'>Solicitações Recusadas/Deletadas</a></h4></td>
                    </tr>
                    
                    <tr>
                        <td><h4><a href='index.php'>Home</a></h4></td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>

        <!-- Restante da tela (3/4) -->
        <div class="col-md-10" style="background-color:white">
            <table class="table">
                <thead>
                    <tr>
                        <th>Situação</th>
                        <th>Cidade</th>
                        <th>Rua</th>
                        <th>Número/Complemento</th>
                        <th>Data de Solicitação</th>
                        <th>Data de Agendamento</th>
                        <th>Descrição</th>
                        <th>Prestador</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody class='listagem-solicitacoes'>
                   
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>