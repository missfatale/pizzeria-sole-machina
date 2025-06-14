-- Create Database
CREATE DATABASE Pizzeria;

-- Use Database
USE Pizzeria;

-- Drop Existing Tables
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Pizza_Order;
DROP TABLE IF EXISTS Pizza_Order_Product;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS Product_Type;
DROP TABLE IF EXISTS Product_Ingredient;
DROP TABLE IF EXISTS Ingredient;

-- Create Table (With Primary Keys)
CREATE TABLE User (
    username VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    address VARCHAR(255),
    CONSTRAINT pk_user_username PRIMARY KEY (username)
);

CREATE TABLE Pizza_Order (
    order_id INT,
    client_username VARCHAR(255),
    personnel_username VARCHAR(255) NOT NULL,
    datetime DATETIME NOT NULL,
    status INT,
    address VARCHAR(255),
    CONSTRAINT pk_pizza_order_order_id PRIMARY KEY (order_id)
);

CREATE TABLE Pizza_Order_Product (
    order_id INT,
    product_name VARCHAR(255),
    quantity INT NOT NULL,
    CONSTRAINT pk_pizza_order_product PRIMARY KEY (order_id, product_name)
);

CREATE TABLE Product (
    name VARCHAR(255),
    price DECIMAL(10,2) NOT NULL,+
    type_id VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    CONSTRAINT pk_product_name PRIMARY KEY (name)
);

CREATE TABLE Product_Type (
    name VARCHAR(255),
    CONSTRAINT pk_product_type_name PRIMARY KEY (name)
);

CREATE TABLE Product_Ingredient (
    product_name VARCHAR(255),
    ingredient_name VARCHAR(255),
    CONSTRAINT pk_product_ingredient PRIMARY KEY (product_name, ingredient_name)
);

CREATE TABLE Ingredient (
    name VARCHAR(255),
    CONSTRAINT pk_ingredient_name PRIMARY KEY (name)
);

-- Alter Tables (Foreign Keys)
ALTER TABLE Pizza_Order
    ADD CONSTRAINT fk_pizza_order_client_username FOREIGN KEY (client_username)
    REFERENCES User (username);

ALTER TABLE Pizza_Order
    ADD CONSTRAINT fk_pizza_order_personnel_username FOREIGN KEY (personnel_username)
    REFERENCES User (username);

ALTER TABLE Pizza_Order_Product
    ADD CONSTRAINT fk_pizza_order_product_order_id FOREIGN KEY (order_id)
    REFERENCES Pizza_Order (order_id);

ALTER TABLE Pizza_Order_Product
    ADD CONSTRAINT fk_pizza_order_product_product_name FOREIGN KEY (product_name)
    REFERENCES Product (name);

ALTER TABLE Product_Ingredient
    ADD CONSTRAINT fk_product_ingredient_product_name FOREIGN KEY (product_name)
    REFERENCES Product (name);

ALTER TABLE Product_Ingredient
    ADD CONSTRAINT fk_product_ingredient_ingredient_name FOREIGN KEY (ingredient_name)
        REFERENCES Ingredient (name);

ALTER TABLE Product
    ADD CONSTRAINT fk_product_type_id FOREIGN KEY (type_id)
    REFERENCES Product_Type (name);