<?php
// -----------------------------
// DATABASE CONFIGURATION
// -----------------------------
define("DBHOST", 'localhost');       // Usually 'localhost' for local server
define("DBNAME", 'login-system');    // Database name you created
define("DBUSER", 'root');            // Default XAMPP MySQL user
define("DBPASS", '');                 // Default XAMPP MySQL password (usually empty)

// -----------------------------
// EMAIL (SMTP) CONFIGURATION
// -----------------------------
// Using Gmail SMTP as example
define("EMAIL", 'bheemappabaraker9@gmail.com');        // Replace with your Gmail address
define("SECRET", 'hedkedqodwrflhcc');         // Replace with Gmail App Password (not normal password)
define("MAILHOST", 'smtp.gmail.com');          // Gmail SMTP server
define("MAILSECURE", 'tls');                   // 'tls' for port 587, 'ssl' for port 465
define("MAILPORT", 587);                       // 587 for TLS, 465 for SSL

// -----------------------------
// USAGE
// -----------------------------
// DBHOST, DBNAME, DBUSER, DBPASS => for connecting to MySQL
// EMAIL, SECRET, MAILHOST, MAILSECURE, MAILPORT => for sending verification emails





