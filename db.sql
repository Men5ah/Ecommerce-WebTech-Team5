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
    product_id INT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    price DECIMAL(10, 2),
    quantity_available INT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

-- Inserting data into Categories table
INSERT INTO Categories (category_id, name, description) VALUES
(1, 'Electronics', 'Electronic devices and gadgets'),
(2, 'Fashion', 'Clothing items for men and women'),
(3, 'Stationary', 'A wide range of books in various genres'),
(4, 'Skincare', 'A variety of skin care products'),
(5, 'Fruits and Veggies', 'A variety of fruits and vegetables'),
(6, 'Hygiene', 'A variety of hygienic care products');

-- Inserting data into Product table
INSERT INTO Product (product_id, name, description, price, quantity_available, category_id) VALUES
(1, 'Smartphone', 'Latest model with advanced features', 499.99, 50, 1),
(2, 'Laptop', 'Powerful laptop for work and entertainment', 1299.99, 30, 1),
(3, 'T-Shirt', 'Comfortable cotton t-shirt', 19.99, 100, 2),
(4, 'Jeans', 'Classic denim jeans for men', 49.99, 80, 2),
(5, 'Science Fiction Book', 'Exciting science fiction novel', 9.99, 120, 3),
(6, 'Cookbook', 'Collection of delicious recipes', 14.99, 75, 3),
(7, 'Watermelon', 'Sweet and juicy watermelon', 5.99, 20, 5),
(8, 'Powder', 'Skin care powder for a fresh look', 29.99, 50, 4),
(9, 'Anti-perspirant', 'Long-lasting protection against sweat', 8.99, 30, 6);

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
    cart_id INT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (user_id) REFERENCES Person(person_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
);

CREATE TABLE Order_Items (
    order_item_id INT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    price_per_unit DECIMAL(10, 2),
    subtotal DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES Orders(order_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
);
