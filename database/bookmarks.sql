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
   PRIMARY KEY(order_id)
   
);

CREATE TABLE ORDERS
(
    order_id INT NOT NULL,
    user_id     INT,
    price        INT,
    orderDate    DATETIME,
    FOREIGN KEY(order_id) REFERENCES ORDERID(order_id)
       ON UPDATE CASCADE
       ON DELETE CASCADE,
    FOREIGN KEY(user_id) REFERENCES User_info(user_id)
       ON UPDATE CASCADE
       ON DELETE CASCADE 
    
);





-- INSERT Current User
INSERT INTO currentS VALUES
(1, null, null);

INSERT INTO User_INFO VALUES
('testUser','JK','LSO','budgetbuddy75@gmail.com','135-246-9825','reg','1234',0),
 ('testAdmin','AD','STK','budgetbuddy75@gmail.com','569-234-1235','super','abcd',1);

-- create the users
CREATE USER IF NOT EXISTS mgs_user@localhost 
IDENTIFIED BY 'pa55word';

-- grant privleges to the users
GRANT ALL PRIVILEGES ON bbdatabase TO mgs_user@localhost;

