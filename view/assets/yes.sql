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


CREATE TABLE contact (
    id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    company varchar(255),
    phone int(255),
    kvk int(255),
    BTWNum int(255),
    street varchar(255),
    city varchar(255),
    state varchar(255),
    postcode varchar(255)
)

CREATE TABLE buisnessHours  (
    id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    weekDay varchar(255),
    openH varchar(255),
    closeH varchar(255)
)


