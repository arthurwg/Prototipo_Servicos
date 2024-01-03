<?php

require_once "includes/logica/conecta.php";
session_start();
$cod_pessoa = $_SESSION['codpessoa'];
$tipo = $_SESSION['tipo'];
$solicitacao =  $_GET['solicitacao'];
$alternativa = $_GET['alternativa'];


    if($alternativa == "deleta"){
    $query = $conexao->prepare("update solicitacoes set solicitacoes.status = 'Deletada' where  id_solicitacao = ?");
    $query->bindValue(1, $solicitacao, PDO::PARAM_INT);

    if($query->execute()){
        $resultado = "deletada";
        echo  $resultado;
        } else {
            echo json_encode(['erro' => 'Erro na execução da consulta.']);
        }
    }else{

        $query = $conexao->prepare("update solicitacoes set solicitacoes.status = 'Aceita' where  id_solicitacao = ?");
        $query->bindParam(1, $solicitacao, PDO::PARAM_INT);
    
        if($query->execute()){
            $resultado ="aceita";
            echo $resultado;
            } else {
                echo json_encode(['erro' => 'Erro na execução da consulta.']);
            }

    }



?>