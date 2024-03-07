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
