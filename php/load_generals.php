<?php
    require 'connection.php';


    $sqlQuery = "SELECT * FROM general_contents";

    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo "<tr>";

                echo "<td>";
                    echo "<label for='".$row["html_ID"]."'>". $row["content_name"] ."</label>";
                echo "</td>";

                echo "<td>";
                    echo "<input type='text' name='".$row["html_ID"]."' id='".$row["html_ID"]."' value='". $row["caption"]  ."'>";
                echo "</td>";

                echo "<td>";
                    if($row["visibility"]==0){
                        echo "<div class='row'>";
                            echo 
                            "
                                <input type='checkbox' name='".$row["html_ID"]."_visibility' id='".$row["html_ID"]."_visibility'> 
                                <label for='".$row["html_ID"]."_visibility'>Show</label>
                            ";
                        echo "</div>";
                    }else{
                        echo "<div class='row'>";
                            echo 
                            "
                                <input type='checkbox' name='".$row["html_ID"]."_visibility' id='".$row["html_ID"]."_visibility' checked>
                                <label for='".$row["html_ID"]."_visibility'>Show</label>
                            ";
                        echo "</div>";
                    }
                echo "</td>";

            echo "</tr>";

        }
    } else {
        echo "<h1>Error while loading</h1>";
    }
    
    $conn->close();
?>


