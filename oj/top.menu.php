<div style="position:absolute;z-index:-1;width:100%;height:100%;">
    	<img src="img/2.jpg" width="100%" height="100%" />
</div>
<em>
<?php
if (!session_id()) @session_start();
     //require_once("mysql.php");
     //class a{
        // function __construct(){
        //     $b=new db("localhost", "root", "", "upup", $db_create = false);
        //     print_r($b->one("select * from ch_flight")); }}
	 //new a();
	date_default_timezone_set('Asia/Shanghai');
	$h=date('G');
    if ($h<12) $hao= '上午好';
    else if ($h<18) $hao= '下午好';
    else $hao= '晚上好';
    if(isset($_SESSION['UserInfo']))
        echo "<button class='red'>欢迎 ".$_SESSION['UserInfo']."&nbsp;&nbsp;   ".$hao."</button><button onclick=to_admin() class='right blue' style='margin-left:10px;'>管理</button>"."<button onclick=go_letout() class='right blue' style=''>注销</button>";
    else echo "<a href='login.html'>请登录或进入注册</a>";
	 ?></em>
	 <button id='txt' class="red"></button>
	 <div style="background: 	#FF3030;opacity:0.7;height:30px;">
	 <center>
     <table width="700" border="0" >
  <tr>
    <td height="20">
    <td><a href="index.php" class="r1">首页</a></td>
    <td><a class="r1" href="index.php?action=question">问题</a></td>
    <td><a class="r1" href="index.php?action=state">状态</a></td>
    <td><a class="r1" href="index.php?action=sort">排行榜</a></td>
    <td><a class="r1" href="nothing.php">讨论版</a></td>
    <td><a class="r1" href="nothing.php">关于我们</a></td>
    <td><a class="r1" href="teach.php">使用教程</a></td>
   </tr>
     </table>
     </center>
    </div>
<script>
function to_admin(){
	location="admin.php";
}
function go_letout(){
	location="index.php?action=logout";
}
</script>
<script type="text/javascript">
startTime();
function startTime()
{
var today=new Date()
var h=today.getHours()
var m=today.getMinutes()
var s=today.getSeconds()
// add a zero in front of numbers<10
m=checkTime(m)
s=checkTime(s)
document.getElementById('txt').innerText=h+":"+m+":"+s
t=setTimeout('startTime()',500)
}

function checkTime(i)
{
if (i<10) 
  {i="0" + i}
  return i
}
</script>
