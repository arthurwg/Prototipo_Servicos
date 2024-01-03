<?php

require_once "includes/logica/conecta.php";

 $idSolicitacao = $_POST['idHidden']; 
 $nota = $_POST['nota']; 
 $valor = $_POST['valor'];
 $conclusao = $_POST['conclusao'];
 $situacao = $_POST['situacao'];
 $comentario = $_POST['comentario'];

 

$query = $conexao->prepare("select cod_prestador,cod_usuario,DataRegistro
 from solicitacoes where solicitacoes.id_solicitacao = ?");

$query->execute([$idSolicitacao]);

$resultado = $query->fetch(PDO::FETCH_ASSOC);

$cd_prestador = $resultado['cod_prestador'];
$cd_usuario = $resultado['cod_usuario'];
$data = $resultado['DataRegistro'];

$query2 = $conexao->prepare("select cod_tipo from realiza_tipo where cod_prestador
 = ? ");

 $query2->execute([$cd_prestador]);

 $resultado2 = $query2->fetch(PDO::FETCH_ASSOC);

 $cod_tipo = $resultado2['cod_tipo'];

 $query3 = $conexao->prepare("select descricao from tipo_servico 
 where cod = ? ");

 $query3->execute([$cod_tipo]);

 $resultado3 = $query3->fetch(PDO::FETCH_ASSOC);

 $descricao = $resultado3['descricao'];


$query4 = $conexao->prepare("insert into servicos_realizados 
(nota,cd_prestador,cd_usuario,tipo_servico,data,conclusao,situacao_pagamento,valor,comentario)
 VALUES (?,?,?,?,?,?,?,?,?)");
 
 $query4->execute([$nota,$cd_prestador, $cd_usuario,$descricao,$data,$conclusao,$situacao,$valor,$comentario]);

 $query5 = $conexao->prepare("update solicitacoes set solicitacoes.status = 'Concluída'
 where solicitacoes.id_solicitacao = ? ");

 $query5->execute([$idSolicitacao]);

echo "Avaliacao Registrada";


?>