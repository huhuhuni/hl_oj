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
   define('ROOTPATH', str_replace('oj/sort.php', '', str_replace('\\', '/', __FILE__)));
   require_once(ROOTPATH.'oj/include/hu.config.php');
   require_once(ROOTPATH.'oj/include/mysql.php');
   $db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
   $question=$db->row("SELECT * FROM `users` ORDER BY `solved` DESC,`submit` ASC ");
    ?>
        <center>
       <table  border="0.2px" >
  <tr height="30" style="background:#7F7F7F;">
    <td>名次</td>
    <td>用户id</td>
    <td width=500>昵称</td>
    <td>提交</td>
    <td>通过</td>
    
    <td></td>
   </tr>
<?php $i=1;?>
<?php foreach ($question as $a): ?>
<tr height="30" style="background:#E3E3E3;opacity:0.7;">
    <td><?=$i;?></td>
    <td><?php echo $a['user_id']?></td>
    <td width=500>无</td>
    <td><?php echo $a['submit']?></td>
    <td><?php echo $a['solved']?></td>
   </tr>
   <?php $i++;?>
<?php endforeach; ?>
     </table>
    </center>