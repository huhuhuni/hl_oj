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
   define('ROOTPATH', str_replace('oj/question.php', '', str_replace('\\', '/', __FILE__)));
   require_once(ROOTPATH.'oj/include/hu.config.php');
   require_once(ROOTPATH.'oj/include/mysql.php');
   $db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
   $question=$db->row("SELECT * FROM `problem`");
    ?>
    <center>
       <table  border="0.2px" >
  <tr height="30" style="background:#7F7F7F;">
   
    <td>题目id</td>
    <td width=500>标题</td>
    <td>来源</td>
    <td>提交</td>
    <td>通过</td>
   </tr>
<?php foreach ($question as $a): ?>
<tr height="30" style="background:#E3E3E3;opacity:0.7;">
   
    <td><?php echo $a['problem_id']?></td>
    <td width=500><a href='index.php?action=seequestion&id=<?=$a['problem_id']?>' style='color:#8B475D;'><?php echo $a['title']?></a></td>
    <td><?php echo $a['source']?></td>
    <td><?php echo $a['submit']?></td>
    <td><?php echo $a['accepted']?></td>
   </tr>
<?php endforeach; ?>
     </table>
    </center>
</body>
</html>



