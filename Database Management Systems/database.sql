-- TEMA 10: Baza de date se compune din urmatoarele tabele (relatii):
-- tabele:
-- vehicul (NR_VEHICOL, MARCA, TIP, SERIE_MOTOR, SERIE_CAROSERIE, CARBURANT, CULOARE, CAPACITATE_CIL)
-- persoana (NUME, PRENUME, CARTE_IDENTITATE, CNP, Adresa)
-- Proprietate(CNP, NR VEHICOL, DATA CUMPARARII, pret)
-- tip-masina(TIP, COMENTATARII)


--  1. Creati si instantiati baza de date
CREATE DATABASE masini;
USE masini;

-- tabela vehicul
CREATE TABLE vehicul (
  id INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
  nr_vehicul CHAR(8) NOT NULL UNIQUE,
  marca VARCHAR(10) NOT NULL,
  tip VARCHAR(10) NOT NULL,
  serie_motor VARCHAR(30) NOT NULL,
  serie_caroserie VARCHAR(30) NOT NULL UNIQUE,
  carburant VARCHAR(10) NOT NULL,
  culoare VARCHAR(10) NOT NULL,
  capacitate_cil INT NOT NULL
);

-- populare tabela vehicul
INSERT INTO vehicul(nr_vehicul, marca, tip, serie_motor, serie_caroserie, carburant, culoare, capacitate_cil) 
VALUES ('GJ01ABC', 'Opel', 'break', '132123qwe', 'qw12323e123', 'diesel', 'negru', 1200)

INSERT INTO vehicul(nr_vehicul, marca, tip, serie_motor, serie_caroserie, carburant, culoare, capacitate_cil) 
VALUES ('GJ02ABC', 'Volkswagen', 'break', '32313fas', 'vw32162423', 'diesel', 'negru', 1600)

INSERT INTO vehicul(nr_vehicul, marca, tip, serie_motor, serie_caroserie, carburant, culoare, capacitate_cil) 
VALUES ('DJ01DEF', 'Renault', 'break', '4569679rty', 'rt7549y456', 'benzina', 'albastru', 1500)

INSERT INTO vehicul(nr_vehicul, marca, tip, serie_motor, serie_caroserie, carburant, culoare, capacitate_cil) 
VALUES ('B123GHJ', 'Renault', 'coupe', '789ui976o', 'uioe85789', 'diesel', 'gri', 1300)


-- tabela persoana
CREATE TABLE persoana (
  id INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
  nume VARCHAR(20) NOT NULL,
  prenume VARCHAR(20) NOT NULL,
  carte_identitate VARCHAR(50) NOT NULL,
  CNP VARCHAR(50) NOT NULL UNIQUE,
  adresa VARCHAR(50) NOT NULL
)

-- populare tabela persoana
INSERT INTO persoana(nume, prenume, carte_identitate, CNP, adresa)
VALUES ('Ionescu', 'Ion', 'CI', 1900413254074,'Aleea Digului 1, Târgu Jiu, Gorj, România')

INSERT INTO persoana(nume, prenume, carte_identitate, CNP, adresa)
VALUES ('Popescu', 'Mihai', 'CI', 1910223244144,'Calea București 80, Craiova, Dolj, România')

INSERT INTO persoana(nume, prenume, carte_identitate, CNP, adresa)
VALUES ('Georgescu', 'Georgeta', 'CI', 2990210157024, 'Str. Liviu Rebreanu 6A, București, România')


-- tabela proprietate
CREATE TABLE proprietate (
  id INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
  CNP VARCHAR(50) NOT NULL,
  nr_vehicul CHAR(8) NOT NULL,
  data_cumpararii DATE NOT NULL,
  pret INT NOT NULL
)

-- populare tabela proprietate
INSERT INTO proprietate(CNP, nr_vehicul, data_cumpararii, pret)
VALUES (1900413254074, 'GJ01ABC', DATE '2015-12-17', 2500)

INSERT INTO proprietate(CNP, nr_vehicul, data_cumpararii, pret)
VALUES (1900413254074, 'GJ02ABC', DATE '2008-12-12', 1350)

INSERT INTO proprietate(CNP, nr_vehicul, data_cumpararii, pret)
VALUES (1910223244144, 'DJ01DEF', DATE '2018-05-03', 2700)

INSERT INTO proprietate(CNP, nr_vehicul, data_cumpararii, pret)
VALUES (2990210157024, 'B123GHJ', DATE '2020-09-07', 3100)

-- tabela tip_masina
CREATE TABLE tip_masina (
  id INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
  tip VARCHAR(10) NOT NULL,
  comentarii VARCHAR(50)
)

-- populare tabela tip_masina
INSERT INTO tip_masina (tip, comentarii)
VALUES ('break', 'niciunul')

INSERT INTO tip_masina (tip, comentarii)
VALUES ('coupe', 'niciunul')


--  2. Determinati numarul  de marci si  numarul de masini din fiecare marca
SELECT vehicul.marca, 
COUNT(vehicul.marca) AS numar_masini
FROM vehicul 
GROUP BY vehicul.marca

--  3. Determinati marcile si valoarea totala a masinilor cumparate
SELECT vehicul.marca, SUM(proprietate.pret)
FROM vehicul
INNER JOIN proprietate
ON vehicul.nr_vehicul = proprietate.nr_vehicul
GROUP BY vehicul.marca

--  4. Procedura de determinare a numarului si pretul mediu al masinilor din marca Renault
SELECT vehicul.marca,
COUNT(vehicul.marca), 
AVG(proprietate.pret) AS pret_mediu
FROM vehicul
INNER JOIN proprietate
ON vehicul.marca = 'Renault'
GROUP BY vehicul.marca

--  5. Determinati masina cea mai scumpa si proprietarul ei
SELECT pret, persoana.nume, persoana.prenume
FROM proprietate
INNER JOIN persoana
ON proprietate.CNP = persoana.CNP
WHERE pret = (SELECT MAX(pret) FROM proprietate)

--  6. Determinati toti proprietarii cu varsta intre 20-30 ani
SELECT SUBSTR(proprietate.CNP, 2, 2) AS an_nastere, persoana.nume, persoana.prenume
FROM proprietate
INNER JOIN persoana
ON proprietate.CNP = persoana.CNP
WHERE SUBSTR(proprietate.CNP, 2, 2) > 02 AND SUBSTR(proprietate.CNP, 2, 2) < 92
