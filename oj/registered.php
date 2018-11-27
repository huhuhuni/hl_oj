<?php 
define('ROOTPATH', str_replace('oj/registered.php', '', str_replace('\\', '/', __FILE__)));
require_once(ROOTPATH.'oj/include/hu.config.php');
require_once(ROOTPATH.'oj/include/mysql.php');

$user=$_POST['newusername'];

$password=$_POST['newpassword'];
$school=$_POST['newschool'];
$email=$_POST['newemail'];
if(!$user)echo "<script>alert('用户名为空！');location='registered.html';</script>";
if(!$password)echo "<script>alert('密码为空！');location='registered.html';</script>";
$password = hash("sha256", $password);
$a=array(
    'user_id'=>$user,
    'password'=>$password,
    'email'=>$email,
    'school'=>$school
);
$db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$re=$db->insert('users',$a);
if(!$re) echo "<script>alert('注册失败！可能已存在此账号！');location='registered.html';</script>";
echo "<script>alert('注册成功，快去登录吧');location='login.html';</script>";




?>