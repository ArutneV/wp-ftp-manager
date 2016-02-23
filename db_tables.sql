CREATE TABLE IF NOT EXISTS `wp_ukuftp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(80) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wp_ukuftp` (`name`, `address`, `username`, `password`) VALUES
('Corpus', 'www.abc.com', 'louis', '12345'),
