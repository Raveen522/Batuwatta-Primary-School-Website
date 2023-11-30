<?php
    require 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $news_ID = $_POST['news_card_ID'];

        if (isset($_FILES['news_img_'.$news_ID.'_upload'])) {
            $news_img_upload = $_FILES['news_img_'.$news_ID.'_upload'];
            $path_parts = pathinfo($news_img_upload["name"]);
            $extension = $path_parts['extension'];
            $news_img_upload_name = "news_".$news_ID.".".$extension;
            $tmp_news_img_upload_name = $news_img_upload['tmp_name'];
            $destination =  '../assets/images/news/' . $news_img_upload_name;
            if(file_exists("../assets/images/news/$news_img_upload_name")){
                unlink("../assets/images/news/$news_img_upload_name");
            }
            move_uploaded_file($tmp_news_img_upload_name, $destination);
        }

        $news_title = $_POST['news_title'];
        $news_description = $_POST['news_description'];

        $news_card_visibility=0;

        if(isset($_POST['news_card_visibility'])){
            $news_card_visibility = 1;
        }else{
            $news_card_visibility = 0;
        }
    }
  
    $sql_query="UPDATE news_list 
            SET 
                img='$news_img_upload_name'  ,
                title='$news_title'  ,
                description='$news_description'  ,
                visibility=$news_card_visibility 
            
            WHERE news_ID=$news_ID ";
            
    if ($conn->query($sql_query)==TRUE) {
        echo "News Updated";
    }else{
        // echo "Server Error";
        echo $conn->error;
    }
  

    $conn->close();
?>