-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 11 Février 2016 à 19:51
-- Version du serveur :  5.7.9-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `prevalid_com` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `prevalid_com`) VALUES
(1, 'root@root.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 1);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `resume` text,
  `contenu` text NOT NULL,
  `auteur_id` int(10) unsigned NOT NULL,
  `date_publication` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_auteur_article` (`auteur_id`),
  KEY `index_date_article` (`date_publication`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `resume`, `contenu`, `auteur_id`, `date_publication`) VALUES
(1, 'Confession', 'Une fois, une seule, aimable et douce femme,\r\nA mon bras votre bras poli\r\nS''appuya (sur le fond ténébreux de mon âme\r\nCe souvenir n''est point pâli) ;', 'Une fois, une seule, aimable et douce femme,\r\nA mon bras votre bras poli\r\nS''appuya (sur le fond ténébreux de mon âme\r\nCe souvenir n''est point pâli) ;\r\n\r\nIl était tard ; ainsi qu''une médaille neuve\r\nLa pleine lune s''étalait,\r\nEt la solennité de la nuit, comme un fleuve,\r\nSur Paris dormant ruisselait.\r\n\r\nEt le long des maisons, sous les portes cochères,\r\nDes chats passaient furtivement,\r\nL''oreille au guet, ou bien, comme des ombres chères,\r\nNous accompagnaient lentement.\r\n\r\nTout à coup, au milieu de l''intimité libre\r\nÉclose à la pâle clarté,\r\nDe vous, riche et sonore instrument où ne vibre\r\nQue la radieuse gaieté,\r\n\r\nDe vous, claire et joyeuse ainsi qu''une fanfare\r\nDans le matin étincelant,\r\nUne note plaintive, une note bizarre\r\nS''échappa, tout en chancelant\r\n\r\nComme une enfant chétive, horrible, sombre, immonde,\r\nDont sa famille rougirait,\r\nEt qu''elle aurait longtemps, pour la cacher au monde,\r\nDans un caveau mise au secret.\r\n\r\nPauvre ange, elle chantait, votre note criarde :\r\n" Que rien ici-bas n''est certain,\r\nEt que toujours, avec quelque soin qu''il se farde,\r\nSe trahit l''égoïsme humain ;\r\n\r\nQue c''est un dur métier que d''être belle femme,\r\nEt que c''est le travail banal\r\nDe la danseuse folle et froide qui se pâme\r\nDans un sourire machinal ;\r\n\r\nQue bâtir sur les coeurs est une chose sotte ;\r\nQue tout craque, amour et beauté,\r\nJusqu''à ce que l''Oubli les jette dans sa hotte\r\nPour les rendre à l''Éternité ! "\r\n\r\nJ''ai souvent évoqué cette lune enchantée,\r\nCe silence et cette langueur,\r\nEt cette confidence horrible chuchotée\r\nAu confessionnal du coeur.', 1, '2014-10-20 14:43:07'),
(2, 'Sonnet d''automne', 'Ils me disent, tes yeux, clairs comme le cristal :\r\n" Pour toi, bizarre amant, quel est donc mon mérite ? "\r\n- Sois charmante et tais-toi ! Mon coeur, que tout irrite,\r\nExcepté la candeur de l''antique animal,\r\n\r\nNe veut pas te montrer son secret infernal,\r\nBerceuse dont la main aux longs sommeils m''invite,\r\nNi sa noire légende avec la flamme écrite.\r\nJe hais la passion et l''esprit me fait mal !\r\n\r\nAimons-nous doucement. L''Amour dans sa guérite,\r\nTénébreux, embusqué, bande son arc fatal.\r\nJe connais les engins de son vieil arsenal :\r\n\r\nCrime, horreur et folie ! - Ô pâle marguerite !\r\nComme moi n''es-tu pas un soleil automnal,\r\nÔ ma si blanche, ô ma si froide Marguerite ?', 'Ils me disent, tes yeux, clairs comme le cristal :\r\n" Pour toi, bizarre amant, quel est donc mon mérite ? "\r\n- Sois charmante et tais-toi ! Mon coeur, que tout irrite,\r\nExcepté la candeur de l''antique animal,\r\n\r\nNe veut pas te montrer son secret infernal,\r\nBerceuse dont la main aux longs sommeils m''invite,\r\nNi sa noire légende avec la flamme écrite.\r\nJe hais la passion et l''esprit me fait mal !\r\n\r\nAimons-nous doucement. L''Amour dans sa guérite,\r\nTénébreux, embusqué, bande son arc fatal.\r\nJe connais les engins de son vieil arsenal :\r\n\r\nCrime, horreur et folie ! - Ô pâle marguerite !\r\nComme moi n''es-tu pas un soleil automnal,\r\nÔ ma si blanche, ô ma si froide Marguerite ?', 1, '2014-10-24 16:38:23'),
(3, 'Le dormeur du val', 'C''est un trou de verdure où chante une rivière,\r\nAccrochant follement aux herbes des haillons\r\nD''argent ; où le soleil, de la montagne fière,\r\nLuit : c''est un petit val qui mousse de rayons.', 'C''est un trou de verdure où chante une rivière,\r\nAccrochant follement aux herbes des haillons\r\nD''argent ; où le soleil, de la montagne fière,\r\nLuit : c''est un petit val qui mousse de rayons.\r\n\r\nUn soldat jeune, bouche ouverte, tête nue,\r\nEt la nuque baignant dans le frais cresson bleu,\r\nDort ; il est étendu dans l''herbe, sous la nue,\r\nPâle dans son lit vert où la lumière pleut.\r\n\r\nLes pieds dans les glaïeuls, il dort. Souriant comme\r\nSourirait un enfant malade, il fait un somme :\r\nNature, berce-le chaudement : il a froid.\r\n\r\nLes parfums ne font pas frissonner sa narine ;\r\nIl dort dans le soleil, la main sur sa poitrine,\r\nTranquille. Il a deux trous rouges au côté droit.', 1, '2014-10-28 07:50:25'),
(4, 'Les corbeaux', 'Seigneur, quand froide est la prairie,\r\nQuand dans les hameaux abattus,\r\nLes longs angelus se sont tus...\r\nSur la nature défleurie\r\nFaites s''abattre des grands cieux\r\nLes chers corbeaux délicieux.', 'Seigneur, quand froide est la prairie,\r\nQuand dans les hameaux abattus,\r\nLes longs angelus se sont tus...\r\nSur la nature défleurie\r\nFaites s''abattre des grands cieux\r\nLes chers corbeaux délicieux.\r\n\r\nArmée étrange aux cris sévères,\r\nLes vents froids attaquent vos nids !\r\nVous, le long des fleuves jaunis,\r\nSur les routes aux vieux calvaires,\r\nSur les fossés et sur les trous\r\nDispersez-vous, ralliez-vous !\r\n\r\nPar milliers, sur les champs de France,\r\nOù dorment des morts d''avant-hier,\r\nTournoyez, n''est-ce pas, l''hiver,\r\nPour que chaque passant repense !\r\nSois donc le crieur du devoir,\r\nÔ notre funèbre oiseau noir !\r\n\r\nMais, saints du ciel, en haut du chêne,\r\nMât perdu dans le soir charmé,\r\nLaissez les fauvettes de mai\r\nPour ceux qu''au fond du bois enchaîne,\r\nDans l''herbe d''où l''on ne peut fuir,\r\nLa défaite sans avenir.', 2, '2014-10-06 07:07:42'),
(5, 'Demain dès l''aube', 'Demain, dès l''aube, à l''heure où blanchit la campagne,\r\nJe partirai. Vois-tu, je sais que tu m''attends.', 'Demain, dès l''aube, à l''heure où blanchit la campagne,\r\nJe partirai. Vois-tu, je sais que tu m''attends.\r\nJ''irai par la forêt, j''irai par la montagne.\r\nJe ne puis demeurer loin de toi plus longtemps.\r\n\r\nJe marcherai les yeux fixés sur mes pensées,\r\nSans rien voir au dehors, sans entendre aucun bruit,\r\nSeul, inconnu, le dos courbé, les mains croisées,\r\nTriste, et le jour pour moi sera comme la nuit.\r\n\r\nJe ne regarderai ni l''or du soir qui tombe,\r\nNi les voiles au loin descendant vers Harfleur,\r\nEt quand j''arriverai, je mettrai sur ta tombe&lt;\r\nUn bouquet de houx vert et de bruyère en fleur.', 1, '2014-10-30 22:25:30'),
(6, 'Après l''hiver', 'N''attendez pas de moi que je vais vous donner \r\nDes raisons contre Dieu que je vois rayonner ; \r\nLa nuit meurt, l''hiver fuit ; maintenant la lumière, \r\nDans les champs, dans les bois, est partout la première. \r\nJe suis par le printemps vaguement attendri. ', 'N''attendez pas de moi que je vais vous donner \r\nDes raisons contre Dieu que je vois rayonner ; \r\nLa nuit meurt, l''hiver fuit ; maintenant la lumière, \r\nDans les champs, dans les bois, est partout la première. \r\nJe suis par le printemps vaguement attendri. \r\nAvril est un enfant, frêle, charmant, fleuri ; \r\nJe sens devant l''enfance et devant le zéphyre \r\nJe ne sais quel besoin de pleurer et de rire ; \r\nMai complète ma joie et s''ajoute à mes pleurs. \r\nJeanne, George, accourez, puisque voilà des fleurs. \r\nAccourez, la forêt chante, l''azur se dore, \r\nVous n''avez pas le droit d''être absents de l''aurore. \r\nJe suis un vieux songeur et j''ai besoin de vous, \r\nVenez, je veux aimer, être juste, être doux, \r\nCroire, remercier confusément les choses, \r\nVivre sans reprocher les épines aux roses,\r\nÊtre enfin un bonhomme acceptant le bon Dieu.\r\n\r\nÔ printemps ! bois sacrés ! ciel profondément bleu ! \r\nOn sent un souffle d''air vivant qui vous pénètre, \r\nEt l''ouverture au loin d''une blanche fenêtre ;\r\nOn mêle sa pensée au clair-obscur des eaux ; \r\nOn a le doux bonheur d''être avec les oiseaux \r\nEt de voir, sous l''abri des branches printanières, \r\nCes messieurs faire avec ces dames des manières.', 3, '2014-10-20 05:07:45'),
(7, 'Le désespoir est assis sur un banc', 'Dans un square sur un banc\r\nIl y a un homme qui vous appelle quand on passe\r\nIl a des binocles un vieux costume gris\r\nIl fume un petit ninas il est assis\r\nEt il vous appelle quand on passe', 'Dans un square sur un banc\r\nIl y a un homme qui vous appelle quand on passe\r\nIl a des binocles un vieux costume gris\r\nIl fume un petit ninas il est assis\r\nEt il vous appelle quand on passe\r\nOu simplement il vous fait signe\r\nIl ne faut pas le regarder\r\nIl ne faut pas l''écouter\r\nIl faut passer\r\nFaire comme si on ne le voyait pas\r\nComme si on ne l''entendait pas\r\nIl faut passer et presser le pas\r\nSi vous le regardez\r\nSi vous l''écoutez\r\nIl vous fait signe et rien personne\r\nNe peut vous empêcher d''aller vous asseoir près de lui\r\nAlors il vous regarde et sourit\r\nEt vous souffrez atrocement\r\nEt l''homme continue de sourire\r\nEt vous souriez du même sourire\r\nExactement\r\nPlus vous souriez plus vous souffrez\r\nAtrocement\r\nPlus vous souffrez plus vous souriez\r\nIrrémédiablement\r\nEt vous restez là\r\nAssis figé\r\nSouriant sur le banc\r\nDes enfants jouent tout près de vous\r\nDes passants passent\r\nTranquillement\r\nDes oiseaux s''envolent\r\nQuittant un arbre\r\nPour un autre\r\nEt vous restez là\r\nSur le banc\r\nEt vous savez vous savez\r\nQue jamais plus vous ne jouerez\r\nComme ces enfants\r\nVous savez que jamais plus vous ne passerez\r\nTranquillement\r\nComme ces passants\r\nQue jamais plus vous ne vous envolerez\r\nQuittant un arbre pour un autre\r\nComme ces oiseaux.', 1, '2014-10-01 08:10:35'),
(8, 'Un beau matin', 'Il n''avait peur de personne \r\nIl n''avait peur de rien \r\nMais un matin un beau matin \r\nIl croit voir quelque chose ', 'Il n''avait peur de personne \r\nIl n''avait peur de rien \r\nMais un matin un beau matin \r\nIl croit voir quelque chose \r\nMais il dit Ce n''est rien \r\nEt il avait raison \r\nAvec sa raison sans nul doute \r\nCe n'' était rien \r\nMais le matin ce même matin \r\nIl croit entendre quelqu''un \r\nEt il ouvrit la porte \r\nEt il la referma en disant Personne \r\nEt il avait raison \r\nAvec sa raison sans nul doute \r\nIl n''y avait personne \r\nMais soudain il eut peur \r\nEt il comprit qu''Il était seul \r\nMais qu''Il n''était pas tout seul \r\nEt c''est alors qu''il vit \r\nRien en personne devant lui \r\n', 4, '2014-10-11 16:50:17');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `valide` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_com` (`article_id`),
  KEY `index_date_commentaire` (`date_commentaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `article_id`, `pseudo`, `email`, `contenu`, `date_commentaire`, `valide`) VALUES
(1, 1, 'leila', 'leile@pour.com', 'Mangifique', '2014-11-10 05:06:47', 1),
(3, 2, '', '', 'Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopulis sunt controversa.', '2014-11-14 06:34:30', 1),
(4, 2, '', '', 'Quel joli texte, j''adore !', '2014-11-05 23:07:52', 1),
(5, 3, 'Loulou', 'loulou@gmail.com', 'C''est gai tout ça...', '2014-11-26 05:42:04', 1),
(6, 4, '', '', 'Tellement beau, on ne s''en lasse pas.', '2014-11-23 07:44:33', 0),
(7, 5, '', '', 'Incroyable !!!', '2014-11-22 12:05:34', 1),
(8, 5, '', '', 'Pas mal, j''aime bien', '2014-11-24 08:47:15', 1),
(9, 8, 'Moi', 'philippine.chombart@gmail.com', 'Exceptionnel, mais un peu triste quand même...', '2014-11-15 21:56:05', 0),
(10, 5, '', '', 'Mouais, pas convaincue...', '2014-11-09 09:09:09', 1),
(11, 1, '', '', 't nunc si ad aliquem bene nummatum tumentemque ideo honestus advena salutatum introieris, primitus tamquam exoptatus suscipieris et interrogatus multa coactusque mentiri, miraberis numquam antea visus summatem virum tenuem te sic enixius observantem, ut paeniteat ob haec bona tamquam praecipua non vidisse ante decennium Romam.', '2014-11-10 05:06:47', 1),
(12, 1, '', '', 'Très joli', '2014-11-04 04:47:35', 1),
(13, 2, '', '', 'J''ai pas tout compris...', '2014-11-14 06:34:30', 1),
(14, 2, 'Lila', 'lila@poert.com', 'Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutel', '2014-11-05 23:07:52', 1),
(15, 3, 'Philippe', 'Phillipe@ferty.com', 'cabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo sup', '2014-11-26 05:42:04', 1),
(16, 4, 'Erteze', 'ertyyf@gttyee.com', 's quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate tradunt omnia des', '2014-11-23 07:44:33', 0),
(17, 5, '', '', 'na salutatum introieris, primitus tamquam exoptatus suscipieris et interrogatus multa coactusque mentiri, miraberis numquam antea visus summatem virum tenuem te sic enixius observantem,', '2014-11-22 12:05:34', 1),
(18, 5, 'Moi', 'moi@moi.fr', 'Per hoc minui studium suum existimans Paulus, ut erat in conplicandis negotiis artifex dirus, unde ei Catenae inditum est cognomentum, vicarium ipsum eos quibus praeerat adhuc defensantem ad sortem p', '2014-11-24 08:47:15', 1),
(19, 8, 'dracula', 'dracula@frtyu.com', 'orumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres finge', '2014-11-15 21:56:05', 0),
(20, 5, 'Raton', 'raton@laveur.com', ' quoddam sublime numinis efficacis, humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veter', '2014-11-09 09:09:09', 1),
(21, 1, 'Seb', 'Sebaste@trous.com', 'Mangifique', '2014-11-10 05:06:47', 1),
(22, 1, 'Charlie', 'Charlie@josy.com', 'Oportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.', '2014-11-04 04:47:35', 1),
(23, 2, 'Camille', 'Cacaca@poiure.com', 'Oportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.', '2014-11-14 06:34:30', 1),
(24, 2, 'Lili', 'lili@prttys.com', 'm opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate tradu', '2014-11-05 23:07:52', 1),
(25, 3, '', '', 'Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis, humanarum mentium opinione lunar', '2014-11-26 05:42:04', 1),
(26, 4, '', '', 'Tellement beau, on ne s''en lasse pas.', '2014-11-23 07:44:33', 0),
(27, 5, 'Fred', 'fred@fred.com', 'Magique, super géniale !', '2014-11-22 12:05:34', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
