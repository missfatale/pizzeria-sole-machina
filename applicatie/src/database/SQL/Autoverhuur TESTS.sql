-- Gebruik de Autoverhuur Database
USE Autoverhuur;

-- Opdracht 2a --
-- Opdracht 2a-1
UPDATE Auto SET kleur = 'Blauw' WHERE kenteken = 'FG-SR-79';

-- Opdracht 2a-2
UPDATE Accessoire SET omschrijving = 'Babystoeltje XL' WHERE accessoirenaam = 'BABYSTLGR';

-- Opdracht 2a-3
UPDATE Autotype SET prijs_per_dag = prijs_per_dag*1.1;

-- Opdracht 2a-4
DELETE FROM Wenst_accessoire WHERE huurcontract = 994412;
DELETE FROM Probleem WHERE huurcontract = 994412;
DELETE FROM Huurcontract WHERE klant = 165321;
DELETE FROM Klant WHERE klantnr = 165321;

-- Opdracht 2a-5
UPDATE Probleem SET huurcontract = 995513, nr = 3 WHERE huurcontract = 994412;



-- Opdracht 3b --
-- Opdracht 3b-1
-- Niet Hetzelfde Kenteken
INSERT INTO Auto (autonr, autotype, kenteken, merk, modelnaam, kleur, is_automaat, is_elektrisch, is_in_orde) VALUES 
    (9, 'SUV5', 'FG-SR-80', 'Ford', 'Focus', 'Rood', 1, 0, 0);
DELETE FROM Auto WHERE autonr = 9;

-- Wel Hetzelfde Kenteken (Error)
INSERT INTO Auto (autonr, autotype, kenteken, merk, modelnaam, kleur, is_automaat, is_elektrisch, is_in_orde) VALUES 
    (9, 'SUV5', 'FG-SR-79', 'Ford', 'Focus', 'Rood', 1, 0, 0);

-- Opdracht 3b-2

-- Geaccepteerd Adres
INSERT INTO Locatie (locatiecode, naam, adres, postcode, plaats, land) VALUES
    ('SCHIPAIRP2', 'Schiphol Airport', 'Hoofdweg 28', '1276GH', 'Amsterdam', 'Nederland');
DELETE FROM Locatie WHERE adres = 'Hoofdweg 28';

-- Niet Geaccepteerd Adres
INSERT INTO Locatie (locatiecode, naam, adres, postcode, plaats, land) VALUES
    ('SCHIPAIRP2', 'Schiphol Airport', 'Hoofdweg 27', '1278GH', 'Amsterdam', 'Nederland');

-- Opdracht 3b-3
-- Geaccepteerd Datum
INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (994800, 165321, '2024-08-04', '2024-08-04', 'SCHIPAIRP', 'BERLCENTR', 'SUV5', 1, 0, 8);
DELETE FROM Huurcontract WHERE contractnr = 994800;

-- Niet Geaccepteerd Datum
INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (994801, 165321, '2024-08-05', '2024-08-04', 'SCHIPAIRP', 'BERLCENTR', 'SUV5', 1, 0, 8);

-- Opdracht 3b-5

-- Geaccepteerd Constateer Moment
INSERT INTO Probleem (huurcontract, nr, omschrijving, is_schade, geconstateerd_bij, is_opgelost, kosten) VALUES
    (994412, 2, 'Deuk op linker voorportier', 1, 'terugbrengen', 0, 700.00);
DELETE FROM Probleem WHERE huurcontract = 994412 AND nr = 2;

-- Niet Geaccepteerd Constateer Moment (Error)
INSERT INTO Probleem (huurcontract, nr, omschrijving, is_schade, geconstateerd_bij, is_opgelost, kosten) VALUES
    (994412, 2, 'Deuk op linker voorportier', 1, 'thuis', 0, 700.00);



-- Opdracht 4a --
-- Opdracht 4a-1
SELECT Huurcontract.contractnr, Klant.klantnr, CONCAT(Klant.voornaam, ' ', Klant.tussenvoegsels, ' ', Klant.achternaam) AS volledige_naam, Huurcontract.van_datum, Huurcontract.wenst_autotype, Autotype.omschrijving 
FROM Huurcontract 
INNER JOIN Klant ON Huurcontract.klant = Klant.klantnr
INNER JOIN Autotype ON Autotype.typecode = Huurcontract.wenst_autotype
WHERE YEAR (Huurcontract.van_datum) = 2024
ORDER BY Huurcontract.van_datum ASC;

-- Opdracht 4a-2
SELECT Huurcontract.contractnr, Klant.klantnr, CONCAT(Klant.voornaam, ' ', Klant.tussenvoegsels, ' ', Klant.achternaam) AS volledige_naam, Huurcontract.van_datum, Auto.kenteken, Auto.merk
FROM Huurcontract 
INNER JOIN Klant ON Huurcontract.klant = Klant.klantnr
INNER JOIN Auto ON Huurcontract.wenst_autotype = Auto.autotype



-- Opdracht 4b --
-- Opdracht 4b-1
SELECT merk, COUNT (*) AS keer_huurcontract 
FROM Auto 
GROUP BY merk;

-- Opdracht 4b-2
SELECT locatiecode, naam, COUNT (*) AS aantal_autos 
FROM Locatie
INNER JOIN Huurcontract ON Huurcontract.locatie_ophalen = Locatie.locatiecode
WHERE YEAR (Huurcontract.van_datum) = 2024
GROUP BY locatiecode, naam
HAVING COUNT (*) > 2;

-- Opdracht 4b-3
SELECT Huurcontract.contractnr, Huurcontract.van_datum, ((Autotype.prijs_per_dag  + SUM(Wenst_accessoire.aantal * Accessoire.prijs_per_dag)) * DATEDIFF(day, Huurcontract.van_datum, Huurcontract.tot_datum)) 
AS totale_prijs 
FROM Huurcontract
INNER JOIN Auto ON Auto.autonr = Huurcontract.krijgt_auto
INNER JOIN Autotype ON Autotype.typecode = Auto.autotype
INNER JOIN Wenst_accessoire ON Wenst_accessoire.huurcontract = Huurcontract.contractnr
INNER JOIN Accessoire ON Accessoire.accessoirenaam = Wenst_accessoire.accessoire
WHERE Huurcontract.tot_datum < CONVERT(DATE, GETDATE())
GROUP BY Huurcontract.contractnr, Huurcontract.van_datum, Huurcontract.tot_datum, Autotype.prijs_per_dag;



-- Opdracht 5b --
-- ALTER TABLE instructies (Opdracht 5b-1)

-- AutoType Correct
INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (1, 165321, '2024-07-16', '2024-12-20', 'SCHIPAIRP', 'BERLCENTR', 'SUV5', 1, 0, 8)
DELETE FROM Huurcontract WHERE contractnr = 1;

-- AutoType Niet Correct (Error)
INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (2, 165321, '2024-07-16', '2024-12-20', 'SCHIPAIRP', 'BERLCENTR', 'SUV5', 1, 0, 2)

-- ALTER TABLE instructies (Opdracht 5b-2)

-- AutoType Correct
INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (1, 165321, '2024-01-01', '2024-01-07', 'SCHIPAIRP', 'BERLCENTR', 'SUV5', 1, 0, 4)
DELETE FROM Huurcontract WHERE contractnr = 1;

-- AutoType Correct IF tot_datum is NULL
INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (1, 165321, '2024-09-01', '2024-09-24', 'SCHIPAIRP', 'BERLCENTR', 'SUVLUXE', 1, 0, 3)
DELETE FROM Huurcontract WHERE contractnr = 1;

-- AutoType Niet Correct (Error)
INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (2, 165321, '2024-01-05', '2024-01-10', 'SCHIPAIRP', 'BERLCENTR', 'SUV5', 1, 0, 2)

-- AutoType Niet Correct IF tot_datum is NULL (Error)
INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (2, 165321, '2024-10-01', '2024-10-10', 'SCHIPAIRP', 'BERLCENTR', 'SUVLUXE', 1, 0, 3)