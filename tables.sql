CREATE DATABASE eilps;

USE eilps;

CREATE TABLE Request (
  OrderId INT AUTO_INCREMENT PRIMARY KEY,
  dateCreated DATE,
  quantity INT,
  delivery DATE,
  stype VARCHAR(255),
  FOREIGN KEY (stype) REFERENCES Slot(stype)
);

CREATE TABLE Slot(
  stime TIME,
  sdate Date,
  stype VARCHAR(255) PRIMARY KEY
);

CREATE TABLE Customer(
  customer_id INT AUTO_INCREMENT PRIMARY KEY,
  telephone VARCHAR(25),
  customer_address VARCHAR(255),
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  OrderId INT,
  FOREIGN KEY (first_name) REFERENCES User(first_name),
  FOREIGN KEY (last_name) REFERENCES User(first_name),
  FOREIGN KEY (OrderId) REFERENCES Request(OrderId)
);

CREATE TABLE User(
  first_name VARCHAR(255) PRIMARY KEY,
  last_name VARCHAR (255)
);

CREATE TABLE Invoice(
  invoice_id INT AUTO_INCREMENT PRIMARY KEY,
  date_invoice DATE,
  delivery DATE, 
  price DECIMAL(10,2),
  OrderId INT,
  customer_id INT,
  FOREIGN KEY (delivery) REFERENCES Customer(customer_id),
  FOREIGN KEY (customer_id) REFERENCES Customer(customer_id) ,
  FOREIGN KEY (OrderId) REFERENCES Request(OrderID)
);