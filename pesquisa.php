<?php

header('content-type: application/json');
require_once "includes/logica/conecta.php";

$pesquisa = $_GET['pesquisa'];
$consulta = "%".$pesquisa."%";
$categoria = $_GET['categoria'];


$query = $conexao->prepare("select nome,prestadores_servico.cod_prestador, 
prestadores_servico.nome_profissional,
prestadores_servico.cep,prestadores_servico.celular, 
prestadores_servico.cidade,
prestadores_servico.bairro,prestadores_servico.email,
prestadores_servico.foto_perfil,
round(avg(servicos_realizados.nota),1) as 'media' from prestadores_servico
left join servicos_realizados 
ON servicos_realizados.cd_prestador = prestadores_servico.cod_prestador
where prestadores_servico.cod_prestador in (select realiza_tipo.cod_prestador 
from realiza_tipo where realiza_tipo.cod_tipo = ?) and prestadores_servico.nome_profissional LIKE ?
GROUP BY prestadores_servico.cod_prestador order by prestadores_servico.nome_profissional DESC;");

$query->execute([$categoria,$consulta]);

$resultado = $query->fetchALL(PDO::FETCH_ASSOC);
$jsonResultado = json_encode($resultado);

echo $jsonResultado;
?>