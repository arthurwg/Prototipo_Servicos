<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="includes/logica/scripts/funcoesCadastro.js"></script>  

<h1> Login </h1>
         <section>
         <a href="index.php">Voltar</a>
         <form action="includes/logica/logica_pessoa.php" method="post">
          <p><label for="email">Email: </label><input type="text" name="email" id="email"></p>
          <p><label for="senha">Senha: </label><input type="password" name="senha" id="senha"></p>
            <input type="text" id="escolha" name="escolha" value="<?php echo $escolha; ?>" style="display:none;">
          <label for="opcao1">
            <input type="radio" id="usuario" name="escolha" value="usuario"> Usuario
          </label>
    <br>
          <label for="opcao2">
             <input type="radio" id="prestador" name="escolha" value="prestador"> Prestador
          </label>
          <p><button type="submit" id="entrar" name="entrar" value="Entrar"> Entrar </button>  </p>      
        </form>
     
        </section>
        
        <h3><a href="cadastro.html">Cadastro</a></h3>
        <h3><a href="recuperacao.php">Esqueci a Senha</a></h3>';