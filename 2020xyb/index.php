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
<center>
    <h3 style="line-height:80px;height:80px;">Image2Hash</h3>
    <form action="action.php?action=register" method="post" enctype="multipart/form-data">
        <div class="col-lg-4 col-md-4 col-lg-offset-4">
            <table border="0" width="450" class="table">
                <tr>
                    <td>图片上传：</td>
                    <td><input type="file" name="imgpath" id="file" required><span style="font-size:12px;color:#888;">(文件类型只能为jpg,jpeg,png,gif)</span></td>
                </tr>
                <tr>
                    <td>图片预览：</td>
                    <td><img src=""  id="img" width="250" /></td>
                </tr>

                <tr>
                    <td>图片目录：</td>
                    <td><a href= action.php?action=img >图片目录</a></td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="提交" class="btn btn-success">
                        <input type="reset" value="取消" class="btn btn-default">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</center>

</body>
</html>