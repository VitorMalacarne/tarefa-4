CREATE DATABASE hotel;

use hotel;

CREATE TABLE `tb_usuario` (
`id` INT NOT NULL AUTO_INCREMENT, 
`nome` VARCHAR(70) NOT NULL, 
`email` VARCHAR(70) NOT NULL, 
`senha` VARCHAR(100) NOT NULL, 
`telefone` VARCHAR(20) NOT NULL, 
`perfil` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`),
UNIQUE(`email`)
) ENGINE = InnoDB;

CREATE TABLE `tb_acomodacao` (
`id` INT NOT NULL AUTO_INCREMENT, 
`id_tarifa` int DEFAULT NULL,
`qtd_camas_casal` INT NOT NULL, 
`qtd_camas_solteiro` INT NOT NULL, 
`qtd_pessoas` INT NOT NULL,
`tipo_apartamento` VARCHAR(10) NOT NULL, 
`tipo_acomodacao` VARCHAR(15) NOT NULL, 
PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `tb_tarifa` (
`id` INT NOT NULL, 
`preco` DECIMAL NOT NULL, 
`preco_adulto` DECIMAL NOT NULL,
`preco_crianca` DECIMAL NOT NULL, 
PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `tb_tarifa` (`id`, `preco`, `preco_adulto`, `preco_crianca`) VALUES ('1', '1', '1', '1');
INSERT INTO `tb_tarifa` (`id`, `preco`, `preco_adulto`, `preco_crianca`) VALUES ('2', '1', '1', '1');
INSERT INTO `tb_tarifa` (`id`, `preco`, `preco_adulto`, `preco_crianca`) VALUES ('3', '1', '1', '1');
INSERT INTO `tb_tarifa` (`id`, `preco`, `preco_adulto`, `preco_crianca`) VALUES ('4', '1', '1', '1');
INSERT INTO `tb_tarifa` (`id`, `preco`, `preco_adulto`, `preco_crianca`) VALUES ('5', '1', '1', '1');
INSERT INTO `tb_tarifa` (`id`, `preco`, `preco_adulto`, `preco_crianca`) VALUES ('6', '1', '1', '1');

CREATE TABLE `tb_reserva` (
`id` INT NOT NULL AUTO_INCREMENT, 
`id_usuario` INT NOT NULL, 
`id_acomodacao` INT NOT NULL, 
`data_entrada` DATE NOT NULL, 
`data_saida` DATE NOT NULL, 
`qtd_pessoas` INT NOT NULL, 
`valor_reserva` DECIMAL NOT NULL, 
PRIMARY KEY (`id`)
) ENGINE = InnoDB;