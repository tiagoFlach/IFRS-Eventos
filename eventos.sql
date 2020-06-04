-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Dez-2015 às 14:05
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `login`, `senha`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `valorInscricaoDia` int(255) NOT NULL,
  `idEvento` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `valorInscricaoDia`, `idEvento`) VALUES
(1, 'Estudante', 15, 1),
(2, 'Professor', 30, 1),
(3, 'Pesquisador', 50, 1),
(4, 'Papai Noel', 20, 45),
(5, 'Duende', 15, 45),
(6, 'aa', 0, 53);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_data_valor`
--

CREATE TABLE IF NOT EXISTS `categoria_data_valor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `valor` int(255) NOT NULL,
  `idCategoria` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `categoria_data_valor`
--

INSERT INTO `categoria_data_valor` (`id`, `data`, `valor`, `idCategoria`) VALUES
(1, '2015-05-15', 12, 1),
(2, '2015-05-14', 10, 1),
(3, '2015-05-14', 20, 2),
(4, '2015-05-15', 24, 2),
(5, '2015-05-13', 30, 3),
(6, '2015-05-14', 34, 3),
(7, '2015-05-15', 38, 3),
(8, '0000-00-00', 15, 4),
(9, '0000-00-00', 10, 5),
(10, '0000-00-00', 12, 6),
(11, '0000-00-00', 12, 6),
(12, '0000-00-00', 13, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(510) NOT NULL,
  `valor` int(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `idEvento` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `valor`, `local`, `dataInicio`, `dataFim`, `idEvento`) VALUES
(1, 'Curso', 20, 'Localidade', '2015-05-16', '2015-05-17', 1),
(2, 'Teste', 10, 'Localidade', '2015-05-16', '2015-05-17', 1),
(3, 'Informática', 50, 'Laboratório', '2015-05-16', '2015-05-16', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_dia_hora`
--

CREATE TABLE IF NOT EXISTS `curso_dia_hora` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFim` time NOT NULL,
  `idCurso` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `curso_dia_hora`
--

INSERT INTO `curso_dia_hora` (`id`, `data`, `horaInicio`, `horaFim`, `idCurso`) VALUES
(1, '2015-05-16', '10:00:00', '16:00:00', 1),
(2, '2015-05-17', '09:00:00', '16:00:00', 1),
(4, '2015-05-16', '09:00:00', '10:00:00', 2),
(5, '2015-05-16', '09:30:00', '14:00:00', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `horaInicio` time NOT NULL,
  `local` varchar(255) NOT NULL,
  `valorInscricao` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nome`, `descricao`, `dataInicio`, `dataFim`, `horaInicio`, `local`, `valorInscricao`) VALUES
(1, 'Evento', '\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dapibus in neque id pharetra. Ut ornare ex eu diam tincidunt, in aliquet tellus ullamcorper. Donec interdum elementum dui at fringilla. Morbi in arcu ultrices, mollis mauris quis, elementum neque. Nam cursus est et velit luctus feugiat. Phasellus sem nisl, consequat et mollis ac, lobortis ut sem. Nulla facilisi. Donec fringilla nulla vel turpis aliquet, et pharetra dui laoreet. Maecenas a auctor felis. Pellentesque ac tristique turpis, sit amet sagittis nibh. Duis eleifend est vitae lorem pharetra, in tincidunt turpis tempor. Pellentesque viverra, velit at pretium finibus, nunc lorem sodales erat, sit amet viverra lectus justo hendrerit ipsum. Sed scelerisque lorem porttitor, pretium mauris sit amet, ultrices arcu. Donec id dolor ut massa tincidunt mollis. Aenean tempor in neque eget mollis.\n\nAliquam erat volutpat. Sed ornare diam ut arcu viverra, in tempus est fermentum. Aliquam nec lectus felis. Suspendisse potenti. Pellentesque ac nibh vulputate, porta enim at, rhoncus enim. Donec rhoncus turpis sed odio molestie laoreet. Vestibulum cursus porta metus, nec dictum augue dignissim et. Phasellus sodales tempus magna ut accumsan. Proin blandit quis sem a facilisis. Donec fermentum tellus ac arcu vulputate sagittis eu eu nisi. Morbi augue eros, porta quis odio vel, viverra condimentum nisi. Nullam et justo justo. Etiam auctor interdum dolor sit amet scelerisque.\n\nSed suscipit sollicitudin sodales. Integer gravida auctor massa, dignissim lacinia nunc pellentesque a. Ut in velit ultrices, cursus sem vitae, vehicula arcu. Sed at purus libero. Fusce dapibus finibus diam, id faucibus augue fermentum non. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non turpis leo. Phasellus consectetur ullamcorper neque finibus ullamcorper. Quisque dui odio, ultricies et massa ut, dapibus ultrices tortor. Fusce vel tellus id massa bibendum condimentum vel sagittis ipsum. Ut ornare nec nibh commodo porta. Donec in sagittis sapien. Nullam tristique, diam at tincidunt bibendum, sem mauris posuere augue, eu sollicitudin velit purus sed magna. Nullam fringilla molestie tortor, et congue velit fermentum eu.\n\nCurabitur lorem risus, tempus ut lorem at, tempus cursus ex. Aliquam aliquet augue nisl, et condimentum elit fringilla ac. Aenean quis euismod justo. Nulla eget pretium felis. Sed blandit urna sed pharetra lobortis. Nulla congue lectus et ligula mollis mattis. Morbi fermentum eget lorem ac sodales. Aliquam pretium rhoncus nisl. Vestibulum vitae nibh tortor. Donec accumsan, ligula eget luctus tincidunt, mauris mauris placerat nisi, nec aliquam lorem nulla non nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed pulvinar urna non quam aliquet, eget tempor erat porta. Vestibulum tincidunt eros quis nisi vehicula, vitae porta est euismod.\n\nVivamus orci lectus, pellentesque sit amet pretium non, aliquet ac velit. Vivamus tristique aliquam finibus. Proin vel egestas orci. Cras porta nunc at libero consectetur sollicitudin. Nunc commodo ultrices lectus ut dignissim. Donec pretium faucibus ex, et sagittis massa scelerisque sit amet. Aenean ut pellentesque nulla, eu consequat sem. Aliquam erat volutpat. Vivamus congue porttitor pellentesque. Praesent vel tortor justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ', '2015-05-16', '2015-05-17', '09:00:00', 'Localidade', NULL),
(2, 'Teste de evento', 'TESTE', '2015-11-19', '2015-11-19', '10:00:00', 'Aqui', 100),
(3, 'Teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at molestie purus. Morbi tristique elit vel ex fermentum, vel placerat ipsum porta. Proin gravida justo nec arcu pharetra pretium. Vestibulum tincidunt lacus id dolor aliquet, nec maximus diam porta. Vestibulum velit mauris, rutrum vitae aliquam vel, elementum eu neque. Suspendisse vel enim varius, auctor diam nec, venenatis ante. Nunc dignissim pretium ante ac posuere.\r\n\r\nMorbi vel mattis felis. Nam sed commodo turpis. Sed dapibus aliquet eros feugiat dictum. Vestibulum eget dignissim erat, vitae tempus nunc. Aenean tempor sapien non tellus vehicula, vel egestas dui blandit. Mauris aliquam erat a mi commodo maximus. Nulla mollis vehicula turpis nec vehicula. Etiam enim odio, elementum ac libero sit amet, venenatis interdum orci. Nulla eget imperdiet lorem. Praesent iaculis accumsan nunc in dictum. Cras volutpat erat non quam mattis finibus. Praesent ornare nec quam sed pharetra.\r\n\r\nUt vitae tempor nisi, sit amet tristique arcu. Suspendisse non commodo odio. Maecenas semper eu metus vitae mollis. Integer vulputate eros ex, at finibus nulla gravida vel. Curabitur vel mi et nisi vestibulum placerat ac ac mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus quis tellus euismod, pellentesque erat vitae, posuere lacus. Ut ut diam a ligula imperdiet suscipit at vel orci. Etiam lacus elit, lobortis pulvinar aliquet at, euismod et nunc. Donec fermentum lectus vel eros faucibus, vitae blandit lacus consequat.\r\n\r\nDuis luctus diam sed consectetur pellentesque. Pellentesque vulputate nibh id libero lobortis pellentesque. Pellentesque suscipit sed justo sed sollicitudin. Donec feugiat dui sit amet nunc condimentum blandit a ut metus. Maecenas suscipit suscipit ipsum egestas egestas. Vivamus sollicitudin tincidunt ligula, sit amet fermentum lectus. Nunc varius elit a quam convallis, quis ultrices tortor placerat. Praesent euismod dignissim nisl, non vehicula sapien vulputate nec. Cras tortor massa, auctor a elit non, tempus luctus magna.\r\n\r\nEtiam suscipit lectus quis sem vehicula feugiat. Nam ullamcorper, nisl sit amet luctus lobortis, ligula lectus blandit augue, a finibus dolor massa in mauris. Integer at tortor sed tellus commodo consequat. Praesent ac lectus orci. Morbi in dui nulla. Integer sit amet pulvinar urna. Donec sit amet quam a est rhoncus venenatis. Ut ac gravida augue. Sed vel condimentum neque. Nulla facilisi. Quisque malesuada volutpat elementum. Sed tristique quam a mauris egestas accumsan. Phasellus fermentum nisl purus. Vivamus erat ligula, faucibus id vehicula non, pharetra et lorem. Aenean blandit sem quis condimentum aliquam.\r\n\r\nUt tincidunt ornare dignissim. Nulla nec magna iaculis, egestas nunc id, elementum diam. Praesent semper, nulla et sagittis semper, elit libero posuere lectus, ac ultrices arcu nulla et sem. Donec imperdiet magna a interdum tristique. Etiam ut odio eget urna egestas vulputate eget quis libero. Nam facilisis lobortis eros ac lobortis. Aliquam vitae egestas justo. Ut ut rutrum risus, ac efficitur turpis. Quisque hendrerit tellus vel erat ullamcorper porttitor. Maecenas nisi risus, fringilla quis urna efficitur, bibendum aliquet eros. Sed eleifend gravida lacus vitae viverra. Nullam rhoncus feugiat nibh. Morbi et hendrerit augue, eu maximus urna. Curabitur tempus et augue et cursus. Quisque lacinia, massa sit amet mollis porta, dolor urna tempor elit, eget tincidunt neque felis sit amet tellus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo suscipit dapibus. Etiam a turpis commodo, interdum ipsum eget, consectetur ex. Pellentesque a leo sem. Vestibulum interdum volutpat ante, eu hendrerit sem pulvinar quis. Quisque id augue eros. In leo eros, tristique sit amet justo eget, accumsan pretium magna. Integer eget nulla a velit dictum euismod eget et sapien. Nullam lacinia eleifend ligula, vitae mattis erat. Cras vestibulum tellus ipsum, nec ornare tellus sagittis eget. Suspendisse mattis at nulla at mattis. Fusce ac dignissim libero. Maecenas non dictum lorem, at dignissim metus. Morbi nec auctor dui. Donec ut lectus leo. Maecenas eu porttitor ante.\r\n\r\nQuisque interdum tortor libero, non faucibus elit facilisis sit amet. Phasellus a ornare urna. In sit amet euismod est, id porta ex. Aliquam volutpat imperdiet ex, non vehicula elit vehicula eu. Duis sapien nisi, aliquet convallis massa vitae, tempor aliquam arcu. Nulla ultrices nibh non mattis tincidunt. Donec accumsan eget nisl sed feugiat. Sed ac nisi ac augue sollicitudin placerat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nSuspendisse potenti. Phasellus eu mollis ipsum. Duis eleifend volutpat egestas. Morbi sagittis odio vel nibh feugiat, ut scelerisque tortor aliquet. Donec quis turpis vulputate, porta risus tempus, congue ipsum. Pellentesque mauris odio, efficitur nec enim vel, mattis feugiat lacus. Mauris egestas sit amet nisi in tincidunt. Mauris aliquet cursus lorem at dapibus. Mauris suscipit vel felis a imperdiet. Suspendisse potenti.\r\n\r\nProin aliquet ante at urna fermentum suscipit. Suspendisse eu mi tincidunt, finibus libero rhoncus, maximus tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin blandit diam justo, a malesuada dui gravida eu. Vivamus egestas justo vitae quam mollis rutrum. In nec efficitur nisl. Nam erat lectus, feugiat eget elementum at, congue eget nulla.', '2015-10-15', '2015-10-15', '12:00:00', 'Lá', NULL),
(44, 'Evento Teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mi arcu, volutpat eu rutrum at, pharetra ut augue. Nullam sagittis mauris a quam cursus, nec semper lacus gravida. In non tincidunt mi, nec porta erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi sollicitudin tincidunt metus at venenatis. Relatório illuminatti nota dez. Vestibulum facilisis consequat metus. Nunc suscipit feugiat dui, vel lobortis nibh gravida ac. Curabitur non nibh odio.', '2015-12-19', '2015-12-19', '09:30:00', 'IFRS - Bento Gonçalves', 0),
(46, 'Natal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec arcu ultrices, gravida nunc ac, aliquam felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum nulla tellus, sit amet ultrices odio egestas sed. Nunc non risus ultricies, vulputate justo sit amet, tincidunt ligula. Morbi a aliquam arcu. Quisque sed aliquam mi. Nullam vel porttitor nibh. Aliquam vestibulum, nisl ac interdum vulputate, diam ligula blandit nisi, sit amet maximus nisl dolor vel nunc. Nam iaculis augue vitae urna euismod auctor. Nulla at sem quis sem laoreet molestie. Aliquam blandit, tortor dignissim tempor elementum, metus justo iaculis diam, a consequat ipsum enim nec sapien. Maecenas feugiat, lectus in dictum vestibulum, nisi dui sodales nulla, ac viverra leo leo id leo.\r\n\r\nInteger molestie sem ipsum, vitae imperdiet ligula porttitor a. Nam eleifend eros ut tempus commodo. Suspendisse finibus lacus vel felis sodales varius. Pellentesque eleifend hendrerit nulla, ut fringilla enim blandit ut. Sed imperdiet ex diam. Pellentesque ac ligula nec ex dapibus dictum. Phasellus tempor viverra tincidunt. Sed at ligula a tellus tincidunt eleifend. Maecenas convallis interdum dolor, non fermentum leo convallis id.', '2015-12-25', '2015-12-25', '00:00:00', 'Polo Norte', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricoes`
--

CREATE TABLE IF NOT EXISTS `inscricoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `idEvento` int(255) NOT NULL,
  `valor` int(255) NOT NULL,
  `idUsuario` int(255) NOT NULL,
  `valorTotal` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `inscricoes`
--

INSERT INTO `inscricoes` (`id`, `idCategoria`, `data`, `idEvento`, `valor`, `idUsuario`, `valorTotal`) VALUES
(1, '1', '2015-09-11', 1, 15, 2, 45),
(29, '1', '2015-11-21', 1, 15, 39, 25),
(30, '3', '2015-11-21', 1, 50, 44, 70),
(31, '1', '2015-11-21', 1, 15, 45, 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cpf`, `nome`, `endereco`, `cidade`, `uf`, `telefone`, `celular`, `empresa`, `email`) VALUES
(1, 123456789, 'Tiago', 'avsa', '´pok', 'rs', 987987, 324234, 'embrapa', 'email'),
(2, 88888888, 'Tiago Lucas Flach', 'av.central', 'Barão', 'rs', 12345678, 87654321, 'Embrapa', 'tiago@email.com'),
(3, 0, '', '', '', 'es', 0, 0, '', ''),
(4, 12345678, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(5, 12345678, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(6, 12345678, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(7, 12345678, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(8, 12345678, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(9, 12345678, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(10, 12345678, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(11, 12345678, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(12, 12345679, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(13, 123456790, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(14, 878787, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(15, 87878798, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(16, 87878798, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(17, 878787989, 'Vem comigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(18, 9876543, 'Vem contigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(19, 98765432, 'Vem contigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(20, 989812938, 'Vem contigo', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(21, 928743, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(22, 9287409, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(23, 9287423, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(24, 92874331, 'Exatosas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(25, 928743223, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(26, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(27, 106, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(28, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(29, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(30, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(31, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(32, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(33, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(34, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(35, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(36, 2147483647, 'Exato', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(37, 2147483647, 'Lucas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(38, 2147483647, 'Lucas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(39, 92874322332, 'Lucas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(40, 92874322331, 'Lucas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(41, 43545, 'Lucas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(42, 245, 'Lucas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(43, 12345678901, 'Tiago', 'Av.Central', 'Barão', 'rs', 0, 0, 'Embrapa', 'tiago@email.com'),
(44, 9287432233, 'Lucas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com'),
(45, 9287432633, 'Lucas', 'av.central', 'Barão', 'es', 12345678, 12345678, 'empresa', 'tiago@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_curso`
--

CREATE TABLE IF NOT EXISTS `usuario_curso` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(255) NOT NULL,
  `idCurso` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `usuario_curso`
--

INSERT INTO `usuario_curso` (`id`, `idUsuario`, `idCurso`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 1),
(6, 2, 2),
(7, 2, 1),
(8, 2, 2),
(9, 12, 3),
(10, 14, 3),
(11, 18, 1),
(12, 18, 2),
(13, 18, 3),
(14, 23, 1),
(15, 27, 3),
(16, 35, 1),
(17, 36, 1),
(18, 37, 1),
(19, 39, 2),
(20, 39, 2),
(21, 44, 1),
(22, 45, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
