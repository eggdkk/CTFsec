<?php
include("class.php");

if (isset($_GET['file'])) {
    $filename = $_GET['file'];
}
if (isset($_GET['hash'])) {
    $hash = $_GET['hash'];
}
$path_prefix = 'upload/' . md5('2020xiangyun' . $_SERVER['REMOTE_ADDR']);
if (isset($filename) && isset($hash)) {
    $path_preg = 'upload\/' . md5('2020xiangyun' . $_SERVER['REMOTE_ADDR']);
    if (!preg_match("/($path_preg)/i", $filename)) {
        die("<script>alert('Hacker!');window.location.href='download.php';</script>");
    }
    $file = new Download();
    $file->downloadFile($filename, $hash);
}

if (isset($filename) && !isset($hash)) {
    $extension = substr($filename, strrpos($filename, ".") + 1);
    if (preg_match('/(png)|(jpg)|(jpeg)|(gif)/im', $extension)) {
        $hash = md5("/tmp/$path_prefix/$filename");
    }
    header("Location: ./download.php?file=/tmp/$path_prefix/$filename&hash=$hash");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image2Hash</title>
    <link href="Css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="Js/jquery.js"></script>
    <script type="text/javascript" src="Js/style.js"></script>
</head>
<body style="margin-top:5%">
<center >
    <h3 style="line-height:80px;height:80px;">图片下载</h3>
    <form action="download.php" method="get">
        <div class="col-lg-4 col-md-4 col-lg-offset-4">
            <table border="0" width="450" class="table">
                <tr>
                    <td>请输入图片文件名：</td>
                    <td><input type="text" name="file" class="form-control" required id="file"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="下载" class="btn btn-success">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</center>
</body>
</html>

