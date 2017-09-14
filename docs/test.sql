USE `test`;

DROP TABLE IF EXISTS `data`;

CREATE TABLE `data` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `message` varchar(512) NOT NULL DEFAULT '',
  `application` VARCHAR(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_general_ci COMMENT='Data Table';