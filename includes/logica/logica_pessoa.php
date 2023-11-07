<?php
session_start();
    require_once 'conecta.php';
    require_once 'funcoes_pessoa.php';

// CADASTRO PESSOA
if(isset($_POST['cadastrar'])) {

       
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $celular = $_POST['celular'];
    $array = array($nome, $cpf, $email,  $senha, $cep, $estado, $cidade, $celular);
    $chave = sha1(uniqid(mt_rand(), true));
        $link = "http://localhost/Projeto_Integrado/confirmacao.php?email=$email&chave=$chave";
            
         //mail($email, 'Recuperação de password', 'Olá '.$email.', visite este link '.$link);

    inserirPessoa($conexao, $array, $link);
    header('location:../../index.php');
}
// ENTRAR
if(isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($email);
    $pessoa = acessarPessoa($conexao, $array, $senha);
    if($pessoa) {
            
        $_SESSION['logado'] = true;
        $_SESSION['codpessoa'] = $pessoa['cod_usuario'];
        $_SESSION['nome'] = $pessoa['nome'];
        mailer($email,"Logou");
        header('location:../../index.php');
    }
    else{
        header('location:../../index.php');
    }
}
// SAIR
if(isset($_POST['sair'])) {
        session_destroy();
        header('location:../../index.php');
}

// EDITAR PESSOA
if(isset($_POST['editar'])) {
    
        $codpessoa = $_POST['editar'];
        $array = array($codpessoa);
        $pessoa=buscarPessoa($conexao, $array);
        include_once '../../alterarPessoa.php';
}    
// ALTERAR PESSOA
if(isset($_POST['alterar'])) {
    
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
