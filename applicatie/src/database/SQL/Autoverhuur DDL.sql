-- Opdracht 0 - Aanmaken Database
-- CREATE DATABASE Autoverhuur;

-- Gebruik de Autoverhuur Database
USE Autoverhuur;

-- DROP TABLE instructies (Opdracht 1a)
DROP TABLE IF EXISTS Probleem;
DROP TABLE IF EXISTS Wenst_accessoire;
DROP TABLE IF EXISTS Accessoire;
DROP TABLE IF EXISTS Huurcontract;
DROP TABLE IF EXISTS Klant;
DROP TABLE IF EXISTS Auto;
DROP TABLE IF EXISTS Autotype;
DROP TABLE IF EXISTS Locatie;


-- CREATE TABLE instructies (Opdracht 1a)
CREATE TABLE Klant (
    klantnr int NOT NULL,
    voornaam varchar(255) NOT NULL,
    tussenvoegsels varchar(255),
    achternaam varchar(255) NOT NULL,
    emailadres varchar(255) NOT NULL,
    CONSTRAINT pk_klant PRIMARY KEY (klantnr)
);

CREATE TABLE Accessoire (
    accessoirenaam char(10) NOT NULL,
    omschrijving varchar(255) NOT NULL,
    prijs_per_dag numeric(6,2) NOT NULL,
    CONSTRAINT pk_accessoire PRIMARY KEY (accessoirenaam)
);

CREATE TABLE Locatie ( 
    locatiecode char(10) NOT NULL,
    naam varchar(255) NOT NULL,
    adres varchar(255) NOT NULL,
    postcode char(10),
    plaats varchar(255) NOT NULL,
    land varchar(255) NOT NULL,
    CONSTRAINT pk_locatie PRIMARY KEY (locatiecode)
);

CREATE TABLE Autotype ( 
    typecode char(10) NOT NULL,
    omschrijving varchar(255) NOT NULL,
    aantal_personen smallint NOT NULL,
    prijs_per_dag numeric(6,2) NOT NULL,
    url_image varchar(255),
    CONSTRAINT pk_autotype PRIMARY KEY (typecode)
);

CREATE TABLE Auto (
    autonr int NOT NULL,
    autotype char(10) NOT NULL,
    kenteken char(10) NOT NULL,
    merk varchar(31) NOT NULL,
    modelnaam varchar(31) NOT NULL,
    kleur varchar(15),
    is_automaat bit NOT NULL,
    is_elektrisch bit NOT NULL,
    is_in_orde bit NOT NULL,
    CONSTRAINT pk_auto PRIMARY KEY (autonr)
);

CREATE TABLE Huurcontract (
    contractnr int NOT NULL,
    klant int NOT NULL,
    van_datum date NOT NULL,
    tot_datum date,
    locatie_ophalen char(10) NOT NULL,
    locatie_terugbrengen char(10) NOT NULL,
    wenst_autotype char(10) NOT NULL,
    wenst_automaat bit NOT NULL,
    wenst_elektrisch bit,
    krijgt_auto int,
    CONSTRAINT pk_huurcontract PRIMARY KEY (contractnr)
);

CREATE TABLE Wenst_accessoire (
    huurcontract int NOT NULL,
    accessoire char(10) NOT NULL,
    aantal int NOT NULL,
    CONSTRAINT pk_wenst_accessoire PRIMARY KEY (huurcontract, accessoire)
);

CREATE TABLE Probleem (
    huurcontract int NOT NULL,
    nr int NOT NULL,
    omschrijving varchar(255) NOT NULL,
    is_schade bit NOT NULL,
    geconstateerd_bij char(12) NOT NULL,
    is_opgelost bit NOT NULL,
    kosten numeric(6,2),
    CONSTRAINT pk_probleem PRIMARY KEY (huurcontract, nr)
);



-- Foreign Key (Opdracht 1c)
ALTER TABLE Auto
ADD CONSTRAINT fk_auto_autotype_typecode FOREIGN KEY (autotype)
    REFERENCES Autotype (typecode);

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_klant_klantnr FOREIGN KEY (klant) 
    REFERENCES Klant (klantnr);

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_locatie_ophalen_locatiecode FOREIGN KEY (locatie_ophalen) 
    REFERENCES Locatie (locatiecode);

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_locatie_terugbrengen_locatiecode FOREIGN KEY (locatie_terugbrengen) 
    REFERENCES Locatie (locatiecode);

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_wenst_autotype_typecode FOREIGN KEY (wenst_autotype) 
    REFERENCES Autotype (typecode);

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_krijgt_auto_autonr FOREIGN KEY (krijgt_auto) 
    REFERENCES Auto (autonr);

ALTER TABLE Wenst_accessoire 
ADD CONSTRAINT fk_wenst_accessoire_huurcontract_contractnr FOREIGN KEY (huurcontract) 
    REFERENCES Huurcontract (contractnr);

ALTER TABLE Wenst_accessoire 
ADD CONSTRAINT fk_wenst_accessoire_accessoire_accessoirenaam FOREIGN KEY (accessoire) 
    REFERENCES Accessoire (accessoirenaam);

ALTER TABLE Probleem
ADD CONSTRAINT fk_probleem_huurcontract_contractnr FOREIGN KEY (huurcontract) 
    REFERENCES Huurcontract (contractnr);



-- ALTER TABLE instructies (Opdracht 2b)
ALTER TABLE huurcontract ADD is_betaald bit NOT NULL DEFAULT 0;



-- Foreign Key ON UPDATE- ON DELETE- Regels (Opdracht 2c)
IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_auto_autotype_typecode')
    ALTER TABLE Auto DROP CONSTRAINT fk_auto_autotype_typecode;

ALTER TABLE Auto
ADD CONSTRAINT fk_auto_autotype_typecode FOREIGN KEY (autotype)
    REFERENCES Autotype (typecode)
    ON UPDATE CASCADE
    ON DELETE NO ACTION;

IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_huurcontract_klant_klantnr')
    ALTER TABLE Huurcontract DROP CONSTRAINT fk_huurcontract_klant_klantnr;

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_klant_klantnr FOREIGN KEY (klant) 
    REFERENCES Klant (klantnr)
    ON UPDATE CASCADE
    ON DELETE NO ACTION;

IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_huurcontract_locatie_ophalen_locatiecode')
    ALTER TABLE Huurcontract DROP CONSTRAINT fk_huurcontract_locatie_ophalen_locatiecode;

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_locatie_ophalen_locatiecode FOREIGN KEY (locatie_ophalen) 
    REFERENCES Locatie (locatiecode)
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;

IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_huurcontract_locatie_terugbrengen_locatiecode')
    ALTER TABLE Huurcontract DROP CONSTRAINT fk_huurcontract_locatie_terugbrengen_locatiecode;

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_locatie_terugbrengen_locatiecode FOREIGN KEY (locatie_terugbrengen) 
    REFERENCES Locatie (locatiecode)
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;

IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_huurcontract_wenst_autotype_typecode')
    ALTER TABLE Huurcontract DROP CONSTRAINT fk_huurcontract_wenst_autotype_typecode;

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_wenst_autotype_typecode FOREIGN KEY (wenst_autotype) 
    REFERENCES Autotype (typecode)
    ON UPDATE CASCADE
    ON DELETE NO ACTION;

IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_huurcontract_krijgt_auto_autonr')
    ALTER TABLE Huurcontract DROP CONSTRAINT fk_huurcontract_krijgt_auto_autonr;

ALTER TABLE Huurcontract 
ADD CONSTRAINT fk_huurcontract_krijgt_auto_autonr FOREIGN KEY (krijgt_auto) 
    REFERENCES Auto (autonr)
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;

IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_wenst_accessoire_huurcontract_contractnr')
    ALTER TABLE Wenst_accessoire  DROP CONSTRAINT fk_wenst_accessoire_huurcontract_contractnr;

ALTER TABLE Wenst_accessoire 
ADD CONSTRAINT fk_wenst_accessoire_huurcontract_contractnr FOREIGN KEY (huurcontract) 
    REFERENCES Huurcontract (contractnr)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_wenst_accessoire_accessoire_accessoirenaam')
    ALTER TABLE Wenst_accessoire  DROP CONSTRAINT fk_wenst_accessoire_accessoire_accessoirenaam;

ALTER TABLE Wenst_accessoire 
ADD CONSTRAINT fk_wenst_accessoire_accessoire_accessoirenaam FOREIGN KEY (accessoire) 
    REFERENCES Accessoire (accessoirenaam)
    ON UPDATE CASCADE
    ON DELETE NO ACTION;

IF EXISTS (SELECT * FROM sys.foreign_keys WHERE name = 'fk_probleem_huurcontract_contractnr')
    ALTER TABLE Probleem DROP CONSTRAINT fk_probleem_huurcontract_contractnr;

ALTER TABLE Probleem
ADD CONSTRAINT fk_probleem_huurcontract_contractnr FOREIGN KEY (huurcontract) 
    REFERENCES Huurcontract (contractnr)
    ON UPDATE CASCADE
    ON DELETE CASCADE;



-- Opdracht 3a --
-- ALTER TABLE instructies (Opdracht 3a-1)
ALTER TABLE Auto ADD CONSTRAINT UC_kenteken UNIQUE (kenteken);

-- ALTER TABLE instructies (Opdracht 3a-2)
ALTER TABLE Locatie ADD CONSTRAINT UC_adres_plaats_land UNIQUE (adres, plaats, land);

-- ALTER TABLE instructies (Opdracht 3a-3)
ALTER TABLE Huurcontract ADD CONSTRAINT tot_datum_geldig CHECK (tot_datum >= van_datum);

-- ALTER TABLE instructies (Opdracht 3a-4)
-- Constraints kunnen niet direct de beschikbaarheid controleren van een specifieke auto in de database. Hier kan dat wel met een trigger. 

-- ALTER TABLE instructies (Opdracht 3a-5)
ALTER TABLE Probleem ADD CONSTRAINT waarde_geldig CHECK (geconstateerd_bij IN('terugbrengen', 'ophalen'));

-- ALTER TABLE instructies (Opdracht 3a-6)
-- Constraints kunnen geen locica bevatten die meerdere rijen bekijkt. Ze kunnen alleen worden toegepast op een enkele rij. Om dit mogelijk te maken heb je een trigger nodig. 



-- Opdracht 5a --
-- ALTER TABLE instructies (Opdracht 5a-1)
IF OBJECT_ID('dbo.CheckAutoType', 'FN') IS NOT NULL
    DROP FUNCTION dbo.CheckAutoType;
GO

CREATE FUNCTION dbo.CheckAutoType(
    @HuurcontractID INT,
    @AutoNr INT
) RETURNS BIT
AS
BEGIN
    DECLARE @IsValid BIT = 0;
    IF EXISTS (
        SELECT *
        FROM Huurcontract hc
        INNER JOIN Auto A ON A.autonr = @AutoNr
        WHERE hc.contractnr = @HuurcontractID
          AND A.autotype = hc.wenst_autotype
    )
    BEGIN
        SET @IsValid = 1;
    END
    RETURN @IsValid;
END;
GO

ALTER TABLE Huurcontract
ADD CONSTRAINT chk_Huurcontract_AutoType
CHECK (
    dbo.CheckAutoType(contractnr, krijgt_auto) = 1
);
GO

-- ALTER TABLE instructies (Opdracht 5a-2)
IF EXISTS (SELECT * FROM sys.check_constraints WHERE name = 'chk_OverlappingRentals')
    ALTER TABLE Huurcontract DROP CONSTRAINT chk_OverlappingRentals;

IF OBJECT_ID('dbo.CheckOverlappingRentals', 'FN') IS NOT NULL
    DROP FUNCTION dbo.CheckOverlappingRentals;
GO

CREATE FUNCTION dbo.CheckOverlappingRentals(
    @AutoNr INT,
    @VanDatum DATE,
    @TotDatum DATE,
    @HuurcontractID INT = NULL
) RETURNS BIT
AS
BEGIN
    DECLARE @IsOverlapping BIT = 0;

    IF EXISTS (
        SELECT *
        FROM Huurcontract
        WHERE krijgt_auto = @AutoNr
          AND (
                (@VanDatum BETWEEN van_datum AND ISNULL(tot_datum, @TotDatum)) OR
                (@TotDatum BETWEEN van_datum AND ISNULL(tot_datum, @TotDatum))
              )
          AND (@HuurcontractID IS NULL OR contractnr != @HuurcontractID)
    )
    BEGIN
        SET @IsOverlapping = 1;
    END

    RETURN @IsOverlapping;
END;
GO

ALTER TABLE Huurcontract
ADD CONSTRAINT chk_OverlappingRentals
CHECK (
    dbo.CheckOverlappingRentals(krijgt_auto, van_datum, tot_datum, contractnr) = 0
);
GO