-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Úte 17. čen 2025, 21:38
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `knihovna`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `autori`
--

CREATE TABLE `autori` (
  `id_aut` int(11) NOT NULL,
  `jmeno_aut` varchar(30) NOT NULL,
  `prijmeni_aut` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `autori`
--

INSERT INTO `autori` (`id_aut`, `jmeno_aut`, `prijmeni_aut`) VALUES
(1, 'J.K', 'Rowling'),
(2, 'Tatka', ' smoula'),
(3, 'Majk', 'Klega'),
(4, 'Franz', 'Kafka'),
(5, 'Frank', 'Herbert'),
(6, 'Pierce', 'Brown'),
(7, 'Jerome', 'Klapka Jerome');

-- --------------------------------------------------------

--
-- Struktura tabulky `kniha_zanr`
--

CREATE TABLE `kniha_zanr` (
  `id_knih` int(11) NOT NULL,
  `id_zanr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `kniha_zanr`
--

INSERT INTO `kniha_zanr` (`id_knih`, `id_zanr`) VALUES
(36, 1),
(37, 2),
(38, 2),
(38, 3),
(39, 1),
(39, 7),
(40, 1),
(40, 7),
(41, 1),
(41, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `knihy`
--

CREATE TABLE `knihy` (
  `id_knih` int(11) NOT NULL,
  `jmeno_knih` varchar(40) NOT NULL,
  `id_aut` int(11) NOT NULL,
  `obsah_knih` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `knihy`
--

INSERT INTO `knihy` (`id_knih`, `jmeno_knih`, `id_aut`, `obsah_knih`) VALUES
(36, 'Harry potter a kamen mudrcu', 1, 'Až do svých jedenáctých narozenin si o sobě Harry myslel, že je jen obyčejný chlapec. Pak ale dostal soví poštou přijímací dopis z prestižní soukromé Školy čar a kouzel v Bradavicích a jeho život se rázem proměnil.\r\n\r\nOslavte 25. výročí vydání prvního dílu milované kouzelnické série! V knize, jejíž obálku ilustrovala spoluzakladatelka ilustrátorského studia Tomski & Polanski, se magie světa J.K. Rowlingové ukazuje v těch nejúžasnějších barvách…'),
(37, 'Mein kampf', 2, 'Šmoulince už delší dobu vrtá hlavou, proč všichni šmoulové ve vesnici jsou něčím výjimeční, jen ona ne. Koumák je chytrý, Silák má svaly a Nešika je… prostě nešika. Když šmoulí kamarádi uvidí v Zakázaném lese úplně neznámého šmoulu, Šmoulinka hned ví, co si počít. Začne vetřelce sledovat! Jenže Šmoulinka není jediná, kdo jde po jeho stopách. Snaží se ji předběhnout zlý čaroděj Gargamel! Koumák, Silák i Nešika běží Šmoulince na pomoc, ale co když Gargamel objeví ztracenou šmoulí vesnici jako první?'),
(38, 'Umění války', 3, 'Know thy self, know thy enemy. A thousand battles, a thousand victories.\r\n- Majkl Klega'),
(39, 'Duna', 5, 'In 1965, after being rejected by more than a dozen publishing houses, a book called \"Dune\" was brought out by the Chilton Book Company. Its respected author, journalist Frank Herbert, had written \"Dune\" with nothing more in mind than to entertain his readers with the telling of a particularly complex story, one which had occupied his thoughts for more than six years. No one - not Herbert, not Chilton, not the science fiction community at the time - had any idea that \"Dune\" would be adopted and read by successive generations with a fervor bordering on cult worship. Or that it would prove to be merely the first of what have now become five international bestsellers about a desert world of the future - the planet Arrakis, called Dune.'),
(40, 'Rudý úsvit', 6, 'Darrow je Rudý, člen nejnižší kasty v barevně rozdělené společnosti budoucnosti. Stejně jako ostatní Rudí celé dny pracuje a věří, že povrch Marsu se mění v obyvatelný pro příští generace. Ale Darrow a jeho lid byli podvedeni – lidstvo se na povrch dostalo již velmi dávno, po planetě se roztahují velká města a rozlehlé parky a Rudí nejsou pro dekadentní vládnoucí třídu nic než otroci.\r\n\r\nHnán touhou po spravedlnosti i vzpomínkou na svou ztracenou lásku, Darrow obětuje vše, aby infiltroval legendární Institut, místo zkoušek pro dominantní kastu Zlatých. Bude muset soupeřit o svůj život s těmi nejlepšími a nejkrutějšími z vládnoucí třídy Společnosti. Aby své nepřátele porazil, nezastaví se před ničím. I kdyby to znamenalo stát se jedním z nich.'),
(41, 'test', 2, 'test');

-- --------------------------------------------------------

--
-- Struktura tabulky `komentare`
--

CREATE TABLE `komentare` (
  `id_kom` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `text_kom` int(11) NOT NULL,
  `hodnoceni_kom` tinyint(4) NOT NULL,
  `datum_kom` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id_u` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `heslo` varchar(40) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `zanry`
--

CREATE TABLE `zanry` (
  `id_zanr` int(11) NOT NULL,
  `jmeno_zanr` varchar(40) NOT NULL,
  `bg_color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `zanry`
--

INSERT INTO `zanry` (`id_zanr`, `jmeno_zanr`, `bg_color`) VALUES
(1, 'Fantasy', 'bg-red-500'),
(2, 'Historie', 'bg-yellow-800'),
(3, 'Drama', 'bg-green-500'),
(4, 'Komedie', 'bg-pink-500'),
(5, 'Thriller', 'bg-gray-500'),
(6, 'Horror', 'bg-red-900'),
(7, 'Dobrodružná', 'bg-yellow-500');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`id_aut`);

--
-- Indexy pro tabulku `kniha_zanr`
--
ALTER TABLE `kniha_zanr`
  ADD PRIMARY KEY (`id_knih`,`id_zanr`),
  ADD KEY `id_zanr` (`id_zanr`);

--
-- Indexy pro tabulku `knihy`
--
ALTER TABLE `knihy`
  ADD PRIMARY KEY (`id_knih`);

--
-- Indexy pro tabulku `komentare`
--
ALTER TABLE `komentare`
  ADD PRIMARY KEY (`id_kom`);

--
-- Indexy pro tabulku `zanry`
--
ALTER TABLE `zanry`
  ADD PRIMARY KEY (`id_zanr`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `autori`
--
ALTER TABLE `autori`
  MODIFY `id_aut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `knihy`
--
ALTER TABLE `knihy`
  MODIFY `id_knih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pro tabulku `komentare`
--
ALTER TABLE `komentare`
  MODIFY `id_kom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `zanry`
--
ALTER TABLE `zanry`
  MODIFY `id_zanr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `kniha_zanr`
--
ALTER TABLE `kniha_zanr`
  ADD CONSTRAINT `kniha_zanr_ibfk_1` FOREIGN KEY (`id_knih`) REFERENCES `knihy` (`id_knih`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kniha_zanr_ibfk_2` FOREIGN KEY (`id_zanr`) REFERENCES `zanry` (`id_zanr`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
