<?php
    require 'connection.php';


    $sqlQuery = "SELECT * FROM news_list";

    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo "<div class='news-card col' id='news_card_".$row["news_ID"]."'>";
                echo "<form id = 'frm_news_card_".$row["news_ID"]."' onsubmit='return false' enctype='multipart/form-data'>";

                    echo "<input type='text' name='news_card_ID' id='news_card_ID' value='".$row["news_ID"]."'  >";

                    echo "<img src='../assets/images/news/".$row["img"]."' alt='' class='news-img' id='news_img_".$row["news_ID"]."'>";

                    echo '<input type="file" name="news_img_'.$row["news_ID"].'_upload" id="news_img_'.$row["news_ID"].'_upload" class="input-file" accept="image/*" onchange="document.getElementById(\'news_img_'.$row["news_ID"].'\').src = window.URL.createObjectURL(this.files[0])">';
                    
                    echo "<label for='news_img_".$row["news_ID"]."_upload' class='input-file-label'>Choose a image</label>";

                    echo "<input type='text' name='news_title' id='news_title' placeholder='News Title' value='".$row["title"]."'>";
                    
                    echo "<textarea name='news_description' id='news_description' cols='20' rows='3' placeholder='News description'>".$row["description"]."</textarea>";

                    if($row["visibility"]==0){
                        echo "<div class='row'>";
                            echo "<input type='checkbox' name='news_card_visibility' id='news_card_visibility'> <label for='news_card_visibility'>Show</label>";
                        echo "</div>";
                    }else{
                        echo "<div class='row'>";
                            echo "<input type='checkbox' name='news_card_visibility' id='news_card_visibility' checked> <label for='news_card_visibility'>Show</label>";
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