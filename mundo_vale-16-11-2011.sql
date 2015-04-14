-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Nov 16, 2011 as 08:22 AM
-- Versão do Servidor: 5.1.39
-- Versão do PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: 'mundo_vale'
--

-- --------------------------------------------------------

--
-- Estrutura da tabela 'cadastros'
--

DROP TABLE IF EXISTS cadastros;
CREATE TABLE IF NOT EXISTS cadastros (
  id int(11) NOT NULL AUTO_INCREMENT,
  subcategoria_id int(11) NOT NULL,
  nome varchar(80) NOT NULL,
  email varchar(50) NOT NULL,
  cpf varchar(14) DEFAULT NULL,
  cnpj varchar(18) NOT NULL,
  rg varchar(20) DEFAULT NULL,
  nome_pai varchar(80) DEFAULT NULL,
  nome_mae varchar(80) DEFAULT NULL,
  telefone varchar(13) DEFAULT NULL,
  celular varchar(13) DEFAULT NULL,
  cep varchar(9) DEFAULT NULL,
  endereco varchar(50) DEFAULT NULL,
  numero varchar(20) DEFAULT NULL,
  complemento varchar(50) DEFAULT NULL,
  bairro varchar(50) DEFAULT NULL,
  cidade varchar(50) DEFAULT NULL,
  estado varchar(2) DEFAULT NULL,
  escolaridade varchar(50) DEFAULT NULL,
  referencias text NOT NULL,
  historico_profissional text NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL,
  activated datetime DEFAULT NULL,
  ativo enum('S','N') NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela 'cadastros'
--

INSERT INTO cadastros (id, subcategoria_id, nome, email, cpf, cnpj, rg, nome_pai, nome_mae, telefone, celular, cep, endereco, numero, complemento, bairro, cidade, estado, escolaridade, referencias, historico_profissional, created, modified, activated, ativo) VALUES
(2, 2, 'Ana 003', 'anacnogueira@gmail.com', '330.872.648-30', '', '432498904', 'Daniel Aparecido Nogueira', 'Ana de Moraes Nogueira', '(12)3951-6900', '(12)6161-8959', '12309-000', 'Avenida Vale do ParaÃ­ba', '164', '', 'Pque Sto antonio', 'JacareÃ­', 'SP', 'Ensino Superior Completo', 'Ref teste 001', 'Hist 001', '2011-10-04 20:21:43', '2011-10-04 20:24:03', NULL, 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela 'categorias'
--

DROP TABLE IF EXISTS categorias;
CREATE TABLE IF NOT EXISTS categorias (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela 'categorias'
--

INSERT INTO categorias (id, `name`) VALUES
(1, 'MÃ£o de obra'),
(2, 'ServiÃ§os');

-- --------------------------------------------------------

--
-- Estrutura da tabela 'cidades'
--

DROP TABLE IF EXISTS cidades;
CREATE TABLE IF NOT EXISTS cidades (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela 'cidades'
--

INSERT INTO cidades (id, `name`) VALUES
(1, 'SÃ£o JosÃ© dos Campos');

-- --------------------------------------------------------

--
-- Estrutura da tabela 'subcategorias'
--

DROP TABLE IF EXISTS subcategorias;
CREATE TABLE IF NOT EXISTS subcategorias (
  id int(11) NOT NULL AUTO_INCREMENT,
  categoria_id int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela 'subcategorias'
--

INSERT INTO subcategorias (id, categoria_id, `name`) VALUES
(1, 1, 'Carpinteiro'),
(2, 1, 'Encanador'),
(3, 1, 'Eletricista'),
(4, 1, 'Gesseiro'),
(5, 1, 'Marceneiro'),
(6, 1, 'Mestre de obra'),
(7, 1, 'Pintor'),
(8, 1, 'Serralheiro/Soldador'),
(9, 1, 'Ajudante de pedreiro'),
(10, 1, 'Vidraceiro'),
(11, 1, 'Telhadista'),
(12, 1, 'Azulejista'),
(13, 1, 'Pedreiro'),
(14, 1, 'Assentador de bloquete'),
(15, 1, 'Montador de Guincho'),
(16, 2, 'AÃ§ougue'),
(17, 2, 'Advogado'),
(18, 2, 'Alfaiate'),
(19, 2, 'Arquiteto'),
(20, 2, 'BabÃ¡'),
(21, 2, 'Barbeiro'),
(22, 2, 'Borracharia'),
(23, 2, 'Cabeleireiro'),
(24, 2, 'Carroceiro'),
(25, 2, 'Confeiteiro (Boleiro)'),
(26, 2, 'Contador'),
(27, 2, 'Corretor de ImÃ³veis'),
(28, 2, 'Corretor de Seguros'),
(29, 2, 'Costureiro(a)'),
(30, 2, 'Cozinheiro'),
(31, 2, 'Decorador'),
(32, 2, 'Dedetizadora'),
(33, 2, 'Dentista'),
(34, 2, 'Despachante'),
(35, 2, 'Domestica'),
(36, 2, 'Enfermeiro'),
(37, 2, 'Esteticista'),
(38, 2, 'Estofador'),
(39, 2, 'Faxineiro'),
(40, 2, 'Fisioterapeuta'),
(41, 2, 'FonoaudiÃ³logo'),
(42, 2, 'Fotografo'),
(43, 2, 'GarÃ§om'),
(44, 2, 'Guia TurÃ­stico'),
(45, 2, 'Jardineiro'),
(46, 2, 'Joalheiro e Ourives'),
(47, 2, 'Jornalista'),
(48, 2, 'Lavador de VeÃ­culos'),
(49, 2, 'Lavador e passador de roupas'),
(50, 2, 'Limpador de fachadas'),
(51, 2, 'Manicure'),
(52, 2, 'Manobrista'),
(53, 2, 'ManutenÃ§Ã£o de Computador'),
(54, 2, 'Massagista'),
(55, 2, 'MecÃ¢nico'),
(56, 2, 'Motorista'),
(57, 2, 'Nutricionista'),
(58, 2, 'Programador'),
(59, 2, 'PublicitÃ¡rio'),
(60, 2, 'Representante Comercial'),
(61, 2, 'Sapateiro'),
(62, 2, 'ServiÃ§os Gerais'),
(63, 2, 'Taxista'),
(64, 2, 'Vigilante e Guarda de SeguranÃ§a'),
(65, 2, 'Web Designer');

-- --------------------------------------------------------

--
-- Estrutura da tabela 'usuarios'
--

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(80) NOT NULL,
  email varchar(50) NOT NULL,
  cpf varchar(14) NOT NULL,
  telefone varchar(13) DEFAULT NULL,
  celular varchar(13) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL,
  ativo enum('S','N') NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela 'usuarios'
--

INSERT INTO usuarios (id, nome, email, cpf, telefone, celular, `password`, created, modified, ativo) VALUES
(1, 'Ana Claudia', 'anacnogueira@gmail.com', '330.872.648-30', '(12)3951-6900', '(12)9161-8959', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2011-09-08 17:14:23', '2011-09-08 17:27:28', 'S');
