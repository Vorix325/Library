DROP DATABASE IF EXISTS Bookmark;
CREATE DATABASE Bookmark;
USE Bookmark;

-- create the tables
CREATE TABLE User_info
(
    user_name    VARCHAR(30),
    first_name   VARCHAR(30),
    last_name    VARCHAR(30),
    email        VARCHAR(30),
    phone_number VARCHAR(30),
    typeof_user  VARCHAR(30),
    password     VARCHAR(30),
    user_id      INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (user_id)
);

CREATE TABLE currentS
(
    queue       INT NOT NULL,
    user_id     INT,
    typeof_user  VARCHAR(30),
    PRIMARY KEY (queue)
    
);


CREATE TABLE Category
(
    category_name VARCHAR(30),
    category_id   INT            NOT NULL  AUTO_INCREMENT,
    PRIMARY KEY (category_id)
    
);

CREATE TABLE product
(
    product_id  INT    NOT NULL  AUTO_INCREMENT,
    product_name VARCHAR(30),
    category_id  INT,
    price        FLOAT(30),
    PRIMARY KEY(product_id),
    FOREIGN KEY(category_id) REFERENCES Category(category_id)
      ON UPDATE CASCADE
      ON DELETE CASCADE
);
CREATE TABLE ORDERID
(
   order_id INT NOT NULL AUTO_INCREMENT,
   user_id     INT,
   price        float(30),
   orderDate    DATETIME,
   PRIMARY KEY(order_id),
   FOREIGN KEY(user_id) REFERENCES User_info(user_id)
       ON UPDATE CASCADE
       ON DELETE CASCADE 
   
);

CREATE TABLE ORDERS
(
    order_id INT NOT NULL,
    product_id  INT,
    quantity    INT,
    FOREIGN KEY(order_id) REFERENCES ORDERID(order_id)
       ON UPDATE CASCADE
       ON DELETE CASCADE,
    FOREIGN KEY(product_id) REFERENCES product(product_id)
       ON UPDATE CASCADE
       ON DELETE CASCADE 
    
);

create Table CART
(
    user_id INT,
    product_id INT,
    quantity    INT,
    FOREIGN KEY(user_id) REFERENCES User_info(user_id)
       ON UPDATE CASCADE
       ON DELETE CASCADE, 
    FOREIGN KEY(product_id) REFERENCES product(product_id)
       ON UPDATE CASCADE
       ON DELETE CASCADE 
);



-- INSERT Current User
INSERT INTO currentS VALUES
(1, null, null);

INSERT INTO User_INFO VALUES
('testUser','JK','LSO','budgetbuddy75@gmail.com','135-246-9825','reg','1234',0),
 ('testAdmin','AD','STK','budgetbuddy75@gmail.com','569-234-1235','super','abcd',1);

INSERT INTO `category` (`category_name`, `category_id`) VALUES
('Action', 1),
('adventure ', 2),
('Web application books', 3);

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `price`) VALUES
(1, 'HTML&CSS', 3, 12),
(2, 'Hobbit', 2, 11),
(3, 'Lord of the Rings', 1, 20);


-- create the users
CREATE USER IF NOT EXISTS mgs_user@localhost 
IDENTIFIED BY 'pa55word';

-- grant privleges to the users
GRANT ALL PRIVILEGES ON bbdatabase TO mgs_user@localhost;

