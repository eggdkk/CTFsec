<?php
error_reporting(0);
include("class.php");

$img = new Hash();
$file_list = new file_list();
chdir($img->dir);
echo "<a href=\"./download.php\">图片下载</a>";
echo $file_list;
if (isset($_POST['img'])) {
    $file_name = $_POST['img'];
    if (preg_match("/^php|^file|^ftp|^phar|^data|^dict|^zip/i",$file_name)){
        die("<script>alert('Hacker!');window.location.href='img.php';</script>");
    }
    $img->dohash($file_name);
}
unset($img);
?>
<tr><td colspan="2" align="center"> </td></tr>
</table>
</div>
</center>
</body>
</html>