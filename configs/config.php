<?php

/*  -------------------------------------------------------------------------------------
---------------                 CORE WRAPPER v0.0.1                       ---------------
----------------------------------------------------------------------------------------- */

# DO NOT REMOVE ANY OF THESE VARIABLE FROM THIS FILE 


$_APP_MODE = 'local';   // change it to 'prod' on production
$_BASE_URL = 'http://localhost/framework'; // change it with your project root directory

// DB CONFIG
const _DB_SERVER = "localhost";
const _USERNAME = "root";
const _PASSWORD = "";
const _DATABASE = "test";

const _LOGS_TENURE = 'daily'; // hourly ,single, monthly, yearly
const _LOG_FILE_NAME = 'app';

const _TIMEZONE = 'Asia/Kolkata';

# CDN CONFIGS
$_CDN_LINKS = [
    "css" => [
        
    ],
    "js" => [
        
    ]
];

# HTML THAT YOU WANT TO INJECT INSIDE HEAD TAG
$_HEAD_HTML = '';

