<link rel="stylesheet" href="./prism.css"/>
<pre class="language-html">
<code class="language-php">&lt;?php 
class ip {
    public $ip;
    public function waf($info){
        //cannot sleep
    }
    public function __construct() {
        if(isset($_SERVER[&#x27;HTTP_X_FORWARDED_FOR&#x27;])){
            $this-&gt;ip = $this-&gt;waf($_SERVER[&#x27;HTTP_X_FORWARDED_FOR&#x27;]);
        }else{
            $this-&gt;ip =$_SERVER[&quot;REMOTE_ADDR&quot;];
        }
    }
    public function __toString(){
        $con=mysqli_connect(&quot;127.0.0.1&quot;,&quot;kai&quot;,&quot;********&quot;,&quot;flllllaggg&quot;);
        $sqlquery=sprintf(&quot;INSERT into sec(&#x60;ip&#x60;,&#x60;time_read&#x60;) VALUES (&#x27;%s&#x27;,&#x27;%s&#x27;)&quot;,$this-&gt;waf($_SERVER[&#x27;HTTP_X_FORWARDED_FOR&#x27;]),time());
        if(!mysqli_query($con,$sqlquery)){
            return mysqli_error($con);
        }else{
            return &quot;your ip looks ok!&quot;;
        }
        mysqli_close($con);
    }
}

class flag {
    public $ip;
    public $check;
    public function __construct($ip) {
        $this-&gt;ip = $ip;
    }
    public function getflag(){
    	if(md5($this-&gt;check)===md5(&quot;*******************&quot;)){
    		readfile(&#x27;/flag&#x27;);
    	}
        return $this-&gt;ip;
    }
    public function __wakeup(){
        if(stristr($this-&gt;ip, &quot;s3c&quot;)!==False)
            $this-&gt;ip = &quot;welcome to s3c&quot;;
        else
            $this-&gt;ip = &quot;noip&quot;;
    }
    public function __destruct() {
        echo $this-&gt;getflag();
    }

}
if(isset($_GET[&#x27;input&#x27;])){
    $input = $_GET[&#x27;input&#x27;];
	unserialize($input);
} 
  </code>
</pre>
<script src="./prism.js"></script>
<?php 
class ip {
    public $ip;
    public function waf($info){
        $filter_arr = array('case','when','sleep','benchm','pad','like','count','GET_LOCK');
        $filter = '/'.implode('|',$filter_arr).'/i';
        $info=preg_replace($filter,'hack',$info);
        if(strpos($info,"hack")!==false){
            die('hack');
        }else{
            return $info;
        }
    }
    public function __construct() {
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $this->ip = $this->waf($_SERVER['HTTP_X_FORWARDED_FOR']);
        }else{
            $this->ip =$_SERVER["REMOTE_ADDR"];
        }
    }
    public function __toString(){
        $con=mysqli_connect("mysql","ctf","123456","flllllaggg");
        $sqlquery=sprintf("INSERT into sec(`ip`,`time_read`) VALUES ('%s','%s')",$this->waf($_SERVER['HTTP_X_FORWARDED_FOR']),time());
        if(!mysqli_query($con,$sqlquery)){
            return mysqli_error($con);
        }else{
            return "your ip looks ok!";
        }
        mysqli_close($con);
    }
}

class flag {
    public $ip;
    public $check;
    public function __construct($ip) {
        $this->ip = $ip;
    }
    public function getflag(){
    	if(md5($this->check)===md5("35fbf008d6c22443f4933cb25af3a689")){
    		readfile('/flag');
    	}
        return $this->ip;
    }
    public function __wakeup(){
        if(stristr($this->ip, "s3c")!==False)
            $this->ip = "<code>welcome to s3c</code>";
        else
            $this->ip = "noip";
    }
    public function __destruct() {
        echo $this->getflag();
    }

}
if(isset($_GET['input'])){
    $input = $_GET['input'];
	unserialize($input);
} 
?>
