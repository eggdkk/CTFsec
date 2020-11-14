<?php


class Pan
{
    public $hostname = 'dhb1mysql';
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
       mysqli_select_db($this->mysqli, $this->database);


   }

    public function filter($string)
    {
        $safe = preg_match('/union|select|flag|in|or|on|where|like|\'/is', $string);
        if ($safe === 0) {
            return $string;
        } else {
            return False;
        }

    }

    public function getfile()
    {

        $code = $_POST['code'];

        if ($code === False) return '非法提取码！';
        $file_code = array(114514, 233333, 666666);

        if (in_array($code, $file_code)) {
            $sql = "select * from file where code='$code'";
            $result = mysqli_query($this->mysqli, $sql);
            $result = mysqli_fetch_object($result);
            return '下载直链为：' . $result->url;
        } else {
            return '提取码不存在！';
        }

    }

}
