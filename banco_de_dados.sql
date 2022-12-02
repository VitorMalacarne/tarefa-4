CREATE DATABASE hotel;

use hotel;

CREATE TABLE `tb_usuario` (
`id` INT NOT NULL AUTO_INCREMENT, 
`nome` VARCHAR(70) NOT NULL, 
`email` VARCHAR(70) NOT NULL, 
`senha` VARCHAR(100) NOT NULL, 
`telefone` VARCHAR(20) NOT NULL, 
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
PRIMARY KEY (`id`),
FOREIGN KEY(`id_tarifa`) REFERENCES tb_tarifa(id)
) ENGINE = InnoDB;

CREATE TABLE `tb_tarifa` (
`id` INT NOT NULL AUTO_INCREMENT, 
`tipo_acomodacao` VARCHAR(15) NOT NULL, 
`preco_acomodacao` FLOAT NOT NULL, 
PRIMARY KEY (`id`)
) ENGINE = InnoDB;

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