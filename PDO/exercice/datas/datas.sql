-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 fév. 2019 à 08:22
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `article_3`
--

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `thelogin`, `thepwd`, `thename`) VALUES
(1, 'User1', '27a534a25cf745b6c985eb782079a6fe8641b00003dada14f392a2d01b9c790a', 'Marc Dushmol'),
(2, 'User2', '0e238ae88aef5a81ba9d297b5df67e74af15d168e5b765db22227c91b8672285', 'Murielle Martin');


--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idarticles`, `thetitle`, `thetext`, `thedate`, `users_idusers`) VALUES
(1, 'test', 'le test', '2019-02-15 09:39:35', 1),
(2, 'Pou du pubis', 'Le pou du pubis (Phtirus pubis ou Phtirius inguinalis), communément appelé morpion, est un pou suceur (sous-ordre des Anoplura). Chez l\'homme, il est la cause de la phtiriase.\r\n\r\nIl diffère des poux standards (Pediculus humanus capitis ou « pou de tête » et Pediculus humanus ou « pou de corps ») par sa morphologie et sa résidence.\r\n\r\nLe morpion est un petit insecte trapu, long de 2 à 3 mm ressemblant à un crabe : il possède un thorax très large portant des pattes puissantes à pseudo-pinces énormes (plus fortes que celles du pou de tête) et un abdomen court et étroit.\r\n\r\nIl se rencontre dans les régions pubienne et périanale. Ce pou se transmet en général par contact sexuel, mais aussi de barbe à barbe ou par contact plus ou moins prolongé avec du linge infesté (serviette de toilette, literie).\r\n\r\nLe pou du pubis se trouve dans les poils pubiens et parfois dans les aisselles. On peut rarement en observer au niveau des sourcils, de la barbe, ou même au niveau du torse pour les personnes pileuses à cet endroit. En effet, comme tous les Anoploures, les poux du pubis ne s\'accrochent qu\'à un type de poil déterminé en fonction du diamètre.\r\n\r\nLes piqûres du morpion, dont les pièces buccales restent presque en permanence insérées dans la peau de son hôte, provoquent de petites lésions bleuâtres et un prurit exacerbé la nuit mais aussi parfois des réactions allergiques sévères. Certaines personnes ne ressentent rien. De plus, le morpion se fond dans la couleur de la peau.\r\n\r\nComme le pou de tête, la femelle pose des lentes sur la base des poils. Les adultes ne peuvent pas survivre plus de 24 heures hors contact avec l\'homme, et les lentes pas plus de huit jours.\r\n\r\nEn argot, le pou du pubis est appelé « morpion » ou « morbac » (aussi orthographié « morbaque »).', '2019-02-15 10:41:29', 2);


SET FOREIGN_KEY_CHECKS=1;
COMMIT;
