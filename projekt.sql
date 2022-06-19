-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 03:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(45) NOT NULL,
  `lozinka` varchar(120) NOT NULL,
  `razina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(3, 'admin', '$2y$10$NSIFKi0POEgIXMqKlMNYDOBdO1WLbtEHxaHeftC72m4cNaj0Lsln2', 1),
(4, 'jasamkorisnik', '$2y$10$7EdLWOKNz/X9cK7QRalhyuOik2D6CefOZCSz5pSiUpPk/xCFsSlqO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `slika` varchar(45) NOT NULL,
  `naslov` varchar(30) NOT NULL,
  `kratkiSadrzaj` varchar(100) NOT NULL,
  `sadrzaj` mediumtext NOT NULL,
  `sazetak` varchar(100) NOT NULL,
  `datum` datetime NOT NULL,
  `arhiva` tinyint(1) NOT NULL,
  `kategorija` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `slika`, `naslov`, `kratkiSadrzaj`, `sadrzaj`, `sazetak`, `datum`, `arhiva`, `kategorija`) VALUES
(1, 'politik1.jpg', 'Nur bisschen Schuldzuweisung', 'So einig sind sie selten: Ampel und Union loben den historischen Tag, an dem sie das Sondervermögen.', '<p><span style = \"float: left; margin-top: -15px; padding-right: 1%; font-size: 300%; font-weight: bold;\">E</span>ine Grundgesetzänderung mit Zweidrittelmehrheit wird nicht alle Tage im Bundestag beschlossen.Wenn 100 Milliarden Euro extra für die <span style = \"color: red;\">Bundeswehr</span>.</p>\r\n\r\n<p>Ausgegeben werden sollen und das im Grundgesetz verankert wird, dann verlangt das eine weitreichende Begründung. Die Vertreter der Ampelkoalition boten am Freitag gleich drei Minister auf, um die historische Bedeutung des Aktes hervorzuheben. Einst werde diese Entscheidung mit der Wiederbewaffnung Deutschlands nach dem Zweiten Weltkrieg und dem NATO-Doppelbeschluss verglichen werden, sagte Finanzminister <span style = \"color: red;\">Christian Lindner</span>.</p>\r\n\r\n<p>Seine Partei, die FDP, sei sich ihrer historischen Verantwortung bewusst, die Bundeswehr angesichts des Angriffskriegs Russlands auf die Ukraine zu stärken. Es gehe nicht nur um das notwendige militärische Großgerät, sondern auch um die direkte Ausstattung der Soldaten.</p>', 'ECKART LOHSE UND MARKUS WEHNER', '2022-06-19 13:34:45', 0, 'politik'),
(2, 'politik2.jpg', 'Afrikanische Union: nac Afrika', 'Durch Putins Nahrungsmittelkrise in Ländern. Die Afrikanische Ausfuhrbeschränkungen Russland.', '<p><span style = \"float: left; margin-top: -15px; padding-right: 1%; font-size: 300%; font-weight: bold;\">R</span>usslands <span style = \"color: red;\">Präsident Wladimir Putin</span> ist nach Angaben der Afrikanischen Union bereit, den Export von Getreide aus der Ukraine nach Afrika zu ermöglichen.</p>\r\n\r\n<p>Dies teilte der Präsident der Afrikanischen Union (AU), Macky Sall, nach einem Treffen mit Putin am, Freitag in Sotschi auf Twitter mit. Russland sei weiterhin bereit, den Export von Weizen und Düngemitteln auf den afrikanischen Kontinent zu gewährleisten.</p>\r\n\r\n<p>Putin und der senegalesische Präsident Macky Sall, der bis Februar 2023 den Vorsitz der AU innehat, hatten sich getroffen, um über eine Freigabe aller Lebensmittelprodukte und eine Aufhebung der russische Ausfuhrblockade von Getreide zu sprechen.</p>\r\n\r\n<p>Nach Angaben des Vorsitzenden der Kommission der AU, Moussa Faki Mahamat, der auch an dem Treffen teilnahm, ist die Aussetzung der Getreideblockade notwendig, um die verheerenden wirtschaftlichen und sozioökonomischen Auswirkungen einer wachsenden Lebensmittel - und Energiekrise abzufangen.</p>\r\n\r\n<p>Fraglich ist, ob sich der russische Präsident an eine mögliche Abmachung hält. Gegenüber dem französischsprachigen Magazin „Jeune Afrique“ hat Macky Sall kürzlich in einem Interview gesagt, dass es bereits Anfang März ein Telefonat zwischen ihm und Putin gegeben habe - auf Salls Initiative hin. Darin hatte Sall nach eigenen Angaben gesagt, dass sich Afrika angesichts des Krieges „zwischen Hammer und Amboss“ befände. Damals habe er um einen Waffenstillstand gebeten. Putin hätte Sall signalisiert, dass er für Verhandlungen mit der Ukraine bereit sei.</p>', 'UKRAINE-KRIEG', '2022-06-19 12:37:43', 0, 'politik'),
(3, 'politik3.jpg', 'Jugendlicher festgenommen', ' Der Beschuldigte soll Anleitungen zum Bau von Waffen und Sprengkörpern besitzen und Sprengversuche.', '<p><span style = \"float: left; margin-top: -15px; padding-right: 1%; font-size: 300%; font-weight: bold;\">S</span>icherheitskräfte haben in Brandenburg einen rechtsextremen Gefährder verhaftet. Gegen ihn lag ein Haftbefehl vor.</p>\r\n\r\n<p>Wegen des Verdachts der Vorbereitung einer schweren staatsgefährdenden <span style = \"color: red;\">Gewalttat</span> ist in Potsdam am Freitagmorgen ein Jugendlicher von Beamten des Staatsschutzes in Haft genommen worden.</p>\r\n\r\n<p>Der Beschuldigte soll sich sowohl Anleitungen zum Bau von Waffen, Munition und Sprengkörpern verschafft als auch erste Sprengversuche durchgeführt haben. Das teilten die Polizei und der Generalstaatsanwalt des Landes Brandenburg am Freitag mit.</p>\r\n\r\n<p>Spezialeinsatzkräfte durchsuchten demnach Wohn-, Geschäfts- und Nebenräume des beschuldigten Deutschen. Sie hätten diverse Datenträger sowie Anleitungen zum Bau von Sprengvorrichtungen sichergestellt, hieß es. Die Durchsuchungen fanden nach Informationen der Deutschen Presse-Agentur in Potsdam statt. Spezialkräfte der Polizei unterstützten den Einsatz. </p>\r\n\r\n<p>Die Ermittler waren seit mehreren Monaten auf der Spur des Jugendlichen. In Sozialen Medien versuchte er demnach, vorwiegend Jugendliche für eine „Revolution gegen das System“ zu werben. Gegen ihn wird den Angaben nach auch wegen des Verdachts des Erwerbs und Besitzes kinderpornografischer Schriften ermittelt.</p>', 'RECHTSTERRORISMUS', '2022-06-19 12:47:22', 0, 'politik'),
(4, 'sport1.jpg', 'Die gnadenlose Geldmaschine', 'Der Hunger der Vereine und Verbände nach noch mehr Geld ist nicht zu stillen. Auf dem Rücken.', '<p><span style = \"float: left; margin-top: -15px; padding-right: 1%; font-size: 300%; font-weight: bold;\">V</span>or einigen Wochen, die Bundesliga bog gerade auf die Zielgerade ihrer Saison ein, platzte Christian Streich der Kragen.</p>\r\n\r\n<p>Der Trainer des SC Freiburg, ohnehin eine Art emotionaler Seismograph für die Fehlentwicklungen des modernen Fußballgeschehens, richtete seinen Zorn auf ein Reizthema der Branche. „Absoluter Wahnsinn“, schimpfte Streich, sei inzwischen der Terminkalender im Profifußball, 60 bis 70 Pflichtspiele pro Saison für Nationalspieler einfach zu viel. Bei einem Profi wie Matthias Ginter, der im Sommer nun von Mönchengladbach zu seinen Freiburgern wechselt, habe man deshalb „gemerkt, dass er müde war“, fand er. „Wir müssen schauen, dass er wieder in die Frische kommt. Mental und körperlich.“</p>\r\n\r\n<p>Natürlich ist Streichs Feststellung nicht neu. Das Klagelied der Trainer von den übervollen Spielplänen und den dadurch ausgelaugten Topspielern ist längst eine vertraute Melodie - zumindest im Konzert der Großen. Nachzufragen etwa bei Jürgen Klopp, der mit dem FC Liverpool in dieser Saison Finals in FA Cup, Ligapokal und Champions League erreichte, in der Liga bis zum letzten Spieltag um die Meisterschaft kämpfte und schon oft die Überlastung seiner Profis monierte.</p>', 'GEFÄHRLICHES FUSSBALL-GESCHÄFT', '2022-06-19 12:50:50', 0, 'sport'),
(5, 'sport2.jpg', '„Wir werden ihn unterstützen“', '„Er kann ein Unterschiedsspieler sein“, sagt der Bundestrainer über Bayern-Profi Sané.', '<p><span style = \"float: left; margin-top: -15px; padding-right: 1%; font-size: 300%; font-weight: bold;\">L</span>eroy Sane schnürt sich noch die Fußballschuhe, als seine Kollegen auf dem Trainingsplatz längst Passübungen machen.</p>\r\n\r\n<p>Der kurze Pfiff zum Sammeln von Hansi Flick ertönt, der Münchner muss sich sputen - schließlich stößt er als Letzter zum Kreis, der sich um den Bundestrainer gebildet hat. Es sind Szenen wie diese beim Abschlusstraining für den Klassiker in der Nations League gegen England am Dienstag (20.45 Uhr/ im <span style = \"color: red;\">F.A.Z.-Liveticker zur Nations League</span> und im ZDF), die selbst diejenigen verzweifeln lassen, die es gut mit Sane meinen. Flick gehört dazu. Noch. „Auch bei ihm geht es darum, die Bereitschaft zu zeigen, dass ich im Spiel bin, aktiv bin, die Intensität habe“, sagte Flick am Montag ungewohnt deutlich über sein größtes Sorgenkind.</p>\r\n\r\n<p>Der Bundestrainer streichelt den Bayern-Profi wie keinen zweiten Nationalspieler, im Training umarmt und neckt er ihn. Er weiß: „Leroy kann ein Unterschiedsspieler sein.“ Weil er von den Qualitäten des Bayern-Profis für die deutsche Fußball-Nationalmannschaft absolut überzeugt ist, will Flick ihn weiter fördern: „Wir werden ihn unterstützen und haben absolutes Vertrauen in seine Qualität.“</p>\r\n\r\n<p>Ob er <span style = \"color: red;\">Sané</span> nach dessen mäßiger Leistung <span style = \"color: red;\">beim 1:1 gegen Italien auch am Dienstag</span>beim zweiten Nations-League-Spiel in München gegen England wieder in der Startelf aufbieten wird, ließ der Bundestrainer gleichwohl offen.</p>', 'FLICK GLAUBT EN SANÉ', '2022-06-19 12:55:25', 0, 'sport'),
(6, 'sport3.jpg', 'Jugendlicher staatsgefährdende', 'Der Beschuldigte soll Anleitungen zum Bau von Waffen und Sprengversuche unternommen haben.', '<p><span style = \"float: left; margin-top: -15px; padding-right: 1%; font-size: 300%; font-weight: bold;\">I</span>ronman-Triathlon oder Show-Event? Die Szene war gespalten vor dem Rennen auf dem Lausitzring, wo sich am Sonntag der Norweger Kristian Blummenfelt, der Brite Joe Skipper, die Schweizerin Nicola Spirig und die Britin Kat Matthews daran machten, die Bestzeiten über die Triathlon-Langstrecke unter die Schallmauern von acht Stunden bei den Frauen und sieben Stunden bei den Männern zu schrauben.</p>\r\n\r\n<p>Zeiten, weitaus besser als bisher in Wettkämpfen erzielt. Es war ein Rennen über 1,8 Kilometer Schwimmen, 180 Kilometer Radfahren, 42,195 Kilometer Laufen unter besonderen Bedingungen: optimierte Streckenführung, Abschaffung der Windschattenregel beim Radfahren verbunden mit der Möglichkeit für jeden Starter, zehn Tempomacher einzusetzen, egal ob beim Schwimmen, Radfahren oder Laufen.</p>\r\n\r\n<p>Skipper, der nach dem Schwimmen fünf Minuten Rückstand auf Blummenfelt hatte, legte die 180 Kilometer mit einer  sagenhaften Durchschnittsgeschwindigkeit von 54,9 Kilometern pro Stunde zurück. Acht Spitzenkräfte aus der starken britischen Zeitfahrszene, darunter der ehemalige Stundenweltrekordler Alex Dowsett vom Team Israel Start-Up Nation, der vom <span style = \"color: red;\">Giro dItalia</span> an den Lausitzring gekommen war, zogen Skipper zu einer Zeit von 3:16:42 Stunden. Zum Vergleich: Bei der letzten Ironman-WM auf Hawaii 2019 war er - ohne Windschatten - auf dem Rad mit 4:16:18 Stunden ziemlich genau eine Stunde länger unterwegs.</p>', 'RECHTSTERRORISMUS', '2022-06-19 13:32:08', 0, 'sport');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
