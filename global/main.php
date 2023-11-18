<?php
    

    $_TITLE = "Document";
    $_TEMPLATE = "index";
        
    
    include './../../prerequisite/framework.php';
    include './../../configs/cdn.php';
    include './../../configs/database.php';


    function setTitle($title){
        global $_TITLE;
        $_TITLE = $title;
    }
    function setTemplate($file){
        global $_TEMPLATE;
        $_TEMPLATE = $file;
    }

    
?>