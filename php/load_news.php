<?php
    require 'connection.php';


    $sqlQuery = "SELECT * FROM news_list";

    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo "<div class='news-card col' id='news_card_".$row["news_ID"]."'>";
            
                echo "<img src='../assets/images/news/".$row["img"]."' alt='' class='news-img' id='news_img_".$row["news_ID"]."'>";

                echo
                "
                    <input type='file' name='news_img_".$row["news_ID"]."_upload' id='news_img_".$row["news_ID"]."_upload' class='input-file' required>
                    <label for='news_img_".$row["news_ID"]."_upload' class='input-file-label'>Choose a image</label>
                ";
                echo "<input type='text' name='news-title' id='news_title_".$row["news_ID"]."' placeholder='News Title' value='".$row["title"]."'>";
                
                echo "<textarea name='news-description' id='news_description_".$row["title"]."' cols='20' rows='3' placeholder='News description'>".$row["description"]."</textarea>";

                if($row["visibility"]==0){
                    echo "<div class='row'>";
                        echo "<input type='checkbox' name='news-card-visibility' id='news_card_visibility_".$row["news_ID"]."'> <label for='news-card-visibility'>Show</label>";
                    echo "</div>";
                }else{
                    echo "<div class='row'>";
                        echo "<input type='checkbox' name='news-card-visibility' id='news_card_visibility_".$row["news_ID"]."' checked> <label for='news-card-visibility'>Show</label>";
                    echo "</div>";
                }

            echo "</div>";
        }
    } else {
        echo "<h1>Error while loading</h1>";
    }
    
    $conn->close();
?>