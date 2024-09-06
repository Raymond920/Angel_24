<?php
    // Database credentials for MySQL server (without specifying a database)
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Connect to MySQL without specifying a database
    $conn = new mysqli($servername, $username, $password);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Path to the SQL file
    $sqlFile = 'angel_24.sql';

    // Read the SQL file
    $sqlCommands = file_get_contents($sqlFile);

    if ($sqlCommands) {
        // Execute the SQL commands (CREATE DATABASE and others)
        if ($conn->multi_query($sqlCommands)) {
            do {
                // Continue processing results
            } while ($conn->next_result());
        } else {
            echo "Error executing SQL script: " . $conn->error;
        }
    } else {
        echo "Could not read SQL file.";
    }

    // Close the connection
    $conn->close();
?>
