<html>
<head>
<script type="text/javascript">
function showHint(str)
{
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }

else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
       document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
var trs = document.getElementsByTagName("tr");
x=0;
for(var i=1;i<trs.length;i++)
{
   x=x+parseFloat(trs[i].cells[2].innerHTML);
}
  document.getElementById("txtHint").innerHTML="The average power consumption is :"+x/trs.length;
}
  else{
document.getElementById("txtHint").innerHTML="wait";
}
  }
xmlhttp.open("GET","retrive.php?q="+document.getElementById("name11").value,true);
xmlhttp.send();
}
</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form>
<input id="name11" value="<?php echo $_GET['q']; ?> "></input>
<input type="button" value="app1" onclick="showHint(this.value)" size="40" />
</form>
<span id="txtHint"></span>

</body>
</html>