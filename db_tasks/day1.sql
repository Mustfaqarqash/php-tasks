--! Task 1: Understanding Databases

-- SQL Basics and Types of Databases tasks are not directly executable SQL commands, so we'll proceed to the SQL-related tasks.

-- Task 2: Creating a Database
CREATE DATABASE StudentDB;

-- Task 3: Creating a Table in StudentDB
USE StudentDB;

CREATE TABLE Students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    enrollment_date DATE
);

-- Task 4: Insert, Update, Delete Operations

-- Insert Data
INSERT INTO Students (name, email, enrollment_date) VALUES ('John Doe', 'john.doe@example.com', '2024-01-15');

-- Update Data
UPDATE Students SET email = 'new.email@example.com' WHERE id = 1;

-- Delete Data
DELETE FROM Students WHERE id = 1;

-- Task 5: Using a Database
USE StudentDB;

-- Task 6: Creating a Database and Table using phpMyAdmin (this is an instructional task, the following SQL can be run in Visual Studio as well)
CREATE DATABASE PracticeDB;

USE PracticeDB;

CREATE TABLE Employees (
    emp_id INT PRIMARY KEY AUTO_INCREMENT,
    emp_name VARCHAR(100) NOT NULL,
    emp_position VARCHAR(100),
    hire_date DATE
);

-- Task 7: Working with Different Data Types

-- Create Tables with various data types
CREATE TABLE NumericData (
    id INT PRIMARY KEY AUTO_INCREMENT,
    number TINYINT,
    amount FLOAT(10, 2)
);

CREATE TABLE StringData (
    id INT PRIMARY KEY AUTO_INCREMENT,
    description TEXT,
    code CHAR(10)
);

CREATE TABLE DateTimeData (
    id INT PRIMARY KEY AUTO_INCREMENT,
    created_at TIMESTAMP,
    event_date DATE
);

-- Task 8: Data Manipulation in Employees table

-- Insert Data
INSERT INTO Employees (emp_name, emp_position, hire_date) VALUES ('Alice Smith', 'Manager', '2022-06-01');
INSERT INTO Employees (emp_name, emp_position, hire_date) VALUES ('Bob Johnson', 'Developer', '2023-01-20');
INSERT INTO Employees (emp_name, emp_position, hire_date) VALUES ('Charlie Brown', 'Designer', '2021-11-15');

-- Update Data
UPDATE Employees SET emp_position = 'Senior Developer' WHERE emp_id = 2;

-- Delete Data
DELETE FROM Employees WHERE emp_id = 3;
