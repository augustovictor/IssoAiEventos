

DROP TABLE IF EXISTS `issoaieventos`.`administradores`;
DROP TABLE IF EXISTS `issoaieventos`.`eventos`;
DROP TABLE IF EXISTS `issoaieventos`.`eventos_participantes`;
DROP TABLE IF EXISTS `issoaieventos`.`organizadores`;
DROP TABLE IF EXISTS `issoaieventos`.`participantes`;
DROP TABLE IF EXISTS `issoaieventos`.`usuarios`;


CREATE TABLE `issoaieventos`.`administradores` (
	`usuario_id` int(11) NOT NULL AUTO_INCREMENT,	PRIMARY KEY  (`usuario_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `issoaieventos`.`eventos` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`titulo` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`descricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`data_inicio` date NOT NULL,
	`data_fim` date NOT NULL,
	`vagas` int(11) NOT NULL,
	`localizacao_id` int(11) NOT NULL,
	`organizador_id` int(11) NOT NULL,	PRIMARY KEY  (`id`),
	KEY `fk_evento_localizacao1_idx` (`localizacao_id`),
	KEY `fk_eventos_organizadores1_idx` (`organizador_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `issoaieventos`.`eventos_participantes` (
	`evento_id` int(11) NOT NULL,
	`participantes_facebook_id` bigint(20) NOT NULL,	PRIMARY KEY  (`evento_id`, `participantes_facebook_id`),
	KEY `fk_participantes_has_eventos_eventos2_idx` (`evento_id`),
	KEY `fk_eventos_participantes_participantes1_idx` (`participantes_facebook_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `issoaieventos`.`organizadores` (
	`id` int(11) NOT NULL,
	`usuario_id` int(11) NOT NULL,
	`data_nascimento` date DEFAULT NULL,
	`plano_id` int(11) NOT NULL,	PRIMARY KEY  (`id`, `usuario_id`),
	KEY `fk_organizador_plano1_idx` (`plano_id`),
	KEY `fk_organizador_pessoa1` (`usuario_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `issoaieventos`.`participantes` (
	`facebook_id` bigint(20) NOT NULL AUTO_INCREMENT,
	`nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,	PRIMARY KEY  (`facebook_id`),
	UNIQUE KEY `facebook_id_UNIQUE` (`facebook_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `issoaieventos`.`usuarios` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`senha` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

