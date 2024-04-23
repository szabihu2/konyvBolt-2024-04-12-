
CREATE TABLE `felhasznalok` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;


INSERT INTO `felhasznalok` (`user_id`, `fname`, `lname`, `email`, `password`) VALUES
(2, 'Ruzsinszki', 'Zita', 'zita@gmail.com', '$2y$10$eRx0dFHQnJcQK1HprQ3CcOnsKPQhVB.O29gtD.Ek80ja2GJvahnKq'),
(5, 'Szabolcs', 'Farkas', 'farkas.szabolcs060@gmail.com', '$2y$10$25uzdMcTb7VnYeziP7AtIODkr5hLNibTnR3hnj13acwH5MQ8bXJrO'),
(6, 'doe', 'jonh', 'jonh.doe01@gmail.com', '$2y$10$Cg2sM/53xsJTAf14CxaB8OeJs4C7CooLt30blKTZKlKRlTan/A2RG');


CREATE TABLE `konyv` (
  `konyvId` int(11) NOT NULL,
  `konyvCim` varchar(255) DEFAULT NULL,
  `kiadasEv` int(11) DEFAULT NULL,
  `szerzo` int(255) DEFAULT NULL,
  `oldalSzam` int(11) DEFAULT NULL,
  `mufaj` int(11) DEFAULT NULL,
  `ar` int(11) DEFAULT NULL,
  `leiras` varchar(255) DEFAULT NULL,
  `kep` varchar(255) DEFAULT NULL,
  `konyvAllapot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `konyv`
--

INSERT INTO `konyv` (`konyvId`, `konyvCim`, `kiadasEv`, `szerzo`, `oldalSzam`, `mufaj`, `ar`, `leiras`, `kep`, `konyvAllapot`) VALUES
(1, 'Élj úgy, mint egy koreai', 2022, 3, 224, 1, 6645, 'Az Oscar-díjas Élősködők, a K-pop, a street food, a kiváló minőségű kozmetikai termékek és a csúcstechnológia - Dél-Korea világszerte egyre népszerűbb. De vajon mennyire ismered az igazi Koreát és az ott élőket? Ez a nagyszerű útikalauz bevezet az ország ', NULL, 'jó állapot'),
(2, 'Bakancslista - Magyarország - 777 lenyűgöző hazai kaland és úti cél', 2023, 13, 360, 1, 8549, '777 lenyűgöző és izgalmas hazai utazásra csábít a Bakancslista - Magyarország. Páratlan ötletekkel szolgál, ha csak egy rövid kiruccanásra, hétvégi kirándulásra vagy akár hosszabb országnézésre vágynánk.', NULL, 'sérült'),
(3, 'Nápoly ', 2022, 15, 114, 1, 4265, 'VilágVándor sorozatunkkal Európa egy-egy városába, kistérségébe kalauzoljuk\r\naz utazót. Törekvésünk szerint ezek az életszerű, változatos, könnyed és korszerű, funkcionális útikönyvek a mai turizmus igényeit hivatottak kielégíteni. ', NULL, 'kopott'),
(4, 'Firenze és Toszkána – Útikalauz', 2005, 22, 128, 1, 4389, 'Ez a praktikus és jól áttekinthető útikalauz kiemeli Firenze és Toszkána jelentősebb területeit, bemutatva a fő látványosságokat.', NULL, 'kopott'),
(5, 'Örményország - A legendák földje', 2019, 17, 380, 1, 5652, 'Örményország, ez a rendkívül gazdag \"szabadtéri múzeum\" több okból is megérdemli, hogy a magyar turista felkeresse.', NULL, 'jó állapot'),
(6, 'Ceruzarajz - Minden, amit a ceruza használatáról tudni kell', 2022, 2, 126, 2, 3040, 'A világszerte tucatnyi országban és nyelven megjelenő oktatókönyvek - Művészeti anatómia, Rajz ABC, Nagy rajziskola - szerzője, Szunyoghy András grafikusművész legújabb munkája nélkülözhetetlen mindazok számára, akik most ismerkednek a ceruzarajzolás szép', NULL, 'sérült'),
(7, 'Ezt a könyvet kell elolvasnod, ha jó fotókat akarsz készíteni', 2020, 18, 128, 2, 4747, 'Rémisztő grafikonok, átláthatatlan műszaki ábrák, akadémiai fotóművészeti szaknyelv? Az Ezt a könyvet kell elolvasnod, ha jó fotókat akarsz készíteni mindezek nélkül, tiszta és érthető nyelven vezet be a kompozíció, az expozíció, a fény, a lencsék és a le', NULL, 'kopott'),
(8, 'Géniusz kvízkönyv - 4000 lebilincselő kérdés', 2023, 9, 448, 2, 5690, 'Az ATV történetének egyik legsikeresebb produkciója lett egy műsor, amelyben nem is igen történik több, mint, hogy okos emberek Gundel Takács Gábor kvízkérdéseire válaszolnak. A magyar szakemberek által létrehozott Géniusz visszaadta a reményt abban, hogy', NULL, 'jó állapot'),
(9, 'Zöldfűszerek - termesztéstől felhasználásig', 2022, 12, 84, 2, 3795, 'Bármilyen kis méretű kertünk van, vagy a teraszunkon, előkertünkben elfér egy kis magaságyás, érdemes a kedvenc fűszernövényeinkből\r\n\"kézközelbe\" telepíteni, hogy a szükséges pár szálat mindig frissen használhassuk fel.\r\nA könyv 33 fűszernövényről tömören', NULL, 'sérült'),
(10, 'Nagypálya - Tehetségképzés a labdarúgó-akadémiákon', 2024, 7, 268, 2, 4227, 'Miért jöttek létre Magyarországon labdarúgó-akadémiák? Mi hívta életre őket? Kétségtelen, hogy a magyar futball az elmúlt évtizedekben rendkívül sok kritikát kapott, hiszen az egykoron világszínvonalon teljesítő hazai labdarúgás utolsó fél évszázadára egé', NULL, 'jó állapot'),
(11, 'Érzelemszabályozás a gyakorlatban - Újrakapcsolódás a belső biztonsághoz', 2021, 11, 227, 3, 3667, 'Mit tehetünk akkor, amikor épp nincs külső segítség, magunkra maradtunk a gondjainkkal, és úgy tűnik, hogy a helyzeten nem, vagy csak alig-alig tudunk változtatni?', NULL, 'kopott'),
(12, 'Azonnali elemzés ', 2022, 19, 330, 3, 4190, 'Ha nem az az ember vagy, aki lenni szeretnél, vagy nem azt az életet éled, amelyet élni akarsz, valószínű, hogy az életed le van csupaszítva a beidegződött magatartásbéli válaszok hálózatára, és be van zárva az ideálok, a szokások.', NULL, 'jó állapot'),
(13, 'Gyógyító és kapcsolódó játékok ', 2020, 21, 245, 3, 3790, 'A világhírű gyermekpszichológus könyvében olyan játéktevékenységekkel ismerkedhetünk meg, amelyek által büntetés és jutalmazás nélkül oldhatunk meg nevelési, fegyelmezési problémákat, és segítséget nyújthatunk.', NULL, 'kopott'),
(14, 'Bátran élni - Félelmeink és gátlásaink leküzdése', 2015, 24, 275, 3, 3800, 'Rengeteg gátlás és félelem van bennünk még a legegyszerűbb helyzetekben is -rettegünk attól, hogy ha megmutatunk magunkból valamit, akkor kitesszük magunkat mások kritikájának, ítéletének, elutasításának.\r\n', NULL, 'jó állapot'),
(15, 'Én és te', 2023, 20, 343, 3, 5699, 'Dr. Csernus Imre élő előadásai mindig népszerűek, ha azonban a párkapcsolatok adják a témát, kivétel nélkül zsúfolásig megtelik a terem.', NULL, 'sérült'),
(16, 'A pénz pszichológiája - Időtlen leckék vagyonról, mohóságról és boldogságról', 2023, 10, 269, 4, 5690, 'A pénz életünk minden területén jelen van, mindannyiunkat befolyásol, és legtöbbünket összezavar. Mindenki kicsit másképpen gondolkodik róla.\r\nAz, hogy mennyire bánsz jól a pénzzel, nem szükségszerűen azon múlik, amit tudsz.', NULL, 'kopott'),
(17, 'Győzz meg és uralkodj! - A meggyőzés tudományának üzleti gyakorlata', 2019, 1, 132, 4, 4740, '\"\"Szerintem minden jól ment, de a végén mégsem nálam vásárolt az ügyfél és nem értem, mi lehetett a gond.\"\r\nRengeteg értékesítő tanácstalan, mert úgy érzi, elméletileg mindent jól csinált, de mégsem járt sikerrel.', NULL, 'jó allapot'),
(18, 'Az intelligens befektető', 2011, 23, 517, 4, 8540, '\"Egyértelműen a legjobb könyv amit a befektetésekről valaha is írtak!\"- ezekkel a szavakkal méltatta Warren Buffet, a világ legnagyobb befektetési guruja tanárának és mentorának örök érvényű pénzügyi bibliáját. ', NULL, 'sérült'),
(19, 'Bitcoin Standard - A központi bankok decentralizált alternatívája', 2022, 5, 304, 4, 5695, 'Amikor egy álnév mögé bújó programozó bemutatott egy új elektronikus készpénzrendszert egy jelentéktelen levelezőlistán 2008-ban, csupán nagyon kevesen figyeltek oda rá. ', NULL, 'jó állapot'),
(20, 'Gazdag papa, szegény papa', 2013, 5, 171, 4, 4740, 'Mit tanítanak a gazdag szülők gyermekeiknek a pénzről, amit a szegények és a középosztálybeliek nem tanítanak meg?\r\n\r\nEz a könyv lerombolja a mítoszt, mely szerint a magas jövedelem az egyetlen út a gazdagsághoz.', NULL, 'sérült'),
(21, '4% univerzum ', 2021, 6, 366, 5, 4726, 'Az utóbbi évtizedekben egy maroknyi tudós egymással versengve munkálkodott azon, hogy megmagyarázza azt a nyugtalanító tényt, hogy világegyetemünknek csak 4%-át teszi ki az az anyag.', NULL, 'jó állapot'),
(22, 'A mindenség vége', 2022, 14, 223, 5, 3000, 'Katie Mack elméleti asztrofizikus, az univerzum kezdetét, evolúcióját és végét kutató csillagászati és fizikai kozmológia számos területével foglalkozik. ', NULL, 'sérült'),
(23, 'Értsük meg a fákat', 2024, 8, 220, 5, 3999, '\"Minden egyes fa ezer történetet mesél arról, hogy mi formálta a karakterét, mi sebezte meg a kérgét és a lényét, mi tette egyedivé.\"\r\n\r\n', NULL, 'kopott'),
(24, 'A mélyen elrejtett valóság', 2023, 4, 332, 5, 3990, ',,Azt hiszem, nyugodtan állíthatom, hogy a kvantummechanikát senki sem érti\" - jelentette ki Richard Feynman egyik sokat idézett írásában. N. David Mermin szállóigévé vált megfogalmazása szerint pedig: ,,Fogd be a szád, és számolj!\" ', NULL, 'jó állapot'),
(25, 'Az ember vége a természet esélye', 2023, 16, 281, 5, 3999, 'A tét az emberiség túlélése. Mi a teendő azonban akkor, amikor az ember által felépített globális rendszer fenyegeti saját túlélését és a természet egyensúlyának fennmaradását? ', NULL, 'sérült');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mufajok`
--

CREATE TABLE `mufajok` (
  `mufajId` int(11) NOT NULL,
  `mufajNev` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `mufajok`
--

INSERT INTO `mufajok` (`mufajId`, `mufajNev`) VALUES
(1, 'Utazás'),
(2, 'Hobbi, szabadidő'),
(3, 'Társ, tudományok'),
(4, 'Pénz, gazdaság, üzleti élet'),
(5, 'Tudomány és Természet');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerzok`
--

CREATE TABLE `szerzok` (
  `szerzoId` int(11) NOT NULL,
  `szerzoNev` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szerzok`
--

INSERT INTO `szerzok` (`szerzoId`, `szerzoNev`) VALUES
(1, 'Újszászi Bogár László'),
(2, 'Szunyoghy András'),
(3, 'Soo Kim'),
(4, 'Sean Carroll'),
(5, 'Saifedean Ammous '),
(6, 'Richard Panek'),
(7, 'Rábai Dávid'),
(8, 'Peter Wohlleben'),
(9, 'Neumann Viktor'),
(10, 'Morgan Housel'),
(11, 'Mogyorósy-Révész Zsuzsanna'),
(12, 'Megyeri Szabolcs'),
(13, 'Kocsis Noémi'),
(14, 'Katie Mack'),
(15, 'Juszt Róbert'),
(16, 'Jordán Ferenc'),
(17, 'Joó András'),
(18, 'Henry Carroll'),
(19, 'Dr. David J. Lieberman'),
(20, 'Dr. Csernus Imre'),
(21, 'Dr. Aletha J. Solter'),
(22, 'Caroline Koubé'),
(23, 'Benjamin Graham'),
(24, 'Almási Kitti');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerzokapcsolo`
--

CREATE TABLE `szerzokapcsolo` (
  `kapcsolasId` int(11) NOT NULL,
  `konyvId` int(11) DEFAULT NULL,
  `szerzoId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szerzokapcsolo`
--

INSERT INTO `szerzokapcsolo` (`kapcsolasId`, `konyvId`, `szerzoId`) VALUES
(1, 17, 1),
(2, 6, 2),
(3, 1, 3),
(4, 24, 4),
(5, 19, 5),
(6, 20, 5),
(7, 21, 6),
(8, 10, 7),
(9, 23, 8),
(10, 8, 9),
(11, 16, 10),
(12, 11, 11),
(13, 9, 12),
(14, 2, 13),
(15, 22, 14),
(16, 3, 15),
(17, 25, 16),
(18, 5, 17),
(19, 7, 18),
(20, 12, 19),
(21, 15, 20),
(22, 13, 21),
(23, 4, 22),
(24, 18, 23),
(25, 14, 24);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tranzakciok`
--

CREATE TABLE `tranzakciok` (
  `adasvitelId` int(11) NOT NULL,
  `konyvId` int(11) DEFAULT NULL,
  `felhasznaloId` int(11) DEFAULT NULL,
  `tranzakciokDatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tranzakciok`
--

INSERT INTO `tranzakciok` (`adasvitelId`, `konyvId`, `felhasznaloId`, `tranzakciokDatum`) VALUES
(1, 21, 2, '2000-01-01'),
(3, 21, 2, '2000-01-01');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `konyv`
--
ALTER TABLE `konyv`
  ADD PRIMARY KEY (`konyvId`),
  ADD KEY `mufaj` (`mufaj`),
  ADD KEY `szerzo` (`szerzo`);

--
-- A tábla indexei `mufajok`
--
ALTER TABLE `mufajok`
  ADD PRIMARY KEY (`mufajId`);

--
-- A tábla indexei `szerzok`
--
ALTER TABLE `szerzok`
  ADD PRIMARY KEY (`szerzoId`);

--
-- A tábla indexei `szerzokapcsolo`
--
ALTER TABLE `szerzokapcsolo`
  ADD PRIMARY KEY (`kapcsolasId`),
  ADD KEY `szerzoId` (`szerzoId`),
  ADD KEY `konyvId` (`konyvId`);

--
-- A tábla indexei `tranzakciok`
--
ALTER TABLE `tranzakciok`
  ADD PRIMARY KEY (`adasvitelId`),
  ADD KEY `felhasznaloId` (`felhasznaloId`),
  ADD KEY `konyvId` (`konyvId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `szerzokapcsolo`
--
ALTER TABLE `szerzokapcsolo`
  MODIFY `kapcsolasId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `konyv`
--
ALTER TABLE `konyv`
  ADD CONSTRAINT `konyv_ibfk_1` FOREIGN KEY (`mufaj`) REFERENCES `mufajok` (`mufajId`),
  ADD CONSTRAINT `konyv_ibfk_2` FOREIGN KEY (`mufaj`) REFERENCES `mufajok` (`mufajId`);

--
-- Megkötések a táblához `szerzokapcsolo`
--
ALTER TABLE `szerzokapcsolo`
  ADD CONSTRAINT `szerzokapcsolo_ibfk_1` FOREIGN KEY (`szerzoId`) REFERENCES `szerzok` (`szerzoId`),
  ADD CONSTRAINT `szerzokapcsolo_ibfk_2` FOREIGN KEY (`konyvId`) REFERENCES `konyv` (`konyvId`);

--
-- Megkötések a táblához `tranzakciok`
--
ALTER TABLE `tranzakciok`
  ADD CONSTRAINT `tranzakciok_ibfk_1` FOREIGN KEY (`felhasznaloId`) REFERENCES `felhasznalok` (`user_id`),
  ADD CONSTRAINT `tranzakciok_ibfk_2` FOREIGN KEY (`konyvId`) REFERENCES `konyv` (`konyvId`);
COMMIT;
