<?php
class user
{
    public $hostname = 'mysql';
    public $username = 'root';
    public $password = 'root';
    public $database = 'ctf';
    private $mysqli = null;

    public function __construct()
    {
        $this->mysqli = mysqli_connect(
            $this->hostname,
            $this->username,
            $this->password
        );
        mysqli_select_db($this->mysqli,$this->database);
    }

    public function filter()
    {
        $_POST['username'] = addslashes($_POST['username']);
        $_POST['password'] = addslashes($_POST['password']);
        $safe1 = preg_match('/inn|or/is', $_POST['username']);
        $safe2 = preg_match('/inn|or/is', $_POST['password']);
        if($safe1 === 0 and $safe2 === 0){
            return true;
        }else{
            die('No hacker!');
        }
    }

    public function login()
    {
        $this->filter();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from user where username='%s' and password='$password'";
        $sql = sprintf($sql,$username);
        $result = mysqli_query($this->mysqli,$sql);
        $result = mysqli_fetch_object($result);
        if($result->id){
            return 1;
        }else{
            return 0;
        }

    }

}

session_start();
