
<style>
 body {background:;}
    a.r1:link {/*黄色*/
    color:	#FFFF00;
    text-decoration:underline;
    }
    a.r1:visited {
    color:#FFFF00;
    text-decoration:none;
    }
    a:hover {
    color:#000000;
    text-decoration:none;
    }
    a:active {
    color:#FFFFFF;
    text-decoration:none;
    } 
    a.r2:link {
    color:	#008B00;/*绿色*/
    text-decoration:underline;
    }
    a.r2:visited {
    color:#008B00;
    text-decoration:none;
    }
    .right{float:right;}
    .pre_message{ /*代码区样式*/
    width: 90%;
    height: 100%;
    height: 20em;
    overflow-y: auto;
    overflow-x: hidden;
    padding-left: 20px;
    outline: none;
    border: 0;
    font-size: 14px;
    white-space: pre-wrap;
    word-break: normal;
    background-color: #e0e0e0;

}
 .center{ margin:0 auto;}/*水平居中*/

button {
    color: #444444;
    background: #F3F3F3;
    border: 1px #DADADA solid;
    padding: 5px 10px;
    border-radius: 2px;
    font-weight: bold;
    font-size: 9pt;
    outline: none;
}

button:hover {
    border: 1px #C6C6C6 solid;
    box-shadow: 1px 1px 1px #EAEAEA;
    color: #333333;
    background: #F7F7F7;
}

button:active {
    box-shadow: inset 1px 1px 1px #DFDFDF;   
}

/* Blue button as seen on translate.google.com*/
button.blue {
    color: white;
    background: #4C8FFB;
    border: 1px #3079ED solid;
    box-shadow: inset 0 1px 0 #80B0FB;
}

button.blue:hover {
    border: 1px #2F5BB7 solid;
    box-shadow: 0 1px 1px #EAEAEA, inset 0 1px 0 #5A94F1;
    background: #3F83F1;
}

button.blue:active {
    box-shadow: inset 0 2px 5px #2370FE;   
}

/* Orange button as seen on blogger.com*/
button.orange {
    color: white;
    border: 1px solid #FB8F3D; 
    background: -webkit-linear-gradient(top, #FDA251, #FB8F3D);
    background: -moz-linear-gradient(top, #FDA251, #FB8F3D);
    background: -ms-linear-gradient(top, #FDA251, #FB8F3D);
}

button.orange:hover {
    border: 1px solid #EB5200;
    background: -webkit-linear-gradient(top, #FD924C, #F9760B); 
    background: -moz-linear-gradient(top, #FD924C, #F9760B); 
    background: -ms-linear-gradient(top, #FD924C, #F9760B); 
    box-shadow: 0 1px #EFEFEF;
}

button.orange:active {
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
}

/* Red Google Button as seen on drive.google.com */
button.red {
    background: -webkit-linear-gradient(top, #DD4B39, #D14836); 
    background: -moz-linear-gradient(top, #DD4B39, #D14836); 
    background: -ms-linear-gradient(top, #DD4B39, #D14836); 
    border: 1px solid #DD4B39;
    color: white;
    text-shadow: 0 1px 0 #C04131;
}

button.red:hover {
     background: -webkit-linear-gradient(top, #DD4B39, #C53727);
     background: -moz-linear-gradient(top, #DD4B39, #C53727);
     background: -ms-linear-gradient(top, #DD4B39, #C53727);
     border: 1px solid #AF301F;
}

button.red:active {
     box-shadow: inset 0 1px 1px rgba(0,0,0,0.2);
    background: -webkit-linear-gradient(top, #D74736, #AD2719);
    background: -moz-linear-gradient(top, #D74736, #AD2719);
    background: -ms-linear-gradient(top, #D74736, #AD2719);
}
#frame {/*----------图片轮播相框容器----------*/

			position: absolute; /*--绝对定位，方便子元素的定位*/

			width: 300px;

			height: 200px;

			overflow: hidden;/*--相框作用，只显示一个图片---*/

			border-radius:5px;

		}

		#dis {/*--绝对定位方便li图片简介的自动分布定位---*/

			position: absolute;

			left: -50px;

			top: -10px;

			opacity: 0.5;

		}

		#dis li {

			display: inline-block;

			width: 200px;

			height: 20px;

			margin: 0 50px;

			float: left;

			text-align: center;

			color: #fff;

			border-radius: 10px;

			background: #000;

		}

		#photos img {

			float: left;

			width:300px;

			height:200px;

		}

		#photos {/*---设置总的图片宽度--通过位移来达到轮播效果----*/

			position: absolute;z-index:9px;

			width: calc(300px * 5);/*---修改图片数量的话需要修改下面的动画参数*/

		}

		.play{

			animation: ma 20s ease-out infinite alternate;/**/

		}

		@keyframes ma {/*---每图片切换有两个阶段：位移切换和静置。中间的效果可以任意定制----*/

			0%,20% {		margin-left: 0px;		}

			25%,40% {		margin-left: -300px;	}

			45%,60% {		margin-left: -600px;	}

			65%,80% {		margin-left: -900px;	}

			85%,100% {		margin-left: -1200px;	}

		}

		.num{

			position:absolute;z-index:10;

			display:inline-block;

			right:10px;top:165px;

			border-radius:100%;

			background:#f00;

			width:25px;height:25px;

			line-height:25px;

			cursor:pointer;

			color:#fff;

			text-align:center;

			opacity:0.8;

		}

		.num:hover{background:#00f;}

		.num:hover,#photos:hover{animation-play-state:paused;}

		.num:nth-child(2){margin-right:30px}

		.num:nth-child(3){margin-right:60px}

		.num:nth-child(4){margin-right:90px}

		.num:nth-child(5){margin-right:120px}

		#a1:hover ~ #photos{animation: ma1 .5s ease-out forwards;}

		#a2:hover ~ #photos{animation: ma2 .5s ease-out forwards;}

		#a3:hover ~ #photos{animation: ma3 .5s ease-out forwards;}

		#a4:hover ~ #photos{animation: ma4 .5s ease-out forwards;}

		#a5:hover ~ #photos {animation: ma5 .5s ease-out forwards;}

		@keyframes ma1 {0%{margin-left:-1200px;}100%{margin-left:-0px;}	}

		@keyframes ma2 {0%{margin-left:-1200px;}100%{margin-left:-300px;}	}

		@keyframes ma3 {100%{margin-left:-600px;}	}

		@keyframes ma4 {100%{margin-left:-900px;}	}

		@keyframes ma5 {100%{margin-left:-1200px;}	}
</style>
