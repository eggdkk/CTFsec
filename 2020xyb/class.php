<?php
libxml_disable_entity_loader(true);
class Hash {
    public $dir;
    public $name;
    public $hash;

    function __construct() {
        $this->dir = '/tmp/upload/'.md5('2020xiangyun'.$_SERVER['REMOTE_ADDR']).'/';
        if(!is_dir($this->dir)) {
            mkdir($this->dir, 0777, true);
        }
    }

    function get_file_list() {
        $file = scandir('.');
        return $file;
    }

    function file_list() {
        $file = $this->get_file_list();
        for ($i = 2; $i < sizeof($file); $i++) {
            echo "<tr><td colspan=\"2\" align=\"center\"> $file[$i] </td></tr>";
        }
    }

    function dohash($file_name) {
        $this->name = $file_name;
        $this->hash = hash_file('md5', $this->name);
    }
    function __destruct(){
        echo $this->hash;
    }
}

class file_list {
    public $class;
    function __construct() {
        $this->class = new Hash();
    }
    function __toString() {
        $this->class->file_list();
        return "";
    }
}

class Download {
    function downloadFile($file,$hash){
        if(file_exists($file) && md5($file) == $hash){
            switch(strtolower(substr(strrchr(basename($file),"."),1))){
                case "gif": $type="image/gif"; break;
                case "png": $type="image/png"; break;
                case "jpg": $type="image/jpg"; break;
            }
            if(preg_match('/(proc)|(log)|(env)|(bash)|(flag)|(%)|\{|\%|0x|\^|&|#| |%|`|<|>|\?|\"|\'/im', $file)){
                die("<script>alert('Hacker!');window.location.href='download.php';</script>");
            }
            header("Content-Type: ".$type);
            header("Content-Length: ".filesize($file));
            header("Content-Disposition: attachment; filename=".basename($file));
            return readfile($file);
        }else{
            echo "<script>alert('not found!');window.location.href='download.php';</script>";
        }
    }
}