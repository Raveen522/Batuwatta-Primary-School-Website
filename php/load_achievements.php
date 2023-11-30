<?php
    require 'connection.php';


    $sqlQuery = "SELECT * FROM achievements_list ORDER BY achievements_id ASC";

    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo "<div class='achievements-item col' id='achievements_item_".$row["achievements_id"]."'>";
                echo "<form id = 'frm_achievements_card_".$row["achievements_id"]."' onsubmit='return false' enctype='multipart/form-data'>";

                    echo "<input type='text' name='achievements_card_ID' id='achievements_card_ID' value='".$row["achievements_id"]."'>";

                    echo "<img src='../assets/images/achievements/".$row["img"]."' alt='' id='achievements_item_img_".$row["achievements_id"]."'>";

                    echo '<input type="file" name="achievements_img_'.$row["achievements_id"].'_upload" id="achievements_img_'.$row["achievements_id"].'_upload" accept="image/*" class="input-file" onchange="document.getElementById(\'achievements_item_img_'.$row["achievements_id"].'\').src = window.URL.createObjectURL(this.files[0])">';
                    
                    echo "<label for='achievements_img_".$row["achievements_id"]."_upload' class='input-file-label'>Choose a image</label>";

                    echo " <input type='text' name='achievements_title' id='achievements_title' placeholder='Achievement Title' value='".$row["title"]."'>";
                    
                    echo "<textarea name='achievements_description' id='achievements_description' cols='20' rows='3' placeholder='Achievement description'>".$row["description"]."</textarea>";

                    if($row["visibility"]==0){
                        echo "<div class='row'>";
                            echo "<input type='checkbox' name='achievements_item_visibility' id='achievements_item_visibility'> <label for='achievements_item_visibility'>Show</label>";
                        echo "</div>";
                    }else{
                        echo "<div class='row'>";
                            echo "<input type='checkbox' name='achievements_item_visibility' id='achievements_item_visibility' checked> <label for='achievements_item_visibility'>Show</label>";
                        echo "</div>";
                    }
                echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<h1>Error while loading</h1>";
    }
    
    $conn->close();
?>