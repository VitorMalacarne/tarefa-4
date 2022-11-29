CREATE DATABASE hotel;

CREATE TABLE `tb_usuario` (`id` INT NOT NULL AUTO_INCREMENT, `nome` VARCHAR(70) NOT NULL, `email` VARCHAR(70) NOT NULL, `senha` VARCHAR(100) NOT NULL, `perfil` VARCHAR(100) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `tb_acomodacao` (`id` INT NOT NULL AUTO_INCREMENT, `qtd_camas_casal` INT NOT NULL, `qtd_camas_solteiro` INT NOT NULL, `camas_extras` INT NOT NULL, `tipo_acomodacao` VARCHAR(15) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `tb_tarifa` (`id` INT NOT NULL AUTO_INCREMENT, `tipo_acomodacao` VARCHAR(15) NOT NULL, `preco_acomodacao` FLOAT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `tb_reserva` (`id` INT NOT NULL AUTO_INCREMENT, `id_usuario` INT NOT NULL, `id_acomodacao` INT NOT NULL, `data_entrada` DATE NOT NULL, `data_saida` DATE NOT NULL, `qtd_hospedes` INT NOT NULL, `valor_reserva` FLOAT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;