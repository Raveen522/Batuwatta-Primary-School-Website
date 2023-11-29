<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "db_batuwaththa_primary_college_";

    // Create connection
    $conn = new mysqli($serverName, $userName, $password, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>