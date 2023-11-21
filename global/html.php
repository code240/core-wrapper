<?php
echo<<<html

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        $_HEAD_HTML $_CSS_CDN $_JS_CDN
        
        <script src="$_BASE_URL/.vrc_modules/core_wrapper/wrapper.js"></script>
        <script src="$_BASE_URL/global/main.js"></script>
        <script src="$_BASE_URL/src/$_TEMPLATE/$_TEMPLATE.js"></script>
        
        <link rel="stylesheet" type="text/css" href="$_BASE_URL/global/main.css" />
        <link rel="stylesheet" type="text/css" href="$_BASE_URL/src/$_TEMPLATE/$_TEMPLATE.css" />

        <link rel="shortcut icon" href="$_BASE_URL/assets/main.png" type="image/x-icon" />
        <meta name="keywords" content="$_KEYWORDS" />

        <meta name="description" content="$_DESCRIPTION" />

        <title>
            $_TITLE
        </title>
    </head>
    <body>

html;