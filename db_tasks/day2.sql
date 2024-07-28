-- Task 1: Retrieve data from a table
-- Exercise: Write a query to select all columns from a table named employees.
SELECT * FROM employees;

-- Task 2: Retrieve specific columns
-- Exercise: Write a query to select the name and salary columns from the employees table.
SELECT name, salary FROM employees;

-- Task 3: Filter results using the WHERE clause
-- Exercise: Write a query to select employees with a salary greater than 50,000.
SELECT * FROM employees WHERE salary > 50000;

-- Task 4: Use the LIKE operator for pattern matching
-- Exercise: Write a query to select employees whose names start with 'J'.
SELECT * FROM employees WHERE name LIKE 'J%';

-- Task 5: Use the IN operator to filter data
-- Exercise: Write a query to select employees who belong to departments 1, 2, or 3.
SELECT * FROM employees WHERE department_id IN (1, 2, 3);

-- Task 6: Sort query results
-- Exercise: Write a query to select all employees and order them by their hire date in descending order.
SELECT * FROM employees ORDER BY hire_date DESC;

-- Task 7: Count the number of rows
-- Exercise: Write a query to count the number of employees.
SELECT COUNT(*) AS employee_count FROM employees;

-- Task 8: Calculate the sum of a column
-- Exercise: Write a query to calculate the total salary of all employees.
SELECT SUM(salary) AS total_salary FROM employees;

-- Task 9: Calculate the average of a column
-- Exercise: Write a query to find the average salary of employees.
SELECT AVG(salary) AS average_salary FROM employees;

-- Task 10: Find the minimum and maximum values
-- Exercise: Write queries to find the minimum and maximum salary of employees.
SELECT MIN(salary) AS min_salary FROM employees;
SELECT MAX(salary) AS max_salary FROM employees;

-- Task 11: Differentiate between WHERE and HAVING
-- Exercise: Use WHERE to filter employees with a salary greater than 50,000.
SELECT * FROM employees WHERE salary > 50000;

-- Exercise: Use HAVING to filter departments with an average salary greater than 50,000 after grouping.
SELECT department_id, AVG(salary) AS average_salary 
FROM employees 
GROUP BY department_id 
HAVING AVG(salary) > 50000;

-- Task 12: Understand and create one-to-one relationships
-- Exercise: Write SQL queries to create tables employees and employee_details with a one-to-one relationship using a foreign key.
CREATE TABLE employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    salary DECIMAL(10, 2),
    hire_date DATE
);

CREATE TABLE employee_details (
    employee_id INT PRIMARY KEY,
    address VARCHAR(255),
    phone VARCHAR(20),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);

-- Task 13: Understand and create one-to-many relationships
-- Exercise: Write SQL queries to create tables departments and employees with a one-to-many relationship where one department has many employees.
CREATE TABLE departments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    salary DECIMAL(10, 2),
    hire_date DATE,
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);

-- Task 14: Understand and create many-to-many relationships
-- Exercise: Write SQL queries to create tables students, courses, and student_courses to represent students enrolled in multiple courses and courses having multiple students.
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE student_courses (
    student_id INT,
    course_id INT,
    PRIMARY KEY (student_id, course_id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

-- Task 15: Implement foreign keys to enforce referential integrity
-- Exercise: Write SQL queries to add a foreign key to the employees table referencing the departments table.
ALTER TABLE employees ADD CONSTRAINT fk_department FOREIGN KEY (department_id) REFERENCES departments(id);

-- Task 16: Ensure certain columns cannot have NULL values
-- Exercise: Write SQL queries to modify the employees table to ensure the name column cannot be NULL.
ALTER TABLE employees MODIFY name VARCHAR(100) NOT NULL;

-- Task 17: Ensure all values in a column are unique
-- Exercise: Write SQL queries to modify the employees table to ensure the email column has unique values.
ALTER TABLE employees ADD CONSTRAINT uq_email UNIQUE (email);

-- Task 18: Enforce specific rules for column values
-- Exercise: Write SQL queries to add a CHECK constraint to the employees table to ensure the salary is greater than 0.
ALTER TABLE employees ADD CONSTRAINT chk_salary CHECK (salary > 0);

-- Task 19: Set default values for columns
-- Exercise: Write SQL queries to modify the employees table to set a default value of 'Active' for the status column.
ALTER TABLE employees ADD status VARCHAR(20) DEFAULT 'Active';

-- Task 20: Apply all learned concepts in a complete database system
-- Task: Write SQL queries to design and create a database for a company with the following requirements:
-- Tables: departments, employees, projects, employee_projects.
-- Relationships: One-to-many between departments and employees, many-to-many between employees and projects.
-- Constraints: Appropriate use of NOT NULL, UNIQUE, CHECK, DEFAULT, and foreign keys.
-- Queries: Write queries to demonstrate use of SELECT, WHERE, LIKE, IN, ORDER BY, aggregation functions, WHERE vs. HAVING.

-- Create Database
CREATE DATABASE CompanyDB;
USE CompanyDB;

-- Create Departments Table
CREATE TABLE departments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    UNIQUE (name)
);

-- Create Employees Table
CREATE TABLE employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    salary DECIMAL(10, 2) CHECK (salary > 0),
    hire_date DATE,
    status VARCHAR(20) DEFAULT 'Active',
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);

-- Create Projects Table
CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    start_date DATE,
    end_date DATE
);

-- Create Employee_Projects Table
CREATE TABLE employee_projects (
    employee_id INT,
    project_id INT,
    PRIMARY KEY (employee_id, project_id),
    FOREIGN KEY (employee_id) REFERENCES employees(id),
    FOREIGN KEY (project_id) REFERENCES projects(id)
);

-- Demonstrate use of SELECT, WHERE, LIKE, IN, ORDER BY, aggregation functions, WHERE vs. HAVING

-- Select all employees
SELECT * FROM employees;

-- Select specific columns
SELECT name, salary FROM employees;

-- Select employees with salary greater than 50,000
SELECT * FROM employees WHERE salary > 50000;

-- Select employees whose names start with 'J'
SELECT * FROM employees WHERE name LIKE 'J%';

-- Select employees who belong to departments 1, 2, or 3
SELECT * FROM employees WHERE department_id IN (1, 2, 3);

-- Select all employees and order by hire date in descending order
SELECT * FROM employees ORDER BY hire_date DESC;

-- Count the number of employees
SELECT COUNT(*) AS employee_count FROM employees;

-- Calculate the total salary of all employees
SELECT SUM(salary) AS total_salary FROM employees;

-- Find the average salary of employees
SELECT AVG(salary) AS average_salary FROM employees;

-- Find the minimum salary of employees
SELECT MIN(salary) AS min_salary FROM employees;

-- Find the maximum salary of employees
SELECT MAX(salary) AS max_salary FROM employees;

-- Filter employees with a salary greater than 50,000
SELECT * FROM employees WHERE salary > 50000;

-- Filter departments with an average salary greater than 50,000 after grouping
SELECT department_id, AVG(salary) AS average_salary 
FROM employees 
GROUP BY department_id 
HAVING AVG(salary) > 50000;
