CREATE TABLE products
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    barcode VARCHAR(50),
    name VARCHAR(255) NOT NULL,
    brand VARCHAR(255),
    image_url TEXT
);

CREATE TABLE supermarkets
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    logo_url TEXT
);

CREATE TABLE product_prices
(
    id INT AUTO_INCREMENT PRIMARY KEY,

    product_id INT NOT NULL,
    supermarket_id INT NOT NULL,

    price DECIMAL(10,2) NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (supermarket_id) REFERENCES supermarkets(id)
);