-- TEMA 6: Evidenta stocurilor dintr-un supermarket. Baza de date se compune din urmatoarele
-- tabele:
-- articol(COD_ARTICOL, DENUMIRE, STOC, UM, PRET_UNITAR)
-- furnizor(COD_FURNIZOR, DENUMIRE, ADRESA)
-- vanzari(COD_FACTURA, COD_ARTICOL, CANTITATE, DATA_CALENDAR, COST)
-- intrari(COD_FACTURA, COD_ARTICOL, CANTITATE_FURNIZATA)
create database stoc_supermarket;
use stoc_supermarket;
CREATE TABLE `articol` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cod_articol INT NOT NULL,
  denumire VARCHAR(50) NOT NULL UNIQUE,
  stoc INT NOT NULL,
  um VARCHAR(20) NOT NULL,
  pret_unitar DECIMAL(10, 2) NOT NULL
);

CREATE TABLE `furnizor` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cod_furnizor INT NOT NULL,
  denumire VARCHAR(50) NOT NULL UNIQUE,
  adresa VARCHAR(50) NOT NULL
);

CREATE TABLE `vanzari` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cod_factura INT NOT NULL,
  cod_articol INT NOT NULL,
  cantitate INT NOT NULL,
  data_calendar DATETIME DEFAULT CURRENT_TIMESTAMP,
  cost INT NOT NULL
);

CREATE TABLE `intrari` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cod_furnizor INT NOT NULL,
  cod_articol INT NOT NULL,
  cantitate_furnizata INT NOT NULL
);

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (100, 'Paine', 50, 'buc', 1)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (101, 'Cafea', 30, 'buc', 10)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (102, 'Lapte', 20, 'buc', 3.5)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (103, 'Zahar', 50, 'buc', 5.2)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (104, 'Oua', 100, 'buc', 0.5)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (105, 'Servetele masa', 24, 'buc', 11.5)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (106, 'Caiet', 150, 'buc', 2.0)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (107, 'Paste', 14, 'buc', 4.5)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (108, 'Ulei', 50, 'buc', 3.25)

INSERT INTO articol(cod_articol, denumire, stoc, um, pret_unitar)
VALUES (109, 'Apa', 120, 'buc', 2.0)



INSERT INTO furnizor(cod_furnizor, denumire, adresa)
VALUES (1948, 'Remia', 'Str. Remus 28, Craiova')

INSERT INTO furnizor(cod_furnizor, denumire, adresa)
VALUES (1949, 'Columna', 'Str. Liviu Rebreanu 2, Tg-Jiu')

INSERT INTO furnizor(cod_furnizor, denumire, adresa)
VALUES (1950, 'Chocostar', 'Str. Cuza Voda 85, Oradea')

INSERT INTO furnizor(cod_furnizor, denumire, adresa)
VALUES (1951, 'Dacerom', 'Str. Aleea Haiducului 1, Bucuresti')

INSERT INTO furnizor(cod_furnizor, denumire, adresa)
VALUES (1952, 'ISafe', 'Str. Florilor, Salonta')

INSERT INTO furnizor(cod_furnizor, denumire, adresa)
VALUES (1953, 'Velpitar', 'Str. Nicolae Balcescu 129, Bals')



INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1001, 100, 10, 10)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1002, 101, 5, 50)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1003, 102, 15, 52.5)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1004, 103, 1, 5.2)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1005, 104, 2, 1)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1006, 105, 4, 46)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1007, 106, 10, 20)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1008, 107, 4, 18)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1009, 108, 2, 6.5)

INSERT INTO vanzari(cod_factura, cod_articol, cantitate, cost)
VALUES (1010, 109, 10, 20)



INSERT INTO intrari(cod_furnizor, cod_articol, cantitate_furnizata)
VALUES (1948, 101, 10)

INSERT INTO intrari(cod_furnizor, cod_articol, cantitate_furnizata)
VALUES (1949, 102, 15)

INSERT INTO intrari(cod_furnizor, cod_articol, cantitate_furnizata)
VALUES (1950, 103, 20)

INSERT INTO intrari(cod_furnizor, cod_articol, cantitate_furnizata)
VALUES (1951, 104, 25)

INSERT INTO intrari(cod_furnizor, cod_articol, cantitate_furnizata)
VALUES (1952, 105, 30)


-- 3. Determinati cat costa catitatea vanduta din fiecare produs.
SELECT vanzari.cost, vanzari.cantitate, vanzari.cod_articol, articol.denumire 
FROM vanzari
INNER JOIN articol
ON vanzari.cod_articol = articol.cod_articol


-- 4. Procedura care determina stocul si cantitatea vanduta pentru un anumit produs.
SELECT vanzari.cantitate AS cantitate_vanduta, articol.stoc, articol.denumire
FROM vanzari
INNER JOIN articol
ON vanzari.cod_articol = articol.cod_articol

-- 5. Procedura care determina produsele ce nu s-au vandut deloc intr-o anumita perioada.
SELECT vanzari.cantitate, articol.denumire
FROM articol
INNER JOIN vanzari
WHERE articol.cod_articol = vanzari.cod_articol 
AND (data_calendar BETWEEN '2021-05-17' AND '2021-05-18')

-- 6. Determinati cantitatea vinduta pentru fiecare produs.
SELECT vanzari.cost, articol.denumire 
FROM vanzari
INNER JOIN articol
ON vanzari.cod_articol = articol.cod_articol

