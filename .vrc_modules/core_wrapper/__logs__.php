<?php


class Log
{

    private static function get_file_name(){
        $tenure = _LOGS_TENURE;
        $firstname = _LOG_FILE_NAME;
        $filename = "";
        $extension = ".log";

        if($tenure == 'single'){
            $filename = $firstname.'_core_wrapper' . $extension;    
        } else if ($tenure == "hourly"){
            $filename = $firstname . date('_H_d-m-Y') . $extension;    
        } else if ($tenure == "daily"){
            $filename = $firstname . date('_d-m-Y') . $extension;    
        } else if ($tenure == "monthly"){
            $filename = $firstname . date('_m-Y') . $extension;    
        } else if ($tenure == "yearly"){
            $filename = $firstname . date('_Y') . $extension;    
        } else {
            $filename = $firstname.'_core_wrapper' . $extension;    
        }
        return $filename;
    }
    private static function create(string $prefix,string $message,array $arr = []){
        $filename = self::get_file_name();
        $file = './../../storage/logs/' . $filename;
        $content = $prefix."::".date("H:i:s __ d-m-Y") . " : " .$message;
        if(!empty($arr)){
            $content = $content . ' => ' . json_encode($arr) . '
';
        }else{
            $content .= '
'; 
        }
        if (!file_exists($file)) {
            file_put_contents($file, $content);
        } else {
            file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
        }
    }
    /**
     * Log informational message.
     *
     * @param string $message The informational message to log.
     * @param array $arr An optional array of additional information.
     */
    public static function info(string $message, array $arr = []){
        self::create('INFO',$message,$arr);        
    }
    public static function warn(string $message, array $arr = []){
        self::create('WARNING',$message,$arr);        
    }
    public static function error(string $message, array $arr = []){
        self::create('ERROR',$message,$arr);        
    }
    public static function critical(string $message, array $arr = []){
        self::create('CRITICAL',$message,$arr);        
    }
}