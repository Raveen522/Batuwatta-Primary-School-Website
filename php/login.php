<?php
    $userID = $_POST["userID"];
    $pw = $_POST["password"];
    $respond = "";
    require 'connection.php';

    $sql = "SELECT password FROM user WHERE userID='$userID' ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $respond = $row["password"];
        }
    } else {
        echo "error";
    }

    if ($respond==$pw){
        $sql_query="UPDATE user SET status=1 WHERE userID='$userID'";
        
        if ($conn->query($sql_query)==TRUE) {
            echo "done";
        }else{
            echo "error";
        }
    }else{
        echo "error";
    }

    $conn->close();
?>