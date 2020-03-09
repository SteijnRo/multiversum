CREATE TABLE products (
    id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255),
    brand varchar(255),
    specification varchar(255),
    pic varchar(255),
    price float,
    qty int(255),
    sale int(1),
    salePercent int(255)
);

-- INSERT INTO products (name, brand, specification, pic, price, qty, sale, salePercent)
-- VALUES("test", "yes", "ah yes, its garbage", "stonks.jpg", 399.99, 5, 0, 40);