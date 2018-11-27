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
   define('ROOTPATH', str_replace('oj/state.php', '', str_replace('\\', '/', __FILE__)));
   require_once(ROOTPATH.'oj/include/hu.config.php');
   require_once(ROOTPATH.'oj/include/mysql.php');
   define(0,"等待状态（待提取)");
   define(1,"等待状态（待判题）");
   define(2,"正在编译");
   define(3,"判题中");
   define(4,"通过");
   define(5,"格式错误");
   define(6,"答案错误");
   define(7,"超出时间限制");
   define(8,"超出内存限制");
   define(9,"输出过多");
   define(10,"发生运行错误");
   define(11,"编译错误");
   define(12,"编译完成");
   $db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
   $state=$db->row("SELECT * FROM `solution` order by `solution_id` desc");
    ?>
        <center>
        <div style="overflow:scroll;height:550px;width:550px;">
       <table  border="0.2px" style="overflow:scroll;height:200px;" >
  <tr height="30" style="background:#7F7F7F;">
    <td>提交编号</td>
    <td>用户id</td>
    <td >问题</td>
    <td>结果</td>
    <td>语言</td>
    <td>提交时间</td>
   </tr>
<?php foreach ($state as $a): ?>
<tr height="30" style="background:#E3E3E3;opacity:0.7;">
    <td><?php echo $a['solution_id']?></td>
    <td><?php echo $a['user_id']?></td>
    <td><?php echo $a['problem_id']?></td>
    <td style="color:<?php if($a['result']>4) echo "#CD950C;";else if($a['result']==4)echo "#008B00;";else echo "#9400D3;";?>">
    <?php echo constant($a['result'])?></td>
    <td><?php echo $a['language']?></td>
    <td><?php echo $a['in_date']?></td>
   </tr>
<?php endforeach; ?>
     </table>
     </div>
    </center>