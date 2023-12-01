<?php
    require 'connection.php';

    $event_img_upload_name;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $event_ID = $_POST['event_gallery_item_ID'];

        $sqlQuery = "SELECT img FROM gallery_list WHERE gallery_ID = $event_ID";
    
        $result = $conn->query($sqlQuery);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $event_img_upload_name = $row["img"];
            }
        } else {
            echo "Image error";
        }

        if (isset($_FILES['event_img_'.$event_ID.'_upload'])) {
            $event_img_upload = $_FILES['event_img_'.$event_ID.'_upload'];

            $path_parts = pathinfo($event_img_upload["name"]);
            $extension = array_key_exists('extension', $path_parts) ? $path_parts['extension'] : '';

            $event_img_upload_name = "event_0".$event_ID.".".$extension;
            $tmp_event_img_upload_name = $event_img_upload['tmp_name'];
            $destination =  '../assets/images/events/' . $event_img_upload_name;
            if(file_exists("../assets/images/events/$event_img_upload_name")){
                unlink("../assets/images/events/$event_img_upload_name");
            }
            move_uploaded_file($tmp_event_img_upload_name, $destination);
        }

        $event_item_visibility=0;

        if(isset($_POST['event_img_visibility'])){
            $event_item_visibility = 1;
        }else{
            $event_item_visibility = 0;
        }
    }
  
    $sql_query="UPDATE gallery_list 
            SET 
                img='$event_img_upload_name'  ,
                visibility=$event_item_visibility 
            
            WHERE gallery_ID =$event_ID ";
            
    if ($conn->query($sql_query)==TRUE) {
        echo "Events Updated";
    }else{
        // echo "Server Error";
        echo $conn->error;
    }
  

    $conn->close();
?>