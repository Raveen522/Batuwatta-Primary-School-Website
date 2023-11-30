<?php
    require 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $hero_title = $_POST['hero_title'];
        $hero_paragraph = $_POST['hero_paragraph'];
        $hero_button = $_POST['hero_button'];
        $hero_button_link = $_POST['hero_button_link'];

        $hero_title_visibility = 0;
        $hero_paragraph_visibility = 0;
        $hero_button_visibility = 0;
        $hero_button_link_visibility = 0;

        $button_link = "<a href=".$hero_button_link."><button>".$hero_button."</button></a>";

        if(isset($_POST['hero_title_visibility'])){
            $hero_title_visibility = 1;
        }else{
            $hero_title_visibility = 0;
        }
        if(isset($_POST['hero_paragraph_visibility'])){
            $hero_paragraph_visibility = 1;
        }else{
            $hero_paragraph_visibility = 0;
        }
        if(isset($_POST['hero_button_visibility'])){
            $hero_button_visibility = 1;
        }else{
            $hero_button_visibility = 0;
        }

    }
  
    $sql_query="UPDATE general_contents 
            SET 
            caption = '$hero_title'  ,
            visibility = '$hero_title_visibility',
            html_tag = '<h1>$hero_title</h1>'
            WHERE content_ID = 104101 ";
            
    if ($conn->query($sql_query)==TRUE) {
    }else{
        echo $conn->error;
    }

    $sql_query="UPDATE general_contents 
            SET 
            caption = '$hero_paragraph'  ,
            visibility = '$hero_paragraph_visibility',
            html_tag = '<p>$hero_paragraph<p/>'
            WHERE content_ID = 104112 ";
            
    if ($conn->query($sql_query)==TRUE) {
    }else{
        echo $conn->error;
    }

    $sql_query="UPDATE general_contents 
            SET 
            caption = '$hero_button'  ,
            visibility ='$hero_button_visibility',
            html_tag = '$button_link'
            WHERE content_ID = 104220 ";
            
    if ($conn->query($sql_query)==TRUE) {
    }else{
        echo $conn->error;
    }

    $sql_query="UPDATE general_contents 
            SET 
            caption = '$hero_button_link'  ,
            visibility = '$hero_button_link_visibility',
            html_tag = '0'
            WHERE content_ID = 104310 ";
            
    if ($conn->query($sql_query)==TRUE) {
    }else{
        echo $conn->error;
    }
  
    echo "General Contents Updated";


    $conn->close();
?>