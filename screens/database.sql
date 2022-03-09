CREATE TABLE IF NOT EXISTS `tb_ong` (
    `ong_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `ong_nome` VARCHAR(40) NOT NULL,
    `ong_razaosocial` VARCHAR(60) NOT NULL,
    `ong_email` VARCHAR(60) NOT NULL,
    `ong_cnpj` VARCHAR(20) NOT NULL,
    `ong_estado` VARCHAR(20) NOT NULL,
    `ong_cidade` VARCHAR(40) NOT NULL,
    `ong_senha` VARCHAR(20) NOT NULL,
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
    `anm_nome` VARCHAR(30) NOT NOT,
    `anm_raca` VARCHAR(40) NOT NOT,
    `anm_cor` VARCHAR(20) NOT NOT,
    `anm_idade` VARCHAR(20) NOT NOT,
    `anm_descricao` VARCHAR(255) NOT NOT,
    `anm_estado` VARCHAR(20) NOT NOT,
    `anm_cidade` VARCHAR(40) NOT NOT,
    `anm_telefone` VARCHAR(16) NOT NOT,
    `anm_email` VARCHAR(60) NOT NOT,
    PRIMARY KEY (`anm_id`)

);


