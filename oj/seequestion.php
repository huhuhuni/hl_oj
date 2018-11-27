<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hl_oj</title>

</head>
<?php  include('css.php')?>
<body>
<?php 
   include('top.menu.php');
   define('ROOTPATH', str_replace('oj/seequestion.php', '', str_replace('\\', '/', __FILE__)));
   require_once(ROOTPATH.'oj/include/hu.config.php');
   require_once(ROOTPATH.'oj/include/mysql.php');
   $db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
   $question=$db->one("SELECT * FROM `problem` where problem_id=".$_GET['id']);
    ?>
    <center>
     <div style="border-style: solid solid solid none;width:800px;max-height:540px;overflow:scroll; background:#fff;opacity:0.6;">
     <?php if(isset($_SESSION['UserInfo'])) {?>
      【<a class="r2" href='index.php?action=doquestion&id=<?=$question['problem_id']?>'>提交</a>】
     <?php }else {?>
     【<a class="r2" href='login.html'>请先前往登录</a>】
    
    <?php }?>
     <p style="font-size:20px;"><strong>题目描述</strong></p>
     <p><?php echo $question['description'];?></p>
     <p style="font-size:20px;"><strong>输入</strong></p>
     <p><?php echo $question['input'];?></p>
     <p style="font-size:20px;"><strong>输出</strong></p>
     <p><?php echo $question['output'];?></p>
     <p style="font-size:20px;"><strong>样例输入</strong></p>
     <p><?php echo $question['sample_input'];?></p>
     <p style="font-size:20px;"><strong>样例输出</strong></p>
     <p><?php echo $question['sample_output'];?></p>
   <?php if(isset($_SESSION['UserInfo'])) {?>
      【<a class="r2" href='index.php?action=doquestion&id=<?=$question['problem_id']?>'>提交</a>】
     <?php }else {?>
     【<a class="r2" href='login.html'>请先前往登录</a>】
    
    <?php }?>
     </div>
    </center>
</body>
</html>