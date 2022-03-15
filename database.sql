CREATE TABLE IF NOT EXISTS `tb_ong` (
    `ong_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `ong_nome` VARCHAR(40) NOT NULL,
    `ong_razaosocial` VARCHAR(60) NOT NULL,
    `ong_email` VARCHAR(60) NOT NULL,
    `ong_cnpj` VARCHAR(20) NOT NULL,
    `ong_descricao` VARCHAR(255),
    `ong_estado` VARCHAR(20) NOT NULL,
    `ong_cidade` VARCHAR(40) NOT NULL,
    `ong_telefone` VARCHAR(40) NOT NULL,
    `ong_senha` VARCHAR(20) NOT NULL,
    `ong_imagem` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`ong_id`)
);

CREATE TABLE IF NOT EXISTS `tb_admin` (
    `adm_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `adm_nome` VARCHAR(40) NOT NULL,
    `adm_email` VARCHAR(60) NOT NULL,
    `adm_cpf` VARCHAR(14) NOT NULL,
    `adm_senha` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`adm_id`)
);

CREATE TABLE IF NOT EXISTS `tb_animalform` (
    `anm_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `anm_nome` VARCHAR(30) NOT NULL,
    `anm_raca` VARCHAR(40) NOT NULL,
    `anm_sexo` VARCHAR(10) NOT NULL,
    `anm_cor` VARCHAR(60) NOT NULL,
    `anm_idade` VARCHAR(20) NOT NULL,
    `anm_descricao` VARCHAR(255),
    `anm_estado` VARCHAR(20) NOT NULL,
    `anm_cidade` VARCHAR(40) NOT NULL,
    `anm_telefone` VARCHAR(16) NOT NULL,
    `anm_email` VARCHAR(60) NOT NULL,
    `anm_imagem` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`anm_id`)
);

CREATE TABLE IF NOT EXISTS `tb_publicacao`(
    `pub_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `pub_nome` VARCHAR(30) NOT NULL,
    `pub_raca` VARCHAR(40) NOT NULL,
    `pub_sexo` VARCHAR(10) NOT NULL,
    `pub_cor` VARCHAR(60) NOT NULL,
    `pub_idade` VARCHAR(20) NOT NULL,
    `pub_descricao` VARCHAR(255),
    `pub_estado` VARCHAR(20) NOT NULL,
    `pub_cidade` VARCHAR(40) NOT NULL,
    `pub_telefone` VARCHAR(16) NOT NULL,
    `pub_email` VARCHAR(60) NOT NULL,
    `pub_imagem` VARCHAR(255) NOT NULL,
    `pub_data` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `id_ong` INT(11) NULL,
    `id_admin` INT(11) NULL,
    PRIMARY KEY (`pub_id`)
);
