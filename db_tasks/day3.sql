-- Execute the initial setup commands
CREATE DATABASE company;
USE company;

CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(50) NOT NULL
);

CREATE TABLE employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    department_id INT,
    salary DECIMAL(10, 2) NOT NULL,
    manager_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(department_id),
    FOREIGN KEY (manager_id) REFERENCES employees(employee_id)
);

CREATE TABLE clients (
    client_id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL
);

CREATE TABLE projects (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    client_id INT,
    FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATE NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE locations (
    location_id INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(100) NOT NULL
);

CREATE TABLE salaries (
    salary_id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);

-- Insert initial data
INSERT INTO departments (department_name) VALUES
('HR'),
('Engineering'),
('Sales'),
('Marketing');

INSERT INTO employees (first_name, last_name, department_id, salary, manager_id) VALUES
('John', 'Doe', 1, 50000, NULL),
('Jane', 'Smith', 2, 60000, 1),
('Bob', 'Johnson', 3, 55000, 1),
('Alice', 'Davis', 2, 62000, 2),
('Charlie', 'Brown', 4, 48000, 3);

INSERT INTO clients (client_name) VALUES
('Client A'),
('Client B'),
('Client C');

INSERT INTO projects (project_name, start_date, client_id) VALUES
('Project Alpha', '2023-01-15', 1),
('Project Beta', '2023-03-20', 2),
('Project Gamma', '2023-05-10', 3);

INSERT INTO customers (customer_name) VALUES
('Customer One'),
('Customer Two'),
('Customer Three');

INSERT INTO orders (customer_id, order_date) VALUES
(1, '2023-04-01'),
(2, '2023-05-12'),
(3, '2023-06-15');

INSERT INTO products (product_name) VALUES
('Product X'),
('Product Y'),
('Product Z');

INSERT INTO order_items (order_id, product_id, quantity) VALUES
(1, 1, 10),
(1, 2, 5),
(2, 1, 8),
(3, 3, 12);

INSERT INTO locations (location_name) VALUES
('New York'),
('San Francisco'),
('Chicago');

INSERT INTO salaries (employee_id, amount) VALUES
(1, 50000),
(2, 60000),
(3, 55000),
(4, 62000),
(5, 48000);

-- Task: Inner Join
-- Join employees and departments to find the department name of each employee.
SELECT e.first_name, e.last_name, d.department_name
FROM employees e
INNER JOIN departments d ON e.department_id = d.department_id;

-- Task: Left Join
-- Join employees and projects to find all employees and the projects they are working on, if any.
SELECT e.first_name, e.last_name, p.project_name
FROM employees e
LEFT JOIN projects p ON e.employee_id = p.client_id;

-- Task: Right Join
-- Join departments and employees to find all departments and the employees in each department, including departments with no employees.
SELECT d.department_name, e.first_name, e.last_name
FROM departments d
RIGHT JOIN employees e ON d.department_id = e.department_id;

-- Task: Full Outer Join
-- Join employees and projects to list all employees and their projects, including employees without projects and projects without employees.
SELECT e.first_name, e.last_name, p.project_name
FROM employees e
FULL OUTER JOIN projects p ON e.employee_id = p.client_id;

-- Task: Self Join
-- Join employees with itself to find the manager of each employee.
SELECT e1.first_name AS employee_name, e2.first_name AS manager_name
FROM employees e1
INNER JOIN employees e2 ON e1.manager_id = e2.employee_id;

-- Task: Cross Join
-- Perform a cross join on employees and departments to get a Cartesian product of the two tables.
SELECT e.first_name, e.last_name, d.department_name
FROM employees e
CROSS JOIN departments d;

-- Task: Join with Alias
-- Join employees and departments using aliases to simplify query readability.
SELECT e.first_name, e.last_name, d.department_name
FROM employees AS e
INNER JOIN departments AS d ON e.department_id = d.department_id;

-- Task: Join with Aggregate Function
-- Join employees and salaries to find the average salary of each department.
SELECT d.department_name, AVG(s.amount) AS average_salary
FROM employees e
INNER JOIN salaries s ON e.employee_id = s.employee_id
INNER JOIN departments d ON e.department_id = d.department_id
GROUP BY d.department_name;

-- Task: Join with Conditional Filtering
-- Join employees and projects to find employees working on projects started after a specific date.
SELECT e.first_name, e.last_name, p.project_name
FROM employees e
INNER JOIN projects p ON e.employee_id = p.client_id
WHERE p.start_date > '2023-04-01';

-- Task: Join with WHERE Clause
-- Join employees and departments to find employees in a specific department.
SELECT e.first_name, e.last_name, d.department_name
FROM employees e
INNER JOIN departments d ON e.department_id = d.department_id
WHERE d.department_name = 'Engineering';

-- Task: Join with ON Clause
-- Join orders and customers on customer ID to get order details along with customer information.
SELECT o.order_id, o.order_date, c.customer_name
FROM orders o
INNER JOIN customers c ON o.customer_id = c.customer_id;

-- Task: Join with USING Clause
-- Join employees and departments using the department ID.
SELECT e.first_name, e.last_name, d.department_name
FROM employees e
INNER JOIN departments d USING(department_id);

-- Task: Join with Group By
-- Join orders and customers to find the total number of orders placed by each customer.
SELECT c.customer_name, COUNT(o.order_id) AS total_orders
FROM customers c
INNER JOIN orders o ON c.customer_id = o.customer_id
GROUP BY c.customer_name;

-- Task: Join with HAVING Clause
-- Join orders and customers to find customers who have placed more than 5 orders.
SELECT c.customer_name, COUNT(o.order_id) AS total_orders
FROM customers c
INNER JOIN orders o ON c.customer_id = o.customer_id
GROUP BY c.customer_name
HAVING COUNT(o.order_id) > 5;

-- Task: Join with CASE Statement
-- Join employees and departments and use a CASE statement to classify employees based on department.
SELECT e.first_name, e.last_name, d.department_name,
CASE
    WHEN d.department_name = 'HR' THEN 'Human Resources'
    WHEN d.department_name = 'Engineering' THEN 'Technical'
    WHEN d.department_name = 'Sales' THEN 'Sales and Marketing'
    ELSE 'Other'
END AS department_classification
FROM employees e
INNER JOIN departments d ON e.department_id = d.department_id;

-- Task: Join with ORDER BY
-- Join employees and departments and order the result by department name and employee name.
SELECT e.first_name, e.last_name, d.department_name
FROM employees e
INNER JOIN departments d ON e.department_id = d.department_id
ORDER BY d.department_name, e.first_name;

-- Task: Inner Join
-- Join employees, departments, and projects to find the project names for employees in each department.
SELECT e.first_name, e.last_name, d.department_name, p.project_name
FROM employees e
INNER JOIN departments d ON e.department_id = d.department_id
INNER JOIN projects p ON e.employee_id = p.client_id;

-- Task: Left Join
-- Join employees, projects, and clients to list all employees and their projects, including projects without clients.
SELECT e.first_name, e.last_name, p.project_name, c.client_name
FROM employees e
LEFT JOIN projects p ON e.employee_id = p.client_id
LEFT JOIN clients c ON p.client_id = c.client_id;

-- Task: Right Join
-- Join departments, employees, and salaries to list all departments, their employees, and their salaries, including departments with no employees.
SELECT d.department_name, e.first_name, e.last_name, s.amount AS salary
FROM departments d
RIGHT JOIN employees e ON d.department_id = e.department_id
RIGHT JOIN salaries s ON e.employee_id = s.employee_id;

-- Task: Full Outer Join
-- Join employees, projects, and departments to list all employees, projects, and departments, including those without matches in the other tables.
SELECT e.first_name, e.last_name, p.project_name, d.department_name
FROM employees e
FULL OUTER JOIN projects p ON e.employee_id = p.client_id
FULL OUTER JOIN departments d ON e.department_id = d.department_id;

-- Task: Self Join
-- Join employees with itself and departments to find employees and their managers within the same department.
SELECT e1.first_name AS employee_name, e2.first_name AS manager_name, d.department_name
FROM employees e1
INNER JOIN employees e2 ON e1.manager_id = e2.employee_id
INNER JOIN departments d ON e1.department_id = d.department_id AND e2.department_id = d.department_id;

-- Task: Cross Join
-- Perform a cross join on employees, departments, and projects to get a Cartesian product of the three tables.
SELECT e.first_name, e.last_name, d.department_name, p.project_name
FROM employees e
CROSS JOIN departments d
CROSS JOIN projects p;

-- Task: Join with Alias
-- Join employees, departments, and projects using aliases for readability.
SELECT e.first_name AS emp_name, d.department_name AS dept_name, p.project_name AS proj_name
FROM employees AS e
INNER JOIN departments AS d ON e.department_id = d.department_id
INNER JOIN projects AS p ON e.employee_id = p.client_id;

-- Task: Join with Aggregate Function
-- Join employees, salaries, and departments to find the total salary expenditure for each department.
SELECT d.department_name, SUM(s.amount) AS total_salary
FROM employees e
INNER JOIN salaries s ON e.employee_id = s.employee_id
INNER JOIN departments d ON e.department_id = d.department_id
GROUP BY d.department_name;

-- Task: Join with Conditional Filtering
-- Join employees, projects, and clients to find employees working on projects with specific clients.
SELECT e.first_name, e.last_name, p.project_name, c.client_name
FROM employees e
INNER JOIN projects p ON e.employee_id = p.client_id
INNER JOIN clients c ON p.client_id = c.client_id
WHERE c.client_name = 'Client A';

-- Task: Join with WHERE Clause
-- Join orders, customers, and products to find orders for a specific product by customer.
SELECT o.order_id, c.customer_name, p.product_name
FROM orders o
INNER JOIN customers c ON o.customer_id = c.customer_id
INNER JOIN order_items oi ON o.order_id = oi.order_id
INNER JOIN products p ON oi.product_id = p.product_id
WHERE p.product_name = 'Product X';

-- Task: Join with ON Clause
-- Join employees, departments, and locations on appropriate keys to find the office location of each employee.
SELECT e.first_name, e.last_name, d.department_name, l.location_name
FROM employees e
INNER JOIN departments d ON e.department_id = d.department_id
INNER JOIN locations l ON d.department_id = l.location_id;

-- Task: Join with Group By
-- Join orders, customers, and order_items to find the total quantity of items ordered by each customer.
SELECT c.customer_name, SUM(oi.quantity) AS total_quantity
FROM customers c
INNER JOIN orders o ON c.customer_id = o.customer_id
INNER JOIN order_items oi ON o.order_id = oi.order_id
GROUP BY c.customer_name;

-- Task: Join with HAVING Clause
-- Join orders, customers, and order_items to find customers who have ordered more than a specified number of items.
SELECT c.customer_name, SUM(oi.quantity) AS total_quantity
FROM customers c
INNER JOIN orders o ON c.customer_id = o.customer_id
INNER JOIN order_items oi ON o.order_id = oi.order_id
GROUP BY c.customer_name
HAVING SUM(oi.quantity) > 10;

-- Task: Join with CASE Statement
-- Join employees, projects, and departments to classify employees based on project participation.
SELECT e.first_name, e.last_name, d.department_name,
CASE
    WHEN p.project_name IS NOT NULL THEN 'Active in Project'
    ELSE 'No Project Assigned'
END AS project_status
FROM employees e
LEFT JOIN projects p ON e.employee_id = p.client_id
INNER JOIN departments d ON e.department_id = d.department_id;

-- Task: Join with DATE Function
-- Join employees, projects, and departments to find employees assigned to projects starting after a specific date.
SELECT e.first_name, e.last_name, p.project_name, p.start_date
FROM employees e
INNER JOIN projects p ON e.employee_id = p.client_id
INNER JOIN departments d ON e.department_id = d.department_id
WHERE p.start_date > '2023-04-01';

-- Task: Join with ORDER BY
-- Join employees, departments, and projects and order the result by department name, project name, and employee name.
SELECT e.first_name, e.last_name, d.department_name, p.project_name
FROM employees e
INNER JOIN departments d ON e.department_id = d.department_id
INNER JOIN projects p ON e.employee_id = p.client_id
ORDER BY d.department_name, p.project_name, e.first_name;
