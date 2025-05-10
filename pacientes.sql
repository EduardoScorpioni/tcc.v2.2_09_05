-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Maio-2025 às 04:08
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medclick`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `possui_deficiencia` enum('Sim','Não') NOT NULL,
  `deficiencia` text,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `cpf_2` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `email`, `endereco`, `data_nascimento`, `sexo`, `telefone`, `possui_deficiencia`, `deficiencia`, `senha`) VALUES
(1, 'Eduardo Viccino Scorpioni', '495.897.738-42', 'eduscorpioni@outlook.com', 'Rua FernÃ£o Sales, 452', '2025-05-23', 'Masculino', '18997113887', '', '', ''),
(4, 'maicon', '123456', 'cuzin@gmail.com', 'Rua FernÃ£o Sales, 452', '2025-05-02', 'Masculino', '18997113887', '', '', '$2y$10$jfICh.aRH6H6xZlYs36i3eq6.ybJ5TUZrlQWDDMh1RFBN474mxr/W'),
(5, 'cia', '12344214312', 'opinto@gmail.com', 'Rua FernÃ£o Sales, 452', '2025-05-08', 'Masculino', '18997113887', '', '', '$2y$10$7vi6gFpwskx3q22koQ3f/u8PoOYL2sizUWF4FM10LkmdBt4GW/YFi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
