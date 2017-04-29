-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 29 Avril 2017 à 20:25
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `img_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `name`, `description`, `price`, `img_url`, `number`, `category`) VALUES
(14, 'Kingdom Hearts II for PS2', 'This is an action role-playing game developed and published by Square Enix in 2005 for the PlayStation 2 video game console. The game is a sequel to Kingdom Hearts, which combined Disney and Square elements into an action role-playing game, though it is somewhat darker in tone than its predecessor. The game\'s popularity has resulted in a novel and manga series based upon it and an international version called Kingdom Hearts II Final Mix, released in March 2007.', 20, 'https://upload.wikimedia.org/wikipedia/en/e/ed/Kingdom_Hearts_II_%28PS2%29.jpg', 10000, 1),
(15, 'Persona 5 for PS3', 'This is a role-playing video game developed by Atlus for the PlayStation 3 and PlayStation 4 video game consoles. Persona 5 is chronologically the sixth installment in the Persona series, which is part of the larger Megami Tensei franchise. Published by Atlus in Japan and North America and by Deep Silver in Europe and Australia, the game was released first in Japan in September 2016, and worldwide in April 2017. In Western regions, Persona 5 was the first main game in the series since Persona 2: Eternal Punishment to omit the Shin Megami Tensei moniker.', 49, 'https://upload.wikimedia.org/wikipedia/en/b/b0/Persona_5_cover_art.jpg', 9996, 1),
(16, 'Zelda Breath Wild for Switch', 'The Legend of Zelda: Breath of the Wild is an open world action-adventure video game developed and published by Nintendo for the Nintendo Switch and Wii U video game consoles. The game is a part of the The Legend of Zelda series, and follows amnesiac protagonist Link, who awakens from a 100-year slumber to a mysterious voice that guides him to defeat Calamity Ganon before he can destroy the kingdom of Hyrule.', 52, 'https://cdn3.vox-cdn.com/uploads/chorus_asset/file/7802443/NintendoSwitch_TLOZBreathoftheWild_boxart.jpg', 9997, 1),
(17, 'Code geass', 'Code Geass: Lelouch of the Rebellion (コードギアス 反逆のルルーシュ Kōdo Giasu: Hangyaku no Rurūshu?), often referred to as simply Code Geass, is a Japanese anime series created by Sunrise, directed by Gorō Taniguchi, and written by Ichirō Ōkouchi, with original character designs by manga authors Clamp. Set in an alternate timeline, the series focuses on how the former prince Lelouch vi Britannia obtains a power known as Geass and decides to use it to obliterate the Holy Britannian Empire, a superpower that has been conquering various countries.', 25, 'https://upload.wikimedia.org/wikipedia/en/0/08/Code_Geass_DVD_Part3.png', 30, 2),
(18, 'Angel Beats!', 'Angel Beats! (エンジェルビーツ!, Enjeru Bītsu!?) is a 13-episode Japanese anime television series produced by P.A.Works and Aniplex and directed by Seiji Kishi. The story was originally conceived by Jun Maeda, who also wrote the screenplay and composed the music with the group Anant-Garde Eyes, with original character design by Na-Ga; both Maeda and Na-Ga are from the visual novel brand Key, who produced such titles as Kanon, Air, and Clannad. The anime aired in Japan between April 3 and June 26, 2010. An original video animation (OVA) episode was released in December 2010, and a second OVA was released in June 2015. The story takes place in the afterlife and focuses on Otonashi, a boy who lost his memories of his life after dying. He is enrolled into the afterlife school and meets a girl named Yuri who invites him to join the Afterlife Battlefront, an organization she leads which fights against the student council president Angel, a girl with supernatural powers.', 29, 'https://upload.wikimedia.org/wikipedia/en/a/a5/Angel_Beats%21_DVD_Complete_Collection_cover.jpg', 40, 2),
(19, 'Dakimakura Hatsune Miku', 'There is it! The latest dakimakura of Hatsune Miku. Sleep well tonight...!', 29, 'http://www.hxchector.com/wp-content/uploads/2015/06/what_is_a_dakimakura4.jpg', 499, 6),
(20, 'Fullmetal Alchemist: Brotherhood', 'Fullmetal Alchemist: Brotherhood (Japanese: 鋼の錬金術師 FULLMETAL ALCHEMIST Hepburn: Hagane no Renkinjutsushi: Furumetaru Arukemisuto?) is an anime series adapted from the Fullmetal Alchemist manga by Hiromu Arakawa. Produced by Bones, the series is directed by Yasuhiro Irie and written by Hiroshi Ōnogi. Fullmetal Alchemist: Brotherhood is the second anime television series based on Fullmetal Alchemist, the first being 2003\'s Fullmetal Alchemist. Unlike the previous adaptation, Brotherhood is a 1:1 adaptation directly following the original events of the manga. It was first announced in the manga series\' 20th tankōbon volume.[1] In Japan, it is differentiated from the 2003 series by the inclusion of the English language title. The series premiered on April 5, 2009, on MBS-TBS\' Sunday 5:00 PM JST anime time block, replacing Mobile Suit Gundam 00, and ran weekly until airing its final episode on July 4, 2010. Voice actresses Romi Park and Rie Kugimiya reprise their roles as main characters Edward and Alphonse Elric, respectively.', 15, 'https://upload.wikimedia.org/wikipedia/en/9/9c/Fullmetal_Alchemist_Brotherhood.jpg', 50, 2),
(21, 'Attack on Titan', 'Attack on Titan (Japanese: 進撃の巨人 Hepburn: Shingeki no Kyojin?, lit. "Attacking Titan") is a Japanese manga series written and illustrated by Hajime Isayama. The series began in Kodansha\'s Bessatsu Shōnen Magazine on September 9, 2009, and has been collected into 21 tankōbon volumes as of December 2016. It is set in a world where humanity lives in cities surrounded by enormous walls; a defense against the Titans, gigantic humanoids that eat humans seemingly without reason. The story initially centers on Eren Yeager, his adopted sister Mikasa Ackerman and childhood friend Armin Arlert, who join the military to fight the Titans after their home town is invaded and Eren\'s mother is eaten. However, as the story progresses and the truths about the Titans are slowly revealed to the reader, the narrative shifts to encompass Historia Reiss, squad leader Levi, Eren\'s father Grisha, and other supporting characters.', 5, 'https://upload.wikimedia.org/wikipedia/en/d/d6/Shingeki_no_Kyojin_manga_volume_1.jpg', 19, 3),
(22, 'One Piece', 'One Piece (Japanese: ワンピース Hepburn: Wan Pīsu?) is a Japanese manga series written and illustrated by Eiichiro Oda. It has been serialized in Shueisha\'s Weekly Shōnen Jump magazine since July 19, 1997, with the chapters collected into eighty-four tankōbon volumes to date. One Piece follows the adventures of Monkey D. Luffy, a young man whose body gained the properties of rubber after unintentionally eating a Devil Fruit. With his crew of pirates, named the Straw Hat Pirates, Luffy explores the Grand Line in search of the world\'s ultimate treasure known as "One Piece" in order to become the next Pirate King.', 6, 'https://upload.wikimedia.org/wikipedia/en/9/90/One_Piece%2C_Volume_61_Cover_%28Japanese%29.jpg', 25, 3),
(23, 'Doraemon', 'Doraemon (Japanese: ドラえもん) is a Japanese manga series written and illustrated by Fujiko F. Fujio. The series has also been adapted into a successful anime series and media franchise. The story revolves around a robotic cat named Doraemon, who travels back in time from the 22nd century to aid a pre-teen boy named Nobita Nobi (野比のび太 Nobi Nobita?).', 4, 'https://upload.wikimedia.org/wikipedia/en/c/c8/Doraemon_volume_1_cover.jpg', 11, 3),
(24, 'Music from the Motion Picture Pulp Fiction', 'Music from the Motion Picture Pulp Fiction is the soundtrack to Quentin Tarantino\'s 1994 film Pulp Fiction. No traditional film score was commissioned for Pulp Fiction. The film contains a mix of American rock and roll, surf music, pop and soul. The soundtrack is equally untraditional, consisting of nine songs from the movie, four tracks of dialogue snippets followed by a song, and three tracks of dialogue alone. Seven songs featured in the movie were not included in the original 41-minute soundtrack.', 17, 'https://upload.wikimedia.org/wikipedia/en/d/da/PulpFictionSoundtrack.jpg', 49, 4),
(25, 'Tron: Legacy (soundtrack)', 'Tron: Legacy is the soundtrack album to the 2010 film of the same name, released by Walt Disney Records on December 3, 2010.[2] It is the first film score by French music duo Daft Punk.', 18, 'https://upload.wikimedia.org/wikipedia/en/3/39/Tron_Legacy_Soundtrack.jpg', 79, 4),
(26, 'The Social Network (soundtrack)', 'The Social Network is a dark ambient soundtrack by Trent Reznor and Atticus Ross for David Fincher\'s film of the same name. It was released on September 28, 2010.[1] On September 17, a five-track sampler was also made available for free.[2] The film\'s score bears a similar sound to the previous Reznor/Ross 2008 collaboration, Ghosts I-IV, and even features two slightly reworked tracks from Ghosts : the track "Magnetic" (reworked from "14 Ghosts II") and "A Familiar Taste" (a remixed version of "35 Ghosts IV").', 19, 'https://upload.wikimedia.org/wikipedia/en/1/17/TSN-cover-CD.jpg', 10, 4),
(27, 'Nine Hours, Nine Persons, Nine Doors', 'Nine Hours, Nine Persons, Nine Doors[a] is a visual novel adventure game developed by Chunsoft. The game is the first installment in the Zero Escape series, which also includes Virtue\'s Last Reward and Zero Time Dilemma. It was released in Japan in 2009 and in North America in 2010 for the Nintendo DS, with an iOS version following in 2013 in Japan and 2014 in the rest of the world. A high-definition remake was published in 2017 for Microsoft Windows, PlayStation 4, and PlayStation Vita, as part of the Zero Escape: The Nonary Games bundle, together with Virtue\'s Last Reward.', 30, 'https://upload.wikimedia.org/wikipedia/en/f/f1/Nine_Hours%2C_Nine_Persons%2C_Nine_Doors_Cover_Art.jpg', 50, 5),
(28, 'Phoenix Wright: Ace Attorney', 'Phoenix Wright: Ace Attorney, known in Japan as Gyakuten Saiban (逆転裁判?, lit. "Turnabout Trial"), is a visual novel adventure video game developed by Capcom. It was originally released for the Game Boy Advance in 2001 in Japan, and has since been ported to multiple platforms. The Nintendo DS version, titled Gyakuten Saiban Yomigaeru Gyakuten in Japan, was released in 2005 in Japan and North America, and in 2006 in Europe, and includes an English language option. The game is the first entry in the Ace Attorney series, and has received several sequels and spin-offs.', 30, 'https://upload.wikimedia.org/wikipedia/en/7/73/Phoenix_Wright_-_Ace_Attorney_Coverart.png', 40, 5),
(29, 'Kanon (visual novel)', 'Kanon (カノン?) is a Japanese adult visual novel developed by Key released on June 4, 1999 for Windows PCs. Key later released versions of Kanon without the erotic content, and the game was ported to the Dreamcast, PlayStation 2 and PlayStation Portable. The story follows the life of Yuichi Aizawa, a high school student who returns to a city he last visited seven years prior, and he has little recollection of the events from back then. He meets several girls and slowly regains his lost memories. The gameplay in Kanon follows a branching plot line which offers pre-determined scenarios with courses of interaction, and focuses on the appeal of the five female main characters by the player character. The game once ranked as the second best-selling PC game sold in Japan, and charted in the national top 50 several more times afterwards. Kanon has sold over 300,000 units across several platforms.', 30, 'https://upload.wikimedia.org/wikipedia/en/7/74/Kanon_original_game_cover.gif', 130, 5);

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'user10', 'user10', 'test@test.fr', 'test@test.fr', 1, 'vLZPU5bcM5TDNKem3cd9975Wl06vee8m65aUaSkfUv0', 'O5g3fLrdhXtasr3AnO5+39nvDi5nd75QpB3Hch6KavGgbzHZIszKfPWq545fO+YuzjmsjC8iqG9BFvwNSh39cg==', '2017-04-28 18:20:44', NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}'),
(2, 'user', 'user', 'user@user.com', 'user@user.com', 1, 'qjXVMB1NdbeuoGrIoW67nyy4Sle4FNFgKG9.kmYc6KA', 'NwMxK4WG+NV5V/EiVNd5eD5oaEY6RQh8gMp6eKf5I6qOUGdoljUA9/GkB1RyLjmZS8JbVB1W7Iobrg3NGyR4eg==', '2017-04-29 20:18:39', NULL, NULL, 'a:0:{}'),
(3, 'admin', 'admin', 'admin@admin.com', 'admin@admin.com', 1, 'yrPo5302KZzx1h5KmlVN8fBNCCR1Ym3/IaEI0bUv9sA', 'TISbKOM/IsdTixWHpsCskLgyju4sbkNuf75NUUKZF94tcgqnjMKFr5SlMeFe54l+6A+tyzQaSlY0eFlPYoOOrw==', '2017-04-29 20:20:05', NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_id` int(11) NOT NULL,
  `order_at` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`id`, `name`, `article_id`, `order_at`, `username`, `email`) VALUES
(1, 'DVD', 1, '2017-04-20 00:00:00', 'User1', 'User1@mail.com'),
(2, 'anime : Pokémon', 2, '2017-04-19 00:00:00', 'User2', 'user2@mail.com'),
(3, 'OST : Zelda Breath Wild', 3, '2017-04-20 00:01:37', 'User1', 'user1@mail.com'),
(4, 'Zelda Breath Wild for Switch', 6, '2017-04-25 20:19:21', 'user', 'email@email'),
(5, 'Persona 5 for PS3', 7, '2017-04-25 20:19:22', 'user', 'email@email'),
(6, 'Zelda Breath Wild for Switch', 6, '2017-04-25 20:24:38', 'user', 'email@email'),
(7, 'Persona 5 for PS3', 7, '2017-04-25 20:24:39', 'user', 'email@email'),
(8, 'Zelda Breath Wild for Switch', 6, '2017-04-25 20:31:27', 'user', 'email@email'),
(9, 'Persona 5 for PS3', 7, '2017-04-25 20:31:28', 'user', 'email@email'),
(10, 'Persona 5 for PS3', 7, '2017-04-27 20:18:27', 'user', 'email@email'),
(11, 'Persona 5 for PS3', 7, '2017-04-28 18:12:18', 'user', 'email@email'),
(12, 'Zelda Breath Wild for Switch', 13, '2017-04-28 18:15:13', 'user', 'email@email'),
(13, 'Dakimakura Hatsune Miku', 8, '2017-04-28 18:21:06', 'user10', 'test@test.fr'),
(14, 'Attack on Titan', 21, '2017-04-29 20:19:38', 'user', 'user@user.com'),
(15, 'Music from the Motion Picture Pulp Fiction', 24, '2017-04-29 20:19:38', 'user', 'user@user.com'),
(16, 'Doraemon', 23, '2017-04-29 20:19:38', 'user', 'user@user.com'),
(17, 'Tron: Legacy (soundtrack)', 25, '2017-04-29 20:19:38', 'user', 'user@user.com');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `created_at`, `role`) VALUES
(1, 'user1', 'user1', 'user1@user', '2015-05-06 00:00:00', 'USER_ROLE'),
(2, 'user2', 'user2', 'user2@user', '2017-04-21 00:00:00', 'USER_ROLE'),
(3, 'lol', 'azerty', 'lol@lolo', '2017-04-27 00:00:00', 'USER_ROLE');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_23A0E665E237E06` (`name`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
