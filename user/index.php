<?php
require_once '../require/functions.php';
if(!isset($_SESSION['user_email']))header( "Refresh: 0; url=../" );
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Grid fortune</title>
<style>
#header{
	top:0px;
	left:0px;
	height:100px;
}
#apps{
	position:absolute;
	left:180px;
	top:200px;
	border-right:1px solid;
	width:200px;
	height:500px;
}
#data{
	position:absolute;
	left:280px;
	top:200px;
	border-right:1px solid;
	width:720px;
	height:500px;
}
#fileList{
	position:absolute;
	left:1000px;
	top:200px;
	border:1px solid;
	width:200px;
	height:500px;
}
.analysisbut{
	font-size:12px;
	background: #49aa49;
	color: #fff;
	font-weight: 500;
	font-style: normal;
	border: 0;
	cursor: pointer;
	width:105px;
	height:25px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;

}
.analysisbut:hover{
	background: #4b9d4b;
}
</style>
<script>
function changeframe(file){
frame=document.getElementById("iframe");
frame.src="graphs/?file="+file;
analysis=document.getElementById("analysis");
analysis.innerHTML="<input type='button' value='Go for Analysis' class='analysisbut'></input><br/><font size='2'>(click this button to navigate into the Grid Fortune applications page for further analysis and recommendations based on your GB data)</font>"

analysis.href="analysis/?file="+file;
//document.write("hi");
}

</script>
</head>

<body>
<div align="center" style="width:700px;">
<div id="header">
	<?php include_once '../header.php'; ?>
</div>

<div id="main">
	<div id="apps">
    
    </div>
  
    <div id="data">
    <div id="scroll" class="scroll"></div>
    <iframe id="upload1" src="" width="100%" height="100%" frameborder="0"></iframe>
    <span id="graphData">
    <a id="analysis" href=""></a>
    <iframe id="iframe" src="" width="100%" height="100%" frameborder="0"></iframe></span>
    </div>
    
    <div id="fileList">
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
frame=document.getElementById("upload1");
frame.src="../upload";
function update(){
$.get('analysis/files', function(data) {
document.getElementById("fileList").innerHTML=data;
});
}
update();
</script>
</body>
</html>
<?php }?>