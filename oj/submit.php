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
   define('ROOTPATH', str_replace('oj/submit.php', '', str_replace('\\', '/', __FILE__)));
   require_once(ROOTPATH.'oj/include/hu.config.php');
   require_once(ROOTPATH.'oj/include/mysql.php');
   require_once(ROOTPATH.'oj/include/simple_html_dom.php');
   $db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
   
   $html = new simple_html_dom();//加载一个simple_html_dom实例
  // echo $_POST['language'];
   //echo $_POST['source'];
    $content = "";
    
    $html->load($_POST['source']);//载入html
    
    $ret = $html->find('.ace_line_group');//找出class=ace_scroller的标签
    
    //$content=substr($content,strpos($content,"#"));
    //$content=htmlspecialchars_decode($content);//处理html字符为文本字符
    //$content = str_replace('</div></div>','\r',$content);
    foreach($ret as $arr){
        $arr=strip_tags($arr);//去除html标签
        $arr=htmlspecialchars_decode($arr);
        $content.=$arr."\n";}

    //$content = implode(" ",$ret);
    // echo $content;
   $a=array(
       'source'=>$content,
   );
   $re=$db->insert('source_code',$a);
   
   if(!$re) echo "<script>alert('提交失败！');location='';</script>";
   $soure=$db->one("SELECT solution_id FROM source_code ORDER BY  solution_id DESC");
   print_r($soure);
   date_default_timezone_set("Asia/Shanghai");
   $now=date('Y-m-d H:i:s');
   $b=array(
       'solution_id'=>$soure['solution_id'],
       'problem_id'=>$_POST['id'],
       'user_id'=>$_SESSION['UserInfo'],
       'time'=>'',
       'memory'=>'',
       'in_date'=>$now,
       'result'=>'',
       'language'=>$_POST['language'],
       'ip'=>'',
       'code_length'=>strlen($content),
       'judgetime'=>'',
       
       
   );
   $re=$db->insert('solution',$b);
   sleep(2);
   echo "<script>window.top.location.href='state.php';</script>";
   
   
   ?>