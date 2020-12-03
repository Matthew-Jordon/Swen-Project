CREATE DATABASE eilps;

USE eilps;

CREATE TABLE Request (
  OrderId INT PRIMARY KEY,
  dateCreated DATE,
  quantity INT,
  request VARCHAR(255),
  stat VARCHAR (25),
  delivery DATE,
  img varbinary(max)
);

CREATE TABLE Slot(
  cust_id INT PRIMARY KEY,
  stime TIME,
  sdate Date,
  stype VARCHAR(255) 
);

CREATE TABLE Customer(
  telephone VARCHAR(25),
  customer_address VARCHAR(255),
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  OrderId INT PRIMARY KEY
);

CREATE TABLE User(
  first_name VARCHAR(255) PRIMARY KEY,
  last_name VARCHAR (255)
);

CREATE TABLE Invoice(
  invoice_id INT PRIMARY KEY,
  date_invoice DATE,
  delivery DATE,
  request VARCHAR(255), 
  price DECIMAL(10,2)
);