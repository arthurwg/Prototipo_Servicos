<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Confirmação de Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Adicione o link para o CSS personalizado se tiver um -->
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header bg-success text-white text-center">
                <h5>Confirmação de Cadastro</h5>
            </div>
            <div class="card-body">
                <?php
                    require_once('includes/logica/conecta.php');

                    $email = $_GET['email'];

                    if ($_GET['escolha'] == 'usuario') {
                        $query = $conexao->prepare("UPDATE usuarios SET confirmacao = 1 WHERE email = ?");
                        $resultado = $query->execute([$email]);

                        echo "<p class='text-success'>Confirmação realizada com sucesso.</p>";
                        echo '<a href="index.php" class="btn btn-primary btn-block">Fazer Login</a>';
                    } else if ($_GET['escolha'] == 'prestador') {
                        $query = $conexao->prepare("UPDATE prestadores_servico SET confirmacao = 1 WHERE email = ?");
                        $resultado = $query->execute([$email]);

                        echo "<p class='text-success'>Confirmação realizada com sucesso.</p>";
                        echo '<a href="http://localhost/Projeto_Integrado_table/index.php#" class="btn btn-primary btn-block">Fazer Login</a>';
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Adicione os scripts do Bootstrap no final do corpo -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Adicione o link para o seu script personalizado se tiver um -->
</body>
</html>