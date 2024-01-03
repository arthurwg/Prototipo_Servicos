<?php
ini_set('upload_max_filesize', '5M'); // Define o limite de upload para 5 megabytes
session_start();
    require_once 'conecta.php';
    require_once 'funcoes_pessoa.php';



// CADASTRO PESSOA
if(isset($_POST['cadastrar'])) {
    $tipoCadastro = $_POST['tipoCadastro'];

    if($tipoCadastro == 'usuario') {   
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $bairro = $_POST['bairro'];
        $celular = $_POST['celular'];
        $numero_formatado = sprintf('(%s)%s-%s', substr($celular, 0, 2), substr($celular, 2, 5), substr($celular, 7, 4));
        $array = array($nome, $cpf, $email,  $senha, $cep, $estado, $cidade,$bairro, $celular);
        $chave = sha1(uniqid(mt_rand(), true));
        $link = "http://localhost/Projeto_Integrado_table/confirmacao.php?email=$email&chave=$chave&escolha=$tipoCadastro";
            
         //mail($email, 'Recuperação de password', 'Olá '.$email.', visite este link '.$link);

        inserirPessoa($conexao, $array, $link, $tipoCadastro);
        header('location:../../index.php');
    } else if ($tipoCadastro == 'prestador') {
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nomeProfissional = $_POST['nomeProfissional'];
        $cpf = $_POST['cpf'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $bairro = $_POST['bairro'];
        $celular = $_POST['celular'];
        $numero_formatado = sprintf('(%s)%s-%s', substr($celular, 0, 2), substr($celular, 2, 5), substr($celular, 7, 4));
        $cnpj = $_POST['cnpj'];
        $tiposervico = $_POST['opcao_servico'];

        

        
        $aux = 0;
        if (isset($_FILES['imagemPerfil']) && $_FILES['imagemPerfil']['error'] == 0) {
            $imagemPerfil = $_FILES['imagemPerfil'];
            
            

             // Verifica se o arquivo tem uma extensão válida
            $extensoesPermitidas = array('jpg', 'jpeg', 'png', 'gif','JPG');
            $extensao = pathinfo($imagemPerfil['name'], PATHINFO_EXTENSION);

            if (in_array($extensao, $extensoesPermitidas)) {
                 // A extensão do arquivo é válida
                $aux = 1;
                 // Diretório de destino para o upload (ajuste conforme necessário)
                 $diretorioDestino = 'C:\xampp\htdocs\Projeto_Integrado_table\imagens\fotos_perfil_prestador/';

                // Nome final do arquivo
                $foto = $imagemPerfil['name'];
                $info = pathinfo($foto);

                $foto = $info['filename'];
                $extensao = $info['extension'];


             
            } else {
                 // A extensão do arquivo não é permitida
                echo "Erro: A extensão do arquivo não é permitida.";
                $fotofinal = "imagempadrao.jpg";
            } 
        
           

        } else{
            $fotofinal = "imagempadrao.jpg";

            $array = array($nome, $cpf, $email,$cnpj,$nomeProfissional,$senha, $cep, $estado, $cidade,$bairro, $numero_formatado);
            $chave = sha1(uniqid(mt_rand(), true));
    
            $link = "http://localhost/Projeto_Integrado_table/confirmacao.php?email=$email&chave=$chave&escolha=$tipoCadastro";
            
            //mail($email, 'Recuperação de password', 'Olá '.$email.', visite este link '.$link);
    
            inserirPessoa($conexao, $array, $link, $tipoCadastro);

            $query = $conexao->prepare("select cod_prestador from prestadores_servico where email = ?");
            $query->bindParam(1, $email, PDO::PARAM_STR); //atribui $email ao marcado 1 (o único nesse caso);
            $query->execute();

            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            $codigo_prestador = $resultado['cod_prestador'];

           $codigo_tipo =  verifica_tipo($conexao,$tiposervico);

            vinculaTipo($conexao,$codigo_tipo,$codigo_prestador);
            header('location:../../index.php');
            exit;

        }

        
        $array = array($nome, $cpf, $email,$cnpj,$nomeProfissional,$senha, $cep, $estado, $cidade,$bairro, $numero_formatado);
        $chave = sha1(uniqid(mt_rand(), true));

        $link = "http://localhost/Projeto_Integrado_table/confirmacao.php?email=$email&chave=$chave&escolha=$tipoCadastro";
        
        //mail($email, 'Recuperação de password', 'Olá '.$email.', visite este link '.$link);

        inserirPessoa($conexao, $array, $link, $tipoCadastro);
        
        //verifica se a foto foi enviada com sucesso pelo form
        if ($aux == 1) {
            $query = $conexao->prepare("select cod_prestador from prestadores_servico where email = ?");
            $query->bindParam(1, $email, PDO::PARAM_STR); //atribui $email ao marcado 1 (o único nesse caso);
            $query->execute();

            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            $codigo_prestador = $resultado['cod_prestador'];

           $codigo_tipo =  verifica_tipo($conexao,$tiposervico);

            vinculaTipo($conexao,$codigo_tipo,$codigo_prestador);

            $fotofinal = $resultado['cod_prestador'] . "." . $extensao;

        }
        
         // Move o arquivo para o diretório de destino
        if ($aux == 1) {
         
            move_uploaded_file($imagemPerfil['tmp_name'], $diretorioDestino . $fotofinal);
            
           
        } 
            //insere no banco de dados o nome final da foto de perfil
            $query = $conexao->prepare("update prestadores_servico set foto_perfil = ? where email = ?");
            $array2 = array($fotofinal,$email);
            $query->execute($array2);
            header('location:../../index.php');
        
    }

}
// ENTRAR
if(isset($_POST['entrar'])) {
    $escolha = $_POST['escolha'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($email);
    $pessoa = acessarPessoa($conexao, $array, $senha, $escolha);
    if($pessoa) {
        
        $_SESSION['logado'] = true;
        if(isset($pessoa['cod_usuario'])){
        $_SESSION['codpessoa'] = $pessoa['cod_usuario'];
        } else if(isset($pessoa['cod_prestador'])){
            $_SESSION['codpessoa'] = $pessoa['cod_prestador'];
        }
        $_SESSION['nome'] = $pessoa['nome'];
        mailer($email, "Logou");
        header('location:../../index.php');
    }
    else{
        header('location:../../index.php');
    }
}
// SAIR
if(isset($_GET['sair'])) {
        session_destroy();
        header('location: http://localhost/Projeto_Integrado_table/index.php#');
}

// EDITAR PESSOA
if(isset($_POST['editar'])) {
    
        $codpessoa = $_POST['editar'];
        $array = array($codpessoa);
        $pessoa=buscarPessoa($conexao, $array);
        include_once '../../alterarPessoa.php';
}    
// ALTERAR PESSOA
if(isset($_GET['alterar'])) {
    
        $codpessoa = $_POST['codpessoa'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];    
        $array = array($nome, $email, $cpf, $senha, $codpessoa);
        alterarPessoa($conexao, $array);
        header('location:../../home.php');
}
// DELETAR PESSOA
if(isset($_POST['deletar'])) {
    $codpessoa = $_POST['deletar'];
    $array=array($codpessoa);
    deletarPessoa($conexao, $array);

    header('Location:../../home.php');
}
    
    // altera_senha
if(isset($_POST['troca_senha'])) {
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $array = array($senha,$email);
        
    if(nova_senha($conexao, $array)) {
         header('Location:../../home.php');
    }else{
        header('Location:../../home.php');
    }
        
       

        
}
    
    // ALTERAR PERFIL
if(isset($_POST['alteraPerfil'])) {
           
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 
        $codpessoa = $_SESSION['codpessoa'];
        $array = array($senha, $codpessoa);
            
    if(alterarPerfil($conexao, $array)) {
        header('location:../../home.php');
    }else{
        header('location:../../alterarPerfil.php');
    }
                
            
}
?>
