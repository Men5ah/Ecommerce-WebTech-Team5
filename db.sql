-- DROP DATABASE IF EXISTS Commerce;
-- CREATE DATABASE Commerce;
-- USE Commerce;

-- CREATE TABLE Person (
--     person_id INT PRIMARY KEY AUTO_INCREMENT,
--     fname VARCHAR(55) NOT NULL,
--     lname VARCHAR(55) NOT NULL,
--     Email VARCHAR(105) UNIQUE NOT NULL,
--     Password VARCHAR(155) NOT NULL,
--     Phone_Number VARCHAR(11) NOT NULL,
--     City ENUM ('Accra', 'Kumasi', 'Tamale', 'Takoradi', 'Tema', 'Cape Coast') NOT NULL,
--     Street VARCHAR(255) NOT NULL,
--     Role ENUM('User', 'Seller') NOT NULL
-- );



-- CREATE TABLE Categories (
--     category_id INT PRIMARY KEY,
--     name VARCHAR(255),
--     description TEXT
-- );

-- CREATE TABLE Product (
--     product_id INT PRIMARY KEY,
--     name VARCHAR(255),
--     description TEXT,
--     price DECIMAL(10, 2),
--     quantity_available INT,
--     category_id INT,
--     image_path VARCHAR(255),
--     FOREIGN KEY (category_id) REFERENCES Categories(category_id)
-- );

-- -- Inserting data into Categories table
-- INSERT INTO Categories (category_id, name, description) VALUES
-- (1, 'Electronics', 'Electronic devices and gadgets'),
-- (2, 'Fashion', 'Clothing items for men and women'),
-- (3, 'Stationary', 'A wide range of books in various genres'),
-- (4, 'Skincare', 'A variety of skin care products'),
-- (5, 'Fruits and Veggies', 'A variety of fruits and vegetables'),
-- (6, 'Hygiene', 'A variety of hygienic care products');

-- -- Inserting data into Product table
-- INSERT INTO Product (product_id, name, description, price, quantity_available, category_id, image_path) VALUES
-- (1, 'Airpods', 'Latest model with advanced features', 499.99, 50, 1, "../FrontendEcomXpress/img/airpods.jpeg"),
-- (2, 'Blender', 'Powerful laptop for work and entertainment', 1299.99, 30, 1, "../FrontendEcomXpress/img/blender.jpeg"),
-- (3, 'Alterations', 'Comfortable cotton t-shirt', 19.99, 100, 2, "../FrontendEcomXpress/img/alteration.jpeg"),
-- (4, 'Laundry', 'Classic denim jeans for men', 49.99, 80, 2, "../FrontendEcomXpress/img/laundry.webp"),
-- (5, 'Bag', 'Exciting science fiction novel', 9.99, 120, 3, "../FrontendEcomXpress/img/bag.jpeg"),
-- (6, 'Pens', 'Collection of delicious recipes', 14.99, 75, 3, "../FrontendEcomXpress/img/pens.jpeg"),
-- (7, 'Bananas', 'Sweet and juicy watermelon', 5.99, 20, 5, "../FrontendEcomXpress/img/bananas.jpeg"),
-- (8, 'Olay', 'Skin care powder for a fresh look', 29.99, 50, 4, "../FrontendEcomXpress/img/olay.jpeg"),
-- (9, 'Nivea', 'Long-lasting protection against sweat', 8.99, 30, 6, "../FrontendEcomXpress/img/nivea.jpeg");

-- CREATE TABLE Orders (
--     order_id INT PRIMARY KEY AUTO_INCREMENT,
--     user_id INT,
--     order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     total_amount DECIMAL(10, 2),
--     status ENUM('Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
--     payment_method VARCHAR(50),
--     shipping_address VARCHAR(255),
--     FOREIGN KEY (user_id) REFERENCES Person(person_id)
-- );

-- CREATE TABLE Carts (
--     cart_id INT PRIMARY KEY AUTO_INCREMENT,
--     user_id INT,
--     product_id INT,
--     quantity INT,
--     FOREIGN KEY (user_id) REFERENCES Person(person_id),
--     FOREIGN KEY (product_id) REFERENCES Product(product_id)
-- );

-- CREATE TABLE Order_Items (
--     order_item_id INT PRIMARY KEY,
--     order_id INT,
--     product_id INT,
--     quantity INT,
--     price_per_unit DECIMAL(10, 2),
--     subtotal DECIMAL(10, 2),
--     FOREIGN KEY (order_id) REFERENCES Orders(order_id),
--     FOREIGN KEY (product_id) REFERENCES Product(product_id)
-- );



DROP DATABASE IF EXISTS Commerce;
CREATE DATABASE Commerce;
USE Commerce;

CREATE TABLE Person (
    person_id INT PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(55) NOT NULL,
    lname VARCHAR(55) NOT NULL,
    Email VARCHAR(105) UNIQUE NOT NULL,
    Password VARCHAR(155) NOT NULL,
    Phone_Number VARCHAR(11) NOT NULL,
    City ENUM ('Accra', 'Kumasi', 'Tamale', 'Takoradi', 'Tema', 'Cape Coast') NOT NULL,
    Street VARCHAR(255) NOT NULL,
    Role ENUM('User', 'Seller') NOT NULL
);

CREATE TABLE Categories (
    category_id INT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT
);

CREATE TABLE Product (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description TEXT,
    price DECIMAL(10, 2),
    quantity_available INT,
    category_id INT,
    image_path VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

-- Inserting data into Categories table
INSERT INTO Categories (category_id, name, description) VALUES
(1, 'Electronics', 'Electronic devices and gadgets'),
(2, 'Fashion', 'Clothing items for men and women'),
(3, 'Stationary', 'A wide range of books in various genres'),
(4, 'Skincare', 'A variety of skincare products'),
(5, 'Fruits and Veggies', 'A variety of fruits and vegetables'),
(6, 'Hygiene', 'A variety of hygienic care products');

-- Inserting data into Product table
INSERT INTO Product (name, description, price, quantity_available, category_id, image_path) VALUES
('Airpods', 'Latest model with advanced features', 499.99, 50, 1, '../FrontendEcomXpress/img/airpods.jpeg'),
('Blender', 'Powerful laptop for work and entertainment', 1299.99, 30, 1, '../FrontendEcomXpress/img/blender.jpeg'),
('Alterations', 'Comfortable cotton t-shirt', 19.99, 100, 2, '../FrontendEcomXpress/img/alteration.jpeg'),
('Laundry', 'Classic denim jeans for men', 49.99, 80, 2, '../FrontendEcomXpress/img/laundry.webp'),
('Bag', 'Exciting science fiction novel', 9.99, 120, 3, '../FrontendEcomXpress/img/bag.jpeg'),
('Pens', 'Collection of delicious recipes', 14.99, 75, 3, '../FrontendEcomXpress/img/pens.jpeg'),
('Bananas', 'Sweet and juicy watermelon', 5.99, 20, 5, '../FrontendEcomXpress/img/bananas.jpeg'),
('Olay', 'Skin care powder for a fresh look', 29.99, 50, 4, '../FrontendEcomXpress/img/olay.jpeg'),
('Nivea', 'Long-lasting protection against sweat', 8.99, 30, 6, '../FrontendEcomXpress/img/nivea.jpeg');

CREATE TABLE Orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2),
    status ENUM('Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
    payment_method VARCHAR(50),
    shipping_address VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES Person(person_id)
);

CREATE TABLE Carts (
    cart_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (user_id) REFERENCES Person(person_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
);

CREATE TABLE Order_Items (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT,
    price_per_unit DECIMAL(10, 2),
    subtotal DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES Orders(order_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
);
