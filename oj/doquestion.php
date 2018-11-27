<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hl_oj</title>
 <!--导入js库-->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js" type="text/javascript" charset="utf-8"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ext-language_tools.js" type="text/javascript" charset="utf-8"></script>

</head>
<?php  include('css.php')?>
<body>
<?php 
   include('top.menu.php');
   define('ROOTPATH', str_replace('oj/doquestion.php', '', str_replace('\\', '/', __FILE__)));
   require_once(ROOTPATH.'oj/include/hu.config.php');
   require_once(ROOTPATH.'oj/include/mysql.php');
   if(!isset($_SESSION['UserInfo']))
       echo "<script type='text/javascript'>window.top.location.href='login.html'</script>"; 
   $db=new db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
   $question=$db->one("SELECT * FROM `problem` where problem_id=".$_GET['id']);
    ?>
     
     <div class="center"  style="border-style: solid solid solid none;width:900px;background:#fff;opacity:0.6;"> 
        <form id=frmSolution action="submit.php" method="post">
Problem <span class=blue><b><?=$_GET['id']?></b></span>
<input id=problem_id type='hidden' value=<?=$_GET['id']?> name="id" ><br>
<span id="language_span">Language:
<select id="language" name="language" onChange="reloadtemplate(this);" >
<option value=0 >
C
</option><option value=1 >
C++
</option><option value=2 >
Pascal
</option><option value=3 selected>
Java
</option><option value=4 >
Ruby
</option><option value=5 >
Bash
</option><option value=6 >
Python
</option><option value=7 >
PHP
</option><option value=8 >
Perl
</option><option value=9 >
C#
</option><option value=10 >
Obj-C
</option><option value=11 >
FreeBasic
</option><option value=12 >
Scheme
</option><option value=13 >
Clang
</option><option value=14 >
Clang++
</option><option value=15 >
Lua
</option><option value=16 >
JavaScript
</option><option value=17 >
Go
</option></select>

<br>
</span>  

	     <!-- <div class="chat_online" >
    
    <pre  id="a" class="pre_message center" contenteditable="true"  contenteditable-directive=""></pre>
    
</div> -->

	<input type='hidden' id="hide_source" name="source" value=""/>
 <pre id="code" name="pre" class="ace_editor" style="min-height:400px;"></pre><textarea   class="ace_text-input" ></textarea>
<button id="Submit" class="red"  value="提交" onclick="do_submit()">提交</button>
<div id="blockly" class="center">**********</div>
</form>
     </div>

    
</body>
</html>
<script>

function do_submit(){
	
		
	var a=document.getElementById('code').innerHTML;
	
	document.getElementById('hide_source').value = a;
	document.getElementById('frmSolution').submit();



}
 
</script>
<script>
             //初始化对象
             editor = ace.edit("code");
             
             //设置风格和语言（更多风格和语言，请到github上相应目录查看）
             theme = "clouds"
             language = "c_cpp"
             editor.setTheme("ace/theme/" + theme);
             editor.session.setMode("ace/mode/" + language);
             
             //字体大小
             editor.setFontSize(18);
             
             //设置只读（true时只读，用于展示代码）
             editor.setReadOnly(false); 
            
             //自动换行,设置为off关闭
             editor.setOption("wrap", "free")
             
             //启用提示菜单
             ace.require("ace/ext/language_tools");
             editor.setOptions({
                     enableBasicAutocompletion: true,
                     enableSnippets: true,
                     enableLiveAutocompletion: true
                 });
         </script>