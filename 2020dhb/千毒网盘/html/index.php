<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>千毒网盘</title>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>
            千毒网盘 <small>提取你的文件</small>
        </h1>
    </div>
    <div class="row clearfix">
        <div class="col-md-4 column">
        </div>
        <div class="col-md-4 column">
            <br>
            <form role="form" action='/2020dhb/Web1/index.php' method="POST">
                <div class="form-group">
                    <h3>提取码</h3><br><input class="form-control" name="code" />
                </div>
                <button type="submit" class="btn btn-block btn-default btn-warning">提取文件</button>
            </form>
            <br>
<?php

include 'code.php';

$pan = new Pan();
//echo $pan;
foreach (array('_GET', '_POST', '_COOKIE') as $key) {
    if ($$key) {
        foreach ($$key as $key_2 => $value_2) {
            if (isset($$key_2) and $$key_2 == $value_2)
                unset($$key_2);
        }
    }
}
if (isset($_POST['code'])) $_POST['code'] = $pan->filter($_POST['code']);
if ($_GET) extract($_GET, EXTR_SKIP);
if ($_POST) extract($_POST, EXTR_SKIP);
if (isset($_POST['code'])) {
    $message = $pan->getfile();
    echo <<<EOF
				<div class="alert alert-dismissable alert-info">
				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>
					注意!
				</h4> <strong>注意!</strong> {$message}
				</div>
EOF;
}
?>