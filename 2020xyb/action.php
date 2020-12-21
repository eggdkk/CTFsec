<?php
header("content-type:text/html;charset=utf-8");
error_reporting(0);
if(isset($_GET['action'])){
    $action=$_GET['action'];

    if($action === "register"){
        $dir = '/tmp/upload/'.md5('2020xiangyun'.$_SERVER['REMOTE_ADDR']).'/';
        if(!is_dir($dir)){
            if(!mkdir($dir, 0777, true)) {
                echo error_get_last()['message'];
                die('Directory error');
            }
        }
        chdir($dir);
        $myfile=$_FILES['imgpath'];
        $filename = $myfile["name"];
        $filetmpname = $myfile["tmp_name"];
        if(!$myfile) {
            die("<script>alert('empty!');window.location.href='index.php';</script>");
        }
        if($myfile['size']>1*1024*1024){
            die("<script>alert('too big!');window.location.href='index.php';</script>");
        }
        $arr=array("image/jpg","image/jpeg","image/png","image/gif");
        if(!in_array($myfile['type'],$arr)){
            die("<script>alert('Hacker?');window.location.href='index.php';</script>");
        }
        if(preg_match('/(htaccess)|(user)|(ph)|(\.\.)|(%)|\{|\%|0x|\^|&|#| |%|`|<|>|\?|\"|\'/im', $filename)){
            die("<script>alert('Hacker!');window.location.href='index.php';</script>");
        }
        $content = file_get_contents($filetmpname);
        if(preg_match('/(eval)|(system)|(passthru)|(exec)|(shell_exec)|(proc_open)|(popen)/i', $content)) {
            die("<script>alert('Hacker!');window.location.href='index.php';</script>");
        }
        $extension = substr($filename, strrpos($filename, ".") + 1);
        if(!preg_match('/(png)|(jpg)|(jpeg)|(gif)/im', $extension)) {
            die("<script>alert('Hacker!');window.location.href='index.php';</script>");
        }

        move_uploaded_file($filetmpname,$filename);
        if(file_exists($filename)) {
            die("<script>alert('Upload successfully!');window.location.href='index.php';</script>");
        } else {
            die("<script>alert('Upload failed!');window.location.href='index.php';</script>");
        }
    }

    if($action === "img"){
        header('Location: ./img.php');
    }

    if($action === "download"){
        header('Location: ./download.php');
    }

    if($action !== "img" && $action !== "register" && $action !== "download"){
        die("<script>alert('No func!');window.location.href='index.php';</script>");
    }
}
