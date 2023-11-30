<?php
    require './php/connection.php';


    $sqlQuery = "SELECT html_tag FROM general_contents WHERE visibility = 1 ";

    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo  $row["html_tag"];
        }
    } else {
        echo "<h1>Loading...</h1>";
    }
    
    $conn->close();
?>


