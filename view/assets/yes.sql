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