-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 01-Jul-2024 às 17:38
-- Versão do servidor: 5.6.34
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escola_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Pedro Henrique', 'pedro@mail.com', 'senha123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `codigo` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `turma_codigo` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`codigo`, `descricao`, `turma_codigo`, `data`) VALUES
(1, 'UC1 - TURMA1', 1, '0000-00-00'),
(2, 'UC2 - TURMA1', 1, '0000-00-00'),
(3, 'UC3 - TURMA1', 1, '0000-00-00'),
(4, 'UC1 - TURMA2', 2, '0000-00-00'),
(5, 'UC2 - TURMA2', 2, '0000-00-00'),
(6, 'UC3 - TURMA2', 2, '0000-00-00'),
(8, 'UC1 - TURMA3', 3, '0000-00-00'),
(10, 'UC2 - TURMA3', 3, '0000-00-00'),
(11, 'UC3 - TURMA3', 3, '0000-00-00'),
(12, 'UCI - TURMA 2', 1, '2024-02-12'),
(13, 'TURMA DO LEROLERO', 1, '2024-11-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `codigoCurso` int(11) NOT NULL,
  `nomeCurso` varchar(255) NOT NULL,
  `turma_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`codigoCurso`, `nomeCurso`, `turma_codigo`) VALUES
(2, 'Desenvolvimento de Sistemas', 1),
(3, 'Desenvolvimento de Sistemas', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`codigo`, `nome`, `email`, `senha`) VALUES
(1, 'Professor Um', 'professor.um@escola.com', 'senha123'),
(2, 'Professor Dois', 'professor.dois@escola.com', 'senha456'),
(3, 'Professor Três', 'professor.tres@escola.com', 'senha789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `professor_codigo` int(11) NOT NULL,
  `curso_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`codigo`, `nome`, `professor_codigo`, `curso_codigo`) VALUES
(1, 'Turma Um - PROF1', 1, 0),
(2, 'Turma Dois - PROF1', 1, 0),
(3, 'Turma Três - PROF1', 1, 0),
(7, 'Turma Um - PROF2', 2, 0),
(8, 'Turma Dois - PROF2', 2, 0),
(9, 'Turma Três - PROF2', 2, 0),
(13, 'Turma Um - PROF3', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `atividades_fk2` (`turma_codigo`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codigoCurso`),
  ADD KEY `curso_fk` (`turma_codigo`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `turmas_fk2` (`professor_codigo`),
  ADD KEY `turmas_fk3` (`curso_codigo`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `codigoCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `atividades_fk2` FOREIGN KEY (`turma_codigo`) REFERENCES `turmas` (`codigo`);

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_fk` FOREIGN KEY (`turma_codigo`) REFERENCES `turmas` (`codigo`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_fk2` FOREIGN KEY (`professor_codigo`) REFERENCES `professores` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
