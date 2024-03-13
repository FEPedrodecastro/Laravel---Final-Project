-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Nov-2023 às 19:59
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jornadas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `areaestudo`
--

CREATE TABLE `areaestudo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_aluno`
--

CREATE TABLE `area_aluno` (
  `idAreaEstudo` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `pontuacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Agricultura'),
(2, 'Artes e Humanidades'),
(3, 'Ciências'),
(4, 'Ciências Sociais, Comércio e Direito'),
(5, 'Educação'),
(6, 'Engenharias, Indústria e Construção'),
(7, 'Saúde e Proteção Social'),
(8, 'Serviços');

-- --------------------------------------------------------

--
-- Estrutura da tabela `concelho`
--

CREATE TABLE `concelho` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `distrito_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `concelho`
--

INSERT INTO `concelho` (`id`, `nome`, `distrito_id`) VALUES
(1, 'Porto', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `distrito`
--

INSERT INTO `distrito` (`id`, `nome`) VALUES
(1, 'Porto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `freguesia`
--

CREATE TABLE `freguesia` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `concelho_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `freguesia`
--

INSERT INTO `freguesia` (`id`, `nome`, `concelho_id`) VALUES
(1, 'Porto', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `id` int(11) NOT NULL,
  `questao` text NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`id`, `questao`, `categoria_id`) VALUES
(1, 'Gostaria de trabalhar na produção agrícola (recolha de ovos, ordenha de animais, alimentação de gado)', 1),
(2, 'Gosto de criar e cuidar de animais', 1),
(3, 'Conseguia imaginar-me a passar o dia a cuidar de árvores, flores e legumes', 1),
(4, 'Interesso-me por monitorizar a saúde e o crescimento de animais e plantas', 1),
(5, 'Gostaria de aprender como as plantações crescem e prosperam', 1),
(6, 'Imaginava-me no cultivo de cereais ou árvores de fruto', 1),
(7, 'Gostaria de trabalhar em agricultura', 1),
(8, 'Gosto de trabalhar ao ar livre', 1),
(9, 'Gosto de estar na natureza independentemente das condições atmosféricas', 1),
(10, 'Gosto de trabalhar com plantas ou animais', 1),
(11, 'Interesso-me por usar de forma consciente os recursos naturais da terra', 1),
(12, 'Gostaria de cuidar de plantas e flores e vendê-las ao público', 1),
(13, 'Gostaria de documentar eventos através de imagens', 2),
(14, 'Sentiria orgulho por ilustrar livros ou apresentar o meu trabalho numa galeria', 2),
(15, 'Imaginava-me a criar adereços, joalharia ou outros trabalhos manuais', 2),
(16, 'Gostaria de dedicar o meu tempo a ensaiar para atuar em público', 2),
(17, 'Gostaria de passar os meus dias a imaginar e criar obras de arte', 2),
(18, 'Interesso-me por edição de imagem (retocar, editar, efeitos)', 2),
(19, 'Imagino-me a trabalhar com artes ou a ser intérprete (música, dança, teatro e cinema)', 2),
(20, 'Imagino-me a escrever artigos para revistas ou jornais', 2),
(21, 'Preciso que a minha profissão futura implique criatividade', 2),
(22, 'Gostaria de ter um local e horário de trabalho flexíveis', 2),
(23, 'Gostaria de escrever um livro', 2),
(24, 'Adoraria estar perante um público', 2),
(25, 'Tenho curiosidade em estudar o efeito de substâncias no corpo humano (e.g., vitaminas, medicação)', 3),
(26, 'Gostaria de criar projetos ligados à tecnologia (ex. autocarros elétricos, estações espaciais...)', 3),
(27, 'Interesso-me por aprender como cuidar de pessoas doentes', 3),
(28, 'Interesso-me por estudar o mundo natural e analisar rochas e fósseis', 3),
(29, 'Gostaria de perceber o efeito de produtos químicos em colheitas ou seres vivos', 3),
(30, 'Imagino-me a criar projetos para novos eletrodomésticos ou veículos', 3),
(31, 'Imagino-me a criar projetos para edifícios', 3),
(32, 'Gosto de perceber como é que as coisas funcionam', 3),
(33, 'Gosto de procurar novas maneiras de resolver os problemas', 3),
(34, 'Imagino-me a trabalhar com sistemas informáticos, inteligência artificial e robôs', 3),
(35, 'Quero descobrir como resolver problemas usando a ciência', 3),
(36, 'Gostaria de aprender mais sobre marés, vento e pressão atmosférica', 3),
(37, 'Gostaria de elaborar planos econômicos e financeiros para empresas', 4),
(38, 'Imagino-me a aconselhar clientes sobre como tomar decisões legais', 4),
(39, 'Gostaria de elaborar pareceres jurídicos', 4),
(40, 'Gostaria de escrever a história de vida de pessoas famosas ou importantes', 4),
(41, 'Gostaria de recolher e escrever histórias para as notícias', 4),
(42, 'Imagino-me a informar clientes dos riscos de investimento e calcular os prêmios das apólices de seguro', 4),
(43, 'Consigo persuadir os outros a concordarem comigo, conseguiria persuadir pessoas a comprarem o que eu aconselhasse', 4),
(44, 'Gostaria de aconselhar gestores na política econômica das suas empresas', 4),
(45, 'Gostaria de vender casas ou apartamentos e ajudar clientes a escolherem a melhor opção', 4),
(46, 'Gosto de conhecer diferentes tipos de pessoas', 4),
(47, 'Consigo imaginar-me a apresentar um telejornal ou conduzir uma entrevista', 4),
(48, 'Gostaria de produzir e analisar estatísticas', 4),
(49, 'Gosto de ensinar aos outros como fazer algo', 5),
(50, 'Teria interesse em orientar atividades recreativas para pessoas com incapacidade', 5),
(51, 'Sou competente em planear e dirigir atividades para os outros', 5),
(52, 'Interesso-me por aprender mais e partilhar o meu conhecimento', 5),
(53, 'Gostaria de planear um curso destinado a jovens', 5),
(54, 'Consigo imaginar-me a ensinar artes, música ou teatro', 5),
(55, 'Gosto de tomar conta de crianças', 5),
(56, 'Gosto de dar conselhos aos outros', 5),
(57, 'Gosto de ajudar os outros a superar desafios', 5),
(58, 'Sou bom a comunicar com diferentes tipos de pessoas', 5),
(59, 'Sou competente em assumir várias responsabilidades ao mesmo tempo', 5),
(60, 'Gosto de estar sempre a aprender e a inovar', 5),
(61, 'Imagino os meus dias ligados à construção de edifícios', 6),
(62, 'Imagino-me a manusear ferramentas para produzir peças ou acabamentos em madeira', 6),
(63, 'Gostaria de fazer a revisão e reparar avarias de vários tipos de veículos', 6),
(64, 'Gostaria de trabalhar com o restauro de móveis ou como estufador', 6),
(65, 'Gostaria de reparar avarias em pequenos e grandes eletrodomésticos', 6),
(66, 'Gostaria de passar os meus dias a usar ferramentas e utensílios usados em reparações', 6),
(67, 'Gostaria de passar os meus dias a instalar e reparar canalizações', 6),
(68, 'Gostaria de trabalhar com máquinas de costura e tricot', 6),
(69, 'Gostaria de perceber como funcionam os sistemas elétricos', 6),
(70, 'Gostaria de orientar e supervisionar a construção de um edifício, estrada ou ponte', 6),
(71, 'Imagino-me a cortar tecidos para criar peças de vestuário ou artigos para o lar', 6),
(72, 'Imagino os meus dias a conduzir maquinaria pesada (ex. escavadora)', 6),
(73, 'Imagino-me a conhecer e aplicar regras de saúde pública', 7),
(74, 'Gostaria de ajudar a prevenir e combater o consumo de drogas', 7),
(75, 'Gostaria de ajudar um dentista na preparação do tratamento de um dente', 7),
(76, 'Gostaria de tomar conta de pessoas idosas', 7),
(77, 'Gostaria de ajudar pessoas na tomada de decisão e resolução dos seus problemas pessoais', 7),
(78, 'Imagino os meus dias a ouvir os problemas de outras pessoas', 7),
(79, 'Gostaria de prestar cuidados básicos do dia-a-dia a pessoas que precisam de apoio', 7),
(80, 'Gostaria de participar em experiências científicas', 7),
(81, 'Gostaria de influenciar as pessoas na escolha de uma vida ativa e saudável', 7),
(82, 'Gostaria de tomar conta de pessoas doentes', 7),
(83, 'Gostaria de fazer análises clínicas a pacientes', 7),
(84, 'Consigo imaginar os meus dias a trabalhar num laboratório', 7),
(85, 'Imagino os meus dias a cortar e pentear cabelos', 8),
(86, 'Gostaria de transportar pessoas', 8),
(87, 'Gostaria de trabalhar em atendimento ao público', 8),
(88, 'Gostaria de passar os meus dias a fazer trabalhos de costura', 8),
(89, 'Gostaria de ajudar pessoas no planeamento de viagens e férias', 8),
(90, 'Consigo imaginar os meus dias a atender telefonemas, receber mensagens e encomendas', 8),
(91, 'Gostaria de prestar apoio a pessoas com algum tipo de incapacidade', 8),
(92, 'Gosto de preparar alimentos e cozinhar', 8),
(93, 'Gostaria de arquivar livros e documentos', 8),
(94, 'Ficaria feliz por organizar e planear atividades de tempos livres para crianças, jovens e adultos', 8),
(95, 'Gostaria de consertar sapatos', 8),
(96, 'Imagino-me a guiar e orientar pessoas em visitas turísticas', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `primeiro_nome` varchar(50) DEFAULT NULL,
  `ultimo_nome` varchar(50) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `freguesia_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `freguesia` varchar(50) DEFAULT NULL,
  `concelho` varchar(50) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `tipo_instituicao` varchar(50) DEFAULT NULL,
  `nif` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `primeiro_nome`, `ultimo_nome`, `genero`, `freguesia_id`, `created_at`, `updated_at`, `deleted_at`, `freguesia`, `concelho`, `distrito`, `email_verified_at`, `tipo`, `nome`, `tipo_instituicao`, `nif`) VALUES
(7, 'email1@email.com', '$2y$10$vt1jraLTH9hsIm2rJzum4u8IBtAQ.7rFcr/S4NtY9/xcjuXVHthsO', 'Diana', 'Silva', 'Feminino', 1, '2023-10-10 23:40:52', NULL, NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(8, 'email2@email.com', '$2y$10$R.NB4DrAtLaiNe4YOYn5sOMG8P6UqTAYdJGJgbkRLaOaYY.w3xiEy', 'Pedro', 'Castro', 'Masculino', 1, '2023-10-10 23:40:52', NULL, NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(9, 'email3@email.com', '$2y$10$efvChNS7lzY3ytl8d6lIhOFgu4fPHTpTzO7AZRG4aKwJ2OeNmFYKC', 'Bruna', 'Silva', 'Feminino', 1, '2023-10-10 23:40:52', NULL, NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(10, 'email4@email.com', '$2y$10$b8pGCRdujBO5LQXlz6k6wO3lmOS4dTzprOftr7v07ABumE66LEZRm', 'Patrícia', 'Silva', 'Feminino', 1, '2023-10-25 17:51:01', '2023-10-25 17:51:01', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(11, 'email5@email.com', '$2y$10$8FuNjktEn0aDIm7JGR7li.9KsASvNU3PNtbAT0oMjuipKy6lKh5t.', 'Ricardo', 'Araújo', 'Masculino', NULL, '2023-10-25 17:56:24', '2023-10-25 17:56:24', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(12, 'email6@email.com', '$2y$10$Z3XBWmn3u8qvEdhEqXobhusE3k.mfSLf3nTHeYEqy9lqviQJCSgEO', 'Raquel', 'Marques', 'Feminino', NULL, '2023-10-25 19:32:57', '2023-10-25 19:32:57', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(13, 'email7@email.com', '$2y$10$vuvAingBJsAVDooXuPUwAOpxrmWUZ56X3TgBi2CZLMwMUiJ3x/gqa', 'Daniel', 'Marques', 'Masculino', NULL, '2023-10-25 19:34:17', '2023-10-25 19:34:17', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(15, 'email10@email.com', '$2y$10$DMXrokqnZvj32PMo9pi4auM8l7hPoGZml93TtCH5/fKo2t9AdMCVy', 'Patrícia', 'Silva', 'Feminino', NULL, '2023-10-27 15:53:44', '2023-10-27 15:53:44', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(16, 'email15@email.com', '$2y$10$mjsdcskTZ1dgCPKtw/HOvu3HI3iSgVtn13KHc4G9EB2mlUmQ.343W', 'Raquel', 'Marques', 'Feminino', NULL, '2023-10-30 11:28:29', '2023-10-30 11:28:29', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(17, 'escola1@email.com', '$2y$10$v3P41BZ2NtP3tUAPUgc8Cey7Sr9iloa3lPTqJMUdlANiWCetYFbGq', NULL, NULL, NULL, NULL, '2023-10-30 11:29:57', '2023-10-30 11:29:57', NULL, NULL, NULL, NULL, NULL, 2, 'Escola1', 'Escola', 513456891),
(18, 'cesae@email.com', '$2y$10$UXdmFaKtmxdz80McRKIUbujJOGYGRGqbMt8VmkZjZBh2n9rwd9knm', NULL, NULL, NULL, NULL, '2023-11-04 06:03:13', '2023-11-04 06:03:13', NULL, NULL, NULL, NULL, NULL, 2, 'CESAE', 'Empresa', 513456892),
(19, 'email11@email.com', '$2y$10$Q6WrI7W5MAcHVX7OSHzI.uHWWQ3ByybFrEvyOHDteMwjdUhyU8X3y', 'Hugo', 'Lopes', 'Masculino', NULL, '2023-11-04 17:58:45', '2023-11-04 17:58:45', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(20, 'email12@email.com', '$2y$10$SyB2L/KmhUUW6meOJITwv.LWF47DxaXxMBDBWHcY0kLVSKbUsz1ty', 'Fabrício', 'Lopes', 'Feminino', NULL, '2023-11-04 18:01:48', '2023-11-04 18:01:48', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL),
(21, 'email20@email.com', '$2y$10$GHA4XGMjHAGUVIeA.8OMRew9KAnIuvhlh.YN9oCy2wrGdX.oZZSv6', 'Bruno', 'Santos', 'Masculino', NULL, '2023-11-06 10:50:33', '2023-11-06 10:50:33', NULL, 'Porto', 'Porto', 'Porto', NULL, 1, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `areaestudo`
--
ALTER TABLE `areaestudo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `area_aluno`
--
ALTER TABLE `area_aluno`
  ADD PRIMARY KEY (`idAreaEstudo`,`idAluno`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `concelho`
--
ALTER TABLE `concelho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distrito_id` (`distrito_id`);

--
-- Índices para tabela `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `freguesia`
--
ALTER TABLE `freguesia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concelho_id` (`concelho_id`);

--
-- Índices para tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `freguesia_id` (`freguesia_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `areaestudo`
--
ALTER TABLE `areaestudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `concelho`
--
ALTER TABLE `concelho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `freguesia`
--
ALTER TABLE `freguesia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `area_aluno`
--
ALTER TABLE `area_aluno`
  ADD CONSTRAINT `area_aluno_ibfk_1` FOREIGN KEY (`idAreaEstudo`) REFERENCES `areaestudo` (`id`),
  ADD CONSTRAINT `area_aluno_ibfk_2` FOREIGN KEY (`idAluno`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`freguesia_id`) REFERENCES `freguesia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
