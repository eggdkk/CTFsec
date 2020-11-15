<?php include 'class.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>EasyLogin</title>
</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="tabbable" id="tabs-268153">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#panel-671062" data-toggle="tab">Home</a>
                    </li>
                </ul>
            </div>
            <br>
            <br>
            <br><h2>Easy Login</h2>
            <br>
            <br>
            <br>
            <form role="form" action="index.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label><input type="Username" class="form-control" name="username" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label><input type="password" class="form-control" name="password" />
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <?php
            

            if(isset($_GET['file'])){

                if(preg_match('/flag/is', $_GET['file']) === 0){
                    echo file_get_contents('/'.$_GET['file']);
                }
            }

            if(isset($_POST['password'])){
                $user = new user;
                $login = $user->login();
                if($login){
                    echo <<<EOF
                    <br>
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <div class="alert alert-dismissable alert-info">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4>
                                        恭喜!
                                    </h4> <strong>Success!</strong>登录成功了！
                                </div>
                            </div>
                        </div>
                    </div>
EOF;
                }else{
                    echo <<<EOF
                    <br>
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <div class="alert alert-dismissable alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4>
                                        注意!
                                    </h4> <strong>Wrong!</strong>用户名或密码错误！Need help?
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- /?file=xxx 请使用绝对路径-->
EOF;
                }

            }
            ?>
        </div>
    </div>
</div>
</body>
</html>