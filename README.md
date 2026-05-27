# 🌐 WEB-DEV-ACTIVITIES

Welcome to my personal student profile project repository! This repository showcases the fundamental application of structuring clean HTML5 elements, formatting modern semantic layouts, and handling dynamic backend integrations.

---

## 💻 Project Overview

This repository serves as a compilation of my Web Development coursework, assignments, and terminal assessments. The core components feature three distinct highlight projects:

### 🎮 Features: Gaming Profile & Support Terminal
* **The Operator (About Me):** A specialized section profiling my journey as a multi-title competitive gamer and developer, including peak rank credentials.
* **Operational Protocols (Services):** A structured breakdown of high-quality competitive gaming services.
* **Support Terminal (Contact Form):** A responsive form designed to handle user inquiries seamlessly with cross-tier validation layers.

### 🎵 Features: Jeremy Zucker Album Project
* **Responsive Layout Grid:** A high-contrast dark-pop theme using Bootstrap fluid containers broken down into multi-breakpoint column cards (`.col-12`, `.col-md-6`, `.col-lg-4`).
* **Dynamic Client-Side Validation:** A customized newsletter subscription component running JavaScript Regular Expressions (`regex`) to evaluate inputs and provide clean visual feedback status states.
* **Event Handling & DOM Logic:** Programmed script logic capturing interaction layers over the component tracklist grid to alter operational styling states instantly.

### 🛡️ Features: Secure Server-Side Fan Gateway (PHP & XAMPP)
* **Server-Side Verification Packet:** Integrated a robust PHP backend processing layer utilizing strict standard regex check blocks to completely prevent processing bypass leaks.
* **Strict Email Integrity Masking:** Embedded native `filter_var()` routines to filter and reject improperly formatted contact addresses before payload evaluation occurs.
* **Cross-Site Scripting (XSS) Mitigation:** Applied rigorous HTML element encoding (`htmlspecialchars`) over data vectors to cleanly neutralize script injection vulnerabilities.

---

## 🛠️ Tech Stack

* **HTML5:** Semantic architecture and structures.
* **CSS3:** Custom minimalist styling featuring a dark gaming environment and alternative dark-pop music layouts.
* **Bootstrap v5.3:** Framework grid layout configurations, responsive mobile navigation tiers, and functional interactive modals.
* **JavaScript (ES6):** Client-side validation hooks, input evaluation logic, and responsive dynamic page event handling.
* **PHP:** Server-side request routing, strict validation checks, error status handlers, and secure data rendering.
* **XAMPP / Apache:** Local development hosting and environment simulation engine.
* **MySQL:** Relational database management system for secure application data persistence.

---

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

## 📂 Repository Structure

The layout of this repository tracking my academic progress across the term:

```text
├── FINAL ASSESSMENT/              # Culminating academic course build and deployments
├── PRELIMS TERMINAL ASSESSMENT/   # Final prelim project build & styling (style1.css)
├── WEEK 12 TERMINAL ASSESSMENT/   # Jeremy Zucker Music Album Project
│   ├── index.html                 # Core semantic structure document
│   ├── style.css                  # Custom high-contrast dark visual sheet
│   └── script.js                  # Interaction and validation engine
├── WEEK 3 ACTIVITY/               # Foundation layout structures
├── WEEK 4 ACTIVITY/               # Styling extensions (style.css)
├── WEEK 7 - 8 ACTIVITY/           # Logic scripting (calculator.js)
├── WEEK 9 - 10 ACTIVITY/          # Core DOM scripting foundations (dom.js)
├── WEEK 13 ACTIVITY/              # Intermediate page assets (services.html)
└── README.md                      # Repository documentation
