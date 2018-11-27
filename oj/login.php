<?php 
define('ROOTPATH', str_replace('oj/login.php', '', str_replace('\\', '/', __FILE__)));
require_once(ROOTPATH.'oj/include/hu.config.php');
require_once(ROOTPATH.'oj/include/mysql.php');
if (!session_id()) session_start();
define('HUSK', 'DASZXEWVEXQAERSS');
$user=$_POST['username'];
$password=$_POST['password'];
$password = hash("sha256", $password);
//echo $password;
$db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$username=$db->one("SELECT * FROM `users` WHERE `user_id` = '{$user}'");
print_r($username);
if($username['password']==$password)
{   
    $_SESSION['UserInfo'] = $user;
    echo "<script>alert('登陆成功！');location='index.php';</script>"; 
   }
else 
   echo "<script>alert('账号密码错误！');location='login.html';</script>";

?>
