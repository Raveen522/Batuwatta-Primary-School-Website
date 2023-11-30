<?php
    require 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $achievements_ID = $_POST['achievements_card_ID'];

        if (isset($_FILES['achievements_img_'.$achievements_ID.'_upload'])) {
            $achievements_img_upload = $_FILES['achievements_img_'.$achievements_ID.'_upload'];
            $path_parts = pathinfo($achievements_img_upload["name"]);
            $extension = $path_parts['extension'];
            $achievements_img_upload_name = "achievements_0".$achievements_ID.".".$extension;
            $tmp_achievements_img_upload_name = $achievements_img_upload['tmp_name'];
            $destination =  '../assets/images/achievements/' . $achievements_img_upload_name;
            if(file_exists("../assets/images/achievements/$achievements_img_upload_name")){
                unlink("../assets/images/achievements/$achievements_img_upload_name");
            }
            move_uploaded_file($tmp_achievements_img_upload_name, $destination);
        }

        $achievements_title = $_POST['achievements_title'];
        $achievements_description = $_POST['achievements_description'];

        $achievements_item_visibility=0;

        if(isset($_POST['achievements_item_visibility'])){
            $achievements_item_visibility = 1;
        }else{
            $achievements_item_visibility = 0;
        }
    }
  
    $sql_query="UPDATE achievements_list 
            SET 
                img='$achievements_img_upload_name'  ,
                title='$achievements_title'  ,
                description='$achievements_description'  ,
                visibility=$achievements_item_visibility 
            
            WHERE achievements_ID=$achievements_ID ";
            
    if ($conn->query($sql_query)==TRUE) {
        echo "achievements Updated";
    }else{
        // echo "Server Error";
        echo $conn->error;
    }
  

    $conn->close();
?>