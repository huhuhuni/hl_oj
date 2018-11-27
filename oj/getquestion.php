<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hl_oj</title>
	
<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>      KindEditor.ready(function(K) {             window.editor = K.create('textarea[class="kindeditor"]');      });
</script>
 
</head>
<body background="img/4.jpg" >
<a href="admin.php" style="color:	#EE4000;background:#121212">返回</a>
<center>
<h2>添加题目</h2>
<form action="admin.php?action=setonequestion" method="post">
<br/><br/>题目标题<br/>
<input style=" width:500px" type="text" name="title" />
<br/><br/>时间限制<br/>
<input style="width:70px" type="text" name="l_time" value="1" />Sec
<br/><br/>内存限制<br/>
<input style="width:70px" type="text" name="l_room"  value="128" />MB
<br/><br/>题目描述<br/>
<textarea class="kindeditor" rows="10" cols="80" name="des"></textarea>
<input id='problem_id1' type='hidden' value='1000' name="id" ><br>
<br/><br/>输入<br/>
<textarea class="kindeditor" id='problem_id' rows="10" cols="80" name="put_1"></textarea>
<input id=problem_id type='hidden' value='1000' name="id" ><br>
<br/><br/>输出<br/>
<textarea class="kindeditor" rows="10" cols="80" name="out_1"></textarea>
<input id=problem_id type='hidden' value='1000' name="id" ><br>
<br/><br/>样例输入<br/>
<textarea rows="10" cols="80" name="put_2"></textarea>
<input id=problem_id type='hidden' value='1000' name="id" ><br>
<br/><br/>样例输出<br/>
<textarea rows="10" cols="80" name="out_2"></textarea>
<input id=problem_id type='hidden' value='1000' name="id" ><br>

<br/><br/>测试输入<br/>
<textarea rows="10" cols="80" name="put_3"></textarea>
<input id=problem_id type='hidden' value='1000' name="id" ><br>
<br/><br/>测试输出<br/>
<textarea rows="10" cols="80" name="out_3"></textarea>
<input id=problem_id type='hidden' value='1000' name="id" ><br>

<br/><br/>提示<br/>
<textarea class="kindeditor" rows="10"  cols="80" name="hint"></textarea>
<input id=problem_id type='hidden' value='1000' name="id" ><br>
<br/><br/>特殊裁判<br/>
是
<input type="radio"  name="Se" value="1" />
<br />
否
<input type="radio" checked="checked" name="Se" value="0" />
<br/><br/>来源<br/>
<input style=" width:500px" type="text" name="source" />
<br/>
<input type="submit" name="submit" /><br/>
<form>

</form>
</center>
</body>
