CREATE IF NOT EXISTS
DATABASE `bladeinsight_v1` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `bladeinsight_v1`.`turbines`
(
    `id`                 int(11) NOT NULL AUTO_INCREMENT,
    `slug`               varchar(155) NOT NULL,
    `manufacture`        varchar(255) NOT NULL,
    `dimension_positive` varchar(45)  NOT NULL,
    `dimension_negative` varchar(45)  NOT NULL,
    `created`            datetime     NOT NULL,
    `modified`           datetime     NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

CREATE TABLE `bladeinsight_v1`.`users`
(
    `id`       INT          NOT NULL AUTO_INCREMENT,
    `name`     VARCHAR(155) NULL,
    `username` VARCHAR(155) NOT NULL,
    `password` VARCHAR(155) NOT NULL,
    `created`  DATETIME     NOT NULL,
    `modified` DATETIME     NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id_UNIQUE` (`id` ASC)
);

ALTER TABLE `bladeinsight_v1`.`users`
    ADD COLUMN `token` VARCHAR(100) NULL AFTER `password`;


-- Creation of user can be done with test
-- INSERT INTO `bladeinsight_v1`.`users` (`username`, `password`, `created`, `modified`) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', '29-06-22 12:39:48', '29-06-22 12:39:48');
