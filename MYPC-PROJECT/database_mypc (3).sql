-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18/09/2024 às 02:00
-- Versão do servidor: 8.0.36
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `database_mypc`
--
create database database_mypc;
use database_mypc;
--
--
-- --------------------------------------------------------

--
-- Estrutura para tabela `armazenamento`
--

DROP TABLE IF EXISTS `armazenamento`;
CREATE TABLE IF NOT EXISTS `armazenamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `descricao_detalhada` varchar(500) DEFAULT NULL,
  `qualidade` varchar(50) DEFAULT NULL,
  `imagem` varchar(300) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `capacidade` int DEFAULT NULL,
  `interface` varchar(50) DEFAULT NULL,
  `velocidade_leitura` int DEFAULT NULL,
  `velocidade_escrita` int DEFAULT NULL,
  `link_loja` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `armazenamento`
--

INSERT INTO `armazenamento` (`id`, `nome`, `descricao`, `descricao_detalhada`, `qualidade`, `imagem`, `preco`, `tipo`, `capacidade`, `interface`, `velocidade_leitura`, `velocidade_escrita`, `link_loja`) VALUES
(1, 'Samsung 970 EVO Plus', 'SSD NVMe Samsung 970 EVO Plus 1TB', '1TB de armazenamento rápido com velocidades de leitura e escrita elevadas', 'Muito Alta', 'samsung-970-evo-plus.jpg', 179.99, 'SSD', 1000, 'NVMe', 3500, 3300, 'https://www.example.com/samsung-970-evo-plus'),
(2, 'Seagate Barracuda 2TB', 'HDD Seagate Barracuda 2TB', '2TB de armazenamento em disco rígido com boa performance', 'Alta', 'seagate-barracuda-2tb.jpg', 89.99, 'HDD', 2000, 'SATA', 180, 180, 'https://www.example.com/seagate-barracuda-2tb');

-- --------------------------------------------------------

--
-- Estrutura para tabela `build_pc`
--

DROP TABLE IF EXISTS `build_pc`;
CREATE TABLE IF NOT EXISTS `build_pc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_build` varchar(255) NOT NULL,
  `id_processador` int NOT NULL,
  `id_placa_mae` int NOT NULL,
  `id_memoria_ram` int NOT NULL,
  `id_placa_video` int NOT NULL,
  `id_fonte` int NOT NULL,
  `preco_total` decimal(10,2) DEFAULT '0.00',
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_processador` (`id_processador`),
  KEY `id_placa_mae` (`id_placa_mae`),
  KEY `id_memoria_ram` (`id_memoria_ram`),
  KEY `id_placa_video` (`id_placa_video`),
  KEY `id_fonte` (`id_fonte`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `build_pc`
--

INSERT INTO `build_pc` (`id`, `nome_build`, `id_processador`, `id_placa_mae`, `id_memoria_ram`, `id_placa_video`, `id_fonte`, `preco_total`, `data_criacao`) VALUES
(22, 'Isaac', 1, 1, 1, 1, 1, 1399.95, '2024-09-03 00:31:51'),
(23, 'PC_GAMER', 2, 2, 2, 2, 1, 1629.95, '2024-09-15 14:17:36'),
(24, 'ola', 1, 1, 1, 1, 1, 1399.95, '2024-09-15 14:32:18'),
(25, 'iiii', 1, 1, 1, 1, 1, 1399.95, '2024-09-15 14:32:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `build_pronta`
--

DROP TABLE IF EXISTS `build_pronta`;
CREATE TABLE IF NOT EXISTS `build_pronta` (
  `nome_Build` varchar(50) DEFAULT NULL,
  `especificacao` varchar(50) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `link_1` varchar(700) DEFAULT NULL,
  `link_2` varchar(700) DEFAULT NULL,
  `descricao` varchar(600) DEFAULT NULL,
  `imagem` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conteudo` text NOT NULL,
  `data_comentario` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` int DEFAULT NULL,
  `topico_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topico_id` (`topico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `conteudo`, `data_comentario`, `usuario_id`, `topico_id`) VALUES
(1, 'que daora', '2024-09-17 22:28:37', 1, 2),
(2, 'acho paia', '2024-09-17 22:29:04', 1, 2),
(3, 'acho paia', '2024-09-17 22:29:30', 1, 2),
(4, 'acho paia', '2024-09-17 22:29:33', 1, 2),
(5, 'acho paia', '2024-09-17 22:29:35', 1, 2),
(6, 'acho paia', '2024-09-17 22:29:51', 1, 2),
(7, 'seila', '2024-09-17 22:32:29', 1, 2),
(8, '1', '2024-09-17 22:32:31', 1, 2),
(9, 'concordo', '2024-09-17 22:35:52', 1, 4),
(10, 'não sei acho que não e assim', '2024-09-17 22:36:44', 1, 4),
(11, 'sera ?', '2024-09-17 22:36:55', 1, 3),
(12, 'ola', '2024-09-17 22:40:13', 1, 7),
(13, 'acho que não pois Nvidea tem o melhores graficos', '2024-09-17 22:42:10', 1, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `compatibilidade_video`
--

DROP TABLE IF EXISTS `compatibilidade_video`;
CREATE TABLE IF NOT EXISTS `compatibilidade_video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `processador_id` int NOT NULL,
  `placa_video_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `processador_id` (`processador_id`),
  KEY `placa_video_id` (`placa_video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `compatibilidade_video`
--

INSERT INTO `compatibilidade_video` (`id`, `processador_id`, `placa_video_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fonte`
--

DROP TABLE IF EXISTS `fonte`;
CREATE TABLE IF NOT EXISTS `fonte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `descricao_detalhada` varchar(500) DEFAULT NULL,
  `qualidade` varchar(50) DEFAULT NULL,
  `imagem` varchar(300) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `potencia` int DEFAULT NULL,
  `certificacao` varchar(50) DEFAULT NULL,
  `modularidade` varchar(50) DEFAULT NULL,
  `link_loja` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `fonte`
--

INSERT INTO `fonte` (`id`, `nome`, `descricao`, `descricao_detalhada`, `qualidade`, `imagem`, `preco`, `potencia`, `certificacao`, `modularidade`, `link_loja`) VALUES
(1, 'Corsair RM750x', 'Fonte Corsair RM750x 750W', 'Fonte de 750W com certificação 80 Plus Gold', 'Alta', 'corsair-rm750x.jpg', 129.99, 750, '80 Plus Gold', 'Modular', 'https://www.example.com/corsair-rm750x'),
(2, 'EVGA SuperNOVA 650 G5', 'Fonte EVGA SuperNOVA 650 G5 650W', 'Fonte de 650W com certificação 80 Plus Gold', 'Alta', 'evga-supernova-650-g5.jpg', 109.99, 650, '80 Plus Gold', 'Modular', 'https://www.example.com/evga-supernova-650-g5');

-- --------------------------------------------------------

--
-- Estrutura para tabela `memoria_ram`
--

DROP TABLE IF EXISTS `memoria_ram`;
CREATE TABLE IF NOT EXISTS `memoria_ram` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `descricao_detalhada` varchar(1000) NOT NULL,
  `qualidade` varchar(50) NOT NULL,
  `imagem` varchar(300) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `tipo_memoria` varchar(50) NOT NULL,
  `capacidade` int NOT NULL,
  `velocidade` int NOT NULL,
  `link_loja` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `memoria_ram`
--

INSERT INTO `memoria_ram` (`id`, `nome`, `descricao`, `descricao_detalhada`, `qualidade`, `imagem`, `preco`, `tipo_memoria`, `capacidade`, `velocidade`, `link_loja`) VALUES
(1, 'Corsair Vengeance LPX 16GB', 'Memória RAM Corsair Vengeance LPX 16GB DDR4', '16GB DDR4 3200MHz, ideal para gamers e entusiastas', 'Alta', 'corsair-vengeance-lpx-16gb.jpg', 79.99, 'DDR4', 16, 3200, 'https://www.example.com/corsair-vengeance-lpx-16gb'),
(2, 'G.Skill Trident Z 32GB', 'Memória RAM G.Skill Trident Z 32GB DDR4', '32GB DDR4 3600MHz, excelente para multitarefa e trabalho pesado', 'Muito Alta', 'gskill-trident-z-32gb.jpg', 149.99, 'DDR4', 32, 3600, 'https://www.example.com/gskill-trident-z-32gb');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE IF NOT EXISTS `mensagem` (
  `idmensagem` int NOT NULL AUTO_INCREMENT,
  `idusuario` int DEFAULT NULL,
  `idtecnico` int DEFAULT NULL,
  `texto` text NOT NULL,
  `data_envio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmensagem`),
  KEY `idusuario` (`idusuario`),
  KEY `idtecnico` (`idtecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `mensagem`
--

INSERT INTO `mensagem` (`idmensagem`, `idusuario`, `idtecnico`, `texto`, `data_envio`) VALUES
(1, 1, 1, 'aaaaa', '2024-09-04 01:00:22'),
(2, 1, 1, '10000', '2024-09-04 01:04:07'),
(3, 1, 1, 'aaaaa', '2024-09-04 01:08:35'),
(4, 1, 2, 'ola', '2024-09-04 01:08:48'),
(5, 1, 2, 'adddd', '2024-09-04 01:25:37'),
(6, 1, 2, 'adddd', '2024-09-04 01:27:50'),
(7, 1, 2, 'aaaaa', '2024-09-04 01:27:52'),
(8, 1, 1, 'aaaaaa', '2024-09-04 01:28:06'),
(9, 1, 1, 'aaaaa', '2024-09-04 01:47:25'),
(10, 1, 1, '', '2024-09-04 01:51:07'),
(11, 1, 1, '', '2024-09-04 01:51:08'),
(12, 1, 1, '', '2024-09-04 01:51:09'),
(13, 1, 1, '', '2024-09-04 01:51:17'),
(14, 1, 1, '', '2024-09-04 01:51:18'),
(15, 1, 1, '', '2024-09-04 01:51:19'),
(16, 1, 1, '', '2024-09-04 01:51:20'),
(17, 1, 1, '', '2024-09-04 01:51:27'),
(18, 1, 1, '', '2024-09-04 01:52:26'),
(19, 1, 1, 'Ola\r\n', '2024-09-04 01:52:38');

-- --------------------------------------------------------

--
-- Estrutura para tabela `placa_mae`
--

DROP TABLE IF EXISTS `placa_mae`;
CREATE TABLE IF NOT EXISTS `placa_mae` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `descricao_detalhada` varchar(500) DEFAULT NULL,
  `qualidade` varchar(50) DEFAULT NULL,
  `imagem` varchar(300) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `socket` varchar(50) DEFAULT NULL,
  `chipset` varchar(50) DEFAULT NULL,
  `formato` varchar(50) DEFAULT NULL,
  `slots_ram` int DEFAULT NULL,
  `max_memoria` int DEFAULT NULL,
  `link_loja` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `placa_mae`
--

INSERT INTO `placa_mae` (`id`, `nome`, `descricao`, `descricao_detalhada`, `qualidade`, `imagem`, `preco`, `socket`, `chipset`, `formato`, `slots_ram`, `max_memoria`, `link_loja`) VALUES
(1, 'ASUS ROG Strix B550-F', 'Placa-mãe ASUS com chipset B550', 'Placa ATX com suporte para AMD Ryzen 3000 e 5000', 'Alta', 'asus-rog-strix-b550-f.jpg', 199.99, 'AM4', 'B550', 'ATX', 4, 128, 'https://www.example.com/asus-rog-strix-b550-f'),
(2, 'MSI MPG Z690 Carbon WiFi', 'Placa-mãe MSI com chipset Z690', 'Suporte para processadores Intel de 12ª geração e memória DDR5', 'Muito Alta', 'msi-mpg-z690-carbon-wifi.jpg', 299.99, 'LGA1700', 'Z690', 'ATX', 4, 128, 'https://www.example.com/msi-mpg-z690-carbon-wifi');

-- --------------------------------------------------------

--
-- Estrutura para tabela `placa_video`
--

DROP TABLE IF EXISTS `placa_video`;
CREATE TABLE IF NOT EXISTS `placa_video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `descricao_detalhada` varchar(500) DEFAULT NULL,
  `qualidade` varchar(50) DEFAULT NULL,
  `imagem` varchar(300) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `tipo_memoria` varchar(50) DEFAULT NULL,
  `capacidade_memoria` int DEFAULT NULL,
  `clock_base` int DEFAULT NULL,
  `clock_turbo` int DEFAULT NULL,
  `tdp` int DEFAULT NULL,
  `link_loja` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `placa_video`
--

INSERT INTO `placa_video` (`id`, `nome`, `descricao`, `descricao_detalhada`, `qualidade`, `imagem`, `preco`, `tipo_memoria`, `capacidade_memoria`, `clock_base`, `clock_turbo`, `tdp`, `link_loja`) VALUES
(1, 'NVIDIA GeForce RTX 3080', 'Placa de vídeo NVIDIA GeForce RTX 3080', '8GB GDDR6X, excelente desempenho para jogos em 4K', 'Muito Alta', 'https://cdn.mos.cms.futurecdn.net/obNHUnF85G2kHtApYvix5D.png', 699.99, 'GDDR6X', 8, 1440, 1710, 320, 'https://www.example.com/nvidia-geforce-rtx-3080'),
(2, 'AMD Radeon RX 6800 XT', 'Placa de vídeo AMD Radeon RX 6800 XT', '16GB GDDR6, alta performance para jogos e criação de conteúdo', 'Muito Alta', 'amd-radeon-rx-6800-xt.jpg', 649.99, 'GDDR6', 16, 2015, 2250, 300, 'https://www.example.com/amd-radeon-rx-6800-xt');

-- --------------------------------------------------------

--
-- Estrutura para tabela `processador`
--

DROP TABLE IF EXISTS `processador`;
CREATE TABLE IF NOT EXISTS `processador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `descricao_detalhada` varchar(500) DEFAULT NULL,
  `qualidade` varchar(50) DEFAULT NULL,
  `imagem` varchar(300) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `socket` varchar(50) DEFAULT NULL,
  `nucleos` int DEFAULT NULL,
  `threads` int DEFAULT NULL,
  `velocidade_base` decimal(5,2) NOT NULL,
  `velocidade_turbo` decimal(5,2) NOT NULL,
  `tdp` int NOT NULL,
  `link_loja` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `processador`
--

INSERT INTO `processador` (`id`, `nome`, `descricao`, `descricao_detalhada`, `qualidade`, `imagem`, `preco`, `socket`, `nucleos`, `threads`, `velocidade_base`, `velocidade_turbo`, `tdp`, `link_loja`) VALUES
(1, 'Intel Core i5-12600K', 'Processador Intel Core i5 de 12ª geração', '6 núcleos de desempenho, 4 núcleos de eficiência, 12 threads', 'Alta', 'intel-core-i5-12600k.jpg', 289.99, 'LGA1700', 6, 12, 3.70, 4.90, 125, 'https://www.example.com/intel-core-i5-12600k'),
(2, 'AMD Ryzen 7 5800X', 'Processador AMD Ryzen 7 de 8 núcleos', '8 núcleos, 16 threads, excelente desempenho para jogos e trabalho', 'Muito Alta', 'amd-ryzen-7-5800x.jpg', 399.99, 'AM4', 8, 16, 3.80, 4.70, 105, 'https://www.example.com/amd-ryzen-7-5800x');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tecnico`
--

DROP TABLE IF EXISTS `tecnico`;
CREATE TABLE IF NOT EXISTS `tecnico` (
  `idtecnico` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `certificado` varchar(255) NOT NULL,
  PRIMARY KEY (`idtecnico`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tecnico`
--

INSERT INTO `tecnico` (`idtecnico`, `nome`, `email`, `certificado`) VALUES
(1, 'Carlos Santos', 'carlos.santos@example.com', 'Certificado A'),
(2, 'Ana Costa', 'ana.costa@example.com', 'Certificado B');

-- --------------------------------------------------------

--
-- Estrutura para tabela `topicos`
--

DROP TABLE IF EXISTS `topicos`;
CREATE TABLE IF NOT EXISTS `topicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(220) NOT NULL,
  `descricao` text NOT NULL,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `topicos`
--

INSERT INTO `topicos` (`id`, `titulo`, `descricao`, `data_criacao`) VALUES
(1, 'num', 's', '2024-09-17 22:25:52'),
(2, 'num', '12323', '2024-09-17 22:26:52'),
(3, 'num', 's', '2024-09-17 22:34:26'),
(4, 'MYPC', 'AMD e muito ruim', '2024-09-17 22:35:24'),
(5, 'BOB', 'seila', '2024-09-17 22:39:02'),
(6, 'BOB', 'seila', '2024-09-17 22:39:51'),
(7, 'ola', '123', '2024-09-17 22:39:59'),
(8, 'AMD e Ruim', 'Acho amd muito ruim , me de sua opinião', '2024-09-17 22:40:50'),
(9, 'AMD e melhor que NVIDEA', 'Acho que e melhor pois AMD e mais barata e tals.', '2024-09-17 22:41:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`) VALUES
(1, 'Pedro Almeida', 'pedro.almeida@example.com'),
(2, 'Laura Lima', 'laura.lima@example.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`) VALUES
(1, 'isaac', 'isaac@gmail', ' isaac@gmail', '123');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `build_pc`
--
ALTER TABLE `build_pc`
  ADD CONSTRAINT `build_pc_ibfk_1` FOREIGN KEY (`id_processador`) REFERENCES `processador` (`id`),
  ADD CONSTRAINT `build_pc_ibfk_2` FOREIGN KEY (`id_placa_mae`) REFERENCES `placa_mae` (`id`),
  ADD CONSTRAINT `build_pc_ibfk_3` FOREIGN KEY (`id_memoria_ram`) REFERENCES `memoria_ram` (`id`),
  ADD CONSTRAINT `build_pc_ibfk_4` FOREIGN KEY (`id_placa_video`) REFERENCES `placa_video` (`id`),
  ADD CONSTRAINT `build_pc_ibfk_5` FOREIGN KEY (`id_fonte`) REFERENCES `fonte` (`id`);

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`topico_id`) REFERENCES `topicos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `compatibilidade_video`
--
ALTER TABLE `compatibilidade_video`
  ADD CONSTRAINT `compatibilidade_video_ibfk_1` FOREIGN KEY (`processador_id`) REFERENCES `processador` (`id`),
  ADD CONSTRAINT `compatibilidade_video_ibfk_2` FOREIGN KEY (`placa_video_id`) REFERENCES `placa_video` (`id`);

--
-- Restrições para tabelas `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `mensagem_ibfk_2` FOREIGN KEY (`idtecnico`) REFERENCES `tecnico` (`idtecnico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
