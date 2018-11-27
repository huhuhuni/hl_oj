<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

</head>
<body>
<a href='admin.php?action=getquestion'>导入题目</a><br/>
<a href='index.php'>返回前台</a>
</body>
<?php 
define('ROOTPATH', str_replace('oj/admin.php', '', str_replace('\\', '/', __FILE__)));
require_once(ROOTPATH.'oj/include/hu.config.php');
require_once(ROOTPATH.'oj/include/mysql.php');


class hu{
    function __construct() {
        //$this->init();
        $this->start();//echo "<script>location='index.html'</script>";echo 1;
    }
    function start() {
        //$this->check_login();//echo 1;
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $this->action = isset($_GET['action']) ? trim($_GET['action']) : "";
            $this->do = isset($_GET['do']) ? trim($_GET['do']) : "";
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->action = isset($_POST['action']) ? trim($_POST['action']) : false;
            if(!$this->action){
                $this->action = isset($_GET['action']) ? trim($_GET['action']) : "";
            }
            $this->do = isset($_POST['do']) ? trim($_POST['do']) : "";
        }
        //$this->check_login();
        if ($this->action == "") {
            //$this->main();
        } elseif (method_exists($this, "action_{$this->action}")) {
            $this->{"action_{$this->action}"}();
        }
    }
    
    function action_getquestion(){
        echo "<script>location='getquestion.php'</script>";
    }
    
    function action_setonequestion(){
        $db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $b=array(
            'title'=>$_POST['title'],
            'description'=>$_POST['des'],
            'input'=>$_POST['put_1'],
            'output'=>$_POST['out_1'],
            'sample_input'=>$_POST['put_2'],
            'sample_output'=>$_POST['out_2'],
            'spj'=>$_POST['Se'],
            'hint'=>$_POST['hint'],
            'source'=>$_POST['source'],
            'in_date'=>date('Y-m-d H:i:s'),
            'time_limit'=>$_POST['l_time'],
            'memory_limit'=>$_POST['l_room']
        );
        $re=$db->insert('problem',$b);
        if(!$re) echo "<script>alert('导入失败');location='admin.php'</script>";
    }
}
    new hu();?>