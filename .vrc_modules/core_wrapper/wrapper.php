<?php

$_TITLE = "Document";
$_TEMPLATE = "index";
$_KEYWORDS = "";
$_DESCRIPTION = "";

function setTitle(string $title){
    global $_TITLE;
    $_TITLE = $title;
}
function setTemplate(string $file){
    global $_TEMPLATE;
    $_TEMPLATE = $file;
}
function setDescription(string $para){
    global $_DESCRIPTION;
    $_DESCRIPTION = $para;
}
function setKeywords(array $keys){
    global $_KEYWORDS;
    foreach($keys as $index=>$val){
        $_KEYWORDS .= $val;
        if($index != count($keys)){
            $_KEYWORDS .= ",";
        }
    }
}







?>

<script src="./.vrc_modules/core_wrapper/wrapper.js"></script>