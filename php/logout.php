<?php
    require 'connection.php';
    $respond = "";
    $sql = "SELECT userID FROM users WHERE status=1 ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $respond = $row["userID"];
        }
    } else {
        echo "error";
    }


    $sql_query="UPDATE users SET status=0 WHERE userID='$respond'";
        
    if ($conn->query($sql_query)==TRUE) {
        echo "done";
    }else{
        echo "error";
    }

    $conn->close();
?>