-- Use Database
USE Pizzeria;

-- Delete From Tables
DELETE FROM Pizza_Order_Product;
DELETE FROM Pizza_Order;
DELETE FROM Product_Ingredient;
DELETE FROM Product;
DELETE FROM Product_Type;
DELETE FROM Ingredient;
DELETE FROM User;

-- Insert Into Database
INSERT INTO User (username, password, first_name, last_name, role, address) VALUES
    ('Admin','Admin123!','Super','Admin','Admin','Adminstreet 114'),
    ('Test', 'Test123!', 'Test', 'Account', 'User', 'Teststreet 15'),
    ('Amber', 'Amber123!', 'Amber', 'Schaper', 'User', 'Amberstreet 9'),
    ('Josh', 'Josh123!', 'Josh', 'Graham', 'User', 'Joshstreet 69');

INSERT INTO Product_Type (name) VALUES
    ('Pizza'),
    ('Focaccia'),
    ('Dranken');

INSERT INTO Product (name, price, type_id, description) VALUES
    -- Pizzas
    ('Margherita', 8.99, 'Pizza', 'Klassieke Pizza met Tomatensaus, Mozzarella en Peterselie.'),
    ('Margherita Speciaal', 9.50, 'Pizza', 'House special, Pizza met Tomatensaus, Mozzarella en Basilicum.'),
    ('Pepperoni', 10.99, 'Pizza', 'Pizza met Tomatensaus, Mozzarella en Pepperoni.'),
    ('BBQ Chicken', 12.50, 'Pizza', 'Pizza met Bbqsaus, Mozzarella en Bbq Chicken'),
    ('Buffalo Chicken', 12.50, 'Pizza', 'Pizza met Tomatensaus, Mozzarella en Buffalo Chicken.'),
    ('Spinazie Champignon', 14.99, 'Pizza', 'Pizza met Tomatensaus, Mozzarella, Spinazie en Champignons.'),

    -- Focaccia
    ('Focaccia', 6.99, 'Focaccia' ,'Onze House speciale Focaccia met Tomatensaus, Mozzarella en Peterselie.'),

    -- Dranken
    ('Coca-Cola 330ML', 2.50, 'Dranken', 'Blikje Coca-Cola.'),
    ('Coca-Cola Zero 330ML', 2.50, 'Dranken', 'Blikje Coca-Cola Zero.'),
    ('Coca-Cola Zero Cherry 330ML', 2.50, 'Dranken', 'Blikje Coca-Cola Zero Cherry.'),
    ('Fanta 330ML', 2.50, 'Dranken', 'Blikje Fanta.'),
    ('Fanta Zero 330ML', 2.50, 'Dranken', 'Blikje Fanta Zero.'),
    ('Fuzetea Green Tea 330ML', 2.99, 'Dranken', 'Blikje Fuzetea Green Tea.'),
    ('Fuzetea Peach 330ML', 2.99, 'Dranken', 'Blikje Fuzetea Peach.'),
    ('Monster Energy 500ML', 3.99, 'Dranken', 'Blik Monster Energy.'),
    ('Chaudfontaine 500ML', 2.99, 'Dranken', 'Fles Chaudfontaine (water).'),
    ('Coca-Cola 1.5L', 4.99, 'Dranken', 'Fles Coca-Cola 1.5 liter.');

INSERT INTO Ingredient VALUES
   ('Tomatensaus'),
   ('Bbqsaus'),
   ('Mozzarella'),
   ('Peterselie'),
   ('Basilicum'),
   ('Pepperoni'),
   ('Bbq Chicken'),
   ('Buffalo Chicken'),
   ('Spinazie'),
   ('Champignons');

INSERT INTO Product_Ingredient VALUES
   ('Margherita', 'Tomatensaus'),
   ('Margherita', 'Mozzarella'),
   ('Margherita', 'Peterselie'),
   ('Margherita Speciaal', 'Tomatensaus'),
   ('Margherita Speciaal', 'Mozzarella'),
   ('Margherita Speciaal', 'Basilicum'),
   ('Pepperoni', 'Tomatensaus'),
   ('Pepperoni', 'Mozzarella'),
   ('Pepperoni', 'Pepperoni'),
   ('BBQ Chicken', 'Bbqsaus'),
   ('BBQ Chicken', 'Mozzarella'),
   ('BBQ Chicken', 'Bbq Chicken'),
   ('Buffalo Chicken', 'Tomatensaus'),
   ('Buffalo Chicken', 'Mozzarella'),
   ('Buffalo Chicken', 'Buffalo Chicken'),
   ('Spinazie Champignon', 'Tomatensaus'),
   ('Spinazie Champignon', 'Mozzarella'),
   ('Spinazie Champignon', 'Spinazie'),
   ('Spinazie Champignon', 'Champignons');