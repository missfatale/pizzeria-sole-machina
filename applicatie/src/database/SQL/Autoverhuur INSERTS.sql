-- Gebruik de Autoverhuur Database
USE Autoverhuur;

-- DELETE instructies (Opdracht 1b)
DELETE FROM Probleem;
DELETE FROM Wenst_accessoire;
DELETE FROM Accessoire;
DELETE FROM Huurcontract;
DELETE FROM Klant;
DELETE FROM Auto;
DELETE FROM Autotype;
DELETE FROM Locatie;



-- INSERT instructies (Opdracht 1b)
INSERT INTO Klant (klantnr, voornaam, tussenvoegsels, achternaam, emailadres) VALUES 
    (165321, 'Sjaak', 'van de', 'Hoek', 'sjakievdhoek@mailinator.com'),
    (176342, 'Bernadetta', NULL, 'Hamerslag', 'b.hamerslag@mailinator.com'),
    (184632, 'Jan', 'van', 'Dijk', 'jan.vandijk@gmail.com'),
    (195474, 'Sophie', NULL, 'Jansen', 'sophie.jansen@hotmail.com'),
    (184607, 'Ali', 'de', 'Groot', 'ali.degroot@outlook.com');

INSERT INTO Accessoire (accessoirenaam, omschrijving, prijs_per_dag) VALUES
    ('BABYSTLGR', 'Babystoel groot', 5.00),
    ('NAVXL', 'Navigatie XL', 4.00),
    ('HONDNET', 'Hondennet', 3.50),
    ('ZITVERH', 'Zitverhoging voor kinderen', 4.00),
    ('FIETSDRAAG', 'Fietsendrager', 8.00);

INSERT INTO Locatie (locatiecode, naam, adres, postcode, plaats, land) VALUES
    ('SCHIPAIRP', 'Schiphol Airport', 'Hoofdweg 27', '1276GH', 'Amsterdam', 'Nederland'),
    ('BERLCENTR', 'Berlijn Centrum', 'Hauptstraße 78', '10317', 'Berlijn', 'Duitsland'),
    ('ROTTMAAS2', 'Maasvlakte 2', 'Havenweg 128', '3356BP', 'Rotterdam', 'Nederland'),
    ('ARNHMCENTR', 'Arnhem Centrum', 'Schaapsdrift 66', '6824GT', 'Arnhem', 'Nederland'),
    ('GENTCENTR', 'Gent Centrum', 'Ter Platen 12', '9000', 'Gent', 'België'),
    ('AMSCENTR', 'Amsterdam Centrum', 'Jodenbreestraat 11', '1011NG', 'Amsterdam', 'Nederland');

INSERT INTO Autotype (typecode, omschrijving, aantal_personen, prijs_per_dag, url_image) VALUES 
    ('SUV5', 'Kleine SUV, 5-persoons', 5, 25.50, NULL),
    ('SUV7', 'Grote SUV, 7-persoons', 7, 37.00, NULL),
    ('SEDAN5', 'Kleine SEDAN, 4-persoons', 4, 20.00, NULL),
    ('SEDAN7', 'Grote SEDAN 5 persoons', 5, 25.00, NULL),
    ('SUVLUXE', 'Luxe SUV', 7, 50.00, NULL);

INSERT INTO Auto (autonr, autotype, kenteken, merk, modelnaam, kleur, is_automaat, is_elektrisch, is_in_orde) VALUES
    (1, 'SUV5', 'FG-SR-79', 'Ford', 'Focus', 'Rood', 1, 0, 0),
    (2, 'SUV7', '7-XSN-44', 'Toyota', 'Prius+', 'Blauw', 1, 1, 1),
    (3, 'SUVLUXE', '10-XSN-45', 'Mercedes', 'GLS', 'Zwart', 1, 0, 1),
    (4, 'SUV5', '9-YCN-55', 'BMW', 'X3', 'Grijs', 1, 0, 1),
    (5, 'SUV5', '3-ZNC-66', 'Audi', 'Q5', 'Wit', 1, 1, 1),
    (6, 'SEDAN5', '7-XDS-78', 'Toyota', 'Camry', 'Blauw', 0, 0, 1),
    (7, 'SEDAN7', '1-ZDV-99', 'Volkswagen', 'Passat', 'Zilver', 1, 0, 1),
    (8, 'SUV5', '1-DDD-39', 'Audi', 'Q7', 'Zilver', 1, 0, 1);

INSERT INTO Huurcontract (contractnr, klant, van_datum, tot_datum, locatie_ophalen, locatie_terugbrengen, wenst_autotype, wenst_automaat, wenst_elektrisch, krijgt_auto) VALUES
    (994412, 165321, '2024-07-16', '2024-08-04', 'SCHIPAIRP', 'BERLCENTR', 'SUV5', 1, 0, 1),
    (995513, 176342, '2024-08-13', NULL, 'SCHIPAIRP', 'ROTTMAAS2', 'SUV7', 0, 1, 2),
    (996634, 184632, '2024-08-24', '2024-08-31', 'SCHIPAIRP', 'ARNHMCENTR', 'SUV5', 1, 0, 4),
    (995613, 176342, '2024-09-25', NULL, 'SCHIPAIRP', 'ROTTMAAS2', 'SUVLUXE', 1, 0, 3),
    (995616, 195474, '2024-09-27', NULL, 'SCHIPAIRP', 'GENTCENTR', 'SEDAN7', 1, 0, 7),
    (995800, 184607, '2024-10-13', '2024-10-17', 'SCHIPAIRP', 'AMSCENTR', 'SEDAN5', 0, 0, 6),
    (997634, 184632, '2024-10-17', '2024-10-20', 'SCHIPAIRP', 'ARNHMCENTR', 'SUV5', 1, 0, 4),
    (997834, 184632, '2024-10-22', NULL, 'SCHIPAIRP', 'ARNHMCENTR', 'SUV5', 1, 0, 5);

INSERT INTO Wenst_accessoire (huurcontract, accessoire, aantal) VALUES
    (994412, 'BABYSTLGR', 2),
    (994412, 'NAVXL', 1),
    (995513, 'HONDNET', 1),
    (996634, 'FIETSDRAAG', 1),
    (996634, 'NAVXL', 1),
    (995613, 'HONDNET', 1),
    (995613, 'BABYSTLGR', 1),
    (995800, 'FIETSDRAAG', 1),
    (997634, 'FIETSDRAAG', 1),
    (997834, 'ZITVERH', 1);

INSERT INTO Probleem (huurcontract, nr, omschrijving, is_schade, geconstateerd_bij, is_opgelost, kosten) VALUES
    (994412, 1, 'Deuk op linker voorportier', 1, 'terugbrengen', 0, 700.00),
    (995513, 1, 'Radio 4 is niet ingesteld', 0, 'ophalen', 1, NULL),
    (995513, 2, 'Kras op motorkap', 1, 'ophalen', 0, NULL),
    (996634, 1, 'Accu leeg', 0, 'ophalen', 1, 120.00),
    (996634, 2, 'Trekhaak elektra werkt niet', 1, 'ophalen', 0, NULL),
    (995613, 1, 'Koplamp werkt niet', 0, 'terugbrengen', 1, NULL),
    (995616, 1, 'Accu leeg', 0, 'ophalen', 0, 120.00),
    (995800, 1, 'Kras op spoiler', 1, 'ophalen', 0, NULL),
    (997634, 1, 'Beide mistlampen werken niet', 1, 'ophalen', 1, 240.00),
    (997834, 1, 'Motor start niet', 0, 'ophalen', 0, NULL);