<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hl_oj</title>
<script>
//var op=self.setInterval("opacity1()",1.5*1000);
var int=self.setInterval("change()",2*1000);  
//var time=self.setInterval("opacity2()",2.5*1000);
//var time=self.setInterval("opacity3()",2.6*1000);
var time=self.setInterval("clock()",2*1000);



var i=1;  
function opacity1(){
	document.getElementById('img').style="margin:40px;opacity:0.5;";
}
function opacity2(){
	document.getElementById('img').style="margin:40px;opacity:0.6;";
}
function opacity3(){
	document.getElementById('img').style="margin:40px;opacity:0.7;";
}
function clock(){  

    i=i+1;  

    if(i==16){  

        i=1;  

    }  

}  
function change(){
    document.getElementById('img').src='../十佳歌手/十佳歌手'+i+'.jpg';
    //i++;
    
     }
</script>

</head>
<?php include('css.php'); ?>

<body>
<?php 
   include('top.menu.php');
   
    ?>
    <div style="width:500px;"></div>
    <div id="frame" style="opacity:0.6;position:abstract;bottom:10px;right:10px;">

		<a id="a1" class="num">1</a>

		<a id="a2" class="num">2</a>

		<a id="a3" class="num">3</a>

		<a id="a4" class="num">4</a>

		<a id="a5" class="num">5</a>

		<div id="photos" class="play">

			  <img src="../../十佳歌手/十佳歌手6.jpg">

			  <img src="../../十佳歌手/十佳歌手2.jpg">

			  <img src="../../十佳歌手/十佳歌手3.jpg">

			  <img src="../../十佳歌手/十佳歌手4.jpg">

			  <img src="../../十佳歌手/十佳歌手5.jpg" >

			  <ul id="dis">

				<li>湘潭大学：位置1</li>

				<li>湘潭大学：位置2</li>

				<li>湘潭大学：位置3</li>

				<li>湘潭大学：位置4</li>

				<li>湘潭大学：位置5</li>

			  </ul>

		</div>

</div>
   
   
</body>

</html>