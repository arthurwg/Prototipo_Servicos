-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Dez-2023 às 19:26
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `servicosja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestadores_servico`
--

CREATE TABLE `prestadores_servico` (
  `cod_prestador` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `celular` varchar(14) DEFAULT NULL,
  `nome_profissional` varchar(100) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `foto_perfil` varchar(100) DEFAULT 'padrao.png',
  `confirmacao` tinyint(4) NOT NULL DEFAULT 0,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `prestadores_servico`
--

INSERT INTO `prestadores_servico` (`cod_prestador`, `nome`, `cep`, `cidade`, `bairro`, `celular`, `nome_profissional`, `cnpj`, `cpf`, `estado`, `email`, `senha`, `foto_perfil`, `confirmacao`, `data_cadastro`) VALUES
(33, 'joao', '89098765', 'Pelotas', 'Centro', '(53)99906-9228', 'Joao Silva', '4321', '84777598085', ' RS', 'joaohotmail@com', '123', '33.jpg', 0, '2023-11-21'),
(37, 'Jonas', '98765698', 'Porto-Alegre', 'Centro', '(53)99906-9228', 'Funilaria Jonas', '00000000000000', '98766567652', 'RS', 'email_teste', '123', 'padrao.png', 0, '2023-11-26'),
(38, 'Lucia', '12345678', 'São Paulo', 'Perdizes', '(53)99906-9228', 'Limpeza Express', '11111111111111', '87654321098', 'SP', 'lucia@email.com', 'senha456', 'padrao.png', 0, '2023-11-26'),
(39, 'Carlos', '23456789', 'Rio de Janeiro', 'Copacabana', '(53)99906-9228', 'Construções Rápidas', '22222222222222', '76543210987', 'RJ', 'carlos@email.com', 'senha789', 'padrao.png', 0, '2023-11-26'),
(40, 'Fernanda', '34567890', 'Belo Horizonte', 'Savassi', '(53)99906-9228', 'Design de Interiores', '33333333333333', '65432109876', 'MG', 'fernanda@email.com', 'senhaabc', 'padrao.png', 0, '2023-11-26'),
(41, 'Rodrigo', '56789012', 'Florianópolis', 'Centro', '(53)99906-9228', 'Reparo Elétrico', '44444444444444', '54321098765', 'SC', 'rodrigo@email.com', 'senhadef', 'padrao.png', 0, '2023-11-26'),
(42, 'Camila', '67890123', 'Porto Alegre', 'Moinhos de Vento', '(53)99906-9228', 'Personal Trainer', '55555555555555', '43210987654', 'RS', 'camila@email.com', 'senhaghi', 'padrao.png', 0, '2023-11-26'),
(43, 'Eduardo', '78901234', 'Salvador', 'Barra', '(53)99906-9228', 'Desenvolvedor Web', '66666666666666', '32109876543', 'BA', 'eduardo@email.com', 'senhajkl', 'padrao.png', 0, '2023-11-26'),
(44, 'Laura', '89012345', 'Recife', 'Boa Viagem', '(53)99906-9228', 'Culinária Gourmet', '77777777777777', '21098765432', 'PE', 'laura@email.com', 'senha456mno', 'padrao.png', 0, '2023-11-26'),
(45, 'Lucas', '76543210', 'São Paulo', 'Jardins', '(53)99906-9228', 'Pedreiro', '66666666666666', '54321098765', 'SP', 'lucas@email.com', 'senhamno', 'padrao.png', 0, '2023-11-26'),
(46, 'Patrícia', '89012345', 'Rio de Janeiro', 'Ipanema', '(53)99906-9228', 'Fotógrafa', '77777777777777', '98765432109', 'RJ', 'patricia@email.com', 'senhaxyz', 'padrao.png', 0, '2023-11-26'),
(47, 'Rafael', '98765432', 'Belo Horizonte', 'Centro', '(53)99906-9228', 'Pedreiro', '88888888888888', '21098765432', 'MG', 'rafael@email.com', 'senha123abc', 'padrao.png', 0, '2023-11-26'),
(48, 'Jefferson', '12345678', 'Florianópolis', 'Trindade', '(53)99906-9228', 'Pedreiro', '99999999999999', '32109876543', 'SC', 'jessica@email.com', 'senha456def', 'padrao.png', 0, '2023-11-26'),
(49, 'Gabriel', '23456789', 'Porto Alegre', 'Bela Vista', '(53)99906-9228', 'Pedreiro', '10101010101010', '87654321098', 'RS', 'gabriel@email.com', 'senha789ghi', 'padrao.png', 0, '2023-11-26'),
(51, 'blabla', '96015010', 'Pelotas', 'Centro', '(53)99906-9228', 'blabla', '', '05111256075', 'RS', 'blabla@gmail.com', '$2y$10$XTri1Fk7BGVObOJ7p1rEV.4r9bF.XCgF7N3Ofr./ybawfR0InhT.a', 'imagempadrao.jpg', 0, '2023-12-05'),
(52, 'teste', '96015010', 'Pelotas', 'Centro', '(53)99906-9228', 'teste', '123', '05111256075', 'RS', 'teste@hotmail.com', '$2y$10$6zcpKxwkzfTUE./2v36BReBv6crpFV.1MAQgY0fdrfL7cAusJLrJa', 'imagempadrao.jpg', 1, '2023-12-07'),
(58, 'ARTHUR WEYMAR GARCIA', '96015010', 'Pelotas', 'Centro', '(53)99906-9228', 'ARTHUR WEYMAR GARCIA', '123', '05111256075', 'RS', 'arthurwg@gmail.com', '$2y$10$DftSZUoDhMvu9eOirWoyxuQw99DTuzn1l4/01hqnQQJ60EuvCrZ62', '58.jpg', 1, '2023-12-07'),
(62, 'Marcos Silva', '96015010', 'Pelotas', 'Centro', '(53)99906-9228', 'marcos silva', '123', '05111256072', 'RS', 'marcos@gmail.com', '$2y$10$H6IvzfNyh79HjNLoAgJdZu1EznMq3q9IBgb4psO5sBuy6lFnUD1lG', '62.png', 0, '2023-12-08'),
(63, 'lucas barbosa', '96015010', 'Pelotas', 'Centro', '(53)99906-9228', 'lucas B', '123', '13244567565', 'RS', 'lucas@gmail.com', '$2y$10$Sk8Xu4euhA8TiZ5ag5gPmuC0CqvAHYVsVm1j0a/tBXdsm/DqhSI4K', 'padrao.png', 0, '2023-12-08'),
(64, 'bruno g', '96015010', 'Pelotas', 'Centro', '(53)99906-9228', 'bruno g', '123', '05111256075', 'RS', 'bruno@gmail.com', '$2y$10$m0RT3qB3NsfseloTasi8lOh7XDyitqYG0x3Vu2zFOq1wExx5vqs7u', 'padrao.png', 0, '2023-12-08'),
(65, 'ARTHUR WEYMAR GARCIA', '96015010', 'Pelotas', 'Centro', '(53)99906-9228', 'ARTHUR WEYMAR GARCIA', '123', '05111256075', 'RS', 'arthurweymar@gmail.com', '$2y$10$pr/TEOqi3hUek0EwWpX7yuVfSUmzMNGUuqrOJc41fg30StiDGMGXm', '65.jpg', 1, '2023-12-08'),
(66, 'igor souza', '96015010', 'Pelotas', 'Centro', '(53)99906-9228', 'igoreto', '123', '13244567565', 'RS', 'teste@yahoo', '$2y$10$GDjAJ/TrSYkwk6OZ./VVCec8PSMQHlkAFGs8aP.KmAj/1F7eO8hQ6', 'padrao.png', 0, '2023-12-09'),
(68, 'Luiz da silva', '12225610', 'São José dos Campos', 'Parque Novo Horizonte', '(53)99906-9228', 'Luiz Pedreiro', '123', '05111256075', 'SP', 'arthurconta@outlook.com', '$2y$10$0her2KYspy8IL9K1pc4Y2.AyJCurWPtowgHHnxf6yIxX.SipQg/sW', '68.jpg', 1, '2023-12-11'),
(71, 'kevin@gmail.com', '96015010', 'Pelotas', 'Centro', '(53)99906-7228', 'Kevin Montador', '123', '05111256075', 'RS', 'Kevin', '$2y$10$L88N.ULwjXxRuKxlYogHaerI.NSxw9xnuXlCLuutIA0XHO0xQIteO', '71.jpg', 0, '2023-12-14'),
(73, 'Joao neves', '96015010', 'Pelotas', 'Centro', '(53)99906-7228', 'Joao mecanico', '123', '05111256075', 'RS', 'arthurgarcia.pl008@academico.ifsul.edu.br', '$2y$10$mYkz0dK19C5iwhZI1zjcBOAioO7hHsuPo/eNgcpRvqTlgor1oCVIi', '73.jpg', 1, '2023-12-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `realiza_tipo`
--

CREATE TABLE `realiza_tipo` (
  `cod_prestador` int(11) NOT NULL,
  `cod_tipo` int(11) NOT NULL,
  `detalhes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `realiza_tipo`
--

INSERT INTO `realiza_tipo` (`cod_prestador`, `cod_tipo`, `detalhes`) VALUES
(33, 1, NULL),
(37, 3, 'Serviços Elétricos Gerais'),
(38, 10, 'Manutenção de Computadores'),
(39, 9, 'Limpeza Residencial'),
(40, 8, 'Pintura Residencial'),
(41, 6, 'Encanamento'),
(42, 10, 'Formatações e Instalaçoes'),
(43, 7, 'Pneus e Remendos'),
(44, 4, 'Jardinagem'),
(45, 10, 'Obras em Geral'),
(47, 1, 'Obras em Geral'),
(48, 1, 'Obras em Geral'),
(49, 1, 'Obras em Geral'),
(58, 1, NULL),
(62, 5, NULL),
(63, 12, NULL),
(64, 14, NULL),
(65, 8, NULL),
(66, 5, NULL),
(68, 1, NULL),
(71, 14, NULL),
(73, 5, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_realizados`
--

CREATE TABLE `servicos_realizados` (
  `nota` int(1) DEFAULT NULL,
  `cd_prestador` int(11) DEFAULT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `tipo_servico` varchar(50) DEFAULT NULL,
  `id_servico` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `conclusao` varchar(255) DEFAULT NULL,
  `data_termino` date DEFAULT current_timestamp(),
  `situacao_pagamento` varchar(50) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicos_realizados`
--

INSERT INTO `servicos_realizados` (`nota`, `cd_prestador`, `cd_usuario`, `tipo_servico`, `id_servico`, `data`, `conclusao`, `data_termino`, `situacao_pagamento`, `valor`, `comentario`) VALUES
(5, 33, 43, 'Serviço A', 1, '2023-01-01', 'Concluída', '2023-01-15', 'Pago', '100.50', 'Comentário 1'),
(8, 33, 43, 'Serviço B', 2, '2023-02-01', 'interrompida', '2023-02-15', 'Pendente', '150.75', 'Comentário 2'),
(6, 33, 43, 'Serviço C', 3, '2023-03-01', 'cancelada', '2023-03-15', 'Não Pago', '200.00', 'Comentário 3'),
(1, 65, 43, 'Pintor', 4, '2023-12-10', 'concluido', '2023-12-11', 'pago', '0.00', 'bom profissional'),
(3, 65, 43, 'Pintor', 5, '2023-12-10', 'concluido', '2023-12-11', 'pago', '255.00', 'bom profissional'),
(4, 65, 43, 'Pintor', 6, '2023-12-11', 'concluido', '2023-12-11', 'pago', '255.00', 'bom, profissional, realizou tudo com muito cuidado e atenção. Realizou no prazo previsto.'),
(2, 68, 43, 'Pedreiro', 7, '2023-12-11', 'concluido', '2023-12-11', 'pago', '450.00', 'Fez o serviço mas demorou'),
(4, 68, 43, 'Pedreiro', 8, '2023-12-11', 'concluido', '2023-12-11', 'pago', '450.00', 'fez um otimo serviço'),
(4, 68, 43, 'Pedreiro', 9, '2023-12-11', 'concluido', '2023-12-11', 'pago', '800.00', 'excelente profissional, recomendo'),
(3, 65, 43, 'Pintor', 10, '2023-12-11', 'concluido', '2023-12-13', 'pago', '465.00', 'Serviço Ok'),
(3, 65, 43, 'Pintor', 11, '2023-12-10', 'concluido', '2023-12-13', 'pago', '465.00', 'Serviço Ok'),
(5, 65, 43, 'Pintor', 12, '2023-12-10', 'concluido', '2023-12-13', 'pago', '500.00', 'Profissional executou o serviço rapidamente'),
(4, 65, 43, 'Pintor', 13, '2023-12-10', 'concluido', '2023-12-13', 'pago', '1000.00', 'Fez um serviço de qualidade'),
(4, 68, 43, 'Pedreiro', 14, '2023-12-14', 'concluido', '2023-12-14', 'pago', '450.00', 'excelente profissional, recomendo'),
(4, 68, 43, 'Pedreiro', 15, '2023-12-14', 'concluido', '2023-12-14', 'pago', '450.00', 'otimo profissional ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id_solicitacao` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` int(11) DEFAULT NULL,
  `DataRegistro` date DEFAULT curdate(),
  `data_agendamento` date NOT NULL,
  `cod_prestador` int(11) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id_solicitacao`, `status`, `cidade`, `estado`, `rua`, `numero`, `complemento`, `DataRegistro`, `data_agendamento`, `cod_prestador`, `cod_usuario`, `descricao`) VALUES
(3, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-06', '2023-12-20', 33, 43, 'levantar duas paredes '),
(4, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 13, 41, '2023-12-06', '2023-12-29', 33, 43, 'pintura'),
(5, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 41, 12, '2023-12-06', '2024-01-04', 33, 43, 'reboco'),
(6, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 41, 412, '2023-12-06', '2023-12-14', 33, 43, 'pintura'),
(7, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-07', '2023-12-26', 37, 43, 'reparos'),
(8, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-07', '2024-01-06', 58, 43, 'construção'),
(9, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2023-12-26', 40, 43, 'aula'),
(10, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2023-12-29', 58, 58, 'reboco geral'),
(11, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2024-02-09', 58, 58, 'teste2'),
(12, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2024-02-09', 58, 58, 'teste3'),
(13, 'Pendente', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 41, 41, '2023-12-08', '2024-01-10', 41, 58, 'levantar duas paredes '),
(14, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 11, 41, '2023-12-08', '2024-01-06', 58, 43, 'aula teste'),
(15, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2024-01-05', 37, 43, 'aula teste'),
(16, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2024-01-02', 33, 43, 'aula teste5'),
(17, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 8, 41, '2023-12-08', '2024-01-11', 58, 43, 'aula teste6'),
(18, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2024-01-20', 44, 43, 'aula teste10'),
(19, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2024-01-03', 58, 43, 'aula teste12'),
(20, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2024-01-03', 58, 43, 'aula teste13'),
(21, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-08', '2024-01-10', 33, 43, 'reboco'),
(22, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 6, 41, '2023-12-08', '2023-12-28', 58, 43, 'pintura'),
(23, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-30', 33, 43, 'blabla'),
(24, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-30', 33, 43, 'teste30'),
(25, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-30', 33, 43, 'teste31'),
(26, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-30', 33, 43, 'teste32'),
(27, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-30', 33, 43, 'teste33'),
(28, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-30', 33, 43, 'teste34'),
(29, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-30', 33, 43, 'teste35'),
(30, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-30', 58, 43, 'obra'),
(31, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-28', 58, 43, 'AAAAAAAAA'),
(32, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-28', 58, 43, 'BBBBBB'),
(33, 'deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-28', 58, 43, 'CCCCC'),
(34, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-28', 58, 43, 'DDDDD'),
(35, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-28', 58, 43, 'Fazer uma Obra em varios comodos da casa, preciso de 6 paredes no total, vou providenciar todo o material, blablablablablablabal'),
(36, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-09', '2023-12-28', 58, 43, 'EEEEEEE'),
(37, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 0, 41, '2023-12-10', '2023-12-19', 65, 43, 'serviço teste'),
(38, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 0, 41, '2023-12-10', '2023-12-19', 65, 43, 'serviço teste2'),
(39, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 0, 41, '2023-12-10', '2023-12-19', 65, 43, 'serviço teste3'),
(40, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 0, 41, '2023-12-10', '2023-12-19', 65, 43, 'serviço teste4'),
(41, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 0, 41, '2023-12-10', '2023-12-19', 65, 43, 'serviço teste5'),
(42, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, '111111111'),
(43, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, '222222222'),
(44, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, '333333333'),
(45, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, '4444444444'),
(46, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, '5555555'),
(47, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(48, 'Pendente', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, 'BBBBBBBBBB'),
(49, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, 'CCCCCCCCCCC'),
(50, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, 'DDDDDDDD'),
(51, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-30', 33, 43, 'FFFFFFFF'),
(52, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-21', 65, 43, 'TESTE A'),
(53, 'Aceita', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-21', 65, 43, 'TESTE B'),
(54, 'Concluída', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-21', 65, 43, 'TESTE c'),
(55, 'Concluída', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-10', '2023-12-21', 65, 43, 'TESTE d'),
(56, 'Concluída', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-11', '2023-12-20', 65, 43, 'reboco6'),
(57, 'Aceita', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-11', '2023-12-13', 68, 43, 'Obra A'),
(58, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-11', '2024-01-12', 68, 43, 'Obra B'),
(59, 'Aceita', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-11', '2024-01-12', 68, 43, 'Obra C'),
(60, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-11', '2024-01-12', 68, 43, 'Obra D'),
(61, 'Deletada', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 5, 41, '2023-12-14', '2024-01-13', 33, 43, 'reboco100'),
(62, 'Concluída', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 41, 41, '2023-12-14', '2023-12-22', 68, 43, 'levantar paredes'),
(65, 'Concluída', 'Pelotas', 'RS', 'Praça Coronel Pedro Osório', 67, 41, '2023-12-14', '2024-01-13', 68, 43, 'Teste Aula');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_servico`
--

CREATE TABLE `tipo_servico` (
  `cod` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo_servico`
--

INSERT INTO `tipo_servico` (`cod`, `descricao`, `foto`) VALUES
(1, 'Pedreiro', 'pedreiro.jpg'),
(3, 'Eletrecista', 'eletrecista.jpg'),
(4, 'Jardineiro', 'jardineiro.jpg'),
(5, 'Mecanico', 'mecanico.jpg'),
(6, 'Encanador', 'encanador.WEBP'),
(7, 'Borracheiro', 'borracheiro.jpg'),
(8, 'Pintor', 'Pintor.WEBP'),
(9, 'Limpeza Residencial', 'faxineira.jpg'),
(10, 'Técnico de Informatica', 'tenico_inf.jpg'),
(11, 'Ar Condicionado e Aquecimento', 'tecnico_ar.jpg'),
(12, 'Fotógrafo/Videomaker', 'videomaker.jpg'),
(13, 'Babá', 'babá.WEBP'),
(14, 'Montador de Móveis', 'montador_moveis.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `CEP` varchar(8) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp(),
  `confirmacao` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `cpf`, `email`, `senha`, `CEP`, `estado`, `cidade`, `bairro`, `celular`, `cod_usuario`, `data_cadastro`, `confirmacao`) VALUES
('ARTHUR WEYMAR GARCIA', '05111256075', 'arthurweymar@gmail.com', '$2y$10$euks/3PlwJpn3KUFHCkuZeSqclBFo7FE0UZdgOkdjcHZnWo6Umv9e', '96015010', 'RS', 'Pelotas', 'Centro', '53999067228', 43, '2023-11-25', 1),
('Jonas', '98766567652', 'email_teste', '123', '98765698', 'RS', 'Porto-Alegre', 'Centro', '51999087887', 45, '2023-11-26', 0),
('Alice', '12345678901', 'alice@email.com', 'senha123', '12345678', 'SP', 'São Paulo', 'Centro', '11987654321', 46, '2023-11-26', 0),
('Bob', '23456789012', 'bob@email.com', 'senha456', '23456789', 'RJ', 'Rio de Janeiro', 'Copacabana', '21987654321', 47, '2023-11-26', 0),
('Charlie', '34567890123', 'charlie@email.com', 'senha789', '34567890', 'MG', 'Belo Horizonte', 'Savassi', '31987654321', 48, '2023-11-26', 0),
('David', '45678901234', 'david@email.com', 'senhaabc', '45678901', 'PR', 'Curitiba', 'Batel', '41987654321', 49, '2023-11-26', 0),
('Eva', '56789012345', 'eva@email.com', 'senhadef', '56789012', 'SC', 'Florianópolis', 'Centro', '47987654321', 50, '2023-11-26', 0),
('Frank', '67890123456', 'frank@email.com', 'senhaghi', '67890123', 'RS', 'Porto Alegre', 'Moinhos de Vento', '51987654321', 51, '2023-11-26', 0),
('Grace', '78901234567', 'grace@email.com', 'senhajkl', '78901234', 'BA', 'Salvador', 'Barra', '71987654321', 52, '2023-11-26', 0),
('Harry', '89012345678', 'harry@email.com', 'senha456mno', '89012345', 'PE', 'Recife', 'Boa Viagem', '81987654321', 53, '2023-11-26', 0),
('Ivy', '90123456789', 'ivy@email.com', 'senha789pqr', '90123456', 'DF', 'Brasília', 'Asa Sul', '61987654321', 54, '2023-11-26', 0),
('Jack', '01234567890', 'jack@email.com', 'senhaabcd', '01234567', 'GO', 'Goiânia', 'Setor Bueno', '62987654321', 55, '2023-11-26', 0),
('blublu', '05111256075', 'blublu@gmail.com', '$2y$10$AO3v8XXll0rxT99I.7I/WO1PnqbhTgHSg5F9emlSOSDtTBmto7UU.', '96015010', 'RS', 'Pelotas', 'Centro', '53999067228', 56, '2023-12-05', 0),
('ARTHUR WEYMAR GARCIA', '05111256075', 'arthurconta@hotmail.com', '$2y$10$o3p.SkPFJaagdkdgHbAVt.yQ/tNFUwsKN3nnGM1ormfmVBWV0zeBO', '96015010', 'RS', 'Pelotas', 'Centro', '53999067228', 58, '2023-12-08', 0),
('marcos', '', 'marcos@gmail.com', '$2y$10$p5Vy06mk88gZiS5e2ECfsOCx.BRGnXT89VsyNFgA4OaAEelwsNyHG', '', '', '', '', '', 59, '2023-12-08', 0),
('Joao Pereira', '05111256075', 'arthurgarcia.pl008@academico.ifsul.edu.br', '$2y$10$hQGG4zQ7wuHceP4Fnmv3Pukq1kKvGqlRC2jiHJGxelXF5VbF9LPim', '96015010', 'RS', 'Pelotas', 'Centro', '53999067228', 60, '2023-12-14', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `prestadores_servico`
--
ALTER TABLE `prestadores_servico`
  ADD PRIMARY KEY (`cod_prestador`),
  ADD UNIQUE KEY `email` (`email`,`cpf`,`cnpj`,`celular`);

--
-- Índices para tabela `realiza_tipo`
--
ALTER TABLE `realiza_tipo`
  ADD PRIMARY KEY (`cod_prestador`,`cod_tipo`),
  ADD KEY `cod_tipo` (`cod_tipo`);

--
-- Índices para tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  ADD PRIMARY KEY (`id_servico`),
  ADD KEY `servicos_fk1` (`cd_prestador`),
  ADD KEY `servicos_fk2` (`cd_usuario`);

--
-- Índices para tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id_solicitacao`),
  ADD KEY `cod_prestador` (`cod_prestador`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices para tabela `tipo_servico`
--
ALTER TABLE `tipo_servico`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`,`email`,`celular`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `prestadores_servico`
--
ALTER TABLE `prestadores_servico`
  MODIFY `cod_prestador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `tipo_servico`
--
ALTER TABLE `tipo_servico`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `realiza_tipo`
--
ALTER TABLE `realiza_tipo`
  ADD CONSTRAINT `realiza_tipo_ibfk_1` FOREIGN KEY (`cod_prestador`) REFERENCES `prestadores_servico` (`cod_prestador`),
  ADD CONSTRAINT `realiza_tipo_ibfk_2` FOREIGN KEY (`cod_tipo`) REFERENCES `tipo_servico` (`cod`);

--
-- Limitadores para a tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  ADD CONSTRAINT `servicos_fk1` FOREIGN KEY (`cd_prestador`) REFERENCES `prestadores_servico` (`cod_prestador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `servicos_fk2` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cod_usuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD CONSTRAINT `solicitacoes_ibfk_1` FOREIGN KEY (`cod_prestador`) REFERENCES `prestadores_servico` (`cod_prestador`),
  ADD CONSTRAINT `solicitacoes_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
