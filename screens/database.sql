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
    `adm_senha` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`adm_id`)
);


