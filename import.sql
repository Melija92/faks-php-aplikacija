DROP TABLE IF EXISTS `korisnici`;
DROP TABLE IF EXISTS `gradovi`;
DROP TABLE IF EXISTS `zupanije`;

CREATE TABLE `korisnici` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zaporka` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `korisnici` (`id`, `email`, `zaporka`, `ime`, `prezime`)

VALUES
	(1,'dsucic1@vvg.hr','$2y$10$lcYzTQNrpLHk3Uw527T63..ErU4GG1.slKFJHcNPAv/z9OVCNPgs.','Domagoj','Sucic');
	
CREATE TABLE `zupanije` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `kratica` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `velicina` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zupan` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `zupanije` (`id`, `naziv`, `kratica`, `velicina`, `zupan`)

VALUES
	(1,'Varaždinska','VŽ','1262km2','Predrag Štromar'),
	(2,'Karlovačka','KA','3626km2','Damir Jelić');
	
CREATE TABLE `gradovi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `broj_stanovnika` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zupanija_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`zupanija_id`) REFERENCES zupanije(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `gradovi` (`id`, `naziv`, `broj_stanovnika`, `zupanija_id`)

VALUES
	(1,'Duga Resa','11180', 2),
	(2,'Ogulin','13915', 2);