<?php

 //identificação para a chamada da classe
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        
        
 
function inserirPessoa($conexao,$array,$link,$tipoCadastro)
{
    if ($tipoCadastro == 'usuario') {
        try {
            $email = $array[2];
            
            mailer($email, $link);
            $query = $conexao->prepare(
                "insert into usuarios 
                (nome, cpf,  email, senha, cep, estado,cidade,bairro,celular )
                values (?, ?, ?, ?, ?, ?, ?, ?,?)"
            );

                $resultado = $query->execute($array);
            
                return $resultado;
            
           
        
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    } else if ($tipoCadastro == 'prestador') {
        try{
            $email = $array[2];
            
            mailer($email, $link);
            $query = $conexao->prepare(
                "insert into prestadores_servico 
                (nome,cpf,email,cnpj,nome_profissional, senha, cep, estado,cidade,bairro,celular) 
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)"
            );

            $resultado = $query->execute($array);
    
            return $resultado;
    
   

        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

}


function alterarPessoa($conexao, $array)
{
    try {
        $query = $conexao->prepare("update pessoa set nome= ?, email = ?, cpf= ?, senha= ? where codpessoa = ?");
        $resultado = $query->execute($array);   
        return $resultado;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function deletarPessoa($conexao, $array)
{
    try {
        $query = $conexao->prepare("delete from pessoa where codpessoa = ?");
        $resultado = $query->execute($array);   
         return $resultado;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

}
 
function listarPessoa($conexao)
{
    try {
        $query = $conexao->prepare("SELECT * FROM pessoa");      
        $query->execute();
        $pessoas = $query->fetchAll();
        return $pessoas;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  

}

function buscarPessoa($conexao,$array)
{
    try {
        $query = $conexao->prepare("select * from pessoa where codpessoa=?");
        if($query->execute($array)) {
            $pessoa = $query->fetch(); //coloca os dados num array $usuario
            return $pessoa;
        }
        else{
            return false;
        }
    }catch(PDOException $e) {
                 echo 'Error: ' . $e->getMessage();
    }  
}

function acessarPessoa($conexao,$array,$senha,$escolha)
{
    if ($escolha == "usuario") {
        try {
            $query = $conexao->prepare("select * from usuarios where email=?");
            if($query->execute($array)) {
                $pessoa = $query->fetch(); //coloca os dados num array $usuario
                if ($pessoa) {  
                    if (password_verify($senha, $pessoa['senha']) and $pessoa['confirmacao'] == 1) {
                        return $pessoa;
                    } else {
                        return false;
                    }
                } else
                {
                    return false;
                }
            } else {
                return false;
            }
        }catch(PDOException $e) {
              echo 'Error: ' . $e->getMessage();
        }  
    }

    if ($escolha == "prestador") {

        try {
            $query = $conexao->prepare("select * from prestadores_servico where email=?");
            if($query->execute($array)) {
                 $pessoa = $query->fetch(); //coloca os dados num array $usuario
                if ($pessoa) {  
                    if (password_verify($senha, $pessoa['senha']) and $pessoa['confirmacao'] == 1) {
                          return $pessoa;
                    } else {
                         return false;
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

}

function mailer($email,$mensagem)
{
        
    $texto = $mensagem;
    $assunto = "TesteLogado";
    $nome = "qualquer";
        
        
        include "./PHPMailer/src/PHPMailer.php";
        include "./PHPMailer/src/SMTP.php";
        include "./PHPMailer/src/Exception.php";
        $mail = new PHPMailer();
        
        
        $mail->isSMTP();
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ];
        
        $mail->Username = 'emailaulasdaw@gmail.com';
        $mail->Password = 'lmqqxfekfffatvxr';
        
        $mail->setFrom('emailaulasdaw@gmail.com', 'Adm Arthur');
        
           
        
        $mail->CharSet = "utf-8";
        
        $mail->Subject = $assunto;
        
        $mail->Body = $texto;
        
        $mail->isHTML(true);
        
        
        $mail->addAddress($email, "usuario");
        $mail->send();
        //header('location:../../home.php');
        
}
    
function verifica_hash($conexao,$array)
{
        
    try {
        $query = $conexao->prepare("select * from recuperacao where utilizador=? and confirmacao=?");
        if($query->execute($array)) {
            if($query->fetch()) {
                return true;
            }
        }
        else{
            return false;
        }
    }catch(PDOException $e) {
           echo 'Error: ' . $e->getMessage();
    }  
        
};
    
function nova_senha($conexao,$array)
{
        
     $sql = "UPDATE pessoa set senha = ? WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute($array);
        
    if($stmt) {
        return true;
    }else{
        return false;
    }
        
};
    
function alterarPerfil($conexao,$array)
{
         
     $sql = "UPDATE pessoa set senha = ? WHERE codpessoa = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute($array);
        
    if($stmt) {
            return true;
    }else{
             return false;
    }
};
    
?>
