<?php

header('content-type: application/json');
require_once "includes/logica/conecta.php";
session_start();
$cod_pessoa = $_SESSION['codpessoa'];
$tipo = $_SESSION['tipo'];
$status =  $_GET['status'];

if($status === "pendente") {

    if($tipo === 'usuario') {
        $query = $conexao->prepare(
            "select solicitacoes.id_solicitacao, solicitacoes.status ,solicitacoes.cidade, solicitacoes.rua, solicitacoes.numero ,solicitacoes.DataRegistro,solicitacoes.data_agendamento ,solicitacoes.descricao,solicitacoes.complemento,tipo_servico.descricao as tipo_servico,solicitacoes.id_solicitacao
    from solicitacoes
    join prestadores_servico on solicitacoes.cod_prestador = prestadores_servico.cod_prestador
    JOIN realiza_tipo on realiza_tipo.cod_prestador = prestadores_servico.cod_prestador
    join tipo_servico on tipo_servico.cod = realiza_tipo.cod_tipo
    where solicitacoes.status = 'pendente' and solicitacoes.cod_usuario = $cod_pessoa"
        );

        if($query->execute()) {
            $resultado = $query->fetchALL(PDO::FETCH_ASSOC);
        
            $jsonResultado = json_encode($resultado);
        
            echo $jsonResultado;
        } else {
            echo json_encode(['erro' => 'Erro na execução da consulta.']);
        }
    }else{

        if($tipo === 'prestador') {
            $query = $conexao->prepare(
                "select solicitacoes.id_solicitacao, solicitacoes.status ,solicitacoes.cidade, solicitacoes.rua, solicitacoes.numero ,solicitacoes.DataRegistro,solicitacoes.data_agendamento ,solicitacoes.complemento,solicitacoes.descricao ,tipo_servico.descricao as tipo_servico,solicitacoes.id_solicitacao
            from solicitacoes
            join prestadores_servico on solicitacoes.cod_prestador = prestadores_servico.cod_prestador
            JOIN realiza_tipo on realiza_tipo.cod_prestador = prestadores_servico.cod_prestador
            join tipo_servico on tipo_servico.cod = realiza_tipo.cod_tipo
            where solicitacoes.status = 'pendente' and solicitacoes.cod_prestador = $cod_pessoa"
            );
        
            if($query->execute()) {
                $resultado = $query->fetchALL(PDO::FETCH_ASSOC);
                
                $jsonResultado = json_encode($resultado);
                
                echo $jsonResultado;
            } else {
                echo json_encode(['erro' => 'Erro na execução da consulta.']);
            }

        }

    }
} else if($status === "aceita") {


    if($tipo === 'usuario') {
        $query = $conexao->prepare(
            "select solicitacoes.id_solicitacao, solicitacoes.status ,solicitacoes.cidade, solicitacoes.rua, solicitacoes.numero ,solicitacoes.DataRegistro,solicitacoes.data_agendamento ,solicitacoes.descricao,solicitacoes.complemento,tipo_servico.descricao as tipo_servico,solicitacoes.id_solicitacao
        from solicitacoes
        join prestadores_servico on solicitacoes.cod_prestador = prestadores_servico.cod_prestador
        JOIN realiza_tipo on realiza_tipo.cod_prestador = prestadores_servico.cod_prestador
        join tipo_servico on tipo_servico.cod = realiza_tipo.cod_tipo
        where solicitacoes.status = 'aceita' and solicitacoes.cod_usuario = $cod_pessoa"
        );
    
        if($query->execute()) {
            $resultado = $query->fetchALL(PDO::FETCH_ASSOC);
            
            $jsonResultado = json_encode($resultado);
            
            echo $jsonResultado;
        } else {
            echo json_encode(['erro' => 'Erro na execução da consulta.']);
        }
    }else{
    
        if($tipo === 'prestador') {
            $query = $conexao->prepare(
                "select solicitacoes.id_solicitacao, solicitacoes.status ,solicitacoes.cidade, solicitacoes.rua, solicitacoes.numero ,solicitacoes.DataRegistro,solicitacoes.data_agendamento ,solicitacoes.complemento,solicitacoes.descricao ,tipo_servico.descricao as tipo_servico,solicitacoes.id_solicitacao
                from solicitacoes
                join prestadores_servico on solicitacoes.cod_prestador = prestadores_servico.cod_prestador
                JOIN realiza_tipo on realiza_tipo.cod_prestador = prestadores_servico.cod_prestador
                join tipo_servico on tipo_servico.cod = realiza_tipo.cod_tipo
                where solicitacoes.status = 'aceita' and solicitacoes.cod_prestador = $cod_pessoa"
            );
            
            if($query->execute()) {
                $resultado = $query->fetchALL(PDO::FETCH_ASSOC);
                    
                $jsonResultado = json_encode($resultado);
                    
                echo $jsonResultado;
            } else {
                echo json_encode(['erro' => 'Erro na execução da consulta.']);
            }
    
        }
    
    }

}  else if($status === "recusada") {


    if($tipo === 'usuario') {
        $query = $conexao->prepare(
            "select solicitacoes.id_solicitacao, solicitacoes.status ,solicitacoes.cidade, solicitacoes.rua, solicitacoes.numero ,solicitacoes.DataRegistro,solicitacoes.data_agendamento ,solicitacoes.descricao,solicitacoes.complemento,tipo_servico.descricao as tipo_servico,solicitacoes.id_solicitacao
        from solicitacoes
        join prestadores_servico on solicitacoes.cod_prestador = prestadores_servico.cod_prestador
        JOIN realiza_tipo on realiza_tipo.cod_prestador = prestadores_servico.cod_prestador
        join tipo_servico on tipo_servico.cod = realiza_tipo.cod_tipo
        where solicitacoes.status = 'deletada' and solicitacoes.cod_usuario = $cod_pessoa"
        );
    
        if($query->execute()) {
            $resultado = $query->fetchALL(PDO::FETCH_ASSOC);
            
            $jsonResultado = json_encode($resultado);
            
            echo $jsonResultado;
        } else {
            echo json_encode(['erro' => 'Erro na execução da consulta.']);
        }
    }else{
    
        if($tipo === 'prestador') {
            $query = $conexao->prepare(
                "select solicitacoes.id_solicitacao, solicitacoes.status ,solicitacoes.cidade, solicitacoes.rua, solicitacoes.numero ,solicitacoes.DataRegistro,solicitacoes.data_agendamento ,solicitacoes.complemento,solicitacoes.descricao ,tipo_servico.descricao as tipo_servico,solicitacoes.id_solicitacao
                from solicitacoes
                join prestadores_servico on solicitacoes.cod_prestador = prestadores_servico.cod_prestador
                JOIN realiza_tipo on realiza_tipo.cod_prestador = prestadores_servico.cod_prestador
                join tipo_servico on tipo_servico.cod = realiza_tipo.cod_tipo
                where solicitacoes.status = 'deletada' and solicitacoes.cod_prestador = $cod_pessoa"
            );
            
            if($query->execute()) {
                $resultado = $query->fetchALL(PDO::FETCH_ASSOC);
                    
                $jsonResultado = json_encode($resultado);
                    
                echo $jsonResultado;
            } else {
                echo json_encode(['erro' => 'Erro na execução da consulta.']);
            }
    
        }
    
    }

};  


?>
