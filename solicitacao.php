<?php

require "includes/logica/conecta.php";

$cep = $_POST['cep'];
$estado = $_POST['uf'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$status = "Pendente";

$cod_usuario = $_POST['cod_usuario'];
$cod_prestador = $_POST['cod_prestador'];

try {
$query = $conexao->prepare("insert into solicitacoes (status,cidade,estado,rua,numero
,complemento,Data_agendamento,cod_prestador,cod_usuario,descricao)
VALUES (?,?,?,?,?,?,?,?,?,?)");

$query->execute([$status, $cidade, $estado, $rua, $numero, $complemento, $data, $cod_prestador, $cod_usuario, $descricao]);

if ($query->rowCount() > 0) {
    echo "sucesso";
} else {
    echo "erro";
}
} catch (PDOException $e) {
echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}




?>