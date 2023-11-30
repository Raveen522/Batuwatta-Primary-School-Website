<?php
    require 'connection.php';


    $sqlQuery = "SELECT * FROM gallery_list ORDER BY gallery_ID ASC";

    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {

            echo "<div class='event-gallery-item' id='event_gallery_item_".$row["gallery_ID"]."'>";
                echo "<form id = 'frm_event_item_".$row["gallery_ID"]."' onsubmit='return false' enctype='multipart/form-data'>";

                    echo "<input type='text' name='event_gallery_item_ID' id='event_gallery_item_ID' value='".$row["gallery_ID"]."'>";

                    echo "<img src='../assets/images/events/".$row["img"]."' alt='' id='event_img_".$row["gallery_ID"]."'>";

                    echo '<input type="file" name="event_img_'.$row["gallery_ID"].'_upload" id="event_img_'.$row["gallery_ID"].'_upload" accept="image/*" class="input-file" onchange="document.getElementById(\'event_img_'.$row["gallery_ID"].'\').src = window.URL.createObjectURL(this.files[0])">';
                    
                    echo "<label for='event_img_".$row["gallery_ID"]."_upload' class='input-file-label'>Choose a image</label>";

                    if($row["visibility"]==0){
                        echo "<div class='row'>";
                            echo "<input type='checkbox' name='event_img_visibility' id='event_img_visibility'> <label for='event_img_visibility'>Show</label>";
                        echo "</div>";
                    }else{
                        echo "<div class='row'>";
                            echo "<input type='checkbox' name='event_img_visibility' id='event_img_visibility' checked> <label for='event_img_visibility'>Show</label>";
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