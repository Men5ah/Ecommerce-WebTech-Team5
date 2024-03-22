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
    City VARCHAR(11) NOT NULL,
    role_id INT
);

CREATE TABLE Location (
    location_id INT PRIMARY KEY AUTO_INCREMENT,
    address VARCHAR(255),
    city VARCHAR(30), 
    state CHAR(2),
    zip CHAR(5)
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
    quantity_chosen INT,
    category_id INT,
    image_data MEDIUMBLOB,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

INSERT INTO Categories (category_id, name, description) VALUES
(1, 'electronics', 'Electronic devices and gadgets'),
(2, 'fashion', 'Clothing items for men and women'),
(3, 'stationery', 'A wide range of books in various genres'),
(4, 'skincare', 'A variety of skincare products'),
(5, 'fruits and Veggies', 'A variety of fruits and vegetables'),
(6, 'hygiene', 'A variety of hygienic care products');

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

CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    billing_first_name VARCHAR(50),
    billing_last_name VARCHAR(50),
    billing_email VARCHAR(100),
    billing_mobile_no VARCHAR(20),
    billing_address_line1 VARCHAR(255),
    billing_address_line2 VARCHAR(255),
    billing_country VARCHAR(50),
    billing_city VARCHAR(50),
    billing_state VARCHAR(50),
    billing_zip_code VARCHAR(20),
    shipping_first_name VARCHAR(50),
    shipping_last_name VARCHAR(50),
    shipping_email VARCHAR(100),
    shipping_mobile_no VARCHAR(20),
    shipping_address_line1 VARCHAR(255),
    shipping_address_line2 VARCHAR(255),
    shipping_country VARCHAR(50),
    shipping_city VARCHAR(50),
    shipping_state VARCHAR(50),
    shipping_zip_code VARCHAR(20),
    create_account BOOLEAN,
    ship_to_different_address BOOLEAN,
    payment_method VARCHAR(50),
    product1_name VARCHAR(255),
    product1_price DECIMAL(10, 2),
    product2_name VARCHAR(255),
    product2_price DECIMAL(10, 2),
    product3_name VARCHAR(255),
    product3_price DECIMAL(10, 2),
    subtotal DECIMAL(10, 2),
    shipping_cost DECIMAL(10, 2),
    total_amount DECIMAL(10, 2),
    status VARCHAR(50),
    date_ordered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE Carts (
    cart_id INT DEFAULT 1,
    user_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (user_id) REFERENCES Person(person_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id),
    CONSTRAINT fk_product_id_cart FOREIGN KEY (product_id) REFERENCES Product(product_id) ON DELETE SET NULL ON UPDATE CASCADE
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
