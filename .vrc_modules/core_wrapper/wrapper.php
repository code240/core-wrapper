<?php


include './../../.vrc_modules/core_wrapper/__database__.php';
include './../../.vrc_modules/core_wrapper/__logs__.php';

date_default_timezone_set(_TIMEZONE);

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

$_CSS_CDN = "";
$_JS_CDN = "";

foreach($_CDN_LINKS['css'] as $link){
    $_CSS_CDN .= "<link rel='stylesheet' href='".$link."'>";
}
foreach($_CDN_LINKS['js'] as $link){
    $_JS_CDN .= "<script src='".$link."'></script>";
}




?>
