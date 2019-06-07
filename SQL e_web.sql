CREATE DATABASE `e_web`;

CREATE TABLE `categoria` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `Categoria` (`nm_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categoria`(`nm_categoria`)
VALUES
	('Veículos'),
    ('Tecnologia'),
    ('Casa e Eletrodomésticos'),
    ('Beleza e Cuidado Pessoal'),
    ('Acessorios Para Veiculos'),
    ('Esporte e Lazer'),
    ('Joias e Relogios'),
    ('Brinquedos Para Bebês'),
    ('Ferramentas e Industriais'),
    ('Moda'),
    ('Imoveis'),
    ('Supermercado'),
    ('Livros');


CREATE TABLE `empresa` (
  `id_empresa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_empresa` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `nivelacesso` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_empresa`),
  UNIQUE KEY `nm_empresa_UNIQUE` (`nm_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `funcionario` (
  `id_funcionario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_funcionario` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `nivelacesso` int(11) NOT NULL,
  `empresa_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `loja` (
  `id_loja` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_loja` varchar(255) NOT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `cidade_id` int(10) unsigned NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_loja`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `loja_ibfk_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `transportadora` (
  `id_transportadora` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_transportadora` varchar(255) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_transportadora`),
  KEY `FK_transportadora` (`empresa_id`),
  CONSTRAINT `FK_transportadora` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_fornecedor` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_fornecedor`),
  KEY `fornecedor_ibkf_3_idx` (`empresa_id`),
  CONSTRAINT `fornecedor_ibkf_3` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `dadoscadastrais` (
  `id_dadoscadastrais` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `endereco` varchar(255) NOT NULL,
  `num_endereco` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `fornecedor_id` int(10) unsigned DEFAULT NULL,
  `empresa_id` int(10) unsigned DEFAULT NULL,
  `funcionario_id` int(10) unsigned DEFAULT NULL,
  `loja_id` int(10) unsigned DEFAULT NULL,
  `transportadora_id` int(10) unsigned DEFAULT NULL,
  `nm_cidade` varchar(255),
  PRIMARY KEY (`id_dadoscadastrais`),
  KEY `fk_fornecedor_id2` (`fornecedor_id`),
  KEY `fk_empresa_id2` (`empresa_id`),
  KEY `fk_funcionario_id2` (`funcionario_id`),
  KEY `fk_loja_id2` (`loja_id`),
  KEY `fk_transportadora_id2` (`transportadora_id`),
  CONSTRAINT `fk_empresa_id2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `fk_fornecedor_id` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id_fornecedor`),
  CONSTRAINT `fk_fornecedor_id2` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id_fornecedor`),
  CONSTRAINT `fk_funcionario_id2` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id_funcionario`),
  CONSTRAINT `fk_loja_id2` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id_loja`),
  CONSTRAINT `fk_transportadora_id2` FOREIGN KEY (`transportadora_id`) REFERENCES `transportadora` (`id_transportadora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `produto` (
  `id_produto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_produto` varchar(255) NOT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `controlado` varchar(10) DEFAULT NULL,
  `quantidademinima` double DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `lote` int(10) DEFAULT NULL,
  `fornecedor_id` int(10) unsigned NOT NULL,
  `precounidade` double DEFAULT NULL,
  `precolote` double DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_empresa` (`empresa_id`),
  KEY `fk_categoria` (`categoria_id`),
  KEY `fk_fornecedor_id1` (`fornecedor_id`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `fk_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `fk_fornecedor_id1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `saida` (
  `id_saida` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loja_id` int(10) unsigned NOT NULL,
  `transportadora_id` int(10) unsigned DEFAULT NULL,
  `frete` double DEFAULT NULL,
  `imposto` double DEFAULT NULL,
  `dateped` datetime NOT NULL,
  `dateentrega` datetime DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `num_notafiscal` int(11) DEFAULT NULL,
  `produto_id` int(11) unsigned NOT NULL,
  `preco` double DEFAULT NULL,
  `concluido` tinyint(4) DEFAULT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_saida`),
  KEY `loja_id` (`loja_id`),
  KEY `saida_ibfk_2` (`transportadora_id`),
  KEY `produto_id` (`produto_id`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `saida_ibfk_1` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id_loja`),
  CONSTRAINT `saida_ibfk_2` FOREIGN KEY (`transportadora_id`) REFERENCES `transportadora` (`id_transportadora`),
  CONSTRAINT `saida_ibfk_3` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id_produto`),
  CONSTRAINT `saida_ibfk_4` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `itemsaida` (
  `id_itemsaida` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `valor` double NOT NULL,
  `saida_id` int(10) unsigned NOT NULL,
  `produto_id` int(10) unsigned NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_itemsaida`),
  UNIQUE KEY `saida_id` (`saida_id`),
  KEY `produto_id` (`produto_id`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `itemsaida_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id_produto`),
  CONSTRAINT `itemsaida_ibfk_2` FOREIGN KEY (`saida_id`) REFERENCES `saida` (`id_saida`),
  CONSTRAINT `itemsaida_ibfk_3` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `entrada` (
  `id_entrada` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dateped` datetime NOT NULL,
  `dateentr` datetime DEFAULT NULL,
  `quantidade` double NOT NULL,
  `frete` double DEFAULT NULL,
  `num_notafiscal` int(11) DEFAULT NULL,
  `imposto` double DEFAULT NULL,
  `transportadora_id` int(10) DEFAULT NULL,
  `produto_id` int(10) unsigned NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `preco` double NOT NULL,
  `concluido` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_entrada`),
  KEY `produto_id` (`produto_id`),
  KEY `entrada_ibfk_1` (`transportadora_id`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id_produto`),
  CONSTRAINT `entrada_ibfk_4` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `entrada_ibfk_5` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `itementrada` (
  `id_itementrada` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `valor` double NOT NULL,
  `produto_id` int(10) unsigned NOT NULL,
  `entrada_id` int(10) unsigned NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_itementrada`),
  KEY `produto_id` (`produto_id`),
  KEY `entrada_id` (`entrada_id`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `itementrada_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id_produto`),
  CONSTRAINT `itementrada_ibfk_2` FOREIGN KEY (`entrada_id`) REFERENCES `entrada` (`id_entrada`),
  CONSTRAINT `itementrada_ibfk_3` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


