🚀 Local Deployment Guide (XAMPP Environment Setup)
To fully experience the application—including dynamic style swapping, auto-loading states, and secure server-side form submission directly into a relational database—you must run this project within a real Apache and MySQL server environment.

[!WARNING]
Running the files directly from your file system (file:///C:/...) or using localized extension utilities like VS Code Live Server (127.0.0.1:5500) will result in an HTTP 405 Method Not Allowed error or complete submission script failure because static servers cannot process or execute PHP logic.

Follow these systematic instructions to spin up the local server deployment environment:

Step 1: Stage Project Directories into XAMPP
Download and install XAMPP on your local workspace system.

Terminate any active localized temporary server nodes (e.g., Dispose your active VS Code Live Server port).

Copy your entire root project development folder.

Locate the master web root folder directory of XAMPP (typically located inside C:\xampp\htdocs\).

Paste your project folder directly into that root. Your directory index path should look precisely like this: C:\xampp\htdocs\your-project-folder-name\

Step 2: Establish Your Database Schema Matrix via SQL
Initialize the XAMPP Control Panel dashboard management window.

Click the Start toggle buttons immediately located next to Apache and MySQL. Verify that both service labels turn green.

Open any modern web browser and execute a routing instruction directly to the database administrator suite interface: http://localhost/phpmyadmin/

Click the SQL tab from the top navigation bar menu option panels.

Copy the comprehensive schema code query below, paste it into the query area script window, and click Go to automatically generate the relational database structure setup:

SQL
-- 1. Create the database container if it does not exist yet
CREATE DATABASE IF NOT EXISTS `finals_db` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

USE `finals_db`;

-- 2. Construct the primary database structure mapping data variables
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `artist` VARCHAR(100) NOT NULL DEFAULT 'Our Artist Network',
  `subject` VARCHAR(150) NOT NULL,
  `message` TEXT NOT NULL,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
Step 3: Run the Live Enterprise Core Environment
Launch your browser engine and route away from static network parameters. Type the proper address parameters explicitly into the top routing path execution area bar: http://localhost/your-project-folder-name/sample.html

Auto-Load Verification: Observe that your active runtime JavaScript framework immediately executes data logs on system initialization (e.g., pre-rendering custom artist workspace cards and styling frameworks smoothly).

Modal Interface Form Handling: Engage your custom validation parameters inside the registration interface module window. Type entries into fields, observing that placeholder text layouts (e.g., John Doe) maintain pristine color visibility against specialized high-contrast slate navy background elements.

Data Packet Persistence Control: Click Submit Registration Data. The request will pass to your PHP routing handling scripts without throwing an error block loop, confirm the transaction data logging arrays clearly, save the values into your localized MySQL tables safely, and allow smooth historical navigation steps back home to your primary viewport page tracking!
