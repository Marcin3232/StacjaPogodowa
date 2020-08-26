-- Utworzenie w bazie danych tabeli użytkownicy
-- gdzie przechowywane są dane logowania

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(255)  DEFAULT NULL,
  `nazwisko` varchar(255) DEFAULT NULL,
  `login` varchar(255)  NOT NULL,
  `haslo` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `logowanie` varchar(255)  NOT NULL,
  `ip` int(15) NOT NULL,
  `dutworzenia` varchar(255)  NOT NULL,
  `godzutworzenia` varchar(255)  NOT NULL
);

-- Utworzenie tabeli logs, gdzie beda przechowywane dane z czujników


CREATE TABLE `logs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `temperatura` varchar(30) DEFAULT NULL,
  `wilgotnosc` varchar(30)  DEFAULT NULL,
  `cisnienie` varchar(30)  DEFAULT NULL,
  `uwagi` varchar(50)  DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `TimeStamp` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mTime` varchar(255) NOT NULL,
  `czujnik` varchar(255) NOT NULL
);

