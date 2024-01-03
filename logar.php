<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="includes/logica/scripts/funcoesCadastro.js"></script>  

        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estiloLogin.css">
        <script src="includes/logica/scripts/script.js"></script>


<?php
session_start();
if(isset($_SESSION['msglogin'])) {
  echo "<script>
  function mensagem(){
  alert('Por favor, faça login para agendar.');
  }

  document.addEventListener('DOMContentLoaded',mensagem);
  </script>";

  unset($_SESSION['msglogin']);
};
?>

<body>
<div class="form-container">
    <h1> Login </h1>
         <section>
         <h6><a href="index.php">Voltar</a></h6>
         <form action="includes/logica/logica_pessoa.php" method="post">
          <p><label for="email"><h4>Email</h4> </label><input type="text" class="form-control" name="email" id="email"></p>
          <p><label for="senha"><h4>Senha</h4> </label><input type="password" class="form-control" name="senha" id="senha"></p>
            <input type="text" id="escolha" name="escolha" value="<?php echo $escolha; ?>" style="display:none;">
          <label for="opcao1">
          <p><input type="radio" class="form-check-input" id="usuario" name="escolha" value="usuario"> Usuario
          </label>
    <br>
          <label for="opcao2">
             <input type="radio" id="prestador" class="form-check-input" name="escolha" value="prestador"> Prestador</p>
          </label>
          <p style="text-align:center;"><button type="submit" class="btn btn-secondary" id="entrar" name="entrar" value="Entrar"> Entrar </button>  </p>      
        </form>
     
        </section>
        
        <h5><a href="cadastro.html">Cadastro</a></h5>
        <h5><a href="recuperacao.php">Esqueci a Senha</a></h5>
</div>
<body>