DROP TABLE IF EXISTS `data`;

CREATE TABLE `data` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` smallint(3) UNSIGNED NOT NULL DEFAULT 0,
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('received','read','fixed','received') NOT NULL DEFAULT 'received',
  `application` VARCHAR(20) NOT NULL DEFAULT '',
  `message` varchar(1000) NOT NULL DEFAULT '',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL
      DEFAULT CURRENT_TIMESTAMP
      ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_general_ci COMMENT='Data Table';